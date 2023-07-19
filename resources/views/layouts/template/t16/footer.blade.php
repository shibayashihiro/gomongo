<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="wd-kr-footermenus">
                <div class="wd-kr-footeredit">
                    @if (is_login_for_edit() == 1)
                        <a class="wd-edit-btn" href="javascript:;"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','footer',{{ json_encode([
                                'Email Address' => 'text',
                                'Contact number' => 'text',
                                'Address' => 'text',
                            ]) }})"><img
                                src="{{ asset('assets/web/template/t16') }}/images/edit.png"></a>
                    @endif
                    <h6><b>AtoZ Cars</b></h6>
                </div>
                <ul class="wd-kr-linfoftr">
                    <li><span>Office Address :</span></li>
                    <li class="common_footer_address">
                        {{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'address') }}
                    </li>
                    <hr>
                    <li><span>Phone Number :</span> <a class="common_footer_contact_number"
                            href="tel:{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'contact_number') }}">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'contact_number') }}</a>
                    </li>
                    <li><span>Email Address :</span> <a class="common_footer_email_address"
                            href="mailto:{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email_address') }}">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email_address') }}</a>
                    </li>
                    <hr>
                    <li>Share us with your friends and family</li>
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="wd-kr-footermenus">
                <div class="wd-kr-footeredit">

                    <h6><b>Quick</b> Nav</h6>
                </div>
                <ul class="wd-kr-fmenu_inner">
                    <li><a class="{{ isActiveRoute('front.template.home') }}"
                            href="{{ route('front.template.home', $domain_slug) }}">Home</a></li>
                    <li><a class="{{ isActiveRoute('front.template.stock_list') }}"
                            href="{{ route('front.template.stock_list', $domain_slug) }}">Stock List</a></li>
                    <li><a class="{{ isActiveRoute('front.template.finance') }}"
                            href="{{ route('front.template.finance', $domain_slug) }}">Finance</a></li>
                    {{-- <li><a href="javascript:;">Search Car</a></li> --}}
                    <li><a class="{{ isActiveRoute('front.template.contact_us') }}"
                            href="{{ route('front.template.contact_us', $domain_slug) }}">Contact us</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-5">
            <div class="wd-kr-footermenus">
                <div class="wd-kr-footeredit">
                    @if (is_login_for_edit() == 1)
                        <a class="wd-edit-btn" href="javascript:;"
                            onclick="getTimingModal('{{ $web_content->id }}')"><img
                                src="{{ asset('assets/web/template/t16') }}/images/edit.png"></a>
                    @endif
                    <h6><b>Opening</b> Hours</h6>
                </div>
                <ul class="mr-5 wd-kr-footertime timing_box">
                    @foreach ($web_content->working_hours as $time)
                        @php
                            $active = strcasecmp(date('l'), $time->day) == 0 ? 'active' : '';
                        @endphp
                        <li class="{!! $active !!}">
                            <span>{{ $time->day }}</span>
                            @if ($time->is_working == 1)
                                <span>{{ date('h:i A', strtotime($time->start_time)) }}
                                    - {{ date('h:i A', strtotime($time->end_time)) }}</span>
                            @else
                                <span>-</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
</div>
