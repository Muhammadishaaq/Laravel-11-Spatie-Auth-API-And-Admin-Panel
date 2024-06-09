<!doctype html>
<html lang="en">

@include('admin/layouts/components.admin-header-css')

<body>
	<!--wrapper-->
	<div class="wrapper">

		<!--sidebar wrapper -->
		@include('admin.layouts.components.admin-sidebar')
		<!--end sidebar wrapper -->

		<!--start header -->
		@include('admin.layouts.components.admin-navbar')
		<!--end header -->

		<!--start page wrapper -->
		<div class="page-wrapper">
			@yield('contents')
		</div>
		<!--end page wrapper -->

		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->

		<!--Start Back To Top Button-->
		<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->

		@include('admin/layouts/components.admin-footer')
	</div>
	<!--end wrapper-->

	<!--start switcher-->
	@include('admin/layouts/components.admin-theme')
	<!--end switcher-->

	@include('admin/layouts/components.admin-footer-js')

</body>

</html>