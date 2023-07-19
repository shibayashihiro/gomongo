@extends('layouts.template.t21.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection

@section('content')
    <section id="banner">
        <div class="container">
            <div class="wd-edit-banner">
                @if (is_login_for_edit() == 1)
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','slider',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'Image' => 'file']) }})"><img
                            src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                @endif
            </div>
            <div class="row">
                <div class="col-md-5 my-auto">
                    <div class="wd-sl-banertitle">
                        <h5>Let's Introduce</h5>
                        <h1 class="home_slider_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'title') }}
                        </h1>
                        <p class="home_slider_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'sub_title') }}
                        </p>
                        <a href="{{ route('front.template.stock_list', $domain_slug) }}" class="common-btn">Explore More</a>
                    </div>
                </div>
                <div class="col-md-7">
                    <img src="{{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'image') }}"
                        class="wd-sl-bannerimg home_slider_image">
                </div>
            </div>
        </div>
    </section>
    <section id="filter">
        <h1>Search Car</h1>
        <div class="wd-sl-srchlist-filter">
            <div class="wd-sl-cfilter">
                <form name="frmSearch" id="frmSearch" action="{{ route('front.template.stock_list', $domain_slug) }}">
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

                    <div class="form-group mb-0">
                        <button type="submit" class="form-btn"><svg width="33" height="23" viewBox="0 0 33 23"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_572_15312)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M2.42014 8.01299C-0.190211 6.70701 0.11057 5.25035 2.73435 5.40368L3.3198 6.48759L4.53098 2.78644C5.00632 1.32184 5.79856 0 7.35349 0H22.8303C24.3825 0 25.2768 1.29805 25.6528 2.77851L26.5605 6.37391L27.0976 5.40368C29.7832 5.2477 30.0329 6.78897 27.1889 8.11874C26.8054 7.97424 26.4101 7.86192 26.0073 7.78299C25.5243 7.68904 25.0333 7.64123 24.541 7.64023C24.0495 7.64005 23.5592 7.68787 23.0774 7.78299C22.5892 7.87832 22.1122 8.02272 21.654 8.21391C21.197 8.40009 20.7598 8.63033 20.3488 8.90126C19.9366 9.16992 19.5517 9.47713 19.1994 9.81862C18.8508 10.1646 18.5378 10.5436 18.2649 10.9501C17.711 11.7586 17.3254 12.6672 17.1304 13.6233C16.9354 14.5794 16.9349 15.564 17.1289 16.5203C17.2171 16.948 17.3429 17.3673 17.5049 17.7734L17.5639 17.9241C17.5962 18.0008 17.6284 18.0748 17.6633 18.1515H5.72068V18.8494C5.71926 19.0794 5.62563 19.2996 5.46017 19.462C5.2947 19.6244 5.07078 19.7159 4.83713 19.7166H1.07737C0.843252 19.7166 0.618645 19.6254 0.452599 19.4629C0.286552 19.3004 0.192555 19.0799 0.191136 18.8494V16.8455C0.188476 16.8006 0.188476 16.7556 0.191136 16.7107C-0.0854749 13.1126 -0.485621 9.86885 2.42014 8.01299ZM25.489 9.5992C26.5479 9.59868 27.588 9.87495 28.503 10.3998C29.4179 10.9246 30.1749 11.6791 30.6966 12.5863C31.2182 13.4934 31.4859 14.5207 31.4721 15.563C31.4584 16.6054 31.1638 17.6254 30.6184 18.519L32.9333 21.0014C32.9849 21.0565 33.0121 21.1294 33.0091 21.2043C33.0061 21.2791 32.973 21.3497 32.9172 21.4006L31.2173 22.926C31.1898 22.951 31.1575 22.9705 31.1224 22.9832C31.0873 22.996 31.0499 23.0018 31.0125 23.0003C30.9751 22.9989 30.9383 22.9901 30.9043 22.9747C30.8703 22.9592 30.8398 22.9372 30.8144 22.9101L28.5988 20.5123C28.1695 20.7708 27.7083 20.9743 27.2265 21.1177C26.6662 21.2882 26.0835 21.3773 25.497 21.3821C24.7127 21.3831 23.936 21.2313 23.2116 20.9353C22.486 20.6384 21.8264 20.2046 21.27 19.6584V19.6425C20.7216 19.0984 20.2856 18.4546 19.9863 17.747C19.6083 16.8537 19.4599 15.8825 19.5542 14.9192C19.6486 13.956 19.9827 13.0306 20.5271 12.2248C21.0716 11.4191 21.8094 10.758 22.6754 10.3C23.5413 9.842 24.5087 9.6013 25.4917 9.5992H25.489ZM28.8647 12.1609C28.4211 11.7241 27.8946 11.3774 27.3152 11.1405H27.299C26.7255 10.9091 26.1115 10.7905 25.4917 10.7915C24.8654 10.7888 24.2448 10.9084 23.6658 11.1435C23.0868 11.3786 22.5609 11.7244 22.1186 12.1609C21.6737 12.5967 21.3214 13.1152 21.082 13.6863C20.7215 14.5446 20.6275 15.4888 20.8116 16.3997C20.9958 17.3107 21.45 18.1474 22.1169 18.8045C22.7837 19.4615 23.6334 19.9093 24.5585 20.0914C25.4837 20.2735 26.4429 20.1817 27.3152 19.8276C27.8936 19.5887 28.4197 19.2423 28.8647 18.8071C29.5307 18.1501 29.9845 17.3139 30.1689 16.4037C30.3534 15.4935 30.2603 14.5499 29.9013 13.6916C29.6607 13.1196 29.3085 12.5996 28.8647 12.1609ZM7.22727 12.2799L3.88376 11.8675C3.09421 11.7802 2.88205 12.108 3.15329 12.7769L3.51316 13.6414C3.6163 13.8434 3.77198 14.0149 3.96433 14.1384C4.19287 14.2668 4.45048 14.3368 4.7136 14.342L7.69724 14.3657C8.41697 14.3657 8.72849 14.0802 8.5029 13.4272C8.42245 13.137 8.25979 12.8752 8.03393 12.6726C7.80806 12.4699 7.52829 12.3346 7.22727 12.2825V12.2799ZM4.56858 7.30448H25.2258L24.3127 3.5769C24.063 2.44276 23.3459 1.46195 22.1643 1.46195H7.86643C6.68479 1.46195 6.07785 2.4692 5.71799 3.5769L4.56858 7.30448Z"
                                        fill="#3AEFB7"></path>
                                </g>
                                <defs>
                                    <clipPath id="clip0_572_15312">
                                        <rect width="33" height="23" fill="white"></rect>
                                    </clipPath>
                                </defs>
                            </svg>
                            Search Car</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section id="welcome">
        <div class="container">
            @if (is_login_for_edit() == 1)
                <div class="wd-edit-welcm">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','about_us',{{ json_encode(['Title' => 'text', 'Description' => 'textarea']) }})"><img
                            src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                </div>
            @endif
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="wd-sl-titles">
                        <h2 class="home_about_us_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'title') }}
                        </h2>
                        <p class="home_about_us_description">{!! nl2br(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'description')) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="services">
        <div class="row services_div">
            @foreach ($web_content->services as $key => $service)
                @if ($key == 0)
                    <div class="col-md-4">
                        <div class="wd-sl-cardservices">
                            @if (is_login_for_edit() == 1)
                                <div class="services-action-prt">
                                    <a href="javascript:;"
                                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services_item',{{ json_encode(['Service Title' => 'text', 'Service Image' => 'file']) }},{{ $service->id }})">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:;"
                                        onclick="remove_items({{ $service->id }},'our_services_item','item-{{ $service->id }}')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            @endif
                            <img src="{{ checkFileExist($service->image) }}">
                            <h6>{{ $service->title }}</h6>
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="col-md-4">
                <div class="wd-sl-content_center">
                    <div class="wd-edit-services">
                        @if (is_login_for_edit() == 1)
                            <a class="wd-edit-btn" href="javascript:;"
                                onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text']) }})"><img
                                    src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                        @endif
                    </div>
                    <div class="wd-sl-titles">
                        <h2 class="home_our_services_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'title') }}
                        </h2>
                        <p class="home_our_services_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'sub_title') }}
                        </p>
                    </div>
                </div>
            </div>
            @foreach ($web_content->services as $key => $service)
                @if ($key != 0)
                    <div class="col-md-4">
                        <div class="wd-sl-cardservices">
                            @if (is_login_for_edit() == 1)
                                <div class="services-action-prt">
                                    <a href="javascript:;"
                                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services_item',{{ json_encode(['Service Title' => 'text', 'Service Image' => 'file']) }},{{ $service->id }})">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:;"
                                        onclick="remove_items({{ $service->id }},'our_services_item','item-{{ $service->id }}')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            @endif
                            <img src="{{ checkFileExist($service->image) }}">
                            <h6>{{ $service->title }}</h6>
                        </div>
                    </div>
                @endif
            @endforeach
            @if (is_login_for_edit() == 1)
                <div class="col-md-4">
                    <div class="wd-sl-cardservices">
                        <a href="javascript:;"
                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services_item',{{ json_encode(['Service Title' => 'text', 'Service Image' => 'file']) }})">
                            <img src="{{ asset('assets/web/template/t21/images') }}/home/plus.png">
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <section id="stock">
        <div class="container">
            @if (is_login_for_edit() == 1)
                <div class="wd-edit-stock">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_recent_stock',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text']) }})">
                        <img src="{{ asset('assets/web/images/edit-btn.png') }}">
                    </a>
                </div>
            @endif
            <div class="wd-sl-titles text-center">
                <h2 class="home_our_recent_stock_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'title') }}
                </h2>
                <p class="home_our_recent_stock_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'sub_title') }}
                </p>
            </div>
        </div>
        <div class="wd-sl-bgry">
            <div class="container stock_div">
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
                            {{-- @if (is_login_for_edit() == 1)
                            <div class="stock-action-prt text-right">
                                <a href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}},{{$stock->id}})">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="javascript:;" onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        @endif --}}
                            <div class="wd-sl-homestock">
                                <div class="wd-sl-stockh_top">
                                    {{-- <img src="./assets/images/home/st_logo1.png" class="carstock_logo"> --}}
                                    <img src="{{ checkFileExist($stockImg) }}" class="carstock_img">
                                </div>
                                <div class="wd-sl-stockh_grid">
                                    <h6>{{ $value->make }} &nbsp; £<strong>{{ number_format($value->price) }}</strong></h6>
                                    <p>{{ $value->attention_grabber }}</p>
                                    <ul>
                                        <li>
                                            <small>Category</small>
                                            <span>{{ $value->category }}</span>
                                        </li>
                                        <li>
                                            <small>Transmission</small>
                                            <span>{{ $value->transmission }}</span>
                                        </li>
                                        <li>
                                            <small>Year</small>
                                            <span>{{ $value->manufacture }}</span>
                                        </li>
                                        <li>
                                            <small>Colour</small>
                                            <span>{{ $value->colour }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="wd-sl-stockh_detail text-center mt-3">
                                    <a
                                        href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}">Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- @if (is_login_for_edit() == 1)
                    <div class="item">
                        <div class="wd-sl-homestock">
                            <a href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}})" class="wd-sl-add_stocks">
                                <img src="{{asset('assets/web/template/t21/images')}}/home/plus.png">
                            </a>
                        </div>
                    </div>
                    @endif --}}
                </div>
            </div>
        </div>
        <div class="container text-center mt-5">
            <a href="{{ route('front.template.stock_list', $domain_slug) }}" class="common-btn">Explore More</a>
        </div>
    </section>
    <section id="testimonial">
        <div class="container">
            @if (is_login_for_edit() == 1)
                <div class="wd-edit-testi">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text']) }})"><img
                            src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                </div>
            @endif
            <div class="wd-sl-titles text-center">
                <h2 class="home_testimonials_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'title') }}
                </h2>
                <p class="home_testimonials_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'sub_title') }}
                </p>
            </div>
            <div class="testimonial_div">
                <div class="owl-test owl-carousel owl-theme">
                    @foreach ($web_content->testimonial as $testimonial)
                        <div class="item testimonial-item-{{ $testimonial->id }}">
                            <div class="wd-sl-testcard">
                                @if (is_login_for_edit() == 1)
                                    <div class="testi-action-prt text-right">
                                        <a href="javascript:;"
                                            onclick="remove_items({{ $testimonial->id }},'testimonials_item','testimonial-item-{{ $testimonial->id }}')"><i
                                                class="fa fa-trash"></i></a>
                                        <a href="javascript:;"
                                            onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials_item',{{ json_encode(['Description' => 'textarea', 'Label' => 'text', 'Author Name' => 'text', 'Author Image' => 'file']) }},{{ $testimonial->id }})"><i
                                                class="fa fa-edit"></i></a>
                                    </div>
                                @endif
                                <img src="{{ checkFileExist($testimonial->author_image) }}" class="wd-sl-user">
                                <h5>{{ $testimonial->author_name }}</h5>
                                <p>{{ $testimonial->description }}</p>
                            </div>
                        </div>
                    @endforeach
                    <div class="item">
                        <div class="wd-sl-testcard">
                            <a href="javascript:;"
                                onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials_item',{{ json_encode(['Description' => 'textarea', 'Label' => 'text', 'Author Name' => 'text', 'Author Image' => 'file']) }})"
                                class="wd-sl-addcard">
                                <img src="{{ asset('assets/web/template/t21/images') }}/home/plus.png">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="other">
        <div class="container">
            <div class="wd-edit-plans">
                @if (is_login_for_edit() == 1)
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','offer',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'image' => 'file']) }})"><img
                            src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                @endif
            </div>
            <img src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'image')) }}"
                class="wd-sl-othercar home_offer_image">
            <div class="wd-sl-titles text-center">
                <h2 class="home_offer_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'title') }}</h2>
                <p class="home_offer_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'sub_title') }}
                </p>
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
