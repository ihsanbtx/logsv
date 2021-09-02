@extends('main.headerFooter')
@section('content')
@extends('main.menu')


<!-- Modal New District -->
<div class="modal fade" id="newDistrictModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="newDistrictModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New District</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="fetched-data-new"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
                <button type="submit" form="addDistrict" class="btn btn-primary font-weight-bold"><span class="svg-icon">
                    <i class="flaticon2-add px-1"></i>
                </span>Add District</button>
            </div>
        </div>
    </div>
</div>
<!-- End:: Modal District -->

<!-- Modal Edit District -->
<div class="modal fade" id="editDistrictModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editDistrictModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Edit District</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="fetched-data-edit"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
                <button type="submit" form="editDistrict" class="btn btn-primary font-weight-bold">
                    <span class="svg-icon">
                    <i class="la la-save"></i>
                </span>Save Changes</button>
            </div>
        </div>
    </div>
</div>
<!-- End:: Modal Edit District -->

<!-- Begin:: Modal Import 
<div class="modal fade" id="importDistrictModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="importDistrictModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Import District</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="fetched-data"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
                <button type="submit" form="kt_formEdit" class="btn btn-primary font-weight-bold">
                    <span class="svg-icon">
                    <i class="flaticon-import"></i>
                </span>Import</button>
            </div>
        </div>
    </div>
</div>
End:: Modal Import -->

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
												<a href="svopList" class="text-muted">District</a>
											</li>
										</ul>
										<!--end::Breadcrumb-->
										</div>
										<div class="card-toolbar">
											<!--begin::Import--
											<div class="dropdown dropdown-inline mr-2">
                                                <button type="button" class="btn btn-light-primary font-weight-bolder px-2" data-toggle="modal" data-target="#importDistrictModal" data-id=''>
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-add px-0"></i>
                                                    </span>Import Excel</button>
                                            </div>
                                                end::Import-->
											<!--begin::Button-->
                                            <!-- Button trigger modal-->
                                            <button type="button" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#newDistrictModal" data-id=''>
                                                <span class="svg-icon">
                                                    <i class="flaticon2-add px-1"></i>
                                                </span>
                                                New District
                                            </button>
											<!--end::Button-->
										</div>
									</div>
                                    
                                    <div class="card-header flex-wrap py-5">
                                        <div class="form-group row col-sm-12 col-md-5">
                                            <label class="col-form-label">Select Province</label>
                                            <div class="col-xl-9 col-lg-9">
                                                {{ Form::select('province', $provinceList, '', array('class'=>'form-control select2', 'id'=> 'province', 'placeholder'=>'', 'style'=>'width:100%')) }}
                                            <div class="mt-2"><span class="text text-danger mt-10">*Select province to show district data</span></div>
                                            </div>
                                        </div>
                                    </div>
									<div class="card-body">
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom table-checkable" id="kt_districtdatatable" >
											<thead>
												<tr>
													<th>NO</th>
													<th>DISTRICT</th>
													<th>ACTIONS</th>
												</tr>
											</thead>
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
$(function(e) {
    $(document).on('show.bs.modal', 
    '#newDistrictModal',
        function(e) {
            var _id = $(e.relatedTarget).data('id').toString();
            $.ajax({
                type : 'POST',
                url : "{{ route('newDistrict') }}",
                data :  {_token:"{{csrf_token()}}", data: _id},
                success : function(data){
                $('.fetched-data-new').html(data);
                }
            });
        });
    });

$(function(e) {
    $(document).on('show.bs.modal', 
    '#editDistrictModal',
        function(e) {
            var districtNo = $(e.relatedTarget).data('id');
            var provinceNo = document.getElementById('province').value;
            $.ajax({
                type : 'POST',
                url : "{{ route('editDistrict') }}",
                data :  {_token:"{{csrf_token()}}", districtNo: districtNo, provinceNo: provinceNo},
                success : function(data){
                $('.fetched-data-edit').html(data);
                }
            });
        });
    });
/*
$(function(e) {
    $(document).on('show.bs.modal', 
    '#importDistrictModal',
        function(e) {
            var _id = $(e.relatedTarget).data('id').toString();
            $.ajax({
                type : 'POST',
                url : "{{ route('importDistrict') }}",
                data :  {_token:"{{csrf_token()}}", data: _id},
                success : function(data){
                $('.fetched-data-import').html(data);
                }
            });
        });
    });
*/

$(function () {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    $('#province').on('change', function () {
        $.ajax({
            url: "{{ route('getDistrictData') }}",
            method: 'POST',
            data: {provinceNo: $(this).val()},
            success: function (response) {
                var t = $('#kt_districtdatatable').DataTable();
                t.clear().draw();
                var provNo = document.getElementById('province').value;
                var no = 1;
                $.each(response, function (districtNo, districtName) {
                    var action = "<a href='#editDistrictModal' class='btn btn-sm btn-clean btn-icon mr-2' title='Edit District' data-toggle='modal' data-target='#editDistrictModal' id='_id' data-id='"+districtNo+"'><span class='svg-icon'><i class='flaticon2-edit'></i></span></a><a href='deleteDistrict/"+districtNo+"/"+provNo+"' id='deleteDistrict' onclick='return confirm('Delete District?')' class='btn btn-sm btn-clean btn-icon' title='Delete'><span class='svg-icon'><i class='flaticon-delete'></i></span></a>"
                    t.row.add( [
                            no,
                            districtName,
                            action,
                        ] ).draw( false );
                        no++;
                })
            }
        })
    });
});

</script>




