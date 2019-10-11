@extends('layouts.frontend')
@section('title', 'Homepage')
@section('content')
<div class="body-overlay"></div>

	<div id="side-panel" class="dark">

		<div id="side-panel-trigger-close" class="side-panel-trigger"><a href="#"><i class="icon-line-cross"></i></a></div>

		<div class="side-panel-wrap">

			<div class="widget widget_links clearfix">

				<h4></h4>

				<div style="font-size: 14px; line-height: 1.7;">
					<address style="line-height: 1.7;">
						795 Folsom Ave, Suite 600<br>
						San Francisco, CA 94107<br>
					</address>

					<div class="clear topmargin-sm"></div>

					<abbr title="Phone Number">Phone:</abbr> (91) 8547 632521<br>
					<abbr title="Fax">Fax:</abbr> (91) 11 4752 1433<br>
					<abbr title="Email Address">Email:</abbr> info@canvas.com
				</div>

			</div>

			<div class="widget quick-contact-widget clearfix">

				<h4>Connect Socially</h4>

				<a href="#" class="social-icon si-small si-colored si-facebook" title="Facebook">
					<i class="icon-facebook"></i>
					<i class="icon-facebook"></i>
				</a>
				<a href="#" class="social-icon si-small si-colored si-twitter" title="Twitter">
					<i class="icon-twitter"></i>
					<i class="icon-twitter"></i>
				</a>
				<a href="#" class="social-icon si-small si-colored si-github" title="Github">
					<i class="icon-github"></i>
					<i class="icon-github"></i>
				</a>
				<a href="#" class="social-icon si-small si-colored si-pinterest" title="Pinterest">
					<i class="icon-pinterest"></i>
					<i class="icon-pinterest"></i>
				</a>
				<a href="#" class="social-icon si-small si-colored si-forrst" title="Forrst">
					<i class="icon-forrst"></i>
					<i class="icon-forrst"></i>
				</a>
				<a href="#" class="social-icon si-small si-colored si-linkedin" title="LinkedIn">
					<i class="icon-linkedin"></i>
					<i class="icon-linkedin"></i>
				</a>
				<a href="#" class="social-icon si-small si-colored si-gplus" title="Google Plus">
					<i class="icon-gplus"></i>
					<i class="icon-gplus"></i>
				</a>
				<a href="#" class="social-icon si-small si-colored si-instagram" title="Instagram">
					<i class="icon-instagram"></i>
					<i class="icon-instagram"></i>
				</a>
				<a href="#" class="social-icon si-small si-colored si-flickr" title="Flickr">
					<i class="icon-flickr"></i>
					<i class="icon-flickr"></i>
				</a>
				<a href="#" class="social-icon si-small si-colored si-skype" title="Skype">
					<i class="icon-skype"></i>
					<i class="icon-skype"></i>
				</a>

			</div>

		</div>

	</div>

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="full-header transparent-header static-sticky" data-sticky-offset="full" >

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="index.html" class="standard-logo" data-dark-logo="images/canvasone-dark.png"><img src="{{ asset('images/Sanctuary.png') }}" alt="Sanctuary Logo"></a>
						<a href="index.html" class="retina-logo" data-dark-logo="images/canvasone-dark@2x.png"><img src="{{ asset('images/Sanctuary.png') }}" alt="Sanctuary Logo"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul class="one-page-menu" data-easing="easeInOutExpo" data-speed="1250" data-offset="65">
							<li><a href="/" data-href="#wrapper"><div>Home</div></a></li>
							<li><a href="/" data-href="#section-about" data-offset="60"><div>About</div></a></li>
							<li><a href="{{ route('join-sanctuary') }}"><div>Join Us</div></a></li>
							<li><a href="/login"><div>Login</div></a></li>
						</ul>

						<div id="side-panel-trigger" class="side-panel-trigger"><a href="#"><i class="icon-reorder"></i></a></div>

					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->

		<!-- Slider
		============================================= -->
		<section id="slider" class="slider-element slider-parallax full-screen">

			<div class="slider-parallax-inner">

				<div class="row clearfix">
					<div class="col-xl-5 col-md-6 full-screen" style="background-color: #FFF;">
						<div class="vertical-middle subscribe-widget" data-loader="button">
							<div class="col-padding">
								<div class="heading-block nobottomborder leftmargin-sm">
									<h1 class="nott t400" style="line-height: 1.4;font-size: 48px; font-family: 'Playfair Display'; font-weight: normal"> SANCTUARY UNIT</h1>
									<span class="" style="font-size:16px; top-margin: 20px;" class="t300"> MOTTO: Doing The Will Of God From The Heart</span>
								</div>
							<a href="{{ route('join-sanctuary') }}" class="button button-circle button-border button-dark button-green button-large tright nomargin clearfix" data-scrollto="#section-about" data-offset="60">Join Sanctuary<i class="icon-line-arrow-right"></i></a>
							</div>
						</div>
						{{-- <a href="#" data-scrollto="#section-about" data-easing="easeInOutExpo" data-speed="1250" data-offset="65" class="one-page-arrow"><i class="icon-line-arrow-down infinite animated fadeInDown"></i></a> --}}
					</div>

					<div class="col-xl-7 col-md-6 full-screen center nopadding" style="background: url({{ asset('images/sample-5.jpeg') }}) top center no-repeat; background-size: cover; z-index: -1">
						<div class="vertical-middle dark center clearfix">

							<div class="emphasis-title nobottommargin">
								<h1>
									<span class="text-rotater nocolor" data-separator="|" data-rotate="fadeIn" data-speed="6000">
										<span class="t-rotate t700 font-body opm-medium-word">Love.|Service.|Joy.|vision.</span>
									</span>
								</h1>
							</div>

						</div>
					</div>
				</div>

			</div>

		</section><!-- #slider end -->
@endsection