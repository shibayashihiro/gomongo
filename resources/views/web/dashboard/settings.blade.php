@extends('layouts.web.dashboard.app')

@section('header_css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/dashboard/css/style2.css')}}">
@endsection

@section('content')
    <div class="editprofile-page settings-page">
        <section id="my-profile" class="wd-sl-slidebar">
            <div class="profile-head">
                <h2>{{$title}}</h2>
            </div>
            <div class="profile-body">
                <div class="pro-content">
                    <div class="pro-details">
                        <form name="frmChangePassword" id="frmChangePassword" method="post" action="javascript:;">
                            @csrf
                            <div class="sect-title password">
                                <h2>Change Password</h2>
                            </div>
                            <div class="pro-dt-row">
                                <p>Current Password</p>
                                <input type="text" name="current_password" id="current_password"
                                       placeholder="{{__('Enter Current Password')}}">
                            </div>
                            <div class="pro-dt-row">
                                <p>New Password</p>
                                <input type="password" name="new_password" id="new_password"
                                       placeholder="{{__('Enter New Password')}}">
                            </div>
                            <div class="pro-dt-row">
                                <p>Confirm Password</p>
                                <input type="password" name="confirm_password" id="confirm_password"
                                       placeholder="{{__('Enter Confirm Password')}}">
                            </div>
                            <div class="pro-dt-row edit-btn">
                                <a href="javascript:;" id="btnChangePassword">Save</a>
                            </div>
                        </form>
                    </div>
                    <div class="pro-details email-notifi">
                        <div class="pro-dt-row notification">
                            <div class="sect-title">
                                <h2>Email Notification</h2>
                            </div>
                            <div class="ntf-on-off">
                                <div class="ntf-on-off-box">
                                    <input type="radio" name="notification"
                                           id="on"
                                           {{(\Illuminate\Support\Facades\Auth::user()->notification == 1)?'checked':''}} value="1">
                                    <label for="on">On</label>
                                </div>
                                <div class="ntf-on-off-box">
                                    <input type="radio" name="notification"
                                           id="off"
                                           {{(\Illuminate\Support\Facades\Auth::user()->notification == 0)?'checked':''}} value="0">
                                    <label for="off">Off</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('footer_script')
    <script>
        $("#frmChangePassword").validate({
            rules: {
                current_password: {required: true},
                new_password: {required: true, minlength: 6},
                confirm_password: {required: true, equalTo: "#new_password"},
            },
            messages: {
                current_password: {required: "{{__('Please Enter Current Password')}}"},
                new_password: {required: "{{__('Please Enter New Password')}}"},
                confirm_password: {
                    required: "{{__('Please Enter Confirm Password')}}",
                    equalTo: "{{__('Confirm Password Mismatch')}}"
                },
            }
        });
        $("#btnChangePassword").click(function () {
            if ($("#frmChangePassword").valid()) {
                var data = new FormData($('#frmChangePassword')[0]);
                $("#btnChangePassword").attr('disabled', true);
                $.ajax({
                    type: 'post',
                    data: data,
                    dataType: "json",
                    url: "{{route('front.change_password')}}",
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: addOverlay,
                    success: function (r) {
                        removeOverlay();
                        $("#btnChangePassword").attr('disabled', false);
                        if (r.status == 200) {
                            $("#frmChangePassword")[0].reset();
                            toastr['success'](r.message, "success");
                        } else {
                            toastr['error'](r.message, "error");
                        }
                    }
                });
            }
        });
        $('input[type=radio][name=notification]').change(function () {
            let notification = this.value;
            $.ajax({
                type: 'post',
                data: {"_token": "{{ csrf_token() }}", 'notification': notification},
                dataType: "json",
                url: "{{route('front.notification_change')}}",
                beforeSend: addOverlay,
                success: function (r) {
                    removeOverlay();
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
