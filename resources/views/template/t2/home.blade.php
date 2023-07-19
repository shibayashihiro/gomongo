@extends('layouts.template.t2.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection

@section('content')
    @php
        $image = get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'image');
    @endphp
    <section id="home-banner">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-fir-sec">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','slider',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'Image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="banner-cont">
                        <h1 class="home_slider_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'title') }}
                        </h1>
                        <p class="home_slider_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'sub_title') }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="banner-cont-right">
                        <img src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'image')) }}"
                            class="img-fluid home_slider_image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wd-md-looking-car">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form name="frmSearch" id="frmSearch" action="{{ route('front.template.stock_list', $domain_slug) }}">
                        <div class="banner-form">
                            <h3>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.566 5.99999L1.551 6.11099C1.09994 6.25842 0.707035 6.54468 0.428467 6.92886C0.149899 7.31303 -7.00846e-05 7.77545 2.45703e-08 8.24999V12.75C2.45703e-08 13.3467 0.237053 13.919 0.659009 14.341C1.08097 14.7629 1.65326 15 2.25 15H15.75C16.3467 15 16.919 14.7629 17.341 14.341C17.7629 13.919 18 13.3467 18 12.75V8.24999C18.0001 7.77382 17.8491 7.3099 17.5688 6.92498C17.2884 6.54007 16.8932 6.25402 16.44 6.10799L16.4265 5.99999H17.25C17.4489 5.99999 17.6397 5.92098 17.7803 5.78032C17.921 5.63967 18 5.44891 18 5.25C18 5.05108 17.921 4.86032 17.7803 4.71967C17.6397 4.57901 17.4489 4.5 17.25 4.5H16.2345L15.9945 2.6205C15.9022 1.89668 15.5492 1.23131 15.0017 0.748962C14.4542 0.26661 13.7497 0.000340561 13.02 7.65771e-08H4.9785C4.24924 -0.000164611 3.54489 0.265309 2.99717 0.746778C2.44944 1.22825 2.09584 1.89274 2.0025 2.616L1.7595 4.5H0.749999C0.551087 4.5 0.360322 4.57901 0.21967 4.71967C0.0790177 4.86032 2.45703e-08 5.05108 2.45703e-08 5.25C2.45703e-08 5.44891 0.0790177 5.63967 0.21967 5.78032C0.360322 5.92098 0.551087 5.99999 0.749999 5.99999H1.566ZM4.9785 1.5H13.0185C13.3833 1.49996 13.7357 1.63291 14.0096 1.87395C14.2835 2.11499 14.4601 2.4476 14.5065 2.8095L14.9145 5.99999H3.0795L3.4905 2.808C3.53717 2.44637 3.71397 2.11412 3.98783 1.87339C4.26169 1.63265 4.61387 1.49992 4.9785 1.5ZM4.875 11.6235C4.72746 11.6235 4.58136 11.5944 4.44505 11.538C4.30874 11.4815 4.18489 11.3988 4.08056 11.2944C3.97624 11.1901 3.89348 11.0662 3.83702 10.9299C3.78056 10.7936 3.7515 10.6475 3.7515 10.5C3.7515 10.3525 3.78056 10.2064 3.83702 10.07C3.89348 9.93374 3.97624 9.80988 4.08056 9.70556C4.18489 9.60123 4.30874 9.51847 4.44505 9.46201C4.58136 9.40555 4.72746 9.37649 4.875 9.37649C5.17297 9.37649 5.45873 9.49486 5.66943 9.70556C5.88013 9.91625 5.99849 10.202 5.99849 10.5C5.99849 10.798 5.88013 11.0837 5.66943 11.2944C5.45873 11.5051 5.17297 11.6235 4.875 11.6235ZM13.122 11.6235C12.9744 11.6235 12.8284 11.5944 12.692 11.538C12.5557 11.4815 12.4319 11.3988 12.3276 11.2944C12.2232 11.1901 12.1405 11.0662 12.084 10.9299C12.0275 10.7936 11.9985 10.6475 11.9985 10.5C11.9985 10.3525 12.0275 10.2064 12.084 10.07C12.1405 9.93374 12.2232 9.80988 12.3276 9.70556C12.4319 9.60123 12.5557 9.51847 12.692 9.46201C12.8284 9.40555 12.9744 9.37649 13.122 9.37649C13.42 9.37649 13.7057 9.49486 13.9164 9.70556C14.1271 9.91625 14.2455 10.202 14.2455 10.5C14.2455 10.798 14.1271 11.0837 13.9164 11.2944C13.7057 11.5051 13.42 11.6235 13.122 11.6235Z"
                                        fill="#FE5B3E" />
                                    <path
                                        d="M15.7456 16.5005H13.4956V16.8755C13.4956 17.1739 13.6141 17.46 13.8251 17.671C14.0361 17.882 14.3222 18.0005 14.6206 18.0005C14.919 18.0005 15.2051 17.882 15.4161 17.671C15.6271 17.46 15.7456 17.1739 15.7456 16.8755V16.5005Z"
                                        fill="#FE5B3E" />
                                    <path
                                        d="M4.5 16.5005H2.25V16.8755C2.25 17.1739 2.36853 17.46 2.5795 17.671C2.79048 17.882 3.07663 18.0005 3.375 18.0005C3.67337 18.0005 3.95952 17.882 4.17049 17.671C4.38147 17.46 4.5 17.1739 4.5 16.8755V16.5005Z"
                                        fill="#FE5B3E" />
                                </svg>
                                Are You Looking For<span> Car?</span>
                            </h3>
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
                                <!-- <div class="form-box">
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
                                <div class="form-box">
                                    <select id="min_price-select" name="min_price" class="form-control mr-2">
                                        <option value="">Min Price</option>
                                        @for ($i = 2000; $i < $max_price - 500; $i += 500)
                                            <option value="{{ $i }}">£{{ number_format($i) }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-box">
                                    <select id="max_price-select" name="max_price" class="form-control">
                                        <option value="">Max Price</option>
                                        @for ($i = 2500; $i <= $max_price; $i += 500)
                                            <option value="{{ $i }}">£{{ number_format($i) }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <button class="y-btn mt-3 float-end">Search Cars</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="about-us-top">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-abt-top">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','about_us',{{ json_encode(['Sub Title' => 'text']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="about-top-title">
                        <h2 class="home_about_us_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'sub_title') }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about-us">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-abt-us">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','about_us',{{ json_encode(['Title' => 'text', 'Description' => 'textarea', 'image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container-fluid">
            <div class="row d-flex align-items-center">
                <div class="about-img">
                    <img class="ab-full-img img-fluid home_about_us_image"
                        src="{{ asset(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'image')) }}"
                        alt="">
                </div>
                <div class="about-sect-title">
                    <h2 class="home_about_us_title">
                        {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'title') }}
                    </h2>
                    <p class="home_about_us_description">{!! nl2br(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'description')) !!}</p>
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
                <div class="col-md-12 o-serv-cont">
                    <div class="sect-title">
                        <h2 class="home_our_services_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'title') }}
                        </h2>
                        <p class="home_our_services_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'sub_title') }}
                        </p>
                    </div>
                    <div class="services-blog">
                        <div class="row services_div">
                            @foreach ($web_content->services as $service)
                                <div class="col-md col services-img item-{{ $service->id }}">
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
                                    <a herf="javascript:;">
                                        <div class="wd-md-ser-img-o">
                                            <img src="{{ checkFileExist($service->image) }}" alt="">
                                        </div>
                                    </a>
                                    <h5>{{ $service->title }}</h5>
                                </div>
                            @endforeach
                            @if (is_login_for_edit() == 1)
                                <div class="col-md col services-img add-btn">
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
            <div class="sect-title">
                <h2 class="home_testimonials_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'title') }}
                </h2>
                <p class="home_testimonials_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'sub_title') }}
                </p>
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
                            <div class="slide-box">
                                <h3>{{ $testimonial->label }}</h3>
                                <p>{{ $testimonial->description }}</p>
                                <a class="moreless-button" href="javascript:;">Read More</a>
                            </div>
                            <div class="client-area d-flex align-items-center">
                                <img src="{{ checkFileExist($testimonial->author_image) }}" alt="">
                                <h3>{{ $testimonial->author_name }}</h3>
                            </div>
                        </div>
                    @endforeach
                    
                    <div class="item item1">
                        <div class="testimonial-action-add-btn">
                            <a herf="javascript:;"
                                onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials_item',{{ json_encode(['Title' => 'text', 'Description' => 'textarea', 'Label' => 'text', 'Author Name' => 'text', 'Author Image' => 'file']) }})">
                                <div class="wd-md-ser-img-o">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </a>
                            <div class="client-area d-flex align-items-center">
                                <h3>Add Testimonial</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="our-work">
        {{-- @if (is_login_for_edit() == 1)
    <div class="wd-edit-testimonial">
        <a class="wd-edit-btn" href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock',{{json_encode(['Title'=>'text','Sub Title'=>'textarea'])}})"><img src="{{asset('assets/web/images/edit-btn.png')}}"></a>
    </div>
    @endif --}}
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sect-title">
                        <h2 class="home_our_recent_stock_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'title') }}
                        </h2>
                        <p class="home_our_recent_stock_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'sub_title') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="wd-md-our-work-blog">
            <div class="container-fluid">
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
                            <div class="col-md-4 col-12 stock-item-{{ $value->id }}">
                                {{-- @if (is_login_for_edit() == 1)
                            <div class="stock-action-div">
                                <a href="javascript:;" class="stock-action-remove"
                                   onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i class="fa fa-trash"></i></a>
                <a herf="javascript:;" class="stock-action-edit" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i class="fa fa-edit"></i></a>
            </div>
            @endif --}}
                                <div class="wd-md-our-work-blog-img">
                                    <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}">
                                        <img src="{{ checkFileExist($stockImg) }}" alt="" class="img-fluid">
                                    </a>
                                    <h3>{{ $value->make }}</h3>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    {{-- @if (is_login_for_edit() == 1)
                        <div class="col-md-3 col-6 stock-action-add-more">
                            <div class="wd-md-our-work-blog-img">
                                <a href="javascript:;"
                                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}})"><i class="fa fa-plus"></i> </a>
        </div>
    </div>
    @endif --}}
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
            <div class="r-more-cont">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 col-md-12 more-img text-right">
                        <img src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'image')) }}"
                            alt="" class="home_offer_image">
                    </div>
                    <div class="col-lg-6 col-md-12 more-desc">
                        <h2 class="home_offer_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'title') }}
                        </h2>
                        <p class="home_offer_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'sub_title') }}
                        </p>
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
