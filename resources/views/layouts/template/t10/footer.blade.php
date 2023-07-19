<div class="footer">
    <div class="container-fluid">
        <div class="footer-cont ">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-cont-sec">
                        <h3>Contact Us</h3>
                        @if(is_login_for_edit() == 1)
                            <a class="wd-edit-btn"
                               href="javascript:;"
                               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','common','footer',{{json_encode([
    'Vat Number'=>'text',
    'Company registration number'=>'text',
    'FCA number'=>'text',
    'Email Address'=>'text',
    'Contact number'=>'text',
    'Footer Text'=>'text',
    ])}})"><img
                                    src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                        @endif
                        <p class="common_footer_footer_text">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'footer_text')}}</p>
                        <div class="footer-contact-info">
                            <ul>
                                <li>
                                    <img src="{{asset('assets/web/template/t10/images/foot-location-icon.svg')}}">
                                    <div class="foot-cont-content">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <p class="f-cont-label">VAT NUMBER</p>
                                                <h4 class="common_footer_vat_number">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'vat_number')}}</h4>
                                            </div>
                                            <div class="col-lg-4">
                                                <p class="f-cont-label">CR NUMBER</p>
                                                <h4 class="common_footer_fca_number">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'fca_number')}}</h4>
                                            </div>
                                            <div class="col-lg-4">
                                                <p class="f-cont-label">FCA NUMBER</p>
                                                <h4 class="common_footer_company_registration_number">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'company_registration_number')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <img src="{{asset('assets/web/template/t10/images/foot-call-icon.svg')}}">
                                    <div class="foot-cont-content">
                                        <p class="f-cont-label">Phone Number</p>
                                        <h4>
                                            <a  class="common_footer_contact_number" href="tel:{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'contact_number')}}">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'contact_number')}}</a>
                                        </h4>
                                    </div>
                                </li>

                                <li>
                                    <img src="{{asset('assets/web/template/t10/images/foot-mail-icon.svg')}}">
                                    <div class="foot-cont-content">
                                        <p class="f-cont-label">Email Address</p>
                                        <h4>
                                            <a class="common_footer_email_address" href="mailto:{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email_address')}}">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email_address')}}</a>
                                        </h4>
                                    </div>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-cont-sec">
                        <h3>Opening Hours</h3>
                        @if(is_login_for_edit() == 1)
                            <a class="wd-edit-btn"
                               href="javascript:;"
                               onclick="getTimingModal('{{$web_content->id}}')"><img
                                    src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                        @endif
                        <div class="table-responsive foot-opening-hour timing_box">
                            <table class="table">
                                @foreach($web_content->working_hours as $time)
                            @php
                            $active = strcasecmp(date('l'), $time->day) == 0 ? 'class="active"' : '';
                            @endphp
                                    <tr>
                                        <td {!! $active !!}>{{$time->day}}</td>
                                        <td {!! $active !!}>
                                            @if($time->is_working == 1)
                                                {{date('h:i A', strtotime($time->start_time))}}
                                                - {{date('h:i A', strtotime($time->end_time))}}
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-cont-sec">
                        <h3>Links</h3>
                        <ul class="foot-site-pages">
                            <li><a href="{{route('front.template.home', $domain_slug)}}">Home</a></li>
                            <li><a href="{{route('front.template.stock_list', $domain_slug)}}">Stock List</a></li>
                            <li><a href="{{route('front.template.finance', $domain_slug)}}">Finance</a></li>
                            <li><a href="{{route('front.template.contact_us', $domain_slug)}}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-cont-sec">
                        <h3>Subscrib Us</h3>
                        <div class="foot-subscribe-box">
                            <form>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Your email"
                                           aria-label="username">
                                    <div class="input-group-append">
                                        <button class="foot-subs-btn"><img
                                                src="{{asset('assets/web/template/t10/images/sub-send.svg')}}"/>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="foot-social-media">
                            <ul>
                                <li>
                                    <a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'facebook_url')}}"
                                       target="_blank"><img
                                            src="{{asset('assets/web/template/t10/images/facebook-social.svg')}}"/></a>
                                </li>
                                <li>
                                    <a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'instagram_url')}}"
                                       target="_blank"><img
                                            src="{{asset('assets/web/template/t10/images/insta-social.svg')}}"/></a>
                                </li>
                                <li>
                                    <a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'twitter_url')}}"
                                       target="_blank"><img
                                            src="{{asset('assets/web/template/t10/images/twitter-social.svg')}}"/></a>
                                </li>
                                <li>
                                    <a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'linkedin_url')}}"
                                       target="_blank"><img
                                            src="{{asset('assets/web/template/t10/images/linkedin-social.svg')}}"/></a>
                                </li>
                                @if(is_login_for_edit() == 1)
                                    <a class="wd-edit-btn"
                                       href="javascript:;"
                                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','common','footer',{{json_encode([
    'Facebook URL'=>'text',
    'Instagram URL'=>'text',
    'Twitter URL'=>'text',
    'Linkedin URL'=>'text',
    ])}})"><img
                                            src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="copyright">
    <div class="container-fluid">
        <p>{{$web_content->copyright ?? ''}}</p>
    </div>
</div>
