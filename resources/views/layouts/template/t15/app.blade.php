<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{isset($title)?print_title($title).' | ':''}}{{ print_title(site_name) }}</title>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <!-- Favicon [ 16*16 SVG ]-->
    <link href="{{$web_content->favicon}}" rel="icon" class="favicon">
    <!-- Bootstrap  CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/web/template/t15')}}/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/web/template/t15')}}/vendors/owl.carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/web/template/t15')}}/vendors/slick/slick.css">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/web/template/t15')}}/vendors/slick/slick-theme.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <!-- Custome CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/plugins/css/plugins.bundle.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/template/t15')}}/css/header_footer.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/template/t15')}}/css/edit.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/template/t15')}}/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/template/t15')}}/css/custome.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/template/t15')}}/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/css/compose.css')}}">
    <!-- Custome CSS -->
    <style>
        :root {
            --primary: {{(!empty($web_content->color))?$web_content->color:'#60BC4C'}};
            --secondary: {{(!empty($web_content->secondary_color))?$web_content->secondary_color:'#BB3230'}};
        }

        .edit-content-modal-body .form-group label {
            color: #000;
        }

        .modal-title {
            color: #000;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/template/css/common.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/css/edit.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/css/loader.css')}}">

    @yield('style')
</head>
<body class="home">
<header id="header1" class="fixed-top">
    @include('layouts.template.t15.header')
    @if(is_login_for_edit() == 1)
        @include('layouts.template.general.back_to_panel')
    @endif
    @include('layouts.template.general.chat_box')
</header>
<!-- MAIN SECTIONS -->
<main>
    @yield('content')
</main>
<!-- FOOTER -->
<footer id="footer">
    @include('layouts.template.t15.footer')
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
<!-- Bootstrap JS & Jquery -->
<script src="{{asset('assets/web/template/t15')}}/vendors/jquery/jquery.min.js"></script>
<script src="{{asset('assets/web/plugins/js/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/web/scripts/js/scripts.bundle.js')}}"></script>
<script src="{{asset('assets/web/template/t15')}}/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="{{asset('assets/web/template/t15')}}/vendors/owl.carousel/js/owl.carousel.js"></script>
<!-- custome Jquery -->
<script src="{{asset('assets/web/template/t15')}}/js/main.js"></script>
<script src="{{asset('assets/web/template/t15')}}/js/header.js"></script>
<script src="{{asset('assets/web/js/compose.js')}}"></script>
<script src="{{asset('assets/web/dashboard/js/toastr.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js"
        integrity="sha512-mh+AjlD3nxImTUGisMpHXW03gE6F4WdQyvuFRkjecwuWLwD2yCijw4tKA3NsEFpA1C3neiKhGXPSIGSfCYPMlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('script')
<script>
    $(".button-next").click(function() {
        var e = $(".feature-slide.active");
        $(e).removeClass("active"),
            $(e).next().addClass("active"),
        $(".feature-slide").hasClass("active") || $(".feature-slide:first").addClass("active")
    });

    $(".button-prev").click(function() {
        var e = $(".feature-slide.active");
        $(e).removeClass("active"), $(e).prev().addClass("active"), $(".feature-slide").hasClass("active") || $(".feature-slide:last").addClass("active")
    });
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
