<div class="wd-md-footer-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="wd-md-foot-nav">
                    <div class="wd-kr-footeredit">
                        <h6><strong>Quick</strong> Nav
                            <svg width="59" height="2" viewBox="0 0 59 2" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="59" height="2" fill="#60BC4C" />
                            </svg>
                        </h6>
                    </div>
                    <ul>
                        <li><a href="{{ route('front.template.home', $domain_slug) }}">Home</a></li>
                        <li><a href="{{ route('front.template.stock_list', $domain_slug) }}">Stock List</a></li>
                        <li><a href="j{{ route('front.template.finance', $domain_slug) }}">Finance</a></li>
                        {{-- <li><a href="javascript:;">Search Car</a></li> --}}
                        <li><a href="{{ route('front.template.contact_us', $domain_slug) }}">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="wd-md-opening-hours">
                    <div class="wd-kr-footeredit">
                        @if (is_login_for_edit() == 1)
                            <a class="wd-edit-btn" href="javascript:;"
                                onclick="getTimingModal('{{ $web_content->id }}')"><img
                                    src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                        @endif
                        <h6><strong>Opening</strong> Hours
                            <svg width="59" height="2" viewBox="0 0 59 2" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="59" height="2" fill="#60BC4C" />
                            </svg>
                        </h6>
                    </div>
                    <div class="timing_box">
                        @foreach ($web_content->working_hours as $time)
                            @php
                                $active = strcasecmp(date('l'), $time->day) == 0 ? 'active' : '';
                            @endphp
                            <div
                                class="wd-day-time d-flex align-items-center justify-content-between {!! $active !!}">
                                <p>{{ $time->day }}</p>
                                @if ($time->is_working == 1)
                                    <p>{{ date('h:i A', strtotime($time->start_time)) }} -
                                        {{ date('h:i A', strtotime($time->end_time)) }}</p>
                                @else
                                    <p>-</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="wd-md-address-blog">
                    <div class="wd-kr-footeredit">
                        @if (is_login_for_edit() == 1)
                            <a class="wd-edit-btn" href="javascript:;"
                                onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','footer',{{ json_encode([
                                    'Email Address' => 'text',
                                    'Contact number' => 'text',
                                    'Address' => 'text',
                                    'Facebook URL' => 'text',
                                    'Instagram URL' => 'text',
                                    'Twitter URL' => 'text',
                                    'Linkedin URL' => 'text',
                                    'Footer Logo' => 'file',
                                ]) }})"><img
                                    src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                        @endif
                        <div class="wd-footer-logo">
                            <img src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'footer_logo')) }}"
                                class="img-fluid">
                        </div>
                    </div>
                    <div class="wd-office-address">
                        <p><span>Office Address :</span> <span
                                class="common_footer_address">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'address') }}</span>
                        </p>
                    </div>
                    <hr>
                    <div class="wd-md-phone-email-blog">
                        <p><span>Phone Number : </span><a class="common_footer_contact_number"
                                href="tel:{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'contact_number') }}">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'contact_number') }}</a>
                        </p>
                        <p><span>Email Address : </span><a class="common_footer_email_address"
                                href="mailto:{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email_address') }}">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email_address') }}</a>
                        </p>
                    </div>
                    <hr>
                    <div class="wd-footer-social-media">
                        <p>Share us with your friends and family</p>
                        <div class="wd-md-social-media">
                            <ul class="d-flex align-items-center">
                                <li class="wd-social-icon"><a
                                        href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'facebook_url') }}"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li class="wd-social-icon"><a
                                        href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'instagram_url') }}"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li class="wd-social-icon"><a
                                        href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'twitter_url') }}"><i
                                            class="fab fa-twitter"></i></a></li>
                                <li class="wd-social-icon"><a
                                        href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'linkedin_url') }}"><i
                                            class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
