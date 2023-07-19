<div class="pro-details">
    <div class="pro-dt-row">
        <p>Date</p> <strong>{{get_date_format($salesRecord->date,'F d, Y')}}</strong></div>
    <div class="pro-dt-row">
        <p>Vehicle Registration Number</p> <strong>{{$salesRecord->registration_number}}</strong></div>
    <div class="pro-dt-row">
        <p>Type</p> <strong>{{ucfirst($salesRecord->type)}}</strong></div>
    <div class="pro-dt-row">
        <p>Cost Price</p> <strong>{{place_currency($salesRecord->cost_price)}}</strong></div>
    <div class="pro-dt-row">
        <p>Sale Price</p> <strong>{{place_currency($salesRecord->sales_price)}}</strong></div>
    <div class="pro-dt-row">
        <p>Payment Type</p> <strong>{{$salesRecord->payment_type}}</strong></div>
    @if(!empty($salesRecord->vehicle_stock($salesRecord->registration_number)))
        @foreach($salesRecord->vehicle_stock($salesRecord->registration_number)->additional_price as $additional)
            <div class="pro-dt-row">
                <p>{{$additional->description}}</p> <strong>{{$additional->price}}</strong></div>
        @endforeach
    @endif
    <div class="pro-dt-row">
        <p>Status</p> <strong>{{ucfirst($salesRecord->status)}}</strong></div>
</div>
