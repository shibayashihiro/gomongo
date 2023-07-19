@extends('layouts.web.dashboard.app')

@section('header_css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <style>
        /* for lg */

        .custom-switch.custom-switch-lg .custom-control-label {
            padding-left: 3rem;
            padding-bottom: 2rem;
        }

        .custom-switch.custom-switch-lg .custom-control-label::before {
            height: 2rem;
            width: calc(3rem + 0.75rem);
            border-radius: 4rem;
        }

        .custom-switch.custom-switch-lg .custom-control-label::after {
            width: calc(2rem - 4px);
            height: calc(2rem - 4px);
            border-radius: calc(3rem - (2rem / 2));
        }

        .custom-switch.custom-switch-lg .custom-control-input:checked ~ .custom-control-label::after {
            transform: translateX(calc(2rem - 0.25rem));
        }

        .parent_disabled {
            background: grey;
        }

        .parent_disabled .relative_position {
            position: relative;
        }

        .parent_disabled .relative_position span {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>
@endsection

@php
    $working_count=$working_hours->count();
    $loop=$working_count?$data->working_hours:get_days();
@endphp

@section('content')
    <div class="wd-md-rightbar">
        <div class="wd-md-topbar">
            <h2>{{$title}}</h2>
        </div>
        <div class="wd-sl-myweb wd-pr-myweb">
            <div class="row">
                <div class="col-md-12">
                    <form id="frmOpeningHours" name="frmOpeningHours" method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Is Working</th>
                                <th>Day</th>
                                <th>time</th>
                            </tr>
                            </thead>
                            <tbody id="working_hour_box">
                            @foreach($loop as $key=>$day)
                                @php
                                    $day_name=$day->day??$day;
                                @endphp
                                <tr data-name="{{$day_name}}" class="parent_div {{$day->is_working??""==1?"":"parent_disabled"}}">
                                    <td>
                                        <div class="custom-control custom-switch custom-switch-lg">
                                            <input type="checkbox" class="custom-control-input is_working"
                                                   name="days[{{$day_name}}][is_working]"
                                                   id="{{$day_name}}_is_working" {{is_checked_blade(1,$day->is_working??"",'checked')}}>
                                            <label class="custom-control-label"
                                                   for="{{$day_name}}_is_working"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <label for="{{$day_name}}" id="{{$day_name}}_name"
                                               class="text-capitalize day_name">{{$day_name}}</label>
                                    </td>
                                    <td>
                                        <input type="hidden" id="start_time_{{$day_name}}" class="day_start_time"
                                               name="days[{{$day_name}}][start_time]"
                                               value="{{$day->start_time??"00:00:00"}}">
                                        <input type="hidden" id="end_time_{{$day_name}}" class="day_end_time"
                                               name="days[{{$day_name}}][end_time]"
                                               value="{{$day->end_time??"23:59:59"}}">
                                        <div class="relative_position">
                                            <input type="text" id="{{$day_name}}"
                                                   class="form-control opening_hours_el"
                                                   value="{{($day->start_time??null)?($day->start_time.' - '.$day->end_time):"00:00:00 - 23:59:59"}}">
                                            <span></span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
        $(function () {
            $('.is_working').change(function () {
                let el = this;
                if (this.checked) {
                    $(el).closest('.parent_div').removeClass('parent_disabled');
                } else {
                    $(el).closest('.parent_div').addClass('parent_disabled');
                }
            });
            /*$('#frmOpeningHours').submit(function () {
                addOverlay();
                return true;
            });*/

            $("#btnSubmitFrm").click(function () {
                var data = new FormData($('#frmOpeningHours')[0]);
                $("#btnSubmitFrm").attr('disabled', true);
                $.ajax({
                    type: 'post',
                    data: data,
                    dataType: "json",
                    url: "{{route('front.website.post_openingHour')}}",
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

            $('.opening_hours_el').daterangepicker({
                timePicker: true,
                timePicker24Hour: true,
                timePickerIncrement: 1,
                timePickerSeconds: true,
                locale: {format: 'HH:mm:ss'}
            }).on('show.daterangepicker', function (ev, picker) {
                picker.container.find(".calendar-table").hide();
                $('#start_time_' + ev.target.id).val(picker.startDate.format('HH:mm:ss'));
                $('#end_time_' + ev.target.id).val(picker.endDate.format('HH:mm:ss'));
            }).on('apply.daterangepicker', function (ev, picker) {
                picker.container.find(".calendar-table").hide();
                $('#start_time_' + ev.target.id).val(picker.startDate.format('HH:mm:ss'));
                $('#end_time_' + ev.target.id).val(picker.endDate.format('HH:mm:ss'));
            });
        });
    </script>
@endsection
