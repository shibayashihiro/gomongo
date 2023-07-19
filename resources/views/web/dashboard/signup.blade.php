<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mongo | {{$title}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link href="{{Favicon}}" rel="icon" class="favicon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/web/dashboard/vendors/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/dashboard/css/wizard.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/dashboard/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/dashboard/css/custome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/dashboard/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/css/loader.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
          integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        .reg-term-condition-box input[type="checkbox"] {
            width: auto;
        }
    </style>
</head>

<body>
<!-- MAIN SECTIONS -->
<main class="signup-page">
    <section id="login-content">
        <div class="container-fluid">
            <div class="row">
                <div class="login-cont">
                    <div class="login-blog login-reg-blog">
                        <div class="logo"><a href="https://zestbrains4u.site/design/mongo_landing/index.html"><img
                                    src="{{site_logo}}" alt=""></a></div>
                        <div class="login-head">
                            <h1>{{__('Sign up')}}</h1>
                            <p>{{__('Hi Welcome Please Register your Account to access more!')}}</p>
                        </div>
                        <div class="login-body">
                            <form id="frmSignUp" name="frmSignUp" method="post" action="javascript:;"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="wizard">
                                    <div class="connecting-line"></div>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active">
                                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab"
                                               aria-expanded="true">1</a>
                                        </li>
                                        <li role="presentation" class="second-step">
                                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab"
                                               aria-expanded="true">2</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" role="tabpanel" id="step1">

                                        <div class="form-row">
                                            <input type="text" placeholder="Company Name" name="cmp_name"
                                                   id="cmp_name">
                                        </div>
                                        <div class="form-row">
                                            <input type="text" id="address" name="address" placeholder="Address">
                                        </div>
                                        <div id="address_div">
                                            <input type="hidden" data-geo="lat"
                                                   value="" id="latitude"
                                                   name="latitude">
                                            <input type="hidden" data-geo="lng"
                                                   value="" id="longitude"
                                                   name="longitude">
                                        </div>
                                        <div class="form-row">
                                            <input type="text" placeholder="Postcode" id="postcode" name="postcode">
                                        </div>
                                        <div class="form-row">
                                            <div class="phone-box">
                                                <input type="tel" id="mobile" name="mobile"
                                                       class="txtbox"
                                                       placeholder="Contact number"/>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <input type="text" placeholder="Email address" id="email" name="email">
                                        </div>
                                        <div class="form-row">
                                            <input type="text" placeholder="autotrader dealer ID" id="dealer_id" name="dealer_id">
                                        </div>

                                        <div class="form-row">
                                            <input type="password" placeholder="Password" id="password" name="password">
                                        </div>

                                        <div class="form-row action">
                                            <button type="button" id="btnNext">Next</button>
                                        </div>
                                        <div class="form-row register mt-3 ">
                                            <p>if already registered click here to</p><a
                                                href="{{route('front.get_login')}}">Login</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="step2">
                                        <div class="form-row">
                                            <input type="text" placeholder="Company Registration Number (optional)"
                                                   id="cmp_reg_number" name="cmp_reg_number">
                                        </div>
                                        <div class="form-row">
                                            <input type="text" placeholder="FCA registration number (optional)"
                                                   id="fcm_reg_number">
                                        </div>
                                        <div class="form-row">
                                            <input type="text" placeholder="VAT number (Optional)" id="vat_number"
                                                   name="vat_number">
                                        </div>
                                        <div class="form-row">
                                            <input type="text" placeholder="ICO number (optional)" name="ico_number"
                                                   id="ico_number">
                                        </div>
                                        <div class="form-row">
                                            <div class="logo-box">
                                                <label>Company logo</label>
                                                <div class="logo-select-row">
                                                    <div class="logo-select-box">
                                                        <img src="{{asset('assets/web/dashboard/images/plush.png')}}"
                                                             alt="">
                                                        <input type="file" id="cmp_logo" name="cmp_logo">
                                                    </div>
                                                    <div class="logo-view-box">
                                                        <img class="sale-logo cmp-logo-preview"
                                                             src="{{asset('assets/web/dashboard/images/select-logo.png')}}"
                                                             alt="" width="90">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="d-flex reg-term-condition-box"><input type="checkbox"
                                                                                              id="term_condition"
                                                                                              name="term_condition">
                                                &nbsp;<a
                                                    href="javascript:;" data-toggle="modal"
                                                    data-target="#term_condition_modal"
                                                    class="wd-sl-tnc">Terms and
                                                    Conditions (T&Cs)</a></div>
                                        </div>
                                        <div class="form-row action">
                                            <button type="button" id="btnSignUp">Sign
                                                Up
                                            </button>
                                        </div>
                                        <div class="form-row register mt-3 ">
                                            <p>if already registered click here to</p><a
                                                href="{{route('front.get_login')}}">Login</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
        integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"
        integrity="sha512-XZEy8UQ9rngkxQVugAdOuBRDmJ5N4vCuNXCh8KlniZgDKTvf7zl75QBtaVG1lEhMFe2a2DuA22nZYY+qsI2/xA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('assets/web/dashboard/js/wizard.js')}}"></script>
<script src="{{asset('assets/web/dashboard/js/main.js')}}"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADwVAs3Cw91cxbvW2cztgbhvDavFI3Pro&libraries=places"></script>
<script src="{{asset('assets/web/js/jquery.geocomplete.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    function addOverlay() {
        $('<div class="hidden-active"> <figure class="loader" id="overlayDocument"><div class="car"><span class="body-new"></span><span class="wheels"></span></div><div class="strikes"><span></span><span></span><span></span><span></span><span></span></div></figure></div>').appendTo(document.body);
    }

    function removeOverlay() {
        $('#overlayDocument').parent().remove();
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.cmp-logo-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#cmp_logo").change(function () {
        readURL(this);
    });
    $("#address").geocomplete({
        details: "#address_div",
        detailsAttribute: "data-geo"
    }).bind("geocode:result", function (event, results) {
        for (var j = 0; j < results.address_components.length; j++) {
            for (var k = 0; k < results.address_components[j].types.length; k++) {
                if (results.address_components[j].types[k] == "postal_code") {
                    $("#postcode").val(results.address_components[j].short_name);
                }
            }
        }
    });
    $(function () {
        var code = "+44";
        $('#mobile').val(code);
        $('#mobile').intlTelInput({
            autoHideDialCode: true,
            autoPlaceholder: "ON",
            dropdownContainer: document.body,
            formatOnDisplay: true,
            hiddenInput: "full_number",
            initialCountry: "auto",
            nationalMode: true,
            placeholderNumberType: "MOBILE",
            preferredCountries: ['US'],
            separateDialCode: true
        });

    });
    let frmSignUp = $("#frmSignUp").validate({
        rules: {
            cmp_name: {required: true},
            postcode: {required: true},
            address: {required: true},
            mobile: {required: true},
            email: {required: true, email: true},
            dealer_id: {required: true},
            password: {required: true, minlength: 6},
            term_condition: {required: true},
        },
        messages: {
            cmp_name: {required: 'Please enter company name'},
            postcode: {required: 'Please enter postcode'},
            address: {required: 'Please select address'},
            mobile: {required: 'Please enter contact number'},
            email: {required: 'Please enter email', email: "please enter valid email"},
            dealer_id: {required: 'Please enter autotrader dealer ID'},
            password: {required: 'Please enter password'},
            term_condition: {required: 'Please accept terms and condition'},
        },
        errorPlacement: function (error, element) {
            if (element.attr("type") == "radio") {
                error.appendTo('.a');
            } else {
                if (element.attr("data-error-container")) {
                    error.appendTo(element.attr("data-error-container"));
                } else if (element.attr("id") == 'mobile') {
                    error.insertAfter(element.parent().parent());
                } else if (element.attr("id") == 'term_condition') {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        },
        submitHandler: function (form) {
            return false;
        }
    });
    $("#btnNext").click(function (e) {
        if ($("#frmSignUp").valid()) {
            var active = $('.wizard .nav-tabs li.active');
            active.next().removeClass('disabled');
            nextTab(active);
        }
    });
    $(".second-step").click(function () {
        if (!$("#frmSignUp").valid()) {
            return false;
        }
    });
    $("#btnSignUp").click(function () {
        if ($("#frmSignUp").valid()) {
            $("#term_condition").modal('hide');
            var data = new FormData($('#frmSignUp')[0]);
            data.append('country_code', $("#mobile").intlTelInput("getSelectedCountryData").dialCode);
            $("#btnSignUp").attr('disabled', true);
            $.ajax({
                type: 'post',
                data: data,
                dataType: "json",
                url: "{{route('front.post_signup')}}",
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: addOverlay,
                success: function (r) {
                    removeOverlay();
                    if (r.status == 200) {
                        toastr['success'](r.message, "success");
                        setTimeout(function () {
                            window.location.href = "{{route('front.get_login')}}";
                        }, 1000);
                    } else {
                        toastr['error'](r.message, "error");
                        $("#btnSignUp").attr('disabled', false);
                    }
                }
            });
        }
    });
</script>
</html>
