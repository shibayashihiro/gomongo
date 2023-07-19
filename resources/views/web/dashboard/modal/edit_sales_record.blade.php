<form id="frmSalesRecord" name="frmSalesRecord" action="javascript:;">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="{{__('Vehicle Registration Number')}}"
                   id="registration_number"
                   name="registration_number" value="{{$salesRecord->registration_number}}">
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend wd-prepend">
                <span class="input-group-text">£</span>
            </div>
            <input type="number" class="form-control wd-cuv" placeholder="{{__('Cost Price')}}"
                   id="cost_price"
                   name="cost_price" value="{{$salesRecord->cost_price}}">
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend wd-prepend">
                <span class="input-group-text">£</span>
            </div>
            <input type="number" class="form-control wd-cuv" placeholder="{{__('Sale Price')}}"
                   id="sale_price"
                   name="sale_price" value="{{$salesRecord->sales_price}}">
        </div>
        <div class="form-row action btn-justify-center-dev">
            <input type="hidden" name="id" value="{{$salesRecord->id}}">
            <button class="add-stock-btn" id="btnSaveSaleRecord">Save</button>
        </div>
    </div>
</form>
<script>
    $("#frmSalesRecord").validate({
        rules: {
            cost_price: {required: true, number: true},
            sale_price: {required: true, number: true},
        },
        messages: {
            cost_price: {required: "{{__('Please enter cost price')}}", number: "{{__('Please enter valid price')}}"},
            sale_price: {required: "{{__('Please enter sale price')}}", number: "{{__('Please enter valid price')}}"},
        }
    });
    $("#btnSaveSaleRecord").click(function () {
        if ($("#frmSalesRecord").valid()) {
            var data = new FormData($('#frmSalesRecord')[0]);
            $("#btnSaveSaleRecord").attr('disabled', true);
            $.ajax({
                type: 'post',
                data: data,
                dataType: "json",
                url: "{{route('front.sales_record.update_sales')}}",
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: addOverlay,
                success: function (r) {
                    removeOverlay();
                    $("#btnSaveSaleRecord").attr('disabled', false);
                    if (r.status == 200) {
                        toastr['success'](r.message, "success");
                        dataTable.draw();
                        $("#editSalesRecord").modal('hide');
                    } else {
                        toastr['error'](r.message, "error");
                    }
                }
            });
        }
    });
</script>
