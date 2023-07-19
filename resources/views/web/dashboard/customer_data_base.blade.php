@extends('layouts.web.dashboard.app')

@section('header_css')
    <style>
        .dataTables_filter {
            display: none;
        }

        .ui-datepicker-calendar {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="wd-md-rightbar table-rightblog col-md-12">
            <div class="wd-md-topbar d-flex align-items-center justify-content-between">
                <h2>Customer Data Base</h2>
                <a class="default-btn" href="{{route('front.customer-data-base.export')}}"><i class="fa fa-file-export"></i> Export</a>
                <div class="st-search-box"><span class="search-icon"><img
                            src="{{asset('assets/web/dashboard/images/seach.png')}}" alt=""></span>
                    <input type="text" placeholder="Search Here" id="searchbox">
                </div>
            </div>
            <div class="wd-md-bottom wd-md-table">
                <div class="table-responsive">
                    <table class="table table-striped" id="customerDataBaseTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Postcode</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script>
        let dataTable = $('#customerDataBaseTable').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "scrollX": true,
            "order": [[0, "DESC"]],
            "bLengthChange": false,
            "ajax": {
                url: "{{route('front.customer_data_base.listing')}}"
            },
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
                {"data": "name"},
                {"data": "email"},
                {"data": "mobile"},
                {"data": "address"},
                {"data": "post_code"},
            ]
        });
        $("#searchbox").keyup(function () {
            dataTable.search(this.value).draw();
        });
    </script>
@endsection
