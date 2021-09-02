@extends('main.headerFooter')
@section('content')
@extends('main.menu')

<!-- Modal New Target-->
<div class="modal fade" id="newTargetModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="newTargetModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Target</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="fetched-data-new"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
                <button type="submit" form="addTarget" class="btn btn-primary font-weight-bold"><span class="svg-icon">
                    <i class="flaticon2-add px-1"></i>
                </span>Add Target</button>
            </div>
        </div>
    </div>
</div>
<!-- End:: Modal New Target -->

<!-- Modal Detail Target-->
<div class="modal fade" id="detailTargetModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="detailTargetModal" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profilModalLabel">Detail Target</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="fetched-data-detail"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
                
            </div>
        </div>
    </div>
</div>
<!-- End:: Modal Profil Target -->


<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid mt-25" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h2 class="text-dark font-weight-bold mt-2 mb-2 mr-5">New Log</h2>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                <!--end::Separator-->
                <!--begin::Search Form-->
                <div class="d-flex align-items-center" id="kt_subheader_search">
                    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Add target activity and submit</span>
                </div>
                <!--end::Search Form-->
            </div>
            <!--end::Details-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom card-border card-transparent">
                <div class="card-body p-0">
                    <!--begin::Wizard-->
                    <div class="wizard wizard-4" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="true">
                        <!--begin::Wizard Nav-->
                        <div class="wizard-nav">
                            <div class="wizard-steps">
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">1</div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">Target Group & Date</div>
                                            <div class="wizard-desc">Target's Group & Date Selection</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">2</div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">Activity</div>
                                            <div class="wizard-desc">Target's Activity Details</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">3</div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">Case Agent & SV Team</div>
                                            <div class="wizard-desc">Target's Case Agent & Surveillance Team</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Nav-->
                        <!--begin::Card-->
                        <div class="card card-custom card-shadowless rounded-top-0">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-10">
                                        <!--begin::Wizard Form-->
                                            {{ Form::open(['url' => 'addLog', 'id' => 'kt_form', 'enctype'=>'multipart/form-data']) }}
                                            {{csrf_field()}}
                                            <div class="row justify-content-center">
                                                <div class="col-xl-9">
                                                    <!--begin::Wizard Step 1-->
                                                    <div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
                                                        <h5 class="text-dark font-weight-bold mb-10">Choose Target Group:</h5>
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Target Group</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                {{ Form::select('targetGroupName', $targetGroupList, '', array('class'=>'form-control  selectpicker', 'id'=> 'targetGroupName', 'data-live-search'=>'true', 'data-size'=>'7', 'placeholder'=>'')) }}
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-xl-3 col-lg-3">Date</label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <div class="input-group date">
                                                                    {{ Form::text('activityDate', '',['class' => 'form-control ', 'placeholder'=>'Select date', 'readonly'=>'true', 'id' => 'kt_datepicker_2']) }}
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-calendar-check-o"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                    </div>
                                                    <!--end::Wizard Step 1-->
                                                    <!--begin::Wizard Step 2-->
                                                    <div class="my-5 step" data-wizard-type="step-content">
                                                        <!--begin::repeater-->
                                                        <div id="kt_repeater_1">
                                                            <div data-repeater-list="data" class="col-xl-12 col-xxl-10">
                                                                <div data-repeater-item="" class=" mb-20">
                                                                    <h5 class="text-dark font-weight-bold mb-10 mt-5">Target's Activity Details</h5>
                                                                    <!--begin::Group-->
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-xl-3 col-lg-3">Time</label>
                                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                    
                                                                                    {{ Form::time('activityTime', '',['class' => 'form-control  activityTime', 'id'=>'activityTime',  'step' => '2']) }}
                                                                                        
                                                                                </div>
                                                                    </div>
                                                                    <!--end::Group-->
                                                                    <!--begin::Group-->
                                                                    
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-xl-3 col-lg-3">Activity</label>
                                                                        <div class="col-xl-9 col-lg-9 col-form-label">
                                                                            {{ Form::select('activity', $activityList, '', array('class'=>'form-control ', 'id'=> 'activity', 'placeholder'=>'')) }}
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Group-->
                                                                    <!--begin::Group-->
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-xl-3 col-lg-3">Activity Details</label>
                                                                        <div class="col-xl-9 col-lg-9">
                                                                            {{ Form::textarea('activityDetail', '',['class' => 'form-control ', 'placeholder'=>'Activity Detail', 'id' => 'activityDetail', 'rows'=>4]) }}
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Group-->
                                                                    <div class="separator separator-dashed my-10"></div>
                                                                    <h5 class="text-dark font-weight-bold mb-10">Access Point</h5>
                                                                    <!--begin::Group-->
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-xl-3 col-lg-3">Province</label>
                                                                        <div class="col-xl-9 col-lg-9">
                                                                            {{ Form::select('province', $provinceList, '', array('class'=>'form-control  select2 province', 'id'=> 'province1', 'placeholder'=>'', 'style'=>'width:100%')) }}
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Group-->
                                                                    <!--begin::Group-->
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-xl-3 col-lg-3">District</label>
                                                                        <div class="col-xl-9 col-lg-9">
                                                                            {{ Form::select('district', [''=>''], '', array('class'=>'form-control select2 district', 'id'=> 'district1', 'placeholder'=>'', 'style'=>'width:100%')) }}
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Group-->
                                                                    <!--begin::Group-->
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-xl-3 col-lg-3">Sub District</label>
                                                                        <div class="col-xl-9 col-lg-9">
                                                                            {{ Form::select('subdistrict', [''=>''], '', array('class'=>'form-control select2 subdistrict', 'id'=> 'subdistrict1', 'placeholder'=>'', 'style'=>'width:100%')) }}
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Group-->
                                                                    <!--begin::Group-->
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-xl-3 col-lg-3">Village</label>
                                                                        <div class="col-xl-9 col-lg-9">
                                                                            {{ Form::select('village', [''=>''], '', array('class'=>'form-control  select2 village', 'id'=> 'village1', 'placeholder'=>'', 'style'=>'width:100%')) }}
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Group-->
                                                                    <!--begin::Group-->
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-xl-3 col-lg-3">Place</label>
                                                                        <div class="col-xl-9 col-lg-9">
                                                                            {{ Form::text('place', '',['class' => 'form-control  select2', 'placeholder'=>'Place Name', 'id' => 'place']) }}
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Group-->
                                                                    <div class="separator separator-dashed my-10"></div>
                                                                    <h5 class="text-dark font-weight-bold mb-10">Coordinat</h5>
                                                                    <!--begin::Group-->
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-xl-3 col-lg-3">Latitude</label>
                                                                        <div class="col-xl-9 col-lg-9">
                                                                            {{ Form::text('latitude', '',['class' => 'form-control ', 'placeholder'=>'Latitude', 'id' => 'latitude']) }}
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Group-->
                                                                    <!--begin::Group-->
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-xl-3 col-lg-3">Longitude</label>
                                                                        <div class="col-xl-9 col-lg-9">
                                                                            {{ Form::text('longitude', '',['class' => 'form-control ', 'placeholder'=>'Longitude', 'id' => 'longitude']) }}
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Group-->
                                                                    <div class="separator separator-dashed my-10"></div>
                                                                    <h5 class="text-dark font-weight-bold mb-10">CGI/eCGI</h5>
                                                                    <!--begin::Group-->
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-xl-3 col-lg-3">Provider</label>
                                                                        <div class="col-xl-9 col-lg-9 col-form-label">
                                                                            {{ Form::select('provider', $providerList, '', array('class'=>'form-control ', 'id'=> 'provider', 'placeholder'=>'')) }}
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Group-->
                                                                    <!--begin::Group-->
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-xl-3 col-lg-3">Band</label>
                                                                        <div class="col-xl-9 col-lg-9 col-form-label">
                                                                            {{ Form::select('band', $bandList, '', array('class'=>'form-control ', 'id'=> 'band', 'placeholder'=>'')) }}
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Group-->
                                                                    <!--begin::Group-->
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-xl-3 col-lg-3">Gnodeid/Enodebid/Lac</label>
                                                                        <div class="col-xl-9 col-lg-9">
                                                                            {{ Form::text('gel', '',['class' => 'form-control ', 'placeholder'=>'Gnodeid/Enodebid/Lac', 'id' => 'gel']) }}
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Group-->
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-xl-3 col-lg-3">Cellid</label>
                                                                        <div class="col-xl-9 col-lg-9">
                                                                            {{ Form::text('cellid', '',['class' => 'form-control ', 'placeholder'=>'Cellid', 'id' => 'cellid']) }}
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Group-->
                                                                    <div class="separator separator-dashed my-10"></div>
                                                                    <h5 class="text-dark font-weight-bold mb-10">Vehicle</h5>
                                                                    <!--begin::Group-->
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-xl-3 col-lg-3">Vehicle</label>
                                                                        <div class="col-xl-9 col-lg-9 col-form-label">
                                                                            {{ Form::select('vehicleType', $vehicleList, '', array('class'=>'form-control ', 'id'=> 'vehicleType', 'placeholder'=>'')) }}
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Group-->
                                                                    <!--begin::Group-->
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-xl-3 col-lg-3">Vehicle</label>
                                                                        
                                                                            <div class="col-2 col-form-label ml-1 mr-1">{{ Form::text('vehicleNumber1', '',['class' => 'form-control', 'placeholder'=>'B', 'id' => 'vehicleNumber1', 'style'=>'text-align:center;']) }}</div>
                                                                            <div class="col-2 col-form-label mr-1">{{ Form::text('vehicleNumber2', '',['class' => 'form-control', 'placeholder'=>'1234', 'id' => 'vehicleNumber2', 'style'=>'text-align:center;']) }}</div>
                                                                            <div class="col-2 col-form-label">{{ Form::text('vehicleNumber3', '',['class' => 'form-control', 'placeholder'=>'ABC', 'id' => 'vehicleNumber3', 'style'=>'text-align:center;']) }}</div>
                                                                        
                                                                        
                                                                    </div>
                                                                    <!--end::Group-->
                                                                    <div class="separator separator-dashed my-10"></div>
                                                                    <h5 class="text-dark font-weight-bold mb-10">In associate</h5>
                                                                    <!--begin::Group-->
                                                                    <div class="form-group row">
                                                                        <div class="col-xl-12 col-lg-12">

                                                                                <div class="d-flex align-items-end flex-column mb-10">										
                                                                                    <!--begin::Button-->
                                                                                    <!-- Button trigger modal-->
                                                                                    <button type="button" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#newTargetModal" data-id=''>
                                                                                        <span class="navi-icon">
                                                                                            <i class="flaticon2-add px-1"></i>
                                                                                        </span>
                                                                                        New Target
                                                                                    </button>
                                                                                    <!--end::Button-->
                                                                                </div>
                                                                            <!--begin: Datatable-->
                                                                            <table class="table table-separate table-head-custom table-checkable" id="kt_target" >
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th><b>SELECT</b></th>
                                                                                        <th>TARGET</th>
                                                                                        <th>NIK</th>
                                                                                        <th>PLACE OF BIRTH</th>
                                                                                        <th>DATE OF BIRTH</th>
                                                                                        <th>GENDER</th>
                                                                                        <th>Actions</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td><label class="radio">
                                                                                            {{ Form::radio('inassociate', 'UNKNOWN MALE' ,['class' => 'radio', 'id' => 'inassociate', 'checked'=>true]) }}
                                                                                            <span></span></label></td>
                                                                                        <td>
                                                                                                <div class="ml-4">
                                                                                                    <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">UNKNOWN MALE</div>
                                                                                                    <a href="#" class="text-muted font-weight-bold text-hover-primary"></a>
                                                                                                </div>
                                                                                            
                                                                                        </td>
                                                                                        <td>-</td>
                                                                                        <td>-</td>
                                                                                        <td>-</td>
                                                                                        <td>-</td>
                                                                                        <td>-</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><label class="radio">
                                                                                            {{ Form::radio('inassociate', 'UNKNOWN FEMALE' ,['class' => 'radio', 'id' => 'inassociate']) }}
                                                                                            <span></span></label></td>
                                                                                        <td>
                                                                                                <div class="ml-4">
                                                                                                    <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">UNKNOWN FEMALE</div>
                                                                                                    <a href="#" class="text-muted font-weight-bold text-hover-primary"></a>
                                                                                                </div>
                                                                                            
                                                                                        </td>
                                                                                        <td>-</td>
                                                                                        <td>-</td>
                                                                                        <td>-</td>
                                                                                        <td>-</td>
                                                                                        <td>-</td>
                                                                                    </tr>
                                                                                    @foreach ($data as $data) 
                                                                                    <tr>
                                                                                        <td><label class="radio">
                                                                                            {{ Form::radio('inassociate', $data->fullname ,['class' => 'radio', 'id' => 'inassociate']) }}
                                                                                            <span></span></label></td>
                                                                                        <td>
                                                                                            <div class="d-flex align-items-center">
                                                                                                <!--div class="symbol symbol-60 symbol-circle symbol-lg flex-shrink-0">
                                                                                                    <img class="" 
                                                                                                    @if($data->avatar == null) 
                                                                                                    src="{{asset('media/users/blank.png')}}"
                                                                                                    @else
                                                                                                    src="{{asset($data->avatar)}}"
                                                                                                    @endif
                                                                                                    alt="photo">
                                                                                                </div-->
                                                                                                <div class="ml-4">
                                                                                                    <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">{{$data->fullname}}</div>
                                                                                                    <a href="#" class="text-muted font-weight-bold text-hover-primary">{{ $data->asknownas[0] }}</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>{{$data->nik}}</td>
                                                                                        <td>{{$data->placeofbirth}}</td>
                                                                                        <td>{{$data->dateofbirth}}</td>
                                                                                        <td>{{$data->gender}}</td>
                                                                                        <td>
                                                                                            <a href="#detailTargetModal" class="btn btn-sm btn-clean btn-icon mr-2 btn-navi" title="Details" data-toggle="modal" data-target="#detailTargetModal" id="_id" data-id='{{$data->_id}}'>
                                                                                                <span class="svg-icon">
                                                                                                    <i class="flaticon-list-1"></i>
                                                                                                </span>
                                                                                            </a>
                                                                                        </td>
                                                                                    </tr>
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                            <!--end: Datatable-->
                                                                        </div>
                                                                    </div>
                                                                    <center>
                                                                    <div class="col-md-4 mt-10">
                                                                    <a href="javascript:;" data-repeater-delete="" onclick="confirm('Are you sure want to delete time?')" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                                    <i class="la la-trash-o"></i>Delete</a>
                                                                    </div>
                                                                    </center>
                                                                    <!--end::Group-->
                                                                    <div class="separator separator-dashed my-10"></div>
                                                                </div>
                                                                <!--end::repeater-data-->
                                                        </div>
                                                        <!--end::repeater-list-->
                                                        <div class="col-xl-12 mb-10">
                                                            <center>
                                                            <a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-success createRepeater">
                                                            <i class="flaticon-clock"></i>Add time</a>
                                                            </center>
                                                        </div>
                                                    </div>
                                                    <!--end::repeater-->
                                                    </div>
                                                    <!--end::Wizard Step 2-->
                                                    <!--begin::Wizard Step 3-->
                                                    <div class="my-5 step" data-wizard-type="step-content">
														<h5 class="text-dark font-weight-bold mb-10">Gallery</h5>
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-xl-3 col-lg-3">Upload Files:</label>
                                                            <div class="col-xl-9 col-lg-9 col-form-label">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input form-label" name="file[]" id="customFile" multiple/>
                                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                                </div>
                                                                <span class="form-text text-muted">Max file size is 1MB and max number of files is 5.</span>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <div class="separator separator-dashed my-10"></div>
                                                        <h5 class="mb-10 font-weight-bold text-dark">Case Agent & Surveillance Team</h5>
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Case Agent</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                            {{ Form::select('caseAgentName', $caseAgentList, '', array('class'=>'form-control  selectpicker', 'data-live-search'=>'true', 'data-size'=>'7', 'id'=> 'caseAgentName', 'placeholder'=>' ')) }}
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Surveillance Team</label>
                                                            <div class="col-lg-9 col-xl-9" id="sv">
                                                            {{ Form::select('svteam[]', $svopList, '', array('class'=>'form-control  selectpicker', 'data-live-search'=>'true', 'data-size'=>'5', 'id'=> 'svteam', 'multiple'=>'true')) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Wizard Step 3-->
                                                    <!--begin::Wizard Actions-->
                                                    <div class="d-flex justify-content-between border-top pt-10 mt-15">
                                                        <div class="mr-2">
                                                            <button type="button" id="prev-step" class="btn btn-light-primary font-weight-bolder px-9 py-4" data-wizard-type="action-prev">Previous</button>
                                                        </div>
                                                        <div>
                                                            <button type="button" class="btn btn-success font-weight-bolder px-9 py-4" data-wizard-type="action-submit">Submit</button>
                                                            <button type="button"  id="next-step" class="btn btn-primary font-weight-bolder px-9 py-4" data-wizard-type="action-next">Next</button>
                                                            <input type="hidden" name="_id" value="{{$target->_id}}">
                                                        </div>
                                                    </div>
                                                    <!--end::Wizard Actions-->
                                                </div>
                                            </div> 
                                        {{ Form::close() }}
                                        <!--end::Wizard Form-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Wizard-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->




<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/pages/custom/target/add-target.js')}}"></script>
<script src="{{asset('js/pages/custom/logsv/new-log.js')}}"></script>
<!--begin::Page Scripts(used New Log page)-->
<!--end::Page Scripts-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('js/pages/crud/forms/widgets/select2.js')}}"></script>
<!--end::Page Scripts-->
<script type="text/javascript">



