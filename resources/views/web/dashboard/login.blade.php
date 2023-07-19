<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mongo | Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link href="{{Favicon}}" rel="icon" class="favicon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/dashboard/vendors/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/dashboard/css/wizard.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/dashboard/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/dashboard/css/responsive.css')}}">
</head>

<body>
<main class="login-page">
    <section id="login-content">
        <div class="container-fluid">
            <div class="login-cont">
                <div class="login-blog">
                    <div class="logo"><a href="{{route('front.dashboard')}}"><img src="{{site_logo}}" alt=""></a></div>
                    <div class="login-head">
                        <h1>Log in</h1>
                        <p>Hi Welcome Please Login your Account to access more!</p>
                    </div>
                    <div class="login-body">
                        <form action="{{ route('front.login_post') }}" name="frmLogin" id="frmLogin" method="post">
                            @csrf
                            {!! get_error_html($errors) !!}
                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <div class="alert-text">{{session('error')}}</div>
                                    <div class="alert-close"><i class="flaticon2-cross kt-icon-sm"
                                                                data-dismiss="alert"></i></div>
                                </div>
                            @elseif(session('success'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <div class="alert-text">{{session('success')}}</div>
                                    <div class="alert-close"><i class="flaticon2-cross kt-icon-sm"
                                                                data-dismiss="alert"></i></div>
                                </div>
                            @endif
                            <div class="form-row">
                                <input type="email" name="email" placeholder="Email" value="{{old('email')}}" autofocus>
                            </div>
                            <div class="form-row">
                                <input type="password" name="password" placeholder="Password" value="{{old('password')}}">
                            </div>
                            <div class="form-row forgot d-flex align-items-center justify-content-between flex-row-reverse">
                                <a href="javascript:;" data-toggle="modal"
                                   data-target="#term_condition_modal" class="wd-sl-tnc">Terms and Conditions (T&Cs)</a>
                                <a href="#">Forgot Password ?</a>
                            </div>
                            <div class="form-row action">
                                <button type="button" id="btnNext">Login</button>
                            </div>
                            <div class="form-row register">
                                <p>Don’t Have an account?</p><a href="{{route('front.get_signup')}}">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<div class="modal fade wd-md-myexpense-popup" id="term_condition_modal" tabindex="-1"
     aria-labelledby="exampleModalCenterTitle">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body text-center border-top-0">
                <div class="login-head">
                    <h1>Terms Condition</h1>
                </div>
                <div class="login-body">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been the industry's standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a type specimen book. It has
                        survived not only five centuries, but also the leap into electronic typesetting,
                        remaining essentially unchanged. It was popularised in the 1960s with the release of
                        Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                        publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
            {{--<div class="modal-footer">
                <button type="button" class="btn wd-add-now" id="btnSignUp" name="btnSignUp">Yes</button>
                <button type="button" class="btn wd-add-now" data-dismiss="modal">No</button>
            </div>--}}
        </div>
    </div>
</div>
</body>
<script src="{{asset('assets/web/dashboard/vendors/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/web/dashboard/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="{{asset('assets/web/dashboard/js/wizard.js')}}"></script>
<script src="{{asset('assets/web/dashboard/js/main.js')}}"></script>
<script>
    let frmLogin = $("#frmLogin").validate({
        rules: {
            email: {required: true, email: true},
            password: {required: true, minlength: 6},
        },
        messages: {
            email: {required: 'Please enter email', email: "please enter valid email"},
            password: {required: 'Please enter password'},
        },
        errorPlacement: function (error, element) {
            if (element.attr("type") == "radio") {
                error.appendTo('.a');
            } else {
                if (element.attr("data-error-container")) {
                    error.appendTo(element.attr("data-error-container"));
                } else if (element.attr("id") == 'contact_number') {
                    error.insertAfter(element.parent().parent());
                } else {
                    error.insertAfter(element);
                }
            }
        }

    });
    $("#btnNext").click(function (e) {
        if ($("#frmLogin").valid()) {
            $("#frmLogin").submit();
        }
    });
</script>
</html>
