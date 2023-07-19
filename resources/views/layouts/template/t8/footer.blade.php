<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="footer-cont">
                <div class="col-lg-3 col-md-12 f-contact">
                    <div class="wd-sl-footeredit">
                        @if(is_login_for_edit() == 1)
                            <a class="wd-edit-btn"
                               href="javascript:;"
                               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','common','footer',{{json_encode([
                                'Vat Number'=>'text',
                                'Company registration number'=>'text',
                                'FCA number'=>'text',
                                'Email Address'=>'text',
                                'Contact number'=>'text',
                                ])}})"><img
                                    src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                        @endif
                        <h3>Contact us</h3>
                    </div>
                    <div class="f-cont-row">
                        <span><img src="{{asset('assets/web/template/t8/images/f-c-icon1.png')}}" alt=""></span>
                        <div class="c-nomber">
                            <p>VAT Number <span
                                    class="common_footer_vat_number">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'vat_number')}}</span>
                            </p>
                            <p>FCA Number <span
                                    class="common_footer_fca_number">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'fca_number')}}</span>
                            </p>
                            <p>CR Number <span
                                    class="common_footer_company_registration_number">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'company_registration_number')}}</span>
                            </p>
                        </div>
                    </div>
                    <div class="f-cont-row">
                        <span><img src="{{asset('assets/web/template/t8/images/f-c-icon2.png')}}" alt=""></span>
                        <a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email_address')}}"
                           class="common_footer_email_address">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email_address')}}</a>
                    </div>
                    <div class="f-cont-row">
                        <span><img src="{{asset('assets/web/template/t8/images/f-c-icon3.png')}}" alt=""></span>
                        <a href="tel:{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'contact_number')}}"
                           class="common_footer_contact_number">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'contact_number')}}</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 f-link">
                    <h3>LINKS</h3>
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Testimonials</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Career</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-12 f-timing">
                    <div class="wd-sl-footeredit">
                        @if(is_login_for_edit() == 1)
                            <a class="wd-edit-btn"
                               href="javascript:;"
                               onclick="getTimingModal('{{$web_content->id}}')"><img
                                    src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                        @endif
                        <h3>Opening Hours</h3>                        
                    </div>
                    <div class="timing_box">
                        @foreach($web_content->working_hours as $time)
                        @php
                        $active = strcasecmp(date('l'), $time->day) == 0 ? 'class="active"' : '';
                        @endphp
                        <p {!! $active !!}><span>{{$time->day}}</span>
                            @if($time->is_working == 1)
                            {{date('h:i A', strtotime($time->start_time))}}
                            - {{date('h:i A', strtotime($time->end_time))}}
                            @else
                            -
                            @endif
                        </p>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 f-newsletter">
                    <h3>NEWSLETTER</h3>
                    <p>Enter your email address below to subscribe to my newsletter.</p>
                    <form>
                        <div class="news-row">
                            <input type="text" placeholder="Enter your email...">
                        </div>
                        <div class="news-row">
                            <button class="y-btn">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row connect-social">
            <h3>CONNECT WITH SOCIAL</h3>
            <ul class="social">
                <li><a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'facebook_url')}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'instagram_url')}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                <li><a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'twitter_url')}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li><a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'linkedin_url')}}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </li>
                @if(is_login_for_edit() == 1)
                    <a class="wd-edit-btn"
                       href="javascript:;"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','common','footer',{{json_encode([
    'Facebook URL'=>'text',
    'Instagram URL'=>'text',
    'Twitter URL'=>'text',
    'Linkedin URL'=>'text',
    ])}})"><img
                            src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                @endif
            </ul>
        </div>
    </div>
</div>
<div class="copyright">
    <div class="container-fluid">
        <div class="copyright-cont">
            <p>{{$web_content->copyright ?? ''}}</p>
        </div>
    </div>
</div>
