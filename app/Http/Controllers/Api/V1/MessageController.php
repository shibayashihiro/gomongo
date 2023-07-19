<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ResponseController;
use App\Events\ChatMessage;
use Illuminate\Validation\Rule;
use App\Thread;
use App\Messages;
use App\User;

class MessageController extends ResponseController
{
    //Chat
    public function chat(Request $request)
    {

        $this->directValidation([
            'to_user_id' => ['required', 'exists:users,id'],
            'message' => ['required'],
        ]);
        $isThreadExist = Thread::where(function ($q) use ($request) {
            $q->where('user_id', '=', $request->user()->id)
                ->orWhere('friend_id', '=', $request->user()->id);
        })->where(function ($q) use ($request) {
            $q->where('user_id', '=', $request->to_user_id)
                ->orWhere('friend_id', '=', $request->to_user_id);
        })->first();
        $thread_id = 0;
        if (!empty($isThreadExist)) {
            $thread_id = $isThreadExist->id;
            $threads = Thread::findOrFail($isThreadExist->id);
            $threads->user_status = 'y';
            $threads->friend_status = 'y';
            $threads->save();
        } else {
            $threads = Thread::create([
                'user_id' => $request->user()->id,
                'friend_id' => $request->to_user_id,
                'is_active' => 'y',
            ]);
            $thread_id = $threads->id;
        }
        if ($thread_id) {
            $file = '';
            if ($request->hasFile('file')) {
                $file = $request->file('file')->store('uploads/chat');
            }


            $message = Messages::create([
                'threads_id' => $thread_id,
                'sender_id' => $request->user()->id,
                'receiver_id' => $request->to_user_id,
                'message' => $request->message,
                'type' => $request->type,
                'file' => $file,
            ]);

            broadcast(new ChatMessage($request->user(), $message));
            $this->sendResponse(200, __('api.succ'));
        } else {
            $this->sendResponse(412, __('api.error'));
        }
    }

    //thread list
    public function threadList(Request $request)
    {
        $limit = $request->limit;
        $offset = $request->offset;
        $user_id = $request->user()->id;
        //Threads
        $response = Thread::with(['message_latest'])
            ->when($user_id != "", function ($q) use ($user_id) {
                $q->where(function ($thread_user) use ($user_id) {
                    $thread_user->where('user_id', '=', $user_id)
                        ->orWhere('friend_id', '=', $user_id);
                });;
            })->has('message_latest')->when($limit != "" && $offset != "", function ($q) use ($limit, $offset) {
                $q->limit($limit)->offset($offset);
            })->orderBy('last_msg_update_time', 'DESC')->get();
        if (!empty($response)) {
            foreach ($response as $key => $value) {
                $response[$key]['sender_detail'] = (object)array();
                if ($value->user_id == $user_id) {
                    $response[$key]['sender_detail'] = User::where(['id' => $value->friend_id])->first(['id', 'name', 'profile_image']);
                } else {
                    $response[$key]['sender_detail'] = User::where(['id' => $value->user_id])->first(['id', 'name', 'profile_image']);
                }
            }
        }
        $this->sendResponse(200, __('api.succ'), $response);
    }

    //Upload files
    public function uploadFiles(Request $request)
    {

        $this->directValidation([
            'files' => ['required']
        ]);
        $files = [];
        if ($request->hasFile('files')) {
            $all_files = $request->file('files');
            foreach ($all_files as $file) {
                $upload = $file->store('uploads/chat');
                if ($upload) {
                    $files[] = $upload;
                }
            }
        }
        $this->sendResponse(200, __('api.succ'), $files);

    }

    //Chat history
    public function chatHistory(Request $request)
    {
        $user = $request->user();
        $this->directValidation([
            'threads_id' => ['required', 'exists:threads,id'],
        ]);
        $isThreadExist = Thread::where('id', '=', $request->threads_id)->first();
        $limit = $request->limit;
        $offset = $request->offset;

        if (!empty($isThreadExist) && $isThreadExist['user_id'] == $request->user()->id) {
            Messages::where('threads_id', '=', $isThreadExist->id)
                ->where('receiver_id', '=', $request->user()->id)
                ->where('sender_status', '=', 'y')
                ->update(['status' => 'read']);

            $chatHistory = Messages::where('threads_id', '=', $request->threads_id)->where('sender_status', '=', 'y')->when($limit != "" && $offset != "", function ($q) use ($limit, $offset) {
                $q->limit($limit)->offset($offset);
            })->orderBy('id', 'DESC')->get();
        } else {
            Messages::where('threads_id', '=', $request->threads_id)
                ->where('receiver_id', '=', $request->user()->id)
                ->where('receiver_status', '=', 'y')
                ->update(['status' => 'read']);
            $chatHistory = Messages::where('threads_id', '=', $request->threads_id)->where('receiver_status', '=', 'y')->when($limit != "" && $offset != "", function ($q) use ($limit, $offset) {
                $q->limit($limit)->offset($offset);
            })->orderBy('id', 'DESC')->get();
        }
        $chat = array();
        $date = [];
        $i = 0;
        if (!empty($chatHistory)) {
            foreach ($chatHistory as $key => $value) {
                $chatHistory[$key]['sender_img'] = "";
                $chatHistory[$key]['sender_name'] = "";
                $chatHistory[$key]['receiver_img'] = "";
                $chatHistory[$key]['receiver_name'] = "";
                $senderImage = User::where('id', '=', $value->sender_id)->first();
                $reciverImage = User::where('id', '=', $value->receiver_id)->first();
                if (!empty($senderImage)) {
                    $chatHistory[$key]['sender_img'] = $senderImage['profile_image'];
                    $chatHistory[$key]['sender_name'] = $senderImage['name'];
                }
                if (!empty($reciverImage)) {
                    $chatHistory[$key]['receiver_img'] = $reciverImage['profile_image'];
                    $chatHistory[$key]['receiver_name'] = $reciverImage['name'];
                }
            }
        }
        $this->sendResponse(200, __('api.succ'), $chatHistory);
    }

    //get Thread ID
    public function getThreadID(Request $request)
    {
        $this->directValidation([
            'to_user_id' => ['required', 'exists:users,id'],
            'from_user_id' => ['required', 'exists:users,id']
        ]);
        $isThreadExist = Thread::where(function ($q) use ($request) {
            $q->where('user_id', '=', $request->from_user_id)
                ->orWhere('friend_id', '=', $request->from_user_id);
        })->where(function ($q) use ($request) {
            $q->where('user_id', '=', $request->to_user_id)
                ->orWhere('friend_id', '=', $request->to_user_id);
        })->first();
        $thread_id = 0;
        if (!empty($isThreadExist))
            $thread_id = $isThreadExist->id;
        $this->sendResponse(200, __('api.succ'), ['thread_id' => $thread_id]);
    }

}
