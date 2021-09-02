@extends('main/headerFooter')
@section('content')
<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-3 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url(../resources/media/bg/bg-1.jpg);">
					<div class="login-form text-center text-white p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-5">
							
								<img src="{{asset('media/logos/sv.png')}}" class="max-h-200px" />
							
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">
							<div class="mb-5">
								<h3>Sign In To LOGSV App</h3>
								<p class="opacity-60 font-weight-bold">Enter your details to login to your account:</p>
								<center>
									<!--begin::Notice-->
									@if($errors->any())
									<div class="alert alert-custom alert-light-danger alert-shadow opacity-70 fade show py-2 px-5" role="alert">
										@foreach($errors->all() as $error)
										<div class="alert-text text-danger font-weight-bold">{{$error}}<br></div>
										@endforeach
										<div class="alert-close">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true"><i class="ki ki-close icon-xs"></i></span>
											</button>
										</div>
									</div> 
									@endif
									@if(Session('message'))
									<div class="alert alert-custom alert-light-success alert-shadow opacity-70 fade show py-2 px-5 gutter-b" role="alert">
										<div class="alert-text text-success">{{session('message')}}</div>
										<div class="alert-close">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true"><i class="ki ki-close icon-xs"></i></span>
											</button>
										</div>
									</div>  
									@endif
								</center>
							</div>
                            {{ Form::open(['url' => '/login','class'=>'form', 'id' => 'kt_login_signin_form']) }}
								<div class="form-group">
                                    {{ Form::text('email', '',['class' => 'form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5', 'placeholder'=>'Email', 'required'=>'yes', 'id' => 'email']) }}
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
									<a href="javascript:;" id="kt_login_forgot" class="text-white font-weight-bold">Forget Password ?</a>
								</div>
								<div class="form-group text-center mt-10">
									<button type="submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3">Sign In</button>
								</div>
                                {{ Form::close() }}
						</div>
						<!--end::Login Sign in form-->
						<!--begin::Login forgot password form-->
						<div class="login-forgot">
							<div class="mb-20">
								<h3>Forgotten Password ?</h3>
								<p class="opacity-60">Enter your email to reset your password</p>
							</div>
							<form class="form" id="kt_login_forgot_form">
								<div class="form-group mb-10">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
								</div>
								<div class="form-group">
									<button id="kt_login_forgot_submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">Request</button>
									<button id="kt_login_forgot_cancel" class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">Cancel</button>
								</div>
							</form>
						</div>
						<!--end::Login forgot password form-->
					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->

@endsection

<script src="{{asset('js/jquery.min.js')}}"></script>
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('js/pages/custom/login/login-general.js') }}"></script>
<!--end::Page Scripts-->
<!--begin::Page Custom Styles(used by this page)-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/pages/login/classic/login-3.css') }}">
<!--end::Page Custom Styles-->



