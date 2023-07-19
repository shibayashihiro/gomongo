@extends('layouts.template.t8.app')

@section('style')
@endsection

@section('content')
    <div class="search-banner">
        <div class="container">
            <nav aria-label="breadcrumb" class="brdmb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('front.template.home', $domain_slug) }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
            <div class="banner-desc">
                @if (is_login_for_edit() == 1)
                    <div class="wd-edit-fir-sec">
                        <a class="wd-edit-btn" href="javascript:;"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','contact_us','breadcrumb',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea']) }})"><img
                                src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                    </div>
                @endif
                <h1><span
                        class="contact_us_breadcrumb_title">{{ get_web_content_detail($web_content->id, $web_content->template, 'contact_us', 'breadcrumb', 'title') }}</span>
                </h1>
                <p class="contact_us_breadcrumb_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'contact_us', 'breadcrumb', 'sub_title') }}
                </p>
            </div>
        </div>
    </div>
    <section class="wd-md-contact-form">
        <div class="container">
            <div class="row">
                <div class="contact-form-cont">
                    <div class="cont-form-left">
                        <form class="wd-md-contact-form-blog" id="frmContactInvoice" name="frmContactInvoice" method="post"
                            action="javascript:;">
                            @csrf
                            <div class="col-md-12 f-l-name">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name">
                                </div>
                            </div>
                            <div class="col-md-12 f-l-name">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="text" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Message">Message</label>
                                    <textarea class="form-control" rows="5" id="message" name="message"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group action">
                                    <button type="submit" class="y-btn" id="btnSubmit">Get in touch</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="contact-body">
                        <div class="cont-address">
                            <div class="contact-info-blog">
                                @if (is_login_for_edit() == 1)
                                    <a class="wd-edit-btn" href="javascript:;"
                                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','footer',{{ json_encode([
                                            'Landline 1' => 'text',
                                            'Landline 2' => 'text',
                                            'Address' => 'text',
                                            'Email' => 'text',
                                        ]) }})"><img
                                            src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                                @endif
                                <div class="contact-info-box contact">
                                    <h5>Contact info</h5>
                                    <p>Landline : <span
                                            class="common_footer_landline_1">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'landline_1') }}</span>
                                    </p>
                                    <p>Landline : <span
                                            class="common_footer_landline_2">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'landline_2') }}</span>
                                    </p>
                                    <p>Email: <span
                                            class="common_footer_email">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email') }}</span>
                                    </p>
                                </div>
                                {{-- <div class="contact-info-box opening">
                                    <h5>Opening Hours</h5>
                                    <p>Monday-Friday <br>09:00 AM - 06:00 PM <br>Saturday <br>10:00 AM - 05:00 PM</p>
                                </div> --}}
                                <div class="contact-info-box social-box">
                                    <h5>Office Address</h5>
                                    <p class="common_footer_address">
                                        {{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'address') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="cont-car-img">
            <img src="assets/images/contact-car.png" alt="">
        </div>
    </div>
    <section id="map-row">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9552627.600007264!2d-13.449966124945481!3d54.22992374474599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sin!4v1633437983840!5m2!1sen!2sin"
            width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </section>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script>
        let frmContactInvoice = $("#frmContactInvoice").validate({
            rules: {
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    required: true
                },
            },
            messages: {
                first_name: {
                    required: 'Please enter first name'
                },
                last_name: {
                    required: 'Please enter last name'
                },
                email: {
                    required: 'Please enter email'
                },
                message: {
                    required: 'Please enter message'
                },
            }
        });

        $("#btnSubmit").click(function() {
            if ($("#frmContactInvoice").valid()) {
                var data = new FormData($('#frmContactInvoice')[0]);
                $("#btnSubmit").attr('disabled', true);
                $.ajax({
                    type: 'post',
                    data: data,
                    dataType: "json",
                    url: "{{ route('front.template.contact_us.post') }}",
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: addOverlay,
                    success: function(r) {
                        removeOverlay();
                        $("#btnSubmit").attr('disabled', false);
                        if (r.status == 200) {
                            toastr['success'](r.message, "success");
                            $('#frmContactInvoice')[0].reset();
                        } else {
                            toastr['error'](r.message, "error");

                        }
                    }
                });
            }
        });
    </script>
@endsection
