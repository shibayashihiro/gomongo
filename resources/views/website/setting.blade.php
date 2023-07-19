@extends('layouts.web.dashboard.app')

@section('header_css')
@endsection

@section('content')
    <div class="wd-md-rightbar">
        <div class="wd-md-topbar">
            <h2>{{$title}}</h2>
        </div>
        <div class="wd-sl-myweb wd-pr-myweb">
            <div class="row">
                <div class="col-md-12">
                    <form id="frmWebSetting" name="frmWebSetting" method="post" action="javascript:;" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label >Favicon</label>
                            </div>
                            <div class="col-md-10">
                                <input class="form-control" type="file" name="favicon" placeholder="Upload your favicon">
                                @if(isset($data->favicon))
                                    <div class="img-responsive">
                                        <img src="{{$data->favicon}}">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label >Header Logo</label>
                            </div>
                            <div class="col-md-10">
                                <input class="form-control" type="file" name="header_logo" placeholder="Upload your logo">
                                @if(isset($data->logo))
                                    <div class="img-responsive">
                                        <img src="{{$data->logo}}">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label>Footer Text</label>
                            </div>
                            <div class="col-md-10">
                                <textarea class="form-control" type="text" name="footer_text" placeholder="Footer">{{$data->footer_text ?? ''}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label>Footer Logo</label>
                            </div>
                            <div class="col-md-10">
                                <input class="form-control" type="file" name="footer_logo" placeholder="Upload your logo">
                                @if(isset($data->footer_logo))
                                    <div class="img-responsive">
                                        <img src="{{$data->footer_logo}}">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">Copy Right</label>
                            <input class="form-control col-md-10" type="text" name="copyright" placeholder="Copy Right" value="{{$data->copyright ?? ''}}">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">Facebook Link</label>
                            <input class="form-control col-md-10" type="text" name="facebook_link" placeholder="Facebook Link" value="{{$data->facebook_link ?? ''}}">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">Instagram Link</label>
                            <input class="form-control col-md-10" type="text" name="instagram_link" placeholder="Instagram Link" value="{{$data->instagram_link ?? ''}}">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">Twitter Link</label>
                            <input class="form-control col-md-10" type="text" name="twitter_link" placeholder="Twitter Link" value="{{$data->twitter_link ?? ''}}">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">Linkedin Link</label>
                            <input class="form-control col-md-10" type="text" name="linkedin_link" placeholder="Linkedin Link" value="{{$data->linkedin_link ?? ''}}">
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
    let frmWebSetting = $("#frmWebSetting").validate({
        rules: {
            footer_text: {required: true},
            copyright: {required: true},
        },
        messages: {
            footer_text: {required: 'Please enter footer text'},
            copyright: {required: 'Please enter copy right'},
        },
        submitHandler: function (form) {
            return false;
        }
    });

    $("#btnSubmitFrm").click(function () {
        if ($("#frmWebSetting").valid()) {
            var data = new FormData($('#frmWebSetting')[0]);
            $("#btnSubmitFrm").attr('disabled', true);
            $.ajax({
                type: 'post',
                data: data,
                dataType: "json",
                url: "{{route('front.website.post_setting')}}",
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: addOverlay,
                success: function (r) {
                    removeOverlay();
                    if (r.status == 200) {
                        toastr['success'](r.message, "success");
                        setTimeout(function () {
                            window.location.href = "{{route('front.website.setting')}}";
                        }, 1000);
                    } else {
                        toastr['error'](r.message, "error");
                        $("#btnSubmitFrm").attr('disabled', false);
                    }
                }
            });
        }
    });
</script>
@endsection
