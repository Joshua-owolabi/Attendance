<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sanctuary Unit | @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

     <!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Montserrat:400,700|Merriweather" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('css/dark.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css" />


	<!-- Media Agency Demo Specific Stylesheet -->
	<link rel="stylesheet" href="{{ asset('css/onepage.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('css/fonts.css') }}" type="text/css" />
	<!-- / -->

	<link rel="stylesheet" href="{{ asset('css/font-icons.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('css/et-line.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('css/animate.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css" />

	<link rel="stylesheet" href="{{ asset('css/fonts.css') }}" type="text/css" />

	<link rel="stylesheet" href="{{ asset('css/responsive.css') }}" type="text/css" />

	<meta name="viewport" content="width=device-width, initial-scale=1" />
  <style>
		#slider-subscribe-form .input-group {
			background-color: #FFF;
			border: 1px solid #EEE;
			border-radius: 3px;
			box-shadow: 0 0 30px 4px rgba(0,0,0,0.15);
			border-left: 3px solid red;
		}

		#slider-subscribe-form input {
			box-shadow: none;
			border: 0;
			height: 64px;
			padding-left: 1.25rem;
		}

		#slider-subscribe-form .input-group { align-items: center; }

		#slider-subscribe-form .form-control.error { background-color: #ffe6e6; }

		.social-icon { margin-left: 8px; }

		#slider-subscribe-form { width: 125%; }

		.device-sm #slider-subscribe-form,
		.device-xs #slider-subscribe-form { width: 100%; }
	</style>
</head>
<body class="stretched side-push-panel">

    @yield('content')
     <!--  MAIN SCRIIPTS
     ============================================= -->
	<script src="{{ asset('js/jquery.js') }}"></script>
	<script src="{{ asset('js/plugins.js') }}"></script>


	<!-- Footer Scripts
	============================================= -->
	<script src="{{ asset('js/functions.js') }}"></script>
</body>
</html>
