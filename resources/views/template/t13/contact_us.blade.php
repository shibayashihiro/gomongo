@extends('layouts.template.t13.app')

@section('style')
@endsection

@section('content')
    <section id="bannerot">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-fir-sec">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','contact_us','breadcrumb',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container">
            <div class="wd-sl-bnr_title">
                <h3 class="contact_us_breadcrumb_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'contact_us', 'breadcrumb', 'title') }}
                </h3>
                <p class="contact_us_breadcrumb_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'contact_us', 'breadcrumb', 'sub_title') }}
                </p>
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
        <div class="container">
            <div class="wd-sl-contactflex">
                <div class="wd-sl-cmap">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9552627.600007264!2d-13.449966124945481!3d54.22992374474599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sin!4v1633437983840!5m2!1sen!2sin"
                        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="wd-sl-cdetails">
                    @if (is_login_for_edit() == 1)
                        <a class="wd-edit-btn" href="javascript:;"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','footer',{{ json_encode([
                                'Landline' => 'text',
                                'Address' => 'text',
                                'Email' => 'text',
                            ]) }})"><img
                                src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                    @endif
                    <h6><b>Contact</b> Details</h6>
                    <ul class="wd-sl-contacts mb-3">
                        <li>
                            <svg class="mr-1" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.01 12.38C15.78 12.38 14.59 12.18 13.48 11.82C13.3061 11.7611 13.1191 11.7523 12.9405 11.7948C12.7618 11.8372 12.5988 11.9291 12.47 12.06L10.9 14.03C8.07 12.68 5.42 10.13 4.01 7.2L5.96 5.54C6.23 5.26 6.31 4.87 6.2 4.52C5.83 3.41 5.64 2.22 5.64 0.99C5.64 0.45 5.19 0 4.65 0H1.19C0.65 0 0 0.24 0 0.99C0 10.28 7.73 18 17.01 18C17.72 18 18 17.37 18 16.82V13.37C18 12.83 17.55 12.38 17.01 12.38Z"
                                    fill="#3A92FB" />
                            </svg>
                            <span
                                class="common_footer_landline">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'landline') }}</span>
                        </li>
                        <li>
                            <svg class="mr-1" width="21" height="16" viewBox="0 0 21 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20.8026 13.3998V2.5998C20.8026 1.6038 19.9986 0.799805 19.0026 0.799805H2.19062C1.19462 0.799805 0.390625 1.6038 0.390625 2.5998V13.3998C0.390625 14.3958 1.19462 15.1998 2.19062 15.1998H19.0026C19.9986 15.1998 20.8026 14.3958 20.8026 13.3998ZM19.2306 2.4678C19.6266 2.8638 19.4106 3.2718 19.1946 3.4758L14.3226 7.9398L19.0026 12.8118C19.1466 12.9798 19.2426 13.2438 19.0746 13.4238C18.9186 13.6158 18.5586 13.6038 18.4026 13.4838L13.1586 9.0078L10.5906 11.3478L8.03462 9.0078L2.79062 13.4838C2.63462 13.6038 2.27462 13.6158 2.11862 13.4238C1.95062 13.2438 2.04662 12.9798 2.19062 12.8118L6.87062 7.9398L1.99862 3.4758C1.78262 3.2718 1.56662 2.8638 1.96262 2.4678C2.35862 2.0718 2.76662 2.2638 3.10262 2.5518L10.5906 8.5998L18.0906 2.5518C18.4266 2.2638 18.8346 2.0718 19.2306 2.4678Z"
                                    fill="#3A92FB" />
                            </svg>
                            <a href="javascript:;"
                                class="common_footer_email">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email') }}</a>
                        </li>
                        <li>
                            <svg class="mr-1" width="14" height="19" viewBox="0 0 14 19" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 18.9996C5.73694 17.9222 4.56619 16.7411 3.5 15.4686C1.9 13.5576 8.78894e-07 10.7116 8.78894e-07 7.9996C-0.00069302 6.61456 0.409509 5.26045 1.17869 4.10863C1.94788 2.95681 3.04147 2.05906 4.32107 1.529C5.60067 0.99894 7.00875 0.860394 8.36712 1.1309C9.72548 1.4014 10.9731 2.06879 11.952 3.0486C12.6038 3.69746 13.1203 4.46914 13.4719 5.31898C13.8234 6.16881 14.0029 7.07993 14 7.9996C14 10.7116 12.1 13.5576 10.5 15.4686C9.4338 16.7411 8.26306 17.9222 7 18.9996ZM7 4.9996C6.20435 4.9996 5.44129 5.31567 4.87868 5.87828C4.31607 6.44089 4 7.20395 4 7.9996C4 8.79525 4.31607 9.55832 4.87868 10.1209C5.44129 10.6835 6.20435 10.9996 7 10.9996C7.79565 10.9996 8.55871 10.6835 9.12132 10.1209C9.68393 9.55832 10 8.79525 10 7.9996C10 7.20395 9.68393 6.44089 9.12132 5.87828C8.55871 5.31567 7.79565 4.9996 7 4.9996Z"
                                    fill="#3A92FB" />
                            </svg>
                            <span
                                class="common_footer_address">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'address') }}</span>
                        </li>
                    </ul>
                    {{-- <h6><b>Opening</b> Hours</h6>
                    <div class="wd-sl-footermenus wd-sl-timeflex">
                        <ul class="wd-sl-footertime">
                            <li><span>MONDAY</span> <span>9.30AM - 6PM</span></li>
                            <li class="active"><span>TUESDAY</span> <span>9.30AM - 6PM</span></li>
                            <li><span>WEDNESDAY</span> <span>9.30AM - 6PM</span></li>
                            <li><span>THURSDAY</span> <span>9.30AM - 6PM</span></li>
                        </ul>
                        <ul class="wd-sl-footertime">
                            <li><span>FRIDAY</span> <span>9.30AM - 6PM</span></li>
                            <li><span>SATURDAY</span> <span>9.30AM - 6PM</span></li>
                            <li><span>SUNDAY</span> <span>9.30AM - 6PM</span></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
            <div class="wd-sl-contactform">
                <div class="contact-hedaing">
                    <h3>Say hello</h3>
                    <p></p>
                </div>
                <form class="wd-sl-cform" id="frmContactInvoice" name="frmContactInvoice" method="post"
                    action="javascript:;">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="text" id="first_name" name="first_name" class="form-control"
                                placeholder="First Name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" id="last_name" name="last_name" class="form-control"
                                placeholder="Last Name">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="Email Address">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea type="text" class="form-control" placeholder="Message" id="message" name="message"></textarea>
                        </div>
                        <div class="form-group col-md-12 text-center mt-3">
                            <button class="common-btn" id="btnSubmit" type="submit">Get in touch</button>
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
