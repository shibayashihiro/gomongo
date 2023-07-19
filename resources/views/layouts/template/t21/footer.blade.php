<div class="container">
    <div class="wd-sl-footer">
        <div class="row">
            <div class="col-md-4">
                <div class="wd-sl-footermenus">
                    <div class="wd-kr-footeredit">
                        @if(is_login_for_edit() == 1)
                        <a class="wd-edit-btn ml-2" href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','common','footer',{{json_encode([
                                'Email Address'=>'text',
                                'Contact number'=>'text',
                                'Address'=>'text',
                                'Facebook URL'=>'text',
                                'Instagram URL'=>'text',
                                'Twitter URL'=>'text',
                                'Linkedin URL'=>'text'
                                ])}})"><img src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                        @endif
                        <h6><b>AtoZ Cars</b></h6>
                    </div>

                    <ul class="wd-sl-linfoftr">
                        <li><span>Office Address :</span> <a class="common_footer_address">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'address')}}</a></li>
                        <hr>
                        <li><span>Phone Number :</span> <a class="common_footer_contact_number" href="tel:{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'contact_number')}}">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'contact_number')}}</a></li>
                        <li><span>Email Address :</span> <a class="common_footer_email_address" href="mailto:{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email_address')}}">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email_address')}}</a></li>
                        <hr>
                        <li>
                            Share us with your friends and family
                            <ul>
                                <li><a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'facebook_url')}}"><img src="{{asset('assets/web/template/t21/images')}}/facebook.png"></a></li>
                                <li><a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'instagram_url')}}"><img src="{{asset('assets/web/template/t21/images')}}/instagram.png"></a></li>
                                <li><a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'twitter_url')}}"><img src="{{asset('assets/web/template/t21/images')}}/twitter.png"></a></li>
                                <li><a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'linkedin_url')}}"><img src="{{asset('assets/web/template/t21/images')}}/linked.png"></a></li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="wd-sl-footermenus">
                    <div class="wd-kr-footeredit">
                        @if(is_login_for_edit() == 1)
                        <a class="wd-edit-btn" href="javascript:;" onclick="getTimingModal('{{$web_content->id}}')"><img src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                        @endif
                        <h6><b>Opening</b> Hours</h6>
                    </div>

                    <ul class="mr-3 wd-sl-footertime">
                        @foreach($web_content->working_hours as $key => $time)
                        @php
                        $active = strcasecmp(date('l'), $time->day) == 0 ? 'active' : '';
                        @endphp
                        @if($key >= 3)
                        <li class="{!! $active !!}">
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
                        @php
                        $active = strcasecmp(date('l'), $time->day) == 0 ? 'active' : '';
                        @endphp
                        @if($key < 3) <li class="{!! $active !!}">
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
        </div>
    </div>
    <p>© Copyright 2019 SuperbCode</p>
</div>