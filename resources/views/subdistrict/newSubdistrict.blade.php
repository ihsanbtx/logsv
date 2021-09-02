
                       <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-5 px-lg-0">
                                    <div class="col-xl-12 col-xxl-10">
                                        <!--begin::Wizard Form-->
                                            {{ Form::open(['url' => '/addSubdistrict', 'id' => 'addSubdistrict']) }}
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
                                                                {{ Form::select('district', [''=>''], '', array('class'=>'form-control select2', 'id'=> 'district2', 'placeholder'=>'', 'style'=>'width:100%')) }} 
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Subdistrict</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                {{ Form::text('subdistrictName', '',['class' => 'form-control form-control-solid form-control-lg', 'placeholder'=>'Sub District Name', 'required'=>'yes', 'id' => 'subdistrictName', 'disabled']) }}
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
<script src="{{asset('js/pages/custom/formsettings/add-subdistrict.js')}}"></script>
<!--end::Page Scripts-->

<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('js/pages/crud/forms/widgets/select2.js')}}"></script>
<!--end::Page Scripts-->

<script type="text/javascript">

    $(function()
    {
        $('#district2').on('change', function () {
            $("#subdistrictName").prop('disabled',false);
        });

        $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        
        $('#province2').on('change', function () {
            $.ajax({
                url: "{{ route('getDistrict') }}",
                method: 'POST',
                data: {provinceNo: $(this).val()},
                success: function (response) {
                    $('#district2').empty();
                    $.each(response, function (districtNo, districtName) {
                        $('#district2').append(new Option(districtName, districtNo))
                    })
                }
            })
        });
    });

</script>
                    