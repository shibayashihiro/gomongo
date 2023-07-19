@extends('layouts.template.t7.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection

@php
    $image = get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'image');
@endphp

@section('content')
    <section id="home-banner">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-fir-sec">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','slider',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'Image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 my-auto">
                    <div class="banner-cont">
                        <h3>Welcome to</h3>
                        <h1 class="home_slider_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'title') }}
                        </h1>
                        <p class="home_slider_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'sub_title') }}
                        </p>
                    </div>
                    <div class="banner-form container">
                        <form name="frmSearch" id="frmSearch"
                            action="{{ route('front.template.stock_list', $domain_slug) }}">
                            <div class="form-row row">
                                <div class="form-box col-md-3">
                                    <select id="make" name="make">
                                        <option value="">Make All</option>
                                        @foreach ($make as $key => $value)
                                            <option value="{{ $value }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-box price col-md-3">
                                    <select id="model_list" name="modal">
                                        <option value="">Model Any</option>
                                    </select>
                                </div>
                                <!-- <div class="form-box price col-md-3">
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
                                <div class="form-box price col-md-3">
                                    <select id="min_price-select" name="min_price" class=" mr-2">
                                        <option value="">Min Price</option>
                                        @for ($i = 2000; $i < $max_price - 500; $i += 500)
                                            <option value="{{ $i }}"
                                                {{ request()->min_price == $i ? 'selected' : '' }}>
                                                £{{ number_format($i) }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-box price col-md-3">
                                    <select id="max_price-select" name="max_price" class="">
                                        <option value="">Max Price</option>
                                        @for ($i = 2500; $i <= $max_price; $i += 500)
                                            <option value="{{ $i }}"
                                                {{ request()->max_price == $i ? 'selected' : '' }}>
                                                £{{ number_format($i) }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>

                            </div>
                            <div class="form-box action">
                                <button class="y-btn">Search Cars</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 my-auto">
                    <img src="{{ checkFileExist($image) }}" class="wd-sl-carbanner home_slider_image">
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
        <div class="container">

            <div class="row">
                <div class="col-md-6 wd-sl-leftabtsec">
                    <img src="{{ asset(get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'image')) }}"
                        class="wd-sl-aboutimg home_offer_image">
                </div>
                <div class="col-md-6">
                    <h3 class="home_offer_title">
                        {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'title') }}
                    </h3>
                    <p class="home_offer_sub_title">{!! nl2br(get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'sub_title')) !!}</p>
                </div>
            </div>

        </div>
    </section>
    <section id="services">
        {{-- @if (is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_recent_stock',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif --}}
        <div class="wd-sl-sectcontent text-center">
            <h2 class="home_our_recent_stock_title">
                {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'title') }}
            </h2>
            <p class="home_our_recent_stock_sub_title">
                {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'sub_title') }}
            </p>
        </div>
        <div class="grybg new-car-service">
            <img src="{{ asset('assets/web/template/t7/images/stock_bg.png') }}" class="wd-sl-imgup">
            <div class="container-fluid">
                <div class="row stock_div wd-stock-t7">
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
                            <div class="t7-service-box">
                                <div class="stock-action-div">
                                    <a href="javascript:;" class="stock-action-remove"
                                       onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i class="fa fa-trash"></i></a>
                <a herf="javascript:;" class="stock-action-edit" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i class="fa fa-edit"></i></a>
            </div>
        </div>
        @endif --}}
                                <a href="javascript:;" id="parent">
                                    <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}">
                                        <img src="{{ checkFileExist($stockImg) }}">
                                    </a>
                                    <div id="hover-content">
                                        <h5>{{ $value->make }}</h5>
                                        <p>{{ $value->derivative }}</p>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                    {{-- @if (is_login_for_edit() == 1)
                        <div class="col-md-3 stock-action-add-more">
                            <div class="wd-md-our-work-blog-img-t7">
                                <a href="javascript:;"
                                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}})"><i class="fa fa-plus"></i>
        <h6>Add Stock</h6>
        </a>
    </div>
    </div>
    @endif --}}
                </div>
            </div>
        </div>
    </section>
    <section id="aboutus">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-abt-us-lower">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','about_us',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text', 'Description' => 'textarea', 'image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container-fluid pl-0">

            <div class="row">
                <div class="col-md-6 wd-sl-leftabtsec wd-sec-abt">
                    <img src="{{ asset(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'image')) }}"
                        class="wd-sl-aboutimg othernew-services home_about_us_image">
                </div>
                <div class="col-md-5 my-auto">
                    <h3 class="home_about_us_title">
                        {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'title') }}
                    </h3>
                    <h6 class="home_about_us_sub_title">
                        {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'sub_title') }}
                    </h6>
                    <p class="home_about_us_description">{!! nl2br(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'description')) !!}</p>
                </div>
            </div>

        </div>
    </section>
    <section id="Testimonial" class="mb-5">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="wd-sl-sectcontent text-center pb-5 pt-0">
            <h2 class="home_testimonials_title">
                {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'title') }}
            </h2>
            <p class="home_testimonials_sub_title">
                {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'sub_title') }}
            </p>
        </div>
        <div class="ocean-2">
            <div class="wave-2"></div>
            <div class="wave-2"></div>
        </div>
        <div class="Testimonial-section">
            <div class="container-fluid">
                {{-- @if (is_login_for_edit() == 1 && count($web_content->testimonial) < 7) --}}
                <div class="pp-quote testimonial-action-add-btn-t7">
                    <a herf="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials_item',{{ json_encode(['Title' => 'text', 'Description' => 'textarea', 'Label' => 'text', 'Author Name' => 'text', 'Author Image' => 'file']) }})"><i
                            class="fa fa-plus"></i>
                        <h6>Add Testimonial</h6>
                    </a>
                </div>
                {{-- @endif --}}
                <div class="row testimonial_div">
                    <div class="col-md-8">
                        <div class="sec-eight-text-area">
                            <div class="container-quote">
                                @foreach ($web_content->testimonial as $testimonial)
                                    <div
                                        class="quote quote-text-{{ $loop->index + 1 }} @if ($loop->index == '0') show @else hide-top @endif">
                                        <div class="wd-dr-services">
                                            <div class="sec-title">
                                                <h1>What Our Client Say</h1>
                                                <svg width="96" height="76" viewBox="0 0 96 76" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.25"
                                                        d="M34.6688 75.0602H0.0810547V50.3195C0.0810547 40.3083 0.942671 32.4307 2.6659 26.6866C4.4712 20.8604 7.75354 15.6497 12.513 11.0544C17.2724 6.45912 23.3447 2.84854 30.73 0.222656L37.4998 14.5009C30.6069 16.7985 25.6423 19.9988 22.6062 24.1017C19.6521 28.2047 18.0929 33.6616 17.9288 40.4725H34.6688V75.0602ZM92.3971 75.0602H57.8094V50.3195C57.8094 40.2263 58.671 32.3076 60.3942 26.5635C62.1995 20.8194 65.4819 15.6497 70.2413 11.0544C75.0827 6.45912 81.1551 2.84854 88.4583 0.222656L95.2281 14.5009C88.3352 16.7985 83.3707 19.9988 80.3345 24.1017C77.3804 28.2047 75.8213 33.6616 75.6571 40.4725H92.3971V75.0602Z"
                                                        fill="white" />
                                                </svg>
                                                <p>{{ $testimonial->description }}</p>
                                            </div>
                                            <div class="wd-sl-testuserdetail">
                                                <img src="{{ checkFileExist($testimonial->author_image) }}"
                                                    class="mr-3">
                                                <div class="wd-sl-testuserright">
                                                    <h5>{{ $testimonial->author_name }}</h5>
                                                    <h6>{{ $testimonial->label }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-sg-wl">
                            <div class="container-pe-quote left">
                                @foreach ($web_content->testimonial as $testimonial)
                                    @if ($loop->index <= '3')
                                        <div
                                            class="pp-quote li-quote-{{ $loop->index + 1 }} @if ($loop->index == '0') active @endif testimonial-item-{{ $testimonial->id }}">
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
                                            <img src="{{ checkFileExist($testimonial->author_image) }}" alt="">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="container-pe-quote right">
                                @foreach ($web_content->testimonial as $testimonial)
                                    @if ($loop->index >= '4')
                                        <div
                                            class="pp-quote li-quote-{{ $loop->index + 1 }} testimonial-item-{{ $testimonial->id }}">
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
                                            <img src="{{ checkFileExist($testimonial->author_image) }}" alt="">
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="services">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-our-ser-t4">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container-fluid">
            <div class="wd-sl-sectcontent text-center pt-5">
                <h2 class="home_our_services_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'title') }}
                </h2>
                <p class="home_our_services_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'sub_title') }}
                </p>
            </div>
            <div class="wd-sl-servicesothers pt-5 pb-5">
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
                            <div class="card-body">
                                <img src="{{ checkFileExist($service->image) }}">
                                <h6>{{ $service->title }}</h6>
                                <p>{{ $service->description }}</p>
                            </div>
                        </div>
                    @endforeach
                    @if (is_login_for_edit() == 1)
                        <div class="col-md-4 service-add-btn-t7">
                            <div class="card-body">
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
