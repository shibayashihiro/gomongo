@extends('layouts.template.t13.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection

@section('content')
    <section id="bannerot">
        <div class="container">
            <div class="wd-sl-bnr_title">
                <h3>Stock List</h3>
                <p>With a wide variety of stock, we are confident we can help you in finding your dream car! Have a look at
                    our diverse stock portfolio and contact us to book a viewing or test drive!</p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.template.home', $domain_slug) }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Stock list</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="wd-main-search-list-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <form name="frmSearch" id="frmSearch">
                        <div class="wd-search-filter-blog">
                            <div class="filter-head d-flex align-items-center justify-content-between">
                                <h3>Filters</h3>
                                {{-- <a href="javascript:;">
                                <svg width="25" height="20" viewBox="0 0 25 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.19365 4.83611C5.55525 6.47451 4.88974 8.75291 5.2224 10.9033L7.68009 10.084L5.8624 17.4824L0 12.6189L2.56 11.7741C1.92 8.65088 2.81607 5.27168 5.22231 2.86528C8.11515 -0.027565 12.3647 -0.718626 15.8975 0.740482L15.232 3.47959C12.6207 2.19959 9.36955 2.66048 7.19355 4.83639L7.19365 4.83611Z" fill="url(#paint0_linear_341_8415)"></path>
                                    <path d="M21.7594 7.83125C22.3994 10.9544 21.5033 14.3337 19.0971 16.7401C16.2042 19.6329 11.9547 20.324 8.42188 18.8649L9.08743 16.1257C11.6987 17.4057 14.9498 16.945 17.1258 14.7689C18.7642 13.1305 19.4297 10.8521 19.0971 8.70174L16.6394 9.52103L18.4571 2.12262L24.3195 6.98663L21.7594 7.83125Z" fill="url(#paint1_linear_341_8415)"></path>
                                    <defs>
                                        <linearGradient id="paint0_linear_341_8415" x1="7.94875" y1="17.4824" x2="7.94875" y2="-0.0001297" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#3C94FC"></stop>
                                            <stop offset="1" stop-color="#0460E7"></stop>
                                        </linearGradient>
                                        <linearGradient id="paint1_linear_341_8415" x1="16.3707" y1="19.6055" x2="16.3707" y2="2.12262" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#3C94FC"></stop>
                                            <stop offset="1" stop-color="#0460E7"></stop>
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </a> --}}
                            </div>
                            <div class="filter-body">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="form-group">
                                            <label>Make (all)</label>
                                            <select class="form-control" id="make" name="make">
                                                <option value="">All</option>
                                                @foreach ($make as $key => $value)
                                                    <option value="{{ $value }}"
                                                        {{ request()->make == $value ? 'selected' : '' }}>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card">
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
                                    </div>
                                    <div class="card">
                                        <div class="form-group">
                                            <label>Order By</label>
                                            <select class="form-control" id="order" name="order">
                                                <option value="">Default</option>
                                                <option value="price" {{ request()->order == 'price' ? 'selected' : '' }}>
                                                    Price Low
                                                    to
                                                    High</option>
                                                <option value="-price" {{ request()->order == '-price' ? 'selected' : '' }}>
                                                    Price
                                                    High to
                                                    Low</option>
                                                <option value="name" {{ request()->order == 'name' ? 'selected' : '' }}>
                                                    Name
                                                    Ascending
                                                </option>
                                                <option value="-name" {{ request()->order == '-name' ? 'selected' : '' }}>
                                                    Name
                                                    Descending
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="form-group">
                                            <label>Per Page</label>
                                            <select class="form-control" id="limit" name="limit">
                                                <option value="5" {{ request()->limit == 5 ? 'selected' : '' }}>5
                                                </option>
                                                <option value="10" {{ request()->limit == 10 ? 'selected' : '' }}>10
                                                </option>
                                                <option value="20" {{ request()->limit == 20 ? 'selected' : '' }}>20
                                                </option>
                                                <option value="50" {{ request()->limit == 50 ? 'selected' : '' }}>50
                                                </option>
                                                <option value="" {{ request()->limit == '' ? 'selected' : '' }}>-All-
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card">
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
                                        <x-forms.price-selector :maxPrice="$max_price" page="stock-list"
                                            parentClass="form-group" />
                                    </div>
                                    <div class="card">
                                        <div class="form-group">
                                            <label>Body Type (all)</label>
                                            <select class="form-control" id="body_type" name="body_type">
                                                <option value="">All</option>
                                                @foreach ($body_type as $key => $value)
                                                    <option value="{{ $value }}"
                                                        {{ request()->body_type == $value ? 'selected' : '' }}>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card">
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
                                                        {{ request()->mileage == $i ? 'selected' : '' }}>
                                                        {{ number_format($i) }}
                                                    </option>
                                                @endfor
                                            </select>
                                            <!-- <div class="wd-slider-mileage">
                                                            <span>{{ $max_mileage }}</span>
                                                        </div> -->
                                        </div>
                                    </div>
                                    <div class="card">
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
                                    </div>
                                    <div class="card">
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
                                    </div>
                                    <div class="card">
                                        <div class="form-group">
                                            <label>Fuel type (any)</label>
                                            <select class="form-control" id="fuel_type" name="fuel_type">
                                                <option value="">All</option>
                                                @foreach ($fuel_type as $key => $value)
                                                    <option value="{{ $value }}"
                                                        {{ request()->fuel_type == $value ? 'selected' : '' }}>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="form-group">
                                            <label>Gearbox (any)</label>
                                            <select class="form-control" id="transmission" name="transmission">
                                                <option value="">All</option>
                                                @foreach ($transmission as $key => $value)
                                                    <option value="{{ $value }}"
                                                        {{ request()->transmission == $value ? 'selected' : '' }}>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="form-group">
                                            <label>Min year (any)</label>
                                            <select class="form-control" id="manufacture_min" name="manufacture_min">
                                                <option value="">All</option>
                                                @foreach ($manufacture as $key => $value)
                                                    <option value="{{ $value }}"
                                                        {{ request()->manufacture_min == $value ? 'selected' : '' }}>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="form-group">
                                            <label>Max year (any)</label>
                                            <select class="form-control" id="manufacture_max" name="manufacture_max">
                                                <option value="">All</option>
                                                @foreach ($manufacture as $key => $value)
                                                    <option value="{{ $value }}"
                                                        {{ request()->manufacture_max == $value ? 'selected' : '' }}>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="form-group">
                                            <label>No. of doors (any)</label>
                                            <select class="form-control" id="doors" name="doors">
                                                <option value="">All</option>
                                                @foreach ($doors as $key => $value)
                                                    <option value="{{ $value }}"
                                                        {{ request()->doors == $value ? 'selected' : '' }}>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <button type="submit" class="form-btn"><svg class="mr-1" width="20"
                                            height="16" viewBox="0 0 20 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.8912 0.510112C17.2368 0.179306 17.6967 -0.00357696 18.1739 5.30217e-05C18.651 0.00368301 19.1081 0.193543 19.4487 0.529569C19.7893 0.865595 19.9867 1.3215 19.9994 1.8011C20.012 2.28069 19.8388 2.74645 19.5163 3.1001L9.72714 15.4087C9.55881 15.591 9.35565 15.7373 9.1298 15.8388C8.90396 15.9404 8.66007 15.9951 8.41271 15.9997C8.16536 16.0043 7.91962 15.9587 7.69019 15.8656C7.46076 15.7726 7.25236 15.634 7.07743 15.4581L0.585654 8.93128C0.404869 8.76192 0.259866 8.55768 0.159295 8.33075C0.0587241 8.10382 0.00464558 7.85884 0.000286364 7.61044C-0.00407285 7.36204 0.0413766 7.11531 0.133923 6.88495C0.226468 6.65459 0.364215 6.44534 0.538946 6.26967C0.713676 6.09399 0.921809 5.9555 1.15093 5.86246C1.38005 5.76941 1.62547 5.72372 1.87253 5.7281C2.1196 5.73248 2.36326 5.78685 2.58897 5.88797C2.81469 5.98908 3.01783 6.13487 3.18629 6.31663L8.32378 11.4793L16.8445 0.564379C16.8599 0.545388 16.8763 0.527271 16.8936 0.510112H16.8912Z"
                                                fill="white"></path>
                                        </svg> Apply Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-9">
                    {{-- <div class="wd-sl-sorting">
                        <span>Displaying 1 - 50 Of 50 Vehicles</span>
                        <div class="form-group mb-0">
                            <select class="form-control">
                                <option>High to low </option>
                                <option>low to high </option>
                                <option>Popularity</option>
                                <option>Discount</option>
                            </select>
                        </div>
                    </div> --}}
                    <div class="wd-sl-stock_lists">
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
                                    <div class="col-md-6">
                                        <a href="{{ route('front.template.stock_details', [$domain_slug, $value->id]) }}"
                                            class="wd-sl-stocks">
                                            <img src="{{ checkFileExist($stockImg) }}">
                                            <div class="wd-sl-stock_content">
                                                <div class="wd-sl-stock_top">
                                                    <div class="wd-sl-stock_topright">
                                                        <span>{{ $value->make }}</span>
                                                        <small>{{ $value->derivative }}</small>
                                                        <span>{{ $value->attention_grabber }}</span>
                                                    </div>
                                                </div>
                                                <p>{{ $description }}</p>
                                                <div class="wd-sl-stock_middle">
                                                    <div class="wd-sl-stockmiddle_inner">
                                                        <span>Category : &nbsp;</span>
                                                        <span><b>{{ $value->vehicleCategory }}</b></span>
                                                    </div>
                                                    <div class="wd-sl-stockmiddle_inner">
                                                        <span>Transmission : &nbsp;</span>
                                                        <span><b>{{ $value->transmission }}</b></span>
                                                    </div>
                                                    <div class="wd-sl-stockmiddle_inner">
                                                        <span>Mileage : &nbsp;</span>
                                                        <span><b>{{ $value->mileage }}</b></span>
                                                    </div>
                                                </div>
                                                <div class="wd-sl-stock_middle">
                                                    <div class="wd-sl-stockmiddle_inner">
                                                        <span>Body : &nbsp;</span>
                                                        <span><b>{{ $value->body_type }}</b></span>
                                                    </div>
                                                    <div class="wd-sl-stockmiddle_inner">
                                                        <span>CO<sub>2</sub> Emission : &nbsp;</span>
                                                        <span><b>not available</b></span>
                                                    </div>
                                                    <div class="wd-sl-stockmiddle_inner">
                                                        <span>Color : &nbsp;</span>
                                                        <span><b>{{ $value->colour }}</b></span>
                                                    </div>
                                                </div>
                                                <div class="wd-sl-stock_middle">
                                                    <div class="wd-sl-stockmiddle_inner">
                                                        <span>MAKE : &nbsp;</span>
                                                        <span><b>{{ $value->make }}</b></span>
                                                    </div>
                                                    <div class="wd-sl-stockmiddle_inner">
                                                        <span>Model : &nbsp;</span>
                                                        <span><b>{{ $value->modal }}</b></span>
                                                    </div>
                                                    <div class="wd-sl-stockmiddle_inner">
                                                        <span>FUEL : &nbsp;</span>
                                                        <span><b>{{ $value->fuel_type }}</b></span>
                                                    </div>
                                                </div>
                                                <div class="wd-sl-stock_middle">
                                                    <div class="wd-sl-stockmiddle_inner">
                                                        <span>Doors : &nbsp;</span>
                                                        <span><b>{{ $value->doors }}</b></span>
                                                    </div>
                                                    <div class="wd-sl-stockmiddle_inner">
                                                        <span>Engine Size : &nbsp;</span>
                                                        <span><b>{{ $value->engine_size . ' ' . $value->engine_size_unit }}</b></span>
                                                    </div>
                                                    <div class="wd-sl-stockmiddle_inner">
                                                        <span>YEAR : &nbsp;</span>
                                                        <span><b>{{ $value->manufacture }}</b></span>
                                                    </div>
                                                </div>
                                                <h4>£{{ number_format($value->price) }}</h4>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-lg-12">
                                    <div class="search-card d-block">
                                        <div class="wdsl-srch-body text-center">
                                            <p>No data found</p>
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
                    </div>
                    {{-- <div class="wd-sl-custome_pages">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled pre-nxt">
                                    <a class="page-link" href="#" tabindex="-1"><svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.25 1L1.25 7L7.25 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                                </li>
                                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item pre-nxt">
                                    <a class="page-link" href="#"><svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.75 1L7.75 7L1.75 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                                </li>
                            </ul>
                        </nav>
                    </div> --}}
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
