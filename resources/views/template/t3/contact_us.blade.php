@extends('layouts.template.t3.app')

@section('style')
@endsection

@section('content')
    <div class="search-banner">
        <div class="container">
            <nav aria-label="breadcrumb" class="brdmb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('front.template.home', $domain_slug) }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
            <div class="banner-desc">
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
        </div>
    </div>

    <section id="map-row">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 map-image">
                    <img src="{{ asset('assets/web/template/t3/images/map-img.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="wd-md-contact-form">
        <div class="container">
            <div class="row">
                <div class="contact-form-cont">
                    <div class="contact-head col-lg-12">
                        <h2>Say hello</h2>
                        {{-- <p>Lorem Ipsum is simply dummy text of the printing .</p> --}}
                    </div>
                    <div class="contact-body">
                        <div class="cont-form-left">
                            <form id="frmContactInvoice" name="frmContactInvoice" method="post" action="javascript:;">
                                @csrf
                                <div class="col-md-12 f-l-name">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name">
                                    </div>
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
                                <div class="col-lg-12">
                                    <div class="form-group action">
                                        <button type="submit" class="y-btn" id="btnSubmit">Get in touch</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="cont-address">
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
                            <div class="address-box">
                                <span><img src="{{ asset('assets/web/template/t3/images/call.png') }}"
                                        alt=""></span>
                                <p class="common_footer_mobile">
                                    {{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'mobile') }}
                                </p>
                                <span><img src="{{ asset('assets/web/template/t3/images/pin.png') }}"
                                        alt=""></span>
                                <p class="common_footer_address">
                                    {{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'address') }}
                                </p>
                                <div class="follow-us">
                                    <h4>Follow us</h4>
                                    <ul class="social">
                                        <li><a
                                                href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'facebook_url') }}"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li><a
                                                href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'instagram_url') }}"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <li><a
                                                href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'twitter_url') }}"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li><a
                                                href="{{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'linkedin_url') }}"><i
                                                    class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
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
