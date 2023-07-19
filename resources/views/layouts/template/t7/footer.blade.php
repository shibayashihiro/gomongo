<div class="footer">
    <div class="container-fluid">
        <div class="footer-cont ">
            <div class="row">
                <div class="col-lg-3 col-md-12 f-logo">
                    <div class="d-flex align-items-center pb-4">
                        @if(is_login_for_edit() == 1)
                            <a class="wd-edit-btn"
                               href="javascript:;"
                               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','common','footer',{{json_encode(['Footer Name'=>'text','Footer Logo'=>'file'])}})"><img
                                    src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                        @endif
                        <a href="#" class="mb-0"><img
                                src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'footer_logo'))}}"
                                alt="" class="common_footer_footer_logo" width="80%"></a>
                        <h3 class="mb-0 common_footer_footer_name">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'footer_name')}}</h3>
                    </div>
                    <div class="d-flex align-items-baseline">
                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.94684 4.44189C3.49525 2.75644 4.51302 1.01695 6.2181 0.560037C7.92318 0.103121 9.67429 1.10078 10.1261 2.78623C10.5777 4.47193 9.55994 6.21141 7.85486 6.66833C6.14978 7.12525 4.39867 6.12759 3.94684 4.44189ZM9.94442 7.54146C12.1667 8.18735 14.0651 10.587 14.0651 13.4264V14.2072C14.0651 14.6384 13.7151 14.9883 13.2841 14.9883H0.788883C0.357889 14.9883 0.0078125 14.6384 0.0078125 14.2072V13.4264C0.0078125 10.587 1.90622 8.18735 4.12854 7.54146C4.33544 7.48138 4.61041 7.57102 4.74221 7.74158C5.08526 8.18589 6.00418 8.67043 7.03648 8.67043C8.06878 8.67043 8.9877 8.18589 9.33075 7.74158C9.46255 7.57102 9.73752 7.48138 9.94442 7.54146Z"
                                fill="#0988FF"></path>
                        </svg>
                        <ul class="ml-2">
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
                            <li><p>VAT Number &nbsp; <span
                                        class="common_footer_vat_number">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'vat_number')}}</span>
                                </p></li>
                            <li><p>FCA Number &nbsp; <span
                                        class="common_footer_fca_number">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'fca_number')}}</span>
                                </p></li>
                            <li><p>CR Number &nbsp; <span
                                        class="common_footer_company_registration_number">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'company_registration_number')}}</span>
                                </p></li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-center pt-2 pb-2">
                        <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.00781 0.0078125H14.0078V12.0078H2.00781V0.0078125Z" fill="#ECEFF1"/>
                            <path d="M8.00781 7.26834L14.0078 12.0063V2.65234L8.00781 7.26834Z" fill="#CFD8DC"/>
                            <path
                                d="M14.5078 0.0078125H14.0078L8.00781 4.74581L2.00781 0.0078125H1.50781C1.10999 0.0078125 0.728457 0.165848 0.447152 0.447152C0.165848 0.728457 0.0078125 1.10999 0.0078125 1.50781L0.0078125 10.5078C0.0078125 10.9056 0.165848 11.2872 0.447152 11.5685C0.728457 11.8498 1.10999 12.0078 1.50781 12.0078H2.00781V2.65381L8.00781 7.26881L14.0078 2.65281V12.0078H14.5078C14.9056 12.0078 15.2872 11.8498 15.5685 11.5685C15.8498 11.2872 16.0078 10.9056 16.0078 10.5078V1.50781C16.0078 1.10999 15.8498 0.728457 15.5685 0.447152C15.2872 0.165848 14.9056 0.0078125 14.5078 0.0078125Z"
                                fill="#0988FF"/>
                        </svg>
                        <ul class="ml-2">
                            <li><p>
                                    <a href="mailto:{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email_address')}}"
                                       class="common_footer_email_address">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email_address')}}</a>
                                </p></li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-center">
                        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.0683 10.6511L11.021 10.4173C10.5293 10.3609 10.0457 10.5302 9.69911 10.8767L8.21604 12.3598C5.93501 11.1992 4.06504 9.33725 2.90438 7.04816L4.39551 5.55703C4.7421 5.21044 4.91136 4.72683 4.85494 4.23516L4.6212 2.204C4.52447 1.38992 3.83936 0.777344 3.01722 0.777344H1.62281C0.712009 0.777344 -0.0456479 1.535 0.0107734 2.4458C0.437963 9.3292 5.94307 14.8262 12.8184 15.2534C13.7292 15.3098 14.4869 14.5522 14.4869 13.6414V12.247C14.4949 11.4329 13.8823 10.7478 13.0683 10.6511Z"
                                fill="#0988FF"/>
                        </svg>
                        <ul class="ml-2">
                            <li><p>
                                    <a href="tel:{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'contact_number')}}"
                                       class="common_footer_contact_number">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'contact_number')}}</a>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-12 f-timing mt-3">
                    <h3>LINKS</h3>
                    <ul class="pt-2 wd-sl-footlinks">
                        <li>
                            <a href="javascript:;">About</a>
                        </li>
                        <li>
                            <a href="javascript:;">Contact us</a>
                        </li>
                        <li>
                            <a href="javascript:;">Testimonials</a>
                        </li>
                        <li>
                            <a href="javascript:;">Blog</a>
                        </li>
                        <li>
                            <a href="javascript:;">Career</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-12 f-timing mt-3">
                    <div class="wd-sl-footeredit">
                        @if(is_login_for_edit() == 1)
                            <a class="wd-edit-btn"
                               href="javascript:;"
                               onclick="getTimingModal('{{$web_content->id}}')"><img
                                    src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                        @endif
                        <h3>OPENING HOURS</h3>
                    </div>                   
                    <ul class="pt-2 wd-sl-footlinks timing_box">
                        @foreach($web_content->working_hours as $time)
                            @php
                            $active = strcasecmp(date('l'), $time->day) == 0 ? 'class="active"' : '';
                            @endphp
                            <li>
                                <p {!! $active !!}>{{$time->day}}</p>
                                @if($time->is_working == 1)
                                    <p {!! $active !!}>{{date('h:i A', strtotime($time->start_time))}}
                                        - {{date('h:i A', strtotime($time->end_time))}}</p>
                                @else
                                    <p {!! $active !!}>-</p>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-3 col-md-12 f-contact mt-3">
                    <h3>HELP CENTER</h3>
                    <p class="pt-2">Subscribe to our newsletter to get the latest cars discount promotions and other
                        latest news stay updated.</p>
                    <div class="form-group wd-sl-conform">
                        <input type="text" name="text" class="form-control" placeholder="Enter your email">
                        <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_d)">
                                <rect x="12.0022" y="8.24219" width="39.4852" height="39.4823" rx="3" fill="#0988FF"/>
                            </g>
                            <path d="M27.6282 27.4618L27.9249 37.03L43.6122 19.6367L27.6282 27.4618Z" fill="white"/>
                            <path d="M19.8777 20.2687L27.3319 26.7587L43.353 18.9336L19.8777 20.2687Z" fill="white"/>
                            <defs>
                                <filter id="filter0_d" x="0.00219727" y="0.242188" width="63.4851" height="63.4805"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                   values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                   result="hardAlpha"/>
                                    <feOffset dy="4"/>
                                    <feGaussianBlur stdDeviation="6"/>
                                    <feComposite in2="hardAlpha" operator="out"/>
                                    <feColorMatrix type="matrix"
                                                   values="0 0 0 0 0.0352941 0 0 0 0 0.533333 0 0 0 0 1 0 0 0 0.22 0"/>
                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                                </filter>
                            </defs>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="copyright">
    <div class="container-fluid">
        <div class="footer-flex">
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
            <p>{{$web_content->copyright ?? ''}}</p>
        </div>
    </div>
</div>
