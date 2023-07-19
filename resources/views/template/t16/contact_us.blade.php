@extends('layouts.template.t16.app')

@section('style')
@endsection

@section('content')
    <section id="bannerot">
        <div class="container">
            <div class="wd-kr-bnr_title">
                <h3>Contact us</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.template.home', $domain_slug) }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section>
        <div class="row">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9552627.600007264!2d-13.449966124945481!3d54.22992374474599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sin!4v1633437983840!5m2!1sen!2sin"
                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="container">
            <div class="row mrgtb_50">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wd-kr-contact-bx">
                                @if (is_login_for_edit() == 1)
                                    <div class="wd-kr-contactedit">
                                        <a class="wd-edit-btn" href="javascript:;"
                                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','footer',{{ json_encode([
                                                'Address' => 'text',
                                            ]) }})"><img
                                                src="{{ asset('assets/web/template/t16') }}/images/edit.png"></a>
                                    </div>
                                @endif
                                <h3>Address</h3>
                                <p class="common_footer_address">
                                    {{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'address') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wd-kr-contact-bx">
                                @if (is_login_for_edit() == 1)
                                    <div class="wd-kr-contactedit">
                                        <a class="wd-edit-btn" href="javascript:;"
                                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','footer',{{ json_encode([
                                                'Landline' => 'text',
                                                'Email' => 'text',
                                            ]) }})"><img
                                                src="{{ asset('assets/web/template/t16') }}/images/edit.png"></a>
                                    </div>
                                @endif
                                <h3>Contact info</h3>
                                <p>Email: <a
                                        href="mail:{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email') }}"
                                        class="common_footer_email">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email') }}</a>
                                </p>
                                <p>Landline: <a
                                        href="tel:{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'landline') }}"
                                        class="common_footer_landline">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'landline') }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-12">
                            <div class="wd-kr-contact-bx">
                                <div class="wd-kr-contactedit">
                                    <a class="wd-edit-btn" href="javascript:;"><img
                                            src="{{asset('assets/web/template/t16')}}/images/edit.png"></a>
                                </div>
                                <h3>Opening Hours</h3>
                                <ul class="mr-5 wd-kr-footertime">
                                    <li><span>MONDAY</span> <span class="rght">9.30AM - 6PM</span></li>
                                    <li class="active"><span>TUESDAY</span> <span class="rght">9.30AM - 6PM</span></li>
                                    <li><span>WEDNESDAY</span> <span class="rght">9.30AM - 6PM</span></li>
                                    <li><span>THURSDAY</span> <span class="rght">9.30AM - 6PM</span></li>
                                    <li><span>FRIDAY</span> <span class="rght">9.30AM - 6PM</span></li>
                                    <li><span>SATURDAY</span> <span class="rght">9.30AM - 6PM</span></li>
                                    <li><span>SUNDAY</span> <span class="rght">9.30AM - 6PM</span></li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="col-md-8">
                    <div class="wd-kr-contactform">
                        <form class="wd-kr-cform" id="frmContactInvoice" name="frmContactInvoice" action="javascript:;"
                            method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="first_name" id="first_name" class="form-control"
                                        placeholder="First Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="last_name" id="last_name" class="form-control"
                                        placeholder="Last Name">
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea type="text" class="form-control" name="message" id="message" placeholder="Message"></textarea>
                                </div>
                                <div class="form-group col-md-12 text-center mt-3">
                                    <button class="wd-kr-cmmn-btn" id="btnSubmit" type="button">Send Enquiry</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script>
        $('main').removeClass('home-page');
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
                let data = new FormData($('#frmContactInvoice')[0]);
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
