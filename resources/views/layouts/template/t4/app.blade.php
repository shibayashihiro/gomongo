<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{isset($title)?print_title($title).' | ':''}}{{ print_title(site_name) }}</title>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <!-- Favicon [ 16*16 SVG ]-->
    <link href="{{$web_content->favicon}}" rel="icon" class="favicon">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- Bootstrap  CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/web/template/t4/vendors/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/web/template/t4/vendors/owl.carousel/css/owl.carousel.min.css')}}">
    <!-- Custome CSS -->
    <style>
        :root {
            --primary: {{(!empty($web_content->color))?$web_content->color:'#FFBD41'}};
            --secondary: {{(!empty($web_content->secondary_color))?$web_content->secondary_color:'#AFBD41'}};
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/plugins/css/plugins.bundle.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/template/t4/css/header_footer.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/template/t4/css/custome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/template/t4/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/template/t4/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/template/css/common.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/dashboard/css/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/css/edit.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/css/loader.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/css/compose.css')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/moment.min.js"
            integrity="sha512-i2CVnAiguN6SnJ3d2ChOOddMWQyvgQTzm0qSgiKhOqBMGCx4fGU5BtzXEybnKatWPDkXPFyCI0lbG42BnVjr/Q=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.css"
          integrity="sha512-rBi1cGvEdd3NmSAQhPWId5Nd6QxE8To4ADjM2a6n0BrqQdisZ/RPUlm0YycDzvNL1HHAh1nKZqI0kSbif+5upQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    @yield('style')
</head>
<body>
<header id="header">
    @include('layouts.template.t4.header')
    @if(is_login_for_edit() == 1)
        @include('layouts.template.general.back_to_panel')
    @endif
    @include('layouts.template.general.chat_box')
</header>
<!-- MAIN SECTIONS -->
<main class="home-page">
    @yield('content')
</main>
<!-- FOOTER -->
<div class="wd-sl-footer">
    <div class="container-fluid">
        <div class="footer-flex">
            <a href="{{route('front.template.home', $domain_slug)}}"><img
                    src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'footer_logo'))}}"
                    alt="" class="common_footer_footer_logo"/></a>
            @if(is_login_for_edit() == 1)
                <a class="wd-edit-btn t4-img-ft"
                   href="javascript:;"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','common','footer',{{json_encode(['Footer Logo'=>'file'])}})"><img
                        src="{{asset('assets/web/images/edit-btn.png')}}"></a>
            @endif
            <ul class="social">
                <li>
                    <a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'facebook_url')}}"
                       target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <li>
                    <a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'instagram_url')}}"
                       target="_blank"><i class="fab fa-instagram"></i></a></li>
                <li>
                    <a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'twitter_url')}}"
                       target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li>
                    <a href="{{get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'linkedin_url')}}"
                       target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </li>
                @if(is_login_for_edit() == 1)
                    <a class="wd-edit-btn"
                       href="javascript:;"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','common','footer',{{json_encode([
    'Facebook URL'=>'text',
    'Instagram URL'=>'text',
    'Twitter URL'=>'text',
    'Linkedin URL'=>'text',
    ])}})"><img
                            src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                @endif
            </ul>
        </div>
    </div>
</div>
<footer id="footer">
    @include('layouts.template.t4.footer')
</footer>
<div class="modal fade" id="edit-content-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body edit-content-modal-body">

            </div>
        </div>
    </div>
</div>
</body>
<script src="{{asset('assets/web/template/t4/vendors/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/web/plugins/js/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/web/scripts/js/scripts.bundle.js')}}"></script>
<script src="{{asset('assets/web/template/t4/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/web/template/t4/vendors/owl.carousel/js/owl.carousel.js')}}"></script>
<!-- custome Jquery -->
<script src="{{asset('assets/web/template/t4/js/main.js')}}"></script>
<script src="{{asset('assets/web/template/t4/js/header.js')}}"></script>
<script src="{{asset('assets/web/js/compose.js')}}"></script>
<script src="{{asset('assets/web/dashboard/js/toastr.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js"
        integrity="sha512-mh+AjlD3nxImTUGisMpHXW03gE6F4WdQyvuFRkjecwuWLwD2yCijw4tKA3NsEFpA1C3neiKhGXPSIGSfCYPMlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('script')
<script>
    function addOverlay() {
        $('<div class="hidden-active"> <figure class="loader" id="overlayDocument"><div class="car"><span class="body-new"></span><span class="wheels"></span></div><div class="strikes"><span></span><span></span><span></span><span></span><span></span></div></figure></div>').appendTo(document.body);
    }

    function removeOverlay() {
        $('#overlayDocument').parent().remove();
    }

    $(function () {
        @if(session('flash_error'))
        toastr.error('{{session('flash_error')}}', '', {timeOut: 2000});
        @elseif(session('flash_success'))
        toastr.success('{{session('flash_success')}}', '', {timeOut: 2000});
        @endif
    });


</script>
@include('layouts.template.general.common_js')
</html>
