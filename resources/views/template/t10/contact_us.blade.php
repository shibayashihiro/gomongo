@extends('layouts.template.t10.app')

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
            <div class="head-box stock-list-box">
                <svg class="leftsvg" width="13" height="13" viewBox="0 0 13 13" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect width="13" height="13" fill="var(--primary)" />
                </svg>
                <h1 class="contact_us_breadcrumb_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'contact_us', 'breadcrumb', 'title') }}
                </h1>
                <svg class="rightsvg" width="13" height="13" viewBox="0 0 13 13" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect width="13" height="13" fill="var(--primary)" />
                </svg>
            </div>
            <p class="contact_us_breadcrumb_sub_title">
                {{ get_web_content_detail($web_content->id, $web_content->template, 'contact_us', 'breadcrumb', 'sub_title') }}
            </p>
        </div>
    </section>
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9552627.600007264!2d-13.449966124945481!3d54.22992374474599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sin!4v1633437983840!5m2!1sen!2sin"
        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    <section class="wd-md-contact-form">
        <div class="container-fluid">
            <div class="row wd-sl-width">
                <div class="col-md-6">
                    @if (is_login_for_edit() == 1)
                        <a class="wd-edit-btn" href="javascript:;"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','footer',{{ json_encode([
                                'Landline' => 'text',
                                'Address' => 'text',
                                'Email' => 'text',
                            ]) }})"><img
                                src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                    @endif
                    <div class="contact-card">
                        <h6>
                            <svg class="mr-2" width="24" height="23" viewBox="0 0 24 23" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.4042 0.443359H6.69049C3.44111 0.443359 0.797363 3.08711 0.797363 6.33648V17.0521C0.797363 20.2996 3.44111 22.9433 6.69049 22.9433H17.4061C20.6536 22.9433 23.2974 20.2996 23.2974 17.0502V6.33648C23.2974 3.08711 20.6536 0.443359 17.4042 0.443359ZM6.69049 21.0683C6.01924 21.0683 5.39486 20.8865 4.83799 20.594C5.84861 17.5302 8.67423 15.4321 11.9611 15.4321C15.2349 15.4321 18.1224 17.6071 19.1067 20.6765C18.5874 20.9221 18.0155 21.0683 17.4042 21.0683H6.69049ZM9.22173 8.91648C9.22173 7.37523 10.4761 6.12086 12.0174 6.12086C13.5586 6.12086 14.813 7.37523 14.813 8.91648C14.813 10.4559 13.5586 11.7102 12.0174 11.7102C10.4761 11.7102 9.22173 10.4559 9.22173 8.91648Z"
                                    fill="var(--primary)" />
                            </svg>
                            Contact info
                        </h6>
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
                    {{-- <div class="contact-card">
                        <h6><svg class="mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="0.724243" y="0.933594" width="22.5" height="22.5" rx="5" fill="var(--primary)"/><path d="M11.9741 6.62305C8.91576 6.62305 6.41345 9.12535 6.41345 12.1837C6.41345 15.2421 8.91576 17.7444 11.9741 17.7444C15.0325 17.7444 17.5348 15.2421 17.5348 12.1837C17.5348 9.12535 15.0325 6.62305 11.9741 6.62305ZM13.0863 14.2412C12.8082 14.408 12.4746 14.2968 12.3078 14.0188L11.4737 12.4618C11.4181 12.3505 11.4181 12.2949 11.4181 12.1837V9.40339C11.4181 9.06975 11.6405 8.84732 11.9741 8.84732C12.3078 8.84732 12.5302 9.06975 12.5302 9.40339V12.0169L13.3087 13.4627C13.4199 13.7407 13.3643 14.0744 13.0863 14.2412Z" fill="white"/></svg> Opening Hours</h6>
                        <div class="wd-sl-ph">
                                <span class="mb-0">Monday-Friday<br>
                                    09:00 AM - 06:00 PM<br>
                                    Saturday<br>
                                    10:00 AM - 05:00 PM</span>
                        </div>
                    </div> --}}
                    <div class="contact-card">
                        <h6>
                            <svg class="mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.724243" y="0.515625" width="22.5" height="22.5" rx="5"
                                    fill="var(--primary)" />
                                <path
                                    d="M11.9742 5.40039C10.6083 5.40191 9.29873 5.93883 8.33285 6.89337C7.36698 7.8479 6.82368 9.14209 6.82214 10.492C6.82214 12.5637 8.34394 14.284 9.95591 16.1049C10.466 16.6815 10.9941 17.2779 11.4642 17.8812C11.5243 17.9583 11.6016 18.0208 11.69 18.0638C11.7785 18.1068 11.8757 18.1291 11.9742 18.1291C12.0728 18.1291 12.17 18.1068 12.2584 18.0638C12.3469 18.0208 12.4241 17.9583 12.4843 17.8812C12.9544 17.2779 13.4825 16.6815 13.9926 16.1049C15.6045 14.284 17.1263 12.5637 17.1263 10.492C17.1248 9.14209 16.5815 7.8479 15.6156 6.89337C14.6498 5.93883 13.3402 5.40191 11.9742 5.40039ZM11.9742 12.4014C11.5921 12.4014 11.2186 12.2894 10.9009 12.0796C10.5831 11.8698 10.3355 11.5716 10.1893 11.2227C10.043 10.8738 10.0048 10.4899 10.0793 10.1195C10.1539 9.74913 10.3379 9.40892 10.6081 9.14189C10.8783 8.87486 11.2225 8.69301 11.5973 8.61934C11.9721 8.54567 12.3606 8.58348 12.7136 8.72799C13.0666 8.87251 13.3684 9.11723 13.5807 9.43123C13.793 9.74522 13.9063 10.1144 13.9063 10.492C13.9063 10.9984 13.7027 11.4841 13.3404 11.8421C12.9781 12.2002 12.4866 12.4014 11.9742 12.4014Z"
                                    fill="black" />
                            </svg>
                            Office Address
                        </h6>
                        <div class="wd-sl-ph">
                            <span
                                class="common_footer_address">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'address') }}</span>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="wd-sl-bgupbox">
                        <h5>Say hello</h5>
                        {{-- <p>Lorem Ipsum is simply dummy text of the printing .</p> --}}
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
                                        <label for="Message">Message</label>
                                        <textarea class="form-control" rows="5" id="message" name="message"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn" id="btnSubmit">Get in touch</button>
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
