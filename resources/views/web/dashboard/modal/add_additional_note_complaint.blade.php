@if($type == 'mark_as_complaint')
<form id="frmAddAdditionalNote" name="frmAddAdditionalNote" action="javascript:;">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <textarea class="form-control" placeholder="{{__('Additional Note')}}" id="additional_note" name="additional_note">{{(isset($complaintManagement->additional_note))?$complaintManagement->additional_note:''}}</textarea>
        </div>
        <div class="form-group action">
            <input class="form-control" type="hidden" name="id" value="{{($complaint_id)}}">
            <button class="add-stock-btn" id="btnAddAdditionalNote">Save</button>
        </div>
    </div>
</form>
@endif
@if($type == 'add_note')
<form id="frmAddAdditionalNote" name="frmAddAdditionalNote" action="javascript:;">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <textarea class="form-control" placeholder="{{__('Additional Note')}}" id="additional_note" name="additional_note">{{(isset($complaintManagement->additional_note))?$complaintManagement->additional_note:''}}</textarea>
        </div>
        <div class="form-group action">
            <input class="form-control" type="hidden" name="id" value="{{($complaint_id)}}">
            <input class="form-control" type="hidden" name="type" value="{{($type)}}">
            <button class="add-stock-btn" id="btnAddAdditionalNote">Save</button>
        </div>
    </div>
</form>
<script>
    $("#frmAddAdditionalNote").validate({
        rules: {
            additional_note: {required: true},
        },
        messages: {
            additional_note: {required: "{{__('Please Enter Additional Note')}}"}
        }
    });
</script>
@endif
<script>
    $("#btnAddAdditionalNote").click(function () {
        if ($("#frmAddAdditionalNote").valid()) {
            var data = new FormData($('#frmAddAdditionalNote')[0]);
            $("#btnAddAdditionalNote").attr('disabled', true);
            $.ajax({
                type: 'post',
                data: data,
                dataType: "json",
                url: "{{route('front.complaint_management.save_additional_note')}}",
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: addOverlay,
                success: function (r) {
                    removeOverlay();
                    $("#btnAddAdditionalNote").attr('disabled', false);
                    if (r.status == 200) {
                        toastr['success'](r.message, "success");
                        dataTable.draw();
                        $("#addAdditionalNote").modal('hide');
                    } else {
                        toastr['error'](r.message, "error");
                    }
                }
            });
        }
    });
</script>
