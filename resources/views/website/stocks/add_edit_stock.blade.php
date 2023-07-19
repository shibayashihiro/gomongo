<form action="javascript:;" id="frmStock" name="frmStock">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Title" value="{{(isset($stock->title))?$stock->title:''}}">
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name="image" placeholder="Image">
        </div>
        <div class="form-row action">
            <input type="hidden" name="id" value="{{(isset($stock->id)?$stock->id:0)}}">
            <button class="add-stock-btn" id="btnSave">Save</button>
        </div>
    </div>
</form>
<script>
    $("#frmStock").validate({
        rules: {
            title: {required: true},
        },
        messages: {
            title: {required: "{{__('Please enter title')}}"},
        }
    });
    $("#btnSave").click(function () {
        if ($("#frmStock").valid()) {
            var data = new FormData($('#frmStock')[0]);
            $("#btnSave").attr('disabled', true);
            $.ajax({
                type: 'post',
                data: data,
                dataType: "json",
                url: "{{route('front.website.recent_stock.create')}}",
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: addOverlay,
                success: function (r) {
                    removeOverlay();
                    $("#btnSave").attr('disabled', false);
                    if (r.status == 200) {
                        toastr['success'](r.message, "success");
                        dataTable.draw();
                        $("#addStock").modal('hide');
                    } else {
                        toastr['error'](r.message, "error");
                    }
                }
            });
        }
    });
</script>
