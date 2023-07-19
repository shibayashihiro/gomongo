@extends('layouts.web.dashboard.app')

@section('header_css')
    <style>
        .disabled_invoice_template {
            pointer-events: none;
            opacity: 0.4;
        }
    </style>
@endsection

@section('content')
    <div class="wd-md-rightbar">
        <div class="wd-md-topbar">
            <h2>{{$title}}</h2>
        </div>

        <div class="wd-md-bottombar">
            <div class="wd-sl-container">
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab"
                                   aria-expanded="true"><span class="round-tab">1 </span>
                                    <i>Vehicle <br>Details</i>
                                </a>
                            </li>

                            <li role="presentation" class="step-2 disabled">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab"
                                   aria-expanded="false"><span class="round-tab">2</span>
                                    <i>Customer <br>Details</i>
                                </a>
                            </li>

                            <li role="presentation" class="step-3 disabled">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span
                                        class="round-tab">3</span>
                                    <i>Pricing <br> </i>
                                </a>
                            </li>

                            <li role="presentation" class="step-4 disabled">
                                <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span
                                        class="round-tab">4</span>
                                    <i>Invoice <br> </i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <form id="frmSalesInvoice" name="frmSalesInvoice" method="post" action="javascript:;"
                          enctype="multipart/form-data" class="login-box">
                        @csrf
                        <div class="tab-content" id="main_form">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="wd-radio-btn d-flex align-items-center">
                                            <p>
                                                <input type="radio" id="type1" name="type" value="sales" checked>
                                                <label for="type1">Sales invoice</label>
                                            </p>
                                            <p>
                                                <input type="radio" id="type2" name="type" value="deposit">
                                                <label for="type2">Deposit invoice</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="registration_number"
                                                   placeholder="Vehicle Registration Number">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="model"
                                                   placeholder="Vehicle make and model">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="mileage"
                                                   placeholder="Vehicle mileage">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="vin_number"
                                                   placeholder="Vehicle VIN number">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" type="date" name="date_registration"
                                                   placeholder="Vehicle Date of registration">
                                        </div>
                                    </div>
                                </div>
                                <div id="demo" class="collapse">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="color"
                                                       placeholder="Colour">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="engine_size"
                                                       placeholder="Engine size">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="engine_number"
                                                       placeholder="Engine number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-inline pull-right d-flex justify-content-between">
                                    <li>
                                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"
                                           class="wd-add-more-btn"> More</a>
                                    </li>
                                    <li>
                                        <a class="default-btn" id="btnNextOne">Next
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="customer_name"
                                                   placeholder="Customer name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="address" name="address"
                                                   placeholder="Address">
                                            <div id="address_div">
                                                <input type="hidden" data-geo="lat" value="" id="latitude"
                                                       name="latitude">
                                                <input type="hidden" data-geo="lng" value="" id="longitude"
                                                       name="longitude">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="House Number"
                                                   id="house_number"
                                                   name="house_number">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Postcode" id="postcode"
                                                   name="postcode">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="contact_number"
                                                   placeholder="Contact number">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" type="email" name="email"
                                                   placeholder="Customer Email address">
                                        </div>
                                    </div>
                                    @if(is_subscription_permission_exist(\Illuminate\Support\Facades\Auth::user()->plan_id,'Customer data base'))
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><input type="checkbox" name="save_as_customer_data"
                                                              id="save_as_customer_data"
                                                              value="1">save customer to database?</label>
                                            </div>
                                        </div>
                                    @endif

                                </div>

                                <ul class="list-inline pull-right text-right">
                                    <li>
                                        <button type="button" class="default-btn next-step">Next</button>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-pane" role="tabpanel" id="step3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend wd-prepend">
                                                    <span class="input-group-text">£</span>
                                                </div>
                                                <input class="form-control price_input" type="number" id="price_cost"
                                                       name="price" placeholder="Vehicle price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 wd-chekbox">
                                        <h3 class="wd-part">Admin fee</h3>
                                        <div class="wd-radio-btn d-flex align-items-center">
                                            <p>
                                                <input type="radio" id="admin_fee_flag_yes" name="admin_fee_flag"
                                                       value="1" onchange="extra_filed('admin', '1')">
                                                <label for="admin_fee_flag_yes">Yes</label>
                                            </p>
                                            <p>
                                                <input type="radio" id="admin_fee_flag_no" name="admin_fee_flag"
                                                       value="0" onchange="extra_filed('admin', '0')" checked>
                                                <label for="admin_fee_flag_no">No</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div id="admin_info_main" class="w-100" style="display: none;">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend wd-prepend">
                                                        <span class="input-group-text">£</span>
                                                    </div>
                                                    <input type="number" class="form-control price_input"
                                                           id="admin_cost" name="admin_cost" placeholder="Cost">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="admin_description"
                                                       placeholder="Description">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 wd-chekbox">
                                        <h3 class="wd-part">Value added product</h3>
                                        <div class="wd-radio-btn d-flex align-items-center">
                                            <p>
                                                <input type="radio" id="product_flag_yes" name="product_flag" value="1"
                                                       onchange="extra_filed('product', '1')">
                                                <label for="product_flag_yes">Yes</label>
                                            </p>
                                            <p>
                                                <input type="radio" id="product_flag_no" name="product_flag" value="0"
                                                       onchange="extra_filed('product', '0')" checked>
                                                <label for="product_flag_no">No</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div id="product_info_main" class="w-100" style="display: none;">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend wd-prepend">
                                                        <span class="input-group-text">£</span>
                                                    </div>
                                                    <input class="form-control price_input" type="number"
                                                           id="product_cost" name="product_cost" placeholder="Cost">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="product_description"
                                                       placeholder="Description">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 wd-chekbox">
                                        <h3 class="wd-part">Part exchange</h3>
                                        <div class="wd-radio-btn d-flex align-items-center">
                                            <p>
                                                <input type="radio" id="part_exchange_flag_yes"
                                                       name="part_exchange_flag" value="1"
                                                       onchange="extra_filed('part_exchange', '1')">
                                                <label for="part_exchange_flag_yes">Yes</label>
                                            </p>
                                            <p>
                                                <input type="radio" id="part_exchange_flag_no" name="part_exchange_flag"
                                                       value="0" onchange="extra_filed('part_exchange', '0')" checked>
                                                <label for="part_exchange_flag_no">No</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div id="part_exchange_info_main" class="w-100" style="display: none;">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend wd-prepend">
                                                        <span class="input-group-text">£</span>
                                                    </div>
                                                    <input class="form-control price_input" type="number"
                                                           id="part_exchange_cost" name="part_exchange_cost"
                                                           placeholder="Cost">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class="form-control" type="text"
                                                       name="part_exchange_registration_number"
                                                       placeholder="Vehicle registration number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 wd-chekbox">
                                        <h3 class="wd-part">Finance</h3>
                                        <div class="wd-radio-btn d-flex align-items-center">
                                            <p>
                                                <input type="radio" id="finance_flag_yes"
                                                       name="finance_flag" value="1"
                                                       onchange="extra_filed('finance_flag', '1')">
                                                <label for="finance_flag_yes">Yes</label>
                                            </p>
                                            <p>
                                                <input type="radio" id="finance_flag_no" name="finance_flag"
                                                       value="0" onchange="extra_filed('finance_flag', '0')" checked>
                                                <label for="finance_flag_no">No</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div id="finance_flag_info_main" class="w-100" style="display: none;">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend wd-prepend">
                                                        <span class="input-group-text">£</span>
                                                    </div>
                                                    <input class="form-control price_input" type="number"
                                                           id="finance_cost" name="finance_cost"
                                                           placeholder="Cost">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class="form-control" type="text"
                                                       name="finance_description"
                                                       placeholder="Description">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 wd-chekbox">
                                        <h3 class="wd-part">Deposit value</h3>
                                        <div class="wd-radio-btn d-flex align-items-center">
                                            <p>
                                                <input type="radio" id="deposit_flag_yes" name="deposit_flag" value="1"
                                                       onchange="extra_filed('deposit', '1')">
                                                <label for="deposit_flag_yes">Yes</label>
                                            </p>
                                            <p>
                                                <input type="radio" id="deposit_flag_no" name="deposit_flag" value="0"
                                                       onchange="extra_filed('deposit', '0')" checked>
                                                <label for="deposit_flag_no">No</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div id="deposit_info_main" class="w-100" style="display: none;">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend wd-prepend">
                                                        <span class="input-group-text">£</span>
                                                    </div>
                                                    <input class="form-control price_input" type="number"
                                                           id="deposit_cost" name="deposit_cost" placeholder="Cost">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="deposit_description"
                                                       placeholder="Description">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 wd-chekbox">
                                        <h3 class="wd-part">Discount value</h3>
                                        <div class="wd-radio-btn d-flex align-items-center">
                                            <p>
                                                <input type="radio" id="discount_flag_yes" name="discount_flag"
                                                       value="1" onchange="extra_filed('discount', '1')">
                                                <label for="discount_flag_yes">Yes</label>
                                            </p>
                                            <p>
                                                <input type="radio" id="discount_flag_no" name="discount_flag" value="0"
                                                       onchange="extra_filed('discount', '0')" checked>
                                                <label for="discount_flag_no">No</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div id="discount_info_main" class="w-100" style="display: none;">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend wd-prepend">
                                                        <span class="input-group-text">£</span>
                                                    </div>
                                                    <input class="form-control price_input" type="number"
                                                           id="discount_cost" name="discount_cost" placeholder="Cost">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="discount_description"
                                                       placeholder="Description">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <ul class="list-inline pull-right text-right">
                                    <li>
                                        <button type="button" class="default-btn next-step">Next</button>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-pane" role="tabpanel" id="step4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" id="notes"
                                                      name="notes" placeholder="Notes"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend wd-prepend">
                                                    <span class="input-group-text">£</span>
                                                </div>
                                                <input class="form-control invoice_input" type="number" id="cash_price"
                                                       name="cash_price" placeholder="Amount paid in cash">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend wd-prepend">
                                                    <span class="input-group-text">£</span>
                                                </div>
                                                <input class="form-control invoice_input" type="number" id="card_price"
                                                       name="card_price" placeholder="Amount paid in card">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h6>Total Invoice £<span id="invoice_total"> 0.00</span></h6>

                                        <h6>Subtotal Price £<span id="price_total"> 0.00</span></h6>

                                        <h6>Total outstanding £<span id="all_price_total"> 0.00</span></h6>
                                    </div>
                                </div>
                                <ul class="list-inline d-flex align-items-center justify-content-between">
                                    <li>
                                        <button type="button" class="default-btn next-step" data-toggle="modal"
                                                data-target="#pdfTemplate">PREVIEW
                                        </button>
                                    </li>
                                    <li>
                                        <button type="submit" id="btnSaleInvoice" class="default-btn next-step"
                                                disabled>GENERATE
                                            INVOICE
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade wd-md-myexpense-popup" id="pdfTemplate" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('PDF Template')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row col-md-12">
                        <div
                            class="col-md-4 pdf-template-div active" data-id="pdf1">
                            <img src="{{asset('assets/web/images/pdf1.png')}}" class="pdf-template">
                        </div>
                        <div
                            class="col-md-4 pdf-template-div {{is_subscription_permission_exist(\Illuminate\Support\Facades\Auth::user()->plan_id,'Advance Sales invoice templates')==0?'disabled_invoice_template':''}}"
                            data-id="pdf2">
                            <img src="{{asset('assets/web/images/pdf2.png')}}" class="pdf-template">
                        </div>
                        <div
                            class="col-md-4 pdf-template-div {{is_subscription_permission_exist(\Illuminate\Support\Facades\Auth::user()->plan_id,'Advance Sales invoice templates')==0?'disabled_invoice_template':''}}"
                            data-id="pdf3">
                            <img src="{{asset('assets/web/images/pdf3.png')}}" class="pdf-template">
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-12 text-center mt-3">
                            <button class="add-stock-btn" id="btnMdlPDFPreview">Preview</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script src="{{asset('assets/web/js/jquery.geocomplete.min.js')}}"></script>
    <script>
        let pdf_id = "pdf1";
        $(document).ready(function () {

            function price_calculation() {
                let price_cost = parseInt($("#price_cost").val());
                if (isNaN(price_cost)) {
                    price_cost = 0;
                }
                let admin_cost = parseInt($("#admin_cost").val());
                if (isNaN(admin_cost)) {
                    admin_cost = 0;
                }
                let product_cost = parseInt($("#product_cost").val());
                if (isNaN(product_cost)) {
                    product_cost = 0;
                }

                let part_exchange_cost = parseInt($("#part_exchange_cost").val());
                if (isNaN(part_exchange_cost)) {
                    part_exchange_cost = 0;
                }
                let deposit_cost = parseInt($("#deposit_cost").val());
                if (isNaN(deposit_cost)) {
                    deposit_cost = 0;
                }

                let discount_cost = parseInt($("#discount_cost").val());
                if (isNaN(discount_cost)) {
                    discount_cost = 0;
                }

                let type = $('input[name="type"]:checked').val();
                if (type === 'deposit') {
                    return price_cost + admin_cost + product_cost - discount_cost - part_exchange_cost - deposit_cost;
                } else {
                    return price_cost + admin_cost + product_cost - discount_cost;
                }
            }

            function all_price_calculation() {
                let price_cost = parseInt($("#price_cost").val());
                if (isNaN(price_cost)) {
                    price_cost = 0;
                }
                let admin_cost = parseInt($("#admin_cost").val());
                if (isNaN(admin_cost)) {
                    admin_cost = 0;
                }
                let product_cost = parseInt($("#product_cost").val());
                if (isNaN(product_cost)) {
                    product_cost = 0;
                }

                let part_exchange_cost = parseInt($("#part_exchange_cost").val());
                if (isNaN(part_exchange_cost)) {
                    part_exchange_cost = 0;
                }
                let finance_cost = parseInt($("#finance_cost").val());
                if (isNaN(finance_cost)) {
                    finance_cost = 0;
                }
                let deposit_cost = parseInt($("#deposit_cost").val());
                if (isNaN(deposit_cost)) {
                    deposit_cost = 0;
                }
                let discount_cost = parseInt($("#discount_cost").val());
                if (isNaN(discount_cost)) {
                    discount_cost = 0;
                }

                let type = $('input[name="type"]:checked').val();
                if (type === 'deposit') {
                    return deposit_cost;
                } else {
                    return price_cost + admin_cost + product_cost - part_exchange_cost - finance_cost - deposit_cost - discount_cost;
                }
            }

            $(".invoice_input").keyup(function () {
                let cash_price = parseInt($("#cash_price").val());
                if (isNaN(cash_price)) {
                    cash_price = 0;
                }
                let card_price = parseInt($("#card_price").val());
                if (isNaN(card_price)) {
                    card_price = 0;
                }

                let price_total = price_calculation();
                let all_price_total = all_price_calculation();
                let invoice_total = cash_price + card_price;

                if (all_price_total == invoice_total) {
                    $('#btnSaleInvoice').prop("disabled", false);
                } else {
                    $('#btnSaleInvoice').prop("disabled", true);
                }

                $("#price_total").html((price_total));
                $("#all_price_total").html((all_price_total - invoice_total));
                $("#invoice_total").html(invoice_total);
            });

            $(".price_input").keyup(function () {
                let all_price_total = all_price_calculation();
                let price_total = price_calculation();
                $("#price_total").html((price_total));
                $("#all_price_total").html(all_price_total);
            });
        });

        function extra_filed(type, val) {
            if (val == '1') {
                $('#' + type + '_info_main').show();
            } else {
                $('#' + type + '_info_main').hide();
                $('#' + type + '_cost').val('');
            }
        }

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

        let frmSalesInvoice = $("#frmSalesInvoice").validate({
            rules: {
                type: {required: true},
                registration_number: {required: true},
                model: {required: true},
                mileage: {required: true},
                vin_number: {required: true},
                date_registration: {required: true},
                customer_name: {required: true},
                address: {required: true},
                postcode: {required: true},
                house_number: {required: true},
                contact_number: {required: true},
                email: {required: true},
                price: {required: true, number: true},
                admin_fee_flag: {required: true},
                admin_cost: {required: true},
                admin_description: {required: true},
                product_flag: {required: true},
                product_cost: {required: true},
                product_description: {required: true},
                part_exchange_flag: {required: true},
                part_exchange_cost: {required: true},
                part_exchange_description: {required: true},
                finance_flag: {required: true},
                finance_cost: {required: true},
                finance_description: {required: true},
                deposit_flag: {required: true},
                deposit_cost: {required: true},
                deposit_description: {required: true},
                discount_flag: {required: true},
                discount_cost: {required: true},
                discount_description: {required: true},
            },
            messages: {
                type: {required: 'Please select type'},
                registration_number: {required: 'Please enter vehicle registration number'},
                model: {required: 'Please enter vehicle make and model'},
                mileage: {required: 'Please enter vehicle mileage'},
                vin_number: {required: 'Please enter vehicle vin number'},
                date_registration: {required: 'Please enter vehicle date of registration'},
                customer_name: {required: 'Please enter customer name'},
                address: {required: 'Please enter customer address'},
                postcode: {required: 'Please enter customer postcode'},
                house_number: {required: 'Please enter customer house number'},
                contact_number: {required: 'Please enter customer contact number'},
                email: {required: 'Please enter customer email'},
                price: {required: 'Please enter vehicle price'},
            }
        });

        $("#btnNextOne").click(function (e) {
            /*if ($("#frmSalesInvoice").valid()) {*/
            var active = $('.wizard .nav-tabs li.active');
            active.next().removeClass('disabled');
            nextTab(active);
            /*}*/
        });

        $(".step-2").click(function () {
            if (!$("#frmSalesInvoice").valid()) {
                return false;
            }
        });

        $(".step-3").click(function () {
            if (!$("#frmSalesInvoice").valid()) {
                return false;
            }
        });

        $(".step-4").click(function () {
            if (!$("#frmSalesInvoice").valid()) {
                return false;
            }
        });

        $("#btnSaleInvoice").click(function () {
            if ($("#frmSalesInvoice").valid()) {
                //$("#term_condition").modal('hide');
                var data = new FormData($('#frmSalesInvoice')[0]);
                data.append('pdf_id', pdf_id);
                //data.append('country_code', $("#mobile").intlTelInput("getSelectedCountryData").dialCode);
                $("#btnSaleInvoice").attr('disabled', true);
                $.ajax({
                    type: 'post',
                    data: data,
                    dataType: "json",
                    url: "{{route('front.save_sale_invoice')}}",
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: addOverlay,
                    success: function (r) {
                        removeOverlay();
                        if (r.status == 200) {
                            toastr['success'](r.message, "success");
                            setTimeout(function () {
                                window.location.href = "{{route('front.sales_invoice')}}";
                            }, 1000);
                        } else {
                            toastr['error'](r.message, "error");
                            $("#btnSaleInvoice").attr('disabled', false);
                        }
                    }
                });
            }
        });

        //pdf template change on click
        $(".pdf-template-div").click(function () {
            $(".pdf-template-div").removeClass('active');
            $(this).addClass('active');
            pdf_id = $(this).data('id');
        });
        $("#btnMdlPDFPreview").click(function () {
            let data = new FormData($('#frmSalesInvoice')[0]);
            data.append('pdf_id', pdf_id);
            $("#btnSaleInvoice").attr('disabled', true);
            $("#btnMdlPDFPreview").attr('disabled', true);
            $.ajax({
                type: 'post',
                data: data,
                dataType: "json",
                url: "{{route('front.generate_sales_invoice_pdf')}}",
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: addOverlay,
                success: function (r) {
                    removeOverlay();
                    if (r.status == 200) {
                        $("#pdfTemplate").modal('hide');
                        $("#btnSaleInvoice").attr('disabled', false);
                        $("#btnMdlPDFPreview").attr('disabled', false);
                        window.open(r.data.file, '_blank');
                    } else {
                        toastr['error'](r.message, "error");
                        $("#btnSaleInvoice").attr('disabled', false);
                        $("#btnMdlPDFPreview").attr('disabled', false);
                    }
                },
                error: function (request, status, error) {
                    removeOverlay();
                    let r = JSON.parse(request.responseText);
                    toastr['error'](r.message, "error");
                    $("#btnSaleInvoice").attr('disabled', false);
                    $("#btnMdlPDFPreview").attr('disabled', false);
                }
            });
        });
    </script>
@endsection
