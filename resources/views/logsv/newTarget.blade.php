
                       <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-5 px-lg-0">
                                    <div class="col-xl-12 col-xxl-10">
                                        <!--begin::Wizard Form-->
                                            {{ Form::open(['url' => '/addUser', 'id' => 'addTarget']) }}
                                            <div class="row justify-content-center">
                                                <div class="col-xl-9">
                                                    <!--begin::Wizard Step 1-->
                                                    <div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Full Name</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                {{ Form::text('fullname', '',['class' => 'form-control form-control-solid form-control-lg', 'placeholder'=>'Full Name', 'required'=>'yes', 'id' => 'fullname']) }}
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">NRP</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                {{ Form::text('nrp', '',['class' => 'form-control form-control-solid form-control-lg', 'placeholder'=>'NRP', 'required'=>'yes', 'id' => 'nrp']) }}
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <div class="input-group input-group-solid input-group-lg">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-at"></i>
                                                                        </span>
                                                                    </div>
                                                                    {{ Form::text('email', '',['class' => 'form-control form-control-solid form-control-lg', 'placeholder'=>'Email', 'required'=>'yes', 'id' => 'email']) }}
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Case Agent</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                {{ Form::select('caseagent', $caseAgentLists, '' , ['class'=>'form-control form-control-solid form-control-lg', 'placeholder'=>'-', 'required'=>'yes', 'id'=> 'caseagent']) }}
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">User Type</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <div class="input-group input-group-solid input-group-lg">
                                                                    {{ Form::select('usertype', [
                                                                    'Operator' => 'Operator',
                                                                    'Admin' => 'Admin'], '' , ['class'=>'form-control form-control-solid form-control-lg', 'required'=>'yes', 'id'=> 'usertype']
                                                                    ) }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Password</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                {{ Form::password('password',['class' => 'form-control form-control-solid form-control-lg', 'placeholder'=>'Password', 'required'=>'yes', 'id' => 'password']) }}
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
<script src="{{asset('js/pages/custom/target/add-target.js')}}"></script>
<!--end::Page Scripts-->

<script type="text/javascript"></script>
                    