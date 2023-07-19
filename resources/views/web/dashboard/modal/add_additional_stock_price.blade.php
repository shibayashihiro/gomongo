<form id="frmAdditionalStockPrice" name="frmAdditionalStockPrice" action="javascript:;">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group input-group">
            <div class="input-group-prepend wd-prepend">
                <span class="input-group-text">£</span>
            </div>
            <input type="number" class="form-control wd-cuv" placeholder="{{__('Additional Cost')}}"
                   id="extra_additional_price" name="extra_additional_price">
        </div>
        <div class="form-group">
            <input type="text" placeholder="{{__('Description of Additional cost')}}" id="extra_additional_description"
                   name="extra_additional_description" class="form-control">
        </div>
        <div class="form-group action">
            <input class="form-control" type="hidden" name="id" value="{{($stock_id)}}">
            <button class="add-stock-btn" id="btnAddAdditionalStockPrice">Save</button>
        </div>
    </div>
</form>
<script>
    $("#frmAdditionalStockPrice").validate({
        rules: {
            extra_additional_price: {required: true},
        },
        messages: {
            extra_additional_price: {required: "{{__('Please Enter Additional Price')}}"}
        }
    });
    $("#btnAddAdditionalStockPrice").click(function () {
        if ($("#frmAdditionalStockPrice").valid()) {
            var data = new FormData($('#frmAdditionalStockPrice')[0]);
            $("#btnAddAdditionalStockPrice").attr('disabled', true);
            $.ajax({
                type: 'post',
                data: data,
                dataType: "json",
                url: "{{route('front.vehicle_stock.save_additional_stock_price')}}",
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: addOverlay,
                success: function (r) {
                    removeOverlay();
                    $("#btnAddAdditionalStockPrice").attr('disabled', false);
                    if (r.status == 200) {
                        toastr['success'](r.message, "success");
                        dataTable.draw();
                        $("#addAdditionalStockPrice").modal('hide');
                    } else {
                        toastr['error'](r.message, "error");
                    }
                }
            });
        }
    });
</script>
