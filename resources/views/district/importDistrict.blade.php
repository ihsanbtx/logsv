
                       <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-5 px-lg-0">
                                    <div class="col-xl-12 col-xxl-10">
                                        <!--begin::Wizard Form-->
                                            {{ Form::open(['url' => '/doImportDistrict', 'id' => 'importDistrict', 'enctype'=>'multipart/form-data']) }}
                                            <div class="row justify-content-center">
                                                <div class="col-xl-9">
                                                    <!--begin::Wizard Step 1-->
                                                    <div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Import Excel File: </label>
                                                            <div class="col-lg-3 col-md-9 col-sm-12">
                                                                <!--div class="dropzone dropzone-default dropzone-success" id="kt_dropzone_3">
                                                                    <div class="dropzone-msg dz-message needsclick">
                                                                        <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                                                        <span class="dropzone-msg-desc">Only xlsx, csv and xls files are allowed for upload</span>
                                                                    </div>
                                                                </div-->
                                                                @csrf
                                                                <input type="file" name="uploadFile" >
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                    </div>
                                                    <!--end::Wizard Step 1-->
                                                    <input type="submit">
                                                    </div>
                                            </div>
                                        {{ Form::close() }}
                                        <!--end::Wizard Form-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->




<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('js/pages/crud/file-upload/dropzonejs.js')}}"></script>
<!--end::Page Scripts-->

<script type="text/javascript"></script>
                    