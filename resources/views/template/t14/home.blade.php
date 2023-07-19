@extends('layouts.template.t14.app')
@section('style')
    <style>
        .add-review img {
            filter: invert(1);
            margin: 0 auto;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection
@section('content')
    <section id="banner">
        <div class="container">
            @if (is_login_for_edit() == 1)
                <div class="wd-edit-banner">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','slider',{{ json_encode([
                            'Title' => 'text',
                            'Sub Title' => 'textarea',
                            'Slider Image 1' => 'file',
                            'Slider Image 2' => 'file',
                            'Slider Image 3' => 'file',
                        ]) }})">
                        <img src="{{ asset('assets/web/template/t14') }}/images/edit.png">
                    </a>
                </div>
            @endif
            <div class="wd-sl-home_panel">
                <div class="wd-sl-panelinner">
                    <h1 class="home_slider_title">
                        {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'title') }}
                    </h1>
                    <p class="home_slider_sub_title">
                        {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'sub_title') }}
                    </p>
                    <span>All Stocks</span>
                </div>
            </div>
        </div>
        <div class="owl-home owl-carousel owl-theme">
            <div class="item">
                <img src="{{ asset(get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'slider_image_1')) }}"
                    class="wd-sl-banner_car home_slider_slider_image_1">
            </div>
            <div class="item">
                <img src="{{ asset(get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'slider_image_2')) }}"
                    class="wd-sl-banner_car home_slider_slider_image_2">
            </div>
            <div class="item">
                <img src="{{ asset(get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'slider_image_3')) }}"
                    class="wd-sl-banner_car home_slider_slider_image_3">
            </div>
        </div>
    </section>
    <section id="welcome">
        <div class="container">
            @if (is_login_for_edit() == 1)
                <div class="wd-edit-welcm">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','welcome',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'Image' => 'file']) }})">
                        <img src="{{ asset('assets/web/template/t14') }}/images/edit.png">
                    </a>
                </div>
            @endif
            <div class="wd-sl-banertitle position-relative welcome-title">
                <h1 class="home_welcome_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'welcome', 'title') }}</h1>
                <p class="home_welcome_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'welcome', 'sub_title') }}
                </p>
            </div>
        </div>
        <div class="container">
            <div class="wd-sl-welcm_main position-relative">
                <div class="wd-sl-welcmbg position-relative">
                    <img src="{{ asset(get_web_content_detail($web_content->id, $web_content->template, 'home', 'welcome', 'image')) }}"
                        class="home_welcome_image">
                </div>
                <div class="wd-sl-welcmfilter">
                    <div class="wd-sl-heading">
                        <h5>Search your car</h5>
                    </div>
                    <div class="wd-sl-cfilter">
                        <form name="frmSearch" id="frmSearch"
                            action="{{ route('front.template.stock_list', $domain_slug) }}">
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
                                            fill="white"></path>
                                        <path
                                            d="M11.4099 8.58609C11.7889 8.96609 11.9979 9.46809 11.9979 10.0001H13.9979C13.9988 9.47451 13.8955 8.95398 13.694 8.46857C13.4924 7.98316 13.1967 7.54251 12.8239 7.17209C11.3099 5.66009 8.68488 5.66009 7.17188 7.17209L8.58388 8.58809C9.34388 7.83009 10.6539 7.83209 11.4099 8.58609Z"
                                            fill="white"></path>
                                    </svg>
                                    Search Car
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @php
        $image = get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'image');
    @endphp
    <section id="service" class="home_our_services_image"
        style="background-image:url('{{ checkFileExist($image) }}') !important;">
        <div class="container">
            @if (is_login_for_edit() == 1)
                <div class="wd-edit-services">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text', 'Image' => 'file']) }})">
                        <img src="{{ asset('assets/web/template/t14') }}/images/edit.png">
                    </a>
                </div>
            @endif
            <div class="wd-sl-carvector">
                <img src="{{ asset('assets/web/template/t14') }}/images/home/carvector.png">
            </div>
            <div class="wd-sl-banertitle position-relative service-title">
                <h1 class="home_our_services_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'title') }}
                </h1>
                <p class="home_our_services_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'sub_title') }}
                </p>
            </div>
        </div>
        <div class="wd-sl-services services_div">
            <div class="owl-carousel owl-theme owl-service">
                @php
                    $isClassAdded = true;
                @endphp
                @foreach ($web_content->services as $key => $service)
                    @php
                        $class = 'even';
                        if ($isClassAdded == true) {
                            $isClassAdded = false;
                        } else {
                            $isClassAdded = true;
                            $class = 'odd';
                        }
                    @endphp
                    <div class="item item-{{ $service->id }}" id="{{ $class }}">
                        @if (is_login_for_edit() == 1)
                            <div class="services-action-prt text-center">
                                <a href="javascript:;" class="service-action-remove"
                                    onclick="remove_items({{ $service->id }},'our_services_item','item-{{ $service->id }}')"><i
                                        class="fa fa-trash"></i></a>
                                <a href="javascript:;" class="service-action-edit"
                                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services_item',{{ json_encode(['Service Title' => 'text', 'Service Image' => 'file']) }},{{ $service->id }})"><i
                                        class="fa fa-edit"></i></a>
                            </div>
                        @endif
                        <div class="wd-sl-services_card">
                            <img src="{{ checkFileExist($service->image) }}" class="wd-sl-serviceimg">
                            <h6>{{ $service->title }}</h6>
                        </div>
                    </div>
                @endforeach
                @if (is_login_for_edit() == 1)
                    @php
                        $class = 'even';
                        if ($isClassAdded == true) {
                            $isClassAdded = false;
                        } else {
                            $isClassAdded = true;
                            $class = 'odd';
                        }
                    @endphp
                    <!-- add services -->
                    <div class="item" id="{{ $class }}">
                        <a href="javascript:;" class="wd-sl-services_card"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services_item',{{ json_encode(['Service Title' => 'text', 'Service Image' => 'file']) }})">
                            <img src="{{ asset('assets/web/template/t14') }}/images/plus.png"
                                class="wd-sl-serviceimg mb-0">
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <section id="stock">
        <div class="container">
            {{-- @if (is_login_for_edit() == 1)
                <div class="wd-edit-stock">
                    <a class="wd-edit-btn" href="javascript:;"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock',{{json_encode(['Title'=>'text','Sub Title'=>'text'])}})">
                        <img src="{{asset('assets/web/template/t14')}}/images/edit.png">
                    </a>
                </div>
            @endif --}}
            <div class="wd-sl-banertitle position-relative stock-title">
                <h1 class="home_our_recent_stock_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'title') }}
                </h1>
                <p class="home_our_recent_stock_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'sub_title') }}
                </p>
            </div>
            <div class="wd-sl-stocks_main">
                <div class="row stock_div">
                    @foreach ($stocks as $key => $value)
                        @if ($key < 8)
                            @php
                                $images = explode(',', $value->images);
                                $stockImg = '';
                                if (!empty($images) && isset($images[0])) {
                                    $stockImg = $images[0];
                                }
                            @endphp
                            <div class="col-md-3 stock-item-{{ $value->id }}">
                                {{-- @if (is_login_for_edit() == 1)
                                <div class="stock-action-prt text-center">
                                    <a href="javascript:;" class="stock-action-remove"
                                       onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                            class="fa fa-trash"></i></a>
                                    <a href="javascript:;" class="stock-action-edit"
                                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                            class="fa fa-edit"></i></a>
                                </div>
                            @endif --}}
                                <div class="wd-sl-stocks">
                                    <img src="{{ checkFileExist($stockImg) }}">
                                    <div class="wd-sl-stock_content">
                                        <div class="wd-sl-stock_top">
                                            <img src="{{ checkFileExist($stockImg) }}">
                                            <div class="wd-sl-stock_topright">
                                                <span>{{ $value->make }} &nbsp; £<strong>{{ number_format($value->price) }}</strong></span><br>
                                                <span>{{$value->attention_grabber}}</span>
                                                {{-- <small>Hatchback 2.5 RS 500 3DR</small> --}}
                                            </div>
                                        </div>
                                        <div class="wd-sl-stock_middle">
                                            <div class="wd-sl-stockmiddle_inner">
                                                <small>Category</small>
                                                <span>{{ $value->category }}</span>
                                            </div>
                                            <div class="wd-sl-stockmiddle_inner">
                                                <small>Transmission</small>
                                                <span>{{ $value->transmission }}</span>
                                            </div>
                                            <div class="wd-sl-stockmiddle_inner">
                                                <small>Colour</small>
                                                <span>{{ $value->colour }}</span>
                                            </div>
                                            <div class="wd-sl-stockmiddle_inner">
                                                <small>Mileage</small>
                                                <span>{{ $value->mileage }}</span>
                                            </div>
                                            {{-- <div class="wd-sl-stockmiddle_inner">
                                            <small>YEAR</small>
                                            <span>2019</span>
                                        </div> --}}
                                        </div>
                                        {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum </p> --}}
                                        {{-- <h4>£41,855.26</h4> --}}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                {{-- @if (is_login_for_edit() == 1)
                    <div class="text-center">
                        <a href="javascript:;" class="common-btn"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}})">Add
                            Stock</a>
                    </div>
                @endif --}}
            </div>
        </div>
    </section>
    <section id="review">
        <div class="container">
            @if (is_login_for_edit() == 1)
                <div class="wd-edit-testi">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text']) }})">
                        <img src="{{ asset('assets/web/template/t14') }}/images/edit.png">
                    </a>
                </div>
            @endif
            <div class="wd-sl-banertitle position-relative review-title">
                <h1 class="home_testimonials_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'title') }}
                </h1>
                <p class="home_testimonials_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'sub_title') }}
                </p>
            </div>
            <div class="testimonial_div">
                <div class="owl-review owl-carousel owl-theme">
                    @foreach ($web_content->testimonial as $testimonial)
                        <div class="item testimonial-item-{{ $testimonial->id }}">
                            @if (is_login_for_edit() == 1)
                                <div class="testi-action-prt text-right">
                                    <a href="javascript:;"
                                        onclick="remove_items({{ $testimonial->id }},'testimonials_item','testimonial-item-{{ $testimonial->id }}')"><i
                                            class="fa fa-trash"></i></a>
                                    <a href="javascript:;"
                                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials_item',{{ json_encode(['Title' => 'text', 'Description' => 'textarea', 'Label' => 'text', 'Author Name' => 'text', 'Author Image' => 'file']) }},{{ $testimonial->id }})"><i
                                            class="fa fa-edit"></i></a>
                                </div>
                            @endif
                            <div class="wd-sl-review_main">
                                <img src="{{ checkFileExist($testimonial->author_image) }}">
                                <div class="wd-sl-review_content">
                                    <h6>{{ $testimonial->title }}</h6>
                                    <p>{{ $testimonial->description }}</p>
                                    <span>- {{ $testimonial->author_name }}</span>
                                </div>
                            </div>

                        </div>
                    @endforeach
                    <div class="item">
                        <div class="wd-sl-review_main add-review d-block">
                            <a href="javascript:;" class="d-block"
                                onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials_item',{{ json_encode(['Title' => 'text', 'Description' => 'textarea', 'Label' => 'text', 'Author Name' => 'text', 'Author Image' => 'file']) }})"><img
                                    src="{{ asset('assets/web/template/t14') }}/images/plus.png"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="other">
        <div class="container">
            @if (is_login_for_edit() == 1)
                <div class="wd-edit-plans">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','offer',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'image' => 'file']) }})">
                        <img src="{{ asset('assets/web/template/t14') }}/images/edit.png">
                    </a>
                </div>
            @endif
            <img src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'image')) }}"
                class="wd-sl-justfor_ad home_offer_image">
            <div class="wd-sl-other_info">
                <h3 class="home_offer_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'title') }}</h3>
                <p class="home_offer_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'sub_title') }}
                </p>
                {{-- <a href="javascript:;" class="common-btn">Read More</a> --}}
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
