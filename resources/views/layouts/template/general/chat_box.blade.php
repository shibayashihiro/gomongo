@if(is_login_for_edit() == 0)
    <div id="chat-bot">
        <div class="messenger br10">
            <div class="timestamp">04:45 AM</div>
            <div class="chatroom">
                <!-- msgs  -->
                @foreach($messages as $key=>$value)
                    @if($value['sender_type'] == 'guest')
                        <div class="msg msg-right">
                            <div class="bubble">
                                <h6 class="name">You</h6>
                                {{$value['message']}}
                            </div>
                        </div>
                    @else
                        <div class="msg msg-left">
                            <div class="bubble">
                                <h6 class="name">Support</h6>
                                {{$value['message']}}
                            </div>
                        </div>
                @endif
            @endforeach
            <!-- msgs  -->
            </div>
            <div class="type-area">
                <input type="text" id="msg" class="typing" placeholder="Type Here...">
                <span class="send" onclick="sendMsg()">
        <i class="fa fa-arrow-right"></i>
      </span>
            </div>
        </div>
        <div class="icon">
            <div class="user">

                Support
            </div>
            <i class="fab fa-facebook-messenger"></i>
        </div>
    </div>
@endif
