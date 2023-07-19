@extends('layouts.template.t6.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection

@section('content')
    <section class="wd-md-stock-main text-center mb-0">
        <div class="container">
            <h1>Stock list</h1>
            <h3><a href="{{ route('front.template.home', $domain_slug) }}">HOME</a> | STOCK LIST</h3>
            <p>With a wide variety of stock, we are confident we can help you in finding <br> your dream car! Have a
                look at our diverse stock portfolio and contact us to <br> book a viewing or test drive!</p>
            <p>Total {{ $stocks->total() }} vehicles found</p>
        </div>
    </section>

    <section id="search-result" class="wd-md-stock-list">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2">
                    <div class="sub-form-stock">
                        <form name="frmSearch" id="frmSearch">
                            <div class="form-group">
                                <button class="btn btn-primary"><i class="fas fa-search wd-search-icon"></i> Update
                                    Search</button>
                            </div>
                            <div class="form-group">
                                <label>Order By</label>
                                <select class="form-control" id="order" name="order">
                                    <option value="">Default</option>
                                    <option value="price" {{ request()->order == 'price' ? 'selected' : '' }}>Price Low to High
                                    </option>
                                    <option value="-price" {{ request()->order == '-price' ? 'selected' : '' }}>Price High to Low
                                    </option>
                                    <option value="name" {{ request()->order == 'name' ? 'selected' : '' }}>Name Ascending
                                    </option>
                                    <option value="-name" {{ request()->order == '-name' ? 'selected' : '' }}>Name Descending
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
                                <label>Make (all)</label>
                                <select class="form-control" id="make" name="make">
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
                                            {{ request()->body_type == $value ? 'selected' : '' }}>{{ $value }}</option>
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
                                        <option value="{{ $i }}" {{ request()->mileage == $i ? 'selected' : '' }}>
                                            {{ number_format($i) }}</option>
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
                                            {{ request()->fuel_type == $value ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Gearbox (any)</label>
                                <select class="form-control" id="transmission" name="transmission">
                                    <option value="">All</option>
                                    @foreach ($transmission as $key => $value)
                                        <option value="{{ $value }}"
                                            {{ request()->transmission == $value ? 'selected' : '' }}>{{ $value }}
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
                                            {{ request()->manufacture_min == $value ? 'selected' : '' }}>{{ $value }}
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
                                            {{ request()->manufacture_max == $value ? 'selected' : '' }}>{{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>No. of doors (any)</label>
                                <select class="form-control" id="doors" name="doors">
                                    <option value="">All</option>
                                    @foreach ($doors as $key => $value)
                                        <option value="{{ $value }}" {{ request()->doors == $value ? 'selected' : '' }}>
                                            {{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary"><i class="fas fa-search wd-search-icon"></i> Update
                                    Search</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-10">
                    <div class="row search-result-cont">
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
                                        class="search-card wd-card d-block ">
                                        <div class="pd-image">
                                            <img src="{{ checkFileExist($stockImg) }}" alt="">
                                            <span>Premium</span>
                                        </div>
                                        <div class="wdsl-srch-body ml-0">
                                            <div class="wd-sl-top d-flex align-items-center justify-content-between">
                                                <div class="wd-sl-innertop wdmd-top d-flex align-items-center">
                                                    <div class="wd-md-stock-heading">
                                                        <h2>{{ $value->make }}</h2>
                                                        <p>{{ $value->derivative }}</p>
                                                        <p>{{ $value->attention_grabber }}</p>
                                                    </div>
                                                </div>
                                                <h4>£{{ number_format($value->price) }}</h4>
                                            </div>
                                            <p>{{ $description }}</p>
                                            <div class="wd-sl-middle">
                                                <ul>
                                                    <li>
                                                        <h6 class="gry-text">CATEGORY:</h6>
                                                        <h6>{{ $value->category }}</h6>
                                                    </li>
                                                    <li>
                                                        <h6 class="gry-text">TRANSMISSION:</h6>
                                                        <h6>{{ $value->transmission }}</h6>
                                                    </li>
                                                    <li>
                                                        <h6 class="gry-text">COLOUR</h6>
                                                        <h6>{{ $value->colour }}</h6>
                                                    </li>
                                                    <li>
                                                        <h6 class="gry-text">MILEAGE</h6>
                                                        <h6>{{ $value->mileage }}</h6>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                        <div class="wd-sl-stocklast">
                                            <div class="row">
                                                <div class="col-lg-4 col-md col-sm-3 col wd-sl-ulli">
                                                    <i>
                                                        <svg width="64" height="65" viewBox="0 0 64 65"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M23.4114 20.0449H34.8207V26.2037H23.4114V20.0449ZM34.8207 28.2044C36.0367 28.2354 37.1376 28.4607 37.1376 30.0677V33.4828C37.1376 35.5856 39.9913 35.378 39.9913 33.6031V29.404L38.7799 28.2078V26.381L36.6932 24.2942C36.1858 23.7869 36.9569 23.0158 37.4642 23.5229L41.082 27.1407V33.6031C41.082 36.8145 36.047 37.0319 36.047 33.4828V30.0677C36.047 29.3785 35.4008 29.2873 34.8207 29.2837V35.0879H23.4114V27.3233H34.8207V28.2044ZM22.2812 36.0071H35.9509V37.4756H22.2812V36.0071ZM24.9221 21.5028H33.31V24.8412H24.9221V21.5028Z"
                                                                fill="var(--primary)" />
                                                            <g filter="url(#filter0_d)">
                                                                <path
                                                                    d="M49.297 36.4864C47.6297 40.2154 44.8051 43.3078 41.2419 45.305C37.6787 47.3023 33.5667 48.098 29.5157 47.5743C25.4646 47.0505 21.6902 45.2351 18.7521 42.3974C15.8141 39.5596 13.8687 35.8505 13.2047 31.8201C12.5406 27.7897 13.1931 23.6525 15.0654 20.0221C16.9377 16.3917 19.9301 13.4614 23.599 11.6656C27.2678 9.86988 31.4178 9.3043 35.4334 10.0528C39.449 10.8013 43.1164 12.8239 45.892 15.8209L45.7476 15.9546C43.0008 12.9886 39.3713 10.9869 35.3973 10.2462C31.4233 9.50547 27.3163 10.0652 23.6855 11.8424C20.0546 13.6195 17.0932 16.5195 15.2402 20.1123C13.3873 23.7051 12.7416 27.7994 13.3988 31.7881C14.056 35.7768 15.9812 39.4475 18.8888 42.2558C21.7965 45.0642 25.5318 46.8608 29.5409 47.3791C33.55 47.8975 37.6194 47.11 41.1457 45.1334C44.672 43.1569 47.4674 40.0965 49.1174 36.4061L49.297 36.4864Z"
                                                                    stroke="var(--primary)" stroke-linejoin="round"
                                                                    shape-rendering="crispEdges" />
                                                            </g>
                                                            <defs>
                                                                <filter id="filter0_d" x="0.0693359" y="0.847656"
                                                                    width="63.5347" height="63.7051"
                                                                    filterUnits="userSpaceOnUse"
                                                                    color-interpolation-filters="sRGB">
                                                                    <feFlood flood-opacity="0"
                                                                        result="BackgroundImageFix" />
                                                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                                        result="hardAlpha" />
                                                                    <feOffset dy="4" />
                                                                    <feGaussianBlur stdDeviation="4" />
                                                                    <feComposite in2="hardAlpha" operator="out" />
                                                                    <feColorMatrix type="matrix"
                                                                        values="0 0 0 0 0 0 0 0 0 0.72549 0 0 0 0 0.168627 0 0 0 0.17 0" />
                                                                    <feBlend mode="normal" in2="BackgroundImageFix"
                                                                        result="effect1_dropShadow" />
                                                                    <feBlend mode="normal" in="SourceGraphic"
                                                                        in2="effect1_dropShadow" result="shape" />
                                                                </filter>
                                                            </defs>
                                                        </svg>

                                                    </i>
                                                    <div class="wd-stock-inner-deatil">
                                                        <span class="gry-text">FUEL</span>
                                                        <span>{{ $value->fuel_type }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md col-sm-3 col wd-sl-ulli">
                                                    <i>
                                                        <svg width="64" height="65" viewBox="0 0 64 65"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M24.1106 35.574C24.456 35.6384 24.74 35.8112 24.9625 36.0922C25.185 36.3733 25.2962 36.6953 25.2962 37.0583C25.2962 37.3862 25.2143 37.6761 25.0503 37.9278C24.8922 38.1737 24.6609 38.367 24.3565 38.5075C24.052 38.648 23.6919 38.7183 23.2762 38.7183H20.6326V32.5879H23.162C23.5777 32.5879 23.9349 32.6552 24.2335 32.7899C24.538 32.9246 24.7663 33.1119 24.9186 33.352C25.0767 33.5921 25.1557 33.8643 25.1557 34.1688C25.1557 34.526 25.0591 34.8246 24.8659 35.0646C24.6785 35.3047 24.4267 35.4745 24.1106 35.574ZM21.8622 35.1173H22.9864C23.2791 35.1173 23.5045 35.0529 23.6626 34.9241C23.8207 34.7894 23.8998 34.5991 23.8998 34.3532C23.8998 34.1073 23.8207 33.917 23.6626 33.7823C23.5045 33.6477 23.2791 33.5803 22.9864 33.5803H21.8622V35.1173ZM23.1005 37.717C23.3991 37.717 23.6304 37.6468 23.7944 37.5062C23.9642 37.3657 24.0491 37.1666 24.0491 36.909C24.0491 36.6455 23.9612 36.4406 23.7856 36.2942C23.6099 36.142 23.3728 36.0659 23.0742 36.0659H21.8622V37.717H23.1005Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M33.2058 32.5879V38.7183H31.9762V36.1098H29.3502V38.7183H28.1206V32.5879H29.3502V35.1085H31.9762V32.5879H33.2058Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M40.7309 34.485C40.7309 34.8129 40.6518 35.1203 40.4937 35.4072C40.3415 35.6941 40.0985 35.9253 39.7648 36.101C39.4369 36.2767 39.0212 36.3645 38.5176 36.3645H37.49V38.7183H36.2604V32.5879H38.5176C38.9919 32.5879 39.3959 32.6699 39.7296 32.8338C40.0634 32.9978 40.3122 33.2232 40.4762 33.5101C40.646 33.797 40.7309 34.122 40.7309 34.485ZM38.4649 35.372C38.8045 35.372 39.0563 35.2959 39.2202 35.1437C39.3842 34.9856 39.4662 34.766 39.4662 34.485C39.4662 33.8877 39.1324 33.5891 38.4649 33.5891H37.49V35.372H38.4649Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M32.103 19.2617L41.103 23.2617V32.2617H32.103V19.2617Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M20.603 29.7617L28.603 20.7617H32.103V32.2617H20.603V29.7617Z"
                                                                fill="var(--primary)" />
                                                            <rect x="22.2219" y="28.2617" width="0.731899"
                                                                height="3.65949" fill="white" />
                                                            <rect x="25.1499" y="25.2617" width="0.731899"
                                                                height="7" fill="white" />
                                                            <rect width="0.731899" height="9.98"
                                                                transform="matrix(-1 0 0 1 28.8093 22.2617)"
                                                                fill="white" />
                                                            <rect x="31.0051" y="21.1543" width="0.731899"
                                                                height="10.9785" fill="white" />
                                                            <rect x="33.9329" y="20.4219" width="0.731899"
                                                                height="11.7104" fill="white" />
                                                            <rect x="36.8604" y="21.8828" width="0.731899"
                                                                height="10.2466" fill="white" />
                                                            <rect x="39.7878" y="23.3477" width="0.731899"
                                                                height="8.78278" fill="white" />
                                                            <g filter="url(#filter0_d)">
                                                                <path
                                                                    d="M49.297 36.4864C47.6297 40.2154 44.8051 43.3078 41.2419 45.305C37.6787 47.3023 33.5667 48.098 29.5157 47.5743C25.4646 47.0505 21.6902 45.2351 18.7521 42.3974C15.8141 39.5596 13.8687 35.8505 13.2047 31.8201C12.5406 27.7897 13.1931 23.6525 15.0654 20.0221C16.9377 16.3917 19.9301 13.4614 23.599 11.6656C27.2678 9.86988 31.4178 9.3043 35.4334 10.0528C39.449 10.8013 43.1164 12.8239 45.892 15.8209L45.7476 15.9546C43.0008 12.9886 39.3713 10.9869 35.3973 10.2462C31.4233 9.50547 27.3163 10.0652 23.6855 11.8424C20.0546 13.6195 17.0932 16.5195 15.2402 20.1123C13.3873 23.7051 12.7416 27.7994 13.3988 31.7881C14.056 35.7768 15.9812 39.4475 18.8888 42.2558C21.7965 45.0642 25.5318 46.8608 29.5409 47.3791C33.55 47.8975 37.6194 47.11 41.1457 45.1334C44.672 43.1569 47.4674 40.0965 49.1174 36.4061L49.297 36.4864Z"
                                                                    stroke="var(--primary)" stroke-linejoin="round"
                                                                    shape-rendering="crispEdges" />
                                                            </g>
                                                            <defs>
                                                                <filter id="filter0_d" x="0.0693359" y="0.847656"
                                                                    width="63.5347" height="63.7051"
                                                                    filterUnits="userSpaceOnUse"
                                                                    color-interpolation-filters="sRGB">
                                                                    <feFlood flood-opacity="0"
                                                                        result="BackgroundImageFix" />
                                                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                                        result="hardAlpha" />
                                                                    <feOffset dy="4" />
                                                                    <feGaussianBlur stdDeviation="4" />
                                                                    <feComposite in2="hardAlpha" operator="out" />
                                                                    <feColorMatrix type="matrix"
                                                                        values="0 0 0 0 0 0 0 0 0 0.72549 0 0 0 0 0.168627 0 0 0 0.17 0" />
                                                                    <feBlend mode="normal" in2="BackgroundImageFix"
                                                                        result="effect1_dropShadow" />
                                                                    <feBlend mode="normal" in="SourceGraphic"
                                                                        in2="effect1_dropShadow" result="shape" />
                                                                </filter>
                                                            </defs>
                                                        </svg>
                                                    </i>
                                                    <div class="wd-stock-inner-deatil">
                                                        <span class="gry-text">Model</span>
                                                        <span>{{ $value->modal }}</span>
                                                    </div>

                                                </div>
                                                <div class="col-lg-4 col-md col-sm-3 col wd-sl-ulli">
                                                    <i>
                                                        <svg width="64" height="65" viewBox="0 0 64 65"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g filter="url(#filter0_d)">
                                                                <path
                                                                    d="M49.297 36.4864C47.6297 40.2154 44.8051 43.3078 41.2419 45.305C37.6787 47.3023 33.5667 48.098 29.5157 47.5743C25.4646 47.0505 21.6902 45.2351 18.7521 42.3974C15.8141 39.5596 13.8687 35.8505 13.2047 31.8201C12.5406 27.7897 13.1931 23.6525 15.0654 20.0221C16.9377 16.3917 19.9301 13.4614 23.599 11.6656C27.2678 9.86988 31.4178 9.3043 35.4334 10.0528C39.449 10.8013 43.1164 12.8239 45.892 15.8209L45.7476 15.9546C43.0008 12.9886 39.3713 10.9869 35.3973 10.2462C31.4233 9.50547 27.3163 10.0652 23.6855 11.8424C20.0546 13.6195 17.0932 16.5195 15.2402 20.1123C13.3873 23.7051 12.7416 27.7994 13.3988 31.7881C14.056 35.7768 15.9812 39.4475 18.8888 42.2558C21.7965 45.0642 25.5318 46.8608 29.5409 47.3791C33.55 47.8975 37.6194 47.11 41.1457 45.1334C44.672 43.1569 47.4674 40.0965 49.1174 36.4061L49.297 36.4864Z"
                                                                    stroke="var(--primary)" stroke-linejoin="round"
                                                                    shape-rendering="crispEdges" />
                                                            </g>
                                                            <path
                                                                d="M22.6997 33.8572C23.7659 32.791 25.5006 32.791 26.5668 33.8572C27.633 34.9233 27.633 36.6581 26.5668 37.7242C26.1249 38.1661 25.5655 38.4281 24.9883 38.5017L25.9455 36.7698C25.9664 36.6819 25.9267 36.3789 25.8197 36.1893C25.3351 35.3307 24.6249 34.9717 23.6954 35.0175C23.3034 35.0368 23.1004 35.1971 23.1004 35.1971L22.1462 36.9229C21.6865 35.916 21.872 34.6847 22.6997 33.8572ZM35.5051 22.6779C35.24 23.4082 34.8435 24.0321 34.3545 24.5239L27.3885 31.4986C26.8965 31.9875 26.2974 32.3554 25.5668 32.6205C26.0822 32.7736 26.5507 33.0248 26.9542 33.4283C27.3607 33.8318 27.6204 34.293 27.7735 34.8055C28.0297 34.1133 28.3881 33.4372 28.8857 32.9394L35.8391 25.9859C36.3367 25.4883 37.0094 25.1328 37.7014 24.8766C37.1888 24.7234 36.7239 24.4664 36.3205 24.0601C35.917 23.6564 35.6582 23.1935 35.5051 22.6779ZM40.9711 20.1932L39.8786 22.1688C39.7752 22.1857 39.6717 22.1928 39.5682 22.1928C38.827 22.1928 38.1342 21.7694 37.8068 21.0835L37.7684 21.0017L38.8632 19.0188C38.1149 18.9828 37.3545 19.2499 36.7843 19.8201C36.3849 20.2195 36.1346 20.7104 36.0335 21.223C35.8626 22.0891 36.1129 23.0254 36.7843 23.6991C37.4509 24.3657 38.3723 24.6159 39.2316 24.4547C39.7561 24.356 40.2567 24.1059 40.6609 23.6991C41.6136 22.7438 41.7194 21.2616 40.9711 20.1932Z"
                                                                fill="var(--primary)" />
                                                            <defs>
                                                                <filter id="filter0_d" x="0.0693359" y="0.847656"
                                                                    width="63.5347" height="63.7051"
                                                                    filterUnits="userSpaceOnUse"
                                                                    color-interpolation-filters="sRGB">
                                                                    <feFlood flood-opacity="0"
                                                                        result="BackgroundImageFix" />
                                                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                                        result="hardAlpha" />
                                                                    <feOffset dy="4" />
                                                                    <feGaussianBlur stdDeviation="4" />
                                                                    <feComposite in2="hardAlpha" operator="out" />
                                                                    <feColorMatrix type="matrix"
                                                                        values="0 0 0 0 0 0 0 0 0 0.72549 0 0 0 0 0.168627 0 0 0 0.17 0" />
                                                                    <feBlend mode="normal" in2="BackgroundImageFix"
                                                                        result="effect1_dropShadow" />
                                                                    <feBlend mode="normal" in="SourceGraphic"
                                                                        in2="effect1_dropShadow" result="shape" />
                                                                </filter>
                                                            </defs>
                                                        </svg>
                                                    </i>
                                                    <div class="wd-stock-inner-deatil">
                                                        <span class="gry-text">Doors</span>
                                                        <span>{{ $value->doors }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md col-sm-3 col wd-sl-ulli">
                                                    <i>
                                                        <svg width="64" height="65" viewBox="0 0 64 65"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g filter="url(#filter0_d)">
                                                                <path
                                                                    d="M49.297 36.4864C47.6297 40.2154 44.8051 43.3078 41.2419 45.305C37.6787 47.3023 33.5667 48.098 29.5157 47.5743C25.4646 47.0505 21.6902 45.2351 18.7521 42.3974C15.8141 39.5596 13.8687 35.8505 13.2047 31.8201C12.5406 27.7897 13.1931 23.6525 15.0654 20.0221C16.9377 16.3917 19.9301 13.4614 23.599 11.6656C27.2678 9.86988 31.4178 9.3043 35.4334 10.0528C39.449 10.8013 43.1164 12.8239 45.892 15.8209L45.7476 15.9546C43.0008 12.9886 39.3713 10.9869 35.3973 10.2462C31.4233 9.50547 27.3163 10.0652 23.6855 11.8424C20.0546 13.6195 17.0932 16.5195 15.2402 20.1123C13.3873 23.7051 12.7416 27.7994 13.3988 31.7881C14.056 35.7768 15.9812 39.4475 18.8888 42.2558C21.7965 45.0642 25.5318 46.8608 29.5409 47.3791C33.55 47.8975 37.6194 47.11 41.1457 45.1334C44.672 43.1569 47.4674 40.0965 49.1174 36.4061L49.297 36.4864Z"
                                                                    stroke="var(--primary)" stroke-linejoin="round"
                                                                    shape-rendering="crispEdges" />
                                                            </g>
                                                            <path
                                                                d="M22.6997 33.8572C23.7659 32.791 25.5006 32.791 26.5668 33.8572C27.633 34.9233 27.633 36.6581 26.5668 37.7242C26.1249 38.1661 25.5655 38.4281 24.9883 38.5017L25.9455 36.7698C25.9664 36.6819 25.9267 36.3789 25.8197 36.1893C25.3351 35.3307 24.6249 34.9717 23.6954 35.0175C23.3034 35.0368 23.1004 35.1971 23.1004 35.1971L22.1462 36.9229C21.6865 35.916 21.872 34.6847 22.6997 33.8572ZM35.5051 22.6779C35.24 23.4082 34.8435 24.0321 34.3545 24.5239L27.3885 31.4986C26.8965 31.9875 26.2974 32.3554 25.5668 32.6205C26.0822 32.7736 26.5507 33.0248 26.9542 33.4283C27.3607 33.8318 27.6204 34.293 27.7735 34.8055C28.0297 34.1133 28.3881 33.4372 28.8857 32.9394L35.8391 25.9859C36.3367 25.4883 37.0094 25.1328 37.7014 24.8766C37.1888 24.7234 36.7239 24.4664 36.3205 24.0601C35.917 23.6564 35.6582 23.1935 35.5051 22.6779ZM40.9711 20.1932L39.8786 22.1688C39.7752 22.1857 39.6717 22.1928 39.5682 22.1928C38.827 22.1928 38.1342 21.7694 37.8068 21.0835L37.7684 21.0017L38.8632 19.0188C38.1149 18.9828 37.3545 19.2499 36.7843 19.8201C36.3849 20.2195 36.1346 20.7104 36.0335 21.223C35.8626 22.0891 36.1129 23.0254 36.7843 23.6991C37.4509 24.3657 38.3723 24.6159 39.2316 24.4547C39.7561 24.356 40.2567 24.1059 40.6609 23.6991C41.6136 22.7438 41.7194 21.2616 40.9711 20.1932Z"
                                                                fill="var(--primary)" />
                                                            <defs>
                                                                <filter id="filter0_d" x="0.0693359" y="0.847656"
                                                                    width="63.5347" height="63.7051"
                                                                    filterUnits="userSpaceOnUse"
                                                                    color-interpolation-filters="sRGB">
                                                                    <feFlood flood-opacity="0"
                                                                        result="BackgroundImageFix" />
                                                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                                        result="hardAlpha" />
                                                                    <feOffset dy="4" />
                                                                    <feGaussianBlur stdDeviation="4" />
                                                                    <feComposite in2="hardAlpha" operator="out" />
                                                                    <feColorMatrix type="matrix"
                                                                        values="0 0 0 0 0 0 0 0 0 0.72549 0 0 0 0 0.168627 0 0 0 0.17 0" />
                                                                    <feBlend mode="normal" in2="BackgroundImageFix"
                                                                        result="effect1_dropShadow" />
                                                                    <feBlend mode="normal" in="SourceGraphic"
                                                                        in2="effect1_dropShadow" result="shape" />
                                                                </filter>
                                                            </defs>
                                                        </svg>
                                                    </i>
                                                    <div class="wd-stock-inner-deatil">
                                                        <span class="gry-text">Make</span>
                                                        <span>{{ $value->make }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md col-sm-3 col wd-sl-ulli">
                                                    <i>
                                                        <svg width="64" height="65" viewBox="0 0 64 65"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g filter="url(#filter0_d)">
                                                                <path
                                                                    d="M49.297 36.4864C47.6297 40.2154 44.8051 43.3078 41.2419 45.305C37.6787 47.3023 33.5667 48.098 29.5157 47.5743C25.4646 47.0505 21.6902 45.2351 18.7521 42.3974C15.8141 39.5596 13.8687 35.8505 13.2047 31.8201C12.5406 27.7897 13.1931 23.6525 15.0654 20.0221C16.9377 16.3917 19.9301 13.4614 23.599 11.6656C27.2678 9.86988 31.4178 9.3043 35.4334 10.0528C39.449 10.8013 43.1164 12.8239 45.892 15.8209L45.7476 15.9546C43.0008 12.9886 39.3713 10.9869 35.3973 10.2462C31.4233 9.50547 27.3163 10.0652 23.6855 11.8424C20.0546 13.6195 17.0932 16.5195 15.2402 20.1123C13.3873 23.7051 12.7416 27.7994 13.3988 31.7881C14.056 35.7768 15.9812 39.4475 18.8888 42.2558C21.7965 45.0642 25.5318 46.8608 29.5409 47.3791C33.55 47.8975 37.6194 47.11 41.1457 45.1334C44.672 43.1569 47.4674 40.0965 49.1174 36.4061L49.297 36.4864Z"
                                                                    stroke="var(--primary)" stroke-linejoin="round"
                                                                    shape-rendering="crispEdges" />
                                                            </g>
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M31.9519 21.3965C31.2418 21.3965 30.5999 21.4667 30.109 21.5891C29.8636 21.6502 29.6568 21.7217 29.4823 21.8249C29.3078 21.928 29.112 22.095 29.112 22.3725C29.112 22.374 29.112 22.3753 29.112 22.3779V24.1428L26.9807 24.1509L25.386 22.5537L23.2561 24.6833L24.8522 26.279L24.8536 34.0887H39.0517V26.2787L40.6478 24.683L38.5178 22.5535L36.9218 24.1492L34.7918 24.1385L34.7933 22.3708H34.7918C34.7904 22.0951 34.5955 21.9287 34.4216 21.8259C34.2471 21.7229 34.0403 21.6516 33.7948 21.5901C33.3039 21.4675 32.6621 21.3975 31.9519 21.3975V21.3965ZM31.9519 22.1063C32.6142 22.1063 33.2144 22.1757 33.6229 22.2782C33.7425 22.3083 33.8003 22.3391 33.8794 22.3711C33.8808 22.3716 33.8823 22.3718 33.8837 22.3725C33.8026 22.4053 33.7445 22.4364 33.623 22.4667C33.2145 22.5689 32.6143 22.6386 31.952 22.6386C31.2898 22.6386 30.6896 22.5692 30.2811 22.4667C30.1634 22.4372 30.1059 22.4066 30.0287 22.3752C30.0259 22.3745 30.023 22.3738 30.0204 22.3725C30.1015 22.3398 30.1596 22.3086 30.2811 22.2783C30.6896 22.1763 31.2898 22.1064 31.952 22.1064L31.9519 22.1063ZM31.9519 24.8569H34.0819V25.5667H33.3719V32.3103H34.0819V33.0201H31.9519V32.3103H32.6619V25.5667H31.9519V24.8569Z"
                                                                fill="var(--primary)" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M24.853 34.9715V36.3857H39.0512V34.9688L24.853 34.9715Z"
                                                                fill="var(--primary)" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M29.1118 19.1777V19.8876H34.7916V19.1777H29.1118Z"
                                                                fill="var(--primary)" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M28.7568 18.4668V20.5963H29.4668V18.4668H28.7568Z"
                                                                fill="var(--primary)" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M34.4365 18.4668V20.5963H35.1465V18.4668H34.4365Z"
                                                                fill="var(--primary)" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M30.887 36.9219V39.0514H33.0169V36.9219"
                                                                fill="var(--primary)" />
                                                            <defs>
                                                                <filter id="filter0_d" x="0.0693359" y="0.847656"
                                                                    width="63.5347" height="63.7051"
                                                                    filterUnits="userSpaceOnUse"
                                                                    color-interpolation-filters="sRGB">
                                                                    <feFlood flood-opacity="0"
                                                                        result="BackgroundImageFix" />
                                                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                                        result="hardAlpha" />
                                                                    <feOffset dy="4" />
                                                                    <feGaussianBlur stdDeviation="4" />
                                                                    <feComposite in2="hardAlpha" operator="out" />
                                                                    <feColorMatrix type="matrix"
                                                                        values="0 0 0 0 0 0 0 0 0 0.72549 0 0 0 0 0.168627 0 0 0 0.17 0" />
                                                                    <feBlend mode="normal" in2="BackgroundImageFix"
                                                                        result="effect1_dropShadow" />
                                                                    <feBlend mode="normal" in="SourceGraphic"
                                                                        in2="effect1_dropShadow" result="shape" />
                                                                </filter>
                                                            </defs>
                                                        </svg>
                                                    </i>
                                                    <div class="wd-stock-inner-deatil">
                                                        <span class="gry-text">Engine Size</span>
                                                        <span>{{ $value->engine_size . ' ' . $value->engine_size_unit }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md col-sm-3 col wd-sl-ulli">
                                                    <i>
                                                        <svg width="64" height="65" viewBox="0 0 64 65"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M32.6459 29.6803C32.5122 29.6755 32.3789 29.6992 32.2551 29.75C32.1312 29.8007 32.0196 29.8773 31.9277 29.9745C31.8358 30.0718 31.7656 30.1875 31.722 30.314C31.6783 30.4405 31.6621 30.5749 31.6744 30.7081C31.6667 30.8403 31.686 30.9726 31.7313 31.097C31.7765 31.2214 31.8467 31.3352 31.9375 31.4315C32.0283 31.5277 32.1379 31.6045 32.2594 31.6569C32.3809 31.7093 32.5119 31.7364 32.6442 31.7364C32.7766 31.7364 32.9076 31.7093 33.0291 31.6569C33.1506 31.6045 33.2602 31.5277 33.351 31.4315C33.4418 31.3352 33.512 31.2214 33.5572 31.097C33.6025 30.9726 33.6218 30.8403 33.6141 30.7081C33.6264 30.5752 33.6102 30.4411 33.5668 30.3148C33.5233 30.1886 33.4534 30.073 33.3619 29.9758C33.2703 29.8786 33.1591 29.802 33.0357 29.751C32.9122 29.7001 32.7794 29.676 32.6459 29.6803Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M40.8687 28.0372C40.8633 28.0358 40.8576 28.0358 40.8521 28.0372C40.3583 27.6364 39.7779 27.356 39.1569 27.2185C38.5359 27.0809 37.8914 27.0899 37.2745 27.2448C37.1157 26.7747 36.8174 26.3642 36.4193 26.068C36.0212 25.7718 35.5423 25.604 35.0464 25.587C34.784 24.751 34.311 23.9965 33.6729 23.3961C33.0347 22.7957 32.2529 22.3694 31.4025 22.1583C30.5521 21.9472 29.6617 21.9584 28.8169 22.1907C27.9721 22.423 27.2011 22.8686 26.5782 23.4848C26.5729 23.4828 26.567 23.4828 26.5617 23.4848C25.6072 24.4427 25.0668 25.7368 25.0564 27.0889C23.9879 27.0982 22.9669 27.5315 22.218 28.2935C21.469 29.0555 21.0534 30.0838 21.0627 31.1523C21.0719 32.2207 21.5052 33.2417 22.2672 33.9907C23.0292 34.7396 24.0576 35.1552 25.126 35.146H38.2891C39.1137 35.1425 39.9173 34.8862 40.5915 34.4115C41.2657 33.9369 41.778 33.2667 42.0593 32.4917C42.3405 31.7166 42.3772 30.8738 42.1643 30.0773C41.9514 29.2807 41.4992 28.5686 40.8687 28.0372ZM29.5955 31.7309C29.8451 31.7343 30.0911 31.6713 30.3083 31.5485C30.3655 31.5187 30.4306 31.5078 30.4944 31.5174C30.5581 31.5269 30.6172 31.5564 30.6631 31.6015C30.6909 31.628 30.7129 31.66 30.7277 31.6953C30.7425 31.7307 30.7499 31.7688 30.7493 31.8071C30.7514 31.8641 30.7372 31.9206 30.7084 31.9699C30.6797 32.0192 30.6375 32.0593 30.5869 32.0856C30.2768 32.2722 29.9209 32.3687 29.559 32.3641C29.3408 32.373 29.1231 32.3358 28.9201 32.2551C28.7171 32.1743 28.5334 32.0518 28.3808 31.8955C28.2283 31.7392 28.1103 31.5525 28.0345 31.3477C27.9587 31.1428 27.9268 30.9243 27.941 30.7063C27.9274 30.4885 27.9596 30.2702 28.0356 30.0655C28.1115 29.8609 28.2295 29.6745 28.382 29.5183C28.5345 29.362 28.718 29.2395 28.9207 29.1586C29.1234 29.0777 29.3409 29.0402 29.559 29.0485C29.9222 29.0449 30.2793 29.1425 30.5902 29.3303C30.6614 29.3673 30.715 29.431 30.7393 29.5075C30.7635 29.5839 30.7564 29.6669 30.7195 29.7381C30.6826 29.8094 30.6188 29.863 30.5424 29.8873C30.4659 29.9115 30.3829 29.9044 30.3117 29.8675C30.0934 29.744 29.8462 29.6811 29.5955 29.6851C29.4605 29.6759 29.3251 29.6961 29.1986 29.7443C29.0722 29.7926 28.9578 29.8677 28.8632 29.9645C28.7686 30.0612 28.6962 30.1774 28.6509 30.3049C28.6056 30.4324 28.5885 30.5682 28.6008 30.703C28.5871 30.838 28.6029 30.9743 28.6471 31.1025C28.6913 31.2307 28.7629 31.3478 28.8569 31.4456C28.9509 31.5434 29.0651 31.6196 29.1915 31.6688C29.3179 31.7181 29.4535 31.7392 29.5888 31.7309H29.5955ZM32.6525 32.3641C32.4344 32.3719 32.217 32.334 32.0144 32.253C31.8117 32.1719 31.6282 32.0494 31.4756 31.8934C31.323 31.7373 31.2047 31.5512 31.1281 31.3468C31.0516 31.1423 31.0186 30.9242 31.0312 30.7063C31.0213 30.4874 31.0558 30.2688 31.1327 30.0637C31.2097 29.8586 31.3274 29.6711 31.4788 29.5128C31.6301 29.3544 31.812 29.2283 32.0135 29.1422C32.2149 29.0561 32.4318 29.0117 32.6509 29.0117C32.8699 29.0117 33.0868 29.0561 33.2882 29.1422C33.4897 29.2283 33.6716 29.3544 33.823 29.5128C33.9743 29.6711 34.092 29.8586 34.169 30.0637C34.2459 30.2688 34.2805 30.4874 34.2705 30.7063C34.2827 30.9244 34.2492 31.1426 34.1723 31.347C34.0954 31.5514 33.9767 31.7375 33.8238 31.8935C33.671 32.0495 33.4873 32.1719 33.2844 32.253C33.0816 32.334 32.8641 32.3719 32.6459 32.3641H32.6525ZM35.3548 32.0724C35.3728 32.0694 35.3913 32.0704 35.4089 32.0753C35.4265 32.0802 35.4428 32.0888 35.4567 32.1007C35.4706 32.1125 35.4818 32.1272 35.4895 32.1438C35.4972 32.1604 35.5011 32.1784 35.5011 32.1967C35.5011 32.215 35.4972 32.233 35.4895 32.2496C35.4818 32.2662 35.4706 32.2809 35.4567 32.2927C35.4428 32.3046 35.4265 32.3132 35.4089 32.3181C35.3913 32.323 35.3728 32.324 35.3548 32.321H34.6916C34.6727 32.3216 34.6539 32.3183 34.6362 32.3115C34.6186 32.3046 34.6025 32.2944 34.5889 32.2812C34.5758 32.2682 34.5656 32.2527 34.5587 32.2356C34.5519 32.2185 34.5486 32.2002 34.5491 32.1818C34.5478 32.1119 34.5687 32.0434 34.6087 31.9862C34.7613 31.7673 35.0763 31.6546 35.1989 31.5054C35.2203 31.4763 35.2304 31.4404 35.2273 31.4045C35.2243 31.3685 35.2083 31.3348 35.1824 31.3098C35.0928 31.2302 34.8508 31.27 34.7447 31.3098C34.7218 31.3202 34.6963 31.3236 34.6715 31.3195C34.6467 31.3154 34.6237 31.3039 34.6054 31.2866C34.5924 31.2729 34.5828 31.2565 34.5771 31.2386C34.5715 31.2206 34.5701 31.2016 34.5729 31.183C34.5758 31.1645 34.583 31.1468 34.5938 31.1314C34.6046 31.116 34.6188 31.1033 34.6353 31.0942C34.7303 31.042 34.8354 31.0109 34.9435 31.0028C35.0517 30.9948 35.1603 31.0102 35.2619 31.0478C35.3127 31.0719 35.3576 31.1067 35.3935 31.15C35.4294 31.1932 35.4554 31.2438 35.4696 31.2982C35.4838 31.3525 35.4859 31.4093 35.4758 31.4646C35.4657 31.5199 35.4437 31.5723 35.4111 31.6181C35.2544 31.7908 35.0721 31.9384 34.8707 32.0558L35.3548 32.0724Z"
                                                                fill="var(--primary)" />
                                                            <g filter="url(#filter0_d)">
                                                                <path
                                                                    d="M49.297 36.3321C47.6297 40.0611 44.8051 43.1535 41.2419 45.1507C37.6787 47.148 33.5667 47.9437 29.5157 47.42C25.4646 46.8962 21.6902 45.0808 18.7521 42.2431C15.8141 39.4053 13.8687 35.6962 13.2047 31.6658C12.5406 27.6354 13.1931 23.4982 15.0654 19.8678C16.9377 16.2375 19.9301 13.3071 23.599 11.5114C27.2678 9.71559 31.4178 9.15001 35.4334 9.89848C39.449 10.647 43.1164 12.6696 45.892 15.6666L45.7476 15.8003C43.0008 12.8343 39.3713 10.8326 35.3973 10.0919C31.4233 9.35117 27.3163 9.91089 23.6855 11.6881C20.0546 13.4652 17.0932 16.3652 15.2402 19.958C13.3873 23.5508 12.7416 27.6451 13.3988 31.6338C14.056 35.6225 15.9812 39.2932 18.8888 42.1016C21.7965 44.9099 25.5318 46.7065 29.5409 47.2248C33.55 47.7432 37.6194 46.9557 41.1457 44.9791C44.672 43.0026 47.4674 39.9422 49.1174 36.2518L49.297 36.3321Z"
                                                                    stroke="var(--primary)" stroke-linejoin="round"
                                                                    shape-rendering="crispEdges" />
                                                            </g>
                                                            <defs>
                                                                <filter id="filter0_d" x="0.0693359" y="0.693359"
                                                                    width="63.5347" height="63.7051"
                                                                    filterUnits="userSpaceOnUse"
                                                                    color-interpolation-filters="sRGB">
                                                                    <feFlood flood-opacity="0"
                                                                        result="BackgroundImageFix" />
                                                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                                        result="hardAlpha" />
                                                                    <feOffset dy="4" />
                                                                    <feGaussianBlur stdDeviation="4" />
                                                                    <feComposite in2="hardAlpha" operator="out" />
                                                                    <feColorMatrix type="matrix"
                                                                        values="0 0 0 0 0 0 0 0 0 0.72549 0 0 0 0 0.168627 0 0 0 0.17 0" />
                                                                    <feBlend mode="normal" in2="BackgroundImageFix"
                                                                        result="effect1_dropShadow" />
                                                                    <feBlend mode="normal" in="SourceGraphic"
                                                                        in2="effect1_dropShadow" result="shape" />
                                                                </filter>
                                                            </defs>
                                                        </svg>
                                                    </i>
                                                    <div class="wd-stock-inner-deatil">
                                                        <span class="gry-text">Type</span>
                                                        <span>{{ $value->body_type }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md col-sm-3 col wd-sl-ulli">
                                                    <i>
                                                        <svg width="64" height="65" viewBox="0 0 64 65"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M39.149 36.2172C39.3243 36.1536 39.471 36.0292 39.5625 35.8667C39.654 35.7042 39.6842 35.5143 39.6477 35.3314L37.4235 21.792C37.4032 21.6223 37.3232 21.4654 37.1979 21.3492C37.0726 21.233 36.91 21.1651 36.7393 21.1576H34.3556C34.3866 20.6292 34.7004 20.1981 35.0716 20.1981C35.1563 20.2017 35.2392 20.2234 35.3149 20.2616C35.3906 20.2997 35.4572 20.3536 35.5105 20.4195H36.2127C36.1212 20.1878 35.965 19.9873 35.7627 19.8419C35.5603 19.6965 35.3205 19.6124 35.0716 19.5996C34.3435 19.5996 33.7511 20.3357 33.7511 21.2414C33.7511 22.0332 34.2039 22.6968 34.8043 22.8512C34.8817 22.8721 34.9499 22.9182 34.9983 22.9821C35.0467 23.046 35.0725 23.1242 35.0716 23.2044C35.0712 23.3027 35.0319 23.3968 34.9624 23.4662C34.893 23.5357 34.7989 23.575 34.7006 23.5755C34.6676 23.5747 34.6348 23.57 34.6028 23.5615C33.6932 23.3161 33.013 22.3685 33.013 21.2414C33.0123 21.2134 33.0137 21.1854 33.017 21.1576H31.4312C31.4621 20.6292 31.774 20.1981 32.1453 20.1981C32.2297 20.2016 32.3124 20.2231 32.3878 20.2613C32.4632 20.2995 32.5294 20.3535 32.5822 20.4195H33.2863C33.1948 20.1878 33.0386 19.9872 32.8363 19.8419C32.634 19.6965 32.3941 19.6124 32.1453 19.5996C31.4192 19.5996 30.8267 20.3357 30.8267 21.2414C30.8267 22.0328 31.2791 22.696 31.8776 22.8509C31.9551 22.8719 32.0234 22.918 32.0718 22.982C32.1203 23.0459 32.1461 23.1242 32.1453 23.2044C32.1448 23.3027 32.1056 23.3968 32.0361 23.4662C31.9666 23.5357 31.8725 23.575 31.7743 23.5755C31.7412 23.5747 31.7084 23.57 31.6765 23.5615C30.7689 23.3141 30.0887 22.3685 30.0887 21.2414C30.088 21.2134 30.0893 21.1854 30.0927 21.1576H28.5048C28.5359 20.6292 28.8497 20.1981 29.2209 20.1981C29.3053 20.2015 29.388 20.2231 29.4634 20.2613C29.5388 20.2995 29.605 20.3535 29.6578 20.4195H30.3599C30.2689 20.1879 30.113 19.9874 29.9111 19.842C29.7091 19.6966 29.4695 19.6124 29.2209 19.5996C28.4928 19.5996 27.9004 20.3357 27.9004 21.2414C27.9004 22.0332 28.3532 22.6968 28.9535 22.8512C29.0309 22.8721 29.0992 22.9182 29.1476 22.9821C29.196 23.046 29.2218 23.1242 29.2209 23.2044C29.2204 23.3027 29.1812 23.3968 29.1117 23.4662C29.0422 23.5357 28.9481 23.575 28.8499 23.5755C28.8169 23.5747 28.784 23.57 28.7521 23.5615C27.8425 23.3161 27.1623 22.3685 27.1623 21.2414C27.1616 21.2134 27.163 21.1854 27.1663 21.1576H25.5785C25.6096 20.6292 25.9233 20.1981 26.2946 20.1981C26.3792 20.2017 26.4622 20.2234 26.5378 20.2616C26.6135 20.2997 26.6802 20.3536 26.7334 20.4195H27.4356C27.3441 20.1878 27.1879 19.9873 26.9856 19.8419C26.7833 19.6965 26.5434 19.6124 26.2946 19.5996C25.5665 19.5996 24.974 20.3357 24.974 21.2414C24.974 22.0332 25.4268 22.6968 26.0272 22.8512C26.1046 22.8721 26.1728 22.9182 26.2212 22.9821C26.2696 23.046 26.2954 23.1242 26.2946 23.2044C26.2941 23.3027 26.2548 23.3968 26.1854 23.4662C26.1159 23.5357 26.0218 23.575 25.9235 23.5755C25.8905 23.5747 25.8577 23.57 25.8258 23.5615C24.962 23.3281 24.3038 22.4623 24.2419 21.409C24.1531 21.5162 24.0939 21.6448 24.0704 21.782L21.7185 35.2157C21.6965 35.3163 21.6948 35.4203 21.7138 35.5215C21.7327 35.6228 21.7718 35.7191 21.8288 35.8049C21.8857 35.8907 21.9594 35.9642 22.0453 36.021C22.1312 36.0777 22.2276 36.1166 22.3289 36.1354L34.3256 37.5418C34.5805 37.571 34.8387 37.5465 35.0836 37.47L39.149 36.2172ZM34.0084 36.1932C34.0006 36.2676 33.9642 36.336 33.9068 36.384C33.8495 36.432 33.7758 36.4559 33.7012 36.4506L22.9633 35.1898C22.9222 35.1822 22.8831 35.1663 22.8483 35.1433C22.8135 35.1202 22.7837 35.0904 22.7606 35.0556C22.7376 35.0208 22.7217 34.9818 22.714 34.9407C22.7063 34.8997 22.707 34.8575 22.7159 34.8168L24.206 26.2985C24.2156 26.2292 24.2495 26.1656 24.3018 26.1191C24.3541 26.0727 24.4213 26.0464 24.4913 26.0451L35.2392 26.3584C35.2824 26.3627 35.3242 26.376 35.362 26.3975C35.3997 26.419 35.4325 26.4482 35.4583 26.4831C35.484 26.5181 35.5022 26.5581 35.5115 26.6005C35.5209 26.6429 35.5212 26.6868 35.5125 26.7294L34.0084 36.1932ZM35.0757 35.2876L36.5598 35.4611L37.7367 35.5988L34.8881 36.4685L35.0757 35.2876Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M29.1697 34.6292L30.5266 34.7706L30.7622 33.2934L29.4053 33.168L29.1697 34.6292Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M32.824 28.9346L34.1819 29.0098L34.4175 27.4967L33.0596 27.4395L32.824 28.9346Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M30.1089 28.7874L31.4658 28.8608L31.7014 27.3836L30.3445 27.3262L30.1089 28.7874Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M27.3928 28.6381L28.7507 28.7115L28.9853 27.2682L27.6284 27.2109L27.3928 28.6381Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M32.3547 31.9229L33.7126 32.0322L33.9472 30.5191L32.5893 30.4277L32.3547 31.9229Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M29.6399 31.7073L30.9968 31.8147L31.2314 30.3375L29.8745 30.2461L29.6399 31.7073Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M26.9236 31.4916L28.2805 31.5989L28.5151 30.1558L27.1582 30.0645L26.9236 31.4916Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M24.2078 31.2762L25.5659 31.3853L25.8003 29.9761L24.4424 29.8848L24.2078 31.2762Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M26.4534 34.3451L27.8103 34.4865L28.0461 33.0432L26.689 32.918L26.4534 34.3451Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M23.7378 34.0592L25.0959 34.2026L25.3315 32.7932L23.9734 32.668L23.7378 34.0592Z"
                                                                fill="var(--primary)" />
                                                            <g filter="url(#filter0_d)">
                                                                <path
                                                                    d="M49.297 36.3321C47.6297 40.0611 44.8051 43.1535 41.2419 45.1507C37.6787 47.148 33.5667 47.9437 29.5157 47.42C25.4646 46.8962 21.6902 45.0808 18.7521 42.2431C15.8141 39.4053 13.8687 35.6962 13.2047 31.6658C12.5406 27.6354 13.1931 23.4982 15.0654 19.8678C16.9377 16.2375 19.9301 13.3071 23.599 11.5114C27.2678 9.71559 31.4178 9.15001 35.4334 9.89848C39.449 10.647 43.1164 12.6696 45.892 15.6666L45.7476 15.8003C43.0008 12.8343 39.3713 10.8326 35.3973 10.0919C31.4233 9.35117 27.3163 9.91089 23.6855 11.6881C20.0546 13.4652 17.0932 16.3652 15.2402 19.958C13.3873 23.5508 12.7416 27.6451 13.3988 31.6338C14.056 35.6225 15.9812 39.2932 18.8888 42.1016C21.7965 44.9099 25.5318 46.7065 29.5409 47.2248C33.55 47.7432 37.6194 46.9557 41.1457 44.9791C44.672 43.0026 47.4674 39.9422 49.1174 36.2518L49.297 36.3321Z"
                                                                    stroke="var(--primary)" stroke-linejoin="round"
                                                                    shape-rendering="crispEdges" />
                                                            </g>
                                                            <defs>
                                                                <filter id="filter0_d" x="0.0693359" y="0.693359"
                                                                    width="63.5347" height="63.7051"
                                                                    filterUnits="userSpaceOnUse"
                                                                    color-interpolation-filters="sRGB">
                                                                    <feFlood flood-opacity="0"
                                                                        result="BackgroundImageFix" />
                                                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                                        result="hardAlpha" />
                                                                    <feOffset dy="4" />
                                                                    <feGaussianBlur stdDeviation="4" />
                                                                    <feComposite in2="hardAlpha" operator="out" />
                                                                    <feColorMatrix type="matrix"
                                                                        values="0 0 0 0 0 0 0 0 0 0.72549 0 0 0 0 0.168627 0 0 0 0.17 0" />
                                                                    <feBlend mode="normal" in2="BackgroundImageFix"
                                                                        result="effect1_dropShadow" />
                                                                    <feBlend mode="normal" in="SourceGraphic"
                                                                        in2="effect1_dropShadow" result="shape" />
                                                                </filter>
                                                            </defs>
                                                        </svg>
                                                    </i>
                                                    <div class="wd-stock-inner-deatil">
                                                        <span class="gry-text">YEAR</span>
                                                        <span>{{ $value->manufacture }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md col-sm-3 col wd-sl-ulli">
                                                    <i>
                                                        <svg width="64" height="65" viewBox="0 0 64 65"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M39.149 36.2172C39.3243 36.1536 39.471 36.0292 39.5625 35.8667C39.654 35.7042 39.6842 35.5143 39.6477 35.3314L37.4235 21.792C37.4032 21.6223 37.3232 21.4654 37.1979 21.3492C37.0726 21.233 36.91 21.1651 36.7393 21.1576H34.3556C34.3866 20.6292 34.7004 20.1981 35.0716 20.1981C35.1563 20.2017 35.2392 20.2234 35.3149 20.2616C35.3906 20.2997 35.4572 20.3536 35.5105 20.4195H36.2127C36.1212 20.1878 35.965 19.9873 35.7627 19.8419C35.5603 19.6965 35.3205 19.6124 35.0716 19.5996C34.3435 19.5996 33.7511 20.3357 33.7511 21.2414C33.7511 22.0332 34.2039 22.6968 34.8043 22.8512C34.8817 22.8721 34.9499 22.9182 34.9983 22.9821C35.0467 23.046 35.0725 23.1242 35.0716 23.2044C35.0712 23.3027 35.0319 23.3968 34.9624 23.4662C34.893 23.5357 34.7989 23.575 34.7006 23.5755C34.6676 23.5747 34.6348 23.57 34.6028 23.5615C33.6932 23.3161 33.013 22.3685 33.013 21.2414C33.0123 21.2134 33.0137 21.1854 33.017 21.1576H31.4312C31.4621 20.6292 31.774 20.1981 32.1453 20.1981C32.2297 20.2016 32.3124 20.2231 32.3878 20.2613C32.4632 20.2995 32.5294 20.3535 32.5822 20.4195H33.2863C33.1948 20.1878 33.0386 19.9872 32.8363 19.8419C32.634 19.6965 32.3941 19.6124 32.1453 19.5996C31.4192 19.5996 30.8267 20.3357 30.8267 21.2414C30.8267 22.0328 31.2791 22.696 31.8776 22.8509C31.9551 22.8719 32.0234 22.918 32.0718 22.982C32.1203 23.0459 32.1461 23.1242 32.1453 23.2044C32.1448 23.3027 32.1056 23.3968 32.0361 23.4662C31.9666 23.5357 31.8725 23.575 31.7743 23.5755C31.7412 23.5747 31.7084 23.57 31.6765 23.5615C30.7689 23.3141 30.0887 22.3685 30.0887 21.2414C30.088 21.2134 30.0893 21.1854 30.0927 21.1576H28.5048C28.5359 20.6292 28.8497 20.1981 29.2209 20.1981C29.3053 20.2015 29.388 20.2231 29.4634 20.2613C29.5388 20.2995 29.605 20.3535 29.6578 20.4195H30.3599C30.2689 20.1879 30.113 19.9874 29.9111 19.842C29.7091 19.6966 29.4695 19.6124 29.2209 19.5996C28.4928 19.5996 27.9004 20.3357 27.9004 21.2414C27.9004 22.0332 28.3532 22.6968 28.9535 22.8512C29.0309 22.8721 29.0992 22.9182 29.1476 22.9821C29.196 23.046 29.2218 23.1242 29.2209 23.2044C29.2204 23.3027 29.1812 23.3968 29.1117 23.4662C29.0422 23.5357 28.9481 23.575 28.8499 23.5755C28.8169 23.5747 28.784 23.57 28.7521 23.5615C27.8425 23.3161 27.1623 22.3685 27.1623 21.2414C27.1616 21.2134 27.163 21.1854 27.1663 21.1576H25.5785C25.6096 20.6292 25.9233 20.1981 26.2946 20.1981C26.3792 20.2017 26.4622 20.2234 26.5378 20.2616C26.6135 20.2997 26.6802 20.3536 26.7334 20.4195H27.4356C27.3441 20.1878 27.1879 19.9873 26.9856 19.8419C26.7833 19.6965 26.5434 19.6124 26.2946 19.5996C25.5665 19.5996 24.974 20.3357 24.974 21.2414C24.974 22.0332 25.4268 22.6968 26.0272 22.8512C26.1046 22.8721 26.1728 22.9182 26.2212 22.9821C26.2696 23.046 26.2954 23.1242 26.2946 23.2044C26.2941 23.3027 26.2548 23.3968 26.1854 23.4662C26.1159 23.5357 26.0218 23.575 25.9235 23.5755C25.8905 23.5747 25.8577 23.57 25.8258 23.5615C24.962 23.3281 24.3038 22.4623 24.2419 21.409C24.1531 21.5162 24.0939 21.6448 24.0704 21.782L21.7185 35.2157C21.6965 35.3163 21.6948 35.4203 21.7138 35.5215C21.7327 35.6228 21.7718 35.7191 21.8288 35.8049C21.8857 35.8907 21.9594 35.9642 22.0453 36.021C22.1312 36.0777 22.2276 36.1166 22.3289 36.1354L34.3256 37.5418C34.5805 37.571 34.8387 37.5465 35.0836 37.47L39.149 36.2172ZM34.0084 36.1932C34.0006 36.2676 33.9642 36.336 33.9068 36.384C33.8495 36.432 33.7758 36.4559 33.7012 36.4506L22.9633 35.1898C22.9222 35.1822 22.8831 35.1663 22.8483 35.1433C22.8135 35.1202 22.7837 35.0904 22.7606 35.0556C22.7376 35.0208 22.7217 34.9818 22.714 34.9407C22.7063 34.8997 22.707 34.8575 22.7159 34.8168L24.206 26.2985C24.2156 26.2292 24.2495 26.1656 24.3018 26.1191C24.3541 26.0727 24.4213 26.0464 24.4913 26.0451L35.2392 26.3584C35.2824 26.3627 35.3242 26.376 35.362 26.3975C35.3997 26.419 35.4325 26.4482 35.4583 26.4831C35.484 26.5181 35.5022 26.5581 35.5115 26.6005C35.5209 26.6429 35.5212 26.6868 35.5125 26.7294L34.0084 36.1932ZM35.0757 35.2876L36.5598 35.4611L37.7367 35.5988L34.8881 36.4685L35.0757 35.2876Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M29.1697 34.6292L30.5266 34.7706L30.7622 33.2934L29.4053 33.168L29.1697 34.6292Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M32.824 28.9346L34.1819 29.0098L34.4175 27.4967L33.0596 27.4395L32.824 28.9346Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M30.1089 28.7874L31.4658 28.8608L31.7014 27.3836L30.3445 27.3262L30.1089 28.7874Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M27.3928 28.6381L28.7507 28.7115L28.9853 27.2682L27.6284 27.2109L27.3928 28.6381Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M32.3547 31.9229L33.7126 32.0322L33.9472 30.5191L32.5893 30.4277L32.3547 31.9229Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M29.6399 31.7073L30.9968 31.8147L31.2314 30.3375L29.8745 30.2461L29.6399 31.7073Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M26.9236 31.4916L28.2805 31.5989L28.5151 30.1558L27.1582 30.0645L26.9236 31.4916Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M24.2078 31.2762L25.5659 31.3853L25.8003 29.9761L24.4424 29.8848L24.2078 31.2762Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M26.4534 34.3451L27.8103 34.4865L28.0461 33.0432L26.689 32.918L26.4534 34.3451Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M23.7378 34.0592L25.0959 34.2026L25.3315 32.7932L23.9734 32.668L23.7378 34.0592Z"
                                                                fill="var(--primary)" />
                                                            <g filter="url(#filter0_d)">
                                                                <path
                                                                    d="M49.297 36.3321C47.6297 40.0611 44.8051 43.1535 41.2419 45.1507C37.6787 47.148 33.5667 47.9437 29.5157 47.42C25.4646 46.8962 21.6902 45.0808 18.7521 42.2431C15.8141 39.4053 13.8687 35.6962 13.2047 31.6658C12.5406 27.6354 13.1931 23.4982 15.0654 19.8678C16.9377 16.2375 19.9301 13.3071 23.599 11.5114C27.2678 9.71559 31.4178 9.15001 35.4334 9.89848C39.449 10.647 43.1164 12.6696 45.892 15.6666L45.7476 15.8003C43.0008 12.8343 39.3713 10.8326 35.3973 10.0919C31.4233 9.35117 27.3163 9.91089 23.6855 11.6881C20.0546 13.4652 17.0932 16.3652 15.2402 19.958C13.3873 23.5508 12.7416 27.6451 13.3988 31.6338C14.056 35.6225 15.9812 39.2932 18.8888 42.1016C21.7965 44.9099 25.5318 46.7065 29.5409 47.2248C33.55 47.7432 37.6194 46.9557 41.1457 44.9791C44.672 43.0026 47.4674 39.9422 49.1174 36.2518L49.297 36.3321Z"
                                                                    stroke="var(--primary)" stroke-linejoin="round"
                                                                    shape-rendering="crispEdges" />
                                                            </g>
                                                            <defs>
                                                                <filter id="filter0_d" x="0.0693359" y="0.693359"
                                                                    width="63.5347" height="63.7051"
                                                                    filterUnits="userSpaceOnUse"
                                                                    color-interpolation-filters="sRGB">
                                                                    <feFlood flood-opacity="0"
                                                                        result="BackgroundImageFix" />
                                                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                                        result="hardAlpha" />
                                                                    <feOffset dy="4" />
                                                                    <feGaussianBlur stdDeviation="4" />
                                                                    <feComposite in2="hardAlpha" operator="out" />
                                                                    <feColorMatrix type="matrix"
                                                                        values="0 0 0 0 0 0 0 0 0 0.72549 0 0 0 0 0.168627 0 0 0 0.17 0" />
                                                                    <feBlend mode="normal" in2="BackgroundImageFix"
                                                                        result="effect1_dropShadow" />
                                                                    <feBlend mode="normal" in="SourceGraphic"
                                                                        in2="effect1_dropShadow" result="shape" />
                                                                </filter>
                                                            </defs>
                                                        </svg>
                                                    </i>
                                                    <div class="wd-stock-inner-deatil">
                                                        <span class="gry-text">CO<sub>2</sub> Emission</span>
                                                        <span>not available</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <div class="col-lg-12">
                                <div class="search-card wd-card d-block">
                                    <div class="wdsl-srch-body text-center">
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
