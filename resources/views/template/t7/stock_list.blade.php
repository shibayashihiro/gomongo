@extends('layouts.template.t7.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection

@section('content')
    <section class="wd-md-stock-main text-center mb-0">
        <div class="container">
            <h1>Stock list</h1>
            <h3><a href="{{ route('front.template.home', $domain_slug) }}">Home</a> | Stock List</h3>
            <p>With a wide variety of stock, we are confident we can help you in finding
                <br> your dream car! Have a look at our diverse stock portfolio and contact us to
                <br> book a viewing or test drive!
            </p>
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
                                        <option value="{{ $value }}"
                                            {{ request()->make == $value ? 'selected' : '' }}>
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
                                                {{ request()->modal == $value->modal ? 'selected' : '' }}>
                                                {{ $value->modal }}
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
                                            {{ request()->mileage == $i ? 'selected' : '' }}>
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
                                            {{ request()->doors == $value ? 'selected' : '' }}>
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
                                        class="search-card d-block">
                                        <div class="pd-image">
                                            <img src="{{ checkFileExist($stockImg) }}" alt="">
                                            <small>Premium</small>
                                        </div>
                                        <div class="wdsl-srch-body ml-0">
                                            <div class="wd-sl-top border-bottom-0 pl-0 pr-0">
                                                <div class="wd-sl-innertop">
                                                    <h2>{{ $value->make }}</h2>
                                                </div>
                                                <span>{{ $value->derivative }}</span> <br>
                                                <span>{{ $value->attention_grabber }}</span>
                                                <h4>£{{ number_format($value->price) }}</h4>
                                                <p>{{ $description }}</p>
                                            </div>
                                            <div class="wd-sl-middle pl-0 pr-0 row">
                                                <div class="col-md-6 col-sm-12">
                                                    <h6 class="gry-text">CATEGORY: &nbsp;<b>{{ $value->category }}</b>
                                                    </h6>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <h6 class="gry-text">TRANSMISSION:
                                                        &nbsp;<b>{{ $value->transmission }}</b></h6>
                                                </div>
                                            </div>
                                            <div class="wd-sl-middle pl-0 pr-0 mt-2 row">
                                                <div class="col-md-6 col-sm-12">
                                                    <h6 class="gry-text">CO<sub>2</sub> Emission: &nbsp;
                                                        <b>not available</b>
                                                    </h6>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <h6 class="gry-text">MAKE: &nbsp; <b>{{ $value->make }}</b></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wd-sl-stocklast">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="wd-sl-ulli">
                                                        <svg width="20" height="19" viewBox="0 0 20 19"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M2.01349 0.84375H13.4228V7.02008H2.01349V0.84375ZM13.4228 9.0265C14.6387 9.05758 15.7396 9.28354 15.7396 10.8951V14.3199C15.7396 16.4287 18.5933 16.2206 18.5933 14.4406V10.2295L17.3819 9.02987V7.19786L15.2952 5.1052C14.7879 4.59643 15.559 3.82315 16.0663 4.33168L19.6841 7.95981V14.4406C19.6841 17.6612 14.649 17.8792 14.649 14.3199V10.8951C14.649 10.204 14.0029 10.1125 13.4228 10.1088V15.9296H2.01349V8.14289H13.4228V9.0265ZM0.883301 16.8515H14.553V18.3241H0.883301V16.8515ZM3.52418 2.30575H11.9121V5.65372H3.52418V2.30575Z"
                                                                fill="var(--primary)" />
                                                        </svg>
                                                        <div class="wd-sl-detailscontent ml-3"><span
                                                                class="gry-text">FUEL</span>
                                                            <span>{{ $value->fuel_type }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="wd-sl-ulli">
                                                        <svg width="22" height="14" viewBox="0 0 22 14"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M12.3833 0.644531L21.3833 4.65594V13.6816H12.3833V0.644531Z"
                                                                fill="var(--primary)" />
                                                            <path
                                                                d="M0.883301 11.1741L8.8833 2.14844H12.3833V13.6812H0.883301V11.1741Z"
                                                                fill="var(--primary)" />
                                                            <rect x="2.5022" y="9.67188" width="0.731899"
                                                                height="3.66993" fill="white" />
                                                            <rect x="5.43018" y="6.66016" width="0.731899"
                                                                height="7.01997" fill="white" />
                                                            <rect width="0.731899" height="10.0085"
                                                                transform="matrix(-1 0 0 1 9.0896 3.65234)"
                                                                fill="white" />
                                                            <rect x="11.2854" y="2.54297" width="0.731899"
                                                                height="11.0098" fill="white" />
                                                            <rect x="14.2131" y="1.80859" width="0.731899"
                                                                height="11.7438" fill="white" />
                                                            <rect x="17.1406" y="3.27344" width="0.731899"
                                                                height="10.2758" fill="white" />
                                                            <rect x="20.0681" y="4.74219" width="0.731899"
                                                                height="8.80784" fill="white" />
                                                        </svg>
                                                        <div class="wd-sl-detailscontent ml-3"><span
                                                                class="gry-text">Model</span>
                                                            <span>{{ $value->modal }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="wd-sl-ulli">
                                                        <svg width="23" height="14" viewBox="0 0 23 14"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M20.6895 6.69114C20.6841 6.68973 20.6784 6.68973 20.6729 6.69114C20.1791 6.28913 19.5987 6.00802 18.9777 5.87008C18.3567 5.73213 17.7122 5.74116 17.0953 5.89644C16.9365 5.42501 16.6382 5.01333 16.2401 4.7163C15.842 4.41926 15.3631 4.25097 14.8672 4.23388C14.6048 3.39552 14.1318 2.63892 13.4937 2.03677C12.8555 1.43463 12.0737 1.00717 11.2233 0.795466C10.3729 0.583765 9.48255 0.594933 8.6377 0.827898C7.79286 1.06086 7.02195 1.5078 6.39904 2.12576C6.3937 2.12371 6.3878 2.12371 6.38246 2.12576C5.42805 3.08636 4.88755 4.38415 4.87715 5.74016C3.80872 5.74942 2.78772 6.18394 2.03876 6.94813C1.28979 7.71233 0.874218 8.7436 0.883451 9.81508C0.892685 10.8866 1.32597 11.9105 2.08799 12.6616C2.85002 13.4127 3.87835 13.8294 4.94678 13.8202H18.1099C18.9345 13.8167 19.7381 13.5597 20.4123 13.0836C21.0865 12.6076 21.5988 11.9356 21.8801 11.1583C22.1613 10.381 22.198 9.53585 21.9851 8.737C21.7722 7.93815 21.32 7.22406 20.6895 6.69114ZM9.41628 10.3953C9.66586 10.3987 9.91187 10.3356 10.1291 10.2124C10.1863 10.1826 10.2514 10.1716 10.3152 10.1812C10.3789 10.1908 10.438 10.2203 10.4839 10.2656C10.5117 10.2922 10.5337 10.3242 10.5485 10.3597C10.5633 10.3952 10.5707 10.4333 10.5701 10.4718C10.5722 10.529 10.558 10.5856 10.5292 10.635C10.5005 10.6845 10.4583 10.7247 10.4077 10.7511C10.0976 10.9382 9.74166 11.0349 9.37981 11.0304C9.16155 11.0393 8.94388 11.002 8.74091 10.921C8.53794 10.8401 8.35421 10.7172 8.20164 10.5604C8.04907 10.4037 7.93107 10.2165 7.85529 10.011C7.77951 9.80559 7.74765 9.58645 7.76177 9.36785C7.74817 9.14937 7.7804 8.93046 7.85636 8.72525C7.93233 8.52003 8.05035 8.33306 8.20281 8.1764C8.35527 8.01975 8.53879 7.89688 8.74152 7.81574C8.94425 7.73459 9.16169 7.69697 9.37981 7.7053C9.74303 7.70167 10.1001 7.79954 10.411 7.98793C10.4822 8.02497 10.5358 8.08887 10.5601 8.16557C10.5843 8.24227 10.5772 8.32549 10.5403 8.39692C10.5034 8.46835 10.4396 8.52214 10.3632 8.54646C10.2867 8.57078 10.2037 8.56364 10.1325 8.5266C9.91421 8.40283 9.66698 8.33969 9.41628 8.34372C9.28127 8.33449 9.14588 8.35477 9.01945 8.40314C8.89302 8.45151 8.77856 8.52682 8.68399 8.62388C8.58941 8.72094 8.51697 8.83743 8.47167 8.9653C8.42636 9.09317 8.40928 9.22938 8.42158 9.36453C8.40786 9.49986 8.42366 9.63657 8.46789 9.76517C8.51212 9.89377 8.58372 10.0112 8.67773 10.1093C8.77173 10.2073 8.88589 10.2837 9.01228 10.3331C9.13867 10.3825 9.27426 10.4037 9.40965 10.3953H9.41628ZM12.4733 11.0304C12.2552 11.0382 12.0378 11.0002 11.8352 10.9189C11.6325 10.8376 11.449 10.7148 11.2964 10.5583C11.1438 10.4018 11.0255 10.2151 10.9489 10.0101C10.8724 9.80513 10.8394 9.58637 10.852 9.36785C10.8421 9.14836 10.8766 8.92913 10.9535 8.72341C11.0305 8.51768 11.1482 8.32973 11.2996 8.17089C11.4509 8.01206 11.6328 7.88563 11.8343 7.79926C12.0357 7.71289 12.2526 7.66836 12.4717 7.66836C12.6907 7.66836 12.9076 7.71289 13.109 7.79926C13.3105 7.88563 13.4924 8.01206 13.6438 8.17089C13.7951 8.32973 13.9128 8.51768 13.9898 8.72341C14.0667 8.92913 14.1013 9.14836 14.0913 9.36785C14.1035 9.58654 14.07 9.80536 13.9931 10.0104C13.9162 10.2153 13.7975 10.402 13.6446 10.5584C13.4918 10.7149 13.3081 10.8376 13.1052 10.9189C12.9024 11.0002 12.6849 11.0381 12.4667 11.0304H12.4733ZM15.1756 10.7378C15.1936 10.7348 15.2121 10.7358 15.2297 10.7407C15.2473 10.7456 15.2636 10.7543 15.2775 10.7662C15.2914 10.7781 15.3026 10.7928 15.3103 10.8094C15.318 10.8261 15.3219 10.8442 15.3219 10.8625C15.3219 10.8808 15.318 10.8989 15.3103 10.9155C15.3026 10.9322 15.2914 10.9469 15.2775 10.9588C15.2636 10.9706 15.2473 10.9793 15.2297 10.9842C15.2121 10.9891 15.1936 10.9901 15.1756 10.9872H14.5124C14.4935 10.9877 14.4747 10.9844 14.457 10.9776C14.4394 10.9707 14.4233 10.9604 14.4097 10.9473C14.3966 10.9342 14.3864 10.9186 14.3795 10.9015C14.3727 10.8844 14.3694 10.866 14.3699 10.8475C14.3686 10.7775 14.3895 10.7088 14.4295 10.6513C14.5821 10.4319 14.8971 10.3188 15.0197 10.1692C15.0411 10.14 15.0512 10.1041 15.0481 10.068C15.0451 10.0319 15.0291 9.99818 15.0032 9.97302C14.9136 9.89322 14.6716 9.93312 14.5655 9.97302C14.5426 9.98353 14.5171 9.98693 14.4923 9.98278C14.4675 9.97863 14.4445 9.96713 14.4262 9.94975C14.4132 9.9361 14.4036 9.91964 14.3979 9.90164C14.3923 9.88364 14.3909 9.86458 14.3938 9.84594C14.3966 9.8273 14.4038 9.80957 14.4146 9.79413C14.4254 9.77869 14.4396 9.76595 14.4561 9.75689C14.5511 9.70452 14.6562 9.67326 14.7643 9.66522C14.8725 9.65719 14.9811 9.67258 15.0827 9.71034C15.1335 9.73443 15.1784 9.7694 15.2143 9.81277C15.2502 9.85614 15.2762 9.90687 15.2904 9.96139C15.3046 10.0159 15.3067 10.0729 15.2966 10.1283C15.2865 10.1838 15.2645 10.2363 15.2319 10.2823C15.0752 10.4554 14.8929 10.6034 14.6915 10.7212L15.1756 10.7378Z"
                                                                fill="var(--primary)" />
                                                        </svg>
                                                        <div class="wd-sl-detailscontent ml-3"><span
                                                                class="gry-text">Doors</span>
                                                            <span>{{ $value->doors }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="wd-sl-ulli">
                                                        <svg width="19" height="19" viewBox="0 0 19 19"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M18.3316 17.3095C18.5069 17.2457 18.6536 17.121 18.7451 16.9581C18.8366 16.7951 18.8668 16.6047 18.8303 16.4213L16.6061 2.84319C16.5858 2.67301 16.5058 2.51561 16.3805 2.39908C16.2552 2.28254 16.0926 2.21447 15.9219 2.20699H13.5382C13.5693 1.67706 13.883 1.2447 14.2543 1.2447C14.3389 1.24838 14.4219 1.27009 14.4975 1.30838C14.5732 1.34667 14.6399 1.40067 14.6931 1.46678H15.3953C15.3038 1.23438 15.1476 1.03328 14.9453 0.887482C14.743 0.741683 14.5031 0.657344 14.2543 0.644531C13.5262 0.644531 12.9337 1.38275 12.9337 2.29102C12.9337 3.08504 13.3865 3.75055 13.9869 3.90543C14.0643 3.92641 14.1325 3.97258 14.1809 4.03669C14.2293 4.10079 14.2551 4.17921 14.2543 4.25961C14.2538 4.35815 14.2145 4.45252 14.1451 4.5222C14.0756 4.59188 13.9815 4.63124 13.8832 4.63173C13.8502 4.63099 13.8174 4.62629 13.7855 4.61772C12.8759 4.37165 12.1956 3.42136 12.1956 2.29102C12.195 2.26296 12.1963 2.23488 12.1996 2.207H10.6138C10.6447 1.67706 10.9566 1.2447 11.3279 1.2447C11.4123 1.24819 11.495 1.26983 11.5704 1.30814C11.6458 1.34646 11.7121 1.40056 11.7648 1.46678H12.4689C12.3774 1.23438 12.2212 1.03327 12.0189 0.887474C11.8166 0.741675 11.5767 0.657338 11.3279 0.644531C10.6018 0.644531 10.0093 1.38275 10.0093 2.29102C10.0093 3.08463 10.4617 3.74979 11.0603 3.90513C11.1377 3.92616 11.206 3.97237 11.2545 4.03653C11.3029 4.10068 11.3287 4.17915 11.3279 4.25961C11.3274 4.35815 11.2882 4.45252 11.2187 4.5222C11.1492 4.59188 11.0551 4.63124 10.9569 4.63173C10.9239 4.631 10.891 4.6263 10.8591 4.61772C9.95149 4.36965 9.27128 3.42136 9.27128 2.29102C9.27061 2.26296 9.27195 2.23488 9.27527 2.207H7.68746C7.71855 1.67706 8.03229 1.2447 8.40353 1.2447C8.48796 1.24819 8.57065 1.26982 8.64602 1.30813C8.72138 1.34645 8.78766 1.40055 8.84037 1.46678H9.54254C9.4515 1.23449 9.29566 1.03341 9.09367 0.887594C8.89168 0.741776 8.65208 0.657392 8.40353 0.644531C7.67545 0.644531 7.08298 1.38275 7.08298 2.29102C7.08298 3.08504 7.53579 3.75051 8.13614 3.90541C8.21354 3.9264 8.2818 3.97257 8.3302 4.03668C8.3786 4.10079 8.40439 4.17921 8.40353 4.25961C8.40305 4.35815 8.36381 4.45252 8.29433 4.5222C8.22485 4.59188 8.13076 4.63124 8.0325 4.63173C7.99948 4.63099 7.96667 4.62629 7.93476 4.61772C7.02516 4.37165 6.34492 3.42136 6.34492 2.29102C6.34427 2.26296 6.34559 2.23488 6.34889 2.207H4.76111C4.79219 1.67706 5.10596 1.2447 5.47719 1.2447C5.56186 1.24838 5.64478 1.27008 5.72044 1.30837C5.79611 1.34666 5.86278 1.40066 5.91603 1.46678H6.61821C6.52674 1.23438 6.37052 1.03328 6.1682 0.887481C5.96588 0.741682 5.726 0.657344 5.47719 0.644531C4.74909 0.644531 4.15661 1.38275 4.15661 2.29102C4.15661 3.08503 4.60942 3.75051 5.20978 3.90541C5.28719 3.92639 5.35545 3.97257 5.40385 4.03668C5.45225 4.10079 5.47805 4.1792 5.47719 4.25961C5.4767 4.35815 5.43746 4.45252 5.36798 4.5222C5.2985 4.59188 5.2044 4.63124 5.10614 4.63173C5.07312 4.63099 5.0403 4.62629 5.00839 4.61772C4.14466 4.38366 3.48639 3.51539 3.42454 2.45908C3.33568 2.56656 3.27652 2.69557 3.25298 2.83318L0.901134 16.3052C0.87907 16.4061 0.877463 16.5104 0.896407 16.6119C0.915351 16.7134 0.954459 16.81 1.01141 16.8961C1.06835 16.9821 1.14198 17.0558 1.22789 17.1127C1.31381 17.1697 1.41027 17.2087 1.51153 17.2275L13.5082 18.6379C13.7631 18.6672 14.0213 18.6426 14.2662 18.5659L18.3316 17.3095ZM13.191 17.2855C13.1832 17.3601 13.1468 17.4287 13.0895 17.4768C13.0321 17.525 12.9584 17.5489 12.8838 17.5436L2.14588 16.2792C2.10484 16.2715 2.06576 16.2557 2.03095 16.2326C1.99614 16.2094 1.96631 16.1795 1.94324 16.1447C1.92017 16.1098 1.90433 16.0706 1.89665 16.0294C1.88897 15.9883 1.88961 15.946 1.89853 15.9051L3.38865 7.36254C3.39818 7.29304 3.43216 7.22924 3.48446 7.18265C3.53676 7.13606 3.60395 7.10974 3.67389 7.10845L14.4218 7.42256C14.465 7.42688 14.5069 7.44026 14.5446 7.46182C14.5823 7.48337 14.6152 7.51263 14.6409 7.5477C14.6667 7.58277 14.6848 7.62287 14.6941 7.66541C14.7035 7.70795 14.7038 7.75198 14.6951 7.79466L13.191 17.2855ZM14.2583 16.3772L15.7424 16.5513L16.9193 16.6893L14.0707 17.5616L14.2583 16.3772Z"
                                                                fill="var(--primary)" />
                                                        </svg>
                                                        <div class="wd-sl-detailscontent ml-3"><span
                                                                class="gry-text">Engine Size</span>
                                                            <span>{{ $value->engine_size . ' ' . $value->engine_size_unit }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wdsl-srch-body ml-0">
                                                <div class="wd-sl-middle pl-0 pr-0 row" style="text-align: center;">
                                                    <div class="col-md-6 col-sm-12">
                                                        <h6 class="gry-text">COLOUR: &nbsp; <b>{{ $value->colour }}</b>
                                                        </h6>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <h6 class="gry-text">MILEAGE: &nbsp; <b>{{ $value->mileage }}</b>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="wd-sl-ulli">
                                                        <svg width="19" height="13" viewBox="0 0 19 13"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9.57913 0.253906C8.86896 0.253906 8.22714 0.324339 7.73625 0.447031C7.49079 0.508377 7.28398 0.580003 7.10946 0.683592C6.93496 0.786911 6.73923 0.954405 6.73923 1.23275C6.73923 1.23417 6.73921 1.23548 6.73923 1.23817V3.00806L4.60791 3.01619L3.01323 1.41446L0.883301 3.55008L2.47936 5.15033L2.48078 12.9823H16.6789V5.15009L18.275 3.54975L16.145 1.41421L14.549 3.01447L12.419 3.00371L12.4205 1.23102H12.419C12.4176 0.954484 12.2227 0.787654 12.0488 0.684577C11.8743 0.581258 11.6675 0.509713 11.422 0.448098C10.9311 0.325138 10.2893 0.254892 9.57913 0.254892V0.253906ZM9.57913 0.965724C10.2414 0.965724 10.8416 1.03538 11.2501 1.13816C11.3697 1.16829 11.4275 1.19925 11.5066 1.23127C11.508 1.23178 11.5094 1.23202 11.5109 1.23275C11.4298 1.26557 11.3717 1.29677 11.2502 1.32718C10.8417 1.42969 10.2415 1.49961 9.57924 1.49961C8.91702 1.49961 8.31676 1.42996 7.90829 1.32718C7.7906 1.29758 7.73314 1.26686 7.65592 1.23538C7.65308 1.23468 7.65024 1.23401 7.64761 1.23275C7.72872 1.19992 7.78676 1.16864 7.9083 1.13824C8.31677 1.036 8.91702 0.965806 9.57924 0.965806L9.57913 0.965724ZM9.57913 3.72423H11.7091V4.43605H10.9991V11.1989H11.7091V11.9107H9.57913V11.1989H10.2891V4.43605H9.57913V3.72423Z"
                                                                fill="var(--primary)" />
                                                        </svg>
                                                        <div class="wd-sl-detailscontent ml-3"><span
                                                                class="gry-text">YEAR</span>
                                                            <span>{{ $value->manufacture }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
