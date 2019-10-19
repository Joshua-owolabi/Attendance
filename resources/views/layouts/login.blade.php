<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Sanctuary | @yield('title')</title>
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="icon" type="image/png" href="{{ asset('images/Sanctuary.png') }}">

		<!-- Stylesheets
	============================================= -->

		<link rel="stylesheet" href="{{ asset('saas/core.min.css') }}">
		<link rel="stylesheet" href="{{ asset('saas/thesaas.min.css') }}">
		<link rel="stylesheet" href="{{ asset('saas/style.css') }}">
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<link rel="stylesheet" href="{{ asset('customs/customs.css') }}">

	</head>

	<body class="mh-fullscreen bg-img center-vh p-20" style="background-image: url({{ asset('images/sample-4.jpeg') }});">
		@yield('content')

		@include('vendor.sweetalert.cdn')
		@include('vendor.sweetalert.view')
		<!--
  MAIN CONTENT
 ============================================= -->

		<script src="{{ asset('js/jquery.js') }}"></script>
		<script src="{{ asset('saas/core.min.js') }}"></script>
		<script>
			$(document).ready(function() {
					$(document).on('submit', 'form', function() {
							$('button').attr('disabled', 'disabled');
					});
			});
		</script>

		<!-- Footer Scripts
	============================================= -->
		<script src="{{ asset('saas/thesaas.min.js') }}"></script>
		<script src="{{ asset('saas/script.js') }}"></script>
	</body>

</html>