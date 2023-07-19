@extends('layouts.web.dashboard.app')

@section('header_css')
@endsection

@section('content')
    <section id="stock-content" class="wd-sl-slidebar">
        <div class="stock-top-blog">
            <div class="stock-head">
                <div class="st-title">
                    <h2>View complaint</h2>
                </div>
                <button type="button" class="add-stock-btn"
                        onclick="window.location.href='{{route('front.complaint_management.index')}}'">Back
                </button>
            </div>
        </div>
        <div class="wd-sl-view_compl">
            <div class="row">
                <div class="col-md-5">
                    <div class="main-view">
                        <div class="pro-details">
                            <div class="wd-slpro-dt-row">
                                <p><b>Subject:</b> <span>{{$complaints->subject}}</span></p>
                            </div>
                            <div class="wd-slpro-dt-row">
                                <p><b>Description:</b> <span>{{$complaints->description}}</span></p>
                            </div>
                            <div class="wd-slpro-dt-row">
                                <p><b>Assign Staff:</b> <span>{{$complaints->assign_staff}}</span></p>
                            </div>
                            <div class="wd-slpro-dt-row">
                                <p><b>Customer Name:</b><span>{{$complaints->customer_name}}</span></p>
                            </div>
                            <div class="wd-slpro-dt-row">
                                <p><b>Customer Contact Number:</b> <span>{{$complaints->customer_contact_number}}</span>
                                </p>
                            </div>
                            <div class="wd-slpro-dt-row">
                                <p class="mb-0"><b>Complaint Log Date:</b>
                                    <span>{{get_date_format($complaints->due_date, 'd/m/Y')}}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="complaint-note">
                        @foreach($complaints->notes as $item)
                            <div class="wd-sl-innernote">
                                <p class="mb-0">{{$item->note}}</p>
                                <p class="mb-0"><small>[ {{get_date_format($item->created_at, 'd/m/Y')}} ]</small></p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_script')
@endsection
