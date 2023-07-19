@extends('layouts.template.t6.app')

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
        <div class="wd-md-home d-flex align-items-center">
            <div class="banner-cont">
                <div class="wd-md-home-heading">
                    <h3>Welcome to</h3>
                    <h1 class="home_slider_title">
                        {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'title') }}
                    </h1>
                    <p class="home_slider_sub_title">
                        {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'sub_title') }}
                    </p>
                </div>
                <div class="banner-form container">
                    <form name="frmSearch" id="frmSearch" action="{{ route('front.template.stock_list', $domain_slug) }}">
                        <div class="form-row row">
                            <div class="form-box wd-border col-lg-3 col-md-6 col-sm-12 col-12">
                                <select id="make" name="make">
                                    <option value="">Make All</option>
                                    @foreach ($make as $key => $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-box wd-border price col-lg-3 col-md-6 col-sm-12 col-12">
                                <select id="model_list" name="modal">
                                    <option value="">Modal Any</option>
                                </select>
                            </div>
                            <!-- <div class="form-box price col-lg-3 col-md-6 col-sm-12 col-12">
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
                            <x-forms.price-selector :maxPrice="$max_price" page="home"
                                parentClass="form-box col-lg-3 col-md-6 col-sm-12 col-12" />

                            <div class="form-box action col-lg-3 col-md-6 col-sm-12 col-12">
                                <button class="y-btn">Search Cars</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="wd-md-home-banner home_slider_image"
                style="background-image: url('{{ checkFileExist($image) }}') !important;">
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
        <div class="wd-md-about-us d-flex align-items-center">
            <div class="wd-md-about-left">
                <img src="{{ asset(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'image')) }}"
                    class="img-fluid home_about_us_image" alt="">
            </div>
            <div class="wd-md-about-right">
                <h2 class="home_about_us_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'title') }}
                </h2>
                <h3 class="home_about_us_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'sub_title') }}
                </h3>
                <p class="home_about_us_description">{!! nl2br(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'description')) !!}</p>
                {{-- <a href="javascript:;" class="wd-readmore">Read More
                    <svg width="12" height="10" viewBox="0 0 12 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.5184 4.62521L8.31339 0.60215C8.25806 0.533271 8.18966 0.476006 8.11212 0.433647C8.03459 0.391289 7.94945 0.364671 7.86159 0.355325C7.77373 0.345978 7.6849 0.354087 7.60019 0.379186C7.51547 0.404284 7.43656 0.445877 7.36797 0.501573C7.29909 0.556906 7.24183 0.625306 7.19947 0.702841C7.15711 0.780377 7.13049 0.865519 7.12115 0.953375C7.1118 1.04123 7.11991 1.13007 7.14501 1.21478C7.17011 1.29949 7.2117 1.37841 7.2674 1.44699L10.1305 5.04763L7.12659 8.64828C7.07013 8.71603 7.02759 8.79426 7.00141 8.87848C6.97523 8.96269 6.96593 9.05125 6.97402 9.13907C6.98212 9.22689 7.00746 9.31225 7.0486 9.39026C7.08974 9.46828 7.14586 9.53741 7.21376 9.5937C7.33531 9.69125 7.48704 9.74341 7.64288 9.74121C7.74139 9.74137 7.83872 9.71982 7.92795 9.6781C8.01719 9.63638 8.09613 9.57551 8.15918 9.49982L11.5117 5.47676C11.6113 5.35756 11.6664 5.2075 11.6676 5.05219C11.6688 4.89688 11.6161 4.74596 11.5184 4.62521Z"
                            fill="white" />
                        <path
                            d="M2.26701 0.602831C2.15497 0.459677 1.99066 0.366892 1.81022 0.344887C1.62977 0.322881 1.44798 0.373459 1.30482 0.485492C1.16167 0.597525 1.06888 0.761837 1.04688 0.942281C1.02487 1.12273 1.07545 1.30452 1.18748 1.44767L4.08409 5.04832L1.0802 8.64225C1.02374 8.71001 0.981207 8.78823 0.955027 8.87245C0.928848 8.95667 0.91954 9.04523 0.927637 9.13305C0.935734 9.22087 0.961076 9.30623 1.00221 9.38424C1.04335 9.46225 1.09947 9.53138 1.16737 9.58767C1.288 9.68763 1.43983 9.7422 1.5965 9.74189C1.695 9.74205 1.79233 9.7205 1.88157 9.67878C1.9708 9.63706 2.04975 9.57619 2.11279 9.50051L5.46534 5.47744C5.56396 5.35747 5.61787 5.20697 5.61787 5.05167C5.61787 4.89636 5.56396 4.74587 5.46534 4.62589L2.26701 0.602831Z"
                            fill="white" />
                    </svg>
                </a> --}}
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
        <div class="grybg">
            <div class="wd-sl-sectcontent text-center">
                <h2 class="home_our_services_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'title') }}
                </h2>
                <p class="wd-serv-text home_our_services_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'sub_title') }}
                </p>
            </div>
        </div>
        <div class="container-fluid">
            <div class="wd-md-services">
                <div class="row d-flex align-items-center justify-content-center services_div">
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
                            <img src="{{ checkFileExist($service->image) }}" class="img-fluid service-img" alt="">
                            <div class="card">
                                <span>{{ $loop->index + 1 }}</span>
                                <h5>{{ $service->title }}</h5>
                                <p>{{ $service->description }}</p>
                                {{-- <a href="javascript:;">Read More
                                    <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.601 4.9006L7.39591 0.877541C7.34058 0.808661 7.27218 0.751397 7.19464 0.709038C7.11711 0.666679 7.03197 0.640062 6.94411 0.630715C6.85625 0.621369 6.76742 0.629478 6.68271 0.654576C6.59799 0.679675 6.51908 0.721267 6.45049 0.776964C6.38161 0.832296 6.32435 0.900696 6.28199 0.978232C6.23963 1.05577 6.21301 1.14091 6.20367 1.22877C6.19432 1.31662 6.20243 1.40546 6.22753 1.49017C6.25263 1.57488 6.29422 1.6538 6.34992 1.72238L9.21299 5.32303L6.20911 8.92367C6.15265 8.99142 6.11011 9.06965 6.08393 9.15387C6.05775 9.23808 6.04845 9.32664 6.05654 9.41446C6.06464 9.50228 6.08998 9.58764 6.13112 9.66566C6.17226 9.74367 6.22838 9.8128 6.29627 9.86909C6.41783 9.96664 6.56956 10.0188 6.7254 10.0166C6.82391 10.0168 6.92124 9.99521 7.01047 9.95349C7.09971 9.91177 7.17865 9.8509 7.24169 9.77521L10.5942 5.75215C10.6938 5.63295 10.7489 5.48289 10.7501 5.32758C10.7514 5.17227 10.6986 5.02135 10.601 4.9006Z"
                                            fill="#FF5D02" />
                                        <path
                                            d="M1.34953 0.878221C1.23749 0.735068 1.07318 0.642283 0.892736 0.620277C0.712292 0.598272 0.530497 0.648849 0.387343 0.760882C0.24419 0.872916 0.151404 1.03723 0.129399 1.21767C0.107393 1.39812 0.157971 1.57991 0.270004 1.72306L3.16661 5.32371L0.162722 8.91764C0.106264 8.9854 0.0637266 9.06362 0.0375469 9.14784C0.0113671 9.23206 0.00205907 9.32062 0.0101561 9.40844C0.0182531 9.49626 0.0435959 9.58162 0.084733 9.65963C0.12587 9.73764 0.181994 9.80677 0.249889 9.86306C0.370521 9.96302 0.522349 10.0176 0.679015 10.0173C0.77752 10.0174 0.874851 9.99589 0.964085 9.95417C1.05332 9.91245 1.13226 9.85159 1.19531 9.7759L4.54786 5.75283C4.64648 5.63286 4.70039 5.48237 4.70039 5.32706C4.70039 5.17175 4.64648 5.02126 4.54786 4.90128L1.34953 0.878221Z"
                                            fill="#FF5D02" />
                                    </svg>
                                </a> --}}
                            </div>
                        </div>
                    @endforeach
                    @if (is_login_for_edit() == 1)
                        <div class="col-md-4">
                            <div class="services-img service-add-btn-t6">
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
            <p class="wd-test-text home_testimonials_sub_title">
                {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'sub_title') }}
            </p>
        </div>
        <div class="bgimg">
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
                                <img src="{{ checkFileExist($testimonial->author_image) }}" class="test-img">
                                <div class="wd-md-test-inner">
                                    <h6>{{ $testimonial->author_name }}</h6>
                                    <p><span class="fir">"</span>{{ $testimonial->description }}<span
                                            class="sec">"</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="item item1">
                        <div class="testimonial-action-add-btn-t6">
                            <a herf="javascript:;"
                                onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials_item',{{ json_encode(['Title' => 'text', 'Description' => 'textarea', 'Label' => 'text', 'Author Name' => 'text', 'Author Image' => 'file']) }})">
                                <div class="wd-md-ser-img-o">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </a>
                            <div class="slide-box">
                                <span>Add Testimonial</span>
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
        <div class="grybg new-car-service">
            <div class="wd-sl-sectcontent text-center">
                <h2 class="home_our_recent_stock_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'title') }}
                </h2>
                <p class="wd-md-recent-stock home_our_recent_stock_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'sub_title') }}
                </p>
            </div>
        </div>
        <div class="wd-md-our-stock">
            <div class="container-fluid">
                {{-- @if (is_login_for_edit() == 1)
                    <div class="row justify-content-center">
                        <div class="col-md-3 col-6">
                            <div class="stock-action-add-more-t6">
                                <a href="javascript:;"
                                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}})"><i
                                        class="fa fa-plus"></i> Add Stock</a>
                            </div>
                        </div>
                    </div>
                @endif --}}
                <div class="row stock_div">
                    <div class="col-md-4">
                        @foreach ($stocks as $key => $value)
                            @php
                                $images = explode(',', $value->images);
                                $stockImg = '';
                                if (!empty($images) && isset($images[0])) {
                                    $stockImg = $images[0];
                                }
                            @endphp
                            @if ($loop->index <= 1)
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
                                    <img src="{{ checkFileExist($stockImg) }}" class="img-fluid">
                                    <div class="wd-md-stock-inner">
                                        <h3>{{ $value->make }}</h3>
                                        <p>{{ $value->derivative }}</p>
                                        <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}"
                                            class="wd-readmore">Read More
                                            <svg width="12" height="10" viewBox="0 0 12 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.5184 4.62521L8.31339 0.60215C8.25806 0.533271 8.18966 0.476006 8.11212 0.433647C8.03459 0.391289 7.94945 0.364671 7.86159 0.355325C7.77373 0.345978 7.6849 0.354087 7.60019 0.379186C7.51547 0.404284 7.43656 0.445877 7.36797 0.501573C7.29909 0.556906 7.24183 0.625306 7.19947 0.702841C7.15711 0.780377 7.13049 0.865519 7.12115 0.953375C7.1118 1.04123 7.11991 1.13007 7.14501 1.21478C7.17011 1.29949 7.2117 1.37841 7.2674 1.44699L10.1305 5.04763L7.12659 8.64828C7.07013 8.71603 7.02759 8.79426 7.00141 8.87848C6.97523 8.96269 6.96593 9.05125 6.97402 9.13907C6.98212 9.22689 7.00746 9.31225 7.0486 9.39026C7.08974 9.46828 7.14586 9.53741 7.21376 9.5937C7.33531 9.69125 7.48704 9.74341 7.64288 9.74121C7.74139 9.74137 7.83872 9.71982 7.92795 9.6781C8.01719 9.63638 8.09613 9.57551 8.15918 9.49982L11.5117 5.47676C11.6113 5.35756 11.6664 5.2075 11.6676 5.05219C11.6688 4.89688 11.6161 4.74596 11.5184 4.62521Z"
                                                    fill="white" />
                                                <path
                                                    d="M2.26701 0.602831C2.15497 0.459677 1.99066 0.366892 1.81022 0.344887C1.62977 0.322881 1.44798 0.373459 1.30482 0.485492C1.16167 0.597525 1.06888 0.761837 1.04688 0.942281C1.02487 1.12273 1.07545 1.30452 1.18748 1.44767L4.08409 5.04832L1.0802 8.64225C1.02374 8.71001 0.981207 8.78823 0.955027 8.87245C0.928848 8.95667 0.91954 9.04523 0.927637 9.13305C0.935734 9.22087 0.961076 9.30623 1.00221 9.38424C1.04335 9.46225 1.09947 9.53138 1.16737 9.58767C1.288 9.68763 1.43983 9.7422 1.5965 9.74189C1.695 9.74205 1.79233 9.7205 1.88157 9.67878C1.9708 9.63706 2.04975 9.57619 2.11279 9.50051L5.46534 5.47744C5.56396 5.35747 5.61787 5.20697 5.61787 5.05167C5.61787 4.89636 5.56396 4.74587 5.46534 4.62589L2.26701 0.602831Z"
                                                    fill="white" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        @foreach ($stocks as $key => $value)
                            @php
                                $images = explode(',', $value->images);
                                $stockImg = '';
                                if (!empty($images) && isset($images[0])) {
                                    $stockImg = $images[0];
                                }
                            @endphp
                            @if ($loop->index == 2 || $loop->index == 3)
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
                                    <img src="{{ checkFileExist($stockImg) }}" class="img-fluid">
                                    <div class="wd-md-stock-inner">
                                        <h3>{{ $value->make }}</h3>
                                        <p>{{ $value->derivative }}</p>
                                        <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}"
                                            class="wd-readmore">Read More
                                            <svg width="12" height="10" viewBox="0 0 12 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.5184 4.62521L8.31339 0.60215C8.25806 0.533271 8.18966 0.476006 8.11212 0.433647C8.03459 0.391289 7.94945 0.364671 7.86159 0.355325C7.77373 0.345978 7.6849 0.354087 7.60019 0.379186C7.51547 0.404284 7.43656 0.445877 7.36797 0.501573C7.29909 0.556906 7.24183 0.625306 7.19947 0.702841C7.15711 0.780377 7.13049 0.865519 7.12115 0.953375C7.1118 1.04123 7.11991 1.13007 7.14501 1.21478C7.17011 1.29949 7.2117 1.37841 7.2674 1.44699L10.1305 5.04763L7.12659 8.64828C7.07013 8.71603 7.02759 8.79426 7.00141 8.87848C6.97523 8.96269 6.96593 9.05125 6.97402 9.13907C6.98212 9.22689 7.00746 9.31225 7.0486 9.39026C7.08974 9.46828 7.14586 9.53741 7.21376 9.5937C7.33531 9.69125 7.48704 9.74341 7.64288 9.74121C7.74139 9.74137 7.83872 9.71982 7.92795 9.6781C8.01719 9.63638 8.09613 9.57551 8.15918 9.49982L11.5117 5.47676C11.6113 5.35756 11.6664 5.2075 11.6676 5.05219C11.6688 4.89688 11.6161 4.74596 11.5184 4.62521Z"
                                                    fill="white" />
                                                <path
                                                    d="M2.26701 0.602831C2.15497 0.459677 1.99066 0.366892 1.81022 0.344887C1.62977 0.322881 1.44798 0.373459 1.30482 0.485492C1.16167 0.597525 1.06888 0.761837 1.04688 0.942281C1.02487 1.12273 1.07545 1.30452 1.18748 1.44767L4.08409 5.04832L1.0802 8.64225C1.02374 8.71001 0.981207 8.78823 0.955027 8.87245C0.928848 8.95667 0.91954 9.04523 0.927637 9.13305C0.935734 9.22087 0.961076 9.30623 1.00221 9.38424C1.04335 9.46225 1.09947 9.53138 1.16737 9.58767C1.288 9.68763 1.43983 9.7422 1.5965 9.74189C1.695 9.74205 1.79233 9.7205 1.88157 9.67878C1.9708 9.63706 2.04975 9.57619 2.11279 9.50051L5.46534 5.47744C5.56396 5.35747 5.61787 5.20697 5.61787 5.05167C5.61787 4.89636 5.56396 4.74587 5.46534 4.62589L2.26701 0.602831Z"
                                                    fill="white" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        @foreach ($stocks as $key => $value)
                            @php
                                $images = explode(',', $value->images);
                                $stockImg = '';
                                if (!empty($images) && isset($images[0])) {
                                    $stockImg = $images[0];
                                }
                            @endphp
                            @if ($loop->index == 4 || $loop->index == 5)
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
                                    <img src="{{ checkFileExist($stockImg) }}" class="img-fluid">
                                    <div class="wd-md-stock-inner">
                                        <h3>{{ $value->make }}</h3>
                                        <p>{{ $value->derivative }}</p>
                                        <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}"
                                            class="wd-readmore">Read More
                                            <svg width="12" height="10" viewBox="0 0 12 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.5184 4.62521L8.31339 0.60215C8.25806 0.533271 8.18966 0.476006 8.11212 0.433647C8.03459 0.391289 7.94945 0.364671 7.86159 0.355325C7.77373 0.345978 7.6849 0.354087 7.60019 0.379186C7.51547 0.404284 7.43656 0.445877 7.36797 0.501573C7.29909 0.556906 7.24183 0.625306 7.19947 0.702841C7.15711 0.780377 7.13049 0.865519 7.12115 0.953375C7.1118 1.04123 7.11991 1.13007 7.14501 1.21478C7.17011 1.29949 7.2117 1.37841 7.2674 1.44699L10.1305 5.04763L7.12659 8.64828C7.07013 8.71603 7.02759 8.79426 7.00141 8.87848C6.97523 8.96269 6.96593 9.05125 6.97402 9.13907C6.98212 9.22689 7.00746 9.31225 7.0486 9.39026C7.08974 9.46828 7.14586 9.53741 7.21376 9.5937C7.33531 9.69125 7.48704 9.74341 7.64288 9.74121C7.74139 9.74137 7.83872 9.71982 7.92795 9.6781C8.01719 9.63638 8.09613 9.57551 8.15918 9.49982L11.5117 5.47676C11.6113 5.35756 11.6664 5.2075 11.6676 5.05219C11.6688 4.89688 11.6161 4.74596 11.5184 4.62521Z"
                                                    fill="white" />
                                                <path
                                                    d="M2.26701 0.602831C2.15497 0.459677 1.99066 0.366892 1.81022 0.344887C1.62977 0.322881 1.44798 0.373459 1.30482 0.485492C1.16167 0.597525 1.06888 0.761837 1.04688 0.942281C1.02487 1.12273 1.07545 1.30452 1.18748 1.44767L4.08409 5.04832L1.0802 8.64225C1.02374 8.71001 0.981207 8.78823 0.955027 8.87245C0.928848 8.95667 0.91954 9.04523 0.927637 9.13305C0.935734 9.22087 0.961076 9.30623 1.00221 9.38424C1.04335 9.46225 1.09947 9.53138 1.16737 9.58767C1.288 9.68763 1.43983 9.7422 1.5965 9.74189C1.695 9.74205 1.79233 9.7205 1.88157 9.67878C1.9708 9.63706 2.04975 9.57619 2.11279 9.50051L5.46534 5.47744C5.56396 5.35747 5.61787 5.20697 5.61787 5.05167C5.61787 4.89636 5.56396 4.74587 5.46534 4.62589L2.26701 0.602831Z"
                                                    fill="white" />
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="last-aboutsec">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','offer',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="wd-last-aboutsec d-flex align-items-center">
            <div class="last-aboutsec-left">
                <h3 class="home_offer_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'title') }}</h3>
                <p class="home_offer_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'sub_title') }}
                </p>
                {{-- <a href="javascript:;" class="wd-readmore">Read More
                    <svg width="12" height="10" viewBox="0 0 12 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.5184 4.62521L8.31339 0.60215C8.25806 0.533271 8.18966 0.476006 8.11212 0.433647C8.03459 0.391289 7.94945 0.364671 7.86159 0.355325C7.77373 0.345978 7.6849 0.354087 7.60019 0.379186C7.51547 0.404284 7.43656 0.445877 7.36797 0.501573C7.29909 0.556906 7.24183 0.625306 7.19947 0.702841C7.15711 0.780377 7.13049 0.865519 7.12115 0.953375C7.1118 1.04123 7.11991 1.13007 7.14501 1.21478C7.17011 1.29949 7.2117 1.37841 7.2674 1.44699L10.1305 5.04763L7.12659 8.64828C7.07013 8.71603 7.02759 8.79426 7.00141 8.87848C6.97523 8.96269 6.96593 9.05125 6.97402 9.13907C6.98212 9.22689 7.00746 9.31225 7.0486 9.39026C7.08974 9.46828 7.14586 9.53741 7.21376 9.5937C7.33531 9.69125 7.48704 9.74341 7.64288 9.74121C7.74139 9.74137 7.83872 9.71982 7.92795 9.6781C8.01719 9.63638 8.09613 9.57551 8.15918 9.49982L11.5117 5.47676C11.6113 5.35756 11.6664 5.2075 11.6676 5.05219C11.6688 4.89688 11.6161 4.74596 11.5184 4.62521Z"
                            fill="white" />
                        <path
                            d="M2.26701 0.602831C2.15497 0.459677 1.99066 0.366892 1.81022 0.344887C1.62977 0.322881 1.44798 0.373459 1.30482 0.485492C1.16167 0.597525 1.06888 0.761837 1.04688 0.942281C1.02487 1.12273 1.07545 1.30452 1.18748 1.44767L4.08409 5.04832L1.0802 8.64225C1.02374 8.71001 0.981207 8.78823 0.955027 8.87245C0.928848 8.95667 0.91954 9.04523 0.927637 9.13305C0.935734 9.22087 0.961076 9.30623 1.00221 9.38424C1.04335 9.46225 1.09947 9.53138 1.16737 9.58767C1.288 9.68763 1.43983 9.7422 1.5965 9.74189C1.695 9.74205 1.79233 9.7205 1.88157 9.67878C1.9708 9.63706 2.04975 9.57619 2.11279 9.50051L5.46534 5.47744C5.56396 5.35747 5.61787 5.20697 5.61787 5.05167C5.61787 4.89636 5.56396 4.74587 5.46534 4.62589L2.26701 0.602831Z"
                            fill="white" />
                </a> --}}
            </div>
            <div class="last-aboutsec-right">
                <img src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'image')) }}"
                    class="img-fluid home_offer_image" alt="">
            </div>
        </div>
    </section>
    <section class="wd-map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9552627.600007264!2d-13.449966124945481!3d54.22992374474599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sin!4v1633437983840!5m2!1sen!2sin"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
