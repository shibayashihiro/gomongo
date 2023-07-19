@extends('layouts.web.dashboard.app')

@section('header_css')
    <style>
        .dataTables_filter {
            display: none;
        }
        img.img_75 {
            width: 50px;
        }
    </style>
@endsection

@section('content')
    <div class="wd-md-rightbar table-rightblog">
        <div class="stock-head">
            <div class="st-title">
                <h2>{{$title}}</h2>
            </div>
            <div class="st-search">
                <div class="st-search-box">
                    <span class="search-icon"><img src="{{asset('assets/web/dashboard/images/seach.png')}}" alt=""></span>
                    <input type="text" placeholder="Search Here" id="searchbox">
                </div>
                <button class="add-stock-btn" type="button" onclick="get_edit_form(0)">Add New</button>
            </div>
        </div>
        <div class="stock-body">
            <div class="">
                <table class="table stock-list-table table-striped w-100" id="stockTable">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade wd-md-myexpense-popup" id="addStock" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content add_edit_stock_modal_content">

            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script>
        var dataTable = $('#stockTable').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "scrollX": true,
            "order": [[0, "DESC"]],
            "bLengthChange": false,
            "ajax": "{{route('front.website.recent_stock.listing')}}",
            "language": {
                "paginate": {
                    "previous": "<",
                    "next": ">"
                },
                "search": '',
                "searchPlaceholder": 'Search Here',
            },
            "fnInfoCallback": function (oSettings, iStart, iEnd, iMax, iTotal, sPre) {
                return "Showing <span>" + iStart + " - " + iEnd + "</span> from <span>" + iMax + "</span>";
            },
            "columns": [
                {"data": "id"},
                {"data": "title"},
                {"data": "image"},
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
                url: "{{route('front.website.recent_stock.get_edit_form')}}",
                beforeSend: addOverlay,
                success: function (r) {
                    removeOverlay();
                    $(".add_edit_stock_modal_content").html(r);
                    $("#addStock").modal('show');

                }
            })
        }

        function delete_record(id) {
            bootbox.confirm('{{__('Are you sure you want to delete?')}}', function (result) {
                if (result) {
                    $.ajax({
                        type: 'get',
                        data: {'id': id},
                        url: "{{route('front.website.recent_stock.delete')}}",
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
    </script>
@endsection
