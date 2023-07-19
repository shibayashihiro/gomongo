@extends('layouts.admin.app')
@section('h_style')
    <style>
        .kt-widget__label {
            text-transform: capitalize;
        }

        img.exrs-img {
            height: 215px;
        }
    </style>
@endsection

@section('content')
    <div class="portlet-toggler">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        {{print_title($title)}}
                    </h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        {!! $breadcrumb !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
                <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                    <i class="la la-close"></i>
                </button>

                <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="kt-portlet kt-portlet--height-fluid">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                            Personal Information
                                        </h3>
                                    </div>
                                </div>
                                <div class="kt-portlet__body kt-portlet__body--fit-y mt-4">
                                    <div class="col-md-12 row">
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label"><b>Registration
                                                    Number:</b> {{$data->vehicle_registration_number}}</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label"><b>Mileage:</b> {{$data->mileage}}</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label
                                                class="col-form-label"><b>Price:</b> {{place_currency($data->vehicle_price)}}
                                            </label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label"><b>Deposit
                                                    Price:</b> {{place_currency($data->deposit_amount)}}</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label"><b>Part Exchange
                                                    Value:</b> {{place_currency($data->part_exchange_value)}}</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label"><b>Settlement
                                                    Figure:</b> {{place_currency($data->settlement_figure)}}</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label"><b>Term of
                                                    agreement:</b> {{$data->term_of_agreement}}</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label"><b>Title:</b> {{$data->title}}</label>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label
                                                class="col-form-label"><b>Name:</b> {{$data->first_name.' '.$data->middle_name.' '.$data->last_name}}
                                            </label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label
                                                class="col-form-label"><b>Email:</b> {{$data->email}}
                                            </label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label
                                                class="col-form-label"><b>Telephone:</b> {{$data->telephone}}
                                            </label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label
                                                class="col-form-label"><b>Mobile:</b> {{$data->mobile}}
                                            </label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label
                                                class="col-form-label"><b>Gender:</b> {{ucfirst($data->gender)}}
                                            </label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label
                                                class="col-form-label"><b>Date of
                                                    Birth:</b> {{\Carbon\Carbon::parse($data->dob)->format('d-m-Y')}}
                                            </label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label
                                                class="col-form-label"><b>Nationality:</b> {{$data->nationality}}
                                            </label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label
                                                class="col-form-label"><b>Marital Status:</b> {{$data->marital_status}}
                                            </label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label
                                                class="col-form-label"><b>No Dependent:</b> {{$data->no_dependant}}
                                            </label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label
                                                class="col-form-label"><b>Driving
                                                    Licence:</b> {{$data->driving_licence}}
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            @if($data->status == 'contacted_broker')
                                                <form class="kt-form" id="frmMuscle"
                                                      action="{{route('admin.pending_finance.status_change')}}"
                                                      method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-form-label col-lg-3 col-sm-12">{{__('Status')}}</label>
                                                        <div class="col-md-6 col-sm-12">
                                                            <select class="form-control" name="status">
                                                                <option value="contacted_broker">Contacted Broker
                                                                </option>
                                                                <option value="approved">Approved</option>
                                                                <option value="declined">Declined</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3 col-sm-12">
                                                            <input type="hidden" value="{{$data->id}}"
                                                                   name="finance_id">
                                                            <button type="submit" class="btn btn-brand" id="btnSave">
                                                                <span class="kt-hidden-mobile">{{__('Save')}}</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="kt-portlet kt-portlet--height-fluid">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                            Address Information
                                        </h3>
                                    </div>
                                </div>
                                <div class="kt-portlet__body kt-portlet__body--fit-y mt-4">
                                    <div class="col-md-12 row">
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label"><b>Post Code Lookup:</b> {{$data->address}}
                                            </label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label"><b>Building Name:</b> {{$data->building_name}}
                                            </label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label
                                                class="col-form-label"><b>Building
                                                    Number:</b> {{$data->building_number}}
                                            </label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label"><b>Building
                                                    Floor:</b> {{$data->building_floor}}</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label"><b>Street:</b> {{$data->street}}</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label"><b>District:</b> {{$data->district}}</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label"><b>City/Town:</b> {{$data->city}}</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label"><b>Postcode:</b> {{$data->postcode}}</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label
                                                class="col-form-label"><b>Residency:</b> {{$data->residency}}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="kt-portlet kt-portlet--height-fluid">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                            Employement Information
                                        </h3>
                                    </div>
                                </div>
                                <div class="kt-portlet__body kt-portlet__body--fit-y mt-4">
                                    <div class="col-md-12 row">
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label"><b>Employer:</b> {{$data->emp_name}}</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label"><b>Occupation:</b> {{$data->emp_occupation}}
                                            </label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label
                                                class="col-form-label"><b>Occupation
                                                    Basis:</b> {{$data->emp_occupation_basis}}
                                            </label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label"><b>Occupation
                                                    Type:</b> {{$data->emp_occupation_type}}</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label"><b>Pincode Lookup:</b> {{$data->emp_address}}
                                            </label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label"><b>Building
                                                    Name:</b> {{$data->emp_building_name}}</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label"><b>Building
                                                    Number:</b> {{$data->emp_building_number}}</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label"><b>Building
                                                    Floor:</b> {{$data->emp_building_floor}}</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label
                                                class="col-form-label"><b>Street:</b> {{$data->emp_street}}
                                            </label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label
                                                class="col-form-label"><b>District:</b> {{$data->emp_district}}
                                            </label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label
                                                class="col-form-label"><b>City:</b> {{$data->emp_city}}
                                            </label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label
                                                class="col-form-label"><b>Postcode:</b> {{$data->emp_postcode}}
                                            </label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label
                                                class="col-form-label"><b>Residency:</b> {{$data->emp_residency}}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="kt-portlet kt-portlet--height-fluid">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                            Bank Details
                                        </h3>
                                    </div>
                                </div>
                                <div class="kt-portlet__body kt-portlet__body--fit-y mt-4">
                                    <div class="col-md-12 row">
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label"><b>Sort Code:</b> {{$data->bank_sort_code}}</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label"><b>Account Number:</b> {{$data->bank_account_number}}
                                            </label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label
                                                class="col-form-label"><b>Account Name:</b> {{$data->bank_account_name}}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="kt-portlet kt-portlet--height-fluid">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                            Affordability Information
                                        </h3>
                                    </div>
                                </div>
                                <div class="kt-portlet__body kt-portlet__body--fit-y mt-4">
                                    <div class="col-md-12 row">
                                        <div class="form-group col-md-6">
                                            <label class="col-form-label"><b>Gross Annual Income:</b> {{$data->gross_annual_income??'N/A'}}</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-form-label"><b>Is There Replacement Loan:</b> {{$data->replacement_loan??'N/A'}}
                                            </label>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label
                                                class="col-form-label"><b>Note:</b> {{$data->note??'N/A'}}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