/*$(function(e){
    
    $('.activityTime').timepicker({
            defaultTime: false,
            minuteStep: 1,
            showSeconds: true,
            showMeridian: false
        });


    $('.createRepeater').click(function(){
        $(".activityTime").timepicker(
            {
                defaultTime: false,
                minuteStep: 1,
                showSeconds: true,
                showMeridian: false
            }
        );
    })

});
*/


    $(function(e) {
    $(document).on('show.bs.modal', 
    '#newTargetModal',
        function(e) {
            var _id = $(e.relatedTarget).data('id').toString();
            $.ajax({
                type : 'POST',
                url : "{{ route('newTarget') }}",
                data :  {_token:"{{csrf_token()}}", data: _id },
                success : function(data){
                $('.fetched-data-new').html(data);
                }
            });
        });
    });

    $(function(e) {
    $(document).on('show.bs.modal', 
    '#detailTargetModal',
        function(e) {
            var _id = $(e.relatedTarget).data('id').toString();
            $.ajax({
                type : 'POST',
                url : "{{ route('detailTarget') }}",
                data :  {_token:"{{csrf_token()}}", data: _id },
                success : function(data){
                $('.fetched-data-detail').html(data);
                }
            });
        });
    });

    $(function () {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    
    $('#province1').on('change', function () {
        $.ajax({
            url: "{{ route('getDistrict') }}",
            method: 'POST',
            data: {provinceNo: $(this).val()},
            success: function (response) {
                $('#district1').empty();
                $('#subdistrict1').empty();
                $('#village1').empty();
                $.each(response, function (districtNo, districtName) {
                    $('#district1').append(new Option(districtName, districtNo))
                })
            }
        })
    });

    $('#district1').on('change', function () {
        var provNo = document.getElementById('province1').value;
        //alert(provNo);
        $.ajax({
            url: "{{ route('getSubdistrict') }}",
            method: 'POST',
            data: {districtNo: $(this).val(), provinceNo: provNo},
            success: function (response) {
                $('#subdistrict1').empty();
                $('#village1').empty();
                $.each(response, function (subdistrictNo, subdistrictName) {
                    $('#subdistrict1').append(new Option(subdistrictName, subdistrictNo))
                })
            }
        })
    });

    $('#subdistrict1').on('change', function () {
        var provNo = document.getElementById('province1').value;
        var distNo = document.getElementById('district1').value;
        //alert(provNo);
        $.ajax({
            url: "{{ route('getVillage') }}",
            method: 'POST',
            data: {subdistrictNo: $(this).val(), districtNo: distNo, provinceNo: provNo},
            success: function (response) {
                $('#village1').empty();
                $.each(response, function (villageNo, villageName) {
                    $('#village1').append(new Option(villageName, villageNo))
                })
            }
        })
    });



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      
    var i =1;
    $('#kt_repeater_1').repeater({
            
            initEmpty: false,
           
            defaultValues: {
                'text-input': 'foo'
            },
             
            show: function () {
                $(this).slideDown(function(){
                
                //Begin:: Validate repeater form

                $(this).find('#latitude').on('change', function()
                {
                    var latitude = $(this).val();
                    var regex = /^[\-\.0-9]*$/;
                    if(regex.test(latitude) == false)
                    {
                        
                        $(this).css("cssText", "border-color: red !important;");
                        $('#msglatitude').remove();
                        $(this).after('<div id="msglatitude" class="text-danger font-size-sm">Wrong latitude format</div>');
                        $('#next-step').on('click', function()
                        {
                            Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-light"
							}
                            }).then(function () {
                                document.getElementById("prev-step").click();
                                KTUtil.scrollTop();
                            });
                        });
                        
                        return false;
                    }
                    else
                    {
                        $(this).css("cssText", "border-color: muted !important;");
                        $('#msglatitude').remove();
                    }
                }
                );

                $(this).find('#longitude').on('change', function()
                {
                    var longitude = $(this).val();
                    var regex = /^[\.0-9]*$/;
                    if(regex.test(longitude) == false)
                    {
                        
                        $(this).css("cssText", "border-color: red !important;");
                        $('#msglongitude').remove();
                        $(this).after('<div id="msglongitude" class="text-danger font-size-sm">Wrong longitude format</div>');
                        $('#next-step').on('click', function()
                        {
                            Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-light"
							}
                            }).then(function () {
                                document.getElementById("prev-step").click();
                                KTUtil.scrollTop();
                            });
                        });
                        
                        return false;
                    }
                    else
                    {
                        $(this).css("cssText", "border-color: muted !important;");
                        $('#msglongitude').remove();
                    }
                }
                );

                $(this).find('#vehicleNumber1').on('change', function()
                {
                    var vehicleNumber1 = $(this).val();
                    var regex = /^[A-Z]{1,2}$/;
                    if(regex.test(vehicleNumber1) == false)
                    {
                        
                        $(this).css("cssText", "border-color: red !important;");
                        $('#msgvn1').remove();
                        $(this).after('<div id="msgvn1" class="text-danger font-size-sm">Max 2 letter & uppercase</div>');
                        $('#next-step').on('click', function()
                        {
                            Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-light"
							}
                            }).then(function () {
                                document.getElementById("prev-step").click();
                                KTUtil.scrollTop();
                            });
                        });
                        
                        return false;
                    }
                    else
                    {
                        $(this).css("cssText", "border-color: muted !important;");
                        $('#msgvn1').remove();
                    }
                }
                );

                $(this).find('#vehicleNumber2').on('change', function()
                {
                    var vehicleNumber2 = $(this).val();
                    var regex = /^[0-9]{1,4}$/;
                    if(regex.test(vehicleNumber2) == false)
                    {
                        
                        $(this).css("cssText", "border-color: red !important;");
                        $('#msgvn2').remove();
                        $(this).after('<div id="msgvn2" class="text-danger font-size-sm">4 number only</div>');
                        $('#next-step').on('click', function()
                        {
                            Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-light"
							}
                            }).then(function () {
                                document.getElementById("prev-step").click();
                                KTUtil.scrollTop();
                            });
                        });
                        
                        return false;
                    }
                    else
                    {
                        $(this).css("cssText", "border-color: muted !important;");
                        $('#msgvn2').remove();
                    }
                }
                );

                $(this).find('#vehicleNumber3').on('change', function()
                {
                    var vehicleNumber3 = $(this).val();
                    var regex = /^[A-Z]{1,3}$/;
                    if(regex.test(vehicleNumber3) == false)
                    {
                        
                        $(this).css("cssText", "border-color: red !important;");
                        $('#msgvn3').remove();
                        $(this).after('<div id="msgvn3" class="text-danger font-size-sm">4 number only</div>');
                        $('#next-step').on('click', function()
                        {
                            Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-light"
							}
                            }).then(function () {
                                document.getElementById("prev-step").click();
                                KTUtil.scrollTop();
                            });
                        });
                        
                        return false;
                    }
                    else
                    {
                        $(this).css("cssText", "border-color: muted !important;");
                        $('#msgvn3').remove();
                    }
                }
                );

                //End:: Validate repeater form

                var j= i+1;

                $('.select2-container').remove();
                
                /*$('.province').select2({
                placeholder: "Select Province",
                allowClear: true,
                });
                $('.district').select2({
                placeholder: "Select District",
                allowClear: true,
                });
                $('.subdistrict').select2({
                placeholder: "Select Subdistrict",
                allowClear: true,
                });
                $('.village').select2({
                placeholder: "Select Village",
                allowClear: true,
                });
                */
                $(this).find('#province1').attr({'id': 'province'+j, 'data-select2-id': 'province'+j});
                $(this).find('#district1').attr({'id': 'district'+j, 'data-select2-id': 'district'+j});
                $(this).find('#subdistrict1').attr({'id': 'subdistrict'+j, 'data-select2-id': 'subdistrict'+j});
                $(this).find('#village1').attr({'id': 'village'+j, 'data-select2-id': 'village'+j});
                $('.select2-container').css('width','100%');

                for(var x=0; x<=j; x++)
                {
                    $('#province'+x).select2({
                    placeholder: "Select Province",
                    allowClear: true,
                    });
                    $('#district'+x).select2({
                    placeholder: "Select District",
                    allowClear: true,
                    });
                    $('#subdistrict'+x).select2({
                    placeholder: "Select Subdistrict",
                    allowClear: true,
                    });
                    $('#village'+x).select2({
                    placeholder: "Select Village",
                    allowClear: true,
                    });
                }

                /*$('#province'+j).select2({
                placeholder: "Select Province",
                allowClear: true,
                });
                $('#district'+j).select2({
                placeholder: "Select District",
                allowClear: true,
                });
                $('#subdistrict'+j).select2({
                placeholder: "Select Subdistrict",
                allowClear: true,
                });
                $('#village'+j).select2({
                placeholder: "Select Village",
                allowClear: true,
                });
                */

                        $.ajaxSetup({
                            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                        });

                        
                        $('#province'+i).on('change', function () {
                            $.ajax({
                                url: "{{ route('getDistrict') }}",
                                method: 'POST',
                                data: {provinceNo: $(this).val(), _token:"{{csrf_token()}}"},
                                success: function (response) {
                                    $('#district'+i).empty();
                                    $('#subdistrict'+i).empty();
                                    $('#village'+i).empty();
                                    $.each(response, function (districtNo, districtName) {
                                        $('#district'+i).append(new Option(districtName, districtNo))
                                    })
                                }
                            })
                        });
                    
                        $('#district'+i).on('change', function () {
                            var provNo = document.getElementById('province'+i).value;
                            //alert(provNo);
                            $.ajax({
                                url: "{{ route('getSubdistrict') }}",
                                method: 'POST',
                                data: {districtNo: $(this).val(), provinceNo: provNo, _token:"{{csrf_token()}}"},
                                success: function (response) {
                                    $('#subdistrict'+i).empty();
                                    $('#village'+i).empty();
                                    $.each(response, function (subdistrictNo, subdistrictName) {
                                        $('#subdistrict'+i).append(new Option(subdistrictName, subdistrictNo))
                                    })
                                }
                            })
                        });
                    
                        $('#subdistrict'+i).on('change', function () {
                            var provNo = document.getElementById('province'+i).value;
                            var distNo = document.getElementById('district'+i).value;
                            //alert(provNo);
                            $.ajax({
                                url: "{{ route('getVillage') }}",
                                method: 'POST',
                                data: {subdistrictNo: $(this).val(), districtNo: distNo, provinceNo: provNo, _token:"{{csrf_token()}}"},
                                success: function (response) {
                                    $('#village'+i).empty();
                                    $.each(response, function (villageNo, villageName) {
                                        $('#village'+i).append(new Option(villageName, villageNo))
                                    })
                                }
                            })
                        });
                    
                        
                        $('#province'+j).on('change', function () {
                            $.ajax({
                                url: "{{ route('getDistrict') }}",
                                method: 'POST',
                                data: {provinceNo: $(this).val(), _token:"{{csrf_token()}}"},
                                success: function (response) {
                                    $('#district'+j).empty();
                                    $('#subdistrict'+j).empty();
                                    $('#village'+j).empty();
                                    $.each(response, function (districtNo, districtName) {
                                        $('#district'+j).append(new Option(districtName, districtNo))
                                    })
                                }
                            })
                        });
                    
                        $('#district'+j).on('change', function () {
                            var provNo = document.getElementById('province'+j).value;
                            //alert(provNo);
                            $.ajax({
                                url: "{{ route('getSubdistrict') }}",
                                method: 'POST',
                                data: {districtNo: $(this).val(), provinceNo: provNo, _token:"{{csrf_token()}}"},
                                success: function (response) {
                                    $('#subdistrict'+j).empty();
                                    $('#village'+j).empty();
                                    $.each(response, function (subdistrictNo, subdistrictName) {
                                        $('#subdistrict'+j).append(new Option(subdistrictName, subdistrictNo))
                                    })
                                }
                            })
                        });
                    
                        $('#subdistrict'+j).on('change', function () {
                            var provNo = document.getElementById('province'+j).value;
                            var distNo = document.getElementById('district'+j).value;
                            //alert(provNo);
                            $.ajax({
                                url: "{{ route('getVillage') }}",
                                method: 'POST',
                                data: {subdistrictNo: $(this).val(), districtNo: distNo, provinceNo: provNo, _token:"{{csrf_token()}}"},
                                success: function (response) {
                                    $('#village'+j).empty();
                                    $.each(response, function (villageNo, villageName) {
                                        $('#village'+j).append(new Option(villageName, villageNo))
                                    })
                                }
                            })
                        });
                    
                    i++;

                
            })
            },

            hide: function (deleteElement) {                
                $(this).slideUp(deleteElement);                 
            },
            isFirstItemUndeletable: true
        });


});

</script>


