@extends('layouts.admin.app')

@section('content')
    <style>
        ul {
            list-style-type: none;
        }

        li {
            display: inline-block;
        }
        .wd-sl-cutstome {
            text-align: left !important;
        }
        .main_templete img{
            width: 100%;
        }

        input[type="checkbox"][id^="t"] {
            display: none;
        }

        label {
            border: 1px solid #fff;
            padding: 10px;
            display: block;
            position: relative;
            margin: 10px;
            cursor: pointer;
        }

        label:before {
            background-color: white;
            color: white;
            content: " ";
            display: block;
            border-radius: 50%;
            border: 1px solid grey;
            position: absolute;
            top: -5px;
            left: -5px;
            width: 25px;
            height: 25px;
            text-align: center;
            line-height: 28px;
            transition-duration: 0.4s;
            transform: scale(0);
        }

        label img {
            height: 100px;
            width: 100px;
            transition-duration: 0.2s;
            transform-origin: 50% 50%;
        }

        :checked + label {
            border-color: #ddd;
        }

        :checked + label:before {
            content: "✓";
            background-color: grey;
            transform: scale(1);
        }

        :checked + label img {
            transform: scale(0.9);
            /* box-shadow: 0 0 5px #333; */
            z-index: -1;
        }
    </style>
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
                  enctype="multipart/form-data" action="{{route('admin.subscription.update',$data->id)}}">
                {!! get_error_html($errors) !!}
                @csrf
                @method('PATCH')
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <label for="name"
                               class="col-form-label col-lg-3 col-sm-12"><span
                                class="text-danger">*</span>Name</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" name="name" id="name" class="form-control"
                                   value="{{$data->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price"
                               class="col-form-label col-lg-3 col-sm-12"><span
                                class="text-danger">*</span>Price</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="number" name="price" id="price" class="form-control"
                                   value="{{$data->price}}" step="0.001">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="discount_price"
                               class="col-form-label col-lg-3 col-sm-12">Discount Price</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="number" name="discount_price" id="discount_price" class="form-control"
                                   value="{{$data->discount_price}}" step="0.001">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="discount_price"
                               class="col-form-label col-lg-3 col-sm-12"><span
                                class="text-danger">*</span>Validity</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="input-group">
                                <input type="number" class="form-control" placeholder="Validity" id="validity"
                                       name="validity"
                                       value="{{(int)$data->validity}}">
                                <div class="input-group-append">
                                    <select id="validity_time" name="validity_time" class="form-control">
                                        <option
                                            {{(strpos($data->validity, 'days') !== false)?"selected":""}}  value="days">
                                            Day
                                        </option>
                                        <option
                                            {{(strpos($data->validity, 'month') !== false)?"selected":""}} value="month">
                                            Month
                                        </option>
                                        <option
                                            {{(strpos($data->validity, 'year') !== false)?"selected":""}} value="year">
                                            Year
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <legend>{{__('Plan Content')}}</legend>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-4 col-sm-12 wd-sl-cutstome"><input type="checkbox"
                                                                                               name="plan_content[]"
                                                                                               id="content_template"
                                                                                               value="Template">&nbsp;Template</label>
                        <label class="col-form-label col-lg-4 col-sm-12 wd-sl-cutstome"><input type="checkbox"
                                                                                               name="plan_content[]"
                                                                                               id="monthly_rolling_contract"
                                                                                               value="Monthly
                            rolling contract" {{is_subscription_permission_exist($data->id,'Monthly_rolling_contract')?'checked':''}}>&nbsp;Monthly
                            rolling contract</label>
                        <label class="col-form-label col-lg-4 col-sm-12 wd-sl-cutstome"><input type="checkbox"
                                                                                               name="plan_content[]"
                                                                                               id="GDPR_compliant"
                                                                                               value="GDPR Compliant"
                                {{is_subscription_permission_exist($data->id,'GDPR_compliant')?'checked':''}}
                            >&nbsp;GDPR
                            Compliant</label>
                        <label class="col-form-label col-lg-4 col-sm-12 wd-sl-cutstome"><input type="checkbox"
                                                                                               name="plan_content[]"
                                                                                               id="247_support"
                                                                                               value="24*7 support">&nbsp;
                            24*7 support
                        </label>
                        <label class="col-form-label col-lg-4 col-sm-12 wd-sl-cutstome"><input type="checkbox"
                                                                                               name="plan_content[]"
                                                                                               id="3rd_party_feeds"
                                                                                               value="3rd party feeds"
                                {{is_subscription_permission_exist($data->id,'3rd_party_feeds')?'checked':''}}
                            >&nbsp;
                            3rd party
                            feeds </label>
                        <label class="col-form-label col-lg-4 col-sm-12 wd-sl-cutstome"><input type="checkbox"
                                                                                               name="plan_content[]"
                                                                                               id="ssl_secure"
                                                                                               value="Ssl secure"
                                {{is_subscription_permission_exist($data->id,'Ssl_secure')?'checked':''}}
                            >&nbsp;
                            Ssl secure
                        </label>
                        <label class="col-form-label col-lg-4 col-sm-12 wd-sl-cutstome"><input type="checkbox"
                                                                                               name="plan_content[]"
                                                                                               id="seo" value="SEO"
                                {{is_subscription_permission_exist($data->id,'SEO')?'checked':''}}
                            >&nbsp;
                            SEO </label>
                        <label class="col-form-label col-lg-4 col-sm-12 wd-sl-cutstome"><input type="checkbox"
                                                                                               name="plan_content[]"
                                                                                               id="finance_form"
                                                                                               value="Finance form"
                                {{is_subscription_permission_exist($data->id,'Finance_form')?'checked':''}}
                            >&nbsp;
                            Finance form
                        </label>
                        <label class="col-form-label col-lg-4 col-sm-12 wd-sl-cutstome"><input type="checkbox"
                                                                                               name="plan_content[]"
                                                                                               id="mobile_compatible_and_responsive"
                                                                                               value="Mobile compatible and responsive"
                                {{is_subscription_permission_exist($data->id,'Mobile_compatible_and_responsive')?'checked':''}}
                            >&nbsp;
                            Mobile compatible and responsive </label>
                        <label class="col-form-label col-lg-4 col-sm-12 wd-sl-cutstome"><input type="checkbox"
                                                                                               name="plan_content[]"
                                                                                               id="advanced_calendar_booking_system"
                                                                                               value="Advanced Calendar booking system"
                                {{is_subscription_permission_exist($data->id,'Advanced Calendar booking system')?'checked':''}}
                            >&nbsp;
                            Advanced Calendar booking system </label>
                        <label class="col-form-label col-lg-4 col-sm-12 wd-sl-cutstome"><input type="checkbox"
                                                                                               name="plan_content[]"
                                                                                               id="basic_sales_invoice_templates"
                                                                                               value="Basic Sales invoice templates"
                                {{is_subscription_permission_exist($data->id,'Basic Sales invoice templates')?'checked':''}}
                            >&nbsp;
                            Basic Sales invoice templates </label>
                        <label class="col-form-label col-lg-4 col-sm-12 wd-sl-cutstome"><input type="checkbox"
                                                                                               name="plan_content[]"
                                                                                               id="advance_sales_invoice_templates"
                                                                                               value="Advance Sales invoice templates"
                                {{is_subscription_permission_exist($data->id,'Advance Sales invoice templates')?'checked':''}}
                            >&nbsp;
                            Advance Sales invoice templates </label>
                        <label class="col-form-label col-lg-4 col-sm-12 wd-sl-cutstome"><input type="checkbox"
                                                                                               name="plan_content[]"
                                                                                               id="account_manager"
                                                                                               value="Account manager"
                                {{is_subscription_permission_exist($data->id,'Account manager')?'checked':''}}
                            >&nbsp;Account
                            manager</label>
                        <label class="col-form-label col-lg-4 col-sm-12 wd-sl-cutstome"><input type="checkbox"
                                                                                               name="plan_content[]"
                                                                                               id="sales_record_system"
                                                                                               value="Sales record system"
                                {{is_subscription_permission_exist($data->id,'Sales record system')?'checked':''}}
                            >&nbsp;Sales
                            record system</label>
                        <label class="col-form-label col-lg-4 col-sm-12 wd-sl-cutstome"><input type="checkbox"
                                                                                               name="plan_content[]"
                                                                                               id="stock_list_system"
                                                                                               value="Stock list system"
                                {{is_subscription_permission_exist($data->id,'Stock list system')?'checked':''}}
                            >&nbsp;Stock
                            list system</label>
                        <label class="col-form-label col-lg-4 col-sm-12 wd-sl-cutstome"><input type="checkbox"
                                                                                               name="plan_content[]"
                                                                                               id="advanced_task_manager_system"
                                                                                               value="Advanced task manager system (TO DO list)"
                                {{is_subscription_permission_exist($data->id,'Advanced task manager system (TO DO list)')?'checked':''}}
                            >&nbsp;Advanced
                            task manager system (TO DO list)</label>
                        <label class="col-form-label col-lg-4 col-sm-12 wd-sl-cutstome"><input type="checkbox"
                                                                                               name="plan_content[]"
                                                                                               id="customer_data_base"
                                                                                               value="Customer data base"
                                {{is_subscription_permission_exist($data->id,'Customer data base')?'checked':''}}
                            >&nbsp;Customer
                            data base</label>
                        <label class="col-form-label col-lg-4 col-sm-12 wd-sl-cutstome"><input type="checkbox"
                                                                                               name="plan_content[]"
                                                                                               id="live_chat"
                                                                                               value="Live chat"
                                {{is_subscription_permission_exist($data->id,'Live chat')?'checked':''}}
                            >&nbsp;Live
                            chat</label>
                        <label class="col-form-label col-lg-4 col-sm-12 wd-sl-cutstome"><input type="checkbox"
                                                                                               name="plan_content[]"
                                                                                               id="social_media_output"
                                                                                               value="Social media output"
                                {{is_subscription_permission_exist($data->id,'Social media output')?'checked':''}}
                            >&nbsp;Social
                            media output</label>
                        <label class="col-form-label col-lg-4 col-sm-12 wd-sl-cutstome"><input type="checkbox"
                                                                                               name="plan_content[]"
                                                                                               id="vehicle_video_uploads"
                                                                                               value="Vehicle video uploads"
                                {{is_subscription_permission_exist($data->id,'Vehicle video uploads')?'checked':''}}
                            >&nbsp;Vehicle
                            video uploads</label>
                        <label class="col-form-label col-lg-4 col-sm-12 wd-sl-cutstome"><input type="checkbox"
                                                                                               name="plan_content[]"
                                                                                               id="image_overlay"
                                                                                               value="Image overlay"
                                {{is_subscription_permission_exist($data->id,'Image overlay')?'checked':''}}
                            >&nbsp;Image
                            overlay</label>
                        <label class="col-form-label col-lg-4 col-sm-12 wd-sl-cutstome"><input type="checkbox"
                                                                                               name="plan_content[]"
                                                                                               id="vehicle_valuations"
                                                                                               value="Vehicle valuations"
                                {{is_subscription_permission_exist($data->id,'Vehicle valuations')?'checked':''}}
                            >&nbsp;Vehicle
                            valuations</label>
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
                                <a href="{{route('admin.subscription.index')}}"
                                   class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="template_model" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{__('Website Template')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="wd-sl-alltemplt">
                                    <div class="row">
                                        <ul>
                                            <li>
                                                <input type="checkbox" id="t1" name="template_slug[]"
                                                       value="t1" {{is_subscription_permission_exist($data->id,'t1')?'checked':''}}/>
                                                <label for="t1"><img
                                                        src="{{asset('assets/web/dashboard/images/t1.png')}}"/></label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="t2" name="template_slug[]"
                                                       value="t2" {{is_subscription_permission_exist($data->id,'t2')?'checked':''}}/>
                                                <label for="t2"><img
                                                        src="{{asset('assets/web/dashboard/images/t2.png')}}"/></label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="t3" name="template_slug[]"
                                                       value="t3" {{is_subscription_permission_exist($data->id,'t3')?'checked':''}}/>
                                                <label for="t3"><img
                                                        src="{{asset('assets/web/dashboard/images/t3.png')}}"/></label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="t4" name="template_slug[]"
                                                       value="t4" {{is_subscription_permission_exist($data->id,'t4')?'checked':''}}/>
                                                <label for="t4"><img
                                                        src="{{asset('assets/web/dashboard/images/t4.png')}}"/></label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="t5" name="template_slug[]"
                                                       value="t5" {{is_subscription_permission_exist($data->id,'t5')?'checked':''}}/>
                                                <label for="t5"><img
                                                        src="{{asset('assets/web/dashboard/images/t5.png')}}"/></label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="t6" name="template_slug[]"
                                                       value="t6" {{is_subscription_permission_exist($data->id,'t6')?'checked':''}}/>
                                                <label for="t6"><img
                                                        src="{{asset('assets/web/dashboard/images/t6.png')}}"/></label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="t7" name="template_slug[]"
                                                       value="t7" {{is_subscription_permission_exist($data->id,'t7')?'checked':''}}/>
                                                <label for="t7"><img
                                                        src="{{asset('assets/web/dashboard/images/t7.png')}}"/></label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="t8" name="template_slug[]"
                                                       value="t8" {{is_subscription_permission_exist($data->id,'t8')?'checked':''}}/>
                                                <label for="t8"><img
                                                        src="{{asset('assets/web/dashboard/images/t8.png')}}"/></label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="t9" name="template_slug[]"
                                                       value="t9" {{is_subscription_permission_exist($data->id,'t9')?'checked':''}}/>
                                                <label for="t9"><img
                                                        src="{{asset('assets/web/dashboard/images/t9.png')}}"/></label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="t10" name="template_slug[]"
                                                       value="t10" {{is_subscription_permission_exist($data->id,'t10')?'checked':''}}/>
                                                <label for="t10"><img
                                                        src="{{asset('assets/web/dashboard/images/t10.png')}}"/></label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="t11" name="template_slug[]"
                                                       value="t11" {{is_subscription_permission_exist($data->id,'t11')?'checked':''}}/>
                                                <label for="t11"><img
                                                        src="{{asset('assets/web/dashboard/images/t11.png')}}"/></label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="t12" name="template_slug[]"
                                                       value="t12" {{is_subscription_permission_exist($data->id,'t12')?'checked':''}}/>
                                                <label for="t12"><img
                                                        src="{{asset('assets/web/dashboard/images/t12.png')}}"/></label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="t13" name="template_slug[]"
                                                       value="t13" {{is_subscription_permission_exist($data->id,'t13')?'checked':''}}/>
                                                <label for="t13"><img
                                                        src="{{asset('assets/web/dashboard/images/t13.png')}}"/></label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="t14" name="template_slug[]"
                                                       value="t14" {{is_subscription_permission_exist($data->id,'t14')?'checked':''}}/>
                                                <label for="t14"><img
                                                        src="{{asset('assets/web/dashboard/images/t14.png')}}"/></label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="t15" name="template_slug[]"
                                                       value="t15" {{is_subscription_permission_exist($data->id,'t15')?'checked':''}}/>
                                                <label for="t15"><img
                                                        src="{{asset('assets/web/dashboard/images/t15.png')}}"/></label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="t16" name="template_slug[]"
                                                       value="t16" {{is_subscription_permission_exist($data->id,'t16')?'checked':''}}/>
                                                <label for="t16"><img
                                                        src="{{asset('assets/web/dashboard/images/t16.png')}}"/></label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="t17" name="template_slug[]"
                                                       value="t17" {{is_subscription_permission_exist($data->id,'t17')?'checked':''}}/>
                                                <label for="t17"><img
                                                        src="{{asset('assets/web/dashboard/images/t17.png')}}"/></label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="t18" name="template_slug[]"
                                                       value="t18" {{is_subscription_permission_exist($data->id,'t18')?'checked':''}}/>
                                                <label for="t18"><img
                                                        src="{{asset('assets/web/dashboard/images/t18.png')}}"/></label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="t19" name="template_slug[]"
                                                       value="t19" {{is_subscription_permission_exist($data->id,'t19')?'checked':''}}/>
                                                <label for="t19"><img
                                                        src="{{asset('assets/web/dashboard/images/t19.png')}}"/></label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="t20" name="template_slug[]"
                                                       value="t20" {{is_subscription_permission_exist($data->id,'t20')?'checked':''}}/>
                                                <label for="t20"><img
                                                        src="{{asset('assets/web/dashboard/images/t20.png')}}"/></label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="t21" name="template_slug[]"
                                                       value="t21" {{is_subscription_permission_exist($data->id,'t21')?'checked':''}}/>
                                                <label for="t21"><img
                                                        src="{{asset('assets/web/dashboard/images/t21.png')}}"/></label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Select</button>
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
        var checkedNum = $('input[name="template_slug[]"]:checked').length;
        if (checkedNum > 0) {
            $("#content_template").prop('checked', true);
        }
        $("#content_template").click(function () {
            if (this.checked == true) {
                $("#template_model").modal('show');
            }
        });
        $(function () {
            $("#main_form").validate({
                rules: {
                    name: {required: true},
                    price: {required: true},
                    validity: {required: true},
                },
                messages: {
                    name: {required: "Please enter name"},
                    price: {required: "Please enter price"},
                    validity: {required: "Please enter validity"},
                },
                submitHandler: function (form) {
                    addOverlay();
                    form.submit();
                }
            });
        });
    </script>
@endsection

