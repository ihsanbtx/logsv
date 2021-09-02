@extends('main.headerFooter')
@section('content')
@extends('main.menu')


<!-- Modal Add CaseAgent -->
<div class="modal fade" id="addCaseAgentModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addCaseAgentModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCaseAgentModalLabel">New CaseAgent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="fetched-data-new"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
                <button type="submit" form="addCaseAgent" class="btn btn-primary font-weight-bold"><span class="svg-icon">
                    <i class="flaticon2-add px-1"></i>
                </span>Add CaseAgent</button>
            </div>
        </div>
    </div>
</div>
<!-- End:: Modal Add CaseAgent -->

<!-- Modal Edit CaseAgent-->
<div class="modal fade" id="editCaseAgentModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editCaseAgentModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Edit CaseAgent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="fetched-data-edit"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
                <button type="submit" form="editCaseAgent" class="btn btn-primary font-weight-bold">
                    <span class="svg-icon">
                    <i class="la la-save"></i>
                </span>Save Changes</button>
            </div>
        </div>
    </div>
</div>
<!-- End:: Modal Edit CaseAgent -->

<!-- Begin:: Modal Import -->
<div class="modal fade" id="importCaseAgentModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="importCaseAgentModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Import CaseAgent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="fetched-data-import"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
                <button type="submit" form="importCaseAgent" class="btn btn-primary font-weight-bold">
                    Import</button>
            </div>
        </div>
    </div>
</div>
<!-- End:: Modal Import -->

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
                                    @foreach($errors->all() as $error)
                                    <div class="alert-text text-danger">{{$error}}</div><br>
                                    @endforeach
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
											<h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">Form Setting</h2>
                                            <!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
											<li class="breadcrumb-item text-muted">
												<a href="svopList" class="text-muted">CaseAgent</a>
											</li>
										</ul>
										<!--end::Breadcrumb-->
										</div>
										<div class="card-toolbar">
											<!--begin::Import-->
											<div class="dropdown dropdown-inline mr-2">
                                                <button type="button" class="btn btn-light-primary font-weight-bolder px-2" data-toggle="modal" data-target="#importCaseAgentModal" data-id=''>
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-add px-0"></i>
                                                    </span>Import Excel</button>
                                        </div>
                                        <!--end::Import-->
											<!--begin::Button-->
                                            <!-- Button trigger modal-->
                                            <button type="button" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#addCaseAgentModal" data-id=''>
                                                <span class="svg-icon">
                                                    <i class="flaticon2-add px-1"></i>
                                                </span>
                                                New CaseAgent
                                            </button>
											<!--end::Button-->
										</div>
									</div>
									<div class="card-body">
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom table-checkable" id="kt_caseagentdatatable" >
											<thead>
												<tr>
													<th>NO</th>
													<th>ACTIVITY</th>
													<th>UPDATE BY</th>
													<th>ACTIONS</th>
												</tr>
											</thead>
											<tbody>
                                                <?php $no= 1 ?>
                                                @foreach ($data as $data) 
												<tr>
													<td>{{$no++}}</td>
													<td>{{$data->caseAgentName}}</td>
													<td>{{$data->updated_by}}</td>
													<td>
                                                        <a href="#editCaseAgentModal" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit CaseAgent" data-toggle="modal" data-target="#editCaseAgentModal" id="_id" data-id='{{$data->_id}}'>
                                                        <span class="svg-icon">
                                                            <i class="flaticon2-edit"></i>
                                                        </span>
                                                        </a>
                                                        <a href="deleteCaseAgent/{{$data->_id}}" id="deleteCaseAgent" onclick="return confirm('Delete CaseAgent?')" class="btn btn-sm btn-clean btn-icon" title="Delete">
                                                        <span class="svg-icon">
                                                            <i class="flaticon-delete"></i>
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

<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript">
$(function() {
        $(document).on('show.bs.modal', 
        '#addCaseAgentModal',
        function(e) {
            var _id = $(e.relatedTarget).data('id').toString();
            $.ajax({
                type : 'POST',
                url : "{{ route('newCaseAgent') }}",
                data :  {_token:"{{csrf_token()}}", data: _id},
                success : function(data){
                //$('.fetched-data', '#editCaseAgentModal').empty();
                //$('.fetched-data', '#importCaseAgentModal').empty();
                $('.fetched-data-new').html(data);
                }
            });
        });

        $(document).on('show.bs.modal', 
        '#editCaseAgentModal',
            function(e) {
                var _id = $(e.relatedTarget).data('id').toString();
                $.ajax({
                    type : 'POST',
                    url : "{{ route('editCaseAgent') }}",
                    data :  {_token:"{{csrf_token()}}", data: _id},
                    success : function(data){
                    //$('.modal-body', '#newCaseAgentModal').empty();
                    //$('.modal-body', '#importCaseAgentModal').empty();
                    $('.fetched-data-edit').html(data);
                    }
                });
            });


        $(document).on('show.bs.modal', 
        '#importCaseAgentModal',
            function(e) {
                var _id = $(e.relatedTarget).data('id').toString();
                $.ajax({
                    type : 'POST',
                    url : "{{ route('importCaseAgent') }}",
                    data :  {_token:"{{csrf_token()}}", data: _id},
                    success : function(data){
                    $('.fetched-data-import').html(data);
                    }
                });
        });

        /*var originalModal = $('#newCaseAgentModal').clone();
        $(document).on('#newCaseAgentModal', 'hidden.bs.modal', function () {
            $('#newCaseAgentModal').remove();
            var myClone = originalModal.clone();
            $('body').append(myClone);
        });*/

        
        /*$(document).on('hidden.bs.modal', '.modal', function (event) {
        $('.fetched-data', this).empty();
        });*/
        
});


</script>




