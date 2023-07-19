@extends('layouts.template.t9.app')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/web/template/t9/css/wizard.css') }}">
@endsection

@section('content')
    <section class="wd-md-stock-main text-center">
        <div class="container">
            <h3><a href="{{ route('front.template.home', $domain_slug) }}">HOME</a> > FINANCE</h3>
            <h1>FINANCE APPLICATION FORM</h1>
        </div>
    </section>
    <section class="signup-step-container wd-sl-wizard">
        <div class="container">

            <div class="wizard">
                <div class="wizard-inner">
                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab"
                                aria-expanded="true"><span class="round-tab">1 </span> <i>Personal<br> Informations</i></a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab"
                                aria-expanded="false"><span class="round-tab">2</span> <i>Address<br> Information</i></a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span
                                    class="round-tab">3</span> <i>Employement<br> Information</i></a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span
                                    class="round-tab">4</span> <i>Bank<br> Details</i></a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step5" data-toggle="tab" aria-controls="step5" role="tab"><span
                                    class="round-tab">5</span> <i>Affordability<br> Information</i></a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step6" data-toggle="tab" aria-controls="step6" role="tab"><span
                                    class="round-tab">6</span> <i>Bank<br> Details</i></a>
                        </li>
                    </ul>
                </div>
                <form id="frmFinanceInvoice" name="frmFinanceInvoice" method="post" action="javascript:;"
                    enctype="multipart/form-data" class="login-box">
                    @csrf
                    <div class="tab-content" id="main_form">
                        <div class="tab-pane active" role="tabpanel" id="step1">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="vehicle_registration_number"
                                            placeholder="Vehicle Registration Number"
                                            onchange="preview_update('vehicle_registration_number')">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="mileage" placeholder="Mileage"
                                            onchange="preview_update('mileage')">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="vehicle_price"
                                            placeholder="Vehicle Price" onchange="preview_update('vehicle_price')">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="deposit_amount"
                                            placeholder="Deposit Amount" onchange="preview_update('deposit_amount')">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="part_exchange_value"
                                            placeholder="Part Exchange Value"
                                            onchange="preview_update('part_exchange_value')">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="settlement_figure"
                                            placeholder="Settlement Figure"
                                            onchange="preview_update('settlement_figure')">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control" name="term_of_agreement" id="term_of_agreement"
                                            onchange="preview_update('term_of_agreement')">
                                            @for ($i = 12; $i <= 60; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="title"
                                            placeholder="Title"onchange="preview_update('title')">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="first_name"
                                            placeholder="First Name" onchange="preview_update('first_name')">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="middle_name"
                                            placeholder="Middle Name" onchange="preview_update('middle_name')">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="last_name"
                                            placeholder="Last Name" onchange="preview_update('last_name')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="email" placeholder="Email"
                                            onchange="preview_update('email')">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="telephone"
                                            placeholder="Home Telephone" onchange="preview_update('telephone')">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="mobile" placeholder="Mobile"
                                            onchange="preview_update('mobile')">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="gender" placeholder="Gender"
                                            onchange="preview_update('gender')">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="date" name="dob"
                                            placeholder="Date Of Birth" onchange="preview_update('dob')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="nationality"
                                            placeholder="Nationality" onchange="preview_update('nationality')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="marital_status"
                                            placeholder="Marital Status" onchange="preview_update('marital_status')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="no_dependant"
                                            placeholder="No. of Dependants" onchange="preview_update('no_dependant')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="driving_licence"
                                            placeholder="Driveing Licence" onchange="preview_update('driving_licence')">
                                    </div>
                                </div>
                            </div>
                            <ul class="list-inline pull-right">
                                <li>
                                    <button type="button" class="default-btn next-step" id="btnNextOne">Next</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="address"
                                            placeholder="Post Code Lookup" onchange="preview_update('address')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="building_name"
                                            placeholder="Building Name" onchange="preview_update('building_name')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="building_number"
                                            placeholder="Building Number" onchange="preview_update('building_number')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="building_floor"
                                            placeholder="Room/Floor" onchange="preview_update('building_floor')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="street" placeholder="Street"
                                            onchange="preview_update('street')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="district"
                                            placeholder="District" onchange="preview_update('district')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="city"
                                            placeholder="City/Town" onchange="preview_update('city')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="postcode"
                                            placeholder="Postcode" onchange="preview_update('postcode')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="residency"
                                            placeholder="Residency" onchange="preview_update('residency')">
                                    </div>
                                </div>
                            </div>
                            <ul class="list-inline pull-right">
                                <li>
                                    <button type="button" class="default-btn prev-step">Back</button>
                                </li>
                                <li>
                                    <button type="button" class="default-btn next-step">Next</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step3">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="emp_name"
                                            placeholder="Employer" onchange="preview_update('emp_name')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="emp_occupation"
                                            placeholder="Occupation" onchange="preview_update('emp_occupation')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="emp_occupation_basis"
                                            placeholder="Occupation Basis"
                                            onchange="preview_update('emp_occupation_basis')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="emp_occupation_type"
                                            placeholder="Occupation Type"
                                            onchange="preview_update('emp_occupation_type')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="emp_address"
                                            placeholder="Pincode Lookup" onchange="preview_update('emp_address')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="emp_building_name"
                                            placeholder="Building Name" onchange="preview_update('emp_building_name')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="emp_building_number"
                                            placeholder="Building Number"
                                            onchange="preview_update('emp_building_number')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="emp_building_floor"
                                            placeholder="Room/Floor" onchange="preview_update('emp_building_floor')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="emp_street"
                                            placeholder="Street" onchange="preview_update('emp_street')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="emp_district"
                                            placeholder="District" onchange="preview_update('emp_district')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="emp_city"
                                            placeholder="City/Town" onchange="preview_update('emp_city')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="emp_postcode"
                                            placeholder="Postcode" onchange="preview_update('emp_postcode')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="emp_residency"
                                            placeholder="Residency" onchange="preview_update('emp_residency')">
                                    </div>
                                </div>
                            </div>
                            <ul class="list-inline pull-right">
                                <li>
                                    <button type="button" class="default-btn prev-step">Back</button>
                                </li>
                                <li>
                                    <button type="button" class="default-btn next-step">Next</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="bank_sort_code"
                                            placeholder="Sort code" onchange="preview_update('bank_sort_code')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="bank_account_number"
                                            placeholder="Account Number" onchange="preview_update('bank_account_number')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="bank_account_name"
                                            placeholder="Account Name" onchange="preview_update('bank_account_name')">
                                    </div>
                                </div>
                            </div>
                            <ul class="list-inline pull-right">
                                <li>
                                    <button type="button" class="default-btn prev-step">Back</button>
                                </li>
                                <li>
                                    <button type="button" class="default-btn next-step">Next</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step5">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="gross_annual_income"
                                            placeholder="Gross Annual Income"
                                            onchange="preview_update('gross_annual_income')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="replacement_loan"
                                            placeholder="Is this a replacement loan?"
                                            onchange="preview_update('replacement_loan')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Do you foresee a downturn in your financial position during the term of
                                            this agreement(including any Covid-19 related impact?</label>
                                        <input class="form-control" type="text" name="note" placeholder=""
                                            onchange="preview_update('note')">
                                    </div>
                                </div>
                            </div>
                            <ul class="list-inline pull-right">
                                <li>
                                    <button type="button" class="default-btn prev-step">Back</button>
                                </li>
                                <li>
                                    <button type="button" class="default-btn next-step">Next</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Vehicle Registration Number : <span
                                                class="summery_vehicle_registration_number"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mileage : <span class="summery_mileage"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Vehicle Price : <span class="summery_vehicle_price"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Deposit Amount : <span class="summery_deposit_amount"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Part Exchange Value : <span
                                                class="summery_part_exchange_value"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Settlement Figure : <span class="summery_settlement_figure"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Term of Agreement : <span class="summery_term_of_agreement"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Title : <span class="summery_title"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>First Name : <span class="summery_first_name"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Middle Name : <span class="summery_middle_name"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Last Name : <span class="summery_last_name"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email : <span class="summery_email"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Home Telephone : <span class="summery_telephone"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mobile : <span class="summery_mobile"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender : <span class="summery_gender"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>DOB : <span class="summery_dob"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nationality : <span class="summery_nationality"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Marital Status : <span class="summery_marital_status"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>No. of Dependants : <span class="summery_no_dependant"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Driving Licence : <span class="summery_driving_licence"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Post Code Lookup : <span class="summery_address"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Building Name : <span class="summery_building_name"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Building Number : <span class="summery_building_number"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Room/Floor : <span class="summery_building_floor"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Street : <span class="summery_street"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>District : <span class="summery_district"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>City/Town : <span class="summery_city"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Postcode : <span class="summery_postcode"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Residency : <span class="summery_residency"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Employer : <span class="summery_emp_name"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Occupation : <span class="summery_emp_occupation"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Occupation Basis : <span
                                                class="summery_emp_occupation_basis"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Occupation Type : <span class="summery_emp_occupation_type"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Employee Pincode Lookup : <span class="summery_emp_address"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Employee Building Name : <span
                                                class="summery_emp_building_name"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Employee Building Number : <span
                                                class="summery_emp_building_number"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Employee Room/Floor : <span
                                                class="summery_emp_building_floor"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Employee Street : <span class="summery_emp_street"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Employee District : <span class="summery_emp_district"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Employee City/Town : <span class="summery_emp_city"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Employee Postcode : <span class="summery_emp_postcode"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Employee Residency : <span class="summery_emp_residency"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Sort code : <span class="summery_bank_sort_code"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Account Number : <span class="summery_bank_account_number"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Account Name : <span class="summery_bank_account_name"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Gross Annual Income : <span
                                                class="summery_gross_annual_income"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Is this a replacement loan? : <span class="replacement_loan"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Note : <span class="summery_note"></span></label>
                                    </div>
                                </div>

                            </div>
                            <ul class="list-inline pull-right">
                                <input type="hidden" name="template_slug" value="{{ $web_content->template }}">
                                <input type="hidden" name="domain_slug" value="{{ $domain_slug }}">
                                <li>
                                    <button type="button" class="default-btn prev-step">Back</button>
                                </li>
                                <li>
                                    <button type="button" class="default-btn next-step"
                                        id="btnFinanceInvoice">Finish</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('assets/web/template/t8/js/wizard.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADwVAs3Cw91cxbvW2cztgbhvDavFI3Pro&libraries=places">
    </script>
    <script src="{{ asset('assets/web/js/jquery.geocomplete.min.js') }}"></script>
    <script>
        function preview_update(element) {
            if (element === 'term_of_agreement') {
                $(".summery_" + element).html($("#term_of_agreement").val());
            } else {
                $(".summery_" + element).html($("input[name=" + element + "]").val());
            }
        }

        let frmFinanceInvoice = $("#frmFinanceInvoice").validate({
            rules: {
                vehicle_registration_number: {
                    required: true
                },
                mileage: {
                    required: true
                },
                vehicle_price: {
                    required: true
                },
                title: {
                    required: true
                },
                first_name: {
                    required: true
                },
                middle_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                telephone: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 12
                },
                mobile: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 12
                },
                gender: {
                    required: true
                },
                dob: {
                    required: true
                },
                nationality: {
                    required: true
                },
                marital_status: {
                    required: true
                },
                no_dependant: {
                    required: true
                },
                driving_licence: {
                    required: true
                },
                address: {
                    required: true
                },
                building_name: {
                    required: true
                },
                building_number: {
                    required: true
                },
                building_floor: {
                    required: true
                },
                street: {
                    required: true
                },
                district: {
                    required: true
                },
                city: {
                    required: true
                },
                postcode: {
                    required: true
                },
                residency: {
                    required: true
                },
                emp_name: {
                    required: true
                },
                emp_occupation: {
                    required: true
                },
                emp_occupation_basis: {
                    required: true
                },
                emp_occupation_type: {
                    required: true
                },
                emp_address: {
                    required: true
                },
                emp_lat: {
                    required: true
                },
                emp_lng: {
                    required: true
                },
                emp_building_name: {
                    required: true
                },
                emp_building_number: {
                    required: true
                },
                emp_building_floor: {
                    required: true
                },
                emp_street: {
                    required: true
                },
                emp_district: {
                    required: true
                },
                emp_city: {
                    required: true
                },
                emp_postcode: {
                    required: true
                },
                emp_residency: {
                    required: true
                },
                bank_sort_code: {
                    required: true
                },
                bank_account_number: {
                    required: true
                },
                bank_account_name: {
                    required: true
                },
            },
            messages: {
                title: {
                    required: 'Please enter title'
                },
                first_name: {
                    required: 'Please enter first name'
                },
                middle_name: {
                    required: 'Please enter middle name'
                },
                last_name: {
                    required: 'Please enter last name'
                },
                email: {
                    required: 'Please enter email'
                },
                telephone: {
                    required: 'Please enter telephone'
                },
                mobile: {
                    required: 'Please enter mobile'
                },
                gender: {
                    required: 'Please enter gender'
                },
                dob: {
                    required: 'Please enter date of birth'
                },
                nationality: {
                    required: 'Please enter nationality'
                },
                marital_status: {
                    required: 'Please enter marital status'
                },
                no_dependant: {
                    required: 'Please enter no dependant'
                },
                driving_licence: {
                    required: 'Please enter driving licence'
                },
            }
        });

        $(".step-active").click(function() {
            if (!$("#frmFinanceInvoice").valid()) {
                return false;
            }
        });

        $("#address").geocomplete({
            details: "#address_div",
            detailsAttribute: "data-geo"
        }).bind("geocode:result", function(event, results) {
            for (var j = 0; j < results.address_components.length; j++) {
                for (var k = 0; k < results.address_components[j].types.length; k++) {
                    if (results.address_components[j].types[k] == "postal_code") {
                        $("#postcode").val(results.address_components[j].short_name);
                    }
                }
            }
        });

        $("#emp_address").geocomplete({
            details: "#emp_address_div",
            detailsAttribute: "data-geo"
        }).bind("geocode:result", function(event, results) {
            for (var j = 0; j < results.address_components.length; j++) {
                for (var k = 0; k < results.address_components[j].types.length; k++) {
                    if (results.address_components[j].types[k] == "postal_code") {
                        $("#emp_postcode").val(results.address_components[j].short_name);
                    }
                }
            }
        });

        $("#btnFinanceInvoice").click(function() {
            if ($("#frmFinanceInvoice").valid()) {
                var data = new FormData($('#frmFinanceInvoice')[0]);
                $("#btnFinanceInvoice").attr('disabled', true);
                $.ajax({
                    type: 'post',
                    data: data,
                    dataType: "json",
                    url: "{{ route('front.template.finance.application') }}",
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: addOverlay,
                    success: function(r) {
                        removeOverlay();
                        if (r.status == 200) {
                            toastr['success'](r.message, "success");
                            setTimeout(function() {
                                window.location.href =
                                    "{{ route('front.template.finance', $domain_slug) }}";
                            }, 1000);
                        } else {
                            toastr['error'](r.message, "error");
                            $("#btnFinanceInvoice").attr('disabled', false);
                        }
                    }
                });
            }
        });
        $('main').removeClass('home-page');
    </script>
@endsection
