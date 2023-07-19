@if (is_login_for_edit() == 1)
    <div class="wd-edit-topbar">
        <a class="wd-edit-btn" href="javascript:;"
            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','top_header',{{ json_encode(['Address' => 'text', 'Email' => 'text', 'Mobile' => 'text']) }})"><img
                src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
    </div>
@endif
<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="head-top">
                    <a
                        href="tel:{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'mobile') }}">
                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.45 6.87778C8.76667 6.87778 8.10555 6.76667 7.48889 6.56667C7.39228 6.53392 7.2884 6.52906 7.18916 6.55264C7.08992 6.57622 6.99933 6.6273 6.92778 6.7L6.05555 7.79444C4.48333 7.04444 3.01111 5.62778 2.22778 4L3.31111 3.07778C3.46111 2.92222 3.50556 2.70556 3.44444 2.51111C3.23889 1.89444 3.13333 1.23333 3.13333 0.55C3.13333 0.25 2.88333 0 2.58333 0H0.661111C0.361111 0 0 0.133333 0 0.55C0 5.71111 4.29444 10 9.45 10C9.84444 10 10 9.65 10 9.34444V7.42778C10 7.12778 9.75 6.87778 9.45 6.87778Z"
                                fill="#3A92FB" />
                        </svg>
                        <span
                            class="common_top_header_mobile">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'mobile') }}</span></a>
                    <a
                        href="mailto:{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'email') }}">
                        <svg width="12" height="10" viewBox="0 0 12 10" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.9695 8.1498V1.8498C11.9695 1.2688 11.5005 0.799805 10.9195 0.799805H1.1125C0.5315 0.799805 0.0625 1.2688 0.0625 1.8498V8.1498C0.0625 8.7308 0.5315 9.1998 1.1125 9.1998H10.9195C11.5005 9.1998 11.9695 8.7308 11.9695 8.1498ZM11.0525 1.7728C11.2835 2.0038 11.1575 2.2418 11.0315 2.3608L8.1895 4.9648L10.9195 7.8068C11.0035 7.9048 11.0595 8.0588 10.9615 8.16381C10.8705 8.2758 10.6605 8.2688 10.5695 8.1988L7.5105 5.5878L6.0125 6.9528L4.5215 5.5878L1.4625 8.1988C1.3715 8.2688 1.1615 8.2758 1.0705 8.16381C0.9725 8.0588 1.0285 7.9048 1.1125 7.8068L3.8425 4.9648L1.0005 2.3608C0.8745 2.2418 0.7485 2.0038 0.9795 1.7728C1.2105 1.5418 1.4485 1.6538 1.6445 1.8218L6.0125 5.3498L10.3875 1.8218C10.5835 1.6538 10.8215 1.5418 11.0525 1.7728Z"
                                fill="#3A92FB" />
                        </svg>
                        <span
                            class="common_top_header_email">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'email') }}</span></a>
                    <p>
                        <svg width="10" height="13" viewBox="0 0 10 13" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.67448 13.0004C3.83244 12.2821 3.05194 11.4947 2.34115 10.6464C1.27448 9.37239 0.00781309 7.47505 0.00781309 5.66705C0.00735049 4.74369 0.280819 3.84095 0.793609 3.07307C1.3064 2.30519 2.03546 1.70669 2.88853 1.35332C3.74159 0.999945 4.68031 0.90758 5.58589 1.08791C6.49147 1.26825 7.3232 1.71318 7.97581 2.36639C8.41032 2.79896 8.75471 3.31341 8.98907 3.87997C9.22343 4.44653 9.3431 5.05394 9.34115 5.66705C9.34115 7.47505 8.07448 9.37239 7.00781 10.6464C6.29702 11.4947 5.51652 12.2821 4.67448 13.0004ZM4.67448 3.66705C4.14405 3.66705 3.63534 3.87777 3.26027 4.25284C2.88519 4.62791 2.67448 5.13662 2.67448 5.66705C2.67448 6.19749 2.88519 6.70619 3.26027 7.08127C3.63534 7.45634 4.14405 7.66705 4.67448 7.66705C5.20491 7.66705 5.71362 7.45634 6.08869 7.08127C6.46377 6.70619 6.67448 6.19749 6.67448 5.66705C6.67448 5.13662 6.46377 4.62791 6.08869 4.25284C5.71362 3.87777 5.20491 3.66705 4.67448 3.66705Z"
                                fill="#3A92FB" />
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
                                src="{{ asset('assets/web/template/t13/images/facebook.png') }}"></a>
                    </li>
                    <li>
                        <a
                            href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'instagram_url') }}"><img
                                src="{{ asset('assets/web/template/t13/images/instagram.png') }}"></a>
                    </li>
                    <li>
                        <a
                            href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'twitter_url') }}"><img
                                src="{{ asset('assets/web/template/t13/images/twitter.png') }}"></a>
                    </li>
                    <li>
                        <a
                            href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'linkedin_url') }}"><img
                                src="{{ asset('assets/web/template/t13/images/linked.png') }}"></a>
                    </li>
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
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="header-bottom">
    <div class="container">
        <div class="row">
            <div class="head-bottom">
                @if (is_login_for_edit() == 1)
                    <div class="wd-edit-topbar">
                        <a class="wd-edit-btn" href="javascript:;"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','header',{{ json_encode(['Logo' => 'file']) }})"><img
                                src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                    </div>
                @endif
                <a href="{{ route('front.template.home', $domain_slug) }}"><img class="common_header_logo"
                        src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'common', 'header', 'logo')) }}"
                        alt=""></a>
                <div class="mobile-menu"><i class="fas fa-bars"></i></div>
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
                        {{-- <li><a class="javascript:;">Search Car</a></li> --}}
                        <li><a class="{{ isActiveRoute('front.template.contact_us') }}"
                                href="{{ route('front.template.contact_us', $domain_slug) }}">Contact us</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
