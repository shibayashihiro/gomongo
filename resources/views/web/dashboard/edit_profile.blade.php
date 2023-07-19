@extends('layouts.web.dashboard.app')

@section('header_css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/dashboard/css/style2.css')}}">
@endsection

@section('content')
    <div id="my-profile" class="wd-sl-slidebar height-auto">
        <div class="profile-head">
            <h2>{{$title}}</h2>
        </div>
        <div class="profile-body">
            <form id="frmEditProfile" name="frmEditProfile">
                <div class="pro-content  pb-5">
                    <div class="pro-img">
                        <div class="pro-img-blog">
                            <span><img src="{{$user->profile_image}}" class="profile_image_preview"></span>
                            <span class="pro-icon"><input type="file" id="profile_image" name="profile_image">
                        <i class="fa fa-camera" aria-hidden="true"></i>
                    </span>
                        </div>
                        <h3>{{$user->name}}</h3>
                    </div>
                    <div class="pro-details">
                        @csrf
                        <div class="pro-dt-row row">
                            <div class="col-md-4">
                                <p>Company Name</p>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="cmp_name" id="cmp_name" value="{{$user->company_name}}"
                                   placeholder="{{$user->company_name}}">
                            </div>
                        </div>
                        <div class="pro-dt-row row">
                            <div class="col-md-4">
                                <p>Email</p>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="email" id="email" placeholder="{{$user->email}}"
                                   value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="pro-dt-row row">
                            <div class="col-md-4">
                                <p>Phone Number</p>
                            </div>
                            <div class="col-md-8">
                            <input type="tel" name="mobile" id="mobile"
                                   placeholder="{{'+'.$user->country_code.''.$user->mobile}}"
                                   value="{{'+'.$user->country_code.''.$user->mobile}}"></div>
                        </div>
                        <div class="pro-dt-row row">
                            <div class="col-md-4">
                                <p>Address</p>
                            </div>
                            <div class="col-md-8">
                            <input type="text" name="address" id="address"
                                   placeholder="{{$user->address}}" value="{{$user->address}}"></div>
                    </div>
                        <div class="pro-dt-row row">
                            <div class="col-md-4">
                                <p>Postcode</p>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="postcode" id="postcode"
                                   placeholder="{{$user->postcode}}" value="{{$user->postcode}}"></div>
                        </div>
                        <div class="pro-dt-row row">
                            <div class="col-md-4">
                                <p>Company Registration Number</p>
                            </div>
                            <div class="col-md-8">
                            <input type="text" name="cmp_reg_number" id="cmp_reg_number"
                                   placeholder="{{$user->cmp_reg_number}}" value="{{$user->cmp_reg_number}}"></div>
                        </div>
                        <div class="pro-dt-row row">
                            <div class="col-md-4">
                                <p>FCA Registration Number</p>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="fca_reg_number" id="fca_reg_number"
                                   placeholder="{{$user->fca_reg_number}}" value="{{$user->fca_reg_number}}"></div>
                        </div>
                        <div class="pro-dt-row row">
                            <div class="col-md-4">
                                <p>VAT Number</p>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="vat_number" id="vat_number"
                                   placeholder="{{$user->vat_number}}" value="{{$user->vat_number}}"></div>
                        </div>
                        <div class="pro-dt-row row">
                            <div class="col-md-4">
                                <p>ICO Number</p>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="ico_number" id="ico_number"
                                   placeholder="{{$user->ico_number}}" value="{{$user->ico_number}}"></div>
                        </div>
                        <div class="pro-dt-row edit-btn">
                            <a href="javascript:;" id="btnSave">Save</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer_script')
    <script>
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
        $("#frmEditProfile").validate({
            rules: {
                cmp_name: {required: true},
                postcode: {required: true},
                address: {required: true},
                mobile: {required: true},
                email: {required: true, email: true},
                password: {required: true, minlength: 6},
            },
            messages: {
                cmp_name: {required: 'Please enter company name'},
                postcode: {required: 'Please enter postcode'},
                address: {required: 'Please select address'},
                mobile: {required: 'Please enter contact number'},
                email: {required: 'Please enter email', email: "please enter valid email"},
                password: {required: 'Please enter password'},
            },
            errorPlacement: function (error, element) {
                if (element.attr("type") == "radio") {
                    error.appendTo('.a');
                } else {
                    if (element.attr("data-error-container")) {
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.attr("id") == 'mobile') {
                        error.insertAfter(element.parent().parent().parent());
                    } else {
                        error.insertAfter(element.parent().parent());
                    }
                }
            },
            submitHandler: function (form) {
                return false;
            }
        });
        $("#btnSave").click(function (e) {
            if ($("#frmEditProfile").valid()) {
                var data = new FormData($('#frmEditProfile')[0]);
                data.append('country_code', $("#mobile").intlTelInput("getSelectedCountryData").dialCode);
                $("#btnSave").attr('disabled', true);
                $.ajax({
                    type: 'post',
                    data: data,
                    dataType: "json",
                    url: "{{route('front.save_profile')}}",
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: addOverlay,
                    success: function (r) {
                        removeOverlay();
                        $("#btnSave").attr('disabled', false);
                        if (r.status == 200) {
                            toastr['success'](r.message, "success");
                            setTimeout(function () {
                                window.location.href = "{{route('front.edit_profile')}}";
                            }, 1000);
                        } else {
                            toastr['error'](r.message, "error");
                        }
                    }
                });
            }
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('.profile_image_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#profile_image").change(function () {
            readURL(this);
        });
    </script>
@endsection
