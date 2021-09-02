@extends('main.headerFooter')
@section('content')
@extends('main.menu')


<!-- Modal New User-->
<div class="modal fade" id="newUserModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="newUserModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="fetched-data-new"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
                <button type="submit" form="addUser" class="btn btn-primary font-weight-bold"><span class="svg-icon">
                    <i class="flaticon2-add px-1"></i>
                </span>Add User</button>
            </div>
        </div>
    </div>
</div>
<!-- End:: Modal New User -->

<!-- Modal Edit User-->
<div class="modal fade" id="editUserModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editUserModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="fetched-data-edit"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
                <button type="submit" form="editUser" class="btn btn-primary font-weight-bold">
                    <span class="svg-icon">
                    <i class="la la-save"></i>
                </span>Save Changes</button>
            </div>
        </div>
    </div>
</div>
<!-- End:: Modal Edit User -->

<!-- Begin:: Modal Import -->
<div class="modal fade" id="importUserModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="importUserModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Import User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="fetched-data-import"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
                <button type="submit" form="importUser" class="btn btn-primary font-weight-bold">
                    <span class="svg-icon">
                    <i class="flaticon-import"></i>
                </span>Import</button>
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
											<h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">User Management</h2>
                                            <!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
											<li class="breadcrumb-item text-muted">
												<a href="svopList" class="text-muted">User Lists</a>
											</li>
										</ul>
										<!--end::Breadcrumb-->
										</div>
										<div class="card-toolbar">											<!--begin::Import-->
											<div class="dropdown dropdown-inline mr-2">
                                                    <button type="button" class="btn btn-light-primary font-weight-bolder px-2" data-toggle="modal" data-target="#importUserModal" data-id=''>
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-add px-0"></i>
                                                        </span>Import Excel</button>
												
											</div>
											<!--end::Import-->
											<!--begin::Button-->
                                            <!-- Button trigger modal-->
                                            <button type="button" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#newUserModal" data-id=''>
                                                <span class="navi-icon">
                                                    <i class="flaticon2-add px-1"></i>
                                                </span>
                                                New User
                                            </button>
											<!--end::Button-->
										</div>
									</div>
									<div class="card-body">
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom table-checkable" id="kt_datatable" >
											<thead>
												<tr>
													<th>NO</th>
													<th>NRP</th>
													<th>FULLNAME</th>
                                                    <th>EMAIL</th>
                                                    <th>CASE AGENT</th>
													<th>USER TYPE</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
                                                <?php $no= 1 ?>
                                                @foreach ($data as $data) 
												<tr>
													<td>{{$no++}}</td>
													<td>{{$data->nrp}}</td>
													<td>{{$data->fullname}}</td>
                                                    <td>{{$data->email}}</td>
                                                    <td>{{$data->caseagent}}</td>
													<td>{{$data->usertype}}</td>
													<td>
                                                        <a href="resetPassword/{{$data->_id}}" class="btn btn-sm btn-clean btn-icon mr-2" title="Reset Password" onclick="return confirm('Reset Password?')">
                                                            <span class="svg-icon">
                                                                <i class="flaticon2-lock"></i>
                                                            </span>
                                                            </a>
                                                        <a href="#editUserModal" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details" data-toggle="modal" data-target="#editUserModal" id="_id" data-id='{{$data->_id}}'>
                                                        <span class="svg-icon">
                                                            <i class="flaticon2-edit"></i>
                                                        </span>
                                                        </a>
                                                        <a href="deleteUser/{{$data->_id}}" id="deleteUser" onclick="return confirm('Delete User?')" class="btn btn-sm btn-clean btn-icon" title="Delete">
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

<script src="../resources/js/bootstrap.min.js"></script>
<script src="../resources/js/jquery.min.js"></script>
<script type="text/javascript">
$(function(e) {
    $(document).on('show.bs.modal', 
    '#newUserModal',
        function(e) {
            var _id = $(e.relatedTarget).data('id').toString();
            $.ajax({
                type : 'POST',
                url : "{{ route('newUser') }}",
                data :  {_token:"{{csrf_token()}}", data: _id },
                success : function(data){
                $('.fetched-data-new').html(data);
                }
            });
        });
    });

$(function(e) {
    $(document).on('show.bs.modal', 
    '#editUserModal',
        function(e) {
            var _id = $(e.relatedTarget).data('id').toString();
            $.ajax({
                type : 'POST',
                url : "{{ route('editUser') }}",
                data :  {_token:"{{csrf_token()}}", data: _id },
                success : function(data){
                    $('.fetched-data-edit').html(data);
                }
            });
        });
    });

    $(function(e) {
    $(document).on('show.bs.modal', 
    '#importUserModal',
        function(e) {
            var _id = $(e.relatedTarget).data('id').toString();
            $.ajax({
                type : 'POST',
                url : "{{ route('importUser') }}",
                data :  {_token:"{{csrf_token()}}", data: _id },
                success : function(data){
                $('.fetched-data-import').html(data);
                }
            });
        });
    });


    //BELUM BISA
$("#deleteUser").click(function(e) {
    Swal.fire({
        title: "Delete User?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "YES",
        cancelButtonText: "NO",
        reverseButtons: true
    }).then(function(result) {
        if (result.value) {
            Swal.fire(
                "Deleted!",
                "User has been deleted.",
                "success"
            )
            // result.dismiss can be "cancel", "overlay",
            // "close", and "timer"
        } else if (result.dismiss === "cancel") {
            Swal.fire(
                "Cancelled"
            )
        }
    });
});


</script>




