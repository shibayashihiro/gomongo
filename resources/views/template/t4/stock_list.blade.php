@extends('layouts.template.t4.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection

@section('content')
    <section class="wd-md-stock-main text-center mb-0">
        <div class="container">
            <h3><a href="{{ route('front.template.home', $domain_slug) }}">HOME</a> | STOCK LIST</h3>
            <h1>Stock list</h1>
            <p>With a wide variety of stock, we are confident we can help you in finding <br> your dream car! Have a
                look at our diverse stock portfolio and contact us to <br> book a viewing or test drive!</p>
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
                                        class="search-card d-block">
                                        <div class="wdsl-srch-body ml-0">
                                            <div class="wd-sl-top border-bottom-0 pl-0 pr-0">
                                                <div class="wd-sl-innertop">
                                                    <h2>{{ $value->make }}</h2>
                                                    <h4>£{{ number_format($value->price) }}</h4>
                                                </div>
                                                <span>{{ $value->derivative }}</span>

                                                <p>{{ $description }}</p>
                                            </div>
                                            <div class="wd-sl-middle pl-0 pr-0">
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
                                        <div class="pd-image">
                                            <img src="{{ checkFileExist($stockImg) }}" alt="">
                                        </div>
                                        <div class="wd-sl-stocklast">
                                            <div class="row">
                                                <div class="col-lg-3 wd-sl-ulli">
                                                    <span class="gry-text">FUEL</span>
                                                    <span>{{ $value->fuel_type }}</span>
                                                    <i>
                                                        <svg width="22" height="20" viewBox="0 0 22 20"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M1.47236 0.119141H14.2705V7.02761H1.47236V0.119141ZM14.2705 9.27187C15.6345 9.30663 16.8694 9.55937 16.8694 11.362V15.1928C16.8694 17.5516 20.0704 17.3188 20.0704 15.3278V10.6175L18.7116 9.27564V7.22646L16.3709 4.88574C15.8018 4.31666 16.6667 3.45172 17.2358 4.02053L21.294 8.07874V15.3278C21.294 18.9301 15.646 19.1739 15.646 15.1928V11.362C15.646 10.5889 14.9212 10.4866 14.2705 10.4825V16.9933H1.47236V8.28352H14.2705V9.27187ZM0.20459 18.0245H15.5383V19.6716H0.20459V18.0245ZM3.16694 1.75444H12.5759V5.49928H3.16694V1.75444Z"
                                                                fill="white" />
                                                        </svg>
                                                    </i>
                                                </div>
                                                <div class="col-lg-3 wd-sl-ulli">
                                                    <span class="gry-text">Engine SIZE</span>
                                                    <span>{{ $value->engine_size . ' ' . $value->engine_size_unit }}</span>
                                                    <i>
                                                        <svg width="24" height="23" viewBox="0 0 24 23"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.43178 19.0394C4.81932 19.1117 5.1379 19.3055 5.38751 19.6208C5.63711 19.9361 5.76192 20.2973 5.76192 20.7046C5.76192 21.0724 5.66996 21.3976 5.48604 21.68C5.30868 21.9559 5.04922 22.1727 4.70766 22.3303C4.36609 22.488 3.96212 22.5668 3.49575 22.5668H0.530029V15.6895H3.36766C3.83403 15.6895 4.23472 15.765 4.56972 15.9161C4.91128 16.0671 5.16746 16.2773 5.33824 16.5467C5.51559 16.816 5.60427 17.1214 5.60427 17.463C5.60427 17.8637 5.49589 18.1987 5.27913 18.468C5.06893 18.7373 4.78648 18.9278 4.43178 19.0394ZM1.90943 18.5271H3.17061C3.49904 18.5271 3.75193 18.4548 3.92928 18.3103C4.10663 18.1592 4.19531 17.9458 4.19531 17.6699C4.19531 17.394 4.10663 17.1805 3.92928 17.0294C3.75193 16.8784 3.49904 16.8028 3.17061 16.8028H1.90943V18.5271ZM3.29869 21.4435C3.63369 21.4435 3.89315 21.3647 4.07707 21.2071C4.26756 21.0494 4.36281 20.8261 4.36281 20.5371C4.36281 20.2415 4.26428 20.0116 4.06722 19.8474C3.87016 19.6766 3.60413 19.5912 3.26913 19.5912H1.90943V21.4435H3.29869Z"
                                                                fill="white" />
                                                            <path
                                                                d="M14.6352 15.6895V22.5668H13.2558V19.6405H10.3098V22.5668H8.93039V15.6895H10.3098V18.5172H13.2558V15.6895H14.6352Z"
                                                                fill="white" />
                                                            <path
                                                                d="M23.0772 17.8177C23.0772 18.1855 22.9885 18.5304 22.8111 18.8522C22.6403 19.1741 22.3677 19.4336 21.9933 19.6306C21.6255 19.8277 21.1591 19.9262 20.5942 19.9262H19.4414V22.5668H18.062V15.6895H20.5942C21.1263 15.6895 21.5795 15.7814 21.9539 15.9653C22.3283 16.1493 22.6075 16.4021 22.7914 16.724C22.9819 17.0459 23.0772 17.4104 23.0772 17.8177ZM20.5351 18.8128C20.9161 18.8128 21.1985 18.7274 21.3825 18.5566C21.5664 18.3793 21.6583 18.133 21.6583 17.8177C21.6583 17.1477 21.2839 16.8127 20.5351 16.8127H19.4414V18.8128H20.5351Z"
                                                                fill="white" />
                                                            <path
                                                                d="M13.3982 0.740234L23.4948 5.2276V15.3242H13.3982V0.740234Z"
                                                                fill="white" />
                                                            <path
                                                                d="M0.49707 12.5204L9.47181 2.42383H13.3983V15.325H0.49707V12.5204Z"
                                                                fill="white" />
                                                            <rect x="2.31299" y="10.8359" width="0.821075"
                                                                height="4.10537" fill="#FFBD41" />
                                                            <rect x="5.5979" y="7.4707" width="0.821075"
                                                                height="7.85289" fill="#FFBD41" />
                                                            <rect width="0.821075" height="11.196"
                                                                transform="matrix(-1 0 0 1 9.70312 4.10547)"
                                                                fill="#FFBD41" />
                                                            <rect x="12.1665" y="2.86328" width="0.821075"
                                                                height="12.3161" fill="#FFBD41" />
                                                            <rect x="15.4509" y="2.04102" width="0.821075"
                                                                height="13.1372" fill="#FFBD41" />
                                                            <rect x="18.7354" y="3.67969" width="0.821075"
                                                                height="11.495" fill="#FFBD41" />
                                                            <rect x="22.0195" y="5.32422" width="0.821075"
                                                                height="9.8529" fill="#FFBD41" />
                                                        </svg>
                                                    </i>
                                                </div>
                                                <div class="col-lg-3 wd-sl-ulli">
                                                    <span class="gry-text">Type</span>
                                                    <span>{{ $value->body_type }}</span>
                                                    <i>
                                                        <svg width="23" height="23" viewBox="0 0 23 23"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M1.78395 17.6127C2.98002 16.4167 4.92611 16.4167 6.12218 17.6127C7.31826 18.8088 7.31826 20.7549 6.12218 21.951C5.62647 22.4467 4.99887 22.7407 4.35131 22.8232L5.42522 20.8802C5.44858 20.7817 5.40405 20.4417 5.28408 20.229C4.74043 19.2658 3.94369 18.8631 2.90093 18.9144C2.46119 18.9361 2.23342 19.1159 2.23342 19.1159L1.16291 21.052C0.647248 19.9224 0.855314 18.5411 1.78395 17.6127ZM16.1495 5.07135C15.8521 5.89072 15.4073 6.5906 14.8588 7.14228L7.044 14.9668C6.49208 15.5153 5.81994 15.928 5.00033 16.2254C5.57853 16.3972 6.10417 16.679 6.55681 17.1316C7.01285 17.5843 7.30414 18.1016 7.47595 18.6767C7.76335 17.9001 8.16537 17.1416 8.72362 16.5831L16.5243 8.78247C17.0825 8.22422 17.8372 7.82537 18.6134 7.53797C18.0384 7.36616 17.5169 7.07779 17.0643 6.62199C16.6116 6.16911 16.3213 5.6498 16.1495 5.07135ZM22.2815 2.284L21.056 4.50021C20.9399 4.51919 20.8238 4.52722 20.7077 4.52722C19.8762 4.52722 19.0989 4.0522 18.7317 3.28272L18.6886 3.19097L19.9168 0.966491C19.0773 0.926094 18.2243 1.22566 17.5846 1.86543C17.1365 2.31344 16.8557 2.86415 16.7423 3.43919C16.5505 4.4109 16.8314 5.4612 17.5846 6.21706C18.3324 6.96488 19.3661 7.24546 20.33 7.06465C20.9185 6.95393 21.4801 6.67334 21.9335 6.21706C23.0023 5.14533 23.1211 3.48251 22.2815 2.284Z"
                                                                fill="white" />
                                                        </svg>
                                                    </i>
                                                </div>
                                                <div class="col-lg-3 wd-sl-ulli">
                                                    <span class="gry-text">Model</span>
                                                    <span>{{ $value->modal }}</span>
                                                    <i>
                                                        <svg width="20" height="24" viewBox="0 0 20 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9.91697 3.63477C9.12028 3.63477 8.40025 3.71356 7.84954 3.8508C7.57419 3.91943 7.34217 3.99955 7.14639 4.11543C6.95063 4.23101 6.73104 4.41838 6.73104 4.72975C6.73104 4.73134 6.73103 4.7328 6.73104 4.73581V6.71571L4.34004 6.7248L2.55107 4.93302L0.161621 7.32203L1.95215 9.11216L1.95375 17.8734H17.8818V9.11188L19.6723 7.32166L17.2829 4.93274L15.4923 6.72287L13.1029 6.71084L13.1045 4.72782H13.1029C13.1013 4.41847 12.8826 4.23184 12.6876 4.11654C12.4918 4.00096 12.2598 3.92092 11.9844 3.852C11.4337 3.71445 10.7137 3.63587 9.91697 3.63587V3.63477ZM9.91697 4.43104C10.6599 4.43104 11.3333 4.50896 11.7915 4.62393C11.9257 4.65764 11.9905 4.69228 12.0793 4.72809C12.0809 4.72867 12.0825 4.72894 12.0841 4.72975C11.9931 4.76647 11.928 4.80137 11.7916 4.83538C11.3334 4.95005 10.66 5.02827 9.91709 5.02827C9.17419 5.02827 8.50079 4.95036 8.04255 4.83538C7.91052 4.80227 7.84606 4.7679 7.75944 4.73269C7.75625 4.7319 7.75306 4.73116 7.75011 4.72975C7.8411 4.69303 7.90621 4.65804 8.04256 4.62402C8.5008 4.50965 9.17419 4.43113 9.91709 4.43113L9.91697 4.43104ZM9.91697 7.51685H12.3064V8.31313H11.5099V15.8783H12.3064V16.6746H9.91697V15.8783H10.7135V8.31313H9.91697V7.51685Z"
                                                                fill="white" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M1.95312 18.8625V20.449H17.8812V18.8594L1.95312 18.8625Z"
                                                                fill="white" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M6.73071 1.14453V1.9409H13.1026V1.14453H6.73071Z"
                                                                fill="white" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M6.33252 0.347656V2.73657H7.129V0.347656H6.33252Z"
                                                                fill="white" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M12.7043 0.347656V2.73657H13.5008V0.347656H12.7043Z"
                                                                fill="white" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M8.72217 21.0508V23.4398H11.1116V21.0508"
                                                                fill="white" />
                                                        </svg>

                                                    </i>
                                                </div>
                                                <div class="col-lg-3 wd-sl-ulli">
                                                    <span class="gry-text">YEAR</span>
                                                    <span>{{ $value->manufacture }}</span>
                                                    <i>
                                                        <svg width="21" height="21" viewBox="0 0 21 21"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M20.302 19.0388C20.4987 18.9674 20.6633 18.8279 20.7659 18.6456C20.8685 18.4633 20.9025 18.2503 20.8615 18.0451L18.3663 2.85601C18.3435 2.66564 18.2538 2.48956 18.1132 2.35921C17.9726 2.22885 17.7903 2.15269 17.5987 2.14433H14.9246C14.9594 1.55152 15.3114 1.06786 15.7279 1.06786C15.8229 1.07198 15.9159 1.09626 16.0008 1.1391C16.0857 1.18193 16.1605 1.24233 16.2202 1.3163H17.0079C16.9053 1.05632 16.7301 0.831359 16.5031 0.668261C16.2761 0.505163 16.007 0.410818 15.7279 0.396484C14.9111 0.396484 14.2464 1.22229 14.2464 2.23833C14.2464 3.12656 14.7544 3.87103 15.4279 4.04429C15.5148 4.06776 15.5913 4.1194 15.6456 4.19112C15.6999 4.26283 15.7289 4.35055 15.7279 4.4405C15.7274 4.55073 15.6833 4.65629 15.6054 4.73424C15.5274 4.81219 15.4219 4.85622 15.3116 4.85676C15.2746 4.85594 15.2378 4.85068 15.202 4.8411C14.1815 4.56583 13.4184 3.50278 13.4184 2.23833C13.4177 2.20694 13.4192 2.17553 13.4229 2.14434H11.6439C11.6785 1.55152 12.0285 1.06786 12.445 1.06786C12.5397 1.07177 12.6325 1.09597 12.717 1.13883C12.8016 1.18169 12.8759 1.24221 12.9351 1.3163H13.725C13.6224 1.05632 13.4472 0.831351 13.2202 0.668253C12.9932 0.505154 12.7241 0.410811 12.445 0.396484C11.6304 0.396484 10.9658 1.22229 10.9658 2.23833C10.9658 3.1261 11.4732 3.87018 12.1447 4.04396C12.2316 4.06748 12.3082 4.11918 12.3626 4.19094C12.4169 4.26271 12.4459 4.35048 12.445 4.4405C12.4444 4.55073 12.4004 4.65629 12.3225 4.73424C12.2445 4.81219 12.139 4.85622 12.0287 4.85676C11.9917 4.85595 11.9549 4.85069 11.9191 4.8411C10.9009 4.56359 10.1378 3.50278 10.1378 2.23833C10.137 2.20694 10.1385 2.17553 10.1422 2.14434H8.36098C8.39585 1.55152 8.74782 1.06786 9.16429 1.06786C9.25901 1.07176 9.35178 1.09596 9.43632 1.13882C9.52087 1.18169 9.59523 1.24221 9.65436 1.3163H10.4421C10.3399 1.05644 10.1651 0.831505 9.93852 0.668386C9.71192 0.505268 9.44313 0.410871 9.16429 0.396484C8.3475 0.396484 7.68284 1.22229 7.68284 2.23833C7.68284 3.12656 8.19083 3.87099 8.86432 4.04427C8.95116 4.06775 9.02773 4.1194 9.08203 4.19111C9.13632 4.26283 9.16526 4.35055 9.16429 4.4405C9.16376 4.55073 9.11973 4.65629 9.04179 4.73424C8.96385 4.81219 8.85828 4.85622 8.74805 4.85676C8.71101 4.85594 8.6742 4.85068 8.63841 4.8411C7.61797 4.56583 6.85486 3.50278 6.85486 2.23833C6.85412 2.20694 6.85561 2.17553 6.85931 2.14434H5.07807C5.11294 1.55152 5.46494 1.06786 5.8814 1.06786C5.97638 1.07198 6.06941 1.09626 6.15429 1.13909C6.23918 1.18193 6.31397 1.24233 6.37371 1.3163H7.16144C7.05883 1.05632 6.88358 0.831357 6.65661 0.66826C6.42963 0.505162 6.16052 0.410817 5.8814 0.396484C5.06459 0.396484 4.39992 1.22229 4.39992 2.23833C4.39992 3.12655 4.90791 3.87099 5.58141 4.04427C5.66825 4.06774 5.74483 4.11939 5.79913 4.19111C5.85343 4.26283 5.88236 4.35055 5.8814 4.4405C5.88086 4.55073 5.83683 4.65629 5.75888 4.73424C5.68094 4.81219 5.57537 4.85622 5.46514 4.85676C5.42809 4.85594 5.39128 4.85068 5.35548 4.8411C4.38651 4.57926 3.64804 3.60797 3.57865 2.42633C3.47896 2.54657 3.4126 2.69088 3.38619 2.84482L0.74779 17.9153C0.723037 18.0282 0.721234 18.1448 0.742486 18.2584C0.763738 18.3719 0.807612 18.48 0.871497 18.5763C0.935383 18.6726 1.01798 18.755 1.11436 18.8187C1.21075 18.8823 1.31896 18.926 1.43255 18.947L14.8909 20.5248C15.1769 20.5575 15.4666 20.5301 15.7413 20.4442L20.302 19.0388ZM14.5351 19.0119C14.5263 19.0953 14.4855 19.1721 14.4212 19.226C14.3569 19.2798 14.2741 19.3066 14.1905 19.3006L2.1442 17.8862C2.09816 17.8776 2.05431 17.8599 2.01526 17.834C1.97621 17.8082 1.94275 17.7747 1.91687 17.7357C1.89099 17.6967 1.87321 17.6528 1.8646 17.6068C1.85598 17.5608 1.8567 17.5135 1.86671 17.4677L3.53839 7.91159C3.54908 7.83384 3.5872 7.76247 3.64587 7.71035C3.70455 7.65823 3.77992 7.6288 3.85839 7.62736L15.9159 7.97872C15.9643 7.98357 16.0113 7.99853 16.0536 8.02264C16.0959 8.04676 16.1328 8.07949 16.1616 8.11872C16.1905 8.15795 16.2109 8.20281 16.2214 8.2504C16.2318 8.29799 16.2322 8.34724 16.2224 8.39498L14.5351 19.0119ZM15.7324 17.9959L17.3973 18.1906L18.7176 18.345L15.522 19.3208L15.7324 17.9959Z"
                                                                fill="white" />
                                                            <path
                                                                d="M9.10693 17.2584L10.6292 17.4171L10.8935 15.7599L9.37123 15.6191L9.10693 17.2584Z"
                                                                fill="white" />
                                                            <path
                                                                d="M13.2063 10.8687L14.7297 10.9531L14.994 9.25564L13.4706 9.19141L13.2063 10.8687Z"
                                                                fill="white" />
                                                            <path
                                                                d="M10.1604 10.7037L11.6826 10.7861L11.9469 9.1289L10.4247 9.06445L10.1604 10.7037Z"
                                                                fill="white" />
                                                            <path
                                                                d="M7.11353 10.5366L8.63688 10.6189L8.90006 8.99978L7.37782 8.93555L7.11353 10.5366Z"
                                                                fill="white" />
                                                            <path
                                                                d="M12.6799 14.2222L14.2033 14.3449L14.4665 12.6474L12.9431 12.5449L12.6799 14.2222Z"
                                                                fill="white" />
                                                            <path
                                                                d="M9.63428 13.9791L11.1565 14.0995L11.4197 12.4423L9.89746 12.3398L9.63428 13.9791Z"
                                                                fill="white" />
                                                            <path
                                                                d="M6.58716 13.7377L8.10939 13.8581L8.37257 12.2392L6.85034 12.1367L6.58716 13.7377Z"
                                                                fill="white" />
                                                            <path
                                                                d="M3.54028 13.4965L5.06386 13.6189L5.32682 12.038L3.80346 11.9355L3.54028 13.4965Z"
                                                                fill="white" />
                                                            <path
                                                                d="M6.05957 16.9389L7.58181 17.0976L7.84633 15.4784L6.32387 15.3379L6.05957 16.9389Z"
                                                                fill="white" />
                                                            <path
                                                                d="M3.01318 16.6193L4.53676 16.7802L4.80106 15.1991L3.27748 15.0586L3.01318 16.6193Z"
                                                                fill="white" />
                                                        </svg>

                                                    </i>
                                                </div>

                                                <div class="col-lg-3 wd-sl-ulli">
                                                    <span class="gry-text">Doors</span>
                                                    <span>{{ $value->doors }}</span>
                                                    <i>
                                                        <svg width="21" height="21" viewBox="0 0 21 21"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10.8408 7.01652C12.6397 7.01652 14.0981 5.55818 14.0981 3.75923C14.0981 1.96029 12.6397 0.501953 10.8408 0.501953C9.04183 0.501953 7.5835 1.96029 7.5835 3.75923C7.5835 5.55818 9.04183 7.01652 10.8408 7.01652Z"
                                                                fill="white" />
                                                            <path
                                                                d="M10.4639 20.4287V16.5192L6.22265 12.278C6.1435 12.1969 6.0483 12.1332 5.94313 12.091C5.83797 12.0488 5.72515 12.029 5.61191 12.0329C5.49876 12.0349 5.38721 12.06 5.28412 12.1066C5.18103 12.1533 5.08859 12.2206 5.01248 12.3044L4.09636 13.1526L7.48937 16.9226C7.55786 16.9976 7.59375 17.0967 7.58916 17.1982C7.58456 17.2996 7.53985 17.3951 7.46486 17.4636C7.38987 17.5321 7.29075 17.568 7.18929 17.5634C7.08783 17.5588 6.99236 17.5141 6.92387 17.4391L3.30089 13.3863C3.26968 13.351 3.24538 13.31 3.22926 13.2657C3.22785 13.2469 3.22785 13.228 3.22926 13.2092C3.22675 13.1841 3.22675 13.1588 3.22926 13.1338V5.86142C3.23856 5.69304 3.21342 5.52453 3.15538 5.36619C3.09734 5.20785 3.00762 5.06302 2.89171 4.94053C2.7758 4.81804 2.63612 4.72048 2.48122 4.6538C2.32633 4.58712 2.15946 4.55273 1.99082 4.55273C1.82218 4.55273 1.65531 4.58712 1.50041 4.6538C1.34552 4.72048 1.20584 4.81804 1.08993 4.94053C0.974016 5.06302 0.884298 5.20785 0.826259 5.36619C0.768221 5.52453 0.74308 5.69304 0.752373 5.86142V15.0037L5.06149 19.7426C5.12521 19.8127 5.1602 19.9042 5.15951 19.9989V20.4287H10.4639Z"
                                                                fill="white" />
                                                            <path
                                                                d="M17.5818 13.1564L16.6883 12.3307C16.6111 12.2405 16.5159 12.1674 16.4087 12.1161C16.3016 12.0648 16.185 12.0365 16.0662 12.0329C15.9531 12.0295 15.8404 12.0495 15.7353 12.0916C15.6302 12.1338 15.5349 12.1972 15.4555 12.278L11.218 16.5192V20.4287H16.5224V19.9989C16.5217 19.9042 16.5567 19.8127 16.6204 19.7426L20.9672 15.0037V5.86142C20.9765 5.69304 20.9514 5.52453 20.8934 5.36619C20.8353 5.20785 20.7456 5.06302 20.6297 4.94053C20.5138 4.81804 20.3741 4.72048 20.2192 4.6538C20.0643 4.58712 19.8974 4.55273 19.7288 4.55273C19.5602 4.55273 19.3933 4.58712 19.2384 4.6538C19.0835 4.72048 18.9438 4.81804 18.8279 4.94053C18.712 5.06302 18.6223 5.20785 18.5642 5.36619C18.5062 5.52453 18.4811 5.69304 18.4904 5.86142V13.13C18.4929 13.1551 18.4929 13.1803 18.4904 13.2054C18.4918 13.2242 18.4918 13.2431 18.4904 13.2619C18.4742 13.3063 18.4499 13.3472 18.4187 13.3826L14.758 17.4391C14.6911 17.5136 14.5972 17.5584 14.4972 17.5637C14.3971 17.569 14.2991 17.5344 14.2246 17.4674C14.1501 17.4004 14.1053 17.3065 14.1 17.2065C14.0947 17.1065 14.1293 17.0084 14.1963 16.9339L17.5818 13.1564Z"
                                                                fill="white" />
                                                            <path
                                                                d="M14.9275 11.744C15.0384 11.6325 15.1655 11.5385 15.3045 11.465C15.3034 11.4487 15.3034 11.4323 15.3045 11.416V9.90049C15.3045 9.57153 15.1739 9.25605 14.9412 9.02344C14.7086 8.79083 14.3932 8.66016 14.0642 8.66016H7.60996C7.281 8.66016 6.96552 8.79083 6.73291 9.02344C6.50031 9.25605 6.36963 9.57153 6.36963 9.90049V11.4726C6.50825 11.5435 6.63535 11.6351 6.74663 11.744L10.8409 15.8307L14.9275 11.744Z"
                                                                fill="white" />
                                                        </svg>

                                                    </i>
                                                </div>

                                                <div class="col-lg-3 wd-sl-ulli">
                                                    <span class="gry-text">CO<sub>2</sub> Emission</span>
                                                    <span>not available</span>
                                                    <i>
                                                        <svg width="21" height="21" viewBox="0 0 21 21"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10.8408 7.01652C12.6397 7.01652 14.0981 5.55818 14.0981 3.75923C14.0981 1.96029 12.6397 0.501953 10.8408 0.501953C9.04183 0.501953 7.5835 1.96029 7.5835 3.75923C7.5835 5.55818 9.04183 7.01652 10.8408 7.01652Z"
                                                                fill="white" />
                                                            <path
                                                                d="M10.4639 20.4287V16.5192L6.22265 12.278C6.1435 12.1969 6.0483 12.1332 5.94313 12.091C5.83797 12.0488 5.72515 12.029 5.61191 12.0329C5.49876 12.0349 5.38721 12.06 5.28412 12.1066C5.18103 12.1533 5.08859 12.2206 5.01248 12.3044L4.09636 13.1526L7.48937 16.9226C7.55786 16.9976 7.59375 17.0967 7.58916 17.1982C7.58456 17.2996 7.53985 17.3951 7.46486 17.4636C7.38987 17.5321 7.29075 17.568 7.18929 17.5634C7.08783 17.5588 6.99236 17.5141 6.92387 17.4391L3.30089 13.3863C3.26968 13.351 3.24538 13.31 3.22926 13.2657C3.22785 13.2469 3.22785 13.228 3.22926 13.2092C3.22675 13.1841 3.22675 13.1588 3.22926 13.1338V5.86142C3.23856 5.69304 3.21342 5.52453 3.15538 5.36619C3.09734 5.20785 3.00762 5.06302 2.89171 4.94053C2.7758 4.81804 2.63612 4.72048 2.48122 4.6538C2.32633 4.58712 2.15946 4.55273 1.99082 4.55273C1.82218 4.55273 1.65531 4.58712 1.50041 4.6538C1.34552 4.72048 1.20584 4.81804 1.08993 4.94053C0.974016 5.06302 0.884298 5.20785 0.826259 5.36619C0.768221 5.52453 0.74308 5.69304 0.752373 5.86142V15.0037L5.06149 19.7426C5.12521 19.8127 5.1602 19.9042 5.15951 19.9989V20.4287H10.4639Z"
                                                                fill="white" />
                                                            <path
                                                                d="M17.5818 13.1564L16.6883 12.3307C16.6111 12.2405 16.5159 12.1674 16.4087 12.1161C16.3016 12.0648 16.185 12.0365 16.0662 12.0329C15.9531 12.0295 15.8404 12.0495 15.7353 12.0916C15.6302 12.1338 15.5349 12.1972 15.4555 12.278L11.218 16.5192V20.4287H16.5224V19.9989C16.5217 19.9042 16.5567 19.8127 16.6204 19.7426L20.9672 15.0037V5.86142C20.9765 5.69304 20.9514 5.52453 20.8934 5.36619C20.8353 5.20785 20.7456 5.06302 20.6297 4.94053C20.5138 4.81804 20.3741 4.72048 20.2192 4.6538C20.0643 4.58712 19.8974 4.55273 19.7288 4.55273C19.5602 4.55273 19.3933 4.58712 19.2384 4.6538C19.0835 4.72048 18.9438 4.81804 18.8279 4.94053C18.712 5.06302 18.6223 5.20785 18.5642 5.36619C18.5062 5.52453 18.4811 5.69304 18.4904 5.86142V13.13C18.4929 13.1551 18.4929 13.1803 18.4904 13.2054C18.4918 13.2242 18.4918 13.2431 18.4904 13.2619C18.4742 13.3063 18.4499 13.3472 18.4187 13.3826L14.758 17.4391C14.6911 17.5136 14.5972 17.5584 14.4972 17.5637C14.3971 17.569 14.2991 17.5344 14.2246 17.4674C14.1501 17.4004 14.1053 17.3065 14.1 17.2065C14.0947 17.1065 14.1293 17.0084 14.1963 16.9339L17.5818 13.1564Z"
                                                                fill="white" />
                                                            <path
                                                                d="M14.9275 11.744C15.0384 11.6325 15.1655 11.5385 15.3045 11.465C15.3034 11.4487 15.3034 11.4323 15.3045 11.416V9.90049C15.3045 9.57153 15.1739 9.25605 14.9412 9.02344C14.7086 8.79083 14.3932 8.66016 14.0642 8.66016H7.60996C7.281 8.66016 6.96552 8.79083 6.73291 9.02344C6.50031 9.25605 6.36963 9.57153 6.36963 9.90049V11.4726C6.50825 11.5435 6.63535 11.6351 6.74663 11.744L10.8409 15.8307L14.9275 11.744Z"
                                                                fill="white" />
                                                        </svg>

                                                    </i>
                                                </div>

                                                <div class="col-lg-3 wd-sl-ulli">
                                                    <span class="gry-text">Make</span>
                                                    <span>{{ $value->make }}</span>
                                                    <i>
                                                        <svg width="21" height="21" viewBox="0 0 21 21"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10.8408 7.01652C12.6397 7.01652 14.0981 5.55818 14.0981 3.75923C14.0981 1.96029 12.6397 0.501953 10.8408 0.501953C9.04183 0.501953 7.5835 1.96029 7.5835 3.75923C7.5835 5.55818 9.04183 7.01652 10.8408 7.01652Z"
                                                                fill="white" />
                                                            <path
                                                                d="M10.4639 20.4287V16.5192L6.22265 12.278C6.1435 12.1969 6.0483 12.1332 5.94313 12.091C5.83797 12.0488 5.72515 12.029 5.61191 12.0329C5.49876 12.0349 5.38721 12.06 5.28412 12.1066C5.18103 12.1533 5.08859 12.2206 5.01248 12.3044L4.09636 13.1526L7.48937 16.9226C7.55786 16.9976 7.59375 17.0967 7.58916 17.1982C7.58456 17.2996 7.53985 17.3951 7.46486 17.4636C7.38987 17.5321 7.29075 17.568 7.18929 17.5634C7.08783 17.5588 6.99236 17.5141 6.92387 17.4391L3.30089 13.3863C3.26968 13.351 3.24538 13.31 3.22926 13.2657C3.22785 13.2469 3.22785 13.228 3.22926 13.2092C3.22675 13.1841 3.22675 13.1588 3.22926 13.1338V5.86142C3.23856 5.69304 3.21342 5.52453 3.15538 5.36619C3.09734 5.20785 3.00762 5.06302 2.89171 4.94053C2.7758 4.81804 2.63612 4.72048 2.48122 4.6538C2.32633 4.58712 2.15946 4.55273 1.99082 4.55273C1.82218 4.55273 1.65531 4.58712 1.50041 4.6538C1.34552 4.72048 1.20584 4.81804 1.08993 4.94053C0.974016 5.06302 0.884298 5.20785 0.826259 5.36619C0.768221 5.52453 0.74308 5.69304 0.752373 5.86142V15.0037L5.06149 19.7426C5.12521 19.8127 5.1602 19.9042 5.15951 19.9989V20.4287H10.4639Z"
                                                                fill="white" />
                                                            <path
                                                                d="M17.5818 13.1564L16.6883 12.3307C16.6111 12.2405 16.5159 12.1674 16.4087 12.1161C16.3016 12.0648 16.185 12.0365 16.0662 12.0329C15.9531 12.0295 15.8404 12.0495 15.7353 12.0916C15.6302 12.1338 15.5349 12.1972 15.4555 12.278L11.218 16.5192V20.4287H16.5224V19.9989C16.5217 19.9042 16.5567 19.8127 16.6204 19.7426L20.9672 15.0037V5.86142C20.9765 5.69304 20.9514 5.52453 20.8934 5.36619C20.8353 5.20785 20.7456 5.06302 20.6297 4.94053C20.5138 4.81804 20.3741 4.72048 20.2192 4.6538C20.0643 4.58712 19.8974 4.55273 19.7288 4.55273C19.5602 4.55273 19.3933 4.58712 19.2384 4.6538C19.0835 4.72048 18.9438 4.81804 18.8279 4.94053C18.712 5.06302 18.6223 5.20785 18.5642 5.36619C18.5062 5.52453 18.4811 5.69304 18.4904 5.86142V13.13C18.4929 13.1551 18.4929 13.1803 18.4904 13.2054C18.4918 13.2242 18.4918 13.2431 18.4904 13.2619C18.4742 13.3063 18.4499 13.3472 18.4187 13.3826L14.758 17.4391C14.6911 17.5136 14.5972 17.5584 14.4972 17.5637C14.3971 17.569 14.2991 17.5344 14.2246 17.4674C14.1501 17.4004 14.1053 17.3065 14.1 17.2065C14.0947 17.1065 14.1293 17.0084 14.1963 16.9339L17.5818 13.1564Z"
                                                                fill="white" />
                                                            <path
                                                                d="M14.9275 11.744C15.0384 11.6325 15.1655 11.5385 15.3045 11.465C15.3034 11.4487 15.3034 11.4323 15.3045 11.416V9.90049C15.3045 9.57153 15.1739 9.25605 14.9412 9.02344C14.7086 8.79083 14.3932 8.66016 14.0642 8.66016H7.60996C7.281 8.66016 6.96552 8.79083 6.73291 9.02344C6.50031 9.25605 6.36963 9.57153 6.36963 9.90049V11.4726C6.50825 11.5435 6.63535 11.6351 6.74663 11.744L10.8409 15.8307L14.9275 11.744Z"
                                                                fill="white" />
                                                        </svg>

                                                    </i>
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
