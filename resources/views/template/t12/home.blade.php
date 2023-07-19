@extends('layouts.template.t12.app')

@section('style')
    <style>
        .wd-md-search-car-blog .wd-md-serach-car-form select.wd-md-make-all {
            width: 25%;
        }

        .wd-md-search-car-blog .wd-md-serach-car-form select {
            width: 25%;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection

@section('content')
    <section class="wd-md-home">
        <video id="background-video" autoplay loop muted poster="https://assets.codepen.io/6093409/river.jpg">
            {{-- <source src="https://assets.codepen.io/6093409/river.mp4" type="video/mp4"> --}}
            <source
                src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'image')) }}"
                type="video/mp4">
        </video>
        <div class="container-fluid">
            @if (is_login_for_edit() == 1)
                <div class="wd-edit-fir-sec">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','slider',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'Image' => 'file']) }})"><img
                            src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                </div>
            @endif
            <div class="wd-md-home-title">
                <h1 class="home_slider_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'title') }}</h1>
                <p class="home_slider_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'sub_title') }}
                </p>
            </div>
        </div>
        <div class="wd-md-logo-slider">
            <div class="slider-vertical">
                <div class="wd-md-logo-blog">
                    <img src="{{ asset('assets/web/template/t12/images/logo-1.png') }}" class="img-fluid">
                </div>
                <div class="wd-md-logo-blog">
                    <img src="{{ asset('assets/web/template/t12/images/logo-2.png') }}" class="img-fluid">
                </div>
                <div class="wd-md-logo-blog">
                    <img src="{{ asset('assets/web/template/t12/images/logo-3.png') }}" class="img-fluid">
                </div>
                <div class="wd-md-logo-blog">
                    <img src="{{ asset('assets/web/template/t12/images/logo-4.png') }}" class="img-fluid">
                </div>
                <div class="wd-md-logo-blog">
                    <img src="{{ asset('assets/web/template/t12/images/logo-5.png') }}" class="img-fluid">
                </div>
                <div class="wd-md-logo-blog">
                    <img src="{{ asset('assets/web/template/t12/images/logo-1.png') }}" class="img-fluid">
                </div>
                <div class="wd-md-logo-blog">
                    <img src="{{ asset('assets/web/template/t12/images/logo-2.png') }}" class="img-fluid">
                </div>
                <div class="wd-md-logo-blog">
                    <img src="{{ asset('assets/web/template/t12/images/logo-3.png') }}" class="img-fluid">
                </div>
                <div class="wd-md-logo-blog">
                    <img src="{{ asset('assets/web/template/t12/images/logo-4.png') }}" class="img-fluid">
                </div>
                <div class="wd-md-logo-blog">
                    <img src="{{ asset('assets/web/template/t12/images/logo-5.png') }}" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <section class="wd-md-about">
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
                    <select id="model_list" name="modal" class="custom-select wd-md-make-all">
                        <option value="">Model Any</option>
                    </select>
                    {{-- <div class="form-box price">
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
                    <x-forms.price-selector :maxPrice="$max_price" page="home" parentClass="form-box price" />

                    <button class="btn car-search-btn">
                        <span>
                            <svg width="33" height="23" viewBox="0 0 33 23" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_25_871)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M2.42014 8.01299C-0.190211 6.70701 0.11057 5.25035 2.73435 5.40368L3.3198 6.48759L4.53098 2.78644C5.00632 1.32184 5.79856 0 7.35349 0H22.8303C24.3825 0 25.2768 1.29805 25.6528 2.77851L26.5605 6.37391L27.0976 5.40368C29.7832 5.2477 30.0329 6.78897 27.1889 8.11874C26.8054 7.97424 26.4101 7.86192 26.0073 7.78299C25.5243 7.68904 25.0333 7.64123 24.541 7.64023C24.0495 7.64005 23.5592 7.68787 23.0774 7.78299C22.5892 7.87832 22.1122 8.02272 21.654 8.21391C21.197 8.40009 20.7598 8.63033 20.3488 8.90126C19.9366 9.16992 19.5517 9.47713 19.1994 9.81862C18.8508 10.1646 18.5378 10.5436 18.2649 10.9501C17.711 11.7586 17.3254 12.6672 17.1304 13.6233C16.9354 14.5794 16.9349 15.564 17.1289 16.5203C17.2171 16.948 17.3429 17.3673 17.5049 17.7734L17.5639 17.9241C17.5962 18.0008 17.6284 18.0748 17.6633 18.1515H5.72068V18.8494C5.71926 19.0794 5.62563 19.2996 5.46017 19.462C5.2947 19.6244 5.07078 19.7159 4.83713 19.7166H1.07737C0.843252 19.7166 0.618645 19.6254 0.452599 19.4629C0.286552 19.3004 0.192555 19.0799 0.191136 18.8494V16.8455C0.188476 16.8006 0.188476 16.7556 0.191136 16.7107C-0.0854749 13.1126 -0.485621 9.86885 2.42014 8.01299ZM25.489 9.5992C26.5479 9.59868 27.588 9.87495 28.503 10.3998C29.4179 10.9246 30.1749 11.6791 30.6966 12.5863C31.2182 13.4934 31.4859 14.5207 31.4721 15.563C31.4584 16.6054 31.1638 17.6254 30.6184 18.519L32.9333 21.0014C32.9849 21.0565 33.0121 21.1294 33.0091 21.2043C33.0061 21.2791 32.973 21.3497 32.9172 21.4006L31.2173 22.926C31.1898 22.951 31.1575 22.9705 31.1224 22.9832C31.0873 22.996 31.0499 23.0018 31.0125 23.0003C30.9751 22.9989 30.9383 22.9901 30.9043 22.9747C30.8703 22.9592 30.8398 22.9372 30.8144 22.9101L28.5988 20.5123C28.1695 20.7708 27.7083 20.9743 27.2265 21.1177C26.6662 21.2882 26.0835 21.3773 25.497 21.3821C24.7127 21.3831 23.936 21.2313 23.2116 20.9353C22.486 20.6384 21.8264 20.2046 21.27 19.6584V19.6425C20.7216 19.0984 20.2856 18.4546 19.9863 17.747C19.6083 16.8537 19.4599 15.8825 19.5542 14.9192C19.6485 13.956 19.9827 13.0306 20.5271 12.2248C21.0716 11.4191 21.8094 10.758 22.6754 10.3C23.5413 9.842 24.5087 9.6013 25.4917 9.5992H25.489ZM28.8647 12.1609C28.4211 11.7241 27.8946 11.3774 27.3152 11.1405H27.299C26.7255 10.9091 26.1115 10.7905 25.4917 10.7915C24.8654 10.7888 24.2448 10.9084 23.6658 11.1435C23.0868 11.3786 22.5609 11.7244 22.1186 12.1609C21.6737 12.5967 21.3214 13.1152 21.082 13.6863V13.6863C20.7215 14.5446 20.6275 15.4888 20.8116 16.3997C20.9958 17.3107 21.45 18.1474 22.1169 18.8045C22.7837 19.4615 23.6333 19.9093 24.5585 20.0914C25.4837 20.2735 26.4429 20.1817 27.3152 19.8276C27.8936 19.5887 28.4197 19.2423 28.8647 18.8071C29.5307 18.1501 29.9845 17.3139 30.1689 16.4037C30.3534 15.4935 30.2603 14.5499 29.9013 13.6916C29.6607 13.1196 29.3085 12.5996 28.8647 12.1609V12.1609ZM7.22727 12.2799L3.88376 11.8675C3.09421 11.7802 2.88205 12.108 3.15329 12.7769L3.51316 13.6414C3.6163 13.8434 3.77198 14.0149 3.96433 14.1384C4.19287 14.2668 4.45048 14.3368 4.7136 14.342L7.69724 14.3657C8.41697 14.3657 8.72849 14.0802 8.5029 13.4272C8.42245 13.137 8.25979 12.8752 8.03393 12.6726C7.80806 12.4699 7.52829 12.3346 7.22727 12.2825V12.2799ZM4.56858 7.30448H25.2258L24.3127 3.5769C24.063 2.44276 23.3459 1.46195 22.1643 1.46195H7.86643C6.68479 1.46195 6.07785 2.4692 5.71799 3.5769L4.56858 7.30448Z"
                                        fill="#FFDD9B" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_25_871">
                                        <rect width="33" height="23" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </span>Search Car
                    </button>
                </form>
            </div>
        </div>
        <div class="container">
            @if (is_login_for_edit() == 1)
                <div class="wd-edit-abt-us-lower">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','about_us',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text', 'Description' => 'textarea', 'image' => 'file']) }})"><img
                            src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                </div>
            @endif
            <div class="wd-md-about-title">
                <h2 class="home_about_us_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'sub_title') }}
                </h2>
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
                        <h2 class="home_about_us_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'title') }}
                        </h2>
                        <p class="home_about_us_description">{!! nl2br(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'description')) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wd-md-our-services">
        <div class="container">
            @if (is_login_for_edit() == 1)
                <div class="wd-edit-our-ser-t4">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text']) }})"><img
                            src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                </div>
            @endif
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
    </section>
    <section class="wd-md-testimonial">
        <div class="container">
            <div class="row align-items-center">
                @if (is_login_for_edit() == 1)
                    <div class="wd-edit-testimonial">
                        <a class="wd-edit-btn" href="javascript:;"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text']) }})"><img
                                src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                    </div>
                @endif
                <div class="col-lg-5">
                    <div class="wd-md-testimonial-detail">
                        <h2 class="home_testimonials_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'title') }}
                        </h2>
                        <p class="home_testimonials_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'sub_title') }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="wd-md-testimonial-blog testimonial_div">
                        <div class="owl-carousel owl-theme">
                            @foreach ($web_content->testimonial as $testimonial)
                                <div class="item testimonial-item-{{ $testimonial->id }}">
                                    @if (is_login_for_edit() == 1)
                                        <div class="testimonial-action-div">
                                            <a href="javascript:;" class="testimonial-action-remove"
                                                onclick="remove_items({{ $testimonial->id }},'testimonials_item','testimonial-item-{{ $testimonial->id }}')"><i
                                                    class="fa fa-trash"></i></a>
                                            <a herf="javascript:;" class="testimonial-action-edit"
                                                onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials_item',{{ json_encode(['Title' => 'text', 'Description' => 'textarea', 'Label' => 'text', 'Author Name' => 'text']) }},{{ $testimonial->id }})"><i
                                                    class="fa fa-edit"></i></a>
                                        </div>
                                    @endif
                                    <div class="wd-md-testimo-descripation">
                                        <h6>{{ $testimonial->author_name }}</h6>
                                        <p>{{ $testimonial->description }}</p>
                                    </div>
                                    <div class="wd-md-testi-btn d-flex align-items-center justify-content-between">
                                        <a href="javascript:;" class="wd-great-btn">{{ $testimonial->label }}</a>
                                        {{-- <a href="javascript:;" class="wd-read-more">Read More --}}
                                        <span>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1 8.00014C1 7.86753 1.05268 7.74036 1.14645 7.64659C1.24021 7.55282 1.36739 7.50014 1.5 7.50014H13.293L10.146 4.35414C10.0521 4.26026 9.99937 4.13292 9.99937 4.00014C9.99937 3.86737 10.0521 3.74003 10.146 3.64614C10.2399 3.55226 10.3672 3.49951 10.5 3.49951C10.6328 3.49951 10.7601 3.55226 10.854 3.64614L14.854 7.64614C14.9006 7.69259 14.9375 7.74776 14.9627 7.80851C14.9879 7.86926 15.0009 7.93438 15.0009 8.00014C15.0009 8.06591 14.9879 8.13103 14.9627 8.19178C14.9375 8.25252 14.9006 8.3077 14.854 8.35414L10.854 12.3541C10.7601 12.448 10.6328 12.5008 10.5 12.5008C10.3672 12.5008 10.2399 12.448 10.146 12.3541C10.0521 12.2603 9.99937 12.1329 9.99937 12.0001C9.99937 11.8674 10.0521 11.74 10.146 11.6461L13.293 8.50014H1.5C1.36739 8.50014 1.24021 8.44746 1.14645 8.3537C1.05268 8.25993 1 8.13275 1 8.00014Z"
                                                    fill="black" stroke="black" stroke-width="0.5" />
                                            </svg>
                                        </span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            <div class="item">
                                <div class="wd-add-testimonial">
                                    <a href="javascript:;"
                                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials_item',{{ json_encode(['Title' => 'text', 'Description' => 'textarea', 'Label' => 'text', 'Author Name' => 'text']) }})">
                                        <i class="fas fa-plus"></i>
                                        <p>Add Testimonial</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wd-md-recent-stock">
        <div class="container">
            {{-- @if (is_login_for_edit() == 1)
                <div class="wd-edit-testimonial">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_recent_stock',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text']) }})"><img
                            src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                </div>
            @endif --}}
            <div class="wd-md-recent-title text-center">
                <h2 class="home_our_recent_stock_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'title') }}
                </h2>
                <p class="home_our_recent_stock_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'sub_title') }}
                </p>
            </div>
            <div class="wd-md-recent-stock-img">
                <div class="row stock_div">
                    @foreach ($stocks as $key => $value)
                        @php
                            $images = explode(',', $value->images);
                            $stockImg = '';
                            if (!empty($images) && isset($images[0])) {
                                $stockImg = $images[0];
                            }
                        @endphp
                        @if ($key == 0)
                            <div class="col-lg-6 stock-item-{{ $value->id }}">
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
                                <div class="wd-rec-sto-img-main">
                                    <img src="{{ checkFileExist($stockImg) }}" class="img-fluid wd-main-img">
                                    <div class="wd-md-car-description d-flex align-items-end justify-content-between">
                                        <div class="car-name">
                                            <h6>{{ $value->make }}</h6>
                                            <p>{{ $value->attention_grabber }}</p>
                                        </div>
                                        <div class="car-price">
                                            <p>£{{ number_format($value->price) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="col-lg-6">
                        <div class="wd-md-rec-sto-img-right">
                            <div class="row">
                                @foreach ($stocks as $key => $value)
                                    @php
                                        $images = explode(',', $value->images);
                                        $stockImg = '';
                                        if (!empty($images) && isset($images[0])) {
                                            $stockImg = $images[0];
                                        }
                                    @endphp
                                    @if ($key != 0 && $key < 5)
                                        <div class="col-lg-6">
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
                                            <div class="rec-sto-right-img">
                                                <img src="{{ checkFileExist($stockImg) }}" class="img-fluid">
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                {{-- @if (is_login_for_edit() == 1)
                                <div class="col-lg-6">
                                    <a href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}})">
                                        <div class="wd-add-stock">
                                            <i class="fas fa-plus"></i>
                                            <p>Add Stock</p>
                                        </div>
                                    </a>
                                </div>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wd-md-offer-blog">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','offer',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container-fluid">
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
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
    </script>
    <script>
        var slickCarousel = $('.slider-vertical');
        slickCarousel.slick({
            infinite: true,
            speed: 300,
            slidesToShow: 6,
            slidesToScroll: 1,
            vertical: true,
            verticalSwiping: true,
            dots: false,
            arrows: false,
            responsive: [{
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                }, {
                    breakpoint: 639,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 1,
                        vertical: true,
                        verticalSwiping: true,
                    }
                }

            ]
        });


        //mouse wheel
        slickCarousel.mousewheel(function(e) {
            e.preventDefault();
            if (e.deltaY < 0) {
                $(this).slick('slickNext');
            } else {
                $(this).slick('slickPrev');
            }
        });
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
