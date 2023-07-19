@extends('layouts.template.t15.app')

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
                        <div class="form-group mb-2">
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
                        <div class="form-group mb-2">
                            <label>Per Page</label>
                            <select class="form-control" id="limit" name="limit">
                                <option value="5" {{ request()->limit == 5 ? 'selected' : '' }}>5</option>
                                <option value="10" {{ request()->limit == 10 ? 'selected' : '' }}>10</option>
                                <option value="20" {{ request()->limit == 20 ? 'selected' : '' }}>20</option>
                                <option value="50" {{ request()->limit == 50 ? 'selected' : '' }}>50</option>
                                <option value="" {{ request()->limit == '' ? 'selected' : '' }}>-All-</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label>Make (all)</label>
                            <select class="custom-select wd-md-make-all" id="make" name="make">
                                <option value="">All</option>
                                @foreach ($make as $key => $value)
                                    <option value="{{ $value }}" {{ request()->make == $value ? 'selected' : '' }}>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
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
                        {{-- <div class="form-group mb-2">
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
                            <div class="d-flex justify-content-between wd-width">
                                <span>£0</span>
                                <span>£{{ $max_price }}</span>
                            </div>
                        </div> --}}
                        <div class="form-group mb-2">
                            <label>Body Type (all)</label>
                            <select class="custom-select" id="body_type" name="body_type">
                                <option value="">All</option>
                                @foreach ($body_type as $key => $value)
                                    <option value="{{ $value }}"
                                        {{ request()->body_type == $value ? 'selected' : '' }}>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
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
                        <div class="form-group mb-2">
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
                        <div class="form-group mb-2">
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
                        <div class="form-group mb-2">
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
                        <div class="form-group mb-2">
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
                        <div class="form-group mb-2">
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
                        <div class="form-group mb-2">
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
                        <div class="form-group mb-2">
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
                        <x-forms.price-selector :maxPrice="$max_price" page="stock-list"
                            parentClass="form-group mb-2 price-filter" :hasLabel="false" />
                        <button class="btn car-search-btn">

                            <span>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 18C11.775 17.9996 13.4988 17.4054 14.897 16.312L19.293 20.708L20.707 19.294L16.311 14.898C17.405 13.4997 17.9996 11.7754 18 10C18 5.589 14.411 2 10 2C5.589 2 2 5.589 2 10C2 14.411 5.589 18 10 18ZM10 4C13.309 4 16 6.691 16 10C16 13.309 13.309 16 10 16C6.691 16 4 13.309 4 10C4 6.691 6.691 4 10 4Z"
                                        fill="white" />
                                    <path
                                        d="M11.4099 8.58609C11.7889 8.96609 11.9979 9.46809 11.9979 10.0001H13.9979C13.9988 9.47451 13.8955 8.95398 13.694 8.46857C13.4924 7.98316 13.1967 7.54251 12.8239 7.17209C11.3099 5.66009 8.68488 5.66009 7.17188 7.17209L8.58388 8.58809C9.34388 7.83009 10.6539 7.83209 11.4099 8.58609Z"
                                        fill="white" />
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
            <div class="row">
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
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}"
                                class="wd-sl-stocks">
                                <img src="{{ checkFileExist($stockImg) }}">
                                <div class="wd-sl-stock_content">
                                    <div class="wd-sl-stock_top">
                                        <div class="wd-sl-stock_topright">
                                            <span>{{ $value->make }}</span>
                                            <small>{{ $value->derivative }}</small><br>
                                            <span>{{ $value->attention_grabber }}</span>
                                        </div>
                                    </div>
                                    <p>{{ $description }}</p>
                                    <div class="wd-sl-stock_middle">
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Category : &nbsp;</small>
                                            <span>{{ $value->vehicleCategory }}</span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Transmission : &nbsp;</small>
                                            <span>{{ $value->transmission }}</span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Mileage : &nbsp;</small>
                                            <span>{{ $value->mileage }}</span>
                                        </div>
                                    </div>
                                    <div class="wd-sl-stock_middle">
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Body : &nbsp;</small>
                                            <span>{{ $value->body_type }}</span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>CO<sub>2</sub> Emission : &nbsp;</small>
                                            <span>not available</span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Color : &nbsp;</small>
                                            <span>{{ $value->colour }}</span>
                                        </div>
                                    </div>
                                    <div class="wd-sl-stock_middle">
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>MAKE : &nbsp;</small>
                                            <span>{{ $value->make }}</span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Model : &nbsp;</small>
                                            <span>{{ $value->modal }}</span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>FUEL : &nbsp;</small>
                                            <span>{{ $value->fuel_type }}</span>
                                        </div>
                                    </div>
                                    <div class="wd-sl-stock_middle">
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Doors : &nbsp;</small>
                                            <span>{{ $value->doors }}</span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Engine Size : &nbsp;</small>
                                            <span>{{ $value->engine_size . ' ' . $value->engine_size_unit }}</span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>YEAR : &nbsp;</small>
                                            <span>{{ $value->manufacture }}</span>
                                        </div>
                                    </div>
                                    <h4>£{{ number_format($value->price) }}</h4>
                                </div>
                            </a>
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
                <div class="col-md-12 wd-sl-stocks d-flex justify-content-center mb-5 stocks-pagination">
                    {{ $stocks->withQueryString()->links() }}
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
