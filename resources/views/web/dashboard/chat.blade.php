@extends('layouts.web.dashboard.app')
@section('header_css')
    <style>
        /* chat-bot	 start */
        #chat-bot {
            height: auto;
            float: right;
        }

        #chat-bot .icon {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            cursor: pointer;
            color: #ffffff;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            width: 50px;
            height: 50px;
            float: right;
            border-radius: 10px;
            padding: 10px 15px;
            transition: 0.3s all;
            box-shadow: 0 30px 50px #0000000d;
            overflow: hidden;
        }

        #chat-bot .icon:hover {
            box-shadow: 0 5px 20px rgb(209 231 221);
        }

        #chat-bot .icon .user {
            visibility: hidden;
            margin-left: -65px;
        }

        #chat-bot .icon.expanded {
            width: 270px;
            justify-content: space-between;
        }

        #chat-bot .messenger.expanded {
            visibility: visible;
            height: 389px;
            width: 270px;
        }

        #chat-bot .icon.expanded .user {
            visibility: visible;
            margin-left: 0;
            transition: 0.5s;
        }

        #chat-bot .messenger {
            background-color: #fff;
            border: 1px solid #0f513238;
            box-shadow: 0 30px 50px #0000000d;
            padding: 10px;
            margin-bottom: 10px;
            height: 390px;
            border-radius: 10px;
            overflow: hidden;
            transition: height 0.7s;
            width: 0;
            height: 0;
        }

        #chat-bot .chatroom {
            height: 290px;
            overflow-y: scroll;
            display: flex;
            flex-direction: column;
            touch-action: pan-y;
        }

        #chat-bot .chatroom::-webkit-scrollbar {
            display: none;
        }

        #chat-bot .type-area input.typing {
            width: 100%;
            outline: none !important;
            border: 1px solid rgb(227 230 234);
            border-radius: 5px;
            padding: 8px 40px 8px 14px;
            height: 40px;
            font-size: 12px;
        }

        #chat-bot .type-area {
            position: relative;
            overflow: hidden;
            box-shadow: 0 5px 12px rgb(0 0 0 / 3%);
            margin-top: 10px;
        }

        #chat-bot .type-area span.send {
            position: absolute;
            right: 14px;
            top: 9px;
            cursor: pointer;
            font-size: 18px;
        }

        #chat-bot .msg {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
            font-size: 12px;
            color: #7c8089;
        }

        #chat-bot .msg .bubble {
            padding: 10px;
            border-radius: 5px;
            background-color: #e0f2ff;
        }

        #chat-bot .msg.msg-right .bubble {
            color: rgb(15 81 50);
            background-color: rgb(209 231 221);
        }

        #chat-bot .msg .bubble .name {
            color: #393d4a;
            font-size: 12px;
            font-weight: 500;
        }

        .msg.msg-left {
            align-items: flex-start;
        }

        .msg.msg-right {
            align-items: flex-end;
        }

        #chat-bot .timestamp {
            font-size: 12px;
            color: #7c8089;
            text-align: center;
            margin-bottom: 10px;
        }

        #chat-bot .messenger {
            width: 100% !important;
        }

        /* chat-bot	 end */

    </style>
@endsection
@section('content')
    <div class="wd-md-rightbar">
        <div class="wd-md-topbar">
            <h2>{{$title}}</h2>
        </div>
        <div class="wd-sl-myweb">
            <div class="row flex-space-between">
                @foreach($data as $key=>$value)
                    <div class="col-md-4">
                        <div id="chat-bot">
                            <div class="messenger expanded br10">
                                <div class="timestamp">04:45 AM</div>
                                <div class="chatroom chat-room_{{$value->guest_id}}">
                                @foreach($value->messages as $mkey=>$msg)
                                    <!-- msgs  -->
                                        @if($msg->sender_type == 'guest')
                                            <div class="msg msg-left">
                                                <div class="bubble">
                                                    <h6 class="name">User {{($key+1)}}</h6>
                                                    {{$msg->message}}
                                                </div>
                                            </div>
                                        @else
                                            <div class="msg msg-right">
                                                <div class="bubble">
                                                    {{$msg->message}}
                                                </div>
                                            </div>
                                    @endif
                                @endforeach
                                <!-- msgs  -->
                                </div>
                                <div class="type-area">
                                    <input type="text" class="typing" id="msg_{{$value->guest_id}}"
                                           placeholder="Type Here...">
                                    <span class="send"
                                          onclick="sendMsg('{{$value->guest_id}}','{{$value->guestToken->token}}')">
                                        <i class="fa fa-arrow-right"></i>
                                      </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script>
        //let conn = new WebSocket('ws:/localhost:8080');
        let conn = new WebSocket('wss://www.gomongo.co.uk/ws/');
        conn.onopen = function (e) {
            console.log("Connection established!");
            conn.send('{"command": "register","userId":"{{$browserToken}}"}');
        };
        $('#msg').on("keypress", function (e) {
            if (e.keyCode === 13) {
                sendMsg();
                return false; // prevent the button click from happening
            }
        });

        function sendMsg(to, token) {
            let d = new Date();
            let msg = $('#msg_' + to).val();
            conn.send('{"command": "message","from":"{{$browserToken}}","to":"' + token + '","message":"' + msg + '","from_type":"user"}');
            $('#msg_' + to).val('');
            let appendHtml = msg;
            let html = `<div class="msg msg-right">
                <div class="bubble">
                    <h6 class="name">You</h6>
                    ${msg}
                </div>
            </div>`;
            $('.chat-room_' + to).append(html);
            $(".chat-room_" + to).animate({scrollTop: $('.wd-kr-msg-body').prop("scrollHeight")}, 1000);
        }

        conn.onmessage = function (e) {
            let msg = JSON.parse(e.data);
            console.log(msg);
            if (msg.type === 'message') {
                let html = `<div class="msg msg-left">
                <div class="bubble">
                    <h6 class="name">Support</h6>
                    ${msg.message}
                </div>
            </div>`;
                $(".chat-room_" + msg.to).append(html);
            }
        };
    </script>
@endsection
