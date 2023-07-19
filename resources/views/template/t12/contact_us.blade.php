@extends('layouts.template.t12.app')

@section('style')
@endsection

@section('content')
    <section class="wd-stock-list-main-blog">
        <div class="container">
            @if (is_login_for_edit() == 1)
                <div class="wd-edit-fir-sec contact_us_edit_btn">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','contact_us','breadcrumb',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea']) }})"><img
                            src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                </div>
            @endif
            <div class="wd-stock-list-title">
                <h1 class="contact_us_breadcrumb_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'contact_us', 'breadcrumb', 'title') }}
                </h1>
                <p>{{ get_web_content_detail($web_content->id, $web_content->template, 'contact_us', 'breadcrumb', 'sub_title') }}
                </p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.template.home', $domain_slug) }}">Home</a></li>
                        <li class="breadcrumb-item active contact_us_breadcrumb_title" aria-current="page">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'contact_us', 'breadcrumb', 'title') }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="wd-map-contact-blog">
        <div class="wd-map-cont-inner d-flex">
            <div class="wd-map-blog">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9552627.600007264!2d-13.449966124945481!3d54.22992374474599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sin!4v1633437983840!5m2!1sen!2sin"
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="wd-contact-blog">
                @if (is_login_for_edit() == 1)
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','footer',{{ json_encode([
                            'Landline' => 'text',
                            'Address' => 'text',
                            'Email' => 'text',
                        ]) }})"><img
                            src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                @endif
                <h5>Contact Details</h5>
                <p>
                    <a
                        href="tel:{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'landline') }}">
                        <span>
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.01 12.38C15.78 12.38 14.59 12.18 13.48 11.82C13.3061 11.7611 13.1191 11.7523 12.9405 11.7948C12.7618 11.8372 12.5988 11.9291 12.47 12.06L10.9 14.03C8.07 12.68 5.42 10.13 4.01 7.2L5.96 5.54C6.23 5.26 6.31 4.87 6.2 4.52C5.83 3.41 5.64 2.22 5.64 0.99C5.64 0.45 5.19 0 4.65 0H1.19C0.65 0 0 0.24 0 0.99C0 10.28 7.73 18 17.01 18C17.72 18 18 17.37 18 16.82V13.37C18 12.83 17.55 12.38 17.01 12.38Z"
                                    fill="#D9B776" />
                            </svg>
                        </span>
                        <span
                            class="common_footer_landline">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'landline') }}</span>
                    </a>
                </p>
                <hr>
                <p>
                    <a
                        href="mailto:{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email') }}">
                        <span>
                            <svg width="21" height="16" viewBox="0 0 21 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20.8026 13.4V2.60005C20.8026 1.60405 19.9986 0.800049 19.0026 0.800049H2.19062C1.19462 0.800049 0.390625 1.60405 0.390625 2.60005V13.4C0.390625 14.396 1.19462 15.2 2.19062 15.2H19.0026C19.9986 15.2 20.8026 14.396 20.8026 13.4ZM19.2306 2.46805C19.6266 2.86405 19.4106 3.27205 19.1946 3.47605L14.3226 7.94005L19.0026 12.812C19.1466 12.98 19.2426 13.244 19.0746 13.424C18.9186 13.616 18.5586 13.604 18.4026 13.484L13.1586 9.00805L10.5906 11.348L8.03462 9.00805L2.79062 13.484C2.63462 13.604 2.27462 13.616 2.11862 13.424C1.95062 13.244 2.04662 12.98 2.19062 12.812L6.87062 7.94005L1.99862 3.47605C1.78262 3.27205 1.56662 2.86405 1.96262 2.46805C2.35862 2.07205 2.76662 2.26405 3.10262 2.55205L10.5906 8.60005L18.0906 2.55205C18.4266 2.26405 18.8346 2.07205 19.2306 2.46805V2.46805Z"
                                    fill="#D9B776" />
                            </svg>
                        </span>
                        <span
                            class="common_footer_email">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'email') }}</span>
                    </a>
                </p>
                <hr>
                <p>
                    <span>
                        <svg width="14" height="19" viewBox="0 0 14 19" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7 19.0001C5.73694 17.9227 4.56619 16.7416 3.5 15.4691C1.9 13.5581 8.78894e-07 10.7121 8.78894e-07 8.00009C-0.00069302 6.61505 0.409509 5.26094 1.17869 4.10912C1.94788 2.9573 3.04147 2.05955 4.32107 1.52949C5.60067 0.999429 7.00875 0.860882 8.36712 1.13138C9.72548 1.40189 10.9731 2.06928 11.952 3.04909C12.6038 3.69795 13.1204 4.46963 13.4719 5.31947C13.8234 6.1693 14.0029 7.08042 14 8.00009C14 10.7121 12.1 13.5581 10.5 15.4691C9.4338 16.7416 8.26306 17.9227 7 19.0001ZM7 5.00009C6.20435 5.00009 5.44129 5.31616 4.87868 5.87877C4.31607 6.44138 4 7.20444 4 8.00009C4 8.79574 4.31607 9.5588 4.87868 10.1214C5.44129 10.684 6.20435 11.0001 7 11.0001C7.79565 11.0001 8.55871 10.684 9.12132 10.1214C9.68393 9.5588 10 8.79574 10 8.00009C10 7.20444 9.68393 6.44138 9.12132 5.87877C8.55871 5.31616 7.79565 5.00009 7 5.00009Z"
                                fill="#D9B776" />
                        </svg>
                    </span>
                    <span
                        class="common_footer_address">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'address') }}</span>
                </p>
                <hr>
                <h6>Follow us</h6>
                <div class="wd-md-social-media">
                    <ul class="d-flex align-items-center">
                        <li class="wd-social-icon"><a
                                href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'facebook_url') }}"><i
                                    class="fab fa-facebook-f"></i></a></li>
                        <li class="wd-social-icon"><a
                                href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'instagram_url') }}"><i
                                    class="fab fa-instagram"></i></a></li>
                        <li class="wd-social-icon"><a
                                href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'twitter_url') }}"><i
                                    class="fab fa-twitter"></i></a></li>
                        <li class="wd-social-icon"><a
                                href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'linkedin_url') }}"><i
                                    class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="wd-open-form-blog">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="wd-md-opening-hours wd-contact-opening-hours">
                        <h6>
                            <strong>Opening</strong> Hours
                            <svg width="59" height="2" viewBox="0 0 59 2" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="59" height="2" fill="#D9B776"></rect>
                            </svg>
                        </h6>
                        @foreach ($web_content->working_hours as $time)
                            <div class="wd-day-time d-flex align-items-center justify-content-between">
                                <p>{{ $time->day }}</p>
                                @if ($time->is_working == 1)
                                    <p>{{ date('h:i A', strtotime($time->start_time)) }} -
                                        {{ date('h:i A', strtotime($time->end_time)) }}</p>
                                @else
                                    <p>-</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="wd-md-contact-form">
                        <form class="wd-md-contact-form-blog" id="frmContactInvoice" name="frmContactInvoice" method="post"
                            action="javascript:;">
                            @csrf
                            <h6>Say hello</h6>
                            {{-- <p>Lorem Ipsum is simply dummy text of the printing .</p> --}}
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                            placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Email Address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="5" id="message" name="message" placeholder="Message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="wd-get-in-btn" id="btnSubmit">Get in touch</button>
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
