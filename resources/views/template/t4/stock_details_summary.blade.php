<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{isset($title)?print_title($title).' | ':''}}{{ print_title(site_name) }}</title>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Favicon [ 16*16 SVG ]-->
    <link href="{{$web_content->favicon}}" rel="icon" class="favicon">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- Bootstrap  CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/template/t1/vendors/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/template/t1/vendors/owl.carousel/css/owl.carousel.min.css')}}">

    <!-- Custome CSS -->
    <style>
        :root {
            --primary: {
                    {
                    ( !empty($web_content->color))?$web_content->color: '#DC7000'
                }
            }

            ;

            --secondary: {
                    {
                    ( !empty($web_content->secondary_color))?$web_content->secondary_color: '#8C7000'
                }
            }

            ;
        }

        /* Print screen */
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/template/t1/css/header_footer.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/template/t1/css/custome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/template/t1/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/template/t1/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/template/css/common.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/dashboard/css/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/css/edit.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/css/loader.css')}}">
</head>

<body>
    <!-- Stock List Details -->
    <section class="wd-md-stock-list wd-detal-box">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="wd-details-bg">

                        <div class="wd-title-box">
                            <div class="wd-car-price-text">
                                <p>£{{number_format($stock->price)}}<br /> <span>AutoTrader Good price</span></p>
                            </div>
                            <div class="wd-car-price-title">
                                <h6>{{$stock->make}}</h6>
                                <p>{{$stock->derivative}}</p>
                            </div>
                        </div>

                        <div class="wd-dt-car-gallery">

                            <div class="gallery clearfix">
                                <div class="pics clearfix d-flex flex-wrap">
                                    @php
                                    $images = explode(',', $stock->images);
                                    @endphp
                                    @foreach(explode(',', $stock->images) as $key => $image)
                                    @if($key == 0)
                                    <div class="col-lg-6 p-0">
                                        <a href="#" data-toggle="modal" data-target="#stock-list-detail-img" class="full"><img src="{{$image}}"></a>
                                    </div>
                                    @endif
                                    @endforeach
                                    <div class="col-lg-6 p-0">
                                        <div class="thumbs">
                                            @foreach(explode(',', $stock->images) as $key => $image)
                                            @if($key <= 7) <div class="preview">
                                                <a href="#" class="selected" data-full="{{$image}}">
                                                    <img src="{{$image}}" />
                                                </a>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="wd-car-details-content">
                        <hr>

                        <div class="d-flex flex-wrap align-items-center">
                            <div class="col-6 col-lg-2 pl-0">
                                <div class="wd-key-fact-text">
                                    <p>Model Year: <span>{{$stock->manufacture}}</span></p>
                                </div>
                            </div>
                            <div class="col-6 col-lg-2 pl-0">
                                <div class="wd-key-fact-text">
                                    <p>Fuel type: <span>{{$stock->fuel_type}}</span></p>
                                </div>
                            </div>
                            <div class="col-6 col-lg-2 pl-0">
                                <div class="wd-key-fact-text">
                                    <p>Mileage: <span>{{$stock->mileage}}</span></p>
                                </div>
                            </div>
                            <div class="col-6 col-lg-2 pl-0">
                                <div class="wd-key-fact-text">
                                    <p>Transmission: <span>{{$stock->transmission}}</span></p>
                                </div>
                            </div>
                            <div class="col-6 col-lg-2 pl-0">
                                <div class="wd-key-fact-text">
                                    <p>Engine size:
                                        <span>{{$stock->engine_size.' '.$stock->engine_size_unit}}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-lg-2 pl-0">
                                <div class="wd-key-fact-text">
                                    <p>Color: <span>{{$stock->colour}}</span></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <p>
                            {{$stock->key_information}}}
                        </p>
                    </div>
                    <!-- Print button -->
                    <div class="wd-car-dt-btn no-print">
                        <ul class="justify-content-end">
                            <li>
                                <a href="javascript:window.print()" class="btn">Print</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</body>

</html>