@extends('layouts.template.t21.app')

@section('style')
@endsection

@section('content')
    <section id="bannerot" class="mb-0">
        <div class="container">
            <div class="wd-sl-bnr_title">
                <h3>Contact Us</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodoconsequat. </p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.template.home', $domain_slug) }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section id="contactus">
        <div class="wd-sl-cmap">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9552627.600007264!2d-13.449966124945481!3d54.22992374474599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sin!4v1633437983840!5m2!1sen!2sin"
                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="container">
            <div class="wd-sl-contactform">
                <div class="wd-sl-titles text-center">
                    <h2>Get in <b>touch</b></h2>
                    <p>Browse through our most recently sold stock to have an idea on the vehicle we sell or to <br> help
                        you narrow down your car search!</p>
                </div>
                <form class="wd-sl-cform" id="frmContactInvoice" name="frmContactInvoice" action="javascript:;"
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
                            <button class="common-btn" id="btnSubmit" type="button">Get in touch</button>
                        </div>
                    </div>
                </form>
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
