@extends('layouts.template.t15.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection

@section('content')
    <section class="wd-md-home">
        <div class="container">
            <div class="wd-edit-banner">
                @if (is_login_for_edit() == 1)
                    <div class="wd-edit-fir-sec">
                        <a class="wd-edit-btn" href="javascript:;"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','slider',{{ json_encode(['Title' => 'text', 'Image' => 'file']) }})"><img
                                src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                    </div>
                @endif
            </div>
            <div class="wd-md-home-title">
                <h1 class="home_slider_title">A to Z Leads car sales</h1>
            </div>
            <div class="wd-md-search-car-blog">
                <div class="container">
                    <form name="frmSearch" id="frmSearch" action="{{ route('front.template.stock_list', $domain_slug) }}"
                        class="form-inline justify-content-between wd-md-serach-car-form">
                        <select id="make" name="make" class="custom-select wd-md-make-all">
                            <option value="">Make All</option>
                            @foreach ($make as $key => $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        <select id="model_list" name="modal" class="form-control">
                            <option value="">Model Any</option>
                        </select>
                        <!-- <div class="form-group">
                                                                            <div class="wd-price-range">
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
                                                                            <div class="wd-price">
                                                                                <span>£0</span>
                                                                                <span>£{{ $max_price }}</span>
                                                                            </div>
                                                                        </div> -->
                        <x-forms.price-selector :maxPrice="$max_price" page="home" parentClass="form-group" />
                        <button class="btn car-search-btn">
                            <span>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 18C11.775 17.9996 13.4988 17.4054 14.897 16.312L19.293 20.708L20.707 19.294L16.311 14.898C17.405 13.4997 17.9996 11.7754 18 10C18 5.589 14.411 2 10 2C5.589 2 2 5.589 2 10C2 14.411 5.589 18 10 18ZM10 4C13.309 4 16 6.691 16 10C16 13.309 13.309 16 10 16C6.691 16 4 13.309 4 10C4 6.691 6.691 4 10 4Z"
                                        fill="white" />
                                    <path
                                        d="M11.4099 8.58609C11.7889 8.96609 11.9979 9.46809 11.9979 10.0001H13.9979C13.9988 9.47451 13.8955 8.95398 13.694 8.46857C13.4924 7.98316 13.1967 7.54251 12.8239 7.17209C11.3099 5.66009 8.68488 5.66009 7.17188 7.17209L8.58388 8.58809C9.34388 7.83009 10.6539 7.83209 11.4099 8.58609Z"
                                        fill="white" />
                                </svg>
                            </span>Search Car
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="wd-md-about" id="about">
        <div class="container">
            <div class="wd-edit-welcm">
                @if (is_login_for_edit() == 1)
                    <div class="wd-edit-abt-us-lower">
                        <a class="wd-edit-btn" href="javascript:;"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','about_us',{{ json_encode(['Title' => 'text', 'Description' => 'textarea', 'image' => 'file']) }})"><img
                                src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                    </div>
                @endif
            </div>
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="wd-md-abt-img">
                        <img src="{{ asset(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'image')) }}"
                            class="home_about_us_image img-fluid">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="wd-md-abt-detail">
                        <h2 class="home_about_us_sub_title">Welcome to A to Z cars</h2>
                        <p class="home_about_us_description">{!! nl2br(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'description')) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wd-md-our-services" id="services">
        <div class="container-fluid">
            <div class="wd-edit-services">
                @if (is_login_for_edit() == 1)
                    <div class="wd-edit-our-ser-t4">
                        <a class="wd-edit-btn" href="javascript:;"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text']) }})"><img
                                src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                    </div>
                @endif
            </div>
            <div class="wd-md-our-ser-title text-center">
                <h2 class="home_our_services_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'title') }}
                </h2>
                <p class="home_our_services_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'sub_title') }}
                </p>
            </div>
            <div class="wd-md-services-blog services_div">
                @foreach ($web_content->services as $service)
                    <div class="wd-services-detail text-center item-{{ $service->id }}">
                        @if (is_login_for_edit() == 1)
                            <div class="services-action-div">
                                <a href="javascript:;" class="service-action-remove"
                                    onclick="remove_items({{ $service->id }},'our_services_item','item-{{ $service->id }}')"><i
                                        class="fa fa-trash"></i></a>
                                <a href="javascript:;" class="service-action-edit"
                                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services_item',{{ json_encode(['Service Title' => 'text', 'Service Image' => 'file']) }},{{ $service->id }})"><i
                                        class="fa fa-edit"></i></a>
                            </div>
                        @endif
                        <div class="wd-services-img">
                            <img src="{{ checkFileExist($service->image) }}" class="img-fluid">
                            <p>{{ $service->title }}</p>
                        </div>
                    </div>
                @endforeach
                <!-- add-services -->
                @if (is_login_for_edit() == 1)
                    <a href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services_item',{{ json_encode(['Service Title' => 'text', 'Service Image' => 'file']) }})">
                        <div class="wd-add-services">
                            <i class="fas fa-plus"></i>
                            <p>Add Services</p>
                        </div>
                    </a>
                @endif
            </div>
        </div>
    </section>
    <section class="wd-md-recent-stock-slider" id="stock">
        <div class="container">
            <div class="wd-edit-stock">
                {{-- @if (is_login_for_edit() == 1)
                    <div class="wd-edit-testimonial">
                        <a class="wd-edit-btn" href="javascript:;"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_recent_stock',{{ json_encode(['Title' => 'text']) }})"><img
                                src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                    </div>
                @endif --}}
            </div>
            <div class="wd-car-slider-blog">
                <div class="new-feature-slider stock_div">
                    @foreach ($stocks as $key => $value)
                        @php
                            $images = explode(',', $value->images);
                            $stockImg = '';
                            if (!empty($images) && isset($images[0])) {
                                $stockImg = $images[0];
                            }
                        @endphp
                        @if ($key == 0)
                            <div
                                class="feature-slide d-flex align-items-center justify-content-center stock-item-{{ $value->id }} active">
                            @else
                                <div
                                    class="feature-slide d-flex align-items-center justify-content-center stock-item-{{ $value->id }}">
                        @endif
                        <div class="wd-slide-left block-wrap w50 center-content mob-auto">
                            <div class="content-centered overview-text">
                                <img src="{{ checkFileExist($stockImg) }}">
                                <h2 class="car-name">{{ $value->make }}</h2>
                                <span class="car-price">{{ $value->derivative }}</span>
                                <p>{{ $value->attention_grabber }}</p>
                                <p>{{ $value->key_information }}</p>
                            </div>
                        </div>
                        <div class="wd-slide-right block-wrap w50 new-feature-image-wrap mob-auto">
                            <div class="feature-slide-image">
                                <div class="wd-car-slide-box">
                                    {{-- @if (is_login_for_edit() == 1)
                                    <div class="stock-action-prt text-center">
                                        <a href="javascript:;" class="stock-action-remove"
                                           onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                                class="fa fa-trash"></i></a>
                                        <a herf="javascript:;" class="stock-action-edit"
                                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                                class="fa fa-edit"></i></a>
                                    </div>
                                @endif --}}
                                    <h2 class="home_our_recent_stock_title">
                                        {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'title') }}
                                    </h2>
                                    <img src="{{ checkFileExist($stockImg) }}">
                                    <div class="wd-car-inner-des">
                                        <div class="wd-car-slide-detail d-flex align-items-center justify-content-between">
                                            <div class="wd-car-name-blog">
                                                <h6>{{ $value->make }}</h6>
                                                <span>{{ $value->derivative }}</span>
                                            </div>
                                            <p>£{{ number_format($value->price) }}</p>
                                        </div>
                                        <div class="wd-car-view-detail d-flex align-items-center justify-content-between">
                                            <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}"
                                                class="wd-view-btn">View Details</a>
                                            <div class="controls new-feature-controls">
                                                <span class="control button-prev"><i class="fas fa-angle-left"></i></span>
                                                <span class="control button-next"><i
                                                        class="fas fa-chevron-right"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>
    <section class="wd-md-testimonial" id="review">
        <div class="container">
            <div class="wd-edit-testi">
                @if (is_login_for_edit() == 1)
                    <div class="wd-edit-testimonial">
                        <a class="wd-edit-btn" href="javascript:;"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text']) }})"><img
                                src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                    </div>
                @endif
            </div>
            <div class="wd-md-testimonial-title">
                <h2 class="home_testimonials_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'title') }}
                </h2>
                <p class="home_testimonials_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'sub_title') }}
                </p>
            </div>
            <div class="row testimonial_div">
                @foreach ($web_content->testimonial as $testimonial)
                    <div class="col-lg-4 testimonial-item-{{ $testimonial->id }}">
                        <div class="testi-action-prt text-right">
                            @if (is_login_for_edit() == 1)
                                <div class="testimonial-action-div">
                                    <a href="javascript:;" class="testimonial-action-remove"
                                        onclick="remove_items({{ $testimonial->id }},'testimonials_item','testimonial-item-{{ $testimonial->id }}')"><i
                                            class="fa fa-trash"></i></a>
                                    <a href="javascript:;" class="testimonial-action-edit"
                                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials_item',{{ json_encode(['Description' => 'textarea', 'Label' => 'text', 'Author Name' => 'text', 'Author Image' => 'file']) }},{{ $testimonial->id }})"><i
                                            class="fa fa-edit"></i></a>
                                </div>
                            @endif
                        </div>
                        <div class="wd-md-testi-box">
                            <h6>{{ $testimonial->label }}</h6>
                            <p>{{ $testimonial->description }}</p>
                            <hr>
                            <div class="wd-testimonial-img d-flex align-items-center">
                                <img src="{{ checkFileExist($testimonial->author_image) }}" class="img-fluid">
                                <p>{{ $testimonial->author_name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-4">
                    <a href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials_item',{{ json_encode(['Author Image' => 'file', 'Description' => 'textarea', 'Label' => 'text', 'Author Name' => 'text']) }})">
                        <div class="wd-add-recent-stock">
                            <i class="fas fa-plus"></i>
                            <p>Add Testimonial</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="wd-testimonial-view-btn-blog text-center">
                {{-- <a href="javascript:;" class="wd-testimonial-view-btn">View All</a> --}}
            </div>
        </div>
    </section>
    <section class="wd-md-offer-blog" id="budget">
        <div class="container-fluid">
            <div class="wd-edit-plans">
                @if (is_login_for_edit() == 1)
                    <div class="wd-edit-testimonial">
                        <a class="wd-edit-btn" href="javascript:;"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','offer',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'image' => 'file']) }})"><img
                                src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                    </div>
                @endif
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="wd-md-offer-img">
                        <img src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'image')) }}"
                            class="home_offer_image img-fluid">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="wd-md-offer-detail">
                        <h2 class="home_offer_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'title') }}
                        </h2>
                        <p class="home_offer_sub_title">{!! nl2br(get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'sub_title')) !!}</p>
                        {{-- <a href="javascript:;" class="wd-md-read-more-btn">Read More</a> --}}
                    </div>
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
