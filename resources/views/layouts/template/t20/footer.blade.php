<div class="wd-md-footer-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="wd-md-address-blog">
                    <div class="wd-address-title d-flex">
                        <h6>Contact us</h6>
                        @if (is_login_for_edit() == 1)
                            <a class="wd-edit-btn ml-2" href="javascript:;"
                                onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','footer',{{ json_encode([
                                    'Email Address' => 'text',
                                    'Contact number' => 'text',
                                    'Address' => 'text',
                                    'Facebook URL' => 'text',
                                    'Instagram URL' => 'text',
                                    'Twitter URL' => 'text',
                                    'Linkedin URL' => 'text',
                                ]) }})"><img
                                    src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                        @endif
                    </div>
                    <div class="wd-office-address d-flex">
                        <span><svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.8202 7.22163L7.52017 0.221552C7.25487 -0.0738508 6.74526 -0.0738508 6.47996 0.221552L0.179891 7.22163C0.0892091 7.32215 0.0296862 7.44684 0.00855973 7.58056C-0.0125668 7.71428 0.00561318 7.85126 0.0608893 7.97484C0.17289 8.22754 0.423493 8.38994 0.699996 8.38994H2.10001V13.29C2.10001 13.4756 2.17376 13.6537 2.30504 13.785C2.43632 13.9163 2.61437 13.99 2.80002 13.99H4.90004C5.08569 13.99 5.26374 13.9163 5.39502 13.785C5.5263 13.6537 5.60005 13.4756 5.60005 13.29V10.49H8.40008V13.29C8.40008 13.4756 8.47383 13.6537 8.60511 13.785C8.73638 13.9163 8.91443 13.99 9.10009 13.99H11.2001C11.3858 13.99 11.5638 13.9163 11.6951 13.785C11.8264 13.6537 11.9001 13.4756 11.9001 13.29V8.38994H13.3001C13.4357 8.39052 13.5685 8.35164 13.6824 8.27804C13.7962 8.20444 13.8862 8.09931 13.9413 7.97546C13.9965 7.85161 14.0144 7.71439 13.9929 7.58054C13.9714 7.44669 13.9114 7.32198 13.8202 7.22163Z"
                                    fill="#6A52FE" />
                            </svg></span>
                        <div class="wd-office-address-detail">
                            <h6>Office Address</h6>
                            <p class="common_footer_address">
                                {{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'address') }}
                            </p>
                        </div>
                    </div>
                    <div class="wd-md-phone-email-blog d-flex">
                        <span><svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14 11.0568C14 11.2358 13.9669 11.4695 13.9006 11.7578C13.8343 12.0462 13.7647 12.2732 13.6918 12.4389C13.5526 12.7704 13.1482 13.1217 12.4787 13.4929C11.8556 13.831 11.2391 14 10.6293 14C10.4503 14 10.2746 13.9884 10.1023 13.9652C9.92992 13.942 9.73935 13.9006 9.53054 13.8409C9.32173 13.7812 9.16596 13.7332 9.06321 13.6967C8.96046 13.6603 8.77652 13.5923 8.51136 13.4929C8.24621 13.3935 8.08381 13.3338 8.02415 13.3139C7.37453 13.0819 6.79451 12.8068 6.28409 12.4886C5.44223 11.965 4.56723 11.2491 3.65909 10.3409C2.75095 9.43277 2.03504 8.55777 1.51136 7.71591C1.19318 7.20549 0.918087 6.62547 0.68608 5.97585C0.666193 5.91619 0.606534 5.75379 0.507102 5.48864C0.40767 5.22348 0.339725 5.03954 0.303267 4.93679C0.266809 4.83404 0.21875 4.67827 0.159091 4.46946C0.0994318 4.26065 0.0580019 4.07008 0.0348011 3.89773C0.0116004 3.72538 0 3.54972 0 3.37074C0 2.76089 0.169034 2.14441 0.507102 1.52131C0.878314 0.851799 1.22964 0.447443 1.56108 0.308239C1.7268 0.235322 1.95384 0.16572 2.24219 0.0994318C2.53054 0.0331439 2.7642 0 2.94318 0C3.03598 0 3.10559 0.00994318 3.15199 0.0298295C3.27131 0.0696023 3.44697 0.321496 3.67898 0.785511C3.75189 0.911458 3.85133 1.09044 3.97727 1.32244C4.10322 1.55445 4.21922 1.76491 4.32528 1.95384C4.43134 2.14276 4.53409 2.32008 4.63352 2.4858C4.65341 2.51231 4.71141 2.59517 4.80753 2.73438C4.90365 2.87358 4.97491 2.99124 5.02131 3.08736C5.06771 3.18348 5.09091 3.27794 5.09091 3.37074C5.09091 3.50331 4.99645 3.66903 4.80753 3.8679C4.61861 4.06676 4.41312 4.24905 4.19105 4.41477C3.96899 4.58049 3.76349 4.75616 3.57457 4.94176C3.38565 5.12737 3.29119 5.27983 3.29119 5.39915C3.29119 5.45881 3.30777 5.53338 3.34091 5.62287C3.37405 5.71236 3.40223 5.7803 3.42543 5.8267C3.44863 5.87311 3.49503 5.95265 3.56463 6.06534C3.63423 6.17803 3.67235 6.241 3.67898 6.25426C4.18277 7.16241 4.75947 7.94129 5.40909 8.59091C6.05871 9.24053 6.83759 9.81723 7.74574 10.321C7.759 10.3277 7.82197 10.3658 7.93466 10.4354C8.04735 10.505 8.12689 10.5514 8.1733 10.5746C8.2197 10.5978 8.28764 10.6259 8.37713 10.6591C8.46662 10.6922 8.54119 10.7088 8.60085 10.7088C8.72017 10.7088 8.87263 10.6143 9.05824 10.4254C9.24384 10.2365 9.41951 10.031 9.58523 9.80895C9.75095 9.58688 9.93324 9.38139 10.1321 9.19247C10.331 9.00355 10.4967 8.90909 10.6293 8.90909C10.7221 8.90909 10.8165 8.93229 10.9126 8.97869C11.0088 9.02509 11.1264 9.09635 11.2656 9.19247C11.4048 9.28859 11.4877 9.34659 11.5142 9.36648C11.6799 9.46591 11.8572 9.56866 12.0462 9.67472C12.2351 9.78078 12.4455 9.89678 12.6776 10.0227C12.9096 10.1487 13.0885 10.2481 13.2145 10.321C13.6785 10.553 13.9304 10.7287 13.9702 10.848C13.9901 10.8944 14 10.964 14 11.0568Z"
                                    fill="#6A52FE" />
                            </svg></span>
                        <div class="wd-md-phone-email-detail">
                            <h6>Phone Number</h6>
                            <p><a class="common_footer_contact_number"
                                    href="tel:{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'contact_number') }}">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'contact_number') }}</a>
                            </p>
                        </div>
                    </div>
                    <div class="wd-md-phone-email-blog d-flex">
                        <span><svg width="14" height="11" viewBox="0 0 14 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.1846 0H1.35385C0.609231 0 0.00676922 0.61875 0.00676922 1.375L0 9.625C0 10.3813 0.609231 11 1.35385 11H12.1846C12.9292 11 13.5385 10.3813 13.5385 9.625V1.375C13.5385 0.61875 12.9292 0 12.1846 0ZM11.9138 2.92188L7.128 5.96063C6.91138 6.09812 6.62708 6.09812 6.41046 5.96063L1.62462 2.92188C1.55674 2.88318 1.4973 2.83089 1.44989 2.76819C1.40249 2.70548 1.3681 2.63366 1.34882 2.55707C1.32954 2.48048 1.32576 2.40071 1.33771 2.32259C1.34966 2.24447 1.37709 2.16962 1.41834 2.10258C1.4596 2.03554 1.51382 1.9777 1.57772 1.93256C1.64163 1.88742 1.71388 1.85591 1.79012 1.83996C1.86636 1.824 1.94499 1.82391 2.02126 1.83971C2.09753 1.85551 2.16985 1.88687 2.23385 1.93187L6.76923 4.8125L11.3046 1.93187C11.3686 1.88687 11.4409 1.85551 11.5172 1.83971C11.5935 1.82391 11.6721 1.824 11.7483 1.83996C11.8246 1.85591 11.8968 1.88742 11.9607 1.93256C12.0246 1.9777 12.0789 2.03554 12.1201 2.10258C12.1614 2.16962 12.1888 2.24447 12.2008 2.32259C12.2127 2.40071 12.2089 2.48048 12.1896 2.55707C12.1704 2.63366 12.136 2.70548 12.0886 2.76819C12.0412 2.83089 11.9817 2.88318 11.9138 2.92188Z"
                                    fill="#6A52FE" />
                            </svg></span>
                        <div class="wd-md-phone-email-detail">
                            <h6>Email Address</h6>
                            <p><a class="common_footer_email_address"
                                    href="mailto:{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email_address') }}">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email_address') }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="wd-md-foot-nav">
                    <div class="wd-md-foot-nav-title d-flex">
                        <h6>Quick Support</h6>
                    </div>
                    <ul>
                        <li class="d-flex align-items-center">
                            <span><svg width="9" height="11" viewBox="0 0 9 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M-4.06696e-07 2.69589C-4.66336e-07 1.33146 1.52297 0.519771 2.65562 1.28053L7.2543 4.36932C8.26428 5.04768 8.25913 6.53521 7.24448 7.20657L2.6458 10.2494C1.51237 10.9993 -7.92687e-08 10.1865 -1.38676e-07 8.82746L-4.06696e-07 2.69589Z"
                                        fill="#6A52FE" />
                                </svg></span>
                            <a href="{{ route('front.template.home', $domain_slug) }}">Home</a>
                        </li>
                        <li class="d-flex align-items-center">
                            <span><svg width="9" height="11" viewBox="0 0 9 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M-4.06696e-07 2.69589C-4.66336e-07 1.33146 1.52297 0.519771 2.65562 1.28053L7.2543 4.36932C8.26428 5.04768 8.25913 6.53521 7.24448 7.20657L2.6458 10.2494C1.51237 10.9993 -7.92687e-08 10.1865 -1.38676e-07 8.82746L-4.06696e-07 2.69589Z"
                                        fill="#6A52FE" />
                                </svg></span>
                            <a href="{{ route('front.template.stock_list', $domain_slug) }}">Stock List</a>
                        </li>
                        <li class="d-flex align-items-center">
                            <span><svg width="9" height="11" viewBox="0 0 9 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M-4.06696e-07 2.69589C-4.66336e-07 1.33146 1.52297 0.519771 2.65562 1.28053L7.2543 4.36932C8.26428 5.04768 8.25913 6.53521 7.24448 7.20657L2.6458 10.2494C1.51237 10.9993 -7.92687e-08 10.1865 -1.38676e-07 8.82746L-4.06696e-07 2.69589Z"
                                        fill="#6A52FE" />
                                </svg></span>
                            <a href="{{ route('front.template.finance', $domain_slug) }}">Finance</a>
                        </li>
                        <li class="d-flex align-items-center">
                            <span><svg width="9" height="11" viewBox="0 0 9 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M-4.06696e-07 2.69589C-4.66336e-07 1.33146 1.52297 0.519771 2.65562 1.28053L7.2543 4.36932C8.26428 5.04768 8.25913 6.53521 7.24448 7.20657L2.6458 10.2494C1.51237 10.9993 -7.92687e-08 10.1865 -1.38676e-07 8.82746L-4.06696e-07 2.69589Z"
                                        fill="#6A52FE" />
                                </svg></span>
                            <a href="{{ route('front.template.contact_us', $domain_slug) }}">Contact</a>
                        </li>
                        {{-- <li class="d-flex align-items-center">
                            <span><svg width="9" height="11" viewBox="0 0 9 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M-4.06696e-07 2.69589C-4.66336e-07 1.33146 1.52297 0.519771 2.65562 1.28053L7.2543 4.36932C8.26428 5.04768 8.25913 6.53521 7.24448 7.20657L2.6458 10.2494C1.51237 10.9993 -7.92687e-08 10.1865 -1.38676e-07 8.82746L-4.06696e-07 2.69589Z"
                                        fill="#6A52FE" />
                                </svg></span>
                            <a href="javascript:;">Search Car</a>
                        </li> --}}
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="wd-md-opening-hours">
                    <div class="wd-md-opening-title d-flex">
                        <h6>Opening Hours</h6>
                        @if (is_login_for_edit() == 1)
                            <a class="wd-edit-btn  ml-2" href="javascript:;"
                                onclick="getTimingModal('{{ $web_content->id }}')"><img
                                    src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                        @endif
                    </div>
                    <div class="timing_box">
                        @foreach ($web_content->working_hours as $time)
                            @php
                                $active = strcasecmp(date('l'), $time->day) == 0 ? 'active' : '';
                            @endphp
                            <div
                                class="wd-day-time d-flex align-items-center justify-content-between {!! $active !!}">
                                <p>
                                    <span><svg width="9" height="11" viewBox="0 0 9 11" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M-4.06696e-07 2.69589C-4.66336e-07 1.33146 1.52297 0.519771 2.65562 1.28053L7.2543 4.36932C8.26428 5.04768 8.25913 6.53521 7.24448 7.20657L2.6458 10.2494C1.51237 10.9993 -7.92687e-08 10.1865 -1.38676e-07 8.82746L-4.06696e-07 2.69589Z"
                                                fill="#6A52FE" />
                                        </svg></span>{{ $time->day }}
                                </p>
                                @if ($time->is_working == 1)
                                    <p>{{ date('h:i A', strtotime($time->start_time)) }}
                                        - {{ date('h:i A', strtotime($time->end_time)) }}</p>
                                @else
                                    <p>-</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="wd-footer-social-media">
            <div class="wd-md-social-media">
                <ul class="d-flex align-items-center justify-content-center">
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
