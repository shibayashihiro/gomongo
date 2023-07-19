<div class="wd-car-dt-btn">
    <ul>
        <!-- Button trigger modal -->
        <li>
            <a role="button" class="btn btn-primary" data-toggle="modal" data-target="#extraFeatureModal">
                Extra Features
            </a>
        </li>
        <!-- <li>
            <a role="button" class="btn btn-primary" data-toggle="modal" data-target="#specificationModal">
                Specification
            </a>
        </li>
        <li>
            <a role="button" class="btn btn-primary" data-toggle="modal" data-target="#runningCostModal">
                Running Cost
            </a>
        </li>
        <li>
                                <a role="button" class="btn btn-primary" data-toggle="modal" data-target="#historyCheckModal">
                                    Full History Check
                                </a>
                            </li> -->
    </ul>
</div>

<div class="wp-dt-ket-cont d-flex flex-wrap align-items-center justify-content-between">
    <div class="wp-dt-ket-text">
        <h5>Description</h5>
    </div>
    <p class="wp-dt-ket-detail-desc">
        {{ $stock->key_information }}
    </p>
</div>
<div class="modal fase" id="composeMailModal" tabindex="-1" aria-labelledby="composeMailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="composeMailModalLabel">Compose Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="kt_inbox_compose_form">
                    <!--begin::Body-->
                    <div class="d-block">
                        <!--begin::To-->
                        <div class="d-flex align-items-center border-bottom px-8 min-h-50px">
                            <!--begin::Label-->
                            <div class="text-dark fw-bolder w-75px">To:</div>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-transparent border-0" name="compose_to" value="" data-kt-inbox-form="tagify" />
                            <!--end::Input-->
                            <!--begin::CC & BCC buttons-->
                            <div class="ms-auto w-75px text-end">
                                <span class="text-muted fs-bold cursor-pointer text-hover-primary me-2" data-kt-inbox-form="cc_button">Cc</span>
                                <span class="text-muted fs-bold cursor-pointer text-hover-primary" data-kt-inbox-form="bcc_button">Bcc</span>
                            </div>
                            <!--end::CC & BCC buttons-->
                        </div>
                        <!--end::To-->
                        <!--begin::CC-->
                        <div class="d-none align-items-center border-bottom ps-8 pe-5 min-h-50px" data-kt-inbox-form="cc">
                            <!--begin::Label-->
                            <div class="text-dark fw-bolder w-75px">Cc:</div>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-transparent border-0" name="compose_cc" value="" data-kt-inbox-form="tagify" />
                            <!--end::Input-->
                            <!--begin::Close-->
                            <span class="btn btn-clean btn-xs btn-icon" data-kt-inbox-form="cc_close">
                                <i class="la la-close"></i>
                            </span>
                            <!--end::Close-->
                        </div>
                        <!--end::CC-->
                        <!--begin::BCC-->
                        <div class="d-none align-items-center border-bottom inbox-to-bcc ps-8 pe-5 min-h-50px" data-kt-inbox-form="bcc">
                            <!--begin::Label-->
                            <div class="text-dark fw-bolder w-75px">Bcc:</div>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-transparent border-0" name="compose_bcc" value="" data-kt-inbox-form="tagify" />
                            <!--end::Input-->
                            <!--begin::Close-->
                            <span class="btn btn-clean btn-xs btn-icon" data-kt-inbox-form="bcc_close">
                                <i class="la la-close"></i>
                            </span>
                            <!--end::Close-->
                        </div>
                        <!--end::BCC-->
                        <!--begin::Subject-->
                        <div class="border-bottom">
                            <input class="form-control form-control-transparent border-0 px-8 min-h-45px" name="compose_subject" placeholder="Subject" />
                        </div>
                        <!--end::Subject-->
                        <!--begin::Message-->
                        <div id="kt_inbox_form_editor" class="bg-transparent border-0 h-350px px-3"></div>
                        <!--end::Message-->
                        <!--begin::Attachments-->
                        <div class="dropzone dropzone-queue px-8 py-4" id="kt_inbox_reply_attachments" data-kt-inbox-form="dropzone">
                            <div class="dropzone-items">
                                <div class="dropzone-item" style="display:none">
                                    <!--begin::Dropzone filename-->
                                    <div class="dropzone-file">
                                        <div class="dropzone-filename" title="some_image_file_name.jpg">
                                            <span data-dz-name="">some_image_file_name.jpg</span>
                                            <strong>(
                                            <span data-dz-size="">340kb</span>)</strong>
                                        </div>
                                        <div class="dropzone-error" data-dz-errormessage=""></div>
                                    </div>
                                    <!--end::Dropzone filename-->
                                    <!--begin::Dropzone progress-->
                                    <div class="dropzone-progress">
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress=""></div>
                                        </div>
                                    </div>
                                    <!--end::Dropzone progress-->
                                    <!--begin::Dropzone toolbar-->
                                    <div class="dropzone-toolbar">
                                        <span class="dropzone-delete" data-dz-remove="">
                                            <i class="bi bi-x fs-1"></i>
                                        </span>
                                    </div>
                                    <!--end::Dropzone toolbar-->
                                </div>
                            </div>
                        </div>
                        <!--end::Attachments-->
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="d-flex flex-stack flex-wrap gap-2 py-3 ps-8 pe-5 border-top">
                        <!--begin::Actions-->
                        <div class="d-flex align-items-center me-3">
                            <!--begin::Send-->
                            <div class="btn-group me-4">
                                <!--begin::Submit-->
                                <a role="button" class="btn btn-primary" data-kt-inbox-form="send">
                                    Send
                                </a>
                                <!--end::Submit-->
                            </div>
                            
                            <!--end::Send-->
                            <!--begin::Upload attachement-->
                            <span class="btn btn-icon btn-sm btn-clean btn-active-light-primary me-2" id="kt_inbox_reply_attachments_select" data-kt-inbox-form="dropzone_upload">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com008.svg-->
                                <span class="svg-icon svg-icon-2 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M4.425 20.525C2.525 18.625 2.525 15.525 4.425 13.525L14.825 3.125C16.325 1.625 18.825 1.625 20.425 3.125C20.825 3.525 20.825 4.12502 20.425 4.52502C20.025 4.92502 19.425 4.92502 19.025 4.52502C18.225 3.72502 17.025 3.72502 16.225 4.52502L5.82499 14.925C4.62499 16.125 4.62499 17.925 5.82499 19.125C7.02499 20.325 8.82501 20.325 10.025 19.125L18.425 10.725C18.825 10.325 19.425 10.325 19.825 10.725C20.225 11.125 20.225 11.725 19.825 12.125L11.425 20.525C9.525 22.425 6.425 22.425 4.425 20.525Z" fill="currentColor" />
                                        <path d="M9.32499 15.625C8.12499 14.425 8.12499 12.625 9.32499 11.425L14.225 6.52498C14.625 6.12498 15.225 6.12498 15.625 6.52498C16.025 6.92498 16.025 7.525 15.625 7.925L10.725 12.8249C10.325 13.2249 10.325 13.8249 10.725 14.2249C11.125 14.6249 11.725 14.6249 12.125 14.2249L19.125 7.22493C19.525 6.82493 19.725 6.425 19.725 5.925C19.725 5.325 19.525 4.825 19.125 4.425C18.725 4.025 18.725 3.42498 19.125 3.02498C19.525 2.62498 20.125 2.62498 20.525 3.02498C21.325 3.82498 21.725 4.825 21.725 5.925C21.725 6.925 21.325 7.82498 20.525 8.52498L13.525 15.525C12.325 16.725 10.525 16.725 9.32499 15.625Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Upload attachement-->
                            
                        </div>
                        <!--end::Actions-->
                        
                    </div>
                    <!--end::Footer-->
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="extraFeatureModal" tabindex="-1" aria-labelledby="extraFeatureModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="extraFeatureModalLabel">Extra Features</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul type="disc">
                    @if (!empty($stock->feature))
                        @php
                            // $description = json_decode($stock->feature);
                            $description = explode(',', $stock->feature);
                        @endphp
                        @foreach ($description as $key => $value)
                            <li><i class="fa fa-car" style="margin-right: 10px;"></i>{{ $value }}</li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="specificationModal" tabindex="-1" aria-labelledby="specificationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="specificationModalLabel">Specification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card mb-3">
                    <div class="card-body">
                        <h6>Performance</h6>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Top Speed</td>
                                    <td>not available</td>
                                    <td>Engine Power</td>
                                    <td>not available</td>
                                </tr>
                                <tr>
                                    <td>Cylinders</td>
                                    <td>not available</td>
                                    <td>Engine Torque</td>
                                    <td>not available</td>
                                </tr>
                                <tr>
                                    <td>Valves</td>
                                    <td>not available</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h6>Driver Convenience</h6>
                        <hr>
                        @php
                            // $driverConvenience = array_filter($specification->techData->standardFeatures, function ($value) {
                            //     return $value->category === 'Audio and Communications' || $value->category === 'Drivers Assistance';
                            // });
                        @endphp
                        <div class="row">
                            {{-- @foreach ($driverConvenience as $key => $value) --}}
                                <div class="col-md-6">
                                    {{-- {{ $value->description }} --}}
                                    not available
                                </div>
                            {{-- @endforeach --}}
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h6>Safety and Security</h6>
                        <hr>
                        @php
                            // $driverConvenience = array_filter($specification->techData->standardFeatures, function ($value) {
                            //     return $value->category === 'Safety and Security' || $value->category === 'Illumination';
                            // });
                        @endphp
                        <div class="row">
                            {{-- @foreach ($driverConvenience as $key => $value) --}}
                                <div class="col-md-6">
                                    {{-- {{ $value->description }} --}}
                                    not available
                                </div>
                            {{-- @endforeach --}}
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h6>Exterior Features</h6>
                        <hr>
                        @php
                            // $driverConvenience = array_filter($specification->techData->standardFeatures, function ($value) {
                            //     return $value->category === 'Exterior';
                            // });
                        @endphp
                        <div class="row">
                            {{-- @foreach ($driverConvenience as $key => $value) --}}
                                <div class="col-md-6">
                                    {{-- {{ $value->description }} --}}
                                    not available
                                </div>
                            {{-- @endforeach --}}
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h6>Interior Features</h6>
                        <hr>
                        @php
                            // $driverConvenience = array_filter($specification->techData->standardFeatures, function ($value) {
                            //     return $value->category === 'Interior';
                            // });
                        @endphp
                        <div class="row">
                            {{-- @foreach ($driverConvenience as $key => $value) --}}
                                <div class="col-md-6">
                                    {{-- {{ $value->description }} --}}
                                    not available
                                </div>
                            {{-- @endforeach --}}
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h6>Technical</h6>
                        <hr>
                        @php
                            // $driverConvenience = array_filter($specification->techData->standardFeatures, function ($value) {
                            //     return $value->category === 'Performance';
                            // });
                        @endphp
                        <div class="row">
                            {{-- @foreach ($driverConvenience as $key => $value) --}}
                                <div class="col-md-6">
                                    {{-- {{ $value->description }} --}}
                                    not available
                                </div>
                            {{-- @endforeach --}}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h6>Dimensions</h6>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Height</td>
                                    <td>not available</td>
                                    <td>Width</td>
                                    <td>not available</td>
                                </tr>
                                <tr>
                                    <td>Length</td>
                                    <td>not available</td>
                                    <td>Boot space (seats down)</td>
                                    <td>not available</td>
                                </tr>
                                <tr>
                                    <td>Wheelbase</td>
                                    <td>not available</td>
                                    <td>Boot space (seats up)</td>
                                    <td>not available</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="runningCostModal" tabindex="-1" aria-labelledby="runningCostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="runningCostModalLabel">Running Cost (<b>Important</b>)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td><b>Insurance Group</b></td>
                            <td>not available</td>
                        </tr>
                        <tr>
                            <td><b>Annual Tax</b></td>
                            <td>not available</td>
                        </tr>
                        <tr>
                            <td><b>CO<sub>2</sub> Emissions</b></td>
                            <td>not available</td>
                        </tr>
                        <tr>
                            <td><b>Fuel Consumption Combined</b></td>
                            <td>not available</td>
                        </tr>
                        <tr>
                            <td><b>Fuel Consumption Extra Urban</b></td>
                            <td>not available</td>
                        </tr>
                        <tr>
                            <td><b>Fuel Consumption Urban</b></td>
                            <td>not available</td>
                        </tr>
                        <tr>
                            <td><b>Minimum Kerb Weight</b></td>
                            <td>not available</td>
                        </tr>
                        <tr>
                            <td><b>Zero To Sixty Mph</b></td>
                            <td>not available</td>
                        </tr>
                        <tr>
                            <td><b>Zero To Sixty Two Mph</b></td>
                            <td>not available</td>
                        </tr>
                        <tr>
                            <td><b>Cylinders</b></td>
                            <td>not available</td>
                        </tr>
                        <tr>
                            <td><b>Valves</b></td>
                            <td>not available</td>
                        </tr>
                        <tr>
                            <td><b>EnginePower</b></td>
                            <td>not available</td>
                        </tr>
                        <tr>
                            <td><b>Top Speed</b></td>
                            <td>not available</td>
                        </tr>
                        <tr>
                            <td><b>Engine Torque</b></td>
                            <td>not available</td>
                        </tr>
                        <tr>
                            <td><b>Vehicle Height</b></td>
                            <td>not available</td>
                        </tr>
                        <tr>
                            <td><b>Vehicle Length</b></td>
                            <td>not available</td>
                        </tr>
                        <tr>
                            <td><b>Vehicle Width</b></td>
                            <td>not available</td>
                        </tr>
                        <tr>
                            <td><b>Wheelbase</b></td>
                            <td>not available</td>
                        </tr>
                        <tr>
                            <td><b>Fuel Tank Capacity</b></td>
                            <td>not available</td>
                        </tr>
                        <tr>
                            <td><b>Gross Vehicle Weight</b></td>
                            <td>not available</td>
                        </tr>
                        <tr>
                            <td><b>Bootspace Seats Up</b></td>
                            <td>not available</td>
                        </tr>
                        <tr>
                            <td><b>Vehicle Width Incl Mirrors</b></td>
                            <td>not available</td>
                        </tr>
                        <tr>
                            <td><b>Max Loading Weight</b></td>
                            <td>not available</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- <div class="modal fade" id="historyCheckModal" tabindex="-1" aria-labelledby="historyCheckModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="historyCheckModalLabel">Running Cost</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Insurance Group</td>
                            <td>not available</td>
                        </tr>
                        <tr>
                            <td>Annual Tax</td>
                            <td>not available</td>
                        </tr>
                        <tr>
                            <td>CO<sub>2</sub> Emissions</td>
                            <td>not available</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> -->
