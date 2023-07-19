@extends('layouts.web.dashboard.app')

@section('header_css')
    <style>
        .dataTables_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="wd-md-rightbar">
        <div class="wd-md-topbar">
            <h2>{{$title}}</h2>
        </div>
        <div class="wd-sl-myweb wd-pr-myweb">
            <div class="row">
                <div class="col-md-12">
                    <form id="frmHomeContent" name="frmHomeContent" method="post" action="" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" name="page_type" value="home">
                    <div class="tab-content">
                        <div class="tab-pane active" id="" role="tabpanel">
                            <div class="accordion accordion-solid accordion-toggle-plus" id="accordion-home"
                                 style="width: 100%">
                                {!! get_website_content_web($data->template, $data->id, 'home') !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" id="btnSubmitFrm" class="default-btn">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script>
        $("#btnSubmitFrm").click(function () {

            var data = new FormData($('#frmHomeContent')[0]);
            $("#btnSubmitFrm").attr('disabled', true);
            $.ajax({
                type: 'post',
                data: data,
                dataType: "json",
                url: "{{route('front.website.home.post_content')}}",
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: addOverlay,
                success: function (r) {
                    removeOverlay();
                    $("#btnSubmitFrm").attr('disabled', false);
                    if (r.status == 200) {
                        toastr['success'](r.message, "success");
                    } else {
                        toastr['error'](r.message, "error");
                    }
                }
            });
        });
    </script>
@endsection
