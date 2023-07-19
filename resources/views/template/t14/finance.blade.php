@extends('layouts.template.t14.app')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/template/t14/css/wizard.css')}}">
@endsection

@section('content')
    <section id="bannerot">
        <div class="container">
            <div class="wd-sl-bnr_title">
                <h3>Finanace Application Form</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat.  </p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('front.template.home', $domain_slug)}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Finanace Application Form</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section id="wizard">
        <div class="container">
            <div class="wd-sl-wizard">
                <div class="row">
                    <div class="col-md-4">
                        <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-step1-tab" data-toggle="pill" href="#v-pills-step1" role="tab" aria-controls="v-pills-step1" aria-selected="true"><span>1. Personal Informations</span></a>
                            <a class="nav-link" id="v-pills-step2-tab" data-toggle="pill" href="#v-pills-step2" role="tab" aria-controls="v-pills-step2" aria-selected="false"><span>2. Address Information</span></a>
                            <a class="nav-link" id="v-pills-step3-tab" data-toggle="pill" href="#v-pills-step3" role="tab" aria-controls="v-pills-step3" aria-selected="false"><span>3. Employement Information</span></a>
                            <a class="nav-link" id="v-pills-step4-tab" data-toggle="pill" href="#v-pills-step4" role="tab" aria-controls="v-pills-step4" aria-selected="false"><span>4. Bank Details</span></a>
                            <a class="nav-link" id="v-pills-step5-tab" data-toggle="pill" href="#v-pills-step5" role="tab" aria-controls="v-pills-step5" aria-selected="false"><span>5. Affordability Information</span></a>
                            <a class="nav-link" id="v-pills-step6-tab" data-toggle="pill" href="#v-pills-step6" role="tab" aria-controls="v-pills-step6" aria-selected="false"><span>6. Here is Summary</span></a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form class="wd-sl-wform" id="frmFinanceInvoice" name="frmFinanceInvoice" method="post"
                              action="javascript:;"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-step1" role="tabpanel" aria-labelledby="v-pills-step1-tab">

                                    <h6>Personal Information</h6>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input class="form-control" type="text" name="vehicle_registration_number" placeholder="Vehicle Registration Number" onchange="preview_update('vehicle_registration_number')">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input class="form-control" type="text" name="mileage" placeholder="Mileage" onchange="preview_update('mileage')">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input class="form-control" type="text" name="vehicle_price" placeholder="Vehicle Price" onchange="preview_update('vehicle_price')">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input class="form-control" type="text" name="deposit_amount" placeholder="Deposit Amount" onchange="preview_update('deposit_amount')">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input class="form-control" type="text" name="part_exchange_value" placeholder="Part Exchange Value" onchange="preview_update('part_exchange_value')">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input class="form-control" type="text" name="settlement_figure" placeholder="Settlement Figure" onchange="preview_update('settlement_figure')">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <select class="form-control" name="term_of_agreement" id="term_of_agreement" onchange="preview_update('term_of_agreement')">
                                                @for($i=12; $i <= 60; $i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" name="title" class="form-control" placeholder="Title"
                                                   onchange="preview_update('title')">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control"
                                                   name="first_name"
                                                   placeholder="First Name" onchange="preview_update('first_name')">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control"
                                                   name="middle_name"
                                                   placeholder="Middle Name" onchange="preview_update('middle_name')">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="last_name"
                                                   placeholder="Last Name" onchange="preview_update('last_name')">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="email" class="form-control"
                                                   name="email" placeholder="Email"
                                                   onchange="preview_update('email')">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control"
                                                   name="telephone"
                                                   placeholder="Home Telephone" onchange="preview_update('telephone')">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control"
                                                   name="mobile" placeholder="Mobile"
                                                   onchange="preview_update('mobile')">
                                        </div>
                                        <div class="form-group col-md-6 wizard_col-grid">
                                            <label>Gender</label>
                                            <p class="mb-0">
                                                <input type="radio" id="male" name="gender"
                                                       onchange="preview_update('gender')" checked value="Male">
                                                <label for="male">Male</label>
                                            </p>
                                            <p class="mb-0">
                                                <input type="radio" id="female" name="gender"
                                                       onchange="preview_update('gender')" value="Female">
                                                <label for="female">Female</label>
                                            </p>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="date" class="form-control"
                                                   name="dob" placeholder="Date Of Birth"
                                                   onchange="preview_update('dob')">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control"
                                                   name="nationality"
                                                   placeholder="Nationality" onchange="preview_update('nationality')">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control"
                                                   name="marital_status"
                                                   placeholder="Marital Status"
                                                   onchange="preview_update('marital_status')">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control"
                                                   name="no_dependant"
                                                   placeholder="No. of Dependants"
                                                   onchange="preview_update('no_dependant')">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control"
                                                   name="driving_licence"
                                                   placeholder="Driving Licence"
                                                   onchange="preview_update('driving_licence')">
                                        </div>
                                    </div>
                                    <div class="wd-sl-wizardbtn">
                                        <button type="button" class="common-btn next-step" id="btnNextOne"
                                                data-tab="#v-pills-step2-tab">Save & Next
                                        </button>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="v-pills-step2" role="tabpanel" aria-labelledby="v-pills-step2-tab">

                                    <h6>Address Information</h6>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control"
                                                   name="address"
                                                   placeholder="Post Code Lookup" onchange="preview_update('address')">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control"
                                                   name="building_name"
                                                   placeholder="Building Name"
                                                   onchange="preview_update('building_name')">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control"
                                                   name="building_number"
                                                   placeholder="Building Number"
                                                   onchange="preview_update('building_number')">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control"
                                                   name="building_floor"
                                                   placeholder="Room/Floor" onchange="preview_update('building_floor')">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control"
                                                   name="street" placeholder="Street"
                                                   onchange="preview_update('street')">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="district"
                                                   placeholder="District"
                                                   onchange="preview_update('district')">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control"
                                                   name="city" placeholder="City/Town"
                                                   onchange="preview_update('city')">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="postcode"
                                                   placeholder="Postcode"
                                                   onchange="preview_update('postcode')">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="residency"
                                                   placeholder="Residency" onchange="preview_update('residency')">
                                        </div>
                                    </div>
                                    <div class="wd-sl-wizardbtn">
                                        <a href="javascript:;" class="wd-sl-backbtn prev-step"
                                           data-tab="#v-pills-step1-tab">
                                            <svg class="mr-1" width="25" height="16" viewBox="0 0 25 16" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M25 7H3.83L9.42 1.41L8 0L0 8L8 16L9.41 14.59L3.83 9H25V7Z"
                                                      fill="url(#paint0_linear_333_4370)"/>
                                                <defs>
                                                    <linearGradient id="paint0_linear_333_4370" x1="12.5" y1="0"
                                                                    x2="12.5" y2="16" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#3C94FC"/>
                                                        <stop offset="1" stop-color="#0460E7"/>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                            Back</a>
                                        <button type="button" class="common-btn next-step" id="btnNextOne"
                                                data-tab="#v-pills-step3-tab">Save & Next
                                        </button>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="v-pills-step3" role="tabpanel" aria-labelledby="v-pills-step3-tab">

                                    <h6>Employement Information</h6>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" name="emp_name"
                                                   placeholder="Employer"
                                                   onchange="preview_update('emp_name')">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control"
                                                   name="emp_occupation"
                                                   placeholder="Occupation" onchange="preview_update('emp_occupation')">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control"
                                                   name="emp_occupation_basis"
                                                   placeholder="Occupation Basis"
                                                   onchange="preview_update('emp_occupation_basis')">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control"
                                                   name="emp_occupation_type"
                                                   placeholder="Occupation Type"
                                                   onchange="preview_update('emp_occupation_type')">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control"
                                                   name="emp_address"
                                                   placeholder="Pincode Lookup"
                                                   onchange="preview_update('emp_address')">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control"
                                                   name="emp_building_name"
                                                   placeholder="Building Name"
                                                   onchange="preview_update('emp_building_name')">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control"
                                                   name="emp_building_number"
                                                   placeholder="Building Number"
                                                   onchange="preview_update('emp_building_number')">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control"
                                                   name="emp_building_floor"
                                                   placeholder="Room/Floor"
                                                   onchange="preview_update('emp_building_floor')">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="emp_street"
                                                   placeholder="Street"
                                                   onchange="preview_update('emp_street')">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="emp_district"
                                                   placeholder="District" onchange="preview_update('emp_district')">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="emp_city"
                                                   placeholder="City/Town"
                                                   onchange="preview_update('emp_city')">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="emp_postcode"
                                                   placeholder="Postcode" onchange="preview_update('emp_postcode')">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" name="emp_residency"
                                                   placeholder="Residency" onchange="preview_update('emp_residency')">
                                        </div>
                                    </div>
                                    <div class="wd-sl-wizardbtn">
                                        <a href="javascript:;" class="wd-sl-backbtn prev-step"
                                           data-tab="#v-pills-step2-tab">
                                            <svg class="mr-1" width="25" height="16" viewBox="0 0 25 16" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M25 7H3.83L9.42 1.41L8 0L0 8L8 16L9.41 14.59L3.83 9H25V7Z"
                                                      fill="url(#paint0_linear_333_5826)"/>
                                                <defs>
                                                    <linearGradient id="paint0_linear_333_5826" x1="12.5" y1="0"
                                                                    x2="12.5" y2="16" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#3C94FC"/>
                                                        <stop offset="1" stop-color="#0460E7"/>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                            Back</a>
                                        <button type="button" class="common-btn next-step" id="btnNextOne"
                                                data-tab="#v-pills-step4-tab">Save & Next
                                        </button>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="v-pills-step4" role="tabpanel" aria-labelledby="v-pills-step4-tab">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control"
                                                   name="bank_sort_code"
                                                   placeholder="Sort code" onchange="preview_update('bank_sort_code')">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control"
                                                   name="bank_account_number"
                                                   placeholder="Account Number"
                                                   onchange="preview_update('bank_account_number')">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control"
                                                   name="bank_account_name"
                                                   placeholder="Account Name"
                                                   onchange="preview_update('bank_account_name')">
                                        </div>

                                    </div>
                                    <div class="wd-sl-wizardbtn">
                                        <a href="javascript:;" class="wd-sl-backbtn prev-step"
                                           data-tab="#v-pills-step3-tab">
                                            <svg class="mr-1" width="25" height="16" viewBox="0 0 25 16" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M25 7H3.83L9.42 1.41L8 0L0 8L8 16L9.41 14.59L3.83 9H25V7Z"
                                                      fill="url(#paint0_linear_333_5826)"/>
                                                <defs>
                                                    <linearGradient id="paint0_linear_333_5826" x1="12.5" y1="0"
                                                                    x2="12.5" y2="16"
                                                                    gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#3C94FC"/>
                                                        <stop offset="1" stop-color="#0460E7"/>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                            Back</a>
                                        <button type="button" class="common-btn next-step" id="btnNextOne"
                                                data-tab="#v-pills-step5-tab">Save & Next
                                        </button>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-step5" role="tabpanel" aria-labelledby="v-pills-step5-tab">

                                    <h6>Affordability Information</h6>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control"
                                                   name="gross_annual_income"
                                                   placeholder="Gross Annual Income"
                                                   onchange="preview_update('gross_annual_income')">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control"
                                                   name="replacement_loan"
                                                   placeholder="Is this a replacement loan?"
                                                   onchange="preview_update('replacement_loan')">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <p>Do you foresee a downturn in your financial position during the term of
                                                this agreement(including any Covid-19 related impact?</p>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" name="note" placeholder=""
                                                   onchange="preview_update('note')">
                                        </div>
                                    </div>
                                    <div class="wd-sl-wizardbtn">
                                        <a href="javascript:;" class="wd-sl-backbtn prev-step"
                                           data-tab="#v-pills-step4-tab">
                                            <svg class="mr-1" width="25" height="16" viewBox="0 0 25 16" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M25 7H3.83L9.42 1.41L8 0L0 8L8 16L9.41 14.59L3.83 9H25V7Z"
                                                      fill="url(#paint0_linear_333_6093)"/>
                                                <defs>
                                                    <linearGradient id="paint0_linear_333_6093" x1="12.5" y1="0"
                                                                    x2="12.5" y2="16" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#3C94FC"/>
                                                        <stop offset="1" stop-color="#0460E7"/>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                            Back</a>
                                        <button type="button" class="common-btn next-step" id="btnNextOne"
                                                data-tab="#v-pills-step6-tab">Save & Next
                                        </button>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="v-pills-step6" role="tabpanel" aria-labelledby="v-pills-step6-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Vehicle Registration Number : <span class="summery_vehicle_registration_number"></span></label>
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
                                                <label>Part Exchange Value : <span class="summery_part_exchange_value"></span></label>
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
                                                <label>Marital Status : <span
                                                        class="summery_marital_status"></span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>No. of Dependants : <span
                                                        class="summery_no_dependant"></span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Driving Licence : <span
                                                        class="summery_driving_licence"></span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Post Code Lookup : <span class="summery_address"></span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Building Name : <span
                                                        class="summery_building_name"></span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Building Number : <span
                                                        class="summery_building_number"></span></label>
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
                                                <label>Occupation Type : <span
                                                        class="summery_emp_occupation_type"></span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Employee Pincode Lookup : <span
                                                        class="summery_emp_address"></span></label>
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
                                                <label>Employee Street : <span
                                                        class="summery_emp_street"></span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Employee District : <span
                                                        class="summery_emp_district"></span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Employee City/Town : <span
                                                        class="summery_emp_city"></span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Employee Postcode : <span
                                                        class="summery_emp_postcode"></span></label>
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
                                                <label>Account Number : <span
                                                        class="summery_bank_account_number"></span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Account Name : <span
                                                        class="summery_bank_account_name"></span></label>
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
                                                <label>Is this a replacement loan? : <span
                                                        class="replacement_loan"></span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Note : <span class="summery_note"></span></label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="wd-sl-wizardbtn ">
                                        <input type="hidden" name="template_slug" value="{{$web_content->template}}">
                                        <input type="hidden" name="domain_slug" value="{{$domain_slug}}">
                                        <a href="javascript:;" class="wd-sl-backbtn prev-step"
                                           data-tab="#v-pills-step5-tab">
                                            <svg class="mr-1" width="25" height="16" viewBox="0 0 25 16" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M25 7H3.83L9.42 1.41L8 0L0 8L8 16L9.41 14.59L3.83 9H25V7Z"
                                                      fill="url(#paint0_linear_333_6093)"/>
                                                <defs>
                                                    <linearGradient id="paint0_linear_333_6093" x1="12.5" y1="0"
                                                                    x2="12.5" y2="16" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#3C94FC"/>
                                                        <stop offset="1" stop-color="#0460E7"/>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                            Back</a>
                                        <button type="submit" class="common-btn" id="btnFinanceInvoice">Finish</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{asset('assets/web/template/t14/js/wizard.js')}}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADwVAs3Cw91cxbvW2cztgbhvDavFI3Pro&libraries=places"></script>
    <script src="{{asset('assets/web/js/jquery.geocomplete.min.js')}}"></script>
    <script>
        $(".next-step").click(function () {
            let tab = $(this).data('tab');
            $(tab).trigger('click');
        });
        $(".prev-step").click(function () {
            let tab = $(this).data('tab');
            $(tab).trigger('click');
        });
        $(".nav-pills a").click(function () {
            if (!$("#frmFinanceInvoice").valid()) {
                return false;
            }
        });

        function preview_update(element) {
            if (element === 'gender') {
                $(".summery_" + element).html($("input[name=" + element + "]:checked").val());
            } else if (element === 'term_of_agreement') {
                $(".summery_" + element).html($("#term_of_agreement").val());
            }  else {
                $(".summery_" + element).html($("input[name=" + element + "]").val());
            }
        }

        let frmFinanceInvoice = $("#frmFinanceInvoice").validate({
            rules: {
                vehicle_registration_number: {required: true},
                mileage: {required: true},
                vehicle_price: {required: true},
                title: {required: true},
                first_name: {required: true},
                middle_name: {required: true},
                last_name: {required: true},
                email: {required: true, email: true},
                telephone: {required: true, number: true, minlength: 10, maxlength: 12},
                mobile: {required: true, number: true, minlength: 10, maxlength: 12},
                gender: {required: true},
                dob: {required: true},
                nationality: {required: true},
                marital_status: {required: true},
                no_dependant: {required: true},
                driving_licence: {required: true},
                address: {required: true},
                building_name: {required: true},
                building_number: {required: true},
                building_floor: {required: true},
                street: {required: true},
                district: {required: true},
                city: {required: true},
                postcode: {required: true},
                residency: {required: true},
                emp_name: {required: true},
                emp_occupation: {required: true},
                emp_occupation_basis: {required: true},
                emp_occupation_type: {required: true},
                emp_address: {required: true},
                emp_lat: {required: true},
                emp_lng: {required: true},
                emp_building_name: {required: true},
                emp_building_number: {required: true},
                emp_building_floor: {required: true},
                emp_street: {required: true},
                emp_district: {required: true},
                emp_city: {required: true},
                emp_postcode: {required: true},
                emp_residency: {required: true},
                bank_sort_code: {required: true},
                bank_account_number: {required: true},
                bank_account_name: {required: true},
            },
            messages: {
                title: {required: 'Please enter title'},
                first_name: {required: 'Please enter first name'},
                middle_name: {required: 'Please enter middle name'},
                last_name: {required: 'Please enter last name'},
                email: {required: 'Please enter email'},
                telephone: {required: 'Please enter telephone'},
                mobile: {required: 'Please enter mobile'},
                gender: {required: 'Please enter gender'},
                dob: {required: 'Please enter date of birth'},
                nationality: {required: 'Please enter nationality'},
                marital_status: {required: 'Please enter marital status'},
                no_dependant: {required: 'Please enter no dependant'},
                driving_licence: {required: 'Please enter driving licence'},
            }
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
        $("#emp_address").geocomplete({
            details: "#emp_address_div",
            detailsAttribute: "data-geo"
        }).bind("geocode:result", function (event, results) {
            for (var j = 0; j < results.address_components.length; j++) {
                for (var k = 0; k < results.address_components[j].types.length; k++) {
                    if (results.address_components[j].types[k] == "postal_code") {
                        $("#emp_postcode").val(results.address_components[j].short_name);
                    }
                }
            }
        });
        $("#btnFinanceInvoice").click(function () {
            if ($("#frmFinanceInvoice").valid()) {
                var data = new FormData($('#frmFinanceInvoice')[0]);
                $("#btnFinanceInvoice").attr('disabled', true);
                $.ajax({
                    type: 'post',
                    data: data,
                    dataType: "json",
                    url: "{{route('front.template.finance.application')}}",
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: addOverlay,
                    success: function (r) {
                        removeOverlay();
                        if (r.status == 200) {
                            toastr['success'](r.message, "success");
                            setTimeout(function () {
                                window.location.href = "{{route('front.template.finance', $domain_slug)}}";
                            }, 1000);
                        } else {
                            toastr['error'](r.message, "error");
                            $("#btnFinanceInvoice").attr('disabled', false);
                        }
                    }
                });
            }
        });
    </script>
@endsection
