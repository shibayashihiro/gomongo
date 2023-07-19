<form id="frmAddStock" name="frmAddStock" action="javascript:;">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <input class="form-control" type="text" placeholder="{{__('Vehicle Registration Number')}}"
                   id="registration_number" name="registration_number"
                   value="{{(isset($vehicleStock->registration_number))?$vehicleStock->registration_number:''}}">
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend wd-prepend">
                <span class="input-group-text">£</span>
            </div>
            <input type="number" class="form-control wd-cuv" placeholder="{{__('Cost Price')}}" id="price" name="price"
                   value="{{(isset($vehicleStock->price))?$vehicleStock->price:''}}">
        </div>
        @if(is_null($vehicleStock))
            <div class="form-group input-group">
                <div class="input-group-prepend wd-prepend">
                    <span class="input-group-text">£</span>
                </div>
                <input type="number" class="form-control wd-cuv" placeholder="{{__('Additional Cost')}}"
                       id="additional_price"
                       name="additional_price">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="{{__('Description of Additional cost')}}"
                       id="additional_description" name="additional_description">
            </div>
        @endif
        <div class="form-group action">
            <input class="form-control" type="hidden" name="id" value="{{(isset($vehicleStock->id)?$vehicleStock->id:0)}}">
            <button class="add-stock-btn" id="btnAddStock">Save</button>
        </div>
    </div>
</form>
<script>
    $("#frmAddStock").validate({
        rules: {
            registration_number: {required: true},
            price: {required: true, number: true},
        },
        messages: {
            registration_number: {required: "{{__('Please Enter Vehicle Register Number')}}"},
            price: {required: "{{__('Please enter cost price')}}", number: "{{__('Please enter valid price')}}"},
        }
    });
    $("#btnAddStock").click(function () {
        if ($("#frmAddStock").valid()) {
            var data = new FormData($('#frmAddStock')[0]);
            $("#btnAddStock").attr('disabled', true);
            $.ajax({
                type: 'post',
                data: data,
                dataType: "json",
                url: "{{route('front.vehicle_stock.create')}}",
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: addOverlay,
                success: function (r) {
                    removeOverlay();
                    $("#btnAddStock").attr('disabled', false);
                    if (r.status == 200) {
                        toastr['success'](r.message, "success");
                        dataTable.draw();
                        $("#addstock").modal('hide');
                    } else {
                        toastr['error'](r.message, "error");
                    }
                }
            });
        }
    });
</script>
