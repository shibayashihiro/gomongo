@extends('layouts.template.t11.app')

@section('style')
@endsection

@section('content')
    <section class="wd-md-stock-main wd-contact">

        <div class="container">

            <nav aria-label="breadcrumb">

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="{{route('front.template.home', $domain_slug)}}">Home</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Contact us</li>

                </ol>

            </nav>
            @if(is_login_for_edit() == 1)
                <div class="wd-edit-fir-sec">
                    <a class="wd-edit-btn"
                       href="javascript:;"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','contact_us','breadcrumb',{{json_encode(['Title'=>'text','Sub Title'=>'textarea'])}})"><img
                            src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                </div>
            @endif
            <h1 class="contact_us_breadcrumb_title">{{get_web_content_detail($web_content->id, $web_content->template, 'contact_us', 'breadcrumb', 'title')}}</h1>

            <p class="contact_us_breadcrumb_sub_title">{{get_web_content_detail($web_content->id, $web_content->template, 'contact_us', 'breadcrumb', 'sub_title')}}</p>

        </div>

    </section>

    <section class="wd-md-map">

        <div class="container">

            <img src="{{asset('assets/web/images')}}//Huge Global.png" class="img-fluid">

        </div>

    </section>

    <section class="wd-md-contact-form">
        <div class="container">
            <div class="wd-md-contact-form-heading">
                <h3>Contact us</h3>
            </div>
            <form class="wd-md-contact-form-blog" id="frmContactInvoice"
                  name="frmContactInvoice" method="post" action="javascript:;">
                <div class="row">
                    <div class="col-md-6">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                           placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                           placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                            </div>
                            <button type="submit" class="btn" id="btnSubmit">Get in touch</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" rows="7" id="message" name="message"
                                              placeholder="Message"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <img src="{{asset('assets/web/images')}}//cont-car.png" alt="" class="img-fluid cont-car">
        </div>
    </section>
@endsection

@section('script')
    <script>
        $('main').removeClass('home-page');
        let frmContactInvoice = $("#frmContactInvoice").validate({
            rules: {
                first_name: {required: true},
                last_name: {required: true},
                email: {required: true, email: true},
                message: {required: true},
            },
            messages: {
                first_name: {required: 'Please enter first name'},
                last_name: {required: 'Please enter last name'},
                email: {required: 'Please enter email'},
                message: {required: 'Please enter message'},
            }
        });

        $("#btnSubmit").click(function () {
            if ($("#frmContactInvoice").valid()) {
                var data = new FormData($('#frmContactInvoice')[0]);
                $("#btnSubmit").attr('disabled', true);
                $.ajax({
                    type: 'post',
                    data: data,
                    dataType: "json",
                    url: "{{route('front.template.contact_us.post')}}",
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: addOverlay,
                    success: function (r) {
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
