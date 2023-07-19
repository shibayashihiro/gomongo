<form action="javascript:;" id="frmTestimonial" name="frmTestimonial">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Title" value="{{(isset($testimonial->title))?$testimonial->title:''}}">
        </div>
        <div class="form-group">
            <textarea class="form-control" rows="5" id="comment" name="description" placeholder="Description">{{(isset($testimonial->description))?$testimonial->description:''}}</textarea>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="label" placeholder="Label" value="{{(isset($testimonial->label))?$testimonial->label:''}}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="author_name" placeholder="Author Name" value="{{(isset($testimonial->author_name))?$testimonial->author_name:''}}">
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name="author_image" placeholder="Image">
        </div>
        <div class="form-row action">
            <input type="hidden" name="id" value="{{(isset($testimonial->id)?$testimonial->id:0)}}">
            <button class="add-stock-btn" id="btnSave">Save</button>
        </div>
    </div>
</form>
<script>
    $("#frmTestimonial").validate({
        rules: {
            description: {required: true},
            author_name: {required: true},
        },
        messages: {
            description: {required: "{{__('Please enter description')}}"},
            author_name: {required: "{{__('Please enter author name')}}"},
        }
    });
    $("#btnSave").click(function () {
        if ($("#frmTestimonial").valid()) {
            var data = new FormData($('#frmTestimonial')[0]);
            $("#btnSave").attr('disabled', true);
            $.ajax({
                type: 'post',
                data: data,
                dataType: "json",
                url: "{{route('front.website.testimonials.create')}}",
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
                        $("#addTestimonial").modal('hide');
                    } else {
                        toastr['error'](r.message, "error");
                    }
                }
            });
        }
    });
</script>
