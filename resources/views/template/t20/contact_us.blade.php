@extends('layouts.template.t20.app')

@section('style')
@endsection

@section('content')
    <section class="wd-stock-list-main-blog">
        <div class="container">
            <div class="wd-stock-list-title">
                <h1>Contact Us</h1>
                {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> --}}
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.template.home', $domain_slug) }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="wd-map-blog">
        <div class="wd-map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9552627.600007264!2d-13.449966124945481!3d54.22992374474599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sin!4v1633437983840!5m2!1sen!2sin"
                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <section class="wd-open-form-blog">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="wd-md-contact-form text-center">
                        <form class="wd-kr-cform" id="frmContactInvoice" name="frmContactInvoice" action="javascript:;"
                            method="post">
                            @csrf
                            <h6>Say hello</h6>
                            {{-- <p>Lorem Ipsum is simply dummy text of the printing .</p> --}}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="first_name" id="first_name" class="form-control"
                                            placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="last_name" id="last_name" class="form-control"
                                            placeholder="Last Name">
                                    </div>
                                    <img src="{{ asset('assets/web/template/t20/images/') }}/contact-car.png"
                                        class="wd-cont-img">
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Email Address">
                                    </div>
                                    <div class="form-group">
                                        <textarea type="text" class="form-control" name="message" id="message" placeholder="Message"></textarea>
                                    </div>
                                    <button class="wd-get-in-btn" id="btnSubmit" type="button">Get in touch</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="wd-cont-foot-blog d-flex align-items-center justify-content-between">
                        <div class="wd-edit-cont-detail">
                            @if (is_login_for_edit() == 1)
                                <a class="wd-edit-btn" href="javascript:;"
                                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','footer',{{ json_encode([
                                        'Address' => 'text',
                                        'Landline' => 'text',
                                    ]) }})"><img
                                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                            @endif
                        </div>
                        <div class="wd-call-loc-detail d-flex align-items-center">
                            <span>
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.0796 12.3491C11.1077 11.3211 11.1077 9.64832 10.0796 8.62023L6.46396 5.00459C5.9109 4.45146 5.1442 4.17121 4.36121 4.23566C3.59316 4.29888 2.89848 4.69041 2.45533 5.30974C2.36334 5.4383 2.27451 5.56873 2.1875 5.70021L9.45799 12.9707L10.0796 12.3491Z"
                                        fill="#474FA0" />
                                    <path
                                        d="M24.9974 23.539L21.3818 19.9234C20.3538 18.8954 18.681 18.8953 17.6529 19.9234L17.0312 20.545L24.302 27.8158C24.4335 27.7288 24.5637 27.6396 24.6922 27.5476C25.3116 27.1045 25.7031 26.4098 25.7664 25.6418C25.8309 24.8587 25.5506 24.0922 24.9974 23.539Z"
                                        fill="#474FA0" />
                                    <path
                                        d="M14.5437 21.9403C13.8394 21.9403 13.1773 21.666 12.6793 21.168L8.83317 17.3219C8.33518 16.8239 8.06084 16.1617 8.06084 15.4574C8.06084 15.0574 8.14961 14.671 8.31731 14.3205L1.28594 7.28906C0.296879 9.3658 -0.140816 11.6925 0.0397697 14.0279C0.28311 17.175 1.64026 20.1313 3.86131 22.3523L7.64893 26.1398C9.86987 28.3608 12.8262 29.718 15.9733 29.9614C16.3172 29.988 16.6608 30.0012 17.0035 30.0012C18.9884 30.0012 20.9412 29.5587 22.7121 28.7153L15.6806 21.6838C15.3302 21.8515 14.9438 21.9403 14.5437 21.9403Z"
                                        fill="#474FA0" />
                                    <path
                                        d="M17.6992 0C17.2138 0 16.8203 0.393516 16.8203 0.878906C16.8203 1.3643 17.2138 1.75781 17.6992 1.75781C23.5148 1.75781 28.2461 6.48914 28.2461 12.3047C28.2461 12.7901 28.6396 13.1836 29.125 13.1836C29.6104 13.1836 30.0039 12.7901 30.0039 12.3047C30.0039 5.51988 24.484 0 17.6992 0Z"
                                        fill="#474FA0" />
                                    <path
                                        d="M17.6992 12.3039C17.6992 12.3039 17.6992 12.3042 17.6992 12.3047C17.6992 12.7901 18.0927 13.1836 18.5781 13.1836C19.0635 13.1836 19.457 12.7901 19.457 12.3047C19.457 11.3354 18.6685 10.5469 17.6992 10.5469C17.2138 10.5469 16.8203 10.94 16.8203 11.4254C16.8203 11.9108 17.2138 12.3039 17.6992 12.3039Z"
                                        fill="#474FA0" />
                                    <path
                                        d="M17.6992 8.78906C19.6377 8.78906 21.2148 10.3662 21.2148 12.3047C21.2148 12.7901 21.6084 13.1836 22.0938 13.1836C22.5791 13.1836 22.9727 12.7901 22.9727 12.3047C22.9727 9.39691 20.607 7.03125 17.6992 7.03125C17.2138 7.03125 16.8203 7.42477 16.8203 7.91016C16.8203 8.39555 17.2138 8.78906 17.6992 8.78906Z"
                                        fill="#474FA0" />
                                    <path
                                        d="M17.6992 3.51562C17.2138 3.51562 16.8203 3.90914 16.8203 4.39453C16.8203 4.87992 17.2138 5.27344 17.6992 5.27344C21.5763 5.27344 24.7305 8.42766 24.7305 12.3047C24.7305 12.7901 25.124 13.1836 25.6094 13.1836C26.0948 13.1836 26.4883 12.7901 26.4883 12.3047C26.4883 7.4584 22.5455 3.51562 17.6992 3.51562Z"
                                        fill="#474FA0" />
                                </svg>
                            </span>
                            <p><a class="common_footer_landline"
                                    href="tel:{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'landline') }}">{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'landline') }}</a>
                            </p>
                        </div>
                        <div class="wd-call-loc-detail d-flex align-items-center">
                            <span>
                                <svg width="21" height="30" viewBox="0 0 21 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.7449 0.921875C5.35435 0.921875 0.96875 5.30748 0.96875 10.698C0.96875 17.4733 10.7545 29.0469 10.7545 29.0469C10.7545 29.0469 20.521 17.1401 20.521 10.698C20.521 5.30748 16.1355 0.921875 10.7449 0.921875ZM13.6945 13.5604C12.8812 14.3736 11.8131 14.7803 10.7449 14.7803C9.67679 14.7803 8.60837 14.3736 7.79538 13.5604C6.16889 11.9341 6.16889 9.28779 7.79538 7.6613C8.58296 6.87337 9.63061 6.43941 10.7449 6.43941C11.8591 6.43941 12.9066 6.87355 13.6945 7.6613C15.321 9.28779 15.321 11.9341 13.6945 13.5604Z"
                                        fill="#474FA0" />
                                </svg>
                            </span>
                            <p class="common_footer_address">
                                {{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'address') }}
                            </p>
                        </div>
                        <div class="wd-md-social-media">
                            <ul class="d-flex align-items-center justify-content-center">
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
