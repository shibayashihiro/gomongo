@extends('layouts.template.t12.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection

@section('content')
    <section class="wd-stock-list-main-blog">
        <div class="container">
            <div class="wd-stock-list-title">
                <h1>Stock List</h1>
                <p>With a wide variety of stock, we are confident we can help you in finding your dream car! Have a look at
                    our diverse stock<br> portfolio and contact us to book a viewing or test drive!</p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.template.home', $domain_slug) }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Stock List</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="wd-stock-list-serach-car">
        <div class="container">
            <div class="wd-md-search-car-blog">
                <div class="col-md-12">
                    <form class="form-inline justify-content-between wd-md-serach-car-form" name="frmSearch" id="frmSearch">
                        <div class="form-group">
                            <label>Order By</label>
                            <select class="form-control" id="order" name="order">
                                <option value="">Default</option>
                                <option value="price" {{ request()->order == 'price' ? 'selected' : '' }}>Price Low
                                    to
                                    High</option>
                                <option value="-price" {{ request()->order == '-price' ? 'selected' : '' }}>Price
                                    High to
                                    Low</option>
                                <option value="name" {{ request()->order == 'name' ? 'selected' : '' }}>Name
                                    Ascending
                                </option>
                                <option value="-name" {{ request()->order == '-name' ? 'selected' : '' }}>Name
                                    Descending
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Per Page</label>
                            <select class="form-control" id="limit" name="limit">
                                <option value="5" {{ request()->limit == 5 ? 'selected' : '' }}>5</option>
                                <option value="10" {{ request()->limit == 10 ? 'selected' : '' }}>10</option>
                                <option value="20" {{ request()->limit == 20 ? 'selected' : '' }}>20</option>
                                <option value="50" {{ request()->limit == 50 ? 'selected' : '' }}>50</option>
                                <option value="" {{ request()->limit == '' ? 'selected' : '' }}>-All-</option>
                            </select>
                        </div>
                        <div class="form-group">
                            {{-- <label>Make (all)</label> --}}
                            <label>Make (all)</label>
                            <select class="custom-select wd-md-make-all" id="make" name="make">
                                <option value="">All</option>
                                @foreach ($make as $key => $value)
                                    <option value="{{ $value }}" {{ request()->make == $value ? 'selected' : '' }}>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Model (any)</label>
                            <select class="form-control" id="model_list" name="modal">
                                <option value="">Model Any</option>
                                @if ($modal)
                                    @foreach ($modal as $key => $value)
                                        <option value="{{ $value->modal }}"
                                            {{ request()->modal == $value->modal ? 'selected' : '' }}>{{ $value->modal }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        {{-- <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <label>Min price</label>
                                <label>Max price</label>
                            </div>
                            <div class="slider-wrapper">
                                <input class="input-range" data-slider-id='ex12cSlider' type="text" data-slider-step="1"
                                    data-slider-value="{{ request()->min_max_price }}" data-slider-min="0"
                                    data-slider-max="{{ $max_price }}" data-slider-range="true"
                                    data-slider-tooltip_split="true" name="min_max_price" />
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>£0</span>
                                <span>£{{ $max_price }}</span>
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <!-- <label>Body Type (all)</label> -->
                            <label>Body Type</label>
                            <select class="custom-select" id="body_type" name="body_type">
                                <option value="">All</option>
                                @foreach ($body_type as $key => $value)
                                    <option value="{{ $value }}"
                                        {{ request()->body_type == $value ? 'selected' : '' }}>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mileage (any)</label>
                            <!-- <div class="slider-wrapper green">
                                    <input class="input-range" data-slider-id='ex1Slider' type="text"
                                           data-slider-min="0" data-slider-tooltip="always"
                                           data-slider-max="{{ $max_mileage }}"
                                           data-slider-step="1" data-slider-value="{{ request()->mileage }}"
                                           name="mileage"/>
                                </div> -->
                            <select class="form-control" name="mileage">
                                <option value="">All</option>
                                @for ($i = 5000; $i <= $max_mileage + 5000; $i += 5000)
                                    <option value="{{ $i }}"
                                        {{ request()->mileage == $i ? 'selected' : '' }}>{{ number_format($i) }}
                                    </option>
                                @endfor
                            </select>
                            <!-- <div class="wd-slider-mileage">
                                    <span>{{ $max_mileage }}</span>
                                </div> -->
                        </div>
                        <div class="form-group">
                            <label>Min engine size (any)</label>
                            <select class="form-control" id="engine_size_min" name="engine_size_min">
                                <option value="">All</option>
                                @foreach ($engine_size as $key => $value)
                                    <option value="{{ $value }}"
                                        {{ request()->engine_size_min == $value ? 'selected' : '' }}>
                                        {{ number_format($value/1000,1) }}L
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Max engine size (any)</label>
                            <select class="form-control" id="engine_size_max" name="engine_size_max">
                                <option value="">All</option>
                                @foreach ($engine_size as $key => $value)
                                    <option value="{{ $value }}"
                                        {{ request()->engine_size_max == $value ? 'selected' : '' }}>
                                        {{ number_format($value/1000,1) }}L
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fuel type (any)</label>
                            <select class="form-control" id="fuel_type" name="fuel_type">
                                <option value="">All</option>
                                @foreach ($fuel_type as $key => $value)
                                    <option value="{{ $value }}"
                                        {{ request()->fuel_type == $value ? 'selected' : '' }}>{{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Gearbox (any)</label>
                            <select class="form-control" id="transmission" name="transmission">
                                <option value="">All</option>
                                @foreach ($transmission as $key => $value)
                                    <option value="{{ $value }}"
                                        {{ request()->transmission == $value ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Min year (any)</label>
                            <select class="form-control" id="manufacture_min" name="manufacture_min">
                                <option value="">All</option>
                                @foreach ($manufacture as $key => $value)
                                    <option value="{{ $value }}"
                                        {{ request()->manufacture_min == $value ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Max year (any)</label>
                            <select class="form-control" id="manufacture_max" name="manufacture_max">
                                <option value="">All</option>
                                @foreach ($manufacture as $key => $value)
                                    <option value="{{ $value }}"
                                        {{ request()->manufacture_max == $value ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>No. of doors (any)</label>
                            <select class="form-control" id="doors" name="doors">
                                <option value="">All</option>
                                @foreach ($doors as $key => $value)
                                    <option value="{{ $value }}"
                                        {{ request()->doors == $value ? 'selected' : '' }}>{{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <x-forms.price-selector :maxPrice="$max_price" page="stock-list" parentClass="form-group mb-2"
                            :hasLabel="false" />
                        <button class="btn car-search-btn">
                            <span>
                                <svg width="33" height="23" viewBox="0 0 33 23" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_25_871)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M2.42014 8.01299C-0.190211 6.70701 0.11057 5.25035 2.73435 5.40368L3.3198 6.48759L4.53098 2.78644C5.00632 1.32184 5.79856 0 7.35349 0H22.8303C24.3825 0 25.2768 1.29805 25.6528 2.77851L26.5605 6.37391L27.0976 5.40368C29.7832 5.2477 30.0329 6.78897 27.1889 8.11874C26.8054 7.97424 26.4101 7.86192 26.0073 7.78299C25.5243 7.68904 25.0333 7.64123 24.541 7.64023C24.0495 7.64005 23.5592 7.68787 23.0774 7.78299C22.5892 7.87832 22.1122 8.02272 21.654 8.21391C21.197 8.40009 20.7598 8.63033 20.3488 8.90126C19.9366 9.16992 19.5517 9.47713 19.1994 9.81862C18.8508 10.1646 18.5378 10.5436 18.2649 10.9501C17.711 11.7586 17.3254 12.6672 17.1304 13.6233C16.9354 14.5794 16.9349 15.564 17.1289 16.5203C17.2171 16.948 17.3429 17.3673 17.5049 17.7734L17.5639 17.9241C17.5962 18.0008 17.6284 18.0748 17.6633 18.1515H5.72068V18.8494C5.71926 19.0794 5.62563 19.2996 5.46017 19.462C5.2947 19.6244 5.07078 19.7159 4.83713 19.7166H1.07737C0.843252 19.7166 0.618645 19.6254 0.452599 19.4629C0.286552 19.3004 0.192555 19.0799 0.191136 18.8494V16.8455C0.188476 16.8006 0.188476 16.7556 0.191136 16.7107C-0.0854749 13.1126 -0.485621 9.86885 2.42014 8.01299ZM25.489 9.5992C26.5479 9.59868 27.588 9.87495 28.503 10.3998C29.4179 10.9246 30.1749 11.6791 30.6966 12.5863C31.2182 13.4934 31.4859 14.5207 31.4721 15.563C31.4584 16.6054 31.1638 17.6254 30.6184 18.519L32.9333 21.0014C32.9849 21.0565 33.0121 21.1294 33.0091 21.2043C33.0061 21.2791 32.973 21.3497 32.9172 21.4006L31.2173 22.926C31.1898 22.951 31.1575 22.9705 31.1224 22.9832C31.0873 22.996 31.0499 23.0018 31.0125 23.0003C30.9751 22.9989 30.9383 22.9901 30.9043 22.9747C30.8703 22.9592 30.8398 22.9372 30.8144 22.9101L28.5988 20.5123C28.1695 20.7708 27.7083 20.9743 27.2265 21.1177C26.6662 21.2882 26.0835 21.3773 25.497 21.3821C24.7127 21.3831 23.936 21.2313 23.2116 20.9353C22.486 20.6384 21.8264 20.2046 21.27 19.6584V19.6425C20.7216 19.0984 20.2856 18.4546 19.9863 17.747C19.6083 16.8537 19.4599 15.8825 19.5542 14.9192C19.6485 13.956 19.9827 13.0306 20.5271 12.2248C21.0716 11.4191 21.8094 10.758 22.6754 10.3C23.5413 9.842 24.5087 9.6013 25.4917 9.5992H25.489ZM28.8647 12.1609C28.4211 11.7241 27.8946 11.3774 27.3152 11.1405H27.299C26.7255 10.9091 26.1115 10.7905 25.4917 10.7915C24.8654 10.7888 24.2448 10.9084 23.6658 11.1435C23.0868 11.3786 22.5609 11.7244 22.1186 12.1609C21.6737 12.5967 21.3214 13.1152 21.082 13.6863V13.6863C20.7215 14.5446 20.6275 15.4888 20.8116 16.3997C20.9958 17.3107 21.45 18.1474 22.1169 18.8045C22.7837 19.4615 23.6333 19.9093 24.5585 20.0914C25.4837 20.2735 26.4429 20.1817 27.3152 19.8276C27.8936 19.5887 28.4197 19.2423 28.8647 18.8071C29.5307 18.1501 29.9845 17.3139 30.1689 16.4037C30.3534 15.4935 30.2603 14.5499 29.9013 13.6916C29.6607 13.1196 29.3085 12.5996 28.8647 12.1609V12.1609ZM7.22727 12.2799L3.88376 11.8675C3.09421 11.7802 2.88205 12.108 3.15329 12.7769L3.51316 13.6414C3.6163 13.8434 3.77198 14.0149 3.96433 14.1384C4.19287 14.2668 4.45048 14.3368 4.7136 14.342L7.69724 14.3657C8.41697 14.3657 8.72849 14.0802 8.5029 13.4272C8.42245 13.137 8.25979 12.8752 8.03393 12.6726C7.80806 12.4699 7.52829 12.3346 7.22727 12.2825V12.2799ZM4.56858 7.30448H25.2258L24.3127 3.5769C24.063 2.44276 23.3459 1.46195 22.1643 1.46195H7.86643C6.68479 1.46195 6.07785 2.4692 5.71799 3.5769L4.56858 7.30448Z"
                                            fill="#FFDD9B"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_25_871">
                                            <rect width="33" height="23" fill="white"></rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </span>Search Car
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="wd-car-stock-detail-blog">
        <div class="container mt-5">
            {{-- <div class="wd-display-vehicles d-flex align-items-center justify-content-between">
                <p>Displaying 1 - 50 Of 50 Vehicles</p>
                <form>
                    <select class="custom-select">
                        <option selected="">High to low</option>
                        <option>High to low </option>
                        <option>High to low </option>
                        <option>High to low </option>
                    </select>
                </form>
            </div>
            <hr> --}}
            @if ($stocks->count() > 0)
                @foreach ($stocks as $key => $value)
                    @php
                        // $spec = \GuzzleHttp\json_decode($value->specification);
                        $images = explode(',', $value->images);
                        $stockImg = '';
                        if (!empty($images) && isset($images[0])) {
                            $stockImg = $images[0];
                        }
                        
                        $description = $value->key_information;
                        if (strlen($description) > 200) {
                            $description = substr($description, 0, 200) . '...';
                        }
                    @endphp
                    <div class="wd-stock-car-details">
                        <div class="wd-stock-det-top d-flex align-items-center justify-content-between">
                            <div class="wd-stock-car-logo-name d-flex align-items-center">
                                <div class="wd-stock-car-name ml-3">
                                    <h6>{{ $value->make }}</h6>
                                    <p>{{ $value->derivative }}</p><br>
                                    <p><strong>{{ $value->attention_grabber }}</strong></p><br>
                                    <p>{{ $description }}</p>
                                </div>
                            </div>
                            <div class="wd-stock-car-price-contact d-flex align-items-center">
                                <h6>£{{ number_format($value->price) }}</h6>
                                <div class="wd-stock-cont-info-btn d-flex align-items-center">
                                    {{-- <a href="javascript:;" class="wd-contact-btn">Contact Us</a> --}}
                                    <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}"
                                        class="wd-more-info-btn">More Info</a>
                                </div>
                            </div>
                        </div>
                        <div class="wd-stock-det-bottom d-flex align-items-center row">
                            <div class="col-lg-5">
                                <img src="{{ checkFileExist($stockImg) }}" class="img-fluid">
                            </div>
                            <div class="col-lg-7">
                                <div class="wd-stock-car-inner-detail">
                                    <div class="wd-stock-car-feature">
                                        <h6>CATEGORY: &nbsp;</h6>
                                        <p>{{ $value->category }}</p>
                                    </div>
                                    <div class="wd-stock-car-feature">
                                        <h6>TRANSMISSION: &nbsp;</h6>
                                        <p>{{ $value->transmission }}</p>
                                    </div>
                                    <div class="wd-stock-car-feature">
                                        <h6>COLOUR: &nbsp;</h6>
                                        <p>{{ $value->colour }}</p>
                                    </div>
                                    <div class="wd-stock-car-feature">
                                        <h6>MILEAGE: &nbsp;</h6>
                                        <p>{{ $value->mileage }}</p>
                                    </div>
                                    <div class="wd-stock-car-feature">
                                        <h6>FUEL: &nbsp;</h6>
                                        <p>{{ $value->fuel_type }}</p>
                                    </div>
                                    <div class="wd-stock-car-feature">
                                        <h6>BODY: &nbsp;</h6>
                                        <p>{{ $value->body_type }}</p>
                                    </div>
                                </div>
                                <div class="wd-stock-car-inner-detail">
                                    <div class="wd-stock-car-feature">
                                        <h6>Make: &nbsp;</h6>
                                        <p>{{ $value->make }}</p>
                                    </div>
                                    <div class="wd-stock-car-feature">
                                        <h6>Model: &nbsp;</h6>
                                        <p>{{ $value->modal }}</p>
                                    </div>
                                    <div class="wd-stock-car-feature">
                                        <h6>Doors: &nbsp;</h6>
                                        <p>{{ $value->doors }}</p>
                                    </div>
                                    <div class="wd-stock-car-feature">
                                        <h6>Engine Size: &nbsp;</h6>
                                        <p>{{ $value->engine_size . ' ' . $value->engine_size_unit }}</p>
                                    </div>
                                    <div class="wd-stock-car-feature">
                                        <h6>CO<sub>2</sub> Emission: &nbsp;</h6>
                                        <p>not available</p>
                                    </div>
                                    <div class="wd-stock-car-feature">
                                        <h6>YEAR: &nbsp;</h6>
                                        <p>{{ $value->manufacture }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="wd-stock-car-details">
                    <div class="wd-stock-det-top d-flex align-items-center justify-content-between">
                        <div class="wd-stock-car-logo-name d-flex align-items-center">
                            <div class="wd-stock-car-name text-center">
                                <p>No data found</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mb-5 stocks-pagination">
                {{ $stocks->withQueryString()->links() }}
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
