@extends('layouts.template.t1.app')

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
            <img src="{{ asset('assets/web/template/t1/images/contact-us/Huge Global.png') }}" class="img-fluid">
            <div class="wd-md-contact-detail d-flex align-items-center justify-content-between">
                <div class="wd-md-social-blog">
                    @if (is_login_for_edit() == 1)
                        <a class="wd-edit-btn" href="javascript:;"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','footer',{{ json_encode([
                                'Facebook URL' => 'text',
                                'Instagram URL' => 'text',
                                'Twitter URL' => 'text',
                                'Linkedin URL' => 'text',
                            ]) }})"><img
                                src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                    @endif
                    <h3>Follow us</h3>
                    <div class="wd-md-social-media d-flex align-items-center">
                        <a href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'facebook_url') }}"
                            target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'instagram_url') }}"
                            target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'twitter_url') }}"
                            target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'linkedin_url') }}"
                            target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="wd-md-call d-flex align-items-center">

                    <div>
                        <a href="javascript:;">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                    <path
                                        d="M10.0759 12.3489C11.104 11.3208 11.104 9.64807 10.0759 8.61999L6.4603 5.00434C5.90724 4.45122 5.14054 4.17096 4.35755 4.23542C3.5895 4.29864 2.89481 4.69016 2.45167 5.3095C2.35968 5.43805 2.27085 5.56848 2.18384 5.69997L9.45433 12.9705L10.0759 12.3489Z"
                                        fill="black" />
                                    <path
                                        d="M24.9956 23.5394L21.38 19.9237C20.352 18.8958 18.6791 18.8956 17.651 19.9237L17.0294 20.5454L24.3002 27.8161C24.4317 27.7291 24.5619 27.6399 24.6904 27.548C25.3097 27.1049 25.7012 26.4102 25.7645 25.6421C25.829 24.859 25.5487 24.0926 24.9956 23.5394Z"
                                        fill="black" />
                                    <path
                                        d="M14.5436 21.939C13.8392 21.939 13.1772 21.6648 12.6791 21.1668L8.83305 17.3207C8.33506 16.8227 8.06072 16.1605 8.06072 15.4562C8.06072 15.0561 8.14949 14.6698 8.31719 14.3193L1.28582 7.28784C0.296757 9.36458 -0.140938 11.6913 0.0396476 14.0267C0.282987 17.1738 1.64014 20.1301 3.86119 22.3511L7.64881 26.1386C9.86975 28.3596 12.8261 29.7168 15.9732 29.9602C16.317 29.9868 16.6606 30 17.0034 30C18.9883 30 20.941 29.5575 22.712 28.7141L15.6805 21.6826C15.33 21.8503 14.9437 21.939 14.5436 21.939Z"
                                        fill="black" />
                                    <path
                                        d="M17.6952 0C17.2098 0 16.8163 0.393516 16.8163 0.878906C16.8163 1.3643 17.2098 1.75781 17.6952 1.75781C23.5107 1.75781 28.2421 6.48914 28.2421 12.3047C28.2421 12.7901 28.6356 13.1836 29.121 13.1836C29.6064 13.1836 29.9999 12.7901 29.9999 12.3047C29.9999 5.51988 24.48 0 17.6952 0Z"
                                        fill="black" />
                                    <path
                                        d="M17.6951 12.3039C17.6951 12.3039 17.6952 12.3042 17.6952 12.3047C17.6952 12.7901 18.0887 13.1836 18.5741 13.1836C19.0595 13.1836 19.453 12.7901 19.453 12.3047C19.453 11.3354 18.6644 10.5469 17.6952 10.5469C17.2098 10.5469 16.8163 10.94 16.8163 11.4254C16.8163 11.9108 17.2097 12.3039 17.6951 12.3039Z"
                                        fill="black" />
                                    <path
                                        d="M17.6952 8.78906C19.6337 8.78906 21.2108 10.3662 21.2108 12.3047C21.2108 12.7901 21.6043 13.1836 22.0897 13.1836C22.5751 13.1836 22.9686 12.7901 22.9686 12.3047C22.9686 9.39691 20.603 7.03125 17.6952 7.03125C17.2098 7.03125 16.8163 7.42477 16.8163 7.91016C16.8163 8.39555 17.2098 8.78906 17.6952 8.78906Z"
                                        fill="black" />
                                    <path
                                        d="M17.6952 3.51562C17.2098 3.51562 16.8163 3.90914 16.8163 4.39453C16.8163 4.87992 17.2098 5.27344 17.6952 5.27344C21.5722 5.27344 24.7264 8.42766 24.7264 12.3047C24.7264 12.7901 25.12 13.1836 25.6053 13.1836C26.0907 13.1836 26.4843 12.7901 26.4843 12.3047C26.4843 7.4584 22.5415 3.51562 17.6952 3.51562Z"
                                        fill="black" />

                                </g>
                                <defs>
                                    <clipPath id="clip0">
                                        <rect width="30" height="30" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </div>
                    @if (is_login_for_edit() == 1)
                        <a class="wd-edit-btn" href="javascript:;"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','top_header',{{ json_encode(['Address' => 'text', 'Mobile' => 'text']) }})"><img
                                src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                    @endif
                    <p class="common_top_header_mobile">
                        {{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'mobile') }}
                    </p>
                </div>
                <div class="wd-md-location d-flex">
                    <div>
                        <a href="javascript:;">
                            <svg width="20" height="29" viewBox="0 0 20 29" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.254 0.89209C5.04313 0.89209 0.803711 5.13151 0.803711 10.3423C0.803711 16.8918 10.2632 28.0796 10.2632 28.0796C10.2632 28.0796 19.7042 16.5697 19.7042 10.3423C19.7042 5.13151 15.4649 0.89209 10.254 0.89209ZM13.1053 13.1094C12.3191 13.8954 11.2866 14.2885 10.254 14.2885C9.22148 14.2885 8.18867 13.8954 7.40279 13.1094C5.83051 11.5373 5.83051 8.97914 7.40279 7.40687C8.16412 6.64521 9.17684 6.22571 10.254 6.22571C11.3311 6.22571 12.3436 6.64537 13.1053 7.40687C14.6776 8.97914 14.6776 11.5373 13.1053 13.1094Z"
                                    fill="black" />
                            </svg>
                        </a>
                    </div>
                    <p class="common_top_header_address">
                        {{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'top_header', 'address') }}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="wd-md-contact-form">
        <div class="container">
            <div class="wd-md-contact-form-heading">
                <h3>Say hello</h3>
                {{-- <p>Lorem Ipsum is simply dummy text of the printing .</p> --}}
            </div>
            <form id="frmContactInvoice" name="frmContactInvoice" method="post" action="javascript:;"
                class="wd-md-contact-form-blog">
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
                            <textarea class="form-control" rows="5" name="message" id="Message"></textarea>
                        </div>
                    </div>
                    <button type="submit" id="btnSubmit" class="btn">Get in touch</button>
                </div>
            </form>
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
