<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 f-logo">
                @if(is_login_for_edit() == 1)
                <a class="wd-edit-btn" href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','common','footer',{{json_encode(['Footer Text'=>'textarea','Footer Logo'=>'file'])}})"><img src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                @endif
                <a href="{{route('front.template.home', $domain_slug)}}"><img src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'footer_logo'))}}" alt="" class="common_footer_footer_logo"></a>
                <p class="common_footer_footer_text">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'footer_text')}}</p>
                <ul class="social">
                    <li>
                        <a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'facebook_url')}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'instagram_url')}}" target="_blank"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'twitter_url')}}" target="_blank"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'linkedin_url')}}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </li>
                    @if(is_login_for_edit() == 1)
                    <a class="wd-edit-btn" href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','common','footer',{{json_encode([
    'Facebook URL'=>'text',
    'Instagram URL'=>'text',
    'Twitter URL'=>'text',
    'Linkedin URL'=>'text',
    ])}})"><img src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                    @endif
                </ul>
            </div>
            <div class="col-lg-4 col-md-12 f-timing">
                <div class="wd-sl-footeredit">
                    @if(is_login_for_edit() == 1)
                    <a class="wd-edit-btn" href="javascript:;" onclick="getTimingModal('{{$web_content->id}}')"><img src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                    @endif
                    <h3>Opening Hours</h3>
                </div>
                <div class="wd-md-opening-blog d-flex align-items-center timing_box">
                    <div class="wd-md-opening-blog-left">
                        @foreach($web_content->working_hours as $time)
                        @php
                        $active = strcasecmp(date('l'), $time->day) == 0 ? 'class="active"' : '';
                        @endphp
                        <p {!! $active !!}>{{$time->day}}</p>
                        @endforeach
                    </div>
                    <div class="wd-md-opening-blog-right ml-5">
                        @foreach($web_content->working_hours as $time)
                        @php
                        $active = strcasecmp(date('l'), $time->day) == 0 ? 'class="active"' : '';
                        @endphp
                        @if($time->is_working == 1)
                        <p {!! $active !!}>{{date('h:i A', strtotime($time->start_time))}}
                            - {{date('h:i A', strtotime($time->end_time))}}</p>
                        @else
                        <p {!! $active !!}>-</p>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 f-contact">
                <div class="wd-sl-footeredit">
                    @if(is_login_for_edit() == 1)
                    <a class="wd-edit-btn" href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','common','footer',{{json_encode([
                            'Vat Number'=>'text',
                            'Company registration number'=>'text',
                            'FCA number'=>'text',
                            'Email Address'=>'text',
                            'Contact number'=>'text'
                            ])}})"><img src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                    @endif
                    <h3>Contact us</h3>
                </div>
                <p class="text-primary"><span>VAT Number</span><a href="javascript:;" class="common_footer_vat_number">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'vat_number')}}</a>
                </p>
                <p><span>Company Registration Number</span><a href="javascript:;" class="common_footer_company_registration_number">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'company_registration_number')}}</a>
                </p>
                <p><span>FCA Number</span><a href="javascript:;" class="common_footer_fca_number">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'fca_number')}}</a>
                </p>
                <p><span>Email Address</span><a href="mailto:{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email_address')}}" class="common_footer_email_address">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email_address')}}</a>
                </p>
                <p><span>Contact Number</span><a href="tel:{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'contact_number')}}" class="common_footer_contact_number">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'contact_number')}}</a>
                </p>
            </div>

        </div>
    </div>
</div>
<div class="copyright">
    <p>{{$web_content->copyright ?? ''}}</p>
</div>