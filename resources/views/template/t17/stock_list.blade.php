@extends('layouts.template.t17.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection

@section('content')
    <section id="bannerot">
        <div class="container">
            <div class="wd-kr-bnr_title">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.template.home', $domain_slug) }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Stock List</li>
                    </ol>
                </nav>
                <h3>Stock List</h3>
                <p>With a wide variety of stock, we are confident we can help you in finding your dream car! Have a look at
                    our diverse stock portfolio and contact us to book a viewing or test drive!</p>
            </div>
        </div>
    </section>
    <section id="stock">
        <div class="container">
            <div class="wd-kr-srch-car-box">
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
                            <label>Make (any)</label>
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
                        <div class="form-group">
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
                        <div class="form-group">
                            <label>Mileage (any)</label>
                            <select class="form-control" name="mileage">
                                <option value="">All</option>
                                @for ($i = 5000; $i <= $max_mileage + 5000; $i += 5000)
                                    <option value="{{ $i }}"
                                        {{ request()->mileage == $i ? 'selected' : '' }}>{{ number_format($i) }}
                                    </option>
                                @endfor
                            </select>
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
                        {{-- <div class="form-group">
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
                        <x-forms.price-selector :maxPrice="$max_price" page="stock-list" parentClass="form-group value-filter"
                            :hasLabel="false" />
                        <div class="wd-kr-btn mrlf_8 ">
                            <button class="btn car-search-btn wd-kr-srch-car">Search Car</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="wd-kr-stock-main mt-5">
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
                            <div class="col-md-4 mrgb_30">
                                <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}"
                                    class="wd-kr-stocks">
                                    <div class="wd-kr-stock-car-img">
                                        <img src="{{ checkFileExist($stockImg) }}">
                                    </div>
                                    <div class="wd-kr-stock_content">
                                        <div class="wd-kr-stock_top">
                                            <div class="wd-kr-stock_topright text-center">
                                                <span>{{ $value->make }}</span>
                                                <small>{{ $value->derivative }}</small><br>
                                                <small><b>{{ $value->attention_grabber }}</b></small>
                                            </div>
                                        </div>
                                        <p>{{ $description }}</p>
                                        <div class="wd-kr-stock_middle">
                                            <div class="wd-sl-stockmiddle_inner">
                                                <small>Category: &nbsp;</small><br>
                                                <span><b>{{ $value->vehicleCategory }}</b></span>
                                            </div>
                                            <div class="wd-sl-stockmiddle_inner">
                                                <small>Transmission: &nbsp;</small><br>
                                                <span><b>{{ $value->transmission }}</b></span>
                                            </div>
                                            <div class="wd-sl-stockmiddle_inner">
                                                <small>Mileage: &nbsp;</small><br>
                                                <span><b>{{ $value->mileage }}</b></span>
                                            </div>
                                        </div>
                                        <div class="wd-kr-stock_middle">
                                            <div class="wd-sl-stockmiddle_inner">
                                                <small>Body: &nbsp;</small><br>
                                                <span><b>{{ $value->body_type }}</b></span>
                                            </div>
                                            <div class="wd-sl-stockmiddle_inner">
                                                <small>CO<sub>2</sub> Emission: &nbsp;</small><br>
                                                <span><b>not available</b></span>
                                            </div>
                                            <div class="wd-sl-stockmiddle_inner">
                                                <small>Color: &nbsp;</small><br>
                                                <span><b>{{ $value->colour }}</b></span>
                                            </div>
                                        </div>
                                        <div class="wd-kr-stock_middle">
                                            <div class="wd-sl-stockmiddle_inner">
                                                <small>MAKE: &nbsp;</small><br>
                                                <span><b>{{ $value->make }}</b></span>
                                            </div>
                                            <div class="wd-sl-stockmiddle_inner">
                                                <small>Model: &nbsp;</small><br>
                                                <span><b>{{ $value->modal }}</b></span>
                                            </div>
                                            <div class="wd-sl-stockmiddle_inner">
                                                <small>FUEL: &nbsp;</small><br>
                                                <span><b>{{ $value->fuel_type }}</b></span>
                                            </div>
                                        </div>
                                        <div class="wd-kr-stock_middle">
                                            <div class="wd-sl-stockmiddle_inner">
                                                <small>Doors: &nbsp;</small><br>
                                                <span><b>{{ $value->doors }}</b></span>
                                            </div>
                                            <div class="wd-sl-stockmiddle_inner">
                                                <small>Engine Size: &nbsp;</small><br>
                                                <span><b>{{ $value->engine_size . ' ' . $value->engine_size_unit }}</b></span>
                                            </div>
                                            <div class="wd-sl-stockmiddle_inner">
                                                <small>YEAR: &nbsp;</small><br>
                                                <span><b>{{ $value->manufacture }}</b></span>
                                            </div>
                                        </div>
                                        <div class="wd-kr-stock_middle">
                                            <h3 class="text-center">£{{ number_format($value->price) }}</h3>
                                        </div>
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
