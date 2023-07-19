@extends('layouts.template.t8.app')

@section('style')
    <style>
        #header {
            position: absolute;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection

@section('content')
    <section id="home-banner" style="background: url('{{ asset('assets/web/template/t8/images/home-banner-bg_top.jpg') }}')">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-fir-sec">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','slider',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'Image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container-fluid">
            <div class="banner-content">
                <div class="col-md-12 banner-left">
                    <div class="banner-cont">
                        <h1>Welcome to <span
                                class="home_slider_title">{{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'title') }}</span>
                        </h1>
                        <p class="home_slider_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'sub_title') }}
                        </p>
                    </div>
                </div>
                <div class="col-md-12 banner-car-img">
                    <img src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'image')) }}"
                        alt="" class="home_slider_image" width="50%">
                </div>
            </div>
        </div>
    </section>

    <section id="search-form-sect">
        <div class="banner-form">
            <div class="form-desc">
                {{-- <p>Convallis dictumst amet, fermentum lorem maecenas mattis morbi dignissim lorem.</p> --}}
            </div>
            <form name="frmSearch" id="frmSearch" action="{{ route('front.template.stock_list', $domain_slug) }}">
                <div class="form-row">
                    <div class="form-box">
                        <select id="make" name="make">
                            <option value="">Make All</option>
                            @foreach ($make as $key => $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-box price">
                        <select id="model_list" name="modal">
                            <option value="">Model Any</option>
                        </select>
                    </div>
                    <!-- <div class="form-box price">
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
                    <x-forms.price-selector :maxPrice="$max_price" page="home" parentClass="form-box price" />

                    <div class="form-box action">
                        <button class="y-btn">Search Cars</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section id="about-us">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-abt-us">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','about_us',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text', 'Description' => 'textarea', 'image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container-fluid">
            <div class="row about-cont-main">
                <div class="col-lg-6 col-md-12 about-des">
                    <div class="sect-title">
                        <h2 class="home_about_us_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'title') }}
                        </h2>
                        <strong
                            class="home_about_us_sub_title">{{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'sub_title') }}</strong>
                        <p class="home_about_us_description">{!! nl2br(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'description')) !!}</p>
                        {{-- <a class="y-btn" href="#">View Details</a> --}}
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 about-img">
                    <span><img
                            src="{{ asset(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'image')) }}"
                            alt="" class="home_about_us_image"></span>
                </div>
            </div>
        </div>
    </section>

    <section id="our-services">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-our-ser">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services',{{ json_encode(['Title' => 'text']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="o-serv-cont">
                    <div class="sect-title">
                        <h2 class="home_our_services_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'title') }}
                        </h2>
                    </div>
                    <div class="sect-cont">
                        <div class="services-blog row services_div">
                            @foreach ($web_content->services as $service)
                                <div class="col-lg-4 col-md-6 col-sm-12 item-{{ $service->id }}">
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
                                    <div class="services-box">
                                        <span><img src="{{ checkFileExist($service->image) }}" alt=""
                                                class="wd-sl-imgservice"></span>
                                        <div class="srv-desc-box">
                                            <h5><a href="#">{{ $service->title }}</a></h5>
                                            <p>{{ $service->description }}</p>
                                            {{-- <a href="#">Read more <img
                                                    src="{{ asset('assets/web/template/t8/images/r-more.png') }}"
                                                    alt=""></a> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @if (is_login_for_edit() == 1)
                                <div class="col-lg-4 col-md-6 col-sm-12 service-add-btn-t8">
                                    <div class="services-box">
                                        <a href="javascript:;"
                                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services_item',{{ json_encode(['Service Title' => 'text', 'Service Description' => 'textarea', 'Service Image' => 'file']) }})"><i
                                                class="fa fa-plus"></i>
                                            <h6>Add Services</h6>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="our-work">
        {{-- @if (is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn"
                   href="javascript:;"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock',{{json_encode(['Title'=>'text'])}})"><img
                        src="{{asset('assets/web/images/edit-btn.png')}}"></a>
            </div>
        @endif --}}
        <div class="container-fluid">
            <div class="row">
                <div class="o-work-cont">
                    <div class="work-head">
                        <div class="sect-title">
                            <h2 class="home_our_recent_stock_title">
                                {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'title') }}
                            </h2>
                        </div>
                    </div>
                    <div class="sect-cont stock_div">
                        @foreach ($stocks as $key => $value)
                            @php
                                $images = explode(',', $value->images);
                                $stockImg = '';
                                if (!empty($images) && isset($images[0])) {
                                    $stockImg = $images[0];
                                }
                            @endphp
                            @if ($key == '0')
                                <div class="card-row stock-item-{{ $value->id }}">
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
                                    <div class="col-lg-6 col-md-12 work-img">
                                        <span>
                                            <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}"><img src="{{ checkFileExist($stockImg) }}" alt=""></a>
                                        </span>
                                    </div>
                                    <div class="col-lg-6 col-md-12 work-desc">
                                        <h4>{{ $value->make }}</h4>
                                        <strong>£{{ number_format($value->price) }}</strong>
                                        <p>{{ $value->derivative }}</p>
                                        <p>{{ $value->attention_grabber }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($key == '1')
                                <div class="card-row card-two stock-item-{{ $value->id }}">
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
                                    <div class="col-lg-6 col-md-12 work-img">
                                        <span>
                                            <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}"><img src="{{ checkFileExist($stockImg) }}" alt=""></a>
                                        </span>
                                    </div>
                                    <div class="col-lg-6 col-md-12 work-desc">
                                        <h4>{{ $value->make }}</h4>
                                        <strong>£{{ number_format($value->price) }}</strong>
                                        <p>{{ $value->derivative }}</p>
                                        <p>{{ $value->attention_grabber }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div class="card-grid-row row">
                            @foreach ($stocks as $key => $value)
                                @php
                                    $images = explode(',', $value->images);
                                    $stockImg = '';
                                    if (!empty($images) && isset($images[0])) {
                                        $stockImg = $images[0];
                                    }
                                @endphp
                                @if ($key >= '2' && $key <= '5')
                                    <div class="col-lg-6 col-md-12 stock-item-{{ $value->id }}">
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
                                        <div class="card-row">
                                            <div class="work-img">
                                                <span>
                                                    <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}"><img src="{{ checkFileExist($stockImg) }}" alt=""></a>
                                                </span>
                                            </div>
                                            <div class="work-desc">
                                                <h4>{{ $value->make }}</h4>
                                                <strong>£{{ number_format($value->price) }}</strong>
                                                <p>{{ $value->derivative }}</p>
                                                <p>{{ $value->attention_grabber }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            {{-- @if (is_login_for_edit() == 1)
                                <div class="col-lg-6 col-md-12 stock-action-add-more">
                                    <div class="wd-md-our-work-blog-img-t8">
                                        <a href="javascript:;"
                                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}})"><i
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

    <section id="we-offer">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','offer',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="offer-cont">
                    <div class="offer-img">
                        <img src="{{ asset(get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'image')) }}"
                            alt="" class="home_offer_image">
                    </div>
                    <div class="offer-des">
                        <h3 class="home_offer_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'title') }}
                        </h3>
                        <p class="home_offer_sub_title">{!! nl2br(get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'sub_title')) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonial">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials',{{ json_encode(['Title' => 'text']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container-fluid">

            <div class="sect-title">
                <h2 class="home_testimonials_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'title') }}
                </h2>
            </div>
            <div class="test-slider-blog testimonial_div">
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
                            <div class="slide-box">
                                <img src="{{ asset('assets/web/template/t8/images/testimonial-vector.png') }}"
                                    alt="">
                                <p>{{ $testimonial->description }}</p>
                                <span><img src="{{ checkFileExist($testimonial->author_image) }}" alt=""></span>
                                <h3>{{ $testimonial->author_name }}</h3>
                                {{-- <a href="#">Read more <img
                                        src="{{ asset('assets/web/template/t8/images/r-more.png') }}" alt=""></a> --}}
                            </div>
                        </div>
                    @endforeach
                    <div class="pp-quote testimonial-action-add-btn-t8">
                        <a herf="javascript:;"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials_item',{{ json_encode(['Title' => 'text', 'Description' => 'textarea', 'Label' => 'text', 'Author Name' => 'text', 'Author Image' => 'file']) }})"><i
                                class="fa fa-plus"></i>
                            <h6>Add Testimonial</h6>
                        </a>
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
