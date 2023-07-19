@extends('layouts.web.dashboard.app')

@section('header_css')
    <style>
        .dataTables_filter {
            display: none;
        }
        .kt-badge.kt-badge--danger {
            background: #ff0000;
            color: #fff;
        }
        .kt-badge.kt-badge--success {
            background: #28a745;
            color: #fff;
        }
        .kt-badge.kt-badge--warning {
            background: #ffc107;
            color: #fff;
        }
        .kt-badge.kt-badge--inline {
            padding: 0.25rem 0.25rem;
            border-radius: 2px;
            display: block;
            line-height: 15px;
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <section id="stock-content" class="wd-sl-slidebar">
        <div class="stock-top-blog">
            <div class="stock-head">
                <div class="st-title">
                    <h2>{{$title}}</h2>
                </div>
                <div class="st-search">
                    <div class="st-search-box">
                        <span class="search-icon"><img src="{{asset('assets/web/dashboard/images/seach.png')}}" alt=""></span>
                        <input type="text" placeholder="Search Here" id="searchbox">
                    </div>
                    <button class="add-stock-btn" type="button" onclick="get_edit_form(0)">Add
                        Complaint
                    </button>
                </div>
            </div>
            <div class="wd-md-bottom wd-md-table">
            <div class="stock-body table-responsive">
                <table class="table stock-list-table table-striped" id="complaintTable">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th scope="col" class="r-number">Subject</th>
                        <th scope="col" class="additional">Assign Staff</th>
                        <th scope="col" class="additional">Customer Name</th>
                        <th scope="col" class="additional">Customer Contact Number</th>
                        <th scope="col" class="additional">Additional Note</th>
                        <th scope="col" class="additional">Complaint Log Date</th>
                        <th scope="col" class="additional">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody class="wd-sl-tdcenter">
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </section>
    <!-- pop-upfor view -->
    <div class="modal fade wd-md-myexpense-popup" id="viewComplaint" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Complaint</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body view_complaint_modal_content">

                </div>
            </div>
        </div>
    </div>
    <!-- Stock List Modal start -->
    <div class="modal fade wd-md-myexpense-popup" id="addComplaint" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content add_edit_complaint_modal_content">

            </div>
        </div>
    </div>

    <!-- Add Additional Price Modal start -->
    <div class="modal fade wd-md-myexpense-popup" id="addAdditionalNote" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content add_additional_note_modal_content">

            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script>
        var dataTable = $('#complaintTable').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [[0, "DESC"]],
            "bLengthChange": false,
            "ajax": "{{route('front.complaint_management.listing')}}",
            "language": {
                "paginate": {
                    "previous": "<",
                    "next": ">"
                },
                "search": '',
                "searchPlaceholder": 'Search Here',
            },
            "columns": [
                {"data": "id"},
                {"data": "subject", searchable: true, sortable: false},
                {"data": "assign_staff", searchable: true, sortable: false},
                {"data": "customer_name", searchable: true, sortable: false},
                {"data": "customer_contact_number", searchable: true, sortable: false},
                {"data": "additional_note", searchable: false, sortable: false},
                {"data": "due_date", searchable: false, sortable: false},
                {"data": "status", searchable: false, sortable: false},
                {"data": "action", searchable: false, sortable: false}
            ]
        });
        $("#searchbox").keyup(function () {
            dataTable.search(this.value).draw();
        });


        function get_edit_form(id) {
            $.ajax({
                type: 'get',
                data: {'id': id},
                url: "{{route('front.complaint_management.get_edit_form')}}",
                beforeSend: addOverlay,
                success: function (r) {
                    removeOverlay();
                    $(".add_edit_complaint_modal_content").html(r);
                    $("#addComplaint").modal('show');

                }
            })
        }

        function delete_record(id) {
            bootbox.confirm('{{__('Are you sure you want to delete?')}}', function (result) {
                if (result) {
                    $.ajax({
                        type: 'get',
                        data: {'id': id},
                        url: "{{route('front.complaint_management.delete')}}",
                        beforeSend: addOverlay,
                        success: function (r) {
                            removeOverlay();
                            if (r.status == 200) {
                                toastr['success'](r.message, "success");
                                dataTable.draw();
                            } else {
                                toastr['error'](r.message, "error");
                            }

                        }
                    })
                }
            });
        }

        function get_view(id) {
            $.ajax({
                type: 'get',
                data: {'id': id},
                url: "{{route('front.complaint_management.get_view_form')}}",
                beforeSend: addOverlay,
                success: function (r) {
                    removeOverlay();
                    $(".view_complaint_modal_content").html(r);
                    $("#viewComplaint").modal('show');
                }
            })
        }

        function get_mark_as_complaint_form(id) {
            $.ajax({
                type: 'get',
                data: {'id': id},
                url: "{{route('front.complaint_management.get_mark_as_complaint_form')}}",
                beforeSend: addOverlay,
                success: function (r) {
                    removeOverlay();
                    $(".add_additional_note_modal_content").html(r);
                    $("#addAdditionalNote").modal('show');
                }
            })
        }

        function get_add_notes_form(id) {
            $.ajax({
                type: 'get',
                data: {'id': id},
                url: "{{route('front.complaint_management.get_add_notes_form')}}",
                beforeSend: addOverlay,
                success: function (r) {
                    removeOverlay();
                    $(".add_additional_note_modal_content").html(r);
                    $("#addAdditionalNote").modal('show');
                }
            })
        }
    </script>
@endsection
