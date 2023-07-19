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
            <form id="frmDealerDetails" name="frmDealerDetails" action="javascript:;">
                <div class="pro-content pb-5">
                    <div class="pro-details">
                        @csrf
                        <div class="pro-dt-row row">
                            <div class="col-md-4">
                                <p>Name</p>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="name" id="name"
                                       value="{{(isset($user->DealerInfo->name))?$user->DealerInfo->name:''}}"
                                       placeholder="{{__('Name')}}">
                            </div>
                        </div>
                        {{--<div class="pro-dt-row row">
                            <div class="col-md-4">
                                <p>Code</p>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="code" id="code"
                                       placeholder="{{__('Code')}}"
                                       value="{{isset($user->DealerInfo->code)?$user->DealerInfo->code:''}}">
                            </div>
                        </div>--}}
                        <div class="pro-dt-row row">
                            <div class="col-md-4">
                                <p>Email</p>
                            </div>
                            <div class="col-md-8">
                                <input type="email" name="email" id="email"
                                       placeholder="{{__('Email')}}"
                                       value="{{isset($user->DealerInfo->email)?$user->DealerInfo->email:''}}"></div>
                        </div>
                        <div class="pro-dt-row row">
                            <div class="col-md-4">
                                <p>Trading Name</p>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="trading_name" id="trading_name"
                                       placeholder="{{__('Trading Name')}}"
                                       value="{{isset($user->DealerInfo->trading_name)?$user->DealerInfo->trading_name:''}}">
                            </div>
                        </div>
                        <div class="pro-dt-row row">
                            <div class="col-md-4">
                                <p>Legal Name</p>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="legal_name" id="legal_name"
                                       placeholder="{{__("Legal Name")}}"
                                       value="{{isset($user->DealerInfo->legal_name)?$user->DealerInfo->legal_name:''}}">
                            </div>
                        </div>
                        <div class="pro-dt-row row">
                            <div class="col-md-4">
                                <p>Address</p>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="address" id="address"
                                       placeholder="{{__('Address')}}"
                                       value="{{isset($user->DealerInfo->address)?$user->DealerInfo->address:''}}">
                            </div>
                        </div>
                        <div class="pro-dt-row row">
                            <div class="col-md-4">
                                <p>City</p>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="city" id="city"
                                       placeholder="{{__('City')}}"
                                       value="{{isset($user->DealerInfo->city)?$user->DealerInfo->city:''}}"></div>
                        </div>
                        <div class="pro-dt-row row">
                            <div class="col-md-4">
                                <p>Postcode</p>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="postcode" id="postcode"
                                       placeholder="{{__('Postcode')}}"
                                       value="{{isset($user->DealerInfo->postcode)?$user->DealerInfo->postcode:''}}">
                            </div>
                        </div>
                        <div class="pro-dt-row row">
                            <div class="col-md-4">
                                <p>Telephone</p>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="telephone" id="telephone"
                                       placeholder="{{__('Telephone')}}"
                                       value="{{isset($user->DealerInfo->telephone)?$user->DealerInfo->telephone:''}}">
                            </div>
                        </div>
                        <div class="pro-dt-row row">
                            <div class="col-md-4">
                                <p>FAX</p>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="fax" id="fax"
                                       placeholder="{{__('FAX')}}"
                                       value="{{isset($user->DealerInfo->fax)?$user->DealerInfo->fax:''}}">
                            </div>
                        </div>
                        <div class="pro-dt-row row">
                            <div class="col-md-4">
                                <p>Website</p>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="website" id="website"
                                       placeholder="{{__('Website')}}"
                                       value="{{isset($user->DealerInfo->website)?$user->DealerInfo->website:''}}">
                            </div>
                        </div>
                        <div class="pro-dt-row row">
                            <div class="col-md-4">
                                <p>Dealer Type</p>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="dealer_type" id="dealer_type"
                                       placeholder="{{__('Dealer Type')}}"
                                       value="{{isset($user->DealerInfo->dealer_type)?$user->DealerInfo->dealer_type:''}}">
                            </div>
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
            $('#telephone').intlTelInput({
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
        $("#frmDealerDetails").validate({
            rules: {
                name: {required: true},
                code: {required: true},
                trading_name: {required: true},
                email: {required: true, email: true},
                address: {required: true},
                postcode: {required: true},
                telephone: {required: true},
                legal_name: {required: true},
                city: {required: true},
            },
            messages: {
                name: {required: 'Please enter name'},
                code: {required: 'Please enter code'},
                trading_name: {required: 'Please enter trading name'},
                telephone: {required: 'Please enter contact number'},
                email: {required: 'Please enter email', email: "please enter valid email"},
                address: {required: 'Please select address'},
                postcode: {required: 'Please enter postcode'},
                legal_name: {required: 'Please enter legal name'},
                city: {required: 'Please enter city'},
            },
            errorPlacement: function (error, element) {
                if (element.attr("type") == "radio") {
                    error.appendTo('.a');
                } else {
                    if (element.attr("data-error-container")) {
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.attr("id") == 'telephone') {
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
            if ($("#frmDealerDetails").valid()) {
                var data = new FormData($('#frmDealerDetails')[0]);
                data.append('country_code', $("#telephone").intlTelInput("getSelectedCountryData").dialCode);
                $("#btnSave").attr('disabled', true);
                $.ajax({
                    type: 'post',
                    data: data,
                    dataType: "json",
                    url: "{{route('front.save_dealer_details')}}",
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
                                window.location.href = "{{route('front.dealer_details')}}";
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
