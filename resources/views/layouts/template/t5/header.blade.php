<div class="header-top">
    <div class="container-fluid">
        <div class="row">
            <div class="head-top">
                @if(is_login_for_edit() == 1)
                    <div class="wd-edit-topbar">
                        <a class="wd-edit-btn" href="javascript:;"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','common','top_header',{{json_encode(['Address'=>'text','Mobile'=>'text'])}})"><img
                                src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                    </div>
                @endif
                <p><i class="fas fa-map-marker-alt"></i> <span
                        class="common_top_header_address">{{get_web_content_detail($web_content->id,$web_content->template,'common','top_header','address')}}</span>
                </p>
                <a href="tel::{{get_web_content_detail($web_content->id,$web_content->template,'common','top_header','mobile')}}"><i
                        class="fas fa-phone-alt"></i> <span
                        class="common_top_header_mobile">{{get_web_content_detail($web_content->id,$web_content->template,'common','top_header','mobile')}}</span></a>
            </div>
        </div>
    </div>
</div>
<div class="header-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="head-bottom">
                @if(is_login_for_edit() == 1)
                    <div class="wd-edit-header">
                        <a class="wd-edit-btn" href="javascript:;"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','common','header',{{json_encode(['Logo'=>'file'])}})"><img
                                src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                    </div>
                @endif
                <a href="{{route('front.template.home', $domain_slug)}}"><img
                        src="{{checkFileExist(get_web_content_detail($web_content->id,$web_content->template,'common','header','logo'))}}"
                        alt="" class="common_header_logo"></a>
                <div class="mobile-menu"><i class="fas fa-bars"></i></div>
                <div class="opacity"></div>
                <nav class="nav-menu">
                    <div class="close-menu"><i class="fas fa-times"></i></div>
                    <ul class="menu">
                        <li><a class="{{isActiveRoute('front.template.home')}}"
                               href="{{route('front.template.home', $domain_slug)}}">Home</a></li>
                        <li><a class="{{isActiveRoute('front.template.stock_list')}}"
                               href="{{route('front.template.stock_list', $domain_slug)}}">Stock List</a></li>
                        <li><a class="{{isActiveRoute('front.template.finance')}}"
                               href="{{route('front.template.finance', $domain_slug)}}">Finance</a></li>
                        <li class="contact-btn"><a href="{{route('front.template.contact_us', $domain_slug)}}">Contact
                                us</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
