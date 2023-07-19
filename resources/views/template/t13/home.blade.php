@extends('layouts.template.t13.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection
@section('content')
    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-4 my-auto">
                    <div class="wd-sl-banertitle">
                        <h1>Search your <b>car</b></h1>
                    </div>
                    <div class="wd-sl-cfilter">
                        <form name="frmSearch" id="frmSearch" action="{{ route('front.template.stock_list', $domain_slug) }}">
                            <div class="col-grid">
                                <div class="form-group">
                                    <select id="make" name="make" class="form-control">
                                        <option value="">Make All</option>
                                        @foreach ($make as $key => $value)
                                            <option value="{{ $value }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select id="model_list" name="modal" class="form-control">
                                        <option value="">Model Any</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-grid">
                                <!-- <div class="form-group">
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
                                <x-forms.price-selector :maxPrice="$max_price" page="home" parentClass="form-group" />
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="form-btn">
                                    <svg class="mr-1" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10 18C11.775 17.9996 13.4988 17.4054 14.897 16.312L19.293 20.708L20.707 19.294L16.311 14.898C17.405 13.4997 17.9996 11.7754 18 10C18 5.589 14.411 2 10 2C5.589 2 2 5.589 2 10C2 14.411 5.589 18 10 18ZM10 4C13.309 4 16 6.691 16 10C16 13.309 13.309 16 10 16C6.691 16 4 13.309 4 10C4 6.691 6.691 4 10 4Z"
                                            fill="white" />
                                        <path
                                            d="M11.4099 8.58609C11.7889 8.96609 11.9979 9.46809 11.9979 10.0001H13.9979C13.9988 9.47451 13.8955 8.95398 13.694 8.46857C13.4924 7.98316 13.1967 7.54251 12.8239 7.17209C11.3099 5.66009 8.68488 5.66009 7.17188 7.17209L8.58388 8.58809C9.34388 7.83009 10.6539 7.83209 11.4099 8.58609Z"
                                            fill="white" />
                                    </svg>
                                    Search Car
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="wd-sl-banercar">
                        <img src="{{ asset('assets/web/template/t13/images/home/bannercar.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="welcome">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-welcome-section">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','welcome',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'Image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container">
            <div class="wd-sl-banertitle position-relative welcome-title">
                <h1 class="home_welcome_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'welcome', 'title') }}</h1>
                <p class="home_welcome_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'welcome', 'sub_title') }}</p>
            </div>
        </div>
        <div class="container-fluid">
            <div class="wd-sl-welcmbg">
                <img src="{{ asset(get_web_content_detail($web_content->id, $web_content->template, 'home', 'welcome', 'image')) }}"
                    class="home_welcome_image" width="90%">
            </div>
        </div>
    </section>
    <section id="services">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-our-ser-t4">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text', 'Image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container">
            <div class="wd-sl-banertitle position-relative service-title">
                <h1 class="home_our_services_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'title') }}
                </h1>
                <p class="home_our_services_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'sub_title') }}
                </p>
            </div>
            <div class="wd-sl-services">
                <div class="row">
                    <div class="col-md-8 my-auto">
                        <img class="home_our_services_image"
                            src="{{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'image') }}"
                            width="100%">
                    </div>
                    <div class="col-md-4">
                        <div class="wd-sl-serviceslist services_div">
                            <ul>
                                @php
                                    $isClassAdded = true;
                                @endphp
                                @foreach ($web_content->services as $key => $service)
                                    @php
                                        $class = '';
                                        if ($isClassAdded == true) {
                                            $isClassAdded = false;
                                        } else {
                                            $isClassAdded = true;
                                            $class = 'odd';
                                        }
                                    @endphp
                                    <li class="{{ $class }} item-{{ $service->id }}">
                                        @if (is_login_for_edit() == 1)
                                            <div class="services-action-div">
                                                <a href="javascript:;" class="service-action-remove"
                                                    onclick="remove_items({{ $service->id }},'our_services_item','item-{{ $service->id }}')"><i
                                                        class="fa fa-trash"></i></a>
                                                <a herf="javascript:;" class="service-action-edit"
                                                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services_item',{{ json_encode(['Service Title' => 'text', 'Service Image' => 'file']) }},{{ $service->id }})"><i
                                                        class="fa fa-edit"></i></a>
                                            </div>
                                        @endif
                                        <a href="javascript:;" class="wd-sl-sdeatils">
                                            <div class="wd-sl-sdeatils_inner">
                                                <img src="{{ checkFileExist($service->image) }}">
                                            </div>
                                        </a>
                                        <span>{{ $service->title }}</span>
                                    </li>
                                @endforeach
                                @if (is_login_for_edit() == 1)
                                    @php
                                        $class = '';
                                        if ($isClassAdded == true) {
                                            $isClassAdded = false;
                                        } else {
                                            $isClassAdded = true;
                                            $class = 'odd';
                                        }
                                    @endphp
                                    <li class="{{ $class }}">
                                        <a href="javascript:;" class="wd-sl-sdeatils"
                                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services_item',{{ json_encode(['Service Title' => 'text', 'Service Image' => 'file']) }})">
                                            <div class="wd-sl-sdeatils_inner">
                                                <i class="fa fa-plus"></i>
                                            </div>
                                        </a>
                                        <span>Add Services</span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="stock">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_recent_stock',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container">
            <div class="wd-sl-banertitle position-relative stock-title">
                <h1 class="home_our_recent_stock_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'title') }}
                </h1>
                <p class="home_our_recent_stock_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'sub_title') }}
                </p>
            </div>
        </div>
        <div class="stock_div">
            <div class="owl-stock owl-carousel owl-theme">
                @foreach ($stocks as $key => $value)
                    @php
                        $images = explode(',', $value->images);
                        $stockImg = '';
                        if (!empty($images) && isset($images[0])) {
                            $stockImg = $images[0];
                        }
                    @endphp
                    <div class="item stock-item-{{ $value->id }}">
                        <div class="wd-sl-stocks">
                            {{-- @if (is_login_for_edit() == 1)
                                <div class="stock-action-div">
                                    <a href="javascript:;" class="stock-action-remove"
                                       onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                            class="fa fa-trash"></i></a>
                                    <a herf="javascript:;" class="stock-action-edit"
                                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                            class="fa fa-edit"></i></a>
                                </div>
                            @endif --}}
                            <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}">
                                <img src="{{ checkFileExist($stockImg) }}" />
                            </a>
                            <div class="wd-sl-stock_content">
                                <div class="wd-sl-stock_top">
                                    <div class="wd-sl-stock_topright">
                                        <span>{{ $value->make }} &nbsp;£<strong>{{ number_format($value->price) }}</strong></span><br>
                                        <span>{{$value->attention_grabber}}</span>
                                    </div>
                                </div>
                                <div class="wd-sl-stock_middle">
                                    <div class="wd-sl-stockmiddle_inner">
                                        <small>Category</small>
                                        <span>{{ $value->category }}</span>
                                    </div>
                                    <div class="wd-sl-stockmiddle_inner">
                                        <small>COLOUR</small>
                                        <span>{{ $value->colour }}</span>
                                    </div>
                                    <div class="wd-sl-stockmiddle_inner">
                                        <small>MILEAGE</small>
                                        <span>{{ $value->mileage }}</span>
                                    </div>
                                    <div class="wd-sl-stockmiddle_inner">
                                        <small>Transmission</small>
                                        <span>{{ $value->transmission }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- ADD STOCKS -->
                {{-- <div class="item stock-action-add-more">
                    <div class="wd-sl-stocks">
                        <a href="javascript:;" class="wd-sl-add_stocks"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}})">
                            <img src="{{asset('assets/web/template/t13')}}/images/home/plus.png">
                        </a>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <section id="testimonial">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container">
            <div class="wd-sl-banertitle position-relative test-title">
                <h1 class="home_testimonials_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'title') }}
                </h1>
                <p class="home_testimonials_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'sub_title') }}
                </p>
            </div>
            <div class="wd-sl-test_main">
                <div class="row testimonial_div">
                    @foreach ($web_content->testimonial as $testimonial)
                        <div class="col-md-4 testimonial-item-{{ $testimonial->id }}">
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
                            <div class="wd-sl-testcard">
                                <h5>{{ $testimonial->title }}</h5>
                                <p>{{ $testimonial->description }}</p>
                                <div class="wd-sl-review_test">
                                    <img src="{{ checkFileExist($testimonial->author_image) }}" class="wd-sl-userimg">
                                    <img src="{{ asset('assets/web/template/t13/images/home/qut.png') }}"
                                        class="qut-img">
                                </div>
                                <h4>{{ $testimonial->author_name }}</h4>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-4">
                        <div class="wd-sl-testcard">
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
    </section>
    <section id="other">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','offer',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-md-6 my-auto">
                    <div class="wd-sl-othercontent">
                        <h4 class="home_offer_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'title') }}
                        </h4>
                        <p class="home_offer_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'sub_title') }}
                        </p>
                    </div>
                    <div class="wd-sl-btngrp">
                        {{-- <a href="javascript:;" class="common-btn">Read More</a> --}}
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'image')) }}"
                        class="wd-sl-othrcar home_offer_image" width="100%;">
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
