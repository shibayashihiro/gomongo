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
    <p>
        {{$stock->key_information}}}
    </p>
</div>

<div class="modal fade" id="extraFeatureModal" tabindex="-1" aria-labelledby="extraFeatureModalLabel" aria-hidden="true">
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
                    @if(!empty($stock->feature))
                    @php
                    $description = json_decode($stock->feature);
                    @endphp
                    @foreach($description as $key=>$value)
                    <li>{{$value->description}}</li>
                    @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="specificationModal" tabindex="-1" aria-labelledby="specificationModalLabel" aria-hidden="true">
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
                        // $driverConvenience = array_filter($specification->techData->standardFeatures, function($value) {
                        // return $value->category === "Audio and Communications" || $value->category === "Drivers Assistance";
                        // });
                        @endphp
                        <div class="row">
                            {{-- @foreach($driverConvenience as $key=>$value) --}}
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
                        // $driverConvenience = array_filter($specification->techData->standardFeatures, function($value) {
                        // return $value->category === "Safety and Security" || $value->category === "Illumination";
                        // });
                        @endphp
                        <div class="row">
                            {{-- @foreach($driverConvenience as $key=>$value) --}}
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
                        // $driverConvenience = array_filter($specification->techData->standardFeatures, function($value) {
                        // return $value->category === "Exterior";
                        // });
                        @endphp
                        <div class="row">
                            {{-- @foreach($driverConvenience as $key=>$value) --}}
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
                        // $driverConvenience = array_filter($specification->techData->standardFeatures, function($value) {
                        // return $value->category === "Interior";
                        // });
                        @endphp
                        <div class="row">
                            {{-- @foreach($driverConvenience as $key=>$value) --}}
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
                        // $driverConvenience = array_filter($specification->techData->standardFeatures, function($value) {
                        // return $value->category === "Performance";
                        // });
                        @endphp
                        <div class="row">
                            {{-- @foreach($driverConvenience as $key=>$value) --}}
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
                <h5 class="modal-title" id="runningCostModalLabel">Running Cost</h5>
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