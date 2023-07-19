<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Epic-Themes">
    <meta name="keywords"
          content="landing page, click-through, lead gen, marketing campaign, mobile app launch, one page template, product launch, products, responsive, saas, startup, html template, html5, css3, bootstrap, creative, designer, freelancer">
    <meta name="description"
          content="Landing Page Template for Creative Agencies, Apps, Portfolio Websites and Small Businesses">

    <title>{{isset($title)?print_title($title).' | ':''}}{{ print_title(site_name) }}</title>
    <link href="{{asset('assets/web/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/web/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/web/css/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/web/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/web/css/style-magnific-popup.css')}}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&amp;family=Open+Sans:ital@0;1&amp;display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="{{Favicon}}">
    @yield('header')
</head>
<body>
<header>
    @include('layouts.web.header')
</header>

<main>
    @yield('content')
    <div class="footer">
        @include('layouts.web.footer')
    </div>
    <div class="wd-md-footer fixed-bottom d-flex align-items-center justify-content-center">
        <h4>Excellent
            <span class="wd-rate">
          <img src="{{asset('assets/web/images/FullRate.png')}}">
          <img src="{{asset('assets/web/images/FullRate.png')}}">
          <img src="{{asset('assets/web/images/FullRate.png')}}">
          <img src="{{asset('assets/web/images/FullRate.png')}}">
          <img src="{{asset('assets/web/images/HalfRate.png')}}">
        </span>
        </h4>
        <h5>24,610 reviews on <span><img src="{{asset('assets/web/images/Starrate.png')}}"></span></h5>
        <h6><span>Trustpilot</span></h6>
    </div>

</main>
    <script src="{{asset('assets/web/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/web/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/web/js/jquery.scrollTo-min.js')}}"></script>
    <script src="{{asset('assets/web/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/web/js/jquery.nav.js')}}"></script>
    <script src="{{asset('assets/web/js/wow.js')}}"></script>
    <script src="{{asset('assets/web/js/plugins.js')}}"></script>
    <script src="{{asset('assets/web/js/custom.js')}}"></script>
    @yield('footer')
</body>
</html>
