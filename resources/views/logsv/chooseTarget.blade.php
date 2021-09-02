@extends('main.headerFooter')
@section('content')
@extends('main.menu')


<!-- Modal New Target -->
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
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End:: Modal Detail Target -->



					<!--begin::Content-->
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!-- body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-static page-loading"-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
                                <center>
                                    <!--begin::Notice-->
                                    @if($errors->any())
                                    <div class="alert alert-custom alert-light-danger alert-shadow gutter-b py-3 px-8" role="alert">
                                        <div class="alert-text text-danger">
                                        @foreach($errors->all() as $error)
                                        {{$error}}<br>
                                        @endforeach
                                        </div>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="ki ki-close icon-xs"></i></span>
                                            </button>
                                        </div>
                                    </div> 
                                    @endif
                                    @if(Session('message'))
                                    <div class="alert alert-custom alert-light-success alert-shadow gutter-b py-3 px-8" role="alert">
                                        <div class="alert-text text-success">{{session('message')}}</div><br>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="ki ki-close icon-xs"></i></span>
                                            </button>
                                        </div>
                                    </div>  
                                    @endif
                                </center>
                            
								<!--end::Notice-->
								<!--begin::Card-->
								<div class="card card-custom">
									<div class="card-header flex-wrap py-5">
										<div class="card-title">
											<h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">LOG SURVEILLANCE</h2>
                                            <!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
											<li class="breadcrumb-item text-muted">
												<a href="logsv" class="text-muted">Choose Target</a>
											</li>
										</ul>
										<!--end::Breadcrumb-->
										</div>
										<div class="card-toolbar">										
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
									</div>
									<div class="card-body">
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom table-checkable" id="kt_target" >
											<thead>
												<tr>
													<th>NO</th>
													<th>TARGET</th>
													<th>NIK</th>
                                                    <th>PLACE OF BIRTH</th>
                                                    <th>DATE OF BIRTH</th>
													<th>GENDER</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
                                                <?php $no= 1 ?>
                                                @foreach ($data as $data) 
												<tr>
													<td>{{$no++}}</td>
													<td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-60 symbol-circle symbol-lg flex-shrink-0">
                                                                <img class="" 
                                                                @if($data->avatar == null) 
                                                                src="../resources/media/users/blank.png"
                                                                @else
                                                                src="{{$data->avatar}}"
                                                                @endif
                                                                 alt="photo">
                                                            </div>
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
                                                        <a href="#detailTargetModal" class="btn btn-sm btn-clean btn-icon mr-2 btn-navi"  title="Details" data-toggle="modal" data-target="#detailTargetModal" id="_id" data-id='{{$data->_id}}'>
                                                            <span class="svg-icon">
                                                                <i class="flaticon-list-1"></i>
                                                            </span>
                                                        </a>
                                                        <a href="newLog/{{$data->_id}}" id="newLog" onclick="return confirm('Choose this Target?')" class="btn btn-sm btn-clean btn-icon" title="Choose Target">
                                                            <span class="svg-icon">
                                                                <i class="flaticon2-checkmark"></i>
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
								<!--end::Card-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
                    </div>    
@endsection


<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript">
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
    

</script>




