@extends('layouts.template.t16.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection
@section('content')
    <section id="banner">
        <div class="container">
            @if (is_login_for_edit() == 1)
                <div class="wd-edit-banner">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','slider',{{ json_encode([
                            'Image' => 'file',
                        ]) }})">
                        <img src="{{ asset('assets/web/template/t16') }}/images/edit.png">
                    </a>
                </div>
            @endif
            <div class="row">
                <div class="col-md-5 my-auto">
                    <div class="wd-kr-cfilter">
                        <div class="wd-kr-banertitle">
                            <h1 class="text-center">Get Best Car deal on <b>A TO Z</b> Cars</h1>
                        </div>
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
                                <button type="submit" class="form-btn"> Search Car</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="wd-kr-banercar">
                        <img class="home_slider_image"
                            src="{{ asset(get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'image')) }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="welcm-bg">
        <div class="container">
            @if (is_login_for_edit() == 1)
                <div class="wd-edit-welcm">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','slider',{{ json_encode([
                            'Title' => 'text',
                            'Sub Title' => 'textarea',
                        ]) }})">
                        <img src="{{ asset('assets/web/template/t16') }}/images/edit.png">
                    </a>
                </div>
            @endif
            <div class="row">
                <div class="col-md-7">
                    <div class="wd-kr-wlcm-prt">
                        <img src="{{ asset('assets/web/template/t16') }}/images/home/wlcm.png">
                    </div>
                </div>
                <div class="col-md-5 wd-kr-wlcm-box">
                    <div class="wd-kr-banertitle">
                        <h1 class="home_slider_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'title') }}
                        </h1>
                    </div>
                    <div class="wd-kr-wlcm-txt">
                        <p class="home_slider_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'sub_title') }}
                        </p>
                        {{-- <div class="wd-kr-btn">
                            <a href="javascript:;">Know more about us</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wd-kr-our-services" id="services">
        <div class="container">
            @if (is_login_for_edit() == 1)
                <div class="wd-edit-services">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text']) }})">
                        <img src="{{ asset('assets/web/template/t16') }}/images/edit.png">
                    </a>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="wd-kr-banertitle">
                        <h1 class="text-center home_our_services_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'title') }}
                        </h1>
                        <p class="home_our_services_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'sub_title') }}
                        </p>
                    </div>
                </div>
                <div class="wd-kr-services-blog services_div">
                    @foreach ($web_content->services as $key => $service)
                        <div class="wd-services-detail text-center item-{{ $service->id }}">
                            @if (is_login_for_edit() == 1)
                                <div class="services-action-prt">
                                    <a href="javascript:;"
                                        onclick="remove_items({{ $service->id }},'our_services_item','item-{{ $service->id }}')"><i
                                            class="fa fa-trash"></i></a>
                                    <a herf="javascript:;"
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
    </section>
    <section id="stock">
        <div class="container">
            {{-- @if (is_login_for_edit() == 1)
                <div class="wd-edit-stock">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_recent_stock',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text']) }})">
                        <img src="{{ asset('assets/web/template/t16') }}/images/edit.png">
                    </a>
                </div>
            @endif --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="wd-kr-banertitle">
                        <h1 class="text-center home_our_recent_stock_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'title') }}
                        </h1>
                        <p class="mrgb_30 home_our_recent_stock_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'sub_title') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="wd-kr-stock-main">
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
                            <div class="col-md-4 stock-item-{{ $value->id }}">
                                {{-- @if (is_login_for_edit() == 1)
                            <div class="services-action-prt text-center">
                                <a href="javascript:;"
                                   onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                        class="fa fa-trash"></i></a>
                                <a herf="javascript:;"
                                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                        class="fa fa-edit"></i></a>
                            </div>
                        @endif --}}
                                <div class="wd-kr-stocks">
                                    <div class="wd-kr-toyota-img">
                                        <img src="{{ checkFileExist($stockImg) }}">
                                    </div>
                                    <div class="wd-kr-stock_content">
                                        <div class="wd-kr-stock_top">
                                            <div class="wd-kr-stock_topright text-center">
                                                <span>{{ $value->make }} &nbsp; £<strong>{{ number_format($value->price) }}</strong></span><br>
                                                <span>{{ $value->attention_grabber }}</span>
                                                {{-- <small>Hatchback 2.5 RS 500 3DR</small> --}}
                                            </div>
                                        </div>
                                        <div class="wd-kr-stock_middle">
                                            <div class="wd-kr-stockmiddle_inner">
                                                <small>Category</small>
                                                <span>{{ $value->category }}</span>
                                            </div>
                                            <div class="wd-kr-stockmiddle_inner">
                                                <small>Transmission</small>
                                                <span>{{ $value->transmission }}</span>
                                            </div>
                                            <div class="wd-kr-stockmiddle_inner">
                                                <small>Colour</small>
                                                <span>{{ $value->colour }}</span>
                                            </div>
                                            <div class="wd-kr-stockmiddle_inner">
                                                <small>Mileage</small>
                                                <span>{{ $value->mileage }}</span>
                                            </div>
                                            {{-- <div class="wd-kr-stockmiddle_inner">
                                        <small>YEAR</small>
                                        <span>2019</span>
                                    </div> --}}
                                        </div>
                                        {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem
                                    Ipsum </p> --}}
                                        {{-- <h4>£41,855.26</h4> --}}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    {{-- @if (is_login_for_edit() == 1)
                        <div class="col-md-4 mrgt_30">
                            <div class="wd-kr-stock-add">
                                <a href="javascript:;" class="mrg-t"
                                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}})"><i
                                        class="fa fa-plus"></i> </a>
                            </div>
                        </div>
                    @endif --}}
                </div>
                <div class="text-center mrgt_65">
                    <a href="{{ route('front.template.stock_list', $domain_slug) }}" class="wd-kr-cmmn-btn">Discover All
                        Stock</a>
                </div>
            </div>
        </div>
    </section>
    <section id="testimonal">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="testi_box testimonial_div">
                        <div class="owl-carousel">
                            @foreach ($web_content->testimonial as $testimonial)
                                <div class="item testimonial-item-{{ $testimonial->id }}">
                                    <div class="wd-kr-testi_content">
                                        @if (is_login_for_edit() == 1)
                                            <div class="testi-action-prt text-right">
                                                <a href="javascript:;"
                                                    onclick="remove_items({{ $testimonial->id }},'testimonials_item','testimonial-item-{{ $testimonial->id }}')"><i
                                                        class="fa fa-trash"></i></a>
                                                <a herf="javascript:;"
                                                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials_item',{{ json_encode(['Title' => 'text', 'Description' => 'textarea', 'Label' => 'text', 'Author Name' => 'text', 'Author Image' => 'file']) }},{{ $testimonial->id }})"><i
                                                        class="fa fa-edit"></i></a>
                                            </div>
                                        @endif
                                        <svg width="51" height="39" viewBox="0 0 51 39" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M23.7505 3.78338L20.3937 0.998047C7.75622 8.16035 1.83242 16.3174 0.252737 25.4692C-0.932023 33.0295 2.02988 38.998 9.53337 38.998C14.8648 38.998 19.9988 35.4169 21.1835 29.4483C22.1708 22.485 18.2216 18.3069 13.2851 17.3122C15.2597 10.5478 23.553 3.78338 23.7505 3.78338ZM40.7321 16.9143C42.9041 10.3488 50.8025 3.78338 51 3.78338L47.6432 0.998047C35.0057 8.16035 29.0819 16.3174 27.5022 25.4692C26.3175 33.0295 29.2794 38.998 36.7829 38.998C42.1143 38.998 47.2483 35.4169 48.2356 29.4483C49.4203 22.485 45.6686 17.9091 40.7321 16.9143Z"
                                                fill="url(#paint0_radial_508_10222)" />
                                            <defs>
                                                <radialGradient id="paint0_radial_508_10222" cx="0"
                                                    cy="0" r="1" gradientUnits="userSpaceOnUse"
                                                    gradientTransform="translate(14.5714 7.51233) rotate(60.9542) scale(36.0153 43.268)">
                                                    <stop stop-color="#38E7B0" />
                                                    <stop offset="1" stop-color="#30B78D" />
                                                </radialGradient>
                                            </defs>
                                        </svg>
                                        <div class="testi_main">
                                            <p>{{ $testimonial->description }}</p>
                                        </div>
                                        <div class="testi_name ">
                                            <div class="testi_name">
                                                <img src="{{ checkFileExist($testimonial->author_image) }}">
                                                <p>{{ $testimonial->author_name }}</p>
                                                <span>{{ $testimonial->title }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mrgt_65">
                <a href="javascript:;" class="wd-kr-cmmn-btn"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials_item',{{ json_encode(['Title' => 'text', 'Description' => 'textarea', 'Label' => 'text', 'Author Name' => 'text', 'Author Image' => 'file']) }})">
                    Add Testimonial</a>
            </div>
        </div>
    </section>
    <section id="plans">
        <div class="container">
            @if (is_login_for_edit() == 1)
                <div class="wd-edit-plans">
                    <a class="wd-edit-btn" href="javascript:;"
                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','offer',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'image' => 'file']) }})">
                        <img src="{{ asset('assets/web/template/t16') }}/images/edit.png">
                    </a>
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="wd-kr-pln-cntxt">
                        <div class="wd-kr-banertitle">
                            <h1 class="home_offer_title">
                                {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'title') }}
                            </h1>
                        </div>
                        <p class="wd-kr-pln-txt home_offer_sub_title">
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'sub_title') }}
                        </p>
                        {{-- <div class="wd-kr-btn">
                            <a href="javascript:;">Read More</a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="wd-kr-pln-img">
                        <img src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'image')) }}"
                            class="home_offer_image">
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
