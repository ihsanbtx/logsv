
                       <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-5 px-lg-0">
                                    <div class="col-xl-12 col-xxl-10">
                                        <!--begin::Wizard Form-->
                                            {{ Form::open(['url' => 'addTarget', 'id' => 'addTarget', 'enctype'=>'multipart/form-data']) }}
                                            <div class="row justify-content-center">
                                                <div class="col-xl-9">
                                                    <!--begin::Wizard Step 1-->
                                                    <div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">NIK</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                {{ Form::text('nik', '',['class' => 'form-control form-control-solid form-control-lg', 'placeholder'=>'NIK', 'id' => 'nik']) }}
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Full Name</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                {{ Form::text('fullname', '',['class' => 'form-control form-control-solid form-control-lg', 'placeholder'=>'Full Name', 'id' => 'fullname']) }}
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Place of Birth</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                {{ Form::text('placeofbirth', '',['class' => 'form-control form-control-solid form-control-lg', 'placeholder'=>'Place of Birth', 'id' => 'placeofbirth']) }}
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Date of Birth</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                {{ Form::date('dateofbirth', '',['class' => 'form-control form-control-solid form-control-lg', 'placeholder'=>'Date of Birth', 'id' => 'dateofbirth']) }}
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Gender</label>
                                                            <div class="radio-list col-lg-1 col-xl-9">
                                                                <label class="radio">
                                                                {{ Form::radio('gender', 'male',['class' => 'form-control form-control-solid form-control-lg radio', 'id' => 'gender']) }}
                                                                <span></span>Male</label>
                                                                <label class="radio">
                                                                {{ Form::radio('gender', 'female',['class' => 'form-control form-control-solid form-control-lg radio', 'id' => 'gender']) }}
                                                                <span></span>Female</label>
                                                                <label class="radio">
                                                                {{ Form::radio('gender', 'ukm',['class' => 'form-control form-control-solid form-control-lg radio', 'id' => 'gender']) }}
                                                                <span></span>Unknown Male</label>
                                                                <label class="radio">
                                                                {{ Form::radio('gender', 'ukf',['class' => 'form-control form-control-solid form-control-lg radio', 'id' => 'gender']) }}
                                                                <span></span>Unknown Female</label>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">As Known As</label>
                                                            <div class="col-lg-9 col-xl-7" id="aka">
                                                                {{ Form::text('asknownas[]', '',['class' => 'form-control form-control-solid form-control-lg', 'placeholder'=>'As Known As', 'id' => 'asknownas']) }}
                                                            </div>
                                                            <div class="col-lg-2 col-form-label"><a href="#" class="plus" title="Add As Known As"><i class="navi-icon flaticon-plus icon-xl"></i></a>&nbsp &nbsp<a href="#" class="min" title="Remove As Known As"><i class="navi-icon flaticon2-delete icon-lg"></i></a></div>
                                                            <div class="col-lg-2 col-form-label"></div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Profil Picture</label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <div class="image-input image-input-empty image-input-outline" id="kt_image_5" style="background-image: url({{asset('media/users/blank.png')}})">
                                                                    <div class="image-input-wrapper"></div>
                                                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                                        <input type="hidden" name="profile_avatar_remove" />
                                                                    </label>
                                                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                    </span>
                                                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                    </span>
                                                                </div>
                                                                <span class="form-text text-muted">max 300kb</span>
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



<script src="{{asset('js/pages/crud/file-upload/image-input.js')}}"></script>
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('js/pages/custom/target/add-target.js')}}"></script>
<!--end::Page Scripts-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"></script>
<!--end::Page Scripts-->
<!--begin::Page Scripts(used by this page)-->
<!--end::Page Scripts-->
<script src="{{asset('js/bootstrap.')}}min.js"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript">

$(function() {
        $('a.plus').click(function(e) {
            e.preventDefault();
            $('#aka').append('{{ Form::text('asknownas[]', '',['class' => 'form-control form-control-solid form-control-lg', 'placeholder'=>'As Known As', 'id' => 'asknownas']) }}');
        });
        $('a.min').click(function (e) {
            e.preventDefault();
            if ($('#aka input').length > 1) {
                $('#aka').children().last().remove();
            }
        });
    });

</script>



                    