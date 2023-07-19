@extends('layouts.template.t10.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection

@section('content')
    <section id="home-banner" class="home_slider_image"
        style="background-image: url({{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'image')) }}) !important;">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-fir-sec">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','slider',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'Image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="banner-cont">
                        <h3 class="home_slider_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'title') }}
                        </h3>
                        <p class="home_slider_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'sub_title') }}
                        </p>
                    </div>
                </div>
                <div class="col-md-7"></div>
            </div>
        </div>
    </section>
    <div class="banner-form container">
        <form name="frmSearch" id="frmSearch" action="{{ route('front.template.stock_list', $domain_slug) }}">
            <div class="form-row row">
                <div class="form-box col">
                    <select id="make" name="make">
                        <option value="">Make All</option>
                        @foreach ($make as $key => $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-box col">
                    <select id="model_list" name="modal">
                        <option value="">Model Any</option>
                    </select>
                </div>
                <!-- <div class="form-box price col">
                                <div class="d-flex justify-content-between">
                                    <label>Min price</label>
                                    <label>Max price</label>
                                </div>
                                <div class="slider-wrapper">
                                    <input class="input-range" data-slider-id='ex12cSlider' type="text"
                                           data-slider-step="1" data-slider-value="{{ request()->min_max_price }}"
                                           data-slider-min="0"
                                           data-slider-max="{{ $max_price }}" data-slider-range="true"
                                           data-slider-tooltip_split="true" name="min_max_price"/>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>£0</span>
                                    <span>£{{ $max_price }}</span>
                                </div>
                            </div> -->
                <x-forms.price-selector :maxPrice="$max_price" page="home" parentClass="form-box price col" />

                <div class="form-box action col">
                    <button class="y-btn">Search Cars</button>
                </div>
            </div>
        </form>
    </div>
    {{-- <section id="types">
        <div class="container-fluid">
            <div class="wd-sl-sectcontent text-center">
                <h1>Browse Car</h1>
                <span>Categories Type</span>
                <h2>Browse By Type Cars</h2>
            </div>
            <div class="row wd-sl-typeofcars">
                <div class="col">
                    @if (is_login_for_edit() == 1)
                        <div class="wd-edit-fir-sec">
                            <a class="wd-edit-btn" href="javascript:;"
                                onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','car_category1',{{ json_encode(['Title' => 'text', 'Image' => 'file']) }})"><img
                                    src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                        </div>
                    @endif
                    <img src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'car_category1', 'image')) }}"
                        class="home_car_category1_image">
                    <span
                        class="home_car_category1_title">{{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'car_category1', 'title') }}</span>
                </div>
                <div class="col">
                    @if (is_login_for_edit() == 1)
                        <div class="wd-edit-fir-sec">
                            <a class="wd-edit-btn" href="javascript:;"
                                onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','car_category2',{{ json_encode(['Title' => 'text', 'Image' => 'file']) }})"><img
                                    src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                        </div>
                    @endif
                    <img src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'car_category2', 'image')) }}"
                        class="home_car_category2_image">
                    <span
                        class="home_car_category2_title">{{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'car_category2', 'title') }}</span>
                </div>
                <div class="col">
                    @if (is_login_for_edit() == 1)
                        <div class="wd-edit-fir-sec">
                            <a class="wd-edit-btn" href="javascript:;"
                                onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','car_category3',{{ json_encode(['Title' => 'text', 'Image' => 'file']) }})"><img
                                    src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                        </div>
                    @endif
                    <img src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'car_category3', 'image')) }}"
                        class="home_car_category3_image">
                    <span
                        class="home_car_category3_title">{{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'car_category3', 'title') }}</span>
                </div>
                <div class="col">
                    @if (is_login_for_edit() == 1)
                        <div class="wd-edit-fir-sec">
                            <a class="wd-edit-btn" href="javascript:;"
                                onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','car_category4',{{ json_encode(['Title' => 'text', 'Image' => 'file']) }})"><img
                                    src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                        </div>
                    @endif
                    <img src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'car_category4', 'image')) }}"
                        class="home_car_category4_image">
                    <span
                        class="home_car_category4_title">{{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'car_category4', 'title') }}</span>
                </div>
                <div class="col">
                    @if (is_login_for_edit() == 1)
                        <div class="wd-edit-fir-sec">
                            <a class="wd-edit-btn" href="javascript:;"
                                onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','car_category5',{{ json_encode(['Title' => 'text', 'Image' => 'file']) }})"><img
                                    src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                        </div>
                    @endif
                    <img src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'car_category5', 'image')) }}"
                        class="home_car_category5_image">
                    <span
                        class="home_car_category5_title">{{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'car_category5', 'title') }}</span>
                </div>
                <div class="col">
                    @if (is_login_for_edit() == 1)
                        <div class="wd-edit-fir-sec">
                            <a class="wd-edit-btn" href="javascript:;"
                                onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','car_category6',{{ json_encode(['Title' => 'text', 'Image' => 'file']) }})"><img
                                    src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                        </div>
                    @endif
                    <img src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'car_category6', 'image')) }}"
                        class="home_car_category6_image">
                    <span
                        class="home_car_category6_title">{{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'car_category6', 'title') }}</span>
                </div>
            </div>
        </div>
    </section> --}}
    <section id="aboutus">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-abt-us-lower">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','about_us',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text', 'Description' => 'textarea', 'image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 text-center"><img class="home_about_us_image"
                        src="{{ asset(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'image')) }}">
                </div>
                <div class="col-md-6 my-auto">
                    <div class="wd-sl-sectcontent text-center">
                        <h1 class="home_about_us_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'title') }}
                        </h1>
                        <span
                            class="home_about_us_sub_title">{{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'sub_title') }}</span>
                        <h2 class="home_about_us_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'title') }}
                        </h2>
                    </div>
                    <p class="home_about_us_description">{!! nl2br(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'description')) !!}</p>
                </div>

            </div>

        </div>
    </section>
    <section id="services">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-our-ser-t4">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container-fluid">
            <div class="wd-sl-sectcontent text-center">
                <h1 class="home_our_services_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'title') }}
                </h1>
                <span
                    class="home_our_services_title">{{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'title') }}</span>
                <h2 class="home_our_services_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'sub_title') }}
                </h2>
            </div>
            <div class="wd-sl-services">
                <div class="row services_div">
                    @foreach ($web_content->services as $service)
                        <div class="col-md-4 item-{{ $service->id }}">
                            @if (is_login_for_edit() == 1)
                                <div class="services-action-div">
                                    <a href="javascript:;" class="service-action-remove"
                                        onclick="remove_items({{ $service->id }},'our_services_item','item-{{ $service->id }}')"><i
                                            class="fa fa-trash"></i></a>
                                    <a herf="javascript:;" class="service-action-edit"
                                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services_item',{{ json_encode(['Service Title' => 'text', 'Service Description' => 'textarea', 'Service Image' => 'file']) }},{{ $service->id }})"><i
                                            class="fa fa-edit"></i></a>
                                </div>
                            @endif
                            <div class="wd-sl-servercard">
                                <img src="{{ checkFileExist($service->image) }}" width="100">
                                <div class="service-content">
                                    <h6>{{ $service->title }}</h6>
                                    <p>{{ $service->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if (is_login_for_edit() == 1)
                        <div class="col-md-4 service-add-btn-t10">
                            <div class="wd-sl-servercard">
                                <div class="service-content">
                                    <a href="javascript:;"
                                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services_item',{{ json_encode(['Service Title' => 'text', 'Service Description' => 'textarea', 'Service Image' => 'file']) }})"><i
                                            class="fa fa-plus"></i>
                                        <h6>Add Services</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section id="Testimonial">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="wd-sl-sectcontent text-center">
            <h1 class="home_testimonials_title">
                {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'title') }}
            </h1>
            <span
                class="home_testimonials_sub_title">{{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'sub_title') }}</span>
            <h2 class="home_testimonials_title">
                {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'title') }}
            </h2>
        </div>
        <div class="bgimg">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="bluebg">
                            <h5>What Our Customer <br> Says?</h5>
                            <img src="{{ asset('assets/web/template/t10/images/test-car.png') }}">
                        </div>
                    </div>
                    <div class="col-md-6 testimonial_div">
                        <div class="owl-carousel owl-theme owl-test">
                            @foreach ($web_content->testimonial as $testimonial)
                                <div class="item testimonial-item-{{ $testimonial->id }}">
                                    @if (is_login_for_edit() == 1)
                                        <div class="testimonial-action-div">
                                            <a href="javascript:;" class="testimonial-action-remove"
                                                onclick="remove_items({{ $testimonial->id }},'testimonials_item','testimonial-item-{{ $testimonial->id }}')"><i
                                                    class="fa fa-trash"></i></a>
                                            <a herf="javascript:;" class="testimonial-action-edit"
                                                onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials_item',{{ json_encode(['Title' => 'text', 'Description' => 'textarea', 'Label' => 'text', 'Author Name' => 'text', 'Author Image' => 'file']) }},{{ $testimonial->id }})"><i
                                                    class="fa fa-edit"></i></a>
                                        </div>
                                    @endif
                                    <div class="card">
                                        <div class="wd-sl-testcardinner">
                                            <p>{{ $testimonial->description }}</p>
                                            <div class="wd-sl-reviews">
                                                <img src="{{ checkFileExist($testimonial->author_image) }}">
                                                <div class="wd-sl-nmrv">
                                                    <h6>{{ $testimonial->author_name }}</h6>
                                                    <i>{{ $testimonial->label }}</i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="item testimonial-action-add-btn-t10">
                                <div class="card">
                                    <a herf="javascript:;"
                                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials_item',{{ json_encode(['Title' => 'text', 'Description' => 'textarea', 'Label' => 'text', 'Author Name' => 'text', 'Author Image' => 'file']) }})"><i
                                            class="fa fa-plus"></i>
                                        <h6>Add Testimonial</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="stock">
        {{-- @if (is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_recent_stock',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif --}}
        <div class="container-fluid">
            <div class="wd-sl-sectcontent text-center">
                <h1 class="home_our_recent_stock_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'title') }}
                </h1>
                <span
                    class="home_our_recent_stock_sub_title">{{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'sub_title') }}</span>
                <h2 class="home_our_recent_stock_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'title') }}
                </h2>
            </div>
            <div class="wd-sl-stockdetails">
                {{-- <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-seller-tab" data-toggle="pill" href="#pills-seller"
                            role="tab" aria-controls="pills-seller" aria-selected="true">Best Seller</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-vehicle-tab" data-toggle="pill" href="#pills-vehicle"
                            role="tab" aria-controls="pills-vehicle" aria-selected="false">NEW vehicle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-feature-tab" data-toggle="pill" href="#pills-feature"
                            role="tab" aria-controls="pills-feature" aria-selected="false">Featured</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-offer-tab" data-toggle="pill" href="#pills-offer" role="tab"
                            aria-controls="pills-offer" aria-selected="false">Special offers</a>
                    </li>
                </ul> --}}
                <div class="tab-content pt-5 mt-5 mb-3" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-seller" role="tabpanel"
                        aria-labelledby="pills-seller-tab">
                        <div class="row stock_div">
                            @foreach ($stocks as $key => $value)
                                @if ($key < 6)
                                    @php
                                        $images = explode(',', $value->images);
                                        $stockImg = '';
                                        if (!empty($images) && isset($images[0])) {
                                            $stockImg = $images[0];
                                        }
                                    @endphp
                                    <div class="col-md-4 stock-item-{{ $value->id }}">
                                        {{-- @if (is_login_for_edit() == 1)
                                        <div class="stock-action-div">
                                            <a href="javascript:;" class="stock-action-remove"
                                               onclick="remove_items({{$value->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                                    class="fa fa-trash"></i></a>
                                            <a herf="javascript:;" class="stock-action-edit"
                                               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                                    class="fa fa-edit"></i></a>
                                        </div>
                                    @endif --}}
                                        <div class="card">
                                            <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}"><img src="{{ checkFileExist($stockImg) }}"></a>
                                            <h5>{{ $value->make }} &nbsp;£<strong>{{ number_format($value->price) }}</strong></h5>
                                            <p>{{$value->attention_grabber}}</p>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <span>CATEGORY : </span>
                                                    <span>{{ $value->category }}</span>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <span>TRANSMISSION : </span>
                                                    <span>{{ $value->transmission }}</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <span>COLOUR</span>
                                                    <span>{{ $value->colour }}</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <span>MILEAGE</span>
                                                    <span>{{ $value->mileage }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            {{-- @if (is_login_for_edit() == 1)
                                <div class="col-md-4 stock-action-add-more">
                                    <div class="wd-md-our-work-blog-img-t10">
                                        <a href="javascript:;"
                                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}})"><i
                                                class="fa fa-plus"></i>
                                            <h6>Add Stock</h6>
                                        </a>
                                    </div>
                                </div>
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="aboutus">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','offer',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-6 my-auto">
                    <div class="wd-sl-sectcontent text-center">
                        <h1 class="home_offer_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'title') }}
                        </h1>
                        <h2 class="home_offer_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'title') }}
                        </h2>
                    </div>
                    <p class="home_offer_sub_title">{!! nl2br(get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'sub_title')) !!}</p>
                    <div class="wd-sl-commonbtn">
                        {{-- <button class="y-btn mt-5">Read More</button> --}}
                    </div>
                </div>
                <div class="col-md-6 text-center"><img
                        src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'image')) }}"
                        class="home_offer_image">
                </div>
            </div>

        </div>
    </section>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"></script>
    @include('template.modal.modal_script')
    <script>
        (function($) {
            $(document).ready(function() {
                $('.input-range').each(function() {
                    var value = $(this).attr('data-slider-value');
                    var separator = value.indexOf(',');
                    if (separator !== -1) {
                        value = value.split(',');
                        value.forEach(function(item, i, arr) {
                            arr[i] = parseFloat(item);
                        });
                    } else {
                        value = parseFloat(value);
                    }
                    $(this).slider({
                        formatter: function(value) {
                            console.log(value);
                            return '$' + value;
                        },
                        min: parseFloat($(this).attr('data-slider-min')),
                        max: parseFloat($(this).attr('data-slider-max')),
                        range: $(this).attr('data-slider-range'),
                        value: value,
                        tooltip_split: $(this).attr('data-slider-tooltip_split'),
                        tooltip: $(this).attr('data-slider-tooltip')
                    });
                });

            });
        })(jQuery);
    </script>
@endsection
