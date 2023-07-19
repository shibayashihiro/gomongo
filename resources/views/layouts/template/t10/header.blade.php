<div class="header-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 my-auto">
                <ul>
                    <li>
                        <a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'facebook_url')}}"
                           target="_blank"><img src="{{asset('assets/web/template/t10/images/facebook.png')}}"></a></li>
                    <li>
                        <a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'instagram_url')}}"
                           target="_blank"><img src="{{asset('assets/web/template/t10/images/instagram.png')}}"></a>
                    </li>
                    <li>
                        <a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'twitter_url')}}"
                           target="_blank"><img src="{{asset('assets/web/template/t10/images/twitter.png')}}"></a></li>
                    <li>
                        <a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'linkedin_url')}}"
                           target="_blank"><img src="{{asset('assets/web/template/t10/images/linked.png')}}"></a></li>
                    @if(is_login_for_edit() == 1)
                        <a class="wd-edit-btn"
                           href="javascript:;"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','common','top_header',{{json_encode([
    'Facebook URL'=>'text',
    'Instagram URL'=>'text',
    'Twitter URL'=>'text',
    'Linkedin URL'=>'text',
    ])}})"><img
                                src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                    @endif
                </ul>
            </div>
            <div class="col-md-6">
                <div class="head-top">
                    @if(is_login_for_edit() == 1)
                        <div class="wd-edit-topbar">
                            <a class="wd-edit-btn" href="javascript:;"
                               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','common','top_header',{{json_encode(['Address'=>'text','Mobile'=>'text'])}})"><img
                                    src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                        </div>
                    @endif
                    <p class="d-flex align-items-baseline"><i
                            class="fas fa-map-marker-alt"></i><span
                            class="common_top_header_address">{{get_web_content_detail($web_content->id,$web_content->template,'common','top_header','address')}}</span>
                    </p>
                    <a href="#" class="d-flex align-items-baseline"><i
                            class="fas fa-phone-alt"></i><span
                            class="common_top_header_mobile">{{get_web_content_detail($web_content->id,$web_content->template,'common','top_header','mobile')}}</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="head-bottom">
                @if(is_login_for_edit() == 1)
                    <div class="wd-sl-edit10">
                        <a class="wd-edit-btn" href="javascript:;"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','common','header',{{json_encode(['Logo'=>'file'])}})"><img
                                src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                    </div>
                @endif
                <a href="{{route('front.template.home', $domain_slug)}}"><img
                        src="{{checkFileExist(get_web_content_detail($web_content->id,$web_content->template,'common','header','logo'))}}"
                        alt="" class="common_header_logo wd-logo"></a>
                <div class="mobile-menu"><i class="fas fa-bars"></i></div>
                <div class="opacity"></div>
                <nav class="nav-menu">
                    <div class="wd-md-respo-menu">
                        <div class="close-menu"><i class="fas fa-times"></i></div>
                    </div>
                    <ul class="menu">
                        <li><a class="{{isActiveRoute('front.template.home')}}"
                               href="{{route('front.template.home', $domain_slug)}}">Home</a></li>
                        <li><a class="{{isActiveRoute('front.template.stock_list')}}"
                               href="{{route('front.template.stock_list', $domain_slug)}}">Stock List</a></li>
                        <li><a class="{{isActiveRoute('front.template.finance')}}"
                               href="{{route('front.template.finance', $domain_slug)}}">Finance</a></li>
                        <li><a class="{{isActiveRoute('front.template.contact_us')}}"
                               href="{{route('front.template.contact_us', $domain_slug)}}">Contact us</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
