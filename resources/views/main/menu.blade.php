<?php
	list($firstname)= explode(' ', Auth::user()->fullname);
?>

<!-- Modal Change Password -->
<div class="modal fade" id="changePasswordModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="changePasswordModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="fetched-data-changepass"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
                <button type="submit" form="changePass" class="btn btn-primary font-weight-bold"><span class="svg-icon">
                    <i class="flaticon2-add px-1"></i>
                </span>Change Password</button>
            </div>
        </div>
    </div>
</div>
<!--End:: Modal Change Password -->

<!--begin::Main-->
		<!--begin::Header Mobile-->
		<div id="kt_header_mobile" class="header-mobile header-mobile-fixed">

			<!--begin::Logo-->
			<a href="@php echo url('/'); @endphp">
				<img alt="Logo" src="{{asset('media/logos/sv.png')}}" class="logo-sticky max-h-30px" />
			</a>

			<!--end::Logo-->

			<!--begin::Toolbar-->
			
			<div class="navi-text topbar-item text-muted">Hello, {{$firstname}}</div>
			<div class="d-flex align-items-center">
				<button class="btn p-0 burger-icon rounded-0 burger-icon-left" id="kt_aside_tablet_and_mobile_toggle">
					<span></span>
				</button>
				<div class="dropdown">
					<!--begin::Toggle-->
					<div class="topbar-item mr-4" data-toggle="dropdown" data-offset="10px,0px">
						<div class="btn btn-icon btn-sm btn-clean btn-text-dark-75" id="kt_quick_user_toggle">
							<span class="navi-icon">
								<i class="flaticon2-user px-5"></i>
							</span>
						</div>
					</div>
					<!--end::Toggle-->
					<!--begin::Dropdown-->
					<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-md">
						<!--begin::Navigation-->
						<ul class="navi navi-hover py-5">
							<li class="navi-item">
								<a href="@php echo url('#changePasswordModal'); @endphp" class="navi-link" data-toggle="modal" data-target="#changePasswordModal" id="_id" data-id=''>
									<span class="navi-icon">
										<i class="flaticon-lock"></i>
									</span>
									<span class="navi-text">Change Password</span>
								</a>
							</li>
							<li class="navi-separator my-3"></li>
							<li class="navi-item">
								<a href="@php echo url('logout'); @endphp" class="navi-link">
									<span class="navi-icon">
										<i class="flaticon-logout"></i>
									</span>
									<span class="navi-text">Logout</span>
								</a>
							</li>
						</ul>
						<!--end::Navigation-->
					</div>
					<!--end::Dropdown-->
				</div>
				<!--end::Right menu-->
<!--begin::Notifications-->
				<!--div class="topbar-item">
					<div class="btn btn-icon btn-sm btn-primary font-weight-bolder p-0" id="kt_quick_notifications_toggle">3</div>
				</div-->
