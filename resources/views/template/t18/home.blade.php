@extends('layouts.template.t18.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection

@section('content')
    @php
        $image = get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'image');
    @endphp
    <section class="wd-md-home home_slider_image"
        style="background: url('{{ checkFileExist($image) }}');background-repeat: no-repeat;background-size: cover;background-position: center;">
        <div class="wd-edit-home">
            @if (is_login_for_edit() == 1)
                <div class="wd-edit-fir-sec">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','slider',{{ json_encode(['Title' => 'text', 'Image' => 'file']) }})"><img
                            src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                </div>
            @endif
        </div>
        <div class="container">
            <div class="wd-md-home-main-blog">
                <div class="wd-md-home-title">
                    <h1 class="home_slider_title">
                        {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'title') }}
                    </h1>
                </div>
                <div class="wd-home-search-car-blog wd-md-search-car-blog">
                    <div class="container">
                        <form class="form-inline justify-content-between wd-md-serach-car-form" name="frmSearch"
                            id="frmSearch" action="{{ route('front.template.stock_list', $domain_slug) }}">
                            <select class="custom-select wd-md-make-all" id="make" name="make">
                                <option value="">Make All</option>
                                @foreach ($make as $key => $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            <select id="model_list" name="modal" class="form-control">
                                <option value="">Model Any</option>
                            </select>
                            <!-- <div class="form-group mt-2">
                                            <div class="d-flex justify-content-between price-width">
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
                                            <div class="d-flex justify-content-between price-width">
                                                <span>£0</span>
                                                <span>£{{ $max_price }}</span>
                                            </div>
                                        </div> -->
                            <select id="min_price-select" name="min_price" class="form-control my-2">
                                <option value="">Min Price</option>
                                @for ($i = 2000; $i < $max_price - 500; $i += 500)
                                    <option value="{{ $i }}"
                                        {{ request()->min_price == $i ? 'selected' : '' }}>
                                        £{{ number_format($i) }}</option>
                                @endfor
                            </select>
                            <select id="max_price-select" name="max_price" class="form-control">
                                <option value="">Max Price</option>
                                @for ($i = 2500; $i <= $max_price; $i += 500)
                                    <option value="{{ $i }}"
                                        {{ request()->max_price == $i ? 'selected' : '' }}>
                                        £{{ number_format($i) }}</option>
                                @endfor
                            </select>
                            <button class="btn car-home-search-btn">Search Car</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wd-md-our-services">
        <div class="wd-edit-our-services">
            @if (is_login_for_edit() == 1)
                <div class="wd-edit-our-ser-t4">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text']) }})"><img
                            src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                </div>
            @endif
        </div>
        <div class="container-fluid">
            <div class="wd-md-our-ser-title text-center">
                <h2 class="home_our_services_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'title') }}
                </h2>
                <p class="text-center home_our_services_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'sub_title') }}
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="wd-md-services-blog services_div">
                        @foreach ($web_content->services as $key => $service)
                            <div class="wd-services-detail text-center item-{{ $service->id }}">
                                @if (is_login_for_edit() == 1)
                                    <div class="wd-services-action action-div d-flex align-items-center">
                                        <a href="javascript:;" class="wd-edit"
                                            onclick="remove_items({{ $service->id }},'our_services_item','item-{{ $service->id }}')"><i
                                                class="fa fa-trash"></i></a>
                                        <a href="javascript:;" class="wd-delete"
                                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services_item',{{ json_encode(['Service Title' => 'text', 'Service Image' => 'file']) }},{{ $service->id }})"><i
                                                class="fa fa-edit"></i></a>
                                    </div>
                                @endif
                                <div class="wd-services-img">
                                    <img src="{{ checkFileExist($service->image) }}" class="img-fluid">
                                </div>
                                <p>{{ $service->title }}</p>
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
            </div>
        </div>
    </section>
    <section class="wd-md-about">
        <div class="wd-edit-about">
            @if (is_login_for_edit() == 1)
                <div class="wd-edit-welcome-section">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','welcome',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'Image' => 'file']) }})"><img
                            src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                </div>
            @endif
        </div>
        <div class="wd-md-abt-main d-flex align-items-center justify-content-between">
            <div class="wd-md-abt-img">
                <img src="{{ asset(get_web_content_detail($web_content->id, $web_content->template, 'home', 'welcome', 'image')) }}"
                    class="home_welcome_image img-fluid">
            </div>
            <div class="wd-md-abt-detail">
                <h2 class="home_welcome_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'welcome', 'title') }}</h2>
                <p class="home_welcome_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'welcome', 'sub_title') }}
                </p>
            </div>
        </div>
    </section>
    <section class="wd-md-recent-stock">
        <div class="wd-edit-stock">
            {{-- @if (is_login_for_edit() == 1)
        <div class="wd-edit-testimonial">
            <a class="wd-edit-btn" href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock',{{json_encode(['Title'=>'text','Sub Title'=>'text'])}})"><img src="{{asset('assets/web/images/edit-btn.png')}}"></a>
        </div>
        @endif --}}
        </div>
        <div class="container">
            <div class="wd-recent-stock-title">
                <h2 class="home_our_recent_stock_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'title') }}
                </h2>
                <p class="mrgb_30 home_our_recent_stock_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'sub_title') }}
                </p>
            </div>
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
                        <div class="col-lg-4 col-md-6">
                            {{-- @if (is_login_for_edit() == 1)
                    <div class="wd-stock-action action-div d-flex align-items-center">
                        <a href="javascript:;" class="wd-edit"
                           onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i class="fa fa-trash"></i></a>
                <a herf="javascript:;" class="wd-delete" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}},{{$stock->id}})"><i class="fa fa-edit"></i></a>
            </div>
            @endif --}}
                            <div class="wd-sl-stocks">
                                <div class="wd-md-stock-img">
                                    {{-- <img src="{{checkFileExist($stock->image)}}" class="stock-car-img"> --}}
                                    {{-- <img src="{{ checkFileExist($stockImg) }}" class="stock-car-img"> --}}
                                    <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}">
                                        <img src="{{ checkFileExist($stockImg) }}" class="stock-car-img">
                                    </a>
                                </div>
                                <div class="wd-sl-stock_content">
                                    <div class="wd-sl-stock_top">
                                        <div class="wd-sl-stock_topright">
                                            <span>{{ $value->make }}</span>
                                            <small>{{ $value->derivative }}</small><br>
                                            <small><b>{{ $value->attention_grabber }}</b></small>
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
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>YEAR</small>
                                            <span>{{ $value->manufacture }}</span>
                                        </div>
                                    </div>
                                    <h4>£{{ number_format($value->price) }}</h4>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                {{-- @if (is_login_for_edit() == 1)
                <div class="col-lg-4 col-md-6">
                    <a href="javascript:;"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}})">
        <div class="wd-add-stock">
            <i class="fas fa-plus"></i>
            <p>Add Stock</p>
        </div>
        </a>
    </div>
    @endif --}}
            </div>
            <a href="{{ route('front.template.stock_list', $domain_slug) }}" class="wd-discover-car-btn">Discover All
                Car</a>
        </div>
    </section>
    <section class="wd-md-testimonial">
        <div class="wd-edit-testimonial">
            @if (is_login_for_edit() == 1)
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            @endif
        </div>
        <div class="container">
            <div class="wd-md-testimonial-title">
                <h2 class="home_testimonials_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'title') }}</h2>
                <p class="home_testimonials_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'sub_title') }}
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6 testimonial_div">
                    <div class="owl-carousel owl-theme">
                        @foreach ($web_content->testimonial as $testimonial)
                            <div class="item testimonial-item-{{ $testimonial->id }}">
                                @if (is_login_for_edit() == 1)
                                    <div class="wd-testi-action action-div d-flex align-items-center">
                                        <a href="javascript:;" class="wd-edit"
                                            onclick="remove_items({{ $testimonial->id }},'testimonials_item','testimonial-item-{{ $testimonial->id }}')"><i
                                                class="fa fa-trash"></i></a>
                                        <a href="javascript:;" class="wd-delete"
                                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials_item',{{ json_encode(['Author Name' => 'text', 'Description' => 'textarea']) }},{{ $testimonial->id }})"><i
                                                class="fa fa-edit"></i></a>
                                    </div>
                                @endif
                                <div class="wd-md-testi-blog">
                                    <p>{{ $testimonial->description }}</p>
                                    <h6>
                                        <span>
                                            <svg width="71" height="7" viewBox="0 0 71 7" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="0.382812" y="2.54297" width="67.2759" height="1.17422"
                                                    fill="white" />
                                                <ellipse cx="67.0502" cy="3.13085" rx="3.058" ry="2.93554"
                                                    fill="white" />
                                            </svg>
                                        </span>{{ $testimonial->author_name }}
                                    </h6>
                                </div>
                            </div>
                        @endforeach
                        <div class="item">
                            <a href="javascript:;"
                                onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials_item',{{ json_encode(['Author Name' => 'text', 'Description' => 'textarea']) }})">
                                <div class="wd-add-review">
                                    <i class="fas fa-plus"></i>
                                    <p>Add Reviews</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="wd-review-img">
                        <img src="{{ asset('assets/web/template/t18/images/review-img.png') }}" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wd-md-offer-blog">
        <div class="wd-edit-offer">
            @if (is_login_for_edit() == 1)
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','offer',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            @endif
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="wd-md-offer-detail text-center">
                        <h2 class="home_offer_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'title') }}
                        </h2>
                        <p class="home_offer_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'sub_title') }}
                        </p>
                        {{-- <a href="javascript:;" class="wd-md-read-more-btn">Read More</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            dots: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 1,
                },
                1000: {
                    items: 1,
                }
            }
        })
    </script>
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
