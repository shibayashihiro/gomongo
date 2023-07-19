@extends('layouts.template.t4.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection

@php
    $image = get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'image');
@endphp

@section('content')
    <section id="home-banner" class="home_slider_image" style="background-image: url('{{ checkFileExist($image) }}')">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-fir-sec">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','slider',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'Image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="banner-cont">
                    <h3>Welcome to</h3>
                    <h1 class="home_slider_title">
                        {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'title') }}
                    </h1>
                    <p class="home_slider_sub_title">
                        {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'sub_title') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="banner-form container">
        <form name="frmSearch" id="frmSearch" action="{{ route('front.template.stock_list', $domain_slug) }}">
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
                <x-forms.price-selector :maxPrice="$max_price" page="home" parentClass="form-box col-md-3" />

                <div class="form-box action col-md-3">
                    <button class="y-btn">Search Cars</button>
                </div>
            </div>
        </form>
    </div>
    <section id="aboutus">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-abt-us-lower">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','about_us',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text', 'Description' => 'textarea', 'image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="wd-sl-sectcontent text-left">
                            <h2 class="home_about_us_title">
                                {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'title') }}
                            </h2>
                            <svg width="60" height="4" viewBox="0 0 60 4" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.165039" y="0.0429688" width="46.5485" height="3.03583" rx="1.51791"
                                    fill="#FFBD41" />
                                <circle cx="51.7544" cy="1.55906" r="1.52" fill="#FFBD41" />
                                <circle cx="58.3144" cy="1.55906" r="1.52" fill="#FFBD41" />
                            </svg>
                        </div>
                        <h3 class="home_about_us_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'sub_title') }}
                        </h3>
                        <p class="home_about_us_description">{!! nl2br(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'description')) !!}</p>
                    </div>
                    <div class="col-md-6"><img class="home_about_us_image"
                            src="{{ asset(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'image')) }}">
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
        <div class="wd-sl-sectcontent text-center">
            <h2 class="home_our_services_title">
                {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'title') }}
            </h2>
            <svg width="60" height="4" viewBox="0 0 60 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0.165039" y="0.0429688" width="46.5485" height="3.03583" rx="1.51791" fill="#FFBD41" />
                <circle cx="51.7544" cy="1.55906" r="1.52" fill="#FFBD41" />
                <circle cx="58.3144" cy="1.55906" r="1.52" fill="#FFBD41" />
            </svg>
            <p class="home_our_services_sub_title">
                {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'sub_title') }}
            </p>
        </div>
        <div class="grybg">
            <div class="container-fluid">
                <div class="row services_div">
                    @foreach ($web_content->services as $service)
                        <div class="col item-{{ $service->id }}">
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
                            <div class="card">
                                <span>{{ $loop->index + 1 }}</span>
                                <img src="{{ checkFileExist($service->image) }}">
                                <h5>{{ $service->title }}</h5>
                            </div>
                        </div>
                    @endforeach
                    @if (is_login_for_edit() == 1)
                        <div class="col">
                            <div class="service-add-btn-t4">
                                <a herf="javascript:;"
                                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services_item',{{ json_encode(['Service Title' => 'text', 'Service Description' => 'textarea', 'Service Image' => 'file']) }})">
                                    <div class="wd-md-ser-img-o">
                                        <i class="fa fa-plus"></i>
                                    </div>
                                </a>
                                <h5>Add Services</h5>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section id="Testimonial">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="wd-sl-sectcontent text-center pb-5">
            <h2 class="home_testimonials_title">
                {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'title') }}
            </h2>
            <svg width="60" height="4" viewBox="0 0 60 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0.165039" y="0.0429688" width="46.5485" height="3.03583" rx="1.51791" fill="#FFBD41" />
                <circle cx="51.7544" cy="1.55906" r="1.52" fill="#FFBD41" />
                <circle cx="58.3144" cy="1.55906" r="1.52" fill="#FFBD41" />
            </svg>
            <p class="home_testimonials_sub_title">
                {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'sub_title') }}
            </p>
        </div>
        <div class="bgimg">
            <div class="container-fluid">
                <div class="testimonial_div">
                    <div class="owl-carousel owl-theme owl-test">
                        @foreach ($web_content->testimonial as $testimonial)
                            <div class="item testimonial-item-{{ $testimonial->id }}">
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
                                <div class="card">
                                    <h6>{{ $testimonial->author_name }}</h6>
                                    <svg width="39" height="34" viewBox="0 0 39 34" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.42917 33.4063C6.55149 33.4063 4.24934 32.3786 2.52274 30.3231C0.878347 28.1854 0.0561523 25.431 0.0561523 22.06C0.0561523 17.4557 1.28944 13.3036 3.75603 9.60376C6.30483 5.82167 10.1691 2.65622 15.349 0.107422L16.7056 2.08069C14.239 3.56064 11.978 5.65723 9.92249 8.37047C7.94922 11.0015 6.96259 13.6736 6.96259 16.3869C6.96259 17.1268 7.16814 17.7435 7.57923 18.2368C7.99033 18.6479 8.60698 18.8535 9.42917 18.8535C11.4847 18.8535 13.2113 19.5934 14.609 21.0734C16.0889 22.4711 16.8289 24.1977 16.8289 26.2532C16.8289 28.3087 16.0889 30.0353 14.609 31.433C13.2113 32.7486 11.4847 33.4063 9.42917 33.4063ZM30.7651 33.4063C27.8874 33.4063 25.5853 32.3786 23.8587 30.3231C22.2143 28.1854 21.3921 25.431 21.3921 22.06C21.3921 17.4557 22.6254 13.3036 25.092 9.60376C27.6408 5.82167 31.5051 2.65622 36.6849 0.107422L38.0415 2.08069C35.575 3.56064 33.3139 5.65723 31.2584 8.37047C29.2852 11.0015 28.2985 13.6736 28.2985 16.3869C28.2985 17.1268 28.5041 17.7435 28.9152 18.2368C29.3263 18.6479 29.9429 18.8535 30.7651 18.8535C32.8206 18.8535 34.5472 19.5934 35.9449 21.0734C37.4249 22.4711 38.1649 24.1977 38.1649 26.2532C38.1649 28.3087 37.4249 30.0353 35.9449 31.433C34.5472 32.7486 32.8206 33.4063 30.7651 33.4063Z"
                                            fill="black" />
                                    </svg>
                                    <p>{{ $testimonial->description }}</p>
                                </div>
                                <img src="{{ checkFileExist($testimonial->author_image) }}" class="test-img">
                            </div>
                        @endforeach
                        <div class="item">
                            <div class="testimonial-action-add-btn-t4">
                                <a herf="javascript:;"
                                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials_item',{{ json_encode(['Title' => 'text', 'Description' => 'textarea', 'Label' => 'text', 'Author Name' => 'text', 'Author Image' => 'file']) }})">
                                    <div class="wd-md-ser-img-o">
                                        <i class="fa fa-plus"></i>
                                    </div>
                                </a>
                                <div class="card">
                                    <h3>Add Testimonial</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="services">
        {{-- @if (is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn"
                   href="javascript:;"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock',{{json_encode(['Title'=>'text','Sub Title'=>'textarea'])}})"><img
                        src="{{asset('assets/web/images/edit-btn.png')}}"></a>
            </div>
        @endif --}}
        <div class="wd-sl-sectcontent text-center">
            <h2 class="home_our_recent_stock_title">
                {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'title') }}
            </h2>
            <svg width="60" height="4" viewBox="0 0 60 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0.165039" y="0.0429688" width="46.5485" height="3.03583" rx="1.51791" fill="#FFBD41" />
                <circle cx="51.7544" cy="1.55906" r="1.52" fill="#FFBD41" />
                <circle cx="58.3144" cy="1.55906" r="1.52" fill="#FFBD41" />
            </svg>
            <p class="home_our_recent_stock_sub_title">
                {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'sub_title') }}
            </p>
        </div>
        <div class="grybg new-car-service">
            <div class="container-fluid stock_div">
                <div class="owl-carousel owl-theme owl-car">
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
                                <div class="stock-action-div">
                                    <a href="javascript:;" class="stock-action-remove"
                                       onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                            class="fa fa-trash"></i></a>
                                    <a herf="javascript:;" class="stock-action-edit"
                                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                            class="fa fa-edit"></i></a>
                                </div>
                            @endif --}}
                            <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}">
                                <img src="{{ checkFileExist($stockImg) }}">
                            </a>
                            <h6>{{ $value->make }}</h6>
                        </div>
                    @endforeach
                    {{-- @if (is_login_for_edit() == 1)
                        <div class="stock-action-add-more">
                            <div class="wd-md-our-work-blog-img-t4">
                                <a href="javascript:;"
                                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}})"><i
                                        class="fa fa-plus"></i> </a>
                            </div>
                        </div>
                    @endif --}}
                </div>
            </div>
        </div>
    </section>
    <section id="aboutus" class="mb-5 last-aboutsec">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','offer',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container-fluid">
            <div class="card">
                <div class="row wd-sl-offer">
                    <div class="col-md-6"><img class="home_offer_image"
                            src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'image')) }}">
                    </div>
                    <div class="col-md-6">
                        <h3 class="mb-4 home_offer_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'title') }}
                        </h3>
                        <p class="home_offer_sub_title">{!! nl2br(get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'sub_title')) !!}</p>
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
