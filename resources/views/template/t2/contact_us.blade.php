@extends('layouts.template.t2.app')

@section('style')
@endsection

@section('content')
    <section class="wd-md-stock-main">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('front.template.home', $domain_slug) }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                </ol>
            </nav>
            @if (is_login_for_edit() == 1)
                <div class="wd-edit-fir-sec">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','contact_us','breadcrumb',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea']) }})"><img
                            src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                </div>
            @endif
            <h2 class="contact_us_breadcrumb_title">
                {{ get_web_content_detail($web_content->id, $web_content->template, 'contact_us', 'breadcrumb', 'title') }}
            </h2>
            <p class="contact_us_breadcrumb_sub_title">
                {{ get_web_content_detail($web_content->id, $web_content->template, 'contact_us', 'breadcrumb', 'sub_title') }}
            </p>
        </div>
    </section>
    <section class="wd-md-map">
        <div class="container">
            <img src="{{ asset('assets/web/template/t2/images/contact-us/Huge Global.png') }}" class="img-fluid">
            <div class="wd-md-cont-blog">
                <div class="row">
                    <div class="col-md-5">
                        @if (is_login_for_edit() == 1)
                            <a class="wd-edit-btn" href="javascript:;"
                                onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','footer',{{ json_encode([
                                    'Facebook URL' => 'text',
                                    'Instagram URL' => 'text',
                                    'Twitter URL' => 'text',
                                    'Linkedin URL' => 'text',
                                    'Address' => 'text',
                                    'Mobile' => 'text',
                                ]) }})"><img
                                    src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                        @endif
                        <div class="wd-md-contact-detail">
                            <div class="wd-md-call">
                                <div>
                                    <a href="javascript:;">
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.0759 12.3486C11.104 11.3206 11.104 9.64783 10.0759 8.61974L6.4603 5.0041C5.90724 4.45097 5.14054 4.17072 4.35755 4.23517C3.5895 4.2984 2.89481 4.68992 2.45167 5.30925C2.35968 5.43781 2.27085 5.56824 2.18384 5.69972L9.45433 12.9702L10.0759 12.3486Z"
                                                fill="#474FA0" />
                                            <path
                                                d="M24.9956 23.5395L21.38 19.9239C20.352 18.8959 18.6791 18.8958 17.651 19.9239L17.0294 20.5455L24.3002 27.8163C24.4317 27.7292 24.5619 27.6401 24.6904 27.5481C25.3097 27.105 25.7012 26.4103 25.7645 25.6423C25.829 24.8591 25.5487 24.0927 24.9956 23.5395Z"
                                                fill="#474FA0" />
                                            <path
                                                d="M14.5436 21.9388C13.8392 21.9388 13.1772 21.6645 12.6791 21.1665L8.83305 17.3204C8.33506 16.8224 8.06072 16.1603 8.06072 15.456C8.06072 15.0559 8.14949 14.6695 8.31719 14.319L1.28582 7.2876C0.296757 9.36434 -0.140938 11.691 0.0396476 14.0265C0.282987 17.1735 1.64014 20.1298 3.86119 22.3508L7.64881 26.1384C9.86975 28.3594 12.8261 29.7165 15.9732 29.9599C16.317 29.9865 16.6606 29.9997 17.0034 29.9997C18.9883 29.9997 20.941 29.5572 22.712 28.7138L15.6805 21.6823C15.33 21.8501 14.9437 21.9388 14.5436 21.9388Z"
                                                fill="#474FA0" />
                                            <path
                                                d="M17.6952 0C17.2098 0 16.8163 0.393516 16.8163 0.878906C16.8163 1.3643 17.2098 1.75781 17.6952 1.75781C23.5107 1.75781 28.2421 6.48914 28.2421 12.3047C28.2421 12.7901 28.6356 13.1836 29.121 13.1836C29.6064 13.1836 29.9999 12.7901 29.9999 12.3047C29.9999 5.51988 24.48 0 17.6952 0Z"
                                                fill="#474FA0" />
                                            <path
                                                d="M17.6951 12.3039C17.6951 12.3039 17.6952 12.3042 17.6952 12.3047C17.6952 12.7901 18.0887 13.1836 18.5741 13.1836C19.0595 13.1836 19.453 12.7901 19.453 12.3047C19.453 11.3354 18.6644 10.5469 17.6952 10.5469C17.2098 10.5469 16.8163 10.94 16.8163 11.4254C16.8163 11.9108 17.2097 12.3039 17.6951 12.3039Z"
                                                fill="#474FA0" />
                                            <path
                                                d="M17.6952 8.78906C19.6337 8.78906 21.2108 10.3662 21.2108 12.3047C21.2108 12.7901 21.6043 13.1836 22.0897 13.1836C22.5751 13.1836 22.9686 12.7901 22.9686 12.3047C22.9686 9.39691 20.603 7.03125 17.6952 7.03125C17.2098 7.03125 16.8163 7.42477 16.8163 7.91016C16.8163 8.39555 17.2098 8.78906 17.6952 8.78906Z"
                                                fill="#474FA0" />
                                            <path
                                                d="M17.6952 3.51562C17.2098 3.51562 16.8163 3.90914 16.8163 4.39453C16.8163 4.87992 17.2098 5.27344 17.6952 5.27344C21.5722 5.27344 24.7264 8.42766 24.7264 12.3047C24.7264 12.7901 25.12 13.1836 25.6053 13.1836C26.0907 13.1836 26.4843 12.7901 26.4843 12.3047C26.4843 7.4584 22.5415 3.51562 17.6952 3.51562Z"
                                                fill="#474FA0" />
                                        </svg>
                                    </a>
                                </div>
                                <p class="common_footer_mobile">
                                    {{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'mobile') }}
                                </p>
                            </div>
                            <div class="wd-md-location">
                                <div>
                                    <a href="javascript:;">
                                        <svg width="29" height="40" viewBox="0 0 29 40" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M14.6436 0.291992C7.09688 0.291992 0.957031 6.43184 0.957031 13.9786C0.957031 23.464 14.657 39.667 14.657 39.667C14.657 39.667 28.3302 22.9975 28.3302 13.9786C28.3302 6.43184 22.1905 0.291992 14.6436 0.291992ZM18.7731 17.986C17.6344 19.1244 16.1391 19.6937 14.6436 19.6937C13.1483 19.6937 11.6525 19.1244 10.5143 17.986C8.23722 15.7091 8.23722 12.0043 10.5143 9.72719C11.6169 8.62409 13.0836 8.01655 14.6436 8.01655C16.2035 8.01655 17.67 8.62433 18.7731 9.72719C21.0502 12.0043 21.0502 15.7091 18.7731 17.986Z"
                                                fill="#474FA0" />
                                        </svg>
                                    </a>
                                </div>
                                <p class="common_footer_address">
                                    {{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'address') }}
                                </p>
                            </div>
                            <div class="wd-md-social-blog">
                                <h3>Follow us</h3>
                                <div class="wd-md-social-media d-flex align-items-center justify-content-center">
                                    <a
                                        href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'facebook_url') }}"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a
                                        href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'instagram_url') }}"><i
                                            class="fab fa-instagram"></i></a>
                                    <a
                                        href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'twitter_url') }}"><i
                                            class="fab fa-twitter"></i></a>
                                    <a
                                        href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'linkedin_url') }}"><i
                                            class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="wd-md-cont-form">
                            <div class="wd-md-contact-form-heading">
                                <h3>Say hello</h3>
                                {{-- <p>Lorem Ipsum is simply dummy text of the printing .</p> --}}
                            </div>
                            <form class="wd-md-contact-form-blog" id="frmContactInvoice" name="frmContactInvoice"
                                method="post" action="javascript:;">
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
                                </div>
                                <button type="submit" class="btn" id="btnSubmit">Get in touch</button>
                            </form>
                        </div>
                    </div>
                </div>
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
