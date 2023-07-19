<form id="frmAddComplaint" name="frmAddComplaint" action="javascript:;">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <input class="form-control" type="text" placeholder="{{__('Subject')}}"
                   id="subject" name="subject"
                   value="{{(isset($complaintManagement->subject))?$complaintManagement->subject:''}}">
        </div>
        <div class="form-group">
            <textarea class="form-control" placeholder="{{__('Description')}}" id="description" name="description">{{(isset($complaintManagement->description))?$complaintManagement->description:''}}</textarea>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" placeholder="{{__('Assign Staff')}}"
                   id="assign_staff" name="assign_staff"
                   value="{{(isset($complaintManagement->assign_staff))?$complaintManagement->assign_staff:''}}">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" placeholder="{{__('Customer Name')}}"
                   id="customer_name" name="customer_name"
                   value="{{(isset($complaintManagement->customer_name))?$complaintManagement->customer_name:''}}">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" placeholder="{{__('Customer Contact Number')}}"
                   id="customer_contact_number" name="customer_contact_number"
                   value="{{(isset($complaintManagement->customer_contact_number))?$complaintManagement->customer_contact_number:''}}">
        </div>
        <div class="form-group">
            <label for="due_date">Complaint log date</label>
            <input class="form-control" type="date" placeholder="{{__('Due Date')}}"
                   id="due_date" name="due_date"
                   value="{{(isset($complaintManagement->due_date))?$complaintManagement->due_date:''}}">
        </div>
        <div class="form-group action">
            <input class="form-control" type="hidden" name="id" value="{{(isset($complaintManagement->id)?$complaintManagement->id:0)}}">
            <button class="add-stock-btn" id="btnAddComplaint">Save</button>
        </div>
    </div>
</form>
<script>
    $("#frmAddComplaint").validate({
        rules: {
            subject: {required: true},
            description: {required: true},
            assign_staff: {required: true},
            customer_name: {required: true},
            customer_contact_number: {required: true},
            due_date: {required: true},
        },
        messages: {
            subject: {required: "{{__('Please enter subject')}}"},
            description: {required: "{{__('Please enter description')}}"},
            assign_staff: {required: "{{__('Please enter assign staff')}}"},
            customer_name: {required: "{{__('Please enter customer name')}}"},
            customer_contact_number: {required: "{{__('Please enter customer contact number')}}"},
            due_date: {required: "{{__('Please enter due date')}}"},
        }
    });
    $("#btnAddComplaint").click(function () {
        if ($("#frmAddComplaint").valid()) {
            var data = new FormData($('#frmAddComplaint')[0]);
            $("#btnAddComplaint").attr('disabled', true);
            $.ajax({
                type: 'post',
                data: data,
                dataType: "json",
                url: "{{route('front.complaint_management.create')}}",
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: addOverlay,
                success: function (r) {
                    removeOverlay();
                    $("#btnAddComplaint").attr('disabled', false);
                    if (r.status == 200) {
                        toastr['success'](r.message, "success");
                        dataTable.draw();
                        $("#addComplaint").modal('hide');
                    } else {
                        toastr['error'](r.message, "error");
                    }
                }
            });
        }
    });
</script>
