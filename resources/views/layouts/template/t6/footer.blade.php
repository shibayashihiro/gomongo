<div class="footer">
    <div class="container-fluid">
        <div class="footer-cont ">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12 f-logo">
                    <div class="wd-sl-footeredit">
                        @if(is_login_for_edit() == 1)
                        <a class="wd-edit-btn" href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','common','footer',{{json_encode(['Footer Address'=>'text','Footer Email'=>'text','Footer Mobile'=>'text','Footer Logo'=>'file'])}})"><img src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                        @endif
                        <h6><img src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'footer_logo'))}}" alt="" class="common_footer_footer_logo"></h6>
                    </div>
                    <div class="wd-md-address d-flex">
                        <div class="wd-md-svg">
                            <svg width="13" height="18" viewBox="0 0 13 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.2352 16.3265C12.2352 17.1353 9.49466 17.7885 6.11761 17.7885C2.74056 17.7885 0 17.1353 0 16.3265C0 15.6038 2.19578 15.009 5.07531 14.8867H7.15991C10.0422 15.009 12.2352 15.6038 12.2352 16.3265Z" fill="#E3E2E1" />
                                <path d="M6.11758 0C2.97678 0 0.430786 2.54321 0.430786 5.68401C0.430786 8.82481 6.11758 16.3266 6.11758 16.3266C6.11758 16.3266 11.8016 8.82481 11.8016 5.68401C11.8016 2.54321 9.25837 0 6.11758 0ZM6.11758 9.44741C4.03853 9.44741 2.35418 7.76305 2.35418 5.68401C2.35418 3.60497 4.03853 1.92061 6.11758 1.92061C8.19662 1.92061 9.88098 3.60497 9.88098 5.68401C9.88098 7.76305 8.19662 9.44741 6.11758 9.44741Z" fill="#FF5D02" />
                            </svg>
                        </div>
                        <P class="common_footer_footer_address">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'footer_address')}}</p>
                    </div>
                    <div class="wd-md-address d-flex">
                        <div class="wd-md-svg">
                            <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.43005 0.783203H14.4301V12.7832H2.43005V0.783203Z" fill="#ECEFF1" />
                                <path d="M8.43005 8.04373L14.4301 12.7817V3.42773L8.43005 8.04373Z" fill="#CFD8DC" />
                                <path d="M14.9301 0.783203H14.4301L8.43005 5.5212L2.43005 0.783203H1.93005C1.53223 0.783203 1.1507 0.941238 0.869394 1.22254C0.588089 1.50385 0.430054 1.88538 0.430054 2.2832L0.430054 11.2832C0.430054 11.681 0.588089 12.0626 0.869394 12.3439C1.1507 12.6252 1.53223 12.7832 1.93005 12.7832H2.43005V3.4292L8.43005 8.0442L14.4301 3.4282V12.7832H14.9301C15.3279 12.7832 15.7094 12.6252 15.9907 12.3439C16.272 12.0626 16.4301 11.681 16.4301 11.2832V2.2832C16.4301 1.88538 16.272 1.50385 15.9907 1.22254C15.7094 0.941238 15.3279 0.783203 14.9301 0.783203Z" fill="#FF5D02" />
                            </svg>
                        </div>
                        <a href="mailto:{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'footer_email')}}" class="common_footer_footer_email">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'footer_email')}}</a>
                    </div>
                    <div class="wd-md-address d-flex">
                        <div class="wd-md-svg">
                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.2508 10.1765L11.2035 9.94271C10.7118 9.88629 10.2282 10.0556 9.8816 10.4021L8.39853 11.8852C6.1175 10.7245 4.24754 8.86265 3.08687 6.57355L4.57801 5.08242C4.92459 4.73583 5.09386 4.25222 5.03744 3.76055L4.80369 1.72939C4.70697 0.915308 4.02185 0.302734 3.19972 0.302734H1.8053C0.894504 0.302734 0.136847 1.06039 0.193269 1.97119C0.620458 8.85459 6.12556 14.3516 13.0009 14.7788C13.9117 14.8352 14.6693 14.0776 14.6693 13.1668V11.7724C14.6774 10.9583 14.0648 10.2732 13.2508 10.1765Z" fill="#FF5D02" />
                            </svg>
                        </div>
                        <a href="tel:{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'footer_email')}}" class="common_footer_footer_mobile">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'footer_mobile')}}</a>
                    </div>
                </div>
                <div class="col-lg-2 col-lg-2 col-md-6 col-12 wd-md-links">
                    <h3>LINKS</h3>
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Testimonials</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Career</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-12 f-timing">
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
                <div class="col-lg-4 col-md-6 col-12  f-contact">
                    <h6>HELP CENTER</h6>
                    <p>Subscribe to our newsletter to get the latest cars discount promotions and other latest news stay
                        updated.</p>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Enter your email">
                        <a href="javascript:;">
                            <svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d)">
                                    <rect x="12.7612" y="8.90625" width="39.4852" height="39.4823" rx="3" fill="#FF5D02" />
                                </g>
                                <path d="M28.3872 28.1259L28.6839 37.694L44.3712 20.3008L28.3872 28.1259Z" fill="white" />
                                <path d="M20.6367 20.9327L28.091 27.4228L44.112 19.5977L20.6367 20.9327Z" fill="white" />
                                <defs>
                                    <filter id="filter0_d" x="0.76123" y="0.90625" width="63.4851" height="63.4824" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset dy="4" />
                                        <feGaussianBlur stdDeviation="6" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 0.364706 0 0 0 0 0.00784314 0 0 0 0.25 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape" />
                                    </filter>
                                </defs>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="container-fluid">
    <div class="copyright">
        <ul class="social">
            <li><a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'facebook_url')}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'instagram_url')}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <li><a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'twitter_url')}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'linkedin_url')}}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
            @if(is_login_for_edit() == 1)
            <a class="wd-edit-btn" href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','common','footer',{{json_encode([
                    'Facebook URL'=>'text',
                    'Instagram URL'=>'text',
                    'Twitter URL'=>'text',
                    'Linkedin URL'=>'text',
                    ])}})"><img src="{{asset('assets/web/images/edit-btn.png')}}"></a>
            @endif
        </ul>
        <p>{{$web_content->copyright ?? ''}}</p>
    </div>
</div>