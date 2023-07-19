@extends('layouts.admin.app')
@section('h_style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/utils.js"></script>
@endsection

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">{{print_title($title)}}</h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="javascript:" class="kt-subheader__breadcrumbs-home">
                            <i class="flaticon2-shelter"></i>
                        </a>
                        {!! $breadcrumb !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">{{print_title($title)}}</h3>
                </div>
            </div>
            <!--begin::Form-->
            <form class="kt-form kt-form--label-right" name="main_form" id="main_form" class="main_form"
                  method="post"
                  enctype="multipart/form-data" action="{{route('admin.new-user.update',$data->id)}}">
                {!! get_error_html($errors) !!}
                @csrf
                @method('PATCH')
                <input type="hidden" name="country_code" id="country_code"
                       value="{{empty($data->country_code)?"+1":$data->country_code}}">
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <label for="profile_image"
                               class="col-form-label col-lg-3 col-sm-12">{{__('Profile Image')}}</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="file" accept="image/*" id="profile_image" class="form-control"
                                   name="profile_image">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="first_name"
                               class="col-form-label col-lg-3 col-sm-12"><span
                                class="text-danger">*</span>First Name</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" name="first_name" id="first_name" class="form-control"
                                   value="{{$data->first_name}}" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="last_name"
                               class="col-form-label col-lg-3 col-sm-12"><span
                                class="text-danger">*</span>last Name</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" name="last_name" id="last_name" class="form-control"
                                   value="{{$data->last_name}}" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="last_name"
                               class="col-form-label col-lg-3 col-sm-12"><span
                                class="text-danger">*</span>Username</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" name="username" id="username" class="form-control"
                                   value="{{$data->username}}" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mobile"
                               class="col-form-label col-lg-3 col-sm-12"><span
                                class="text-danger">*</span>{{__('Number')}}</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div>
                                <input type="text" id="number" name="mobile" class="form-control" maxlength="10"
                                       value="{{(empty($data->country_code)?"+1":$data->country_code)." ".$data->mobile}}"
                                       minlength="5">
                            </div>
                            <label id="number-error" class="error" for="number"></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email"
                               class="col-form-label col-lg-3 col-sm-12"><span
                                class="text-danger">*</span>email</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="email" name="email" id="email" class="form-control" value="{{$data->email}}">
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <button type="submit"
                                        class="btn btn-success kt-spinner--right kt-spinner--lg kt-spinner--light"
                                        id="btn-submit-dev">Submit
                                </button>
                                <a href="{{route('admin.user.index')}}"
                                   class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            let id = "{{$data->id}}";
            $('#number').intlTelInput({
                nationalMode: false,
                separateDialCode: true,
                formatOnDisplay: false,
            }).on("countrychange", function () {
                $('#country_code').val('+' + $(this).intlTelInput("getSelectedCountryData").dialCode);
            });

            $("#main_form").validate({
                rules: {
                    first_name: {required: true},
                    last_name: {required: true},
                    username: {required: true},
                    mobile: {
                        required: true,
                        digits: true,
                        remote: {
                            type: 'get',
                            url: "{{route('front.user_availability_checker')}}",
                            data: {
                                id: id,
                                country_code: function () {
                                    return $('#country_code').val();
                                },
                                number: function () {
                                    return $('#number').val();
                                }
                            }
                        },
                    },
                    username: {
                        required: true,
                        remote: {
                            type: 'get',
                            url: "{{route('front.user_availability_checker')}}",
                            data: {
                                id: id,
                                username: function () {
                                    return $('#username').val();
                                }
                            }
                        },
                    },
                    email: {
                        required: true,
                        remote: {
                            type: 'get',
                            url: "{{route('front.user_availability_checker')}}",
                            data: {
                                id: id,
                                email: function () {
                                    return $('#email').val();
                                }
                            }
                        },
                    },
                },
                messages: {
                    first_name: {required: "Please enter first name"},
                    last_name: {required: "Please enter last name"},
                    mobile: {required: 'Please enter number', remote: "This number is already taken"},
                    username: {required: 'Please enter username', remote: "This username is already taken"},
                    email: {required: 'Please enter email', remote: "This email is already taken"},
                },
                submitHandler: function (form) {
                    addOverlay();
                    form.submit();
                }
            });
        });
    </script>
@endsection

