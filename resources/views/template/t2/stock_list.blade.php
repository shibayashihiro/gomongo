@extends('layouts.template.t2.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection

@section('content')
    <section class="wd-md-stock-main">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('front.template.home', $domain_slug) }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Stock List</li>
                </ol>
            </nav>
            <h2>Stock List</h2>
            <p>With a wide variety of stock, we are confident we can help you in finding your dream car! Have a look at our
                diverse stock portfolio and contact us to book a viewing or test drive!</p>
            <p>Total {{ $stocks->total() }} vehicles found</p>
        </div>
    </section>
    <section class="wd-md-stock-list">
        <div class="container-fluid">
            <div class="wd-md-stock-blog">
                <div class="row">

                    <div class="col-lg-2">

                        <div class="sub-form-stock">
                            <form name="frmSearch" id="frmSearch">
                                <div class="form-group">
                                    <button class="btn btn-primary"><i class="fas fa-search"></i> Update Search</button>
                                </div>
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
                                        <option value="" {{ request()->limit == '' ? 'selected' : '' }}>-All-
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Make (all)</label>
                                    <select class="form-control" id="make" name="make">
                                        <option value="">All</option>
                                        @foreach ($make as $key => $value)
                                            <option value="{{ $value }}"
                                                {{ request()->make == $value ? 'selected' : '' }}>{{ $value }}
                                            </option>
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
                                                    {{ request()->modal == $value->modal ? 'selected' : '' }}>
                                                    {{ $value->modal }}</option>
                                            @endforeach
                                        @endif
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
                                                <div class="d-flex justify-content-between">
                                                    <span>£0</span>
                                                    <span>£{{ $max_price }}</span>
                                                </div>
                                            </div> -->
                                <x-forms.price-selector :maxPrice="$max_price" page="stock-list" parentClass="form-group" />

                                <div class="form-group">
                                    <label>Body Type (all)</label>
                                    <select class="form-control" id="body_type" name="body_type">
                                        <option value="">All</option>
                                        @foreach ($body_type as $key => $value)
                                            <option value="{{ $value }}"
                                                {{ request()->body_type == $value ? 'selected' : '' }}>{{ $value }}
                                            </option>
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
                                <div class="form-group">
                                    <button class="btn btn-primary"><i class="fas fa-search"></i> Update Search</button>
                                </div>
                            </form>
                        </div>

                    </div>

                    <div class="col-lg-10">
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
                                    <div class="col-lg-6">
                                        <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}"
                                            class="wd-md-car-detail-box">
                                            <div class="wd-md-car-img">
                                                <img src="{{ checkFileExist($stockImg) }}" class="img-fluid"
                                                    alt="">
                                                <p>£{{ number_format($value->price) }}</p>
                                                {{-- <img src="{{checkFileExist($stockImg)}}"
                                    class="brand-logo" alt=""> --}}
                                            </div>
                                            <div class="wd-md-detail-blog">
                                                <div class="wd-md-car-name">
                                                    <h3> {{ $value->make }}</h3>
                                                    <p>{{ $value->derivative }}</p>
                                                    <p><b>{{ $value->attention_grabber }}</b></p>
                                                    <p>{{ $description }}</p>
                                                </div>
                                                <div class="wd-md-car-detail d-flex align-items-center">
                                                    <div class="wd-feature-detail">
                                                        <p>CATEGORY</p>
                                                        <h6>{{ $value->category }}</h6>
                                                    </div>
                                                    <div class="wd-feature-detail">
                                                        <p>TRANSMISSION</p>
                                                        <h6>{{ $value->transmission }}</h6>
                                                    </div>
                                                    <div class="wd-feature-detail">
                                                        <p>MAKE</p>
                                                        <h6>{{ $value->make }}</h6>
                                                    </div>
                                                </div>
                                                <div class="wd-md-car-detail d-flex align-items-center">
                                                    <div class="wd-feature-detail">
                                                        <p>MODEL</p>
                                                        <h6>{{ $value->modal }}</h6>
                                                    </div>
                                                    <div class="wd-feature-detail">
                                                        <p>BODY</p>
                                                        <h6>{{ $value->body_type }}</h6>
                                                    </div>
                                                    <div class="wd-feature-detail">
                                                        <p>MILEAGE</p>
                                                        <h6>{{ $value->mileage }}</h6>
                                                    </div>
                                                </div>
                                                <div class="wd-md-drop-content collapse"
                                                    id="collapse{{ $key }}">
                                                    <div class="wd-md-car-detail d-flex align-items-center">
                                                        <div class="wd-feature-detail">
                                                            <p>YEAR</p>
                                                            <h6>{{ $value->manufacture }}</h6>
                                                        </div>
                                                        <div class="wd-feature-detail">
                                                            <p>FUEL</p>
                                                            <h6>{{ $value->fuel_type }}</h6>
                                                        </div>
                                                        <div class="wd-feature-detail">
                                                            <p>DOORS</p>
                                                            <h6>{{ $value->doors }}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="wd-md-car-detail d-flex align-items-center">
                                                        <div class="wd-feature-detail">
                                                            <p>Engine SIZE</p>
                                                            <h6>{{ $value->engine_size . ' ' . $value->engine_size_unit }}
                                                            </h6>
                                                        </div>
                                                        <div class="wd-feature-detail">
                                                            <p>CO<sub>2</sub> Emission</p>
                                                            <h6>not available</h6>
                                                        </div>
                                                        <div class="wd-feature-detail">
                                                            <p>COLOUR</p>
                                                            <h6>{{ $value->colour }}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a data-toggle="collapse" href="#collapse{{ $key }}"
                                            class="wd-md-drop-button collapsed"><i class="fas fa-angle-down"></i></a>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-lg-12">
                                    <div class="wd-md-car-detail-box">

                                        <div class="wd-md-detail-blog d-block text-center">
                                            <p>No data found</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center mb-5 stocks-pagination">
                        {{ $stocks->withQueryString()->links() }}
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
