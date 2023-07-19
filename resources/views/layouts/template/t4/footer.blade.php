<div class="footer">
    <div class="container-fluid">
        <div class="footer-cont ">
            <div class="row">
                <div class="col-lg-4 col-md-12 f-logo">
                    <div class="wd-sl-footeredit">
                        @if(is_login_for_edit() == 1)
                        <a class="wd-edit-btn" href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','common','footer',{{json_encode([
                            'Vat Number'=>'text',
                            'Company registration number'=>'text',
                            'FCA number'=>'text',
                            'Email Address'=>'text',
                            'Contact number'=>'text',
                            ])}})"><img src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                        @endif
                        <h6>
                            <svg class="mr-2" width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5.74902" cy="5.09766" r="5" fill="#FFBF48" />
                            </svg>
                            Contact Us
                        </h6>
                    </div>
                    <ul class="wd-sl-infocontact">
                        <li>
                            <span class="yellow-txt">Vat Number</span>
                            <span class="common_footer_vat_number">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'vat_number')}}</span>
                        </li>
                        <li>
                            <span class="yellow-txt">Email Address</span>
                            <span class="common_footer_email_address">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email_address')}}</span>
                        </li>
                    </ul>
                    <ul class="wd-sl-infocontact">
                        <li>
                            <span class="yellow-txt">Company registration number</span>
                            <span class="common_footer_company_registration_number">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'company_registration_number')}}</span>
                        </li>
                        <li>
                            <span class="yellow-txt">Contact number</span>
                            <span class="common_footer_contact_number">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'contact_number')}}</span>
                        </li>
                    </ul>
                    <ul class="wd-sl-infocontact">
                        <li>
                            <span class="yellow-txt">FCA number</span>
                            <span class="common_footer_fca_number">{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'fca_number')}}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-3 col-md-12 f-timing">
                    <div class="wd-sl-footeredit">
                        @if(is_login_for_edit() == 1)
                        <a class="wd-edit-btn" href="javascript:;" onclick="getTimingModal('{{$web_content->id}}')"><img src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                        @endif
                        <h6>
                            <svg class="mr-2" width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5.74902" cy="5.09766" r="5" fill="#FFBF48" />
                            </svg>
                            Opening Hours
                        </h6>
                    </div>
                    <div class="timing_box">
                        @foreach($web_content->working_hours as $time)
                        @php
                        $active = strcasecmp(date('l'), $time->day) == 0 ? 'class="active"' : '';
                        @endphp
                        @if($time->is_working == 1)
                        <p {!! $active !!}>{{$time->day}}</p>
                        <p {!! $active !!}>{{date('h:i A', strtotime($time->start_time))}}
                            - {{date('h:i A', strtotime($time->end_time))}}</p>
                        @else
                        <p {!! $active !!}>{{$time->day}}</p>
                        <p {!! $active !!}>-</p>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 f-contact">
                    <h6>
                        <svg class="mr-2" width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="5.74902" cy="5.09766" r="5" fill="#FFBF48" />
                        </svg>
                        Newsletter
                    </h6>
                    <p>Join our newsletter for latest Updates</p>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Your email address">
                        <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="14.6137" cy="14.141" r="13.9555" fill="#FFBF48" />
                            <path d="M12.1978 13.837L12.3719 19.4529L21.5794 9.24414L12.1978 13.837Z" fill="#252B2F" />
                            <path d="M7.64844 9.6137L12.0236 13.423L21.4271 8.83008L7.64844 9.6137Z" fill="#252B2F" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="copyright">
    <div class="container-fluid">
        <p>Copyright ® 2021 Company All rights Rcerved</p>
    </div>
</div>