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
                    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Add target activity</span>
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
                        <!--begin::Card-->
                        <div class="card card-custom card-shadowless rounded-top-0">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-10">
                                        <!--begin::Wizard Form-->
                                            {{ Form::open(['url' => 'addLog2', 'id' => 'kt_form', 'enctype'=>'multipart/form-data']) }}
                                            <div class="row justify-content-center">
                                                <div class="col-xl-9">
                                                    <div class="my-5">
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
                                                                            {{ Form::select('province', $provinceList, '', array('class'=>'form-control  select2', 'id'=> 'province', 'placeholder'=>'', 'style'=>'width:100%')) }}
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Group-->
                                                                    <!--begin::Group-->
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-xl-3 col-lg-3">District</label>
                                                                        <div class="col-xl-9 col-lg-9">
                                                                            {{ Form::select('district', [''=>''], '', array('class'=>'form-control select2', 'id'=> 'district', 'placeholder'=>'', 'style'=>'width:100%')) }}
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Group-->
                                                                    <!--begin::Group-->
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-xl-3 col-lg-3">Sub District</label>
                                                                        <div class="col-xl-9 col-lg-9">
                                                                            {{ Form::select('subdistrict', [''=>''], '', array('class'=>'form-control select2', 'id'=> 'subdistrict', 'placeholder'=>'', 'style'=>'width:100%')) }}
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Group-->
                                                                    <!--begin::Group-->
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-xl-3 col-lg-3">Village</label>
                                                                        <div class="col-xl-9 col-lg-9">
                                                                            {{ Form::select('village', [''=>''], '', array('class'=>'form-control  select2', 'id'=> 'village', 'placeholder'=>'', 'style'=>'width:100%')) }}
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
                                                                    
                                                        <!--end::Group-->
                                                    </div>
                                                    <div class="d-flex justify-content-center border-top pt-10 mt-15">
                                                       
                                                        <div>
                                                            <input type="submit" class="btn btn-danger font-weight-bolder px-9 py-4" value="Next">
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



<script src="{{asset('js/pages/custom/target/add-target.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('js/pages/crud/forms/widgets/select2.js')}}"></script>
<!--end::Page Scripts-->
<script type="text/javascript">



    
</script>


