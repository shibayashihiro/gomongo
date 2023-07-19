@extends('layouts.template.t20.app')

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
    <section class="wd-car-stock-detail-blog">
        <div class="container">
            <div class="wd-md-search-car-blog wd-srh-bx">
                <div class="col-md-12">
                    <form class="form-inline justify-content-between wd-md-serach-car-form" name="frmSearch" id="frmSearch">
                        <div class="form-group mb-2">
                            <label>Order By</label>
                            <select class="form-control" id="order" name="order">
                                <option value="">Default Order</option>
                                <option value="price" {{ request()->order == 'price' ? 'selected' : '' }}>Price Low to
                                    High
                                </option>
                                <option value="-price" {{ request()->order == '-price' ? 'selected' : '' }}>Price High
                                    to Low
                                </option>
                                <option value="name" {{ request()->order == 'name' ? 'selected' : '' }}>Name Ascending
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
                        <div class="form-group mb-2">
                            <label>Min Price</label>
                            <select class="form-control mr-2" id="min_price-select" name="min_price">
                                <option value="">Min Price</option>
                                @for ($i = 2000; $i < $max_price - 500; $i += 500)
                                    <option value="{{ $i }}" {{ request()->min_price == $i ? 'selected' : '' }}>
                                        £{{ number_format($i) }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label>Max price</label>
                            <select class="form-control" id="max_price-select" name="max_price">
                                <option value="">Max Price</option>
                                @for ($i = 2500; $i <= $max_price; $i += 500)
                                    <option value="{{ $i }}" {{ request()->max_price == $i ? 'selected' : '' }}>
                                        £{{ number_format($i) }}</option>
                                @endfor
                            </select>
                        </div>
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
                            <select class="form-control" name="mileage">
                                <option value="">All</option>
                                @for ($i = 5000; $i <= $max_mileage + 5000; $i += 5000)
                                    <option value="{{ $i }}"
                                        {{ request()->mileage == $i ? 'selected' : '' }}>{{ number_format($i) }}
                                    </option>
                                @endfor
                            </select>
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
                        {{-- <x-forms.price-selector :maxPrice="$max_price" page="stock-list" parentClass="form-group mb-2" :hasLabel="false" /> --}}
                        <div class=" mrlf_8 wd-kr-srch-car">
                            <button class="btn car-search-btn wd-kr-btn">Search Car</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-5">
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
                                <div class="wd-car-logo-blog">
                                    <img src="{{ checkFileExist($stockImg) }}" class="wd-car-img">
                                </div>
                                <div class="wd-sl-stock_content">
                                    <div class="wd-sl-stock_topright">
                                        <span>{{ $value->make }}</span>
                                        <small>{{ $value->derivative }}</small><br>
                                        <small><b>{{ $value->attention_grabber }}</b></small>
                                    </div>
                                    <p>{{ $description }}</p>
                                    <div class="wd-sl-stock_middle">
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Category : &nbsp;</small>
                                            <span><b>{{ $value->vehicleCategory }}</b></span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Transmission : &nbsp;</small>
                                            <span><b>{{ $value->transmission }}</b></span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Make : &nbsp;</small>
                                            <span><b>{{ $value->make }}</b></span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Model : &nbsp;</small>
                                            <span><b>{{ $value->modal }}</b></span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>FUEL : &nbsp;</small>
                                            <span><b>{{ $value->fuel_type }}</b></span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Doors : &nbsp;</small>
                                            <span><b>{{ $value->doors }}</b></span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Body : &nbsp;</small>
                                            <span><b>{{ $value->body_type }}</b></span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Engine Size : &nbsp;</small>
                                            <span><b>{{ $value->engine_size . ' ' . $value->engine_size_unit }}</b></span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Mileage : &nbsp;</small>
                                            <span><b>{{ $value->mileage }}</b></span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>CO<sub>2</sub> Emission : &nbsp;</small>
                                            <span><b>not available</b></span>
                                        </div>
                                        <div class="wd-sl-stockmiddle_inner">
                                            <small>Color : &nbsp;</small>
                                            <span><b>{{ $value->colour }}</b></span>
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
