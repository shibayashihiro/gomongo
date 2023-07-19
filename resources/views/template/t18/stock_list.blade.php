@extends('layouts.template.t18.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection

@section('content')
    <section class="wd-stock-list-main-blog">
        <div class="container">
            <div class="wd-stock-list-title">
                <h1>Stock List</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
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
                                <option value="">Default Order</option>
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
                                <option value="" {{ request()->limit == '' ? 'selected' : '' }}>All</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Model (any)</label>
                            <select class="custom-select form-control" id="model_list" name="modal">
                                <option value="">Model Any</option>
                                @if ($modal)
                                    @foreach ($modal as $key => $value)
                                        <option value="{{ $value->modal }}"
                                            {{ request()->modal == $value->modal ? 'selected' : '' }}>{{ $value->modal }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Make (all)</label>
                            <select class="custom-select wd-md-make-all" id="make" name="make">
                                <option value="">All</option>
                                @foreach ($make as $key => $value)
                                    <option value="{{ $value }}" {{ request()->make == $value ? 'selected' : '' }}>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        
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
                                <div class="d-flex justify-content-between wd-width">
                                    <span>£0</span>
                                    <span>£{{ $max_price }}</span>
                                </div>
                            </div> -->
                        <div class="form-group">
                            <label>Min Price</label>
                            <select class="custom-select form-control" id="min_price-select" name="min_price">
                                <option value="">Min Price</option>
                                @for ($i = 2000; $i < $max_price - 500; $i += 500)
                                    <option value="{{ $i }}" {{ request()->min_price == $i ? 'selected' : '' }}>
                                        £{{ number_format($i) }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Max Price</label>
                            <select class="custom-select form-control" id="max_price-select" name="max_price">
                                <option value="">Max Price</option>
                                @for ($i = 2500; $i <= $max_price; $i += 500)
                                    <option value="{{ $i }}" {{ request()->max_price == $i ? 'selected' : '' }}>
                                        £{{ number_format($i) }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Body Type (all)</label>
                            <select class="custom-select" id="body_type" name="body_type">
                                <option value="">All</option>
                                @foreach ($body_type as $key => $value)
                                    <option value="{{ $value }}" {{ request()->body_type == $value ? 'selected' : '' }}>
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
                        <button class="btn car-search-btn">Search Car</button>
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
                                <div class="wd-md-stock-img">
                                    <img src="{{ checkFileExist($stockImg) }}" class="stock-car-img">
                                </div>
                                <div class="wd-sl-stock_content">
                                    <div class="wd-sl-stock_top">
                                        <div class="wd-sl-stock_topright">
                                            <span>{{ $value->make }}</span>
                                            <small>{{ $value->derivative }}</small><br>
                                            <small>{{ $value->attention_grabber }}</small>
                                        </div>
                                    </div>
                                    <p>{{ $description }}</p>
                                    <div class="wd-sl-stock_middle">
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Category</small>
                                            <span>{{ $value->vehicleCategory }}</span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Transmission</small>
                                            <span>{{ $value->transmission }}</span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Mileage</small>
                                            <span>{{ $value->mileage }}</span>
                                        </div>
                                    </div>
                                    <div class="wd-sl-stock_middle">
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Body</small>
                                            <span>{{ $value->body_type }}</span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>CO<sub>2</sub> Emission</small>
                                            <span>not available</span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Color</small>
                                            <span>{{ $value->colour }}</span>
                                        </div>
                                    </div>
                                    <div class="wd-sl-stock_middle">
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>MAKE</small>
                                            <span>{{ $value->make }}</span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Model</small>
                                            <span>{{ $value->modal }}</span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>FUEL</small>
                                            <span>{{ $value->fuel_type }}</span>
                                        </div>
                                    </div>
                                    <div class="wd-sl-stock_middle">
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Doors</small>
                                            <span>{{ $value->doors }}</span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Engine Size</small>
                                            <span>{{ $value->engine_size . ' ' . $value->engine_size_unit }}</span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>YEAR</small>
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
                <div class="wd-md-stock-pagination pagination">
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
