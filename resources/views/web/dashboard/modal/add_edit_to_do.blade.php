<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">{{$title}}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form id="frmAddToDo" name="frmAddToDo" action="javascript:;">
        @csrf
        <div class="form-row">
            <input class="form-control" type="text" placeholder="Title" name="title"
                   value="{{(isset($todo->title))?$todo->title:''}}">
        </div>
        <div class="form-row">
            <textarea class="form-control-ta" rows="2" placeholder="Description"
                      name="description">{{(isset($todo->description))?$todo->description:''}}</textarea>
        </div>
        <div class="form-row">
            <input class="form-control" type="text" placeholder="Assign Staff" name="assign_staff"
                   value="{{(isset($todo->assign_staff))?$todo->assign_staff:''}}">
        </div>
        <div class="form-row">
            <select id="priority" name="priority" class="form-control">
                <option value="">Select Priority</option>
                <option value="low" {{(isset($todo->priority) && $todo->priority=='low')?'selected':''}}>Low</option>
                <option value="medium" {{(isset($todo->priority) && $todo->priority=='medium')?'selected':''}}>Medium
                </option>
                <option value="high" {{(isset($todo->priority) && $todo->priority=='high')?'selected':''}}>High</option>
            </select>
        </div>
        <div class="sub-to-do-date d-flex align-items-center">
            <div class="col-lg-6 p-0 pr-2">
                <label >Due Date</label>
                <div class="input-group">
                    <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="date"
                           value="{{(isset($todo->date))?$todo->date:''}}">
                </div>
            </div>
            <div class="col-lg-6 p-0 pl-2">
                <label >Due Time</label>
                <div class="input-group">
                    <input type="time" class="form-control" placeholder="hh:mm" name="time"
                           value="{{(isset($todo->time))?$todo->time:''}}">
                </div>
            </div>
        </div>
        <div class="form-row action">
            <input class="form-control" type="hidden" name="id" value="{{(isset($todo->id)?$todo->id:0)}}">
            <button class="add-stock-btn" id="btnAddToDO">Add Task</button>
        </div>
    </form>
</div>
<script>
    $("#frmAddToDo").validate({
        rules: {
            title: {required: true},
            description: {required: true},
            /*assign_staff: {required: true},
            date: {required: true},
            time: {required: true},*/
        },
        messages: {
            title: {required: "{{__('Please enter title')}}"},
            description: {required: "{{__('Please enter description')}}"},
           /* assign_staff: {required: "{{__('Please enter assign staff')}}"},
            date: {required: "{{__('Please enter date')}}"},
            time: {required: "{{__('Please enter time')}}"},*/
        }
    });
    $("#btnAddToDO").click(function () {
        if ($("#frmAddToDo").valid()) {
            var data = new FormData($('#frmAddToDo')[0]);
            $("#btnAddToDO").attr('disabled', true);
            $.ajax({
                type: 'post',
                data: data,
                dataType: "json",
                url: "{{route('front.to_do.create')}}",
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: addOverlay,
                success: function (r) {
                    removeOverlay();
                    $("#btnAddToDO").attr('disabled', false);
                    if (r.status == 200) {
                        toastr['success'](r.message, "success");
                        get_to_do_list();
                        $("#addToDo").modal('hide');
                    } else {
                        toastr['error'](r.message, "error");
                    }
                }
            });
        }
    });
</script>

