<!DOCTYPE html>

<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head>
		<meta charset="utf-8" />
		<title>LOG SURVEILLANCE</title>
		<meta name="description" content="" />
		<meta name="csrf-token" content="{{ csrf_token() }}"> 
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/font/font.css') }}">
		<!--end::Fonts-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/global/plugins.bundle.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/custom/prismjs/prismjs.bundle.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/style.bundle.css') }}">
		<!--end::Global Theme Styles-->
		
		<!--begin::Page Custom Styles(used by this page)-->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/pages/wizard/wizard-4.css') }}">
		<!--end::Page Custom Styles-->

		<!--begin::Layout Themes(used by all pages)-->

		<!--end::Layout Themes-->
		<link rel="stylesheet" type="text/css" href="{{ asset('media/logos/favicon.ico') }}">
	</head>
	<!--end::Head-->

	<!--begin::Body-->
	<body id="kt_body" class="page-loading-enabled page-loading quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-static page-loading">
		@if(!Auth::user())
			@yield('content')
		@endif
		<!--[html-partial:include:{"file":"partials/_page-loader.html"}]/-->

		<!--[html-partial:include:{"file":"layout.html"}]/-->

		<!--[html-partial:include:{"file":"partials/_extras/offcanvas/quick-notifications.html"}]/-->

		<!--[html-partial:include:{"file":"partials/_extras/offcanvas/quick-actions.html"}]/-->

		<!--[html-partial:include:{"file":"partials/_extras/offcanvas/quick-user.html"}]/-->

		<!--[html-partial:include:{"file":"partials/_extras/offcanvas/quick-panel.html"}]/-->

		<!--[html-partial:include:{"file":"partials/_extras/chat.html"}]/-->

		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">

				<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>

				<!--end::Svg Icon-->
			</span>
		</div>

		<!--end::Scrolltop-->
		<script>
			var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
		</script>

		<!--begin::Global Config(global config for global JS scripts)-->
		<script>
			var KTAppSettings = {
				"breakpoints": {
					"sm": 576,
					"md": 768,
					"lg": 992,
					"xl": 1200,
					"xxl": 1200
				},
				"colors": {
					"theme": {
						"base": {
							"white": "#ffffff",
							"primary": "#6993FF",
							"secondary": "#E5EAEE",
							"success": "#1BC5BD",
							"info": "#8950FC",
							"warning": "#FFA800",
							"danger": "#F64E60",
							"light": "#F3F6F9",
							"dark": "#212121"
						},
						"light": {
							"white": "#ffffff",
							"primary": "#E1E9FF",
							"secondary": "#ECF0F3",
							"success": "#C9F7F5",
							"info": "#EEE5FF",
							"warning": "#FFF4DE",
							"danger": "#FFE2E5",
							"light": "#F3F6F9",
							"dark": "#D6D6E0"
						},
						"inverse": {
							"white": "#ffffff",
							"primary": "#ffffff",
							"secondary": "#212121",
							"success": "#ffffff",
							"info": "#ffffff",
							"warning": "#ffffff",
							"danger": "#ffffff",
							"light": "#464E5F",
							"dark": "#ffffff"
						}
					},
					"gray": {
						"gray-100": "#F3F6F9",
						"gray-200": "#ECF0F3",
						"gray-300": "#E5EAEE",
						"gray-400": "#D6D6E0",
						"gray-500": "#B5B5C3",
						"gray-600": "#80808F",
						"gray-700": "#464E5F",
						"gray-800": "#1B283F",
						"gray-900": "#212121"
					}
				},
				"font-family": "Poppins"
			};
		</script>

		<!--end::Global Config-->

		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{asset('js/jquery.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		<script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
		<script src="{{ asset('js/scripts.bundle.js') }}"></script>
		<!--end::Global Theme Bundle-->
		
		<!--begin::Page Vendors Styles(used by this page)-->
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}">
		<!--end::Page Vendors Styles-->
		<!--begin::Page Vendors(used by this page)-->
		<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{ asset('js/pages/crud/datatables/extensions/responsive.js') }}"></script>
		<!--end::Page Scripts-->
		
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{asset('js/pages/crud/forms/widgets/select2.js')}}"></script>
		<!--end::Page Scripts-->

		

		<!--begin::Page Scripts(used by this page)-->
		<script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}"></script>
		<!--end::Page Scripts-->
		<!--begin::Page Scripts(used by this page)-->
		
		<!--end::Page Scripts-->

		<!--begin::Page Scripts(used by this page)-->
		<script src="{{asset('js/pages/crud/file-upload/dropzonejs.js')}}"></script>
		<!--end::Page Scripts-->
		

		<!--begin::Page Scripts(used by this page)-->
		<script src="{{asset('js/pages/crud/forms/widgets/bootstrap-select.js')}}"></script>
		<!--end::Page Scripts-->

		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="{{asset('plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		




		
		
		

		
		
	</body>

	<!--end::Body-->
</html>