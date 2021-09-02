@extends('main.headerFooter')
@section('content')
@extends('main.menu')


<!-- Modal New Subdistrict -->
<div class="modal fade" id="newSubdistrictModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="newSubdistrictModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Subdistrict</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="fetched-data-new"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
                <button type="submit" form="addSubdistrict" class="btn btn-primary font-weight-bold"><span class="svg-icon">
                    <i class="flaticon2-add px-1"></i>
                </span>Add Subdistrict</button>
            </div>
        </div>
    </div>
</div>
<!-- End:: Modal Subdistrict -->

<!-- Modal Edit Subdistrict -->
<div class="modal fade" id="editSubdistrictModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editSubdistrictModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Edit Subdistrict</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="fetched-data-edit"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
                <button type="submit" form="editSubdistrict" class="btn btn-primary font-weight-bold">
                    <span class="svg-icon">
                    <i class="la la-save"></i>
                </span>Save Changes</button>
            </div>
        </div>
    </div>
</div>
<!-- End:: Modal Edit Subdistrict -->

<!-- Begin:: Modal Import
<div class="modal fade" id="importSubdistrictModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="importSubdistrictModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Import Subdistrict</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="fetched-data-import"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
                <button type="submit" form="importSubdistrict" class="btn btn-primary font-weight-bold">
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
												<a href="svopList" class="text-muted">Subdistrict</a>
											</li>
										</ul>
										<!--end::Breadcrumb-->
										</div>
										<div class="card-toolbar">
											<!--begin::Import
											<div class="dropdown dropdown-inline mr-2">
                                                <button type="button" class="btn btn-light-primary font-weight-bolder px-2" data-toggle="modal" data-target="#importSubdistrictModal" data-id=''>
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-add px-0"></i>
                                                    </span>Import Excel</button>
                                            </div>
                                            --end::Import-->
											<!--begin::Button-->
                                            <!-- Button trigger modal-->
                                            <button type="button" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#newSubdistrictModal" data-id=''>
                                                <span class="svg-icon">
                                                    <i class="flaticon2-add px-1"></i>
                                                </span>
                                                New Subdistrict
                                            </button>
											<!--end::Button-->
										</div>
									</div>
                                    
                                    <div class="card-header flex-wrap py-5">
                                        <div class="form-group row col-sm-12 col-md-5">
                                            <label class="col-form-label">Select Province</label>
                                            <div class="col-xl-9 col-lg-9">
                                                {{ Form::select('province', $provinceList, '', array('class'=>'form-control select2 ', 'id'=> 'province', 'placeholder'=>'', 'style'=>'width:100%')) }}
                                            </div>
                                            <label class="col-form-label mt-5 mr-4">Select District</label>
                                            <div class="col-xl-9 col-lg-9 mt-5">
                                                {{ Form::select('district', [''=>''], '', array('class'=>'form-control select2', 'id'=> 'district', 'placeholder'=>'', 'style'=>'width:100%')) }}
                                            <div class="mt-2"><span class="text text-danger mt-10">*Select province and district to show subdistrict data</span></div>
                                            </div>
                                        </div>
                                        <div class="form-group row col-sm-12 col-md-5">
                                            
                                        </div>
                                    </div>
									<div class="card-body">
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom table-checkable" id="kt_subdistrictdatatable" >
											<thead>
												<tr>
													<th>NO</th>
													<th>SUBDISTRICT</th>
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
    '#newSubdistrictModal',
        function(e) {
            var _id = $(e.relatedTarget).data('id').toString();
            $.ajax({
                type : 'POST',
                url : "{{ route('newSubdistrict') }}",
                data :  {_token:"{{csrf_token()}}", data: _id},
                success : function(data){
                $('.fetched-data-new').html(data);
                }
            });
        });
    });

$(function(e) {
    $(document).on('show.bs.modal', 
    '#editSubdistrictModal',
        function(e) {
            var subdistrictNo = $(e.relatedTarget).data('id');
            var districtNo = document.getElementById('district').value;
            var provinceNo = document.getElementById('province').value;
            $.ajax({
                type : 'POST',
                url : "{{ route('editSubdistrict') }}",
                data :  {_token:"{{csrf_token()}}", subdistrictNo: subdistrictNo, districtNo: districtNo, provinceNo: provinceNo},
                success : function(data){
                $('.fetched-data-edit').html(data);
                }
            });
        });
    });

$(function(e) {
    $(document).on('show.bs.modal', 
    '#importSubdistrictModal',
        function(e) {
            var _id = $(e.relatedTarget).data('id').toString();
            $.ajax({
                type : 'POST',
                url : "{{ route('importSubdistrict') }}",
                data :  {_token:"{{csrf_token()}}", data: _id},
                success : function(data){
                $('.fetched-data-import').html(data);
                }
            });
        });
    });

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
                var t = $('#kt_subdistrictdatatable').DataTable();
                t.clear().draw();
                $('#district').empty();
                $.each(response, function (districtNo, districtName) {
                    $('#district').append(new Option(districtName, districtNo))
                })
            }
        })
    });

    $('#district').on('change', function () {
        var provNo = document.getElementById('province').value;
        $.ajax({
            url: "{{ route('getSubdistrictData') }}",
            method: 'POST',
            data: {districtNo: $(this).val(), provinceNo: provNo},
            success: function (response) {
                var t = $('#kt_subdistrictdatatable').DataTable();
                t.clear().draw();
                var distNo = document.getElementById('district').value;
                var provNo = document.getElementById('province').value;
                var no = 1;
                $.each(response, function (subdistrictNo, subdistrictName) {
                    var action = "<a href='#editSubdistrictModal' class='btn btn-sm btn-clean btn-icon mr-2' title='Edit Subdistrict' data-toggle='modal' data-target='#editSubdistrictModal' id='_id' data-id='"+subdistrictNo+"'><span class='svg-icon'><i class='flaticon2-edit'></i></span></a><a href='deleteSubdistrict/"+subdistrictNo+"/"+distNo+"/"+provNo+"' id='deleteSubdistrict' onclick='return confirm('Delete Subdistrict?')' class='btn btn-sm btn-clean btn-icon' title='Delete'><span class='svg-icon'><i class='flaticon-delete'></i></span></a>"
                    t.row.add( [
                            no,
                            subdistrictName,
                            action,
                        ] ).draw( false );
                        no++;
                })
            }
        })
    });
});

</script>




