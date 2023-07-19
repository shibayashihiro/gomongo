@extends('layouts.template.t17.app')

@section('style')
@endsection

@section('content')
    <section id="bannerot" class="my-auto">
        <div class="container">
            @if (is_login_for_edit() == 1)
                <div class="wd-edit-fir-sec contact_us_edit_btn">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','contact_us','breadcrumb',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea']) }})"><img
                            src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                </div>
            @endif
            <div class="wd-kr-bnr_title">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.template.home', $domain_slug) }}">Home</a></li>
                        <li class="breadcrumb-item active contact_us_breadcrumb_title" aria-current="page">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'contact_us', 'breadcrumb', 'title') }}
                        </li>
                    </ol>
                </nav>
                <h3 class="contact_us_breadcrumb_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'contact_us', 'breadcrumb', 'title') }}
                </h3>
                <p>{{ get_web_content_detail($web_content->id, $web_content->template, 'contact_us', 'breadcrumb', 'sub_title') }}
                </p>
            </div>
        </div>
    </section>
    <section>
        <div class="row">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9552627.600007264!2d-13.449966124945481!3d54.22992374474599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sin!4v1633437983840!5m2!1sen!2sin"
                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="container">
            <div class="row mrgtb_50">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wd-kr-contact-bx">
                                <div class="wd-kr-contactedit">
                                    @if (is_login_for_edit() == 1)
                                        <a class="wd-edit-btn" href="javascript:;"
                                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','footer',{{ json_encode([
                                                'Address' => 'text',
                                            ]) }})"><img
                                                src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                                    @endif
                                </div>
                                <h3>Address</h3>
                                <p><span
                                        class="common_footer_address">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'address') }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wd-kr-contact-bx">
                                <div class="wd-kr-contactedit">
                                    @if (is_login_for_edit() == 1)
                                        <a class="wd-edit-btn" href="javascript:;"
                                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','footer',{{ json_encode([
                                                'Landline' => 'text',
                                                'Email' => 'text',
                                            ]) }})"><img
                                                src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                                    @endif
                                </div>
                                <h3>Contact info</h3>
                                <p>Landline: <a
                                        href="tel:{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'landline') }}"><span
                                            class="common_footer_landline">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'landline') }}</span></a>
                                </p>
                                <p>Email: <a
                                        href="mailto:{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email') }}"><span
                                            class="common_footer_email">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email') }}</span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wd-kr-contact-bx">
                                <div class="wd-kr-contactedit">
                                </div>
                                <h3>Opening Hours</h3>
                                <ul class="mr-5 wd-kr-footertime">
                                    @foreach ($web_content->working_hours as $time)
                                        <li>
                                            <span>{{ $time->day }}</span>
                                            @if ($time->is_working == 1)
                                                <span class="rght">{{ date('h:i A', strtotime($time->start_time)) }} -
                                                    {{ date('h:i A', strtotime($time->end_time)) }}</span>
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
                <div class="col-md-8">
                    <div class="wd-kr-contactform">
                        <form class="wd-md-contact-form-blog wd-kr-cform" id="frmContactInvoice" name="frmContactInvoice"
                            method="post" action="javascript:;">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        placeholder="First Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        placeholder="Last Name">
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control" id="email" name="email"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" rows="5" id="message" name="message" placeholder="Message"></textarea>
                                </div>
                                <div class="form-group col-md-12 text-center mt-3">
                                    <button type="submit" class="wd-kr-cmmn-btn" id="btnSubmit">Get in touch</button>
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
