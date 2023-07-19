@extends('layouts.template.t9.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection

@section('content')
    <section id="home-banner" class="home_slider_image"
        style="background-image: url('{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'image')) }}') !important;none">
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
                </div>
            </div>
        </div>
    </section>

    <div class="banner-form container">
        <P class="home_slider_sub_title">
            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'sub_title') }}</P>
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
                <x-forms.price-selector :maxPrice="$max_price" page="home" parentClass="form-box price col-md-3" />

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
            <div class="wd-sl-sectcontent text-center">
                <h2 class="home_about_us_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'title') }}
                </h2>
                <div class="wd-svg">
                    <svg width="137" height="10" viewBox="0 0 137 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="21.9053" y="0.261719" width="115.049" height="1.98047" fill="#0DEEB8" />
                        <rect x="0.58252" y="7.91016" width="115.049" height="1.98047" fill="#0DEEB8" />
                    </svg>
                </div>
                <p class="home_about_us_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'sub_title') }}
                </p>
            </div>
            <div class="wd-md-about-card d-flex  align-items-center">
                <div class="wd-md-about-inner">
                    <p class="home_about_us_description">{!! nl2br(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'description')) !!}</p>
                    {{-- <a href="javascript:;" class="wd-md-read">Read More</a> --}}
                </div>
                <div class="wd-md-abot-img">
                    <img src="{{ asset(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'image')) }}"
                        alt="" class="home_about_us_image">
                </div>
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
        <div class="container-fluid">
            <div class="wd-sl-sectcontent text-center">
                <h2 class="home_our_services_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'title') }}
                </h2>
                <div class="wd-svg">
                    <svg width="137" height="10" viewBox="0 0 137 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="21.9053" y="0.261719" width="115.049" height="1.98047" fill="#0DEEB8" />
                        <rect x="0.58252" y="7.91016" width="115.049" height="1.98047" fill="#0DEEB8" />
                    </svg>
                </div>
                <p class="home_our_services_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'sub_title') }}
                </p>
            </div>
            <div class="wd-our-img">
                <img src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'image')) }}"
                    alt="" class="img-fluid home_our_services_image">
            </div>
            <div class="wd-md-ourservices">
                <div class="row services_div">
                    @foreach ($web_content->services as $service)
                        <div class="col-md-4 col-sm-6 item-{{ $service->id }}">
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
                            <div class="wd-md-serv-inner d-flex">
                                <div class="wd-md-serv-img">
                                    <img src="{{ checkFileExist($service->image) }}" alt="">
                                </div>
                                <div class="wd-md-serv-blog">
                                    <h3>{{ $service->title }}</h3>
                                    <p>{{ $service->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if (is_login_for_edit() == 1)
                        <div class="col-md-4 col-sm-6 service-add-btn-t9">
                            <div class="wd-md-serv-inner d-flex">
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
    <section id="Testimonial">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container-fluid">
            <div class="wd-sl-sectcontent text-center">
                <h2 class="home_testimonials_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'title') }}
                </h2>
                <div class="wd-svg">
                    <svg width="137" height="10" viewBox="0 0 137 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="21.9053" y="0.261719" width="115.049" height="1.98047" fill="#0DEEB8" />
                        <rect x="0.58252" y="7.91016" width="115.049" height="1.98047" fill="#0DEEB8" />
                    </svg>
                </div>
                <p class="home_testimonials_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'sub_title') }}
                </p>
            </div>
        </div>
        <div class="wd-md-testimonial">
            <div class="container-fluid testimonial_div">
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
                            <div class="card card-odd">
                                <p>{{ $testimonial->description }}</p>
                            </div>
                            <div class="wd-md-client-blog d-flex align-items-center">
                                <img src="{{ checkFileExist($testimonial->author_image) }}" class="test-img">
                                <div class="wd-md-client-detail">
                                    <h3>{{ $testimonial->author_name }}</h3>
                                    <p>{{ $testimonial->label }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="item testimonial-action-add-btn-t9">
                        <div class="card card-odd">
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
    <section id="wd-recent-stock">
        {{-- @if (is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn"
                   href="javascript:;"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock',{{json_encode(['Title'=>'text','Sub Title'=>'text'])}})"><img
                        src="{{asset('assets/web/images/edit-btn.png')}}"></a>
            </div>
        @endif --}}
        <div class="container-fluid">
            <div class="wd-sl-sectcontent text-center">
                <h2 class="home_our_recent_stock_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'title') }}
                </h2>
                <div class="wd-svg">
                    <svg width="137" height="10" viewBox="0 0 137 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="21.9053" y="0.261719" width="115.049" height="1.98047" fill="#0DEEB8" />
                        <rect x="0.58252" y="7.91016" width="115.049" height="1.98047" fill="#0DEEB8" />
                    </svg>
                </div>
                <p class="home_our_recent_stock_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'sub_title') }}
                </p>
            </div>
            <div class="wd-md-time-count">
                {{-- <div class="row">
                    <div class="col-md-3 col-6">
                        <div class="counter">
                            <div class="timer count-title count-number mt-3" data-to="2500" data-speed="1500">2500+
                            </div>
                            <p class="count-text">Car repaired this year</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="counter">
                            <div class="timer count-title count-number mt-3" data-to="2500" data-speed="1500">2500+
                            </div>
                            <p class="count-text">Car repaired this year</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="counter">
                            <div class="timer count-title count-number mt-3" data-to="2500" data-speed="1500">2500+
                            </div>
                            <p class="count-text">Car repaired this year</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="counter">
                            <div class="timer count-title count-number mt-3" data-to="2500" data-speed="1500">2500+
                            </div>
                            <p class="count-text">Car repaired this year</p>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="wd-md-car-stock">
                {{-- @if (is_login_for_edit() == 1)
                    <a href="javascript:;" class="btn btn-primary wd-md-add-stock-t9"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}})"><i
                            class="fa fa-plus"></i>
                        <h6>Add Stock</h6>
                    </a>
                @endif --}}
                <div class="row stock_div">
                    <div class="col-md-3">
                        @foreach ($stocks as $key => $value)
                            @php
                                $images = explode(',', $value->images);
                                $stockImg = '';
                                if (!empty($images) && isset($images[0])) {
                                    $stockImg = $images[0];
                                }
                            @endphp
                            @if ($key == '0')
                                <div class="wd-md-stock-img stock-item-{{ $value->id }}">
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
                                    <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}"><img src="{{ checkFileExist($stockImg) }}" alt="" class="img-fluid"></a>
                                </div>
                            @elseif ($key == '1')
                                <div class="wd-md-stock-img rec-sec-img mt-4 stock-item-{{ $value->id }}">
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
                                    <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}"><img src="{{ checkFileExist($stockImg) }}" alt="" class="img-fluid"></a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @foreach ($stocks as $key => $value)
                        @php
                            $images = explode(',', $value->images);
                            $stockImg = '';
                            if (!empty($images) && isset($images[0])) {
                                $stockImg = $images[0];
                            }
                        @endphp
                        @if ($key == '2' || $key == '3')
                            <div class="col-md-3 stock-item-{{ $value->id }}">
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
                                <div class="wd-md-stock-center-img">
                                    <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}"><img src="{{ checkFileExist($stockImg) }}" alt="" class="img-fluid"></a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="col-md-3">
                        @foreach ($stocks as $key => $value)
                            @php
                                $images = explode(',', $value->images);
                                $stockImg = '';
                                if (!empty($images) && isset($images[0])) {
                                    $stockImg = $images[0];
                                }
                            @endphp
                            @if ($key == '4')
                                <div class="wd-md-stock-img stock-item-{{ $value->id }}">
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
                                    <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}"><img src="{{ checkFileExist($stockImg) }}" alt="" class="img-fluid"></a>
                                </div>
                            @elseif ($key == '5')
                                <div class="wd-md-stock-img mt-4 stock-item-{{ $value->id }}">
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
                                    <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}"><img src="{{ checkFileExist($stockImg) }}" alt="" class="img-fluid"></a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>
    @php $image = get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'image'); @endphp
    <section id="last-aboutsec" class="home_offer_image" style="background-image: url('{{ checkFileExist($image) }}')">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','offer',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container-fluid">
            <div class="wd-md-last-about">
                <h3 class="home_offer_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'title') }}</h3>
                <p class="home_offer_sub_title">{!! nl2br(get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'sub_title')) !!}</p>
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
