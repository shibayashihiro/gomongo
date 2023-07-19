@if (is_login_for_edit() == 1)
    <div class="wd-edit-topbar">
        <a class="wd-edit-btn" href="javascript:;"
            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','top_header',{{ json_encode(['Address' => 'text', 'Email' => 'text', 'Mobile' => 'text']) }})"><img
                src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
    </div>
@endif
<div class="wd-sl-header_mains">
    <div class="wd-sl-header_left">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-header-left">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','header',{{ json_encode(['Logo' => 'file']) }})">
                    <img src="{{ asset('assets/web/images/edit-btn.png') }}">
                </a>
            </div>
        @endif
        <a href="{{ route('front.template.home', $domain_slug) }}"><img class="common_header_logo"
                src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'common', 'header', 'logo')) }}"
                alt=""></a>
    </div>
    <div class="wd-sl-hedaer_right">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 my-auto">
                        <div class="head-top">
                            <a
                                href="tel:{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'mobile') }}">
                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.1141 7.54575C9.43073 7.54575 8.76962 7.43463 8.15295 7.23463C8.05634 7.20189 7.95246 7.19703 7.85322 7.22061C7.75398 7.24419 7.66339 7.29526 7.59184 7.36797L6.71962 8.46241C5.1474 7.71241 3.67517 6.29575 2.89184 4.66797L3.97517 3.74575C4.12517 3.59019 4.16962 3.37352 4.10851 3.17908C3.90295 2.56241 3.7974 1.9013 3.7974 1.21797C3.7974 0.917969 3.5474 0.667969 3.2474 0.667969H1.32517C1.02517 0.667969 0.664062 0.801302 0.664062 1.21797C0.664062 6.37908 4.95851 10.668 10.1141 10.668C10.5085 10.668 10.6641 10.318 10.6641 10.0124V8.09575C10.6641 7.79575 10.4141 7.54575 10.1141 7.54575Z"
                                        fill="url(#paint0_linear_357_2859)" />
                                    <defs>
                                        <linearGradient id="paint0_linear_357_2859" x1="1.14025" y1="1.62035"
                                            x2="9.94978" y2="10.1918" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FD750F" />
                                            <stop offset="0.515625" stop-color="#FFC42D" />
                                            <stop offset="1" stop-color="#FD750F" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                                <span
                                    class="common_top_header_mobile">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'mobile') }}</span></a>
                            <a
                                href="mailto:{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'email') }}">
                                <svg width="13" height="10" viewBox="0 0 13 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.2976 8.15078V1.85078C12.2976 1.26978 11.8286 0.800781 11.2476 0.800781H1.44062C0.859625 0.800781 0.390625 1.26978 0.390625 1.85078V8.15078C0.390625 8.73178 0.859625 9.20078 1.44062 9.20078H11.2476C11.8286 9.20078 12.2976 8.73178 12.2976 8.15078ZM11.3806 1.77378C11.6116 2.00478 11.4856 2.24278 11.3596 2.36178L8.51763 4.96578L11.2476 7.80778C11.3316 7.90578 11.3876 8.05978 11.2896 8.16478C11.1986 8.27678 10.9886 8.26978 10.8976 8.19978L7.83863 5.58878L6.34062 6.95378L4.84962 5.58878L1.79062 8.19978C1.69962 8.26978 1.48963 8.27678 1.39863 8.16478C1.30063 8.05978 1.35662 7.90578 1.44062 7.80778L4.17062 4.96578L1.32862 2.36178C1.20262 2.24278 1.07662 2.00478 1.30762 1.77378C1.53862 1.54278 1.77662 1.65478 1.97262 1.82278L6.34062 5.35078L10.7156 1.82278C10.9116 1.65478 11.1496 1.54278 11.3806 1.77378V1.77378Z"
                                        fill="url(#paint0_linear_357_2864)" />
                                    <defs>
                                        <linearGradient id="paint0_linear_357_2864" x1="0.957625" y1="1.60078"
                                            x2="7.99364" y2="11.3048" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FD750F" />
                                            <stop offset="0.515625" stop-color="#FFC42D" />
                                            <stop offset="1" stop-color="#FD750F" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                                <span
                                    class="common_top_header_email">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'email') }}</span></a>
                            <p>
                                <svg width="10" height="13" viewBox="0 0 10 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.0026 13.0004C4.16056 12.2821 3.38007 11.4947 2.66927 10.6464C1.6026 9.37239 0.335938 7.47505 0.335938 5.66705C0.335475 4.74369 0.608944 3.84095 1.12173 3.07307C1.63452 2.30519 2.36359 1.70669 3.21665 1.35332C4.06972 0.999945 5.00844 0.90758 5.91402 1.08791C6.81959 1.26825 7.65132 1.71318 8.30394 2.36639C8.73844 2.79896 9.08284 3.31341 9.3172 3.87997C9.55156 4.44653 9.67122 5.05394 9.66927 5.66705C9.66927 7.47505 8.40261 9.37239 7.33594 10.6464C6.62514 11.4947 5.84464 12.2821 5.0026 13.0004ZM5.0026 3.66705C4.47217 3.66705 3.96346 3.87777 3.58839 4.25284C3.21332 4.62791 3.0026 5.13662 3.0026 5.66705C3.0026 6.19749 3.21332 6.70619 3.58839 7.08127C3.96346 7.45634 4.47217 7.66705 5.0026 7.66705C5.53304 7.66705 6.04175 7.45634 6.41682 7.08127C6.79189 6.70619 7.0026 6.19749 7.0026 5.66705C7.0026 5.13662 6.79189 4.62791 6.41682 4.25284C6.04175 3.87777 5.53304 3.66705 5.0026 3.66705Z"
                                        fill="url(#paint0_linear_357_2869)" />
                                    <defs>
                                        <linearGradient id="paint0_linear_357_2869" x1="0.780383" y1="2.14113"
                                            x2="10.9594" y2="9.84266" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FD750F" />
                                            <stop offset="0.515625" stop-color="#FFC42D" />
                                            <stop offset="1" stop-color="#FD750F" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                                <span class="common_top_header_address">
                                    {{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'address') }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 my-auto">
                        <ul>
                            <li>
                                <a
                                    href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'facebook_url') }}"><img
                                        src="{{ asset('assets/web/template/t14') }}/images/facebook.png"></a>
                            </li>
                            <li>
                                <a
                                    href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'instagram_url') }}"><img
                                        src="{{ asset('assets/web/template/t14') }}/images/instagram.png"></a>
                            </li>
                            <li>
                                <a
                                    href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'twitter_url') }}"><img
                                        src="{{ asset('assets/web/template/t14') }}/images/twitter.png"></a>
                            </li>
                            <li>
                                <a
                                    href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'linkedin_url') }}"><img
                                        src="{{ asset('assets/web/template/t14') }}/images/linked.png"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            @if (is_login_for_edit() == 1)
                <div class="wd-edit-header-bottom">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','top_header',{{ json_encode([
                            'Address' => 'text',
                            'Email' => 'text',
                            'Mobile' => 'text',
                            'Facebook URL' => 'text',
                            'Instagram URL' => 'text',
                            'Twitter URL' => 'text',
                            'Linkedin URL' => 'text',
                        ]) }})">
                        <img src="{{ asset('assets/web/images/edit-btn.png') }}">
                    </a>
                </div>
            @endif
            <div class="container">
                <div class="row">
                    <div class="head-bottom">
                        <div class="mobile-menu"><i class="fas fa-bars"></i></div>
                        <div class="opacity"></div>
                        <nav class="nav-menu">
                            <div class="wd-md-respo-menu">
                                <div class="close-menu"><i class="fas fa-times"></i></div>
                            </div>
                            <ul class="menu">
                                <li><a class="{{ isActiveRoute('front.template.home') }}"
                                        href="{{ route('front.template.home', $domain_slug) }}">Home</a>
                                </li>
                                <li><a class="{{ isActiveRoute('front.template.stock_list') }}"
                                        href="{{ route('front.template.stock_list', $domain_slug) }}">Stock List</a>
                                </li>
                                <li><a class="{{ isActiveRoute('front.template.finance') }}"
                                        href="{{ route('front.template.finance', $domain_slug) }}">Finance</a></li>
                                {{-- <li><a href="javascript:;">Search Car</a></li> --}}
                                <li><a class="{{ isActiveRoute('front.template.contact_us') }}"
                                        href="{{ route('front.template.contact_us', $domain_slug) }}">Contact us</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
