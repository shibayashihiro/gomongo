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
          href="{{asset('assets/web/template/t9/vendors/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/web/template/t9/vendors/owl.carousel/css/owl.carousel.min.css')}}">
    <!-- Custome CSS -->
    <style>
        :root {
            --primary: {{(!empty($web_content->color))?$web_content->color:'#0DEEB8'}};
            --secondary: {{(!empty($web_content->secondary_color))?$web_content->secondary_color:'#0F2B47'}};
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/plugins/css/plugins.bundle.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/template/t9/css/header_footer.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/template/t9/css/custome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/template/t9/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/template/t9/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/template/css/common.css')}}">
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
    @include('layouts.template.t9.header')
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
<footer id="footer">
    @include('layouts.template.t9.footer')
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
<script src="{{asset('assets/web/template/t9/vendors/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/web/plugins/js/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/web/scripts/js/scripts.bundle.js')}}"></script>
<script src="{{asset('assets/web/template/t9/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/web/template/t9/vendors/owl.carousel/js/owl.carousel.js')}}"></script>
<!-- custome Jquery -->
<script src="{{asset('assets/web/template/t9/js/main.js')}}"></script>
<script src="{{asset('assets/web/template/t9/js/header.js')}}"></script>
<script src="{{asset('assets/web/js/compose.js')}}"></script>
<script src="{{asset('assets/web/dashboard/js/toastr.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js"
        integrity="sha512-mh+AjlD3nxImTUGisMpHXW03gE6F4WdQyvuFRkjecwuWLwD2yCijw4tKA3NsEFpA1C3neiKhGXPSIGSfCYPMlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    (function ($) {
        $.fn.countTo = function (options) {
            options = options || {};

            return $(this).each(function () {
                // set options for current element
                var settings = $.extend(
                    {},
                    $.fn.countTo.defaults,
                    {
                        from: $(this).data("from"),
                        to: $(this).data("to"),
                        speed: $(this).data("speed"),
                        refreshInterval: $(this).data("refresh-interval"),
                        decimals: $(this).data("decimals"),
                    },
                    options
                );

                // how many times to update the value, and how much to increment the value on each update
                var loops = Math.ceil(settings.speed / settings.refreshInterval),
                    increment = (settings.to - settings.from) / loops;

                // references & variables that will change with each update
                var self = this,
                    $self = $(this),
                    loopCount = 0,
                    value = settings.from,
                    data = $self.data("countTo") || {};

                $self.data("countTo", data);

                // if an existing interval can be found, clear it first
                if (data.interval) {
                    clearInterval(data.interval);
                }
                data.interval = setInterval(updateTimer, settings.refreshInterval);

                // initialize the element with the starting value
                render(value);

                function updateTimer() {
                    value += increment;
                    loopCount++;

                    render(value);

                    if (typeof settings.onUpdate == "function") {
                        settings.onUpdate.call(self, value);
                    }

                    if (loopCount >= loops) {
                        // remove the interval
                        $self.removeData("countTo");
                        clearInterval(data.interval);
                        value = settings.to;

                        if (typeof settings.onComplete == "function") {
                            settings.onComplete.call(self, value);
                        }
                    }
                }

                function render(value) {
                    var formattedValue = settings.formatter.call(self, value, settings);
                    $self.html(formattedValue);
                }
            });
        };

        $.fn.countTo.defaults = {
            from: 0, // the number the element should start at
            to: 0, // the number the element should end at
            speed: 1000, // how long it should take to count between the target numbers
            refreshInterval: 1, // how often the element should be updated
            decimals: 0, // the number of decimal places to show
            formatter: formatter, // handler for formatting the value before rendering
            onUpdate: null, // callback method for every time the element is updated
            onComplete: null, // callback method for when the element finishes updating
        };

        function formatter(value, settings) {
            return value.toFixed(settings.decimals);
        }
    })(jQuery);

    jQuery(function ($) {
        // custom formatting example
        $(".count-number").data("countToOptions", {
            formatter: function (value, options) {
                return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
            },
        });

        // start all the timers
        $(".timer").each(count);

        function count(options) {
            var $this = $(this);
            options = $.extend({}, options || {}, $this.data("countToOptions") || {});
            $this.countTo(options);
        }
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

@yield('script')
@include('layouts.template.general.common_js')
</html>
