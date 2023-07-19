@extends('layouts.template.t1.app')

@section('style')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/web/template/t1/vendors/owl.carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
    <style>
        .text-primary {
            color: var(--primary) !important;
        }

        .bg-secondary {
            background-color: var(--secondary) !important;
        }
    </style>
@endsection

@section('content')
    @php
        $image = get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'image');
    @endphp

    <section id="home-banner" class="home_slider_image"
        style="background: url('{{ checkFileExist($image) }}');background-repeat: no-repeat;background-size: cover;background-position: center;">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-fir-sec">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','slider',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'Image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="banner-cont">
                    <h1 class="home_slider_title">
                        {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'title') }}
                    </h1>
                    <p class="home_slider_sub_title">
                        {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'sub_title') }}
                    </p>
                    <div class="banner-form">
                        <form name="frmSearch" id="frmSearch"
                            action="{{ route('front.template.stock_list', $domain_slug) }}">
                            <div class="form-row">
                                <div class="form-box">
                                    <select id="make" name="make">
                                        <option value="">Make All</option>
                                        @foreach ($make as $key => $value)
                                            <option value="{{ $value }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-box">
                                    <select id="model_list" name="modal">
                                        <option value="">Model Any</option>
                                    </select>
                                </div>
                                {{-- <div class="form-box text-white">
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
                                </div> --}}
                                <x-forms.price-selector :maxPrice="$max_price" page="home" parentClass="form-box" />

                                {{-- <div class="form-box">
                                <select id="body_type" name="body_type">
                                    <option value="">Body Type All</option>
                                    @foreach ($body_type as $key => $value)
                                    <option value="{{$value}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-box price">
                                <select id="engine_size_min" name="engine_size_min">
                                    <option value="">Min engine size (any)</option>
                                    @foreach ($engine_size as $key => $value)
                                    <option value="{{$value}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-box price">
                                <select id="engine_size_max" name="engine_size_max">
                                    <option value="">Max engine size (any)</option>
                                    @foreach ($engine_size as $key => $value)
                                    <option value="{{$value}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            </div>
                            <div class="form-row action">
                                <button class="y-btn">Search Cars</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our stock -->
    <section class="main-stock-bg" id="services">
        <div class="ourworks-box container">
            <h1 class="our-works-head">Stocks</h1>
        </div>
        <div class="container-fluid position-relative">
            <div class="grybg new-car-service">
                <div class="container-fluid stock_div">
                    <div class="owl-carousel owl-theme owl-car">
                        @foreach ($stocks as $key => $value)
                            @php
                                $images = explode(',', $value->images);
                                $stockImg = '';
                                if (!empty($images) && isset($images[0])) {
                                    $stockImg = $images[0];
                                }
                            @endphp
                            <div class="item stock-item-{{ $value->id }}">
                                {{-- @if (is_login_for_edit() == 1)
                                    <div class="stock-action-div">
                                        <a href="javascript:;" class="stock-action-remove"
                                            onclick="remove_items({{ $value->id }},'our_recent_stock_item','stock-item-{{ $value->id }}')"><i
                                                class="fa fa-trash"></i></a>
                                        <a herf="javascript:;" class="stock-action-edit"
                                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_recent_stock_item',{{ json_encode(['Title' => 'text', 'Image' => 'file']) }},{{ $value->id }})"><i
                                                class="fa fa-edit"></i></a>
                                    </div>
                                @endif --}}
                                <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}">
                                    <img src="{{ checkFileExist($stockImg) }}">
                                </a>
                                <div class="text-center p-3 bg-body text-primary slider-Text">
                                    <h4>{{ $value->make }}</h4>
                                    <h3>£{{ number_format($value->price) }}</h3>
                                </div>
                            </div>
                        @endforeach
                        {{-- @if (is_login_for_edit() == 1)
                            <div class="stock-action-add-more">
                                <div class="wd-md-our-work-blog-img-t4">
                                    <a href="javascript:;"
                                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_recent_stock_item',{{ json_encode(['Title' => 'text', 'Image' => 'file']) }})"><i
                                            class="fa fa-plus"></i> </a>
                                </div>
                            </div>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our stock End -->

    <section id="about-us">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-abt-top">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','about_us',{{ json_encode(['Sub Title' => 'text']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="about-cont-main">
                    <div class="about-top-title">
                        <h2 class="home_about_us_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'sub_title') }}
                        </h2>
                    </div>
                    <div class="sect-title">
                        @if (is_login_for_edit() == 1)
                            <div class="wd-edit-abt-us-lower">
                                <a class="wd-edit-btn" href="javascript:;"
                                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','about_us',{{ json_encode(['Title' => 'text', 'Description' => 'textarea', 'image' => 'file']) }})"><img
                                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                            </div>
                        @endif
                        <h2 class="home_about_us_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'title') }}
                        </h2>
                        <p class="home_about_us_description">{!! nl2br(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'description')) !!}</p>
                    </div>
                    <div class="about-img">
                        <div class="col-lg-9 col-md-10 col-sm-12">
                            <img class="ab-full-img home_about_us_image"
                                src="{{ asset(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'image')) }}"
                                alt="">
                            <img class="ab-vector" src="{{ asset('assets/web/template/t1/images/about-vector.png') }}"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="our-services">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-our-ser">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="o-serv-cont">
                    <div class="sect-title">
                        <h2 class="home_our_services_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'title') }}
                        </h2>
                        <p class="home_our_services_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'sub_title') }}
                        </p>
                    </div>
                    <div class="sect-cont">
                        <div class="services-blog services_div">
                            @foreach ($web_content->services as $service)
                                <div class="col-md col-6 mb-5 services-img item-{{ $service->id }}">
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
                                    <span><img src="{{ checkFileExist($service->image) }}" alt=""></span>
                                    <h5>{{ $service->title }}</h5>
                                </div>
                            @endforeach
                            @if (is_login_for_edit() == 1)
                                <div class="col-md col-6 mb-5 services-img service-add-btn-t1">
                                    <a herf="javascript:;"
                                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services_item',{{ json_encode(['Service Title' => 'text', 'Service Description' => 'textarea', 'Service Image' => 'file']) }})">
                                        <div class="wd-md-ser-img-o">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                    </a>
                                    <h5>Add Services</h5>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="testimonial">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="sect-title">
                    <h2 class="home_testimonials_title">
                        {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'title') }}
                    </h2>
                    <p class="home_testimonials_sub_title">
                        {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'sub_title') }}
                    </p>
                </div>
            </div>
        </div>
        <div class="testimonial_div">
            <div class="owl-carousel">
                @foreach ($web_content->testimonial as $testimonial)
                    <div class="item item1 testimonial-item-{{ $testimonial->id }}">
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
                        <div class="slide-box green">
                            <h5>{{ $testimonial->label }}</h5>
                            <h3>{{ $testimonial->author_name }}</h3>
                            <p>{{ $testimonial->description }}</p>
                            <div class="readmore">
                                {{-- <a href="#">Read more <img
                                        src="{{ asset('assets/web/template/t1/images/right-arrow.png') }}"
                                        alt=""></a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
                
                <div class="item item1">
                    <div class="testimonial-action-add-btn-t1">
                        <a herf="javascript:;"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials_item',{{ json_encode(['Title' => 'text', 'Description' => 'textarea', 'Label' => 'text', 'Author Name' => 'text', 'Author Image' => 'file']) }})">
                            <div class="wd-md-ser-img-o">
                                <i class="fa fa-plus"></i>
                            </div>
                        </a>
                        <div class="slide-box green">
                            <h3>Add Testimonial</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="our-work">
        {{-- @if (is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_recent_stock',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif --}}
        <div class="container">
            <div class="row">
                <div class="o-work-cont">
                    <div class="sect-title">
                        <h2 class="home_our_recent_stock_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'title') }}
                        </h2>
                        <p class="home_our_recent_stock_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'sub_title') }}
                        </p>
                    </div>
                    <div class="sect-cont stock_div">
                        @foreach ($stocks as $key => $value)
                            @if ($key < 6)
                                @php
                                    $images = explode(',', $value->images);
                                    $stockImg = '';
                                    if (!empty($images) && isset($images[0])) {
                                        $stockImg = $images[0];
                                    }
                                @endphp
                                <div class="col-lg-4 col-md-4 col-sm-12 stock-item-{{ $value->id }}">
                                    {{-- @if (is_login_for_edit() == 1)
                        <div class="stock-action-div">
                            <a href="javascript:;" class="stock-action-remove"
                                onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                    class="fa fa-trash"></i></a>
                            <a herf="javascript:;" class="stock-action-edit"
                                onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                    class="fa fa-edit"></i></a>
                        </div>
                        @endif --}}
                                    <div class="work-blog">
                                        <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}">
                                            <img src="{{ checkFileExist($stockImg) }}" alt="">
                                        </a>
                                        
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        {{-- @if (is_login_for_edit() == 1)
                    <div class="col-lg-4 col-md-4 col-sm-12 stock-action-add-more">
                        <div class="wd-md-our-work-blog-img-t1">
                            <a href="javascript:;"
                                onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}})"><i
                                    class="fa fa-plus"></i> </a>
                        </div>
                    </div>
                    @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="r-more-section">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','offer',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="r-more-cont">
                    <div class="col-lg-6 col-md-12 more-img">
                        <span><img
                                src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'image')) }}"
                                alt="" class="home_offer_image"></span>
                    </div>
                    <div class="col-lg-6 col-md-12 more-desc">
                        <h2 class="home_offer_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'title') }}
                        </h2>
                        <p class="home_offer_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'sub_title') }}
                        </p>
                        {{-- <a class="y-btn" href="#">Read more</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('assets/web/template/t1/vendors/owl.carousel/js/owl.carousel.js') }}"></script>
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
