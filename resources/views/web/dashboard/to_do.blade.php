@extends('layouts.web.dashboard.app')

@section('header_css')
    <style>
        .sub-to-do-cald-text h6 span {
            position: relative;
            right: -22px;
        }


        .sub-to-do-cald-icon a {
            margin: 0 0 0 10px;
        }

        .sub-to-do-cald-icon span {
            margin-right: 50px;
            font-weight: bold;
            position: relative;
        }

        .sub-to-do-list-bg.box-to-do-success::before {
            content: "";
            position: absolute;
            background-color: #28a745;
            margin: 0;
            width: 10px;
            height: 90px;
            border-radius: 0 15px 15px 0;
            right: 50px;
        }

        .sub-to-do-list-bg.box-to-do-danger::before {
            content: "";
            position: absolute;
            background-color: #dc3545;
            margin: 0;
            width: 10px;
            height: 90px;
            border-radius: 0 15px 15px 0;
            right: 50px;            
        }

        .sub-to-do-list-bg.box-to-do-warning::before {
            content: "";
            position: absolute;
            background-color: #FFBF00;
            margin: 0;
            width: 10px;
            height: 90px;
            border-radius: 0 15px 15px 0;
            right: 50px;            
        }
        
    </style>
@endsection

@section('content')
    <section id="stock-content" class="wd-sl-slidebar">
        <div class="stock-top-blog">
            <div class="stock-head">
                <div class="st-title">
                    <h2>To Do List</h2>
                </div>
                <button class="add-stock-btn" type="button" onclick="get_edit_form(0)">
                    <svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.3125 0.9375H20.625C20.8656 0.9375 21.0625 1.13437 21.0625 1.375V9.6875C21.0625 9.92813 20.8656 10.125 20.625 10.125H12.3125C12.0719 10.125 11.875 9.92813 11.875 9.6875V1.375C11.875 1.13437 12.0719 0.9375 12.3125 0.9375ZM13.7344 8.26562H19.2031V2.79688H13.7344V8.26562ZM1.375 0.9375H9.6875C9.92813 0.9375 10.125 1.13437 10.125 1.375V9.6875C10.125 9.92813 9.92813 10.125 9.6875 10.125H1.375C1.13437 10.125 0.9375 9.92813 0.9375 9.6875V1.375C0.9375 1.13437 1.13437 0.9375 1.375 0.9375ZM2.79688 8.26562H8.26562V2.79688H2.79688V8.26562ZM1.375 11.875H9.6875C9.92813 11.875 10.125 12.0719 10.125 12.3125V20.625C10.125 20.8656 9.92813 21.0625 9.6875 21.0625H1.375C1.13437 21.0625 0.9375 20.8656 0.9375 20.625V12.3125C0.9375 12.0719 1.13437 11.875 1.375 11.875ZM2.79688 19.2031H8.26562V13.7344H2.79688V19.2031ZM13.4062 16.4688H16.9062V12.9688C16.9062 12.8484 17.0047 12.75 17.125 12.75H18.4375C18.5578 12.75 18.6562 12.8484 18.6562 12.9688V16.4688H22.1562C22.2766 16.4688 22.375 16.5672 22.375 16.6875V18C22.375 18.1203 22.2766 18.2188 22.1562 18.2188H18.6562V21.7188C18.6562 21.8391 18.5578 21.9375 18.4375 21.9375H17.125C17.0047 21.9375 16.9062 21.8391 16.9062 21.7188V18.2188H13.4062C13.2859 18.2188 13.1875 18.1203 13.1875 18V16.6875C13.1875 16.5672 13.2859 16.4688 13.4062 16.4688Z"
                            fill="white"/>
                    </svg>
                    Create To Do List
                </button>
            </div>
        </div>
        <div id="to_do_listing_main" class="pb-5">

        </div>

        <div class="modal fade wd-md-myexpense-popup" id="addToDo" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content add_edit_to_do_modal_content">

                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_script')
    <script>
        get_to_do_list();
        $(document).on("pageinit", "#pageid", function () {
            $.ajax({
                url: 'data.php',
                success: function (data) {
                    $("#result").html(data).trigger('create');
                    $("#result").listview('refresh');
                }
            });
        });

        function get_to_do_list() {
            $.ajax({
                type: 'get',
                url: "{{route('front.to_do.list')}}",
                beforeSend: addOverlay,
                success: function (r) {
                    removeOverlay();
                    $("#to_do_listing_main").html(r);

                }
            })
        }

        function get_edit_form(id) {
            $.ajax({
                type: 'get',
                data: {'id': id},
                url: "{{route('front.to_do.get_edit_form')}}",
                beforeSend: addOverlay,
                success: function (r) {
                    removeOverlay();
                    $(".add_edit_to_do_modal_content").html(r);
                    $("#addToDo").modal('show');
                    get_to_do_list();
                }
            })
        }

        function mark_as_complete(id) {
            $.ajax({
                type: 'get',
                data: {'id': id},
                url: "{{route('front.to_do.mark_as_complete')}}",
                beforeSend: addOverlay,
                success: function (r) {
                    removeOverlay();
                    if (r.status == 200) {
                        toastr['success'](r.message, "success");
                        get_to_do_list();
                    } else {
                        toastr['error'](r.message, "error");
                    }

                }
            })
        }
    </script>
@endsection
