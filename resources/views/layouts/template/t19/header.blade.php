<div class="header-bottom">
    <div class="wd-edit-header">
        @if (is_login_for_edit() == 1)
            <a class="wd-edit-btn" href="javascript:;"
                onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','header',{{ json_encode(['Logo' => 'file']) }})">
                <img src="{{ asset('assets/web/images/edit-btn.png') }}">
            </a>
        @endif
    </div>
    <div class="container-fluid pr-0">
        <div class="head-bottom">
            <a href="{{ route('front.template.home', $domain_slug) }}">
                <img class="common_header_logo brand-logo"
                    src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'common', 'header', 'logo')) }}"
                    alt="">
            </a>
            <div class="wd-sl-header-right">
                <ul>
                    <li><a href="{{ route('front.template.contact_us', $domain_slug) }}">Contact Us</a></li>
                </ul>
                <div class="mobile-menu"><img src="{{ asset('assets/web/template/t19/images/bars.svg') }}"
                        class="wd-sl-headbars"></div>
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
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