<!--end::Notifications-->
			</div>

			<!--end::Toolbar-->
		</div>

		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">

			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">

				<!--begin::Aside-->
				<div class="aside aside-left d-flex flex-column flex-row-auto" id="kt_aside">
					<!--begin::Aside Menu-->
					<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
						<!--begin::Menu Container-->
						<div id="kt_aside_menu" class="aside-menu min-h-lg-800px" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
							<!--begin::Menu Nav-->
							<ul class="menu-nav">
								<li class="menu-item" aria-haspopup="true">
									<a href="@php echo url('/'); @endphp" class="menu-link">
										<span class="menu-icon">
											<i class="flaticon2-dashboard icon-xl"></i>
										</span>
										<span class="menu-text">Dashboard</span>
									</a>
								</li>
								<li class="menu-item" aria-haspopup="true">
									<a href="@php echo url('usermanagement'); @endphp" class="menu-link">
										<span class="menu-icon">
											<i class="flaticon-user-settings icon-xl"></i>
										</span>
										<span class="menu-text">User Management</span>
									</a>
								</li>
								
								<li class="menu-item" aria-haspopup="true">
									<a href="@php echo url('chooseTarget'); @endphp" class="menu-link">
										<span class="menu-icon">
											<i class="flaticon-list icon-xl"></i>
										</span>
										<span class="menu-text">Log Surveillance</span>
									</a>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="menu-icon">
											<i class="flaticon-settings icon-xl"></i>
										</span>
										<span class="menu-text">Form Setting</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Form Setting</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="@php echo url('activityList'); @endphp" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Activity</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="@php echo url('bandList'); @endphp" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Band</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="@php echo url('caseAgentList'); @endphp" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Case Agent</span>
												</a>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Data Area</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="@php echo url('provinceList'); @endphp" class="menu-link">
																<i class="menu-bullet menu-bullet-line">
																	<span></span>
																</i>
																<span class="menu-text">Province</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="@php echo url('districtList'); @endphp" class="menu-link">
																<i class="menu-bullet menu-bullet-line">
																	<span></span>
																</i>
																<span class="menu-text">District</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="@php echo url('subdistrictList'); @endphp" class="menu-link">
																<i class="menu-bullet menu-bullet-line">
																	<span></span>
																</i>
																<span class="menu-text">Sub District</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="@php echo url('villageList'); @endphp" class="menu-link">
																<i class="menu-bullet menu-bullet-line">
																	<span></span>
																</i>
																<span class="menu-text">Village</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="@php echo url('vehicleList'); @endphp" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Data Vehicle</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="@php echo url('providerList'); @endphp" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Service Provider</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="@php echo url('svopList'); @endphp" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Surveillance Operator</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="@php echo url('targetGroupList'); @endphp" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Target Group</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								
							</ul>
							<!--end::Menu Nav-->
						</div>
						<!--end::Menu Container-->
					</div>
					<!--end::Aside Menu-->
				</div>
				<!--end::Aside-->

				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

					<!--begin::Header-->
					<div id="kt_header" class="header header-fixed">
						<!--begin::Container-->
						<div class="container d-flex align-items-stretch justify-content-between">
							<!--begin::Left-->
							<div class="d-none d-lg-flex align-items-center mr-3">
								<!--begin::Aside Toggle-->
								<button class="btn btn-icon aside-toggle ml-n3 mr-10" id="kt_aside_desktop_toggle">
									<span class="svg-icon svg-icon-xxl svg-icon-dark-75">
										<!--begin::Svg Icon | path:assets/media/svg/icons/Text/Align-left.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<rect fill="#000000" opacity="0.3" x="4" y="5" width="16" height="2" rx="1" />
												<rect fill="#000000" opacity="0.3" x="4" y="13" width="16" height="2" rx="1" />
												<path d="M5,9 L13,9 C13.5522847,9 14,9.44771525 14,10 C14,10.5522847 13.5522847,11 13,11 L5,11 C4.44771525,11 4,10.5522847 4,10 C4,9.44771525 4.44771525,9 5,9 Z M5,17 L13,17 C13.5522847,17 14,17.4477153 14,18 C14,18.5522847 13.5522847,19 13,19 L5,19 C4.44771525,19 4,18.5522847 4,18 C4,17.4477153 4.44771525,17 5,17 Z" fill="#000000" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
								</button>
								<!--end::Aside Toggle-->
								<!--begin::Logo-->
								<a href="@php echo url('/'); @endphp">
									<img alt="Logo" src="{{asset('media/logos/sv.png')}}" class="logo-sticky max-h-75px" />
								</a>
								<!--end::Logo-->
								<div class="font-size-h4 font-size-lg-h2 blockquote">LOG SURVEILLANCE</div>
							</div>
							<!--end::Left-->
							<!--begin::Topbar-->
							<div class="topbar">
								<!--begin::Tablet & Mobile Search-->
								<div class="dropdown d-flex d-lg-none">
									<!--begin::Toggle-->
									
									<!--end::Toggle-->
									<!--begin::Dropdown-->
									<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
										<div class="quick-search quick-search-dropdown" id="kt_quick_search_dropdown">
											
											<!--begin::Scroll-->
											<div class="quick-search-wrapper scroll" data-scroll="true" data-height="325" data-mobile-height="200"></div>
											<!--end::Scroll-->
										</div>
									</div>
									<!--end::Dropdown-->
								</div>
								<!--end::Tablet & Mobile Search-->
								
								<div class="navi-text topbar-item text-muted">Hello, {{$firstname}}</div>
								<!--begin::Right menu-->
								<div class="dropdown">
									<!--begin::Toggle-->
									<div class="topbar-item mr-4" data-toggle="dropdown" data-offset="10px,0px">
                                        <div class="btn btn-icon btn-sm btn-clean btn-text-dark-75" id="kt_quick_user_toggle">
                                            <span class="navi-icon">
                                                <i class="flaticon2-user px-5"></i>
                                            </span>
                                        </div>
									</div>
									<!--end::Toggle-->
									<!--begin::Dropdown-->
									<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-md">
										<!--begin::Navigation-->
										<ul class="navi navi-hover py-5">
									
											<li class="navi-item">
												<a href="@php echo url('#changePasswordModal'); @endphp" class="navi-link" data-toggle="modal" data-target="#changePasswordModal" id="_id" data-id=''>
													<span class="navi-icon">
														<i class="flaticon-lock"></i>
													</span>
													<span class="navi-text">Change Password</span>
												</a>
											</li>
											<li class="navi-separator my-3"></li>
											<li class="navi-item">
												<a href="@php echo url('logout'); @endphp" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon-logout"></i>
													</span>
													<span class="navi-text">Logout</span>
												</a>
											</li>
										</ul>
										<!--end::Navigation-->
									</div>
									<!--end::Dropdown-->
								</div>
								<!--end::Right menu-->
								<!--begin::Notifications-->
								<!--div class="topbar-item">
									<div class="btn btn-icon btn-sm btn-primary font-weight-bolder p-0" id="kt_quick_notifications_toggle">3</div>
								</div-->
								<!--end::Notifications-->
							</div>
							<!--end::Topbar-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
@yield('content')

					<!--begin::Footer-->
					<!--begin::Card-->
					<div class="card card-custom card-border">
						<div class="card-header">
							
						
					<div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">

						<!--begin::Container-->
						<div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">

							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted font-weight-bold mr-2">2021©</span>
								<a href="@php echo url('/'); @endphp" target="_blank" class="text-dark-75 text-hover-primary">DEDEN & TEAM</a>
							</div>

							<!--end::Copyright-->
						</div>

						<!--end::Container-->
					</div>

					<!--end::Footer-->
				</div>
					</div>
					<!--end::Card-->

				</div>

				<!--end::Wrapper-->
			</div>

			<!--end::Page-->
		</div>

		<!--end::Main-->


<script type="text/javascript">
	$(function(e) {
		$(document).on('show.bs.modal', 
		'#changePasswordModal',
			function(e) {
				var _id = $(e.relatedTarget).data('id').toString();
				$.ajax({
					type : 'POST',
					url : "{{ route('changePassword') }}",
					data :  {_token:"{{csrf_token()}}", data: _id },
					success : function(data){
					$('.fetched-data-changepass').html(data);
					}
				});
			});
		});

</script>
			