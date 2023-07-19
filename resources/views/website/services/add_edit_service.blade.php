<form action="javascript:;" id="frmService" name="frmService">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Title" value="{{(isset($service->title))?$service->title:''}}">
        </div>
        <div class="form-group">
            <textarea class="form-control" rows="5" id="comment" name="description" placeholder="Description">{{(isset($service->description))?$service->description:''}}</textarea>
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name="image" placeholder="Image">
        </div>
        <div class="form-row action">
            <input type="hidden" name="id" value="{{(isset($service->id)?$service->id:0)}}">
            <button class="add-stock-btn" id="btnSave">Save</button>
        </div>
    </div>
</form>
<script>
    $("#frmService").validate({
        rules: {
            title: {required: true},
            description: {required: true},
        },
        messages: {
            title: {required: "{{__('Please enter title')}}"},
            description: {required: "{{__('Please enter description')}}"},
        }
    });
    $("#btnSave").click(function () {
        if ($("#frmService").valid()) {
            var data = new FormData($('#frmService')[0]);
            $("#btnSave").attr('disabled', true);
            $.ajax({
                type: 'post',
                data: data,
                dataType: "json",
                url: "{{route('front.website.services.create')}}",
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
                        $("#addService").modal('hide');
                    } else {
                        toastr['error'](r.message, "error");
                    }
                }
            });
        }
    });
</script>
