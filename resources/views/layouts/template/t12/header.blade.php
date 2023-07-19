<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="head-top d-flex align-items-center justify-content-between">
                <div class="wd-md-social-media">
                    <ul class="d-flex align-items-center">
                        @if (is_login_for_edit() == 1)
                            <a class="wd-edit-btn" href="javascript:;"
                                onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','top_header',{{ json_encode([
                                    'Facebook URL' => 'text',
                                    'Instagram URL' => 'text',
                                    'Twitter URL' => 'text',
                                    'Linkedin URL' => 'text',
                                    'Mobile' => 'text',
                                ]) }})"><img
                                    src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                        @endif
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
                <div class="wd-md-head-logo">
                    @if (is_login_for_edit() == 1)
                        <div class="wd-sl-edit">
                            <a class="wd-edit-btn" href="javascript:;"
                                onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','header',{{ json_encode(['Logo' => 'file']) }})"><img
                                    src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                        </div>
                    @endif
                    <a href="{{ route('front.template.home', $domain_slug) }}">
                        <img src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'common', 'header', 'logo')) }}"
                            class="common_header_logo img-fluid">
                    </a>
                </div>
                <div class="wd-md-call-blog">
                    <a
                        href="tel:{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'mobile') }}">
                        <span class="mr-2"><svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="1" y="1" width="34" height="34" rx="6"
                                    fill="black" stroke="url(#paint0_linear_25_814)" stroke-width="2" />
                                <path
                                    d="M24.675 20.8167C23.65 20.8167 22.6583 20.65 21.7333 20.35C21.5884 20.3009 21.4326 20.2936 21.2837 20.329C21.1349 20.3643 20.999 20.4409 20.8917 20.55L19.5833 22.1917C17.225 21.0667 15.0167 18.9417 13.8417 16.5L15.4667 15.1167C15.6917 14.8833 15.7583 14.5583 15.6667 14.2667C15.3583 13.3417 15.2 12.35 15.2 11.325C15.2 10.875 14.825 10.5 14.375 10.5H11.4917C11.0417 10.5 10.5 10.7 10.5 11.325C10.5 19.0667 16.9417 25.5 24.675 25.5C25.2667 25.5 25.5 24.975 25.5 24.5167V21.6417C25.5 21.1917 25.125 20.8167 24.675 20.8167Z"
                                    fill="#D9B776" />
                                <defs>
                                    <linearGradient id="paint0_linear_25_814" x1="2.5" y1="3.5"
                                        x2="32.5" y2="33.5" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#2D2923" />
                                        <stop offset="0.515625" stop-color="#C6A76C" />
                                        <stop offset="1" stop-color="#2D2923" />
                                    </linearGradient>
                                </defs>
                            </svg></span><span
                            class="common_top_header_mobile">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'mobile') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-bottom">
    <div class="container">
        <div class="row">
            <div class="head-bottom">

                <div class="mobile-menu">
                    <img src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'common', 'header', 'logo')) }}"
                        class="img-fluid">
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
</div>
