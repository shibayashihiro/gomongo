@extends('layouts.web.dashboard.app')

@section('header_css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/dashboard/css/style2.css')}}">
@endsection

@section('content')
    <section id="my-profile" class="wd-sl-slidebar">
        <div class="profile-head">
            <h2>My Profile</h2>
        </div>
        <div class="profile-body">
            <div class="pro-content">
                <div class="pro-img">
                    <span><img src="{{$user->profile_image}}"></span>
                    <h3>{{$user->name}}</h3>
                </div>
                <div class="pro-details">
                    <div class="pro-dt-row row">
                        <div class="col-md-4">
                            <p>Company Name</p>
                        </div>
                        <div class="col-md-8">
                            <strong>{{$user->company_name}}</strong>
                        </div>
                    </div>
                    <div class="pro-dt-row">
                        <div class="col-md-4">
                            <p>Email</p>
                        </div>
                        <div class="col-md-8">
                            <strong>{{$user->email}}</strong>
                        </div>
                    </div>
                    <div class="pro-dt-row">
                        <div class="col-md-4">
                            <p>Phone Number</p>
                        </div>
                        <div class="col-md-8">
                            <strong>{{$user->country_code.''.$user->mobile}}</strong>
                        </div>
                    </div>
                    <div class="pro-dt-row">
                        <div class="col-md-4">
                            <p>Address</p>
                        </div>
                        <div class="col-md-8">
                            <strong>{{$user->address}}</strong>
                        </div>
                    </div>
                    <div class="pro-dt-row">
                        <div class="col-md-4">
                            <p>Postcode</p>
                        </div>
                        <div class="col-md-8">
                            <strong>{{(!empty($user->postcode))?$user->postcode:'N/A'}}</strong>
                        </div>
                    </div>
                    <div class="pro-dt-row">
                        <div class="col-md-4">
                            <p>Company Registration Number</p>
                        </div>
                        <div class="col-md-8">
                            <strong>{{(!empty($user->cmp_reg_number))?$user->cmp_reg_number:'N/A'}}</strong>
                        </div>
                    </div>
                    <div class="pro-dt-row">
                        <div class="col-md-4">
                            <p>FCA Registration Number</p>
                        </div>
                        <div class="col-md-8">
                            <strong>{{(!empty($user->fca_reg_number))?$user->fca_reg_number:'N/A'}}</strong>
                        </div>
                    </div>
                    <div class="pro-dt-row">
                        <div class="col-md-4">
                            <p>VAT Number</p>
                        </div>
                        <div class="col-md-8">
                            <strong>{{(!empty($user->vat_number))?$user->vat_number:'N/A'}}</strong>
                        </div>
                    </div>
                    <div class="pro-dt-row">
                        <div class="col-md-4">
                            <p>ICO Number</p>
                        </div>
                        <div class="col-md-8">
                            <strong>{{(!empty($user->ico_number))?$user->ico_number:'N/A'}}</strong>
                        </div>
                    </div>
                    <div class="pro-dt-row edit-btn">
                        <a href="{{route('front.edit_profile')}}">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_script')
@endsection
