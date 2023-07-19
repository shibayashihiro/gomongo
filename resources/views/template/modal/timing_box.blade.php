@switch($web_content->template)
    @case('t1')
    <div class="wd-md-opening-blog-left">
        @foreach($web_content->working_hours as $time)
            <p>{{$time->day}}</p>
        @endforeach
    </div>
    <div class="wd-md-opening-blog-right ml-5">
        @foreach($web_content->working_hours as $time)
            @if($time->is_working == 1)
                <p>{{date('h:i A', strtotime($time->start_time))}}
                    - {{date('h:i A', strtotime($time->end_time))}}</p>
            @else
                <p>-</p>
            @endif
        @endforeach
    </div>
    @break
    @case('t3')
    @foreach($web_content->working_hours as $time)
        @if($time->is_working == 1)
            <p><span>{{$time->day}}</span> {{date('h:i A', strtotime($time->start_time))}}
                - {{date('h:i A', strtotime($time->end_time))}}</p>
        @else
            <p><span>{{$time->day}}</span> -</p>
        @endif
    @endforeach
    @break
    @case('t4')
    @foreach($web_content->working_hours as $time)
        @if($time->is_working == 1)
            <p>{{$time->day}}</p>
            <p>{{date('h:i A', strtotime($time->start_time))}}
                - {{date('h:i A', strtotime($time->end_time))}}</p>
        @else
            <p>{{$time->day}}</p>
            <p>-</p>
        @endif
    @endforeach
    @break
    @case('t5')
    @foreach($web_content->working_hours as $time)
        <p><span>{{$time->day}}</span>
            @if($time->is_working == 1)
                {{date('h:i A', strtotime($time->start_time))}}
                - {{date('h:i A', strtotime($time->end_time))}}
            @else
                -
            @endif
        </p>
    @endforeach
    @break
    @default
    <div class="wd-md-opening-blog-left">
        @foreach($web_content->working_hours as $time)
            <p>{{$time->day}}</p>
        @endforeach
    </div>
    <div class="wd-md-opening-blog-right ml-5">
        @foreach($web_content->working_hours as $time)
            @if($time->is_working == 1)
                <p>{{date('h:i A', strtotime($time->start_time))}}
                    - {{date('h:i A', strtotime($time->end_time))}}</p>
            @else
                <p>-</p>
            @endif
        @endforeach
    </div>
    @break
    @case('t10')
    <table class="table">
        @foreach($web_content->working_hours as $time)
            <tr>
                <td>{{$time->day}}</td>
                <td>
                    @if($time->is_working == 1)
                        {{date('h:i A', strtotime($time->start_time))}}
                        - {{date('h:i A', strtotime($time->end_time))}}
                    @else
                        -
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    @break
    @case('t11')
    @foreach($web_content->working_hours as $time)
        <p><span>{{$time->day}}</span>
            @if($time->is_working == 1)
                {{date('h:i A', strtotime($time->start_time))}}
                - {{date('h:i A', strtotime($time->end_time))}}
            @else
                -
            @endif
        </p>
    @endforeach
    @break
    @case('t12')
    @foreach($web_content->working_hours as $time)
        <div class="wd-day-time d-flex align-items-center justify-content-between">
            <p>{{$time->day}}</p>
            @if($time->is_working == 1)
                <p>{{date('h:i A', strtotime($time->start_time))}} - {{date('h:i A', strtotime($time->end_time))}}</p>
            @else
                <p>-</p>
            @endif
        </div>
    @endforeach
    @break
    @case('t13')
    @foreach($web_content->working_hours as $time)
        <li>
            <span>{{$time->day}}</span>
            @if($time->is_working == 1)
                <span>{{date('h:i A', strtotime($time->start_time))}} - {{date('h:i A', strtotime($time->end_time))}}</span>
            @else
                <span>-</span>
            @endif
        </li>
    @endforeach
    @break
    @case('t14')
    @foreach($web_content->working_hours as $time)
        <li>
            <span>{{$time->day}}</span>
            @if($time->is_working == 1)
                <span>{{date('h:i A', strtotime($time->start_time))}} - {{date('h:i A', strtotime($time->end_time))}}</span>
            @else
                <span>-</span>
            @endif
        </li>
    @endforeach
    @break
    @case('t15')
    @foreach($web_content->working_hours as $time)
        <div class="wd-day-time d-flex align-items-center justify-content-between">
            <p>{{$time->day}}</p>
            @if($time->is_working == 1)
                <p>{{date('h:i A', strtotime($time->start_time))}} - {{date('h:i A', strtotime($time->end_time))}}</p>
            @else
                <p>-</p>
            @endif
        </div>
    @endforeach
    @break
    @case('t16')
    @foreach($web_content->working_hours as $time)
        <li>
            <span>{{$time->day}}</span>
            @if($time->is_working == 1)
                <span>{{date('h:i A', strtotime($time->start_time))}}
                                - {{date('h:i A', strtotime($time->end_time))}}</span>
            @else
                <span>-</span>
            @endif
        </li>
    @endforeach
    @break
    @case('t17')
    @foreach($web_content->working_hours as $time)
        <li>
            <span>{{$time->day}}</span>
            @if($time->is_working == 1)
                <span>{{date('h:i A', strtotime($time->start_time))}} - {{date('h:i A', strtotime($time->end_time))}}</span>
            @else
                <span>-</span>
            @endif
        </li>
    @endforeach
    @break
    @case('t18')
        @foreach($web_content->working_hours as $time)
            <div class="wd-day-time-blog">
                <h6>{{$time->day}}</h6>
                @if($time->is_working == 1)
                    <p>{{date('h:i A', strtotime($time->start_time))}} - {{date('h:i A', strtotime($time->end_time))}}</p>
                @else
                    <p>-</p>
                @endif
            </div>
        @endforeach
    @break
    @case('t19')
        @foreach($web_content->working_hours as $time)
            <li>
                <span>{{$time->day}}</span>
                @if($time->is_working == 1)
                    <span>{{date('h:i A', strtotime($time->start_time))}} - {{date('h:i A', strtotime($time->end_time))}}</span>
                @else
                    <span>-</span>
                @endif
            </li>
        @endforeach
    @break
    @case('t20')
    @foreach($web_content->working_hours as $time)
        <div class="wd-day-time d-flex align-items-center justify-content-between">
            <p>
                            <span><svg width="9" height="11" viewBox="0 0 9 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M-4.06696e-07 2.69589C-4.66336e-07 1.33146 1.52297 0.519771 2.65562 1.28053L7.2543 4.36932C8.26428 5.04768 8.25913 6.53521 7.24448 7.20657L2.6458 10.2494C1.51237 10.9993 -7.92687e-08 10.1865 -1.38676e-07 8.82746L-4.06696e-07 2.69589Z" fill="#6A52FE"/>
                            </svg></span>{{$time->day}}
            </p>
            @if($time->is_working == 1)
                <p>{{date('h:i A', strtotime($time->start_time))}} - {{date('h:i A', strtotime($time->end_time))}}</p>
            @else
                <p>-</p>
            @endif
        </div>
    @endforeach
    @break
    @case('t21')
    <div class="col-md-4">
        <div class="wd-sl-footermenus">
            <div class="wd-kr-footeredit">
                @if(is_login_for_edit() == 1)
                    <a class="wd-edit-btn"
                       href="javascript:;"
                       onclick="getTimingModal('{{$web_content->id}}')"><img src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                @endif
                <h6><b>Opening</b> Hours</h6>
            </div>

            <ul class="mr-3 wd-sl-footertime">
                @foreach($web_content->working_hours as $key => $time)
                    @if($key >= 3)
                        <li>
                            <span>{{$time->day}}</span>
                            @if($time->is_working == 1)
                                <span>{{date('h:i A', strtotime($time->start_time))}} - {{date('h:i A', strtotime($time->end_time))}}</span>
                            @else
                                <span>-</span>
                            @endif
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-md-4">
        <div class="wd-sl-footermenus">
            <ul class="mr-3 wd-sl-footertime mt-5 pt-2">
                @foreach($web_content->working_hours as $key => $time)
                    @if($key < 3)
                        <li>
                            <span>{{$time->day}}</span>
                            @if($time->is_working == 1)
                                <span>{{date('h:i A', strtotime($time->start_time))}} - {{date('h:i A', strtotime($time->end_time))}}</span>
                            @else
                                <span>-</span>
                            @endif
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    @break
@endswitch
