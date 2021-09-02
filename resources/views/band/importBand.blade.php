
                       <!--begin::Body-->
                       <div class="card-body p-0">
                        <div class="row justify-content-center py-8 px-8 py-lg-5 px-lg-0">
                            <div class="col-xl-12 col-xxl-10">
                                <!--begin::Wizard Form-->
                                    {{ Form::open(['url' => '/doImportband', 'id' => 'importBand', 'enctype'=>'multipart/form-data']) }}
                                    <div class="row justify-content-center">
                                        <div class="col-xl-9">
                                            <!--begin::Wizard Step 1-->
                                            <div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
                                                <!--end::Group-->
                                                <!--begin::Group-->
                                                <div class="form-group row">
                                                    <label class="col-form-label col-xl-3 col-lg-3">Import Excel File: </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        @csrf
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input form-label" name="uploadFile" id="customFile" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Group-->
                                            </div>
                                            <!--end::Wizard Step 1-->
                                            </div>
                                    </div>
                                {{ Form::close() }}
                                <!--end::Wizard Form-->
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->




<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('js/pages/custom/formsettings/import-band.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<!--end::Page Scripts-->

<script type="text/javascript"></script>
            