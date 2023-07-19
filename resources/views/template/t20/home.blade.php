@extends('layouts.template.t20.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection

@section('content')
    @php
        $image = get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'image');
    @endphp
    <section class="wd-md-home home_slider_image"
        style="background: url('{{ checkFileExist($image) }}');background-repeat: no-repeat;background-size: cover;background-position: center;">
        <div class="wd-edit-home">
            @if (is_login_for_edit() == 1)
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','slider',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'Image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            @endif
        </div>
        <div class="container">
            <div class="wd-md-home-title">
                <h1 class="home_slider_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'title') }}</h1>
                <p class="home_slider_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'sub_title') }}
                </p>
            </div>
            <div class="wd-md-search-car-blog">
                <div class="container">
                    <div class="wd-md-filter-title">
                        <h2>
                            <span>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.566 5.99999L1.551 6.11099C1.09994 6.25842 0.707035 6.54468 0.428467 6.92886C0.149899 7.31303 -7.00846e-05 7.77545 2.45703e-08 8.24999V12.75C2.45703e-08 13.3467 0.237053 13.919 0.659009 14.341C1.08097 14.7629 1.65326 15 2.25 15H15.75C16.3467 15 16.919 14.7629 17.341 14.341C17.7629 13.919 18 13.3467 18 12.75V8.24999C18.0001 7.77382 17.8491 7.3099 17.5688 6.92498C17.2884 6.54007 16.8932 6.25402 16.44 6.10799L16.4265 5.99999H17.25C17.4489 5.99999 17.6397 5.92098 17.7803 5.78032C17.921 5.63967 18 5.44891 18 5.25C18 5.05108 17.921 4.86032 17.7803 4.71967C17.6397 4.57901 17.4489 4.5 17.25 4.5H16.2345L15.9945 2.6205C15.9022 1.89668 15.5492 1.23131 15.0017 0.748962C14.4542 0.26661 13.7497 0.000340561 13.02 7.65771e-08H4.9785C4.24924 -0.000164611 3.54489 0.265309 2.99717 0.746778C2.44944 1.22825 2.09584 1.89274 2.0025 2.616L1.7595 4.5H0.749999C0.551087 4.5 0.360322 4.57901 0.21967 4.71967C0.0790177 4.86032 2.45703e-08 5.05108 2.45703e-08 5.25C2.45703e-08 5.44891 0.0790177 5.63967 0.21967 5.78032C0.360322 5.92098 0.551087 5.99999 0.749999 5.99999H1.566ZM4.9785 1.5H13.0185C13.3833 1.49996 13.7357 1.63291 14.0096 1.87395C14.2835 2.11499 14.4601 2.4476 14.5065 2.8095L14.9145 5.99999H3.0795L3.4905 2.808C3.53717 2.44637 3.71397 2.11412 3.98783 1.87339C4.26169 1.63265 4.61387 1.49992 4.9785 1.5ZM4.875 11.6235C4.72746 11.6235 4.58136 11.5944 4.44505 11.538C4.30874 11.4815 4.18489 11.3988 4.08056 11.2944C3.97624 11.1901 3.89348 11.0662 3.83702 10.9299C3.78056 10.7936 3.7515 10.6475 3.7515 10.5C3.7515 10.3525 3.78056 10.2064 3.83702 10.07C3.89348 9.93374 3.97624 9.80988 4.08056 9.70556C4.18489 9.60123 4.30874 9.51847 4.44505 9.46201C4.58136 9.40555 4.72746 9.37649 4.875 9.37649C5.17297 9.37649 5.45873 9.49486 5.66943 9.70556C5.88013 9.91625 5.99849 10.202 5.99849 10.5C5.99849 10.798 5.88013 11.0837 5.66943 11.2944C5.45873 11.5051 5.17297 11.6235 4.875 11.6235ZM13.122 11.6235C12.9744 11.6235 12.8284 11.5944 12.692 11.538C12.5557 11.4815 12.4319 11.3988 12.3276 11.2944C12.2232 11.1901 12.1405 11.0662 12.084 10.9299C12.0275 10.7936 11.9985 10.6475 11.9985 10.5C11.9985 10.3525 12.0275 10.2064 12.084 10.07C12.1405 9.93374 12.2232 9.80988 12.3276 9.70556C12.4319 9.60123 12.5557 9.51847 12.692 9.46201C12.8284 9.40555 12.9744 9.37649 13.122 9.37649C13.42 9.37649 13.7057 9.49486 13.9164 9.70556C14.1271 9.91625 14.2455 10.202 14.2455 10.5C14.2455 10.798 14.1271 11.0837 13.9164 11.2944C13.7057 11.5051 13.42 11.6235 13.122 11.6235Z"
                                        fill="#6A52FE" />
                                    <path
                                        d="M15.7422 16.5H13.4922V16.875C13.4922 17.1734 13.6107 17.4595 13.8217 17.6705C14.0327 17.8815 14.3188 18 14.6172 18C14.9156 18 15.2017 17.8815 15.4127 17.6705C15.6237 17.4595 15.7422 17.1734 15.7422 16.875V16.5Z"
                                        fill="#6A52FE" />
                                    <path
                                        d="M4.5 16.5H2.25V16.875C2.25 17.1734 2.36853 17.4595 2.5795 17.6705C2.79048 17.8815 3.07663 18 3.375 18C3.67337 18 3.95952 17.8815 4.17049 17.6705C4.38147 17.4595 4.5 17.1734 4.5 16.875V16.5Z"
                                        fill="#6A52FE" />
                                </svg>
                            </span>Are You Looking For <span>Car ?</span>
                        </h2>
                    </div>
                    <div class="wd-location-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <form class="form-inline justify-content-between wd-md-serach-car-form" name="frmSearch" id="frmSearch"
                        action="{{ route('front.template.stock_list', $domain_slug) }}">
                        <select id="make" name="make" class="custom-select wd-md-make-all">
                            <option value="">Make All</option>
                            @foreach ($make as $key => $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        <select id="model_list" name="modal" class="form-control">
                            <option value="">Model Any</option>
                        </select>
                        {{-- <div class="form-group">
                            <div class="d-flex justify-content-between wd-price-width">
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
                            <div class="d-flex justify-content-between wd-price-width">
                                <span>£0</span>
                                <span>£{{ $max_price }}</span>
                            </div>
                        </div> --}}
                        <x-forms.price-selector :maxPrice="$max_price" page="home" parentClass="form-group" />
                        <button class="btn car-search-btn">Search Car</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="wd-md-our-services">
        <div class="wd-edit-our-services">
            @if (is_login_for_edit() == 1)
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text', 'Image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            @endif
        </div>
        <div class="container">
            <div class="wd-md-our-ser-title text-center">
                <h2 class="home_our_services_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'title') }}
                </h2>
                <p class="home_our_services_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'sub_title') }}
                </p>
            </div>
            <div class="wd-md-services-area">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="row services_div">
                            @foreach ($web_content->services as $service)
                                <div class="col-md-6 item-{{ $service->id }}">
                                    @if (is_login_for_edit() == 1)
                                        <div class="wd-services-action action-div d-flex align-items-center">
                                            <a href="javascript:;" class="wd-edit"
                                                onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services_item',{{ json_encode(['Service Title' => 'text', 'Service Image' => 'file']) }},{{ $service->id }})">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="javascript:;" class="wd-delete"
                                                onclick="remove_items({{ $service->id }},'our_services_item','item-{{ $service->id }}')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    @endif
                                    <div class="wd-md-service-blog d-flex align-items-center">
                                        <img src="{{ checkFileExist($service->image) }}">
                                        <p>{{ $service->title }}</p>
                                    </div>
                                </div>
                            @endforeach
                            <!-------Add-Services------->
                            @if (is_login_for_edit() == 1)
                                <div class="col-md-6">
                                    <a href="javascript:;"
                                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_services_item',{{ json_encode(['Service Title' => 'text', 'Service Image' => 'file']) }})">
                                        <div class="wd-md-service-blog wd-add-services">
                                            <i class="fas fa-plus"></i>
                                            <p>Add Services</p>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="wd-md-our-ser-img">
                            <img class="home_our_services_image"
                                src="{{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'image') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wd-md-quotes-blog">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-quotes">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','about_us',{{ json_encode(['Sub Title' => 'text']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <p class="home_about_us_sub_title">
            {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'sub_title') }}</p>
    </section>
    <section class="wd-md-about">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-about">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','about_us',{{ json_encode(['Title' => 'text', 'Description' => 'textarea', 'image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="wd-md-about-blog d-flex align-items-center">
            <div class="wd-md-abt-img">
                <img src="{{ asset(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'image')) }}"
                    class="img-fluid home_about_us_image">
            </div>
            <div class="wd-md-abt-detail">
                <h2 class="home_about_us_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'title') }}
                </h2>
                <p class="home_about_us_description">{!! nl2br(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'description')) !!}</p>
            </div>
        </div>
    </section>
    <section class="wd-md-offer-blog">
        <div class="wd-edit-offer">
            @if (is_login_for_edit() == 1)
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','offer',{{ json_encode(['Title' => 'text', 'Sub Title' => 'textarea', 'image' => 'file']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            @endif
        </div>
        <div class="container">
            <div class="wd-md-offer-detail">
                <h2 class="home_offer_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'title') }}</h2>
                <p class="home_offer_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'sub_title') }}
                </p>
            </div>
            <div class="wd-md-offer-img">
                <img src="{{ checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'image')) }}"
                    class="img-fluid home_offer_image">
            </div>
        </div>
    </section>
    <section class="wd-md-recent-stock">
        {{-- @if (is_login_for_edit() == 1)
            <div class="wd-edit-stock">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','our_recent_stock',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text']) }})">
                    <img src="{{ asset('assets/web/images/edit-btn.png') }}">
                </a>
            </div>
        @endif --}}
        <div class="container">
            <div class="wd-recent-stock-title">
                <h2 class="home_our_recent_stock_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'title') }}
                </h2>
                <p class="home_our_recent_stock_sub_title">
                    {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'sub_title') }}
                </p>
            </div>
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
                        <div class="col-lg-4 col-md-6 stock-item-{{ $value->id }}">
                            {{-- @if (is_login_for_edit() == 1)
                <div class="wd-stock-action action-div d-flex align-items-center">
                    <a href="javascript:;" class="wd-edit" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}},{{$stock->id}})">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="javascript:;" class="wd-delete" onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
                @endif --}}
                            <div class="wd-sl-stocks">
                                <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}">
                                    <div class="wd-car-logo-blog">
                                        {{-- <img src="{{checkFileExist($stock->image)}}" class="wd-logo-img"> --}}
                                        <img src="{{ checkFileExist($stockImg) }}" class="wd-car-img">
                                    </div>
                                    <div class="wd-sl-stock_content">
                                        <div class="wd-sl-stock_topright">
                                            <span>{{ $value->make }}</span>
                                            <small>{{ $value->derivative }}</small><br>
                                            <small><b>{{ $value->attention_grabber }}</b></small>
                                        </div>
                                        <div class="wd-sl-stock_middle">
                                            <div class="wd-sl-stockmiddle_inner">
                                                <small>Category : &nbsp;</small>
                                                <span><b>{{ $value->category }}</b></span>
                                            </div>
                                            <div class="wd-sl-stockmiddle_inner">
                                                <small>Transmission : &nbsp;</small>
                                                <span><b>{{ $value->transmission }}</b></span>
                                            </div>
                                            <div class="wd-sl-stockmiddle_inner">
                                                <small>Colour : &nbsp;</small>
                                                <span><b>{{ $value->colour }}</b></span>
                                            </div>
                                            <div class="wd-sl-stockmiddle_inner">
                                                <small>Mileage : &nbsp;</small>
                                                <span><b>{{ $value->mileage }}</b></span>
                                            </div>
                                            <div class="wd-sl-stockmiddle_inner">
                                                <small>YEAR : &nbsp;</small>
                                                <span><b>{{ $value->manufacture }}</b></span>
                                            </div>
                                        </div>
                                        <div class="wd-price-blgo d-flex align-items-center justify-content-between">
                                            <h4>£{{ number_format($value->price) }}</h4>
                                            <span>
                                                <svg width="24" height="16" viewBox="0 0 24 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M2.00434 10.0233L6.93664 9.58707C7.805 9.58707 8.50899 8.87769 8.50899 7.99941C8.50899 7.1226 7.805 6.41175 6.93664 6.41175L2.00434 5.97555C0.897443 5.97555 -3.98572e-07 6.88173 -3.49717e-07 7.99941C-3.00862e-07 9.11709 0.897443 10.0233 2.00434 10.0233ZM23.3521 9.66649C23.4204 9.59149 23.4728 9.53398 23.4996 9.50688C23.8269 9.07802 24 8.5537 24 7.98972C24 7.48449 23.8458 6.97925 23.5375 6.57096C23.3396 6.2875 22.8829 5.8322 22.8829 5.8322C21.2655 4.06242 17.2423 1.39967 15.2016 0.543418C15.2016 0.525793 13.9885 0.0190919 13.411 -5.86215e-07L13.3339 -5.82845e-07C12.4481 -5.44125e-07 11.6205 0.505231 11.1972 1.32183C11.0224 1.65947 10.8583 2.48677 10.7805 2.87896C10.7554 3.00539 10.7393 3.0866 10.7347 3.09161C10.5616 4.25776 10.4467 6.04663 10.4467 8.00881C10.4467 10.0709 10.5616 11.9361 10.7725 13.0832C10.7725 13.1023 10.9849 14.1524 11.1202 14.5019C11.3325 15.0072 11.7165 15.436 12.198 15.7077C12.5834 15.9016 12.9878 16 13.411 16C13.8547 15.9794 14.6823 15.6886 15.0096 15.552C17.1652 14.6958 21.2859 11.8979 22.864 10.1869C23.0404 10.0088 23.2242 9.80697 23.3521 9.66649Z"
                                                        fill="#6A52FE" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
                {{-- @if (is_login_for_edit() == 1)
                <div class="col-lg-4 col-md-6">
                    <a href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}})">
                        <div class="wd-md-add-stock">
                            <i class="fas fa-plus"></i>
                            <p>Add Stock</p>
                        </div>
                    </a>
                </div>
                @endif --}}
            </div>
        </div>
    </section>
    <section class="wd-md-testimonial">
        @if (is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn" href="javascript:;"
                    onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials',{{ json_encode(['Title' => 'text', 'Sub Title' => 'text']) }})"><img
                        src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
            </div>
        @endif
        <div class="container">
            <div class="wd-md-testimonial-title d-flex align-items-center justify-content-between">
                <div class="wd-test-tit">
                    <h2 class="home_testimonials_title">
                        {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'title') }}
                    </h2>
                    <p class="home_testimonials_sub_title">
                        {{ get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'sub_title') }}
                    </p>
                </div>
                <span>
                    <svg width="58" height="11" viewBox="0 0 58 11" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M49.1415 0.089897C48.9075 0.216135 48.7616 0.456179 48.7616 0.717263V4.78271H0.734294C0.328964 4.78271 0 5.10404 0 5.49997C0 5.8959 0.328964 6.21724 0.734294 6.21724H48.7616V10.2827C48.7616 10.5447 48.9075 10.7848 49.1415 10.9101C49.3755 11.0372 49.6614 11.0286 49.8875 10.89L57.6573 6.10726C57.8708 5.97528 58 5.74671 58 5.49997C58 5.25324 57.8708 5.02467 57.6573 4.89269L49.8875 0.10998C49.7681 0.0372977 49.632 0 49.4959 0C49.3745 0 49.2521 0.0306032 49.1415 0.089897Z"
                            fill="#6A52FE" />
                    </svg>
                </span>
            </div>
            <div class="testimonial_div">
                <div class="owl-carousel owl-theme ">
                    @foreach ($web_content->testimonial as $testimonial)
                        <div class="item testimonial-item-{{ $testimonial->id }}">
                            @if (is_login_for_edit() == 1)
                                <div class="wd-testi-action action-div d-flex align-items-center">
                                    <a href="javascript:;" class="wd-edit"
                                        onclick="remove_items({{ $testimonial->id }},'testimonials_item','testimonial-item-{{ $testimonial->id }}')"><i
                                            class="fa fa-trash"></i></a>
                                    <a href="javascript:;" class="wd-delete"
                                        onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials_item',{{ json_encode(['Description' => 'textarea', 'Label' => 'text', 'Author Name' => 'text', 'Author Image' => 'file']) }},{{ $testimonial->id }})"><i
                                            class="fa fa-edit"></i></a>
                                </div>
                            @endif
                            <div class="wd-md-testi-box">
                                <h6>{{ $testimonial->lable }}</h6>
                                <p>{{ $testimonial->description }}</p>
                            </div>
                            <div class="wd-testimonial-img d-flex align-items-center">
                                <img src="{{ checkFileExist($testimonial->author_image) }}" class="img-fluid">
                                <p>{{ $testimonial->author_name }}</p>
                                <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="12" fill="#6A52FE" />
                                        <path
                                            d="M12.2473 17C14.1965 16.8641 16.9985 16.5552 17 12.7667V8H12.6504V13.1H14.0947C14.1862 14.4618 13.0562 14.8134 11.8275 15.0833L12.2473 17ZM6.41985 17C8.36909 16.8641 11.171 16.5552 11.1725 12.7667V8H6.82289V13.1H8.26718C8.35868 14.4618 7.22874 14.8134 6 15.0833L6.41985 17Z"
                                            fill="white" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    @endforeach
                    <!--------Add-Reviews-------->
                    <div class="item">
                        <div class="wd-md-testi-box">
                            <a href="javascript:;"
                                onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','home','testimonials_item',{{ json_encode(['Description' => 'textarea', 'Label' => 'text', 'Author Name' => 'text', 'Author Image' => 'file']) }})">
                                <div class="wd-add-review-stock">
                                    <i class="fas fa-plus"></i>
                                    <p>Add Reviews</p>
                                </div>
                            </a>
                        </div>
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
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 2,
                },
                1000: {
                    items: 3,
                }
            }
        })
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
