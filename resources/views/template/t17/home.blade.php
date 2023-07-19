@extends('layouts.template.t17.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection
@section('content')
    <section id="banner">
        <div class="container">
            <div class="wd-edit-banner">
                @if (is_login_for_edit() == 1)
                    <div class="wd-edit-fir-sec">
                        <a class="wd-edit-btn" href="javascript:;"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','slider',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'Image' => 'file']) }})"><img
                                src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-5 my-auto">
                    <div class="wd-kr-banertitle">
                        <small>Most popular car</small>
                        <h1 class="white_txt home_slider_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'title') }}
                        </h1>
                        <p class="white_txt home_slider_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'sub_title') }}
                        </p>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="wd-kr-bannercar">
                        <img src="{{ asset(get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'image')) }}"
                            class="home_slider_image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wd-kr-about">
        <div class="wd-kr-search-car-blog">
            <div class="container">
                <div class="wd-kr-srch-car-box">
                    <form name="frmSearch" class="form-inline justify-content-between wd-kr-serach-car-form" id="frmSearch"
                        action="{{ route('front.template.stock_list', $domain_slug) }}">
                        <select id="make" name="make" class="custom-select wd-kr-make-all">
                            <option value="">Make All</option>
                            @foreach ($make as $key => $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        <select id="model_list" name="modal" class="custom-select wd-kr-make-all form-control">
                            <option value="">Model Any</option>
                        </select>
                        <!-- <div class="form-group">
                                                <div class="d-flex justify-content-between wd-width">
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
                                                <div class="d-flex justify-content-between wd-width">
                                                    <span>£0</span>
                                                    <span>£{{ $max_price }}</span>
                                                </div>
                                            </div> -->
                        <x-forms.price-selector :maxPrice="$max_price" page="home" parentClass="form-group" />
                        <div class="mrgl_5 mt-2 text-end">
                            <button class="btn car-search-btn wd-kr-srch-car">Search Car</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="welcome">
        <div class="container">
            <div class="wd-edit-welcm">
                @if (is_login_for_edit() == 1)
                    <div class="wd-edit-welcome-section">
                        <a class="wd-edit-btn" href="javascript:;"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','welcome',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'Image' => 'file']) }})"><img
                                src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                    </div>
                @endif
            </div>
            <div class="wd-kr-cmn-title position-relative text-center">
                <h1 class="home_welcome_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'welcome', 'title') }}</h1>
                <p class="home_welcome_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'welcome', 'sub_title') }}
                </p>
            </div>
        </div>
        <div class="container-fluid">
            <div class="wd-kr-welcmbg text-center">
                <img src="{{ asset(get_web_content_detail($web_content->id, $web_content->template, 'home', 'welcome', 'image')) }}"
                    class="home_welcome_image" width="90%">
            </div>
        </div>
    </section>
    <section id="services">
        <div class="container">
            <div class="wd-edit-services">
                @if (is_login_for_edit() == 1)
                    <div class="wd-edit-our-ser-t4">
                        <a class="wd-edit-btn" href="javascript:;"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text']) }})"><img
                                src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="wd-kr-cmn-title position-relative text-center">
                        <h1 class="home_our_services_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'title') }}
                        </h1>
                        <p class="text-center home_our_services_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'sub_title') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="services_div">
                <div class="row mrgt_40">
                    @foreach ($web_content->services as $key => $service)
                        @if ($loop->index == '0' || $loop->index == '1' || $loop->index == '2')
                            <div class="col-md-4 item-{{ $service->id }}">
                                @if (is_login_for_edit() == 1)
                                    <div class="services-action-div">
                                        <a href="javascript:;" class="service-action-remove"
                                            onclick="remove_items({{ $service->id }},'our_services_item','item-{{ $service->id }}')"><i
                                                class="fa fa-trash"></i></a>
                                        <a href="javascript:;" class="service-action-edit"
                                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services_item',{{ json_encode(['Service Title' => 'text', 'Service Description' => 'textarea', 'Service Image' => 'file']) }},{{ $service->id }})"><i
                                                class="fa fa-edit"></i></a>
                                    </div>
                                @endif
                                <div class="wd-kr-services-box">
                                    <div class="wd-kr-service-icn">
                                        <img src="{{ checkFileExist($service->image) }}" width="50">
                                    </div>
                                    <div class="wd-kr-service-txt">
                                        <h3>{{ $service->title }}</h3>
                                        <p>{{ $service->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-10 mrgt_40 mrg_auto my-auto">
                        <div class="row">
                            @foreach ($web_content->services as $key => $service)
                                @if ($loop->index > '2')
                                    <div class="col-md-6 item-{{ $service->id }}">
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
                                        <div class="wd-kr-services-box">
                                            <div class="wd-kr-service-icn">
                                                <img src="{{ checkFileExist($service->image) }}" width="50">
                                            </div>
                                            <div class="wd-kr-service-txt">
                                                <h3>{{ $service->title }}</h3>
                                                <p>{{ $service->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if (is_login_for_edit() == 1)
                                <div class="col-md-6">
                                    <div class="wd-kr-services-box">
                                        <a href="javascript:;"
                                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services_item',{{ json_encode(['Service Title' => 'text', 'Service Description' => 'textarea', 'Service Image' => 'file']) }})">
                                            <div class="wd-add-services">
                                                <i class="fas fa-plus"></i>
                                                <p>Add Services</p>
                                            </div>
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
    <section id="stock">
        <div class="container">
            <div class="wd-edit-stock">
                {{-- @if (is_login_for_edit() == 1)
                    <div class="wd-edit-testimonial">
                        <a class="wd-edit-btn"
                           href="javascript:;"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock',{{json_encode(['Title'=>'text','Sub Title'=>'text'])}})"><img
                                src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                    </div>
                @endif --}}
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="wd-kr-banertitle text-center">
                        <h1 class="home_our_recent_stock_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'title') }}
                        </h1>
                        <p class="mrgb_30 home_our_recent_stock_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'sub_title') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="wd-kr-stock-main stock_div">
                <div class="row">
                    @foreach ($stocks as $key => $value)
                        @if ($key < 6)
                            @php
                                $images = explode(',', $value->images);
                                $stockImg = '';
                                if (!empty($images) && isset($images[0])) {
                                    $stockImg = $images[0];
                                }
                            @endphp
                            <div class="col-md-4 stock-item-{{ $value->id }} mt-2">
                                {{-- @if (is_login_for_edit() == 1)
                        <div class="services-action-prt text-center">
                            <a href="javascript:;" class="stock-action-remove"
                               onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                    class="fa fa-trash"></i></a>
                            <a herf="javascript:;" class="stock-action-edit"
                               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                    class="fa fa-edit"></i></a>
                        </div>
                    @endif --}}
                                <div class="wd-kr-stocks">
                                    <div class="wd-kr-stock-car-img">
                                        <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}">
                                            <img src="{{ checkFileExist($stockImg) }}" />
                                        </a>                                        
                                    </div>
                                    <div class="wd-kr-stock_content">
                                        <div class="wd-kr-stock_top">
                                            <div class="wd-kr-stock_topright text-center">
                                                <span>{{ $value->make }}</span>
                                                <small>{{ $value->derivative }}</small><br>
                                                <small><b>{{ $value->attention_grabber }}</b></small>
                                            </div>
                                        </div>
                                        <div class="wd-kr-stock_middle">
                                            <div class="wd-kr-stockmiddle_inner">
                                                <small>Category</small>
                                                <span><b>{{ $value->category }}</b></span>
                                            </div>
                                            <div class="wd-kr-stockmiddle_inner">
                                                <small>Transmission</small>
                                                <span><b>{{ $value->transmission }}</b></span>
                                            </div>
                                            <div class="wd-kr-stockmiddle_inner">
                                                <small>Colour</small>
                                                <span><b>{{ $value->colour }}</b></span>
                                            </div>
                                            <div class="wd-kr-stockmiddle_inner">
                                                <small>Mileage</small>
                                                <span><b>{{ $value->mileage }}</b></span>
                                            </div>
                                        </div>
                                        <h4>£{{ number_format($value->price) }}</h4>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    {{-- @if (is_login_for_edit() == 1)
                        <div class="col-md-4 stock-item stock-action-add-more">
                            <div class="wd-md-our-work-blog-img-t11">
                                <a href="javascript:;"
                                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}})"><i
                                        class="fa fa-plus"></i>
                                    <h4>Add Stock</h4>
                                </a>
                            </div>
                        </div>
                    @endif --}}
                </div>
            </div>
            <div class="text-center mrgt_55">
                <a href="{{ route('front.template.stock_list', $domain_slug) }}" class="wd-kr-cmmn-btn">View All</a>
            </div>
        </div>
        </div>
    </section>
    <section id="testimonal">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="wd-kr-banertitle text-center">
                        <h1 class="home_testimonials_title">
                            <b>{{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'title') }}</b>
                        </h1>
                        <p class="home_testimonials_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'sub_title') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row testimonial_div">
            <div class="owl-carousel loop">
                @foreach ($web_content->testimonial as $testimonial)
                    <div class="item testimonial-item-{{ $testimonial->id }}">
                        <div class="wd-kr-testi_box">
                            <div class="text-left">
                                <a href="javascript:;" class="wd-kr-cmmn-btn">{{ $testimonial->label }}</a>
                            </div>
                            @if (is_login_for_edit() == 1)
                                <div class="testi-action-prt text-right">
                                    <a href="javascript:;" class="testimonial-action-remove"
                                        onclick="remove_items({{ $testimonial->id }},'testimonials_item','testimonial-item-{{ $testimonial->id }}')"><i
                                            class="fa fa-trash"></i></a>
                                    <a href="javascript:;" class="testimonial-action-edit"
                                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials_item',{{ json_encode(['Description' => 'textarea', 'Label' => 'text', 'Author Name' => 'text']) }},{{ $testimonial->id }})"><i
                                            class="fa fa-edit"></i></a>
                                </div>
                            @endif
                            <h3>{{ $testimonial->author_name }}</h3>
                            <p>{{ $testimonial->description }}</p>
                            <a href="javascript:;" class="wd-kr-read-btn">Read more
                                <svg width="18" height="19" viewBox="0 0 20 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_509_610)">
                                        <path
                                            d="M1.29155 13.7363C1.3701 13.7491 1.4496 13.7549 1.52914 13.7539L15.0732 13.7539L14.7778 13.8913C14.4892 14.0279 14.2265 14.2139 14.0017 14.4407L10.2037 18.2388C9.70344 18.7163 9.61939 19.4845 10.0045 20.0589C10.4527 20.671 11.3122 20.8039 11.9243 20.3557C11.9737 20.3194 12.0208 20.2799 12.0649 20.2374L18.9331 13.3693C19.4698 12.8332 19.4703 11.9634 18.9341 11.4267C18.9338 11.4263 18.9334 11.426 18.9331 11.4256L12.0649 4.55747C11.5277 4.0218 10.658 4.023 10.1223 4.56018C10.0802 4.60246 10.0408 4.64744 10.0045 4.69483C9.61939 5.26923 9.70344 6.03738 10.2037 6.51489L13.9949 10.3198C14.1964 10.5216 14.4281 10.6908 14.6817 10.8212L15.0938 11.0067L1.60474 11.0067C0.903027 10.9806 0.287382 11.4708 0.155558 12.1605C0.0341206 12.9094 0.542707 13.6148 1.29155 13.7363Z"
                                            fill="url(#paint0_linear_509_610)" />
                                    </g>
                                    <defs>
                                        <linearGradient id="paint0_linear_509_610" x1="9.73679" y1="20.6211"
                                            x2="9.73679" y2="4.15651" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#6952FE" />
                                            <stop offset="1" stop-color="#505AEB" stop-opacity="0.5" />
                                        </linearGradient>
                                        <clipPath id="clip0_509_610">
                                            <rect width="19.1983" height="19.1983" fill="white"
                                                transform="translate(19.3359 20.1602) rotate(-180)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
                <div class="item testimonial-action-add-btn-t11">
                    <div class="slide-box">
                        <a href="javascript:;"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials_item',{{ json_encode(['Description' => 'textarea', 'Label' => 'text', 'Author Name' => 'text']) }})"><i
                                class="fa fa-plus"></i>
                            <h6>Add Testimonial</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="budget_need">
        <div class="container">
            <div class="wd-edit-plans">
                @if (is_login_for_edit() == 1)
                    <div class="wd-edit-testimonial">
                        <a class="wd-edit-btn" href="javascript:;"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','offer',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'image' => 'file']) }})"><img
                                src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="wd-kr-budget-img">
                        <img class="home_offer_image"
                            src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'image')) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="wd-kr-budget_txt">
                        <h3 class="home_offer_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'title') }}
                        </h3>
                        <p class="home_offer_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'sub_title') }}
                        </p>
                        {{-- <a href="javascript:;" class="wd-kr-cmmn-btn">Read more</a> --}}
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
