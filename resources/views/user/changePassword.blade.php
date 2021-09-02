
                       <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-5 px-lg-0">
                                    <div class="col-xl-12 col-xxl-10">
                                        <!--begin::Wizard Form-->
                                            {{ Form::open(['url' => '/updatePassword', 'id' => 'changePass']) }}
                                            <div class="row justify-content-center">
                                                <div class="col-xl-9">
                                                    <!--begin::Wizard Step 1-->
                                                    <div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Current Password</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                {{ Form::password('currentPassword',['class' => 'form-control form-control-solid form-control-lg', 'placeholder'=>'Current Password', 'required'=>'yes', 'id' => 'currentPassword']) }}
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">New Password</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                {{ Form::password('newPassword',['class' => 'form-control form-control-solid form-control-lg', 'placeholder'=>'New Password', 'required'=>'yes', 'id' => 'newPassword']) }}
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Confirm Password</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                {{ Form::password('cpassword',['class' => 'form-control form-control-solid form-control-lg', 'placeholder'=>'Confirm Password', 'required'=>'yes', 'id' => 'cpassword']) }}
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
<script src="{{asset('js/pages/custom/user/change-password.js')}}"></script>
<!--end::Page Scripts-->
<script type="text/javascript"></script>
                    