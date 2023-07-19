@extends('layouts.template.t6.app')

@section('style')
@endsection

@section('content')
    <section class="wd-md-stock-main text-center">
        <div class="container">
            @if (is_login_for_edit() == 1)
                <div class="wd-edit-fir-sec">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','contact_us','breadcrumb',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea']) }})"><img
                            src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                </div>
            @endif
            <h1 class="contact_us_breadcrumb_title">
                {{ get_web_content_detail($web_content->id, $web_content->template, 'contact_us', 'breadcrumb', 'title') }}
            </h1>
            <h3><a href="{{ route('front.template.home', $domain_slug) }}">HOME</a> | CONTACT US</h3>
            <p class="contact_us_breadcrumb_sub_title">
                {{ get_web_content_detail($web_content->id, $web_content->template, 'contact_us', 'breadcrumb', 'sub_title') }}
            </p>
        </div>
    </section>
    <section class="wd-md-contact-form">
        <div class="wd-md-contact-blog d-flex">
            <div class="wd-md-contact">
                <div class="wd-md-cont-details">
                    <div class="contact-card">
                        <h6>Contact info</h6>
                        @if (is_login_for_edit() == 1)
                            <a class="wd-edit-btn" href="javascript:;"
                                onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','footer',{{ json_encode([
                                    'Landline' => 'text',
                                    'Address' => 'text',
                                    'Email' => 'text',
                                ]) }})"><img
                                    src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                        @endif
                        <div class="wd-sl-ph">
                            <span>Landline : </span>
                            <a href="javascript:;"
                                class="common_footer_landline">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'landline') }}</a>
                        </div>
                        <div class="wd-sl-ph">
                            <span class="mb-0">Email : </span>
                            <a href="javascript:;"
                                class="common_footer_email">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email') }}</a>
                        </div>
                    </div>
                    <div class="contact-card">
                        <h6>Office Address</h6>
                        <div class="wd-sl-ph">
                            <span
                                class="common_footer_address">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'address') }}</span>
                        </div>
                    </div>
                </div>
                <form class="wd-md-contact-form-blog" id="frmContactInvoice" name="frmContactInvoice" method="post"
                    action="javascript:;">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" rows="5" id="message" name="message"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn" id="btnSubmit">Get in touch</button>
                    </div>
                </form>
            </div>
            <div class="wd-md-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9552627.600007264!2d-13.449966124945481!3d54.22992374474599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sin!4v1633437983840!5m2!1sen!2sin"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
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
