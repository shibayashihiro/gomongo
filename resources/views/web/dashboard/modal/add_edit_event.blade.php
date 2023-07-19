<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">{{$title}}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form id="frmAddEvent" name="frmAddEvent" action="javascript:;">
        @csrf
        <div class="form-row">
            <input class="form-control" type="text" placeholder="Title" name="title" value="{{(isset($event->title))?$event->title:''}}">
        </div>
        <div class="form-row">
            <textarea class="form-control-ta" rows="2" placeholder="Description" name="description">{{(isset($event->description))?$event->description:''}}</textarea>
        </div>
        <div class="sub-to-do-date d-flex align-items-center">
            <div class="col-lg-6 p-0 pr-2">
                <div class="input-group">
                    <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="date" value="{{(isset($event->start))?$event->start:''}}">
                </div>
            </div>
            <div class="col-lg-6 p-0 pl-2">
                <div class="input-group">
                    <input type="time" class="form-control" placeholder="hh:mm" name="time" value="{{(isset($event->time))?$event->time:''}}">
                </div>
            </div>
        </div>
        <div class="form-row action">
            <input class="form-control" type="hidden" name="id" value="{{(isset($event->id)?$event->id:0)}}">
            <button class="add-stock-btn" id="btnAddEvent">Add Task</button>
        </div>
    </form>
</div>
<script>
    $("#frmAddEvent").validate({
        rules: {
            title: {required: true},
            description: {required: true},
            date: {required: true},
            time: {required: true},
        },
        messages: {
            title: {required: "{{__('Please enter title')}}"},
            description: {required: "{{__('Please enter description')}}"},
            date: {required: "{{__('Please enter date')}}"},
            time: {required: "{{__('Please enter time')}}"},
        }
    });
    $("#btnAddEvent").click(function () {
        if ($("#frmAddEvent").valid()) {
            var data = new FormData($('#frmAddEvent')[0]);
            $("#btnAddEvent").attr('disabled', true);
            $.ajax({
                type: 'post',
                data: data,
                dataType: "json",
                url: "{{route('front.event.create')}}",
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: addOverlay,
                success: function (r) {
                    removeOverlay();
                    $("#btnAddEvent").attr('disabled', false);
                    if (r.status == 200) {
                        toastr['success'](r.message, "success");
                        $("#addEvent").modal('hide');
                        window.location.reload();
                    } else {
                        toastr['error'](r.message, "error");
                    }
                }
            });
        }
    });
</script>

