<div class="pro-details">
    <div class="pro-dt-row">
        <p>{{$vehicleStock->registration_number}}</p> <strong>{{place_currency($vehicleStock->price)}}</strong></div>
    @if(!empty($vehicleStock->additional_price))
        @foreach($vehicleStock->additional_price as $key=>$value)
            <div class="pro-dt-row">
                <p>{{$value->description}}</p> <strong>{{place_currency($value->price)}}
                </strong><a href="javascript:;" onclick="delete_additional_price('{{$value->id}}',this)"> <i
                        class="fa fa-trash-alt"></i></a></div>
        @endforeach
    @endif
</div>
<script>
    function delete_additional_price(id, that) {
        $("#viewStock").addClass('overlap_class_dev');
        bootbox.confirm('{{__('Are you sure you want to delete?')}}', function (result) {
            if (result) {
                $.ajax({
                    type: 'get',
                    data: {'id': id},
                    url: "{{route('front.vehicle_stock.delete_additional_price')}}",
                    beforeSend: addOverlay,
                    success: function (r) {
                        removeOverlay();
                        $("#viewStock").removeClass('overlap_class_dev');
                        if (r.status == 200) {
                            toastr['success'](r.message, "success");
                            $(that).parent().remove();
                            dataTable.draw();
                        } else {
                            toastr['error'](r.message, "error");
                        }

                    }
                })
            } else {
                $("#viewStock").removeClass('overlap_class_dev');
            }
        });
    }
</script>
