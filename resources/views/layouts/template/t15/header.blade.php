<div class="header-top">
    <div class="container-fluid">
        <div class="wd-edit-header-top">
            @if (is_login_for_edit() == 1)
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','top_header',{{ json_encode([
                        'Facebook URL' => 'text',
                        'Instagram URL' => 'text',
                        'Twitter URL' => 'text',
                        'Linkedin URL' => 'text',
                    ]) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            @endif
        </div>
        <div class="head-top d-flex align-items-center justify-content-between">
            <div class="wd-md-reach-blog d-flex align-items-center">
                @if (is_login_for_edit() == 1)
                    <div class="wd-edit-topbar">
                        <a class="wd-edit-btn" href="javascript:;"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','top_header',{{ json_encode(['Address' => 'text', 'Email' => 'text', 'Mobile' => 'text']) }})"><img
                                src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                    </div>
                @endif
                <div class="wd-md-call-blog d-flex align-items-center">
                    <span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="1" y="1" width="22" height="22" fill="black"
                                stroke="url(#paint0_linear_1004_485)" stroke-width="2" />
                            <path
                                d="M16.45 13.8778C15.7667 13.8778 15.1056 13.7667 14.4889 13.5667C14.3923 13.5339 14.2884 13.5291 14.1892 13.5526C14.0899 13.5762 13.9993 13.6273 13.9278 13.7L13.0556 14.7944C11.4833 14.0444 10.0111 12.6278 9.22778 11L10.3111 10.0778C10.4611 9.92222 10.5056 9.70556 10.4444 9.51111C10.2389 8.89444 10.1333 8.23333 10.1333 7.55C10.1333 7.25 9.88333 7 9.58333 7H7.66111C7.36111 7 7 7.13333 7 7.55C7 12.7111 11.2944 17 16.45 17C16.8444 17 17 16.65 17 16.3444V14.4278C17 14.1278 16.75 13.8778 16.45 13.8778Z"
                                fill="#ffffff" />
                            <defs>
                                <linearGradient id="paint0_linear_1004_485" x1="1.66667" y1="2.33333" x2="21.6667"
                                    y2="22.3333" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#CDFFC2" />
                                    <stop offset="0.515625" stop-color="#60BC4C" />
                                    <stop offset="1" stop-color="#CDFFC2" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </span>
                    <a
                        href="tel:{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'mobile') }}"><span
                            class="common_top_header_mobile">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'mobile') }}</span></a>
                </div>
                <div class="wd-md-call-blog d-flex align-items-center">
                    <span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="1" y="1" width="22" height="22" fill="black"
                                stroke="url(#paint0_linear_1004_486)" stroke-width="2" />
                            <path
                                d="M18.2976 15.1498V8.8498C18.2976 8.2688 17.8286 7.7998 17.2476 7.7998H7.44062C6.85962 7.7998 6.39062 8.2688 6.39062 8.8498V15.1498C6.39062 15.7308 6.85962 16.1998 7.44062 16.1998H17.2476C17.8286 16.1998 18.2976 15.7308 18.2976 15.1498ZM17.3806 8.7728C17.6116 9.0038 17.4856 9.2418 17.3596 9.3608L14.5176 11.9648L17.2476 14.8068C17.3316 14.9048 17.3876 15.0588 17.2896 15.1638C17.1986 15.2758 16.9886 15.2688 16.8976 15.1988L13.8386 12.5878L12.3406 13.9528L10.8496 12.5878L7.79062 15.1988C7.69962 15.2688 7.48963 15.2758 7.39863 15.1638C7.30063 15.0588 7.35662 14.9048 7.44062 14.8068L10.1706 11.9648L7.32862 9.3608C7.20262 9.2418 7.07662 9.0038 7.30762 8.7728C7.53862 8.5418 7.77663 8.6538 7.97263 8.8218L12.3406 12.3498L16.7156 8.8218C16.9116 8.6538 17.1496 8.5418 17.3806 8.7728Z"
                                fill="#ffffff" />
                            <defs>
                                <linearGradient id="paint0_linear_1004_486" x1="1.66667" y1="2.33333" x2="21.6667"
                                    y2="22.3333" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#CDFFC2" />
                                    <stop offset="0.515625" stop-color="#60BC4C" />
                                    <stop offset="1" stop-color="#CDFFC2" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </span>
                    <a
                        href="mailto:{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'email') }}"><span
                            class="common_top_header_email">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'email') }}</span></a>
                </div>
                <div class="wd-md-call-blog d-flex align-items-center">
                    <span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="1" y="1" width="22" height="22" fill="black"
                                stroke="url(#paint0_linear_94_1386)" stroke-width="2" />
                            <path
                                d="M12.0026 18.0004C11.1606 17.2821 10.3801 16.4947 9.66927 15.6464C8.6026 14.3724 7.33594 12.4751 7.33594 10.6671C7.33548 9.74369 7.60894 8.84095 8.12173 8.07307C8.63452 7.30519 9.36359 6.70669 10.2167 6.35332C11.0697 5.99994 12.0084 5.90758 12.914 6.08791C13.8196 6.26825 14.6513 6.71318 15.3039 7.36639C15.7384 7.79896 16.0828 8.31341 16.3172 8.87997C16.5516 9.44653 16.6712 10.0539 16.6693 10.6671C16.6693 12.4751 15.4026 14.3724 14.3359 15.6464C13.6251 16.4947 12.8446 17.2821 12.0026 18.0004ZM12.0026 8.66705C11.4722 8.66705 10.9635 8.87777 10.5884 9.25284C10.2133 9.62791 10.0026 10.1366 10.0026 10.6671C10.0026 11.1975 10.2133 11.7062 10.5884 12.0813C10.9635 12.4563 11.4722 12.6671 12.0026 12.6671C12.533 12.6671 13.0417 12.4563 13.4168 12.0813C13.7919 11.7062 14.0026 11.1975 14.0026 10.6671C14.0026 10.1366 13.7919 9.62791 13.4168 9.25284C13.0417 8.87777 12.533 8.66705 12.0026 8.66705Z"
                                fill="#ffffff" />
                            <defs>
                                <linearGradient id="paint0_linear_94_1386" x1="1.66667" y1="2.33333" x2="21.6667"
                                    y2="22.3333" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#CDFFC2" />
                                    <stop offset="0.515625" stop-color="#60BC4C" />
                                    <stop offset="1" stop-color="#CDFFC2" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </span>
                    <a href="javascript:;"> <span class="common_top_header_address">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'address') }}</span></a>
                </div>
            </div>
            <div class="wd-md-social-media">
                <ul class="d-flex align-items-center">
                    <li class="wd-social-icon"><a
                            href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'facebook_url') }}"><i
                                class="fab fa-facebook-f"></i></a></li>
                    <li class="wd-social-icon"><a
                            href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'instagram_url') }}"><i
                                class="fab fa-instagram"></i></a></li>
                    <li class="wd-social-icon"><a
                            href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'twitter_url') }}"><i
                                class="fab fa-twitter"></i></a></li>
                    <li class="wd-social-icon"><a
                            href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'linkedin_url') }}"><i
                                class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="header-bottom">
    <div class="container-fluid">
        <div class="head-bottom">
            <div class="wd-edit-header">
                @if (is_login_for_edit() == 1)
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','header',{{ json_encode(['Logo' => 'file']) }})">
                        <img src="{{ asset('assets/web/images/edit-btn.png') }}">
                    </a>
                @endif
            </div>
            <div class="wd-md-head-logo">
                <a href="{{ route('front.template.home', $domain_slug) }}">
                    <img class="img-fluid common_header_logo"
                        src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'common', 'header', 'logo')) }}">
                </a>
            </div>
            <div class="mobile-menu">
                <a href="{{ route('front.template.home', $domain_slug) }}"><img
                        src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'common', 'header', 'logo')) }}"
                        class="img-fluid common_header_logo"></a>
                <i class="fas fa-bars"></i>
            </div>
            <div class="opacity"></div>
            <nav class="nav-menu">
                <div class="wd-md-respo-menu">
                    <div class="close-menu"><i class="fas fa-times"></i></div>
                </div>
                <ul class="menu">
                    <li><a class="{{ isActiveRoute('front.template.home') }}"
                            href="{{ route('front.template.home', $domain_slug) }}">Home</a></li>
                    <li><a class="{{ isActiveRoute('front.template.stock_list') }}"
                            href="{{ route('front.template.stock_list', $domain_slug) }}">Stock List</a></li>
                    <li><a class="{{ isActiveRoute('front.template.finance') }}"
                            href="{{ route('front.template.finance', $domain_slug) }}">Finance</a></li>
                    {{-- <li><a href="javascript:;">Search Car</a></li> --}}
                    <li><a class="{{ isActiveRoute('front.template.contact_us') }}"
                            href="{{ route('front.template.contact_us', $domain_slug) }}">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
