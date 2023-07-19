<?php

namespace App\Http\Controllers\Api\V1;

use App\CallLog;
use App\DeviceToken;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ResponseController;
use App\Events\ChatMessage;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Thread;
use App\Messages;
use App\User;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Willywes\AgoraSDK\RtcTokenBuilder;

class ChatController extends ResponseController implements MessageComponentInterface
{
    protected $clients;
    private $subscriptions;
    private $users;
    private $user_resources;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
        $this->subscriptions = [];
        $this->users = [];
        $this->user_resources = [];
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        $this->users[$conn->resourceId] = $conn;
    }

    public function onMessage(ConnectionInterface $conn, $msg)
    {
        $data = \GuzzleHttp\json_decode($msg);
        if (isset($data->command)) {
            switch ($data->command) {
                case "subscribe":
                    $this->subscriptions[$conn->resourceId] = $data->channel;
                    break;
                case "groupchat":
                    if (isset($this->subscriptions[$conn->resourceId])) {
                        $target = $this->subscriptions[$conn->resourceId];
                        foreach ($this->subscriptions as $id => $channel) {
                            if ($channel == $target && $id != $conn->resourceId) {
                                $this->users[$id]->send($data->message);
                            }
                        }
                    }
                    break;
                case "message":
                    $from = DeviceToken::where(['token' => $data->from])->first()->id;
                    $to = DeviceToken::where(['token' => $data->to])->first()->id;
                    if (isset($this->user_resources[$data->to])) {
                        foreach ($this->user_resources[$data->to] as $key => $resourceId) {
                            if (isset($this->users[$resourceId])) {
                                $this->users[$resourceId]->send(\GuzzleHttp\json_encode(['type' => 'message', 'message' => $data->message, 'to' => $from]));
                            }
                        }
                        $conn->send(\GuzzleHttp\json_encode(['status' => 'sent']));
                    }

                    if (isset($this->user_resources[$data->from])) {
                        foreach ($this->user_resources[$data->from] as $key => $resourceId) {
                            if (isset($this->users[$resourceId]) && $conn->resourceId != $resourceId) {
                                $this->users[$resourceId]->send(\GuzzleHttp\json_encode(['type' => 'message', 'message' => $data->message, 'to' => $to]));
                            }
                        }
                    }


                    $isThreadExist = Thread::where(function ($q) use ($data, $from, $to) {
                        if ($data->from_type == 'guest')
                            $q->where(['guest_id' => $from, 'user_id' => $to]);
                        else
                            $q->where(['guest_id' => $to, 'user_id' => $from]);
                    })->first();
                    $thread_id = 0;
                    if (!empty($isThreadExist)) {
                        $thread_id = $isThreadExist->id;
                        $threads = Thread::findOrFail($isThreadExist->id);
                        $threads->user_status = 'y';
                        $threads->guest_status = 'y';
                        $threads->save();
                    } else {
                        $threads = Thread::create([
                            'guest_id' => $from,
                            'user_id' => $to,
                            'is_active' => 'y',
                        ]);
                        $thread_id = $threads->id;
                    }
                    if ($thread_id) {
                        $message = Messages::create([
                            'threads_id' => $thread_id,
                            'sender_id' => $from,
                            'sender_type' => $data->from_type == 'guest' ? 'guest' : 'user',
                            'receiver_id' => $to,
                            'receiver_type' => $data->from_type == 'guest' ? 'user' : 'guest',
                            'message' => $data->message,
                            'type' => 'message',
                        ]);
                    }
                    //echo "\033[32m" . $thread_id . "\033[0m" . PHP_EOL;
                    break;
                case "register":
                    if (isset($data->userId)) {
                        if (isset($this->user_resources[$data->userId])) {
                            if (!in_array($conn->resourceId, $this->user_resources[$data->userId])) {
                                $this->user_resources[$data->userId][] = $conn->resourceId;
                            }
                        } else {
                            $this->user_resources[$data->userId] = [];
                            $this->user_resources[$data->userId][] = $conn->resourceId;
                        }
                    }
                    $conn->send(\GuzzleHttp\json_encode(['type' => 'register']));
                    $conn->send(\GuzzleHttp\json_encode(['type' => 'register']));
                    break;
                default:
                    $example = array(
                        'methods' => [
                            "subscribe" => '{command: "subscribe", channel: "global"}',
                            "groupchat" => '{command: "groupchat", message: "hello glob", channel: "global"}',
                            "message" => '{command: "message", to: "1", message: "it needs xss protection"}',
                            "message_sent" => '{command: "message",from:"9" ,to: "1", sent: "true"}',
                            "message_received" => '{command: "message_received",from:"9" ,to: "1", received: "true"}',
                            "register" => '{command: "register", userId: 9}',
                        ],
                    );
                    $conn->send(json_encode($example));
                    break;
            }
        }

    }

    public function sendMessageToOthers($from, $msg)
    {
        foreach ($this->clients as $client) {
            if ($from !== $client) {

                $client->send($msg);
            }
        }
    }

    public function sendMessageToAll($msg)
    {
        foreach ($this->clients as $client) {
            $client->send($msg);
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
        unset($this->users[$conn->resourceId]);
        unset($this->subscriptions[$conn->resourceId]);

        foreach ($this->user_resources as &$userId) {
            foreach ($userId as $key => $resourceId) {
                if ($resourceId == $conn->resourceId) {
                    unset($userId[$key]);
                }
            }
        }
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}
