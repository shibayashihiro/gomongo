@extends('layouts.template.t10.app')

@section('style')
    <style>
        .contact_detail_edit_icon {
            width: unset !important;
            background: unset !important;
            border-radius: unset !important;
            border: unset !important;
        }
    </style>
@endsection

@section('content')
    <section class="wd-md-stock-main text-center mb-0">
        <div class="container">
            <div class="head-box stock-list-box">
                <svg class="leftsvg" width="13" height="13" viewBox="0 0 13 13" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect width="13" height="13" fill="#5BC8CC" />
                </svg>
                <h1>Stock Details</h1>
                <svg class="rightsvg" width="13" height="13" viewBox="0 0 13 13" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect width="13" height="13" fill="#5BC8CC" />
                </svg>
            </div>
            <p>With a wide variety of stock, we are confident we can help you in finding <br> your dream car! Have a look at
                our diverse stock portfolio and contact us to <br> book a viewing or test drive!</p>
        </div>
    </section>

    <section id="stock" class="mt-5 mb-5">
        <div class="container">
            <div class="row">

                <div class="col-lg-8">
                    <div class="wd-details-bg">

                        <div class="wd-title-box">
                            <div class="wd-car-price-text">
                                <p>£{{ number_format($stock->price) }}<br /> <span>AutoTrader Good price</span></p>
                            </div>
                            <div class="wd-car-price-title">
                                <h6>{{ $stock->make }}</h6>
                                <p>{{ $stock->derivative }}</p>
                            </div>
                        </div>

                        <div class="wd-dt-car-gallery">

                            {{-- <div class="wd-dt-compare-text">
                            <a href="#"><i class="fas fa-plus"></i> Compare specifications with other vehicles</a>
                        </div> --}}

                            <div class="gallery clearfix">
                                <div class="pics clearfix d-flex flex-wrap">
                                    @foreach (explode(',', $stock->images) as $key => $image)
                                        @if ($key == 0)
                                            <div class="col-lg-6 p-0">
                                                <a href="#" data-toggle="modal" data-target="#stock-list-detail-img"
                                                    class="full"><img src="{{ $image }}"></a>
                                            </div>
                                        @endif
                                    @endforeach
                                    <div class="col-lg-6 p-0">
                                        <div class="thumbs">
                                            @foreach (explode(',', $stock->images) as $key => $image)
                                                @if ($key <= 7)
                                                    <div class="preview">
                                                        <a href="#" class="selected" data-full="{{ $image }}">
                                                            <img src="{{ $image }}" />
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                            <div class="preview">
                                                <div class="view-more-gallery">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#stock-list-detail-img">View more images</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="wd-car-details-content">

                            <div class="wd-car-dt-btn">
                                <ul>
                                    <li><a href="mailto:{{ $stock->user->email }}?subject=Help%20Me&body=Hi%0AI%20am%20interested%20in%20({{$stock->registration}}).%20I%20would%20like%20to%20reserve%20it%20for%20({{date('Y-m-d')}})%20at%20({{date('H:i:s')}})%0ARegards%0A">Book a test drive</a></li>
                                    <li><a target="_blank" href="{{ route('front.template.finance', $domain_slug) }}">Apply
                                            for finance</a></li>
                                    <li><a href="mailto:{{ $stock->user->email }}?subject=Help%20Me&body=Hi%0AI%20am%20interested%20in%20({{$stock->registration}}).%20I%20would%20like%20to%20reserve%20it%20for%20({{date('Y-m-d')}})%20at%20({{date('H:i:s')}})%0ARegards%0A">Reserve online</a></li>
                                </ul>
                                <span>in partnership with AutoTrader</span>
                            </div>

                            <div class="wp-dt-ket-cont d-flex flex-wrap align-items-center justify-content-between">
                                <div class="wp-dt-ket-text">
                                    <h5>Key facts</h5>
                                </div>
                                <div class="wp-dt-ket-text">
                                    <a href="{{ route('front.template.stock_details.print_summary', [$domain_slug, $stock->id]) }}"
                                        target="_blank"><i class="fa fa-print"></i> Print summary</a>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap align-items-center">
                                <div class="col-6 col-lg-2 pl-0">
                                    <div class="wd-key-fact-text">
                                        <p>Model Year: <span>{{ $stock->manufacture }}</span></p>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-2 pl-0">
                                    <div class="wd-key-fact-text">
                                        <p>Fuel type: <span>{{ $stock->fuel_type }}</span></p>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-2 pl-0">
                                    <div class="wd-key-fact-text">
                                        <p>Mileage: <span>{{ $stock->mileage }}</span></p>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-2 pl-0">
                                    <div class="wd-key-fact-text">
                                        <p>Transmission: <span>{{ $stock->transmission }}</span></p>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-2 pl-0">
                                    <div class="wd-key-fact-text">
                                        <p>Engine size:
                                            <span>{{ $stock->engine_size . ' ' . $stock->engine_size_unit }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-2 pl-0">
                                    <div class="wd-key-fact-text">
                                        <p>Color: <span>{{ $stock->colour }}</span></p>
                                    </div>
                                </div>
                            </div>
                            @include('template.modal.stock-details-modal')

                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="right-phone-number">
                        @if (is_login_for_edit() == 1)
                            <a class="wd-edit-btn contact_detail_edit_icon" href="javascript:;"
                                onclick="getDynamicModal('{{ $web_content->id }}','{{ $web_content->template }}','common','footer',{{ json_encode([
                                    'Contact number' => 'text',
                                ]) }})"><img
                                    src="{{ asset('assets/web/images/edit-btn.png') }}"></a>
                        @endif
                        <h5 class="common_footer_contact_number">
                            {{-- {{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'contact_number') }} --}}
                            Dealer Office
                        </h5>
                        <h6 class="common_footer_contact_number">
                            <i class="fa fa-phone"></i>
                            &nbsp;
                            {{ get_web_content_detail($web_content->id, $web_content->template, 'common', 'footer', 'contact_number') }}
                        </h6>
                        {{-- <div class="d-flex flex-wrap align-items-center justify-content-center">
                    <img src="./assets/images/no-msg.png" alt="" />
                    <p>Dealer office<br /><span>Request call back</span></p>
                </div>
                <a href="#"><i class="fa fa-map-marker-alt"></i> Find us</a> --}}
                    </div>
                    <div class="right-enquire-form">
                        <h4>Enquire about this vehicle</h4>
                        <form method="post"
                            action="{{ route('front.template.stock_details.enquiry', [$domain_slug, $stock->id]) }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="full_name" placeholder="Your Full name *"
                                    required>
                                <!--<small class="sub-error">Error text type</small>-->
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone" placeholder="Your phone number *"
                                    required>
                                <!--<small class="sub-error">Error text type</small>-->
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email"
                                    placeholder="Your email address *" required>
                                <!--<small class="sub-error">Error text type</small>-->
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="message" placeholder="Your message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit enquiry</button>
                        </form>
                        <p>By submitting this enquiry, you agree to sending your details us and third parties we use to
                            process enquiries so that we may contact you regarding your enquiry.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div class="modal fade" id="stock-list-detail-img" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="owl-carousel owl-theme">
                        @foreach (explode(',', $stock->images) as $key => $image)
                            <div class="item">
                                <img src="{{ $image }}" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            nav: true,
            margin: 30,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 1,
                },
                1000: {
                    items: 1,
                }
            }
        })
    </script>
    <script>
        $(document).ready(function() {
            $(".preview a").on("click", function() {
                $(".selected").removeClass("selected");
                $(this).addClass("selected");
                var picture = $(this).data();
                event.preventDefault(); //prevents page from reloading every time you click a thumbnail
                $(".full img").fadeOut(100, function() {
                    $(".full img").attr("src", picture.full);
                    $(".full").attr("href", picture.full);
                    $(".full").attr("title", picture.title);
                }).fadeIn();
            }); // end on click
            $(".full").fancybox({
                helpers: {
                    title: {
                        type: 'inside'
                    }
                },
                closeBtn: true,
            });
        }); //end doc ready
    </script>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);
        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
                '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
@endsection
