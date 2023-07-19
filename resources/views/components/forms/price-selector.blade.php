@if ($page == 'home')
    <div class="{{ $parentClass }}">
        <div class="d-flex flex-row">
            <select id="min_price-select" name="min_price" class="form-control mr-2">
                <option value="">Min Price</option>
                @for ($i = 2000; $i < $maxPrice - 500; $i += 500)
                    <option value="{{ $i }}" {{ request()->min_price == $i ? 'selected' : '' }}>
                        £{{ number_format($i) }}</option>
                @endfor
            </select>
            <select id="max_price-select" name="max_price" class="form-control">
                <option value="">Max Price</option>
                @for ($i = 2500; $i <= $maxPrice; $i += 500)
                    <option value="{{ $i }}" {{ request()->max_price == $i ? 'selected' : '' }}>
                        £{{ number_format($i) }}</option>
                @endfor
            </select>
        </div>
    </div>
@elseif($page == 'stock-list')
    <div class="{{ $parentClass }}">
        @if ($hasLabel)
            <label>Price</label>
        @endif
        <div class="d-flex flex-row">
            <select class="form-control mr-2" id="min_price-select" name="min_price">
                <option value="">Min Price</option>
                @for ($i = 2000; $i < $maxPrice - 500; $i += 500)
                    <option value="{{ $i }}" {{ request()->min_price == $i ? 'selected' : '' }}>
                        £{{ number_format($i) }}</option>
                @endfor
            </select>
            <select class="form-control" id="max_price-select" name="max_price">
                <option value="">Max Price</option>
                @for ($i = 2500; $i <= $maxPrice; $i += 500)
                    <option value="{{ $i }}" {{ request()->max_price == $i ? 'selected' : '' }}>
                        £{{ number_format($i) }}</option>
                @endfor
            </select>
        </div>
    </div>
@else
@endif
