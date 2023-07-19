<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{isset($title)?print_title($title).' | ':''}}{{ print_title(site_name) }}</title>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <!-- Favicon [ 16*16 SVG ]-->
    <link href="{{Favicon}}" rel="icon" class="favicon">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- Bootstrap  CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/web/dashboard/vendors/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!-- Custome CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/dashboard/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/dashboard/css/wizard.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/dashboard/css/custome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/dashboard/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/dashboard/css/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/css/loader.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/moment.min.js" integrity="sha512-i2CVnAiguN6SnJ3d2ChOOddMWQyvgQTzm0qSgiKhOqBMGCx4fGU5BtzXEybnKatWPDkXPFyCI0lbG42BnVjr/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.css" integrity="sha512-rBi1cGvEdd3NmSAQhPWId5Nd6QxE8To4ADjM2a6n0BrqQdisZ/RPUlm0YycDzvNL1HHAh1nKZqI0kSbif+5upQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('header_css')
    <style>
        .profile_img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
    </style>
</head>
<body class="@yield('body-class')">
<section id="sidebar">
    @if(isset($edit_website) && $edit_website)
        @include('layouts.web.dashboard.sidebar_website')
    @else
        @include('layouts.web.dashboard.sidebar')
    @endif
</section>

<main id="slidebar" class="wd-md-admin">
    <header>
        @include('layouts.web.dashboard.header')
    </header>
    <div class="mongo_dashboard_page_main">
        @yield('content')
    </div>
</main>
<!-- FOOTER -->
<footer></footer>
</body>
<!-- Bootstrap JS & Jquery -->
<script src="{{asset('assets/web/dashboard/vendors/jquery/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="{{asset('assets/web/dashboard/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<!-- custome Jquery -->
<script src="{{asset('assets/web/dashboard/js/main.js')}}"></script>
<script src="{{asset('assets/web/dashboard/js/wizard.js')}}"></script>
<script src="{{asset('assets/web/dashboard/js/toastr.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('assets/web/css/datatable_pagination.css')}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js" integrity="sha512-mh+AjlD3nxImTUGisMpHXW03gE6F4WdQyvuFRkjecwuWLwD2yCijw4tKA3NsEFpA1C3neiKhGXPSIGSfCYPMlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADwVAs3Cw91cxbvW2cztgbhvDavFI3Pro&libraries=places"></script>
<script src="{{asset('assets/web/js/jquery.geocomplete.min.js')}}"></script>
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
@yield('footer_script')
</html>
