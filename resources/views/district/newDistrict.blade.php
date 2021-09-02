
                       <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-5 px-lg-0">
                                    <div class="col-xl-12 col-xxl-10">
                                        <!--begin::Wizard Form-->
                                            {{ Form::open(['url' => '/addDistrict', 'id' => 'addDistrict']) }}
                                            <div class="row justify-content-center">
                                                <div class="col-xl-9">
                                                    <!--begin::Wizard Step 1-->
                                                    <div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Province</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                {{ Form::select('province', $provinceList, '', array('class'=>'form-control select2', 'id'=> 'province2', 'placeholder'=>'', 'style'=>'width:100%')) }} 
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">District</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                {{ Form::text('districtName', '',['class' => 'form-control form-control-solid form-control-lg', 'placeholder'=>'District Name', 'required'=>'yes', 'id' => 'districtName', 'disabled']) }}
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
<script src="{{asset('js/pages/custom/formsettings/add-district.js')}}"></script>
<!--end::Page Scripts-->

<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('js/pages/crud/forms/widgets/select2.js')}}"></script>
<!--end::Page Scripts-->

<script type="text/javascript">

    $(function()
    {
        $('#province2').on('change', function () {
            $("#districtName").prop('disabled',false);
        });
    });

</script>
                    