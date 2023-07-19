<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="wd-sl-footermenus">
                <h6><b>Quick</b> Nav</h6>
                <ul class="wd-sl-fmenu_inner">
                    <li><a href="{{ route('front.template.home', $domain_slug) }}">Home</a></li>
                    <li><a href="{{ route('front.template.stock_list', $domain_slug) }}">Stock List</a></li>
                    <li><a href="j{{ route('front.template.finance', $domain_slug) }}">Finance</a></li>
                    {{-- <li><a href="javascript:;">Search Car</a></li> --}}
                    <li><a href="{{ route('front.template.contact_us', $domain_slug) }}">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-5">
            <div class="wd-sl-footermenus">
                <h6><b>Opening</b> Hours</h6>
                @if (is_login_for_edit() == 1)
                    <a class="wd-edit-btn" href="javascript:;" onclick="getTimingModal('{{ $web_content->id }}')"><img
                            src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                @endif
                <ul class="mr-5 wd-sl-footertime">
                    <div class="timing_box">
                        @foreach ($web_content->working_hours as $time)
                            @php
                                $active = strcasecmp(date('l'), $time->day) == 0 ? 'class="active"' : '';
                            @endphp
                            <li {!! $active !!}>
                                <span>{{ $time->day }}</span>
                                @if ($time->is_working == 1)
                                    <span>{{ date('h:i A', strtotime($time->start_time)) }} -
                                        {{ date('h:i A', strtotime($time->end_time)) }}</span>
                                @else
                                    <span>-</span>
                                @endif
                            </li>
                        @endforeach
                    </div>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="wd-sl-footermenus">
                <h6><b>AtoZ Cars</b></h6>
                @if (is_login_for_edit() == 1)
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','footer',{{ json_encode([
                            'Email Address' => 'text',
                            'Contact number' => 'text',
                            'Footer Text' => 'text',
                            'Facebook URL' => 'text',
                            'Instagram URL' => 'text',
                            'Twitter URL' => 'text',
                            'Linkedin URL' => 'text',
                        ]) }})"><img
                            src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                @endif
                <ul class="wd-sl-linfoftr">
                    <li><span>Office Address :</span> <span
                            class="common_footer_footer_text">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'footer_text') }}</span>
                    </li>
                    <hr>
                    <li><span>Phone Number :</span> <a class="common_footer_contact_number"
                            href="tel:{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'contact_number') }}">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'contact_number') }}</a>
                    </li>
                    <li><span>Email Address :</span> <a class="common_footer_email_address"
                            href="mailto:{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email_address') }}">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email_address') }}</a>
                    </li>
                    <hr>
                    <li>
                        Share us with your friends and family
                        <ul>
                            <li><a
                                    href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'facebook_url') }}"><img
                                        src="{{ asset('assets/web/template/t13/images/facebook.png') }}"></a></li>
                            <li><a
                                    href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'instagram_url') }}"><img
                                        src="{{ asset('assets/web/template/t13/images/instagram.png') }}"></a></li>
                            <li><a
                                    href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'twitter_url') }}"><img
                                        src="{{ asset('assets/web/template/t13/images/twitter.png') }}"></a></li>
                            <li><a
                                    href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'linkedin_url') }}"><img
                                        src="{{ asset('assets/web/template/t13/images/linked.png') }}"></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
