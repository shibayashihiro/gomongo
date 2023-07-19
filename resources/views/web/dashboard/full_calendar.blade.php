@extends('layouts.web.dashboard.app')
@section('body-class', 'full_calendar_body_class')
@section('header_css')
    <style>
        body.full_calendar_body_class {
            height: auto;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/dashboard/css/calendar.css')}}">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/css/datepicker.css'>
    <link rel="stylesheet">
@endsection

@section('content')
    <div class="wd-md-rightbar">
        <div class="wd-md-topbar d-flex align-items-center justify-content-between">
            <h2>Calendar</h2>
            <a href="javascript:;" onclick="get_edit_form(0)" class="wd-btn-create-event" data-toggle="modal"
               data-target="#wd-create-event">
                <span>
                    <svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.3125 0.9375H20.625C20.8656 0.9375 21.0625 1.13437 21.0625 1.375V9.6875C21.0625 9.92813 20.8656 10.125 20.625 10.125H12.3125C12.0719 10.125 11.875 9.92813 11.875 9.6875V1.375C11.875 1.13437 12.0719 0.9375 12.3125 0.9375ZM13.7344 8.26562H19.2031V2.79688H13.7344V8.26562ZM1.375 0.9375H9.6875C9.92813 0.9375 10.125 1.13437 10.125 1.375V9.6875C10.125 9.92813 9.92813 10.125 9.6875 10.125H1.375C1.13437 10.125 0.9375 9.92813 0.9375 9.6875V1.375C0.9375 1.13437 1.13437 0.9375 1.375 0.9375ZM2.79688 8.26562H8.26562V2.79688H2.79688V8.26562ZM1.375 11.875H9.6875C9.92813 11.875 10.125 12.0719 10.125 12.3125V20.625C10.125 20.8656 9.92813 21.0625 9.6875 21.0625H1.375C1.13437 21.0625 0.9375 20.8656 0.9375 20.625V12.3125C0.9375 12.0719 1.13437 11.875 1.375 11.875ZM2.79688 19.2031H8.26562V13.7344H2.79688V19.2031ZM13.4062 16.4688H16.9062V12.9688C16.9062 12.8484 17.0047 12.75 17.125 12.75H18.4375C18.5578 12.75 18.6562 12.8484 18.6562 12.9688V16.4688H22.1562C22.2766 16.4688 22.375 16.5672 22.375 16.6875V18C22.375 18.1203 22.2766 18.2188 22.1562 18.2188H18.6562V21.7188C18.6562 21.8391 18.5578 21.9375 18.4375 21.9375H17.125C17.0047 21.9375 16.9062 21.8391 16.9062 21.7188V18.2188H13.4062C13.2859 18.2188 13.1875 18.1203 13.1875 18V16.6875C13.1875 16.5672 13.2859 16.4688 13.4062 16.4688Z"
                        fill="white"/>
                    </svg>
                </span>Create event/task
            </a>
        </div>
        <div class="wd-md-calendar-blog">
            <div class="wd-calendar-inner p-4">
                <div class="card">
                    <div class="card-body p-0">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
            <!-- calendar modal -->
            <div id="modal-view-event" class="modal modal-top fade calendar-modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h4 class="modal-title"><span class="event-icon"></span><span class="event-title"></span>
                            </h4>
                            <div class="event-body"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade wd-md-myexpense-popup" id="addEvent" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content add_edit_event_modal_content">

                    </div>
                </div>
            </div>
            <div id="modal-view-event-add" class="modal modal-top fade calendar-modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content get_day_event_modal_content">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script src="{{asset('assets/web/dashboard/js/calendar.js')}}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/datepicker.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/i18n/datepicker.en.js'></script>
    <script>
        $(function () {
            let full_event = $('#calendar').fullCalendar({
                themeSystem: 'bootstrap4',
                businessHours: false,
                defaultView: 'month',
                editable: true,
                header: {
                    left: 'title',
                    center: 'month,agendaWeek,agendaDay',
                    right: 'today prev,next'
                },
                events: [
                    @foreach($events as $event)
                    {
                        title: '{{$event->title .' ('.date('h:i', strtotime($event->time)).')'}}',
                        description: '{{$event->description}}',
                        start: '{{$event->start}}',
                        end: '{{$event->start}}',
                        className: 'fc-bg-default',
                        icon: "circle"
                    },
                    @endforeach
                ],
                eventLimit: 2,
                eventRender: function (event, element) {
                    if (event.icon) {
                        element.find(".fc-title").prepend("<i class='fa fa-" + event.icon + "'></i>");
                    }
                },
                dayClick: function (date, jsEvent, view) {
                    get_event_data(date);
                },
            })
        });

        function get_edit_form(id) {
            $("#modal-view-event-add").modal('hide');
            $.ajax({
                type: 'get',
                data: {'id': id},
                url: "{{route('front.event.get_edit_form')}}",
                beforeSend: addOverlay,
                success: function (r) {
                    removeOverlay();
                    $(".add_edit_event_modal_content").html(r);
                    $("#addEvent").modal('show');
                }
            })
        }

        function get_event_data(date) {
            let start_date = date.format();
            $.ajax({
                type: 'get',
                data: {'start_date': start_date},
                url: "{{route('front.event.get_day_event')}}",
                beforeSend: addOverlay,
                success: function (r) {
                    removeOverlay();
                    $(".get_day_event_modal_content").html(r);
                    $("#modal-view-event-add").modal('show');
                }
            })
        }

        function delete_record(id) {
            bootbox.confirm('{{__('Are you sure you want to delete?')}}', function (result) {
                if (result) {
                    $.ajax({
                        type: 'get',
                        data: {'id': id},
                        url: "{{route('front.event.delete')}}",
                        beforeSend: addOverlay,
                        success: function (r) {
                            removeOverlay();
                            if (r.status == 200) {
                                toastr['success'](r.message, "success");
                                $("#modal-view-event-add").modal('hide');
                                window.location.reload();
                            } else {
                                toastr['error'](r.message, "error");
                            }

                        }
                    })
                }
            });
        }
    </script>
@endsection
