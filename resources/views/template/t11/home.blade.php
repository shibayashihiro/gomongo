@extends('layouts.template.t11.app')

@section('style')
<style>
    .banner-form .form-box {
        width: calc(25% - 16px);
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection

@section('content')
    <section id="home-banner">
        @if(is_login_for_edit() == 1)
            <div class="wd-edit-fir-sec">
                <a class="wd-edit-btn"
                   href="javascript:;"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','slider',{{json_encode(['Title'=>'text','Sub Title'=>'textarea','Slider Image 1'=>'file','Slider Image 2'=>'file','Slider Image 3'=>'file'])}})"><img
                        src="{{asset('assets/web/images/edit-btn.png')}}"></a>
            </div>
        @endif
        <div class="container-fluid">
            <div class="banner-content">
                <div class="col-lg-6 col-md-12 banner-left">
                    <div class="banner-cont">
                        <span>Most popular car</span>
                        <h1 class="home_slider_title">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'title')}}</h1>
                        <p class="home_slider_sub_title">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'sub_title')}}</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 banner-slider">
                    <div id="home-slider" class="owl-carousel">
                        <img class="home_slider_slider_image_1"
                             src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'slider_image_1'))}}"
                             alt="">
                        <img class="home_slider_slider_image_2"
                             src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'slider_image_2'))}}"
                             alt="">
                        <img class="home_slider_slider_image_3"
                             src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'slider', 'slider_image_3'))}}"
                             alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="car-gallery">
        <div class="c-gallery">
            <div class="image-box">
                @if(is_login_for_edit() == 1)
                    <div class="wd-edit-category-car">
                        <a class="wd-edit-btn"
                           href="javascript:;"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','car_category1',{{json_encode(['Title'=>'text','Image'=>'file'])}})"><img
                                src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                    </div>
                @endif
                <img
                    src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'car_category1', 'image'))}}"
                    alt="" class="home_car_category1_image">
                <div
                    class="gallery-text home_car_category1_title">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'car_category1', 'title')}}</div>
            </div>
            <div class="image-box">
                @if(is_login_for_edit() == 1)
                    <div class="wd-edit-category-car">
                        <a class="wd-edit-btn"
                           href="javascript:;"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','car_category2',{{json_encode(['Title'=>'text','Image'=>'file'])}})"><img
                                src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                    </div>
                @endif
                <img
                    src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'car_category2', 'image'))}}"
                    alt="" class="home_car_category2_image">
                <div
                    class="gallery-text home_car_category2_title">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'car_category2', 'title')}}</div>
            </div>
            <div class="image-box">
                @if(is_login_for_edit() == 1)
                    <div class="wd-edit-category-car">
                        <a class="wd-edit-btn"
                           href="javascript:;"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','car_category3',{{json_encode(['Title'=>'text','Image'=>'file'])}})"><img
                                src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                    </div>
                @endif
                <img
                    src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'car_category3', 'image'))}}"
                    alt="" class="home_car_category3_image">
                <div
                    class="gallery-text home_car_category3_title">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'car_category3', 'title')}}</div>
            </div>
            <div class="image-box">
                @if(is_login_for_edit() == 1)
                    <div class="wd-edit-category-car">
                        <a class="wd-edit-btn"
                           href="javascript:;"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','car_category4',{{json_encode(['Title'=>'text','Image'=>'file'])}})"><img
                                src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                    </div>
                @endif
                <img
                    src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'car_category4', 'image'))}}"
                    alt="" class="home_car_category4_image">
                <div
                    class="gallery-text home_car_category4_title">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'car_category4', 'title')}}</div>
            </div>
            <div class="image-box">
                @if(is_login_for_edit() == 1)
                    <div class="wd-edit-category-car">
                        <a class="wd-edit-btn"
                           href="javascript:;"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','car_category5',{{json_encode(['Title'=>'text','Image'=>'file'])}})"><img
                                src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                    </div>
                @endif
                <img
                    src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'car_category5', 'image'))}}"
                    alt="" class="home_car_category5_image">
                <div
                    class="gallery-text home_car_category5_title">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'car_category5', 'title')}}</div>
            </div>
        </div>
    </section>

    <section id="search-form-sect">
        <div class="banner-form">
            <form name="frmSearch" id="frmSearch"
                  action="{{route('front.template.stock_list', $domain_slug)}}">
            <div class="form-row">
                <div class="form-box">
                    <select id="make" name="make">
                        <option value="">Make All</option>
                        @foreach($make as $key=>$value)
                            <option
                                value="{{$value}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-box price">
                    <select id="model_list" name="modal">
                        <option value="">Model Any</option>
                    </select>
                </div>
                <!-- <div class="form-box price">
                    <div class="d-flex justify-content-between">
                        <label>Min price</label>
                        <label>Max price</label>
                    </div>
                    <div class="slider-wrapper">
                        <input class="input-range" data-slider-id='ex12cSlider' type="text"
                               data-slider-step="1" data-slider-value="{{request()->min_max_price}}"
                               data-slider-min="0"
                               data-slider-max="{{$max_price}}" data-slider-range="true"
                               data-slider-tooltip_split="true" name="min_max_price"/>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>£0</span>
                        <span>£{{$max_price}}</span>
                    </div>
                </div> -->
                <x-forms.price-selector :maxPrice="$max_price" page="home" parentClass="form-box price" />
                
                <div class="form-box action">
                    <button class="y-btn">Search Cars</button>
                </div>
            </div>
            </form>
        </div>
    </section>

    <section id="about-us">
        <div class="container-fluid">
            <div class="row about-cont-main">
                @if(is_login_for_edit() == 1)
                    <div class="wd-edit-abt-us-lower">
                        <a class="wd-edit-btn"
                           href="javascript:;"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','about_us',{{json_encode([
    'Title'=>'text',
    ])}})"><img
                                src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="sect-title">
                        <h2 class="home_about_us_title">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'title')}}</h2>
                    </div>
                </div>
                <div class="col-md-12 about-blog-sect">
                    <ul id="tabs" class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            @if(is_login_for_edit() == 1)
                                <div class="wd-edit-category-car">
                                    <a class="wd-edit-btn"
                                       href="javascript:;"
                                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','about_us',{{json_encode([
    'Category Title 1'=>'text',
    'Category Description 1'=>'textarea',
    'Category Image 1'=>'file',
    ])}})"><img
                                            src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                                </div>
                            @endif
                            <a id="tab-a" href="#pane-a" class="nav-link" data-toggle="tab" role="tab"
                               aria-selected="false"><img class="home_about_us_category_image_1"
                                                          src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'category_image_1'))}}"
                                                          alt=""></a>
                        </li>
                        <li class="nav-item">
                            @if(is_login_for_edit() == 1)
                                <div class="wd-edit-category-car">
                                    <a class="wd-edit-btn"
                                       href="javascript:;"
                                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','about_us',{{json_encode([
    'Category Title 2'=>'text',
    'Category Description 2'=>'textarea',
    'Category Image 2'=>'file',
    ])}})"><img
                                            src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                                </div>
                            @endif
                            <a id="tab-b" href="#pane-b" class="nav-link" data-toggle="tab" role="tab"
                               aria-selected="true"><img class="home_about_us_category_image_2"
                                                         src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'category_image_2'))}}"
                                                         alt=""></a>
                        </li>
                        <li class="nav-item">
                            @if(is_login_for_edit() == 1)
                                <div class="wd-edit-category-car">
                                    <a class="wd-edit-btn"
                                       href="javascript:;"
                                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','about_us',{{json_encode([
    'Category Title 3'=>'text',
    'Category Description 3'=>'textarea',
    'Category Image 3'=>'file',
    ])}})"><img
                                            src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                                </div>
                            @endif
                            <a id="tab-c" href="#pane-c" class="nav-link" data-toggle="tab" role="tab"
                               aria-selected="true"><img
                                    class="home_about_us_category_image_3"
                                    src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'category_image_3'))}}"
                                    alt=""></a>
                        </li>
                        <li class="nav-item">
                            @if(is_login_for_edit() == 1)
                                <div class="wd-edit-category-car">
                                    <a class="wd-edit-btn"
                                       href="javascript:;"
                                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','about_us',{{json_encode([
    'Category Title 4'=>'text',
    'Category Description 4'=>'textarea',
    'Category Image 4'=>'file',
    ])}})"><img
                                            src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                                </div>
                            @endif
                            <a id="tab-d" href="#pane-d" class="nav-link active" data-toggle="tab" role="tab"
                               aria-selected="true"><img class="home_about_us_category_image_4"
                                                         src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'category_image_4'))}}"
                                                         alt=""></a>
                        </li>
                        <li class="nav-item">
                            @if(is_login_for_edit() == 1)
                                <div class="wd-edit-category-car">
                                    <a class="wd-edit-btn"
                                       href="javascript:;"
                                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','about_us',{{json_encode([
    'Category Title 5'=>'text',
    'Category Description 5'=>'textarea',
    'Category Image 5'=>'file',
    ])}})"><img
                                            src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                                </div>
                            @endif
                            <a id="tab-e" href="#pane-e" class="nav-link" data-toggle="tab" role="tab"
                               aria-selected="true"><img
                                    class="home_about_us_category_image_5"
                                    src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'category_image_5'))}}"
                                    alt=""></a>
                        </li>
                        <li class="nav-item">
                            @if(is_login_for_edit() == 1)
                                <div class="wd-edit-category-car">
                                    <a class="wd-edit-btn"
                                       href="javascript:;"
                                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','about_us',{{json_encode([
    'Category Title 6'=>'text',
    'Category Description 6'=>'textarea',
    'Category Image 6'=>'file',
    ])}})"><img
                                            src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                                </div>
                            @endif
                            <a id="tab-f" href="#pane-f" class="nav-link" data-toggle="tab" role="tab"
                               aria-selected="true"><img
                                    class="home_about_us_category_image_6"
                                    src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'category_image_6'))}}"
                                    alt=""></a>
                        </li>
                    </ul>
                    <div id="content" class="tab-content" role="tablist">
                        <div id="pane-a" class="card tab-pane fade" role="tabpanel"
                             aria-labelledby="tab-a">
                            <div class="col-lg-6 col-md-12 about-desc">
                                <span
                                    class="home_about_us_category_title_1">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'category_title_1')}}</span>
                                <p class="home_about_us_category_description_1">{!! nl2br(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'category_description_1')) !!}</p>
                                {{-- <a href="#" class="y-btn">Read More</a> --}}
                            </div>
                            <div class="col-lg-6 col-md-12 about-img"><img class="home_about_us_category_image_1"
                                                                           src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'category_image_1'))}}"
                                                                           alt=""></div>
                        </div>
                        <div id="pane-b" class="card tab-pane fade" role="tabpanel"
                             aria-labelledby="tab-b">
                            <div class="col-lg-6 col-md-12 about-desc">
                                <span
                                    class="home_about_us_category_title_2">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'category_title_2')}}</span>
                                <p class="home_about_us_category_description_2">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'category_description_2')}}</p>
                                {{-- <a href="#" class="y-btn">Read More</a> --}}
                            </div>
                            <div class="col-lg-6 col-md-12 about-img"><img class="home_about_us_category_image_2"
                                                                           src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'category_image_2'))}}"
                                                                           alt=""></div>
                        </div>
                        <div id="pane-c" class="card tab-pane fade" role="tabpanel"
                             aria-labelledby="tab-c">
                            <div class="col-lg-6 col-md-12 about-desc">
                                <span
                                    class="home_about_us_category_title_3">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'category_title_3')}}</span>
                                <p class="home_about_us_category_description_3">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'category_description_3')}}</p>
                                {{-- <a href="#" class="y-btn">Read More</a> --}}
                            </div>
                            <div class="col-lg-6 col-md-12 about-img"><img class="home_about_us_category_image_3"
                                                                           src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'category_image_3'))}}"
                                                                           alt=""></div>
                        </div>
                        <div id="pane-d" class="card tab-pane fade active show" role="tabpanel"
                             aria-labelledby="tab-d">
                            <div class="col-lg-6 col-md-12 about-desc">
                                <span
                                    class="home_about_us_category_title_4">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'category_title_4')}}</span>
                                <p class="home_about_us_category_description_4">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'category_description_4')}}</p>
                                {{-- <a href="#" class="y-btn">Read More</a> --}}
                            </div>
                            <div class="col-lg-6 col-md-12 about-img"><img class="home_about_us_category_image_4"
                                                                           src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'category_image_4'))}}"
                                                                           alt=""></div>
                        </div>
                        <div id="pane-e" class="card tab-pane fade" role="tabpanel"
                             aria-labelledby="tab-e">
                            <div class="col-lg-6 col-md-12 about-desc">
                                <span
                                    class="home_about_us_category_title_5">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'category_title_5')}}</span>
                                <p class="home_about_us_category_description_5">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'category_description_5')}}</p>
                                {{-- <a href="#" class="y-btn">Read More</a> --}}
                            </div>
                            <div class="col-lg-6 col-md-12 about-img"><img class="home_about_us_category_image_5"
                                                                           src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'category_image_5'))}}"
                                                                           alt=""></div>
                        </div>
                        <div id="pane-f" class="card tab-pane fade" role="tabpanel"
                             aria-labelledby="tab-f">
                            <div class="col-lg-6 col-md-12 about-desc">
                                <span
                                    class="home_about_us_category_title_6">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'category_title_6')}}</span>
                                <p class="home_about_us_category_description_6">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'category_description_6')}}</p>
                                {{-- <a href="#" class="y-btn">Read More</a> --}}
                            </div>
                            <div class="col-lg-6 col-md-12 about-img"><img class="home_about_us_category_image_6"
                                                                           src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'about_us', 'category_image_6'))}}"
                                                                           alt=""></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="our-services">
        @if(is_login_for_edit() == 1)
            <div class="wd-edit-our-ser-t4">
                <a class="wd-edit-btn"
                   href="javascript:;"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services',{{json_encode(['Title'=>'text','Sub Title'=>'text'])}})"><img
                        src="{{asset('assets/web/images/edit-btn.png')}}"></a>
            </div>
        @endif
        <div class="container-fluid">
            <div class="row o-serv-cont">
                <div class="col-lg-3 col-md-12">
                    <div class="sect-title">
                        <span>YOU MUST KNOW</span>
                        <h2 class="home_our_services_title">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'title')}}</h2>
                        <p class="home_our_services_sub_title">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'sub_title')}}</p>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 sect-cont">
                    <div class="row services-blog services_div">
                        <div class="serv-row">
                            @foreach($web_content->services as $service)
                                @if($loop->index == '0' || $loop->index == '1')
                                    <div class="services-box item-{{$service->id}}">
                                        @if(is_login_for_edit() == 1)
                                            <div class="services-action-div">
                                                <a href="javascript:;" class="service-action-remove"
                                                   onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')"><i
                                                        class="fa fa-trash"></i></a>
                                                <a herf="javascript:;" class="service-action-edit"
                                                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}},{{$service->id}})"><i
                                                        class="fa fa-edit"></i></a>
                                            </div>
                                        @endif
                                        <span><img src="{{checkFileExist($service->image)}}" alt=""></span>
                                        <h5><a href="#">{{$service->title}}</a></h5>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="serv-row middile-box">
                            @foreach($web_content->services as $service)
                                @if($loop->index == '2')
                                    <div class="services-box item-{{$service->id}}">
                                        @if(is_login_for_edit() == 1)
                                            <div class="services-action-div">
                                                <a href="javascript:;" class="service-action-remove"
                                                   onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')"><i
                                                        class="fa fa-trash"></i></a>
                                                <a herf="javascript:;" class="service-action-edit"
                                                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}},{{$service->id}})"><i
                                                        class="fa fa-edit"></i></a>
                                            </div>
                                        @endif
                                        <span><img src="{{checkFileExist($service->image)}}" alt=""></span>
                                        <h5><a href="#">{{$service->title}}</a></h5>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="serv-row">
                            @foreach($web_content->services as $service)
                                @if($loop->index >= '3')
                                    <div class="services-box item-{{$service->id}}">
                                        @if(is_login_for_edit() == 1)
                                            <div class="services-action-div">
                                                <a href="javascript:;" class="service-action-remove"
                                                   onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')"><i
                                                        class="fa fa-trash"></i></a>
                                                <a herf="javascript:;" class="service-action-edit"
                                                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}},{{$service->id}})"><i
                                                        class="fa fa-edit"></i></a>
                                            </div>
                                        @endif
                                        <span><img src="{{checkFileExist($service->image)}}" alt=""></span>
                                        <h5><a href="#">{{$service->title}}</a></h5>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                    @if(is_login_for_edit() == 1)
                        <div class="services-box service-add-btn-t11">
                            <div class="wd-sl-servercard">
                                <div class="service-content">
                                    <a href="javascript:;"
                                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}})"><i
                                            class="fa fa-plus"></i>
                                        <h6>Add Services</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section id="testimonial">
        @if(is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn"
                   href="javascript:;"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials',{{json_encode(['Title'=>'text','Sub Title'=>'text'])}})"><img
                        src="{{asset('assets/web/images/edit-btn.png')}}"></a>
            </div>
        @endif
        <div class="container-fluid">

            <div class="sect-title">
                <span
                    class="home_testimonials_title">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'title')}}</span>
                <h2 class="home_testimonials_sub_title">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'testimonials', 'sub_title')}}</h2>
            </div>
            <div class="test-slider-blog testimonial_div">
                <div class="owl-carousel">
                    @foreach($web_content->testimonial as $testimonial)
                        <div class="item item1 testimonial-item-{{$testimonial->id}}">
                            @if(is_login_for_edit() == 1)
                                <div class="testimonial-action-div">
                                    <a href="javascript:;" class="testimonial-action-remove"
                                       onclick="remove_items({{$testimonial->id}},'testimonials_item','testimonial-item-{{$testimonial->id}}')"><i
                                            class="fa fa-trash"></i></a>
                                    <a herf="javascript:;" class="testimonial-action-edit"
                                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}},{{$testimonial->id}})"><i
                                            class="fa fa-edit"></i></a>
                                </div>
                            @endif
                            <div class="slide-box">
                                <span><img src="{{checkFileExist($testimonial->author_image)}}" alt=""></span>
                                <h3>{{$testimonial->author_name}}</h3>
                                <p>{{$testimonial->description}}</p>
                            </div>
                        </div>
                    @endforeach
                    <div class="item testimonial-action-add-btn-t11">
                        <div class="slide-box">
                            <a herf="javascript:;"
                                onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}})"><i
                                    class="fa fa-plus"></i>
                                <h6>Add Testimonial</h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="our-work">
        @if(is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn"
                   href="javascript:;"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock',{{json_encode(['Title'=>'text','Sub Title'=>'text'])}})"><img
                        src="{{asset('assets/web/images/edit-btn.png')}}"></a>
            </div>
        @endif
        <div class="container-fluid">
            <div class="sect-title">
                <span
                    class="home_our_recent_stock_sub_title">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'sub_title')}}</span>
                <h2 class="home_our_recent_stock_title">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'title')}}</h2>
            </div>
        </div>
        <div class="stock_div">
            <div id="stock-slider" class="owl-carousel">
                @foreach($stocks as $key => $value)
                    @php
                        $images = explode(',',$value->images);
                        $stockImg = "";
                        if(!empty($images) && isset($images[0])){
                            $stockImg = $images[0];
                        }
                    @endphp
                    <div class="stock-item stock-item-{{$value->id}}">
                        {{--@if(is_login_for_edit() == 1)
                            <div class="stock-action-div">
                                <a href="javascript:;" class="stock-action-remove"
                                   onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                        class="fa fa-trash"></i></a>
                                <a herf="javascript:;" class="stock-action-edit"
                                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                        class="fa fa-edit"></i></a>
                            </div>
                        @endif--}}
                        <h4>{{$value->make}} &nbsp;£<strong>{{ number_format($value->price) }}</strong><br><small>{{$value->attention_grabber}}</small></h4>
                        <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}"><img src="{{checkFileExist($stockImg)}}" alt=""></a>
                    </div>
                @endforeach
                {{--@if(is_login_for_edit() == 1)
                    <div class="stock-item stock-action-add-more">
                        <div class="wd-md-our-work-blog-img-t11">
                            <a href="javascript:;"
                               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}})"><i
                                    class="fa fa-plus"></i>
                                <h4>Add Stock</h4>
                            </a>
                        </div>
                    </div>
                @endif--}}
            </div>
        </div>
    </section>

    <section id="we-offer">
        @if(is_login_for_edit() == 1)
            <div class="wd-edit-testimonial">
                <a class="wd-edit-btn"
                   href="javascript:;"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','offer',{{json_encode(['Title'=>'text','Sub Title'=>'textarea','image'=>'file'])}})"><img
                        src="{{asset('assets/web/images/edit-btn.png')}}"></a>
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="offer-cont-main">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="about-img">
                            <img class="ab-full-img home_offer_image"
                                 src="{{checkFileExist(get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'image'))}}"
                                 alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 offer-des">
                        <div class="sect-title">
                            <span>Who we are</span>
                            <h3
                                class="home_offer_title">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'title')}}</h3>
                            <p class="home_offer_sub_title">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'offer', 'sub_title')}}</p>
                            {{-- <a href="#" class="y-btn">Read more</a> --}}
                        </div>
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
        (function ($) {
            $(document).ready(function () {
                $('.input-range').each(function () {
                    var value = $(this).attr('data-slider-value');
                    var separator = value.indexOf(',');
                    if (separator !== -1) {
                        value = value.split(',');
                        value.forEach(function (item, i, arr) {
                            arr[i] = parseFloat(item);
                        });
                    } else {
                        value = parseFloat(value);
                    }
                    $(this).slider({
                        formatter: function (value) {
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
