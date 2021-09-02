@extends('main/headerFooter')
@section('content')

<!--begin::Main-->
<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-3 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url(../resources/media/bg/bg-1.jpg);">
					<div class="login-form text-center text-white p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-5">
							
								<img src="../resources/media/logos/ds88at.png" class="max-h-200px" />
							
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">
							<div class="mb-10">
								<h3>Sign In To LOGSV App</h3>
								<p class="opacity-60 font-weight-bold">Enter your details to login to your account:</p>
							</div>
                            {{ Form::open(['url' => '/login','class'=>'form', 'id' => 'kt_login_signin_form']) }}
								<div class="form-group">
                                    {{ Form::text('nrp', '',['class' => 'form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5', 'placeholder'=>'NRP', 'required'=>'yes', 'id' => 'nrp']) }}
								</div>
								<div class="form-group">
                                    {{ Form::password('password',['class' => 'form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5', 'placeholder'=>'Password', 'required'=>'yes', 'id' => 'password']) }}
								</div>
								<div class="form-group d-flex flex-wrap justify-content-between align-items-center px-8">
									<div class="checkbox-inline">
										<label class="checkbox checkbox-outline checkbox-white text-white m-0">
                                        {{Form::checkbox('remember')}}
										<span></span>Remember me</label>
									</div>
								</div>
								<div class="form-group text-center mt-10">
									<button type="submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3">Sign In</button>
								</div>
                                {{ Form::close() }}
							<div class="mt-10">
								<span class="opacity-70 mr-4">Don't have an account yet?</span>
								<a href="javascript:;" id="kt_login_signup" class="text-white font-weight-bold">Sign Up</a>
							</div>
						</div>
						<!--end::Login Sign in form-->
						<!--begin::Login Sign up form-->
						<div class="login-signup">
							<div class="mb-20">
								<h3>Sign Up</h3>
								<p class="opacity-60">Enter your details to create your account</p>
							</div>
                            {{ Form::open(['url' => '/inputUser','class'=>'form text-center', 'id' => 'kt_login_signup_form']) }}
								<div class="form-group">
                                {{ Form::text('fullname', '',['class' => 'form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5', 'placeholder'=>'Fullname', 'required'=>'yes', 'id' => 'fullname']) }}
								</div>
								<div class="form-group">
                                {{ Form::text('nrp', '',['class' => 'form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5', 'placeholder'=>'NRP', 'required'=>'yes', 'id' => 'nrp']) }}
								</div>
                                <div class="form-group">
                                {{ Form::select('usertype', [
                                'Admin' => 'Admin',
                                'Operator' => 'Operator'], '' , ['class'=>'form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5', 'placeholder'=>'User Type', 'required'=>'yes', 'id'=> 'usertype']
                                ) }}
								</div>
                                <div class="form-group">
                                {{ Form::password('password',['class' => 'form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5', 'placeholder'=>'Password', 'required'=>'yes', 'id' => 'password']) }}
								</div>
								<div class="form-group">
                                {{ Form::password('cpassword',['class' => 'form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5', 'placeholder'=>'Confirm Password', 'required'=>'yes', 'id' => 'cpassword']) }}
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">Sign Up</button>
									<button id="kt_login_signup_cancel" class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">Cancel</button>
								</div>
                                {{ Form::close() }}
						</div>
						<!--end::Login Sign up form-->
					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->

@endsection
