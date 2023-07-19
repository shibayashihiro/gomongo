<div class="header-bottom">
    <div class="container">
        <div class="row">
            <div class="head-bottom">
                @if (is_login_for_edit() == 1)
                    <div class="wd-edit-header">
                        <a class="wd-edit-btn" href="javascript:;"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','header',{{ json_encode([
                                'Facebook URL' => 'text',
                                'Instagram URL' => 'text',
                                'Twitter URL' => 'text',
                                'Linkedin URL' => 'text',
                                'Logo' => 'file',
                            ]) }})">
                            <img src="{{ asset('assets/web/template/t16') }}/images/edit.png">
                        </a>
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
                        {{-- <li><a class="" href="javascript:;">Search Car</a></li> --}}
                        <li><a class="{{ isActiveRoute('front.template.contact_us') }}"
                                href="{{ route('front.template.contact_us', $domain_slug) }}">Contact us</a></li>
                    </ul>
                </nav>
                <div class="wd-kr-social-media">
                    <ul class="d-flex align-items-center">
                        <li class="wd-social-icon"><a
                                href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'header', 'facebook_url') }}"><i
                                    class="fab fa-facebook-f"></i></a></li>
                        <li class="wd-social-icon"><a
                                href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'header', 'instagram_url') }}"><i
                                    class="fab fa-instagram"></i></a></li>
                        <li class="wd-social-icon"><a
                                href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'header', 'twitter_url') }}"><i
                                    class="fab fa-twitter"></i></a></li>
                        <li class="wd-social-icon"><a
                                href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'header', 'linkedin_url') }}"><i
                                    class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
