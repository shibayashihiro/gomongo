<div class="footer">
    <div class="container-fluid">
        <div class="footer-cont ">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12 f-logo">
                    <h6>CONTACT US</h6>
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
                    <div class="wd-md-address d-flex">
                        <div class="wd-md-svg">
                            <svg width="15" height="16" viewBox="0 0 15 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.77497 4.85205C4.32338 3.16659 5.34115 1.42711 7.04622 0.970194C8.7513 0.513277 10.5024 1.51093 10.9542 3.19639C11.4058 4.88209 10.3881 6.62157 8.68298 7.07849C6.9779 7.5354 5.22679 6.53774 4.77497 4.85205ZM10.7725 7.95162C12.9949 8.5975 14.8933 10.9972 14.8933 13.8365V14.6174C14.8933 15.0486 14.5432 15.3984 14.1122 15.3984H1.61701C1.18601 15.3984 0.835938 15.0486 0.835938 14.6174V13.8365C0.835938 10.9972 2.73435 8.5975 4.95667 7.95162C5.16356 7.89154 5.43854 7.98118 5.57033 8.15173C5.91338 8.59605 6.8323 9.08059 7.8646 9.08059C8.89691 9.08059 9.81583 8.59605 10.1589 8.15173C10.2907 7.98118 10.5656 7.89154 10.7725 7.95162Z"
                                    fill="#0DEEB8"/>
                            </svg>
                        </div>
                        <div class="wd-md-foot-num">
                            <p><span>VAT Number</span><span
                                    class="common_footer_vat_number">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'vat_number')}}</span>
                            </p>
                            <p><span>FCA Number</span><span
                                    class="common_footer_fca_number">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'fca_number')}}</span>
                            </p>
                            <p><span>CR Number</span><span
                                    class="common_footer_company_registration_number">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'company_registration_number')}}</span>
                            </p>
                        </div>
                    </div>
                    <div class="wd-md-address d-flex">
                        <div class="wd-md-svg">
                            <svg width="17" height="13" viewBox="0 0 17 13" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.3643 0.214844H14.8643L8.86426 4.95284L2.86426 0.214844H2.36426C1.96643 0.214844 1.5849 0.372879 1.3036 0.654184C1.02229 0.935488 0.864258 1.31702 0.864258 1.71484L0.864258 10.7148C0.864258 11.1127 1.02229 11.4942 1.3036 11.7755C1.5849 12.0568 1.96643 12.2148 2.36426 12.2148H2.86426V2.86084L8.86426 7.47584L14.8643 2.85984V12.2148H15.3643C15.7621 12.2148 16.1436 12.0568 16.4249 11.7755C16.7062 11.4942 16.8643 11.1127 16.8643 10.7148V1.71484C16.8643 1.31702 16.7062 0.935488 16.4249 0.654184C16.1436 0.372879 15.7621 0.214844 15.3643 0.214844Z"
                                    fill="#0DEEB8"/>
                            </svg>

                        </div>
                        <a href="mailto:{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email_address')}}"
                           class="common_footer_email_address">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email_address')}}</a>

                    </div>
                    <div class="wd-md-address d-flex">
                        <div class="wd-md-svg">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.6855 10.6589L11.6382 10.4251C11.1465 10.3687 10.6629 10.538 10.3163 10.8846L8.83322 12.3676C6.55219 11.207 4.68223 9.34507 3.52157 7.05598L5.0127 5.56484C5.35929 5.21825 5.52855 4.73464 5.47213 4.24297L5.23838 2.21181C5.14166 1.39773 4.45655 0.785156 3.63441 0.785156H2.24C1.3292 0.785156 0.57154 1.54281 0.627961 2.45361C1.05515 9.33701 6.56025 14.834 13.4356 15.2612C14.3464 15.3177 15.104 14.56 15.104 13.6492V12.2548C15.1121 11.4407 14.4995 10.7556 13.6855 10.6589Z"
                                    fill="#0DEEB8"/>
                            </svg>

                        </div>
                        <a href="tel:{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'contact_number')}}"
                           class="common_footer_contact_number">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'contact_number')}}</a>
                    </div>
                </div>
                <div class="col-lg-2 col-lg-2 col-md-6 col-12 wd-md-links">
                    <h3>LINKS</h3>
                    <ul>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact us</a></li>
                        <li><a href="">Testimonials</a></li>
                        <li><a href="">Blog</a></li>
                        <li><a href="">Career</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-12 f-timing">
                    <h3>Opening Hours</h3>
                    @if(is_login_for_edit() == 1)
                        <a class="wd-edit-btn"
                           href="javascript:;"
                           onclick="getTimingModal('{{$web_content->id}}')"><img
                                src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                    @endif
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
                    <h6>NEWSLETTER</h6>
                    <p>Enter your email address below to subscribe to my newsletter.</p>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Enter your email..">
                        <a href="javascript:;">Subscribe</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="copyright">
        <h3>CONNECT WITH SOCIAL</h3>
        <ul class="social">
            <li><a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'facebook_url')}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'instagram_url')}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <li><a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'twitter_url')}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'linkedin_url')}}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
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
<hr>
<p class="copy-right">{{$web_content->copyright ?? ''}}</p>
