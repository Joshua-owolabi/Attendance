@extends('layouts.frontend')
@section('title', 'Homepage')
@section('content')
<div class="body-overlay"></div>

<div id="side-panel" class="light">

	<div id="side-panel-trigger-close" class="side-panel-trigger"><a href="#"><i class="icon-line-cross"></i></a></div>

	<div class="side-panel-wrap">

		<div class="widget widget_links clearfix">

			<h4></h4>

		</div>

		<div class="widget quick-contact-widget clearfix">

			<h4></h4>
			<nav class="nav-tree nobottommargin">
				<ul>
					<li class="menu"><a href="/" class="side-links"><i class="icon-bolt2"></i>Home <i
								class="icon-angle-right"></i></a>
					</li>
					<li class="menu"><a href="{{ route('join-sanctuary') }}" class="side-links"><i class="icon-briefcase"></i>Join
							Sanctuary <i class="icon-angle-right"></i></a>
					</li>
					<li class="menu"><a href="{{ route('login') }}" class="side-links"><i class="icon-file-text"></i>Login <i
								class="icon-angle-right"></i></a>
					</li>
				</ul>
			</nav>


		</div>

	</div>

</div>

<!-- Document Wrapper
	============================================= -->
<div id="wrapper" class="clearfix">

	<!-- Header
		============================================= -->
	<header id="header" class="full-header transparent-header static-sticky" data-sticky-offset="full">

		<div id="header-wrap">

			<div class="container clearfix">

				<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

				<!-- Logo
					============================================= -->
				<div id="logo">
					<a href="index.html" class="standard-logo" data-dark-logo="images/canvasone-dark.png"><img
							src="{{ asset('images/Sanctuary.png') }}" alt="Sanctuary Logo"></a>
					<a href="index.html" class="retina-logo" data-dark-logo="images/canvasone-dark@2x.png"><img
							src="{{ asset('images/Sanctuary.png') }}" alt="Sanctuary Logo"></a>
				</div><!-- #logo end -->

				<!-- Primary Navigation
					============================================= -->
				<nav id="primary-menu">

					<ul class="one-page-menu" data-easing="easeInOutExpo" data-speed="1250" data-offset="65">
						<li><a href="{{ route('/') }}" data-href="#wrapper">
								<div>Home</div>
							</a></li>
						<li><a href="#" data-href="#section-about" data-offset="60">
								<div>About</div>
							</a></li>
						@guest
						<li><a href="{{ route('join-sanctuary') }}">
								<div>Join Us</div>
							</a></li>
						<li><a href="{{ route('login') }}">
								<div>Login</div>
							</a></li>
						@else
						<li class="suub-menu">
							<a href="#">
								<div>{{ Auth::user()->sur_name }}</div>
							</a>
							<ul>
								<li><a href="{{ route('dashboard') }}">
										<div>
											Your Account
										</div>
									</a></li>
								<li>
									<a class="dropdown-item" href="{{ route('logout') }}"
										onclick="event.preventDefault();                  document.getElementById('logout-form').submit();">Logout</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</li>
							</ul>
						</li>
						@endguest
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
								{{-- <img src="{{ asset('images/Sanctuary.png') }}" alt=""
								style="width:100px; height:100px; margin: 1rem auto;"> --}}
								<h1 class="nott t400"
									style="line-height: 1.4;font-size: 48px; font-family: 'Playfair Display'; font-weight: normal">
									SANCTUARY UNIT</h1>
								<span class="" style="font-size:16px; top-margin: 20px;" class="t300"> MOTTO: <strong>DOING THE WILL OF
										GOD FROM THE HEART.</strong></span>
							</div>
							<a href="{{ route('join-sanctuary') }}"
								class="ml-3 button button-circle button-border button-dark button-green button-large tright nomargin clearfix"
								data-scrollto="#section-about" data-offset="60">Join Sanctuary<i class="icon-line-arrow-right"></i></a>
						</div>
					</div>
					<a href="#" data-scrollto="#section-about" data-easing="easeInOutExpo" data-speed="1250" data-offset="65"
						class="one-page-arrow"><i class="icon-line-arrow-down infinite animated fadeInDown"></i></a>
				</div>

				<div class="col-xl-7 col-md-6 full-screen center nopadding"
					style="background: url({{ asset('images/landing.jpg') }}) top center no-repeat; background-size: cover; z-index: -1">
					<div class="vertical-middle dark center clearfix">

						<div class="emphasis-title nobottommargin">
							<h1>
								<span class="text-rotater nocolor" data-separator="|" data-rotate="fadeIn" data-speed="6000">
									<span class="t-rotate t700 font-body opm-medium-word">Love.|Service.|Joy.|Family.</span>
								</span>
							</h1>
						</div>

					</div>
				</div>
			</div>

		</div>
		<!-- Go To Top
	============================================= -->
		<div id="gotoTop" class="icon-angle-up"></div>
	</section><!-- #slider end -->

	<!-- Content
		============================================= -->
	<section id="content">

		<div class="content-wrap nopadding">

			<div id="section-about" class="center page-section">

				<div class="container clearfix">

					<h2 class="divcenter bottommargin font-body" style="max-width: 700px; font-size: 40px;">About Us
					</h2>

					<p class="lead divcenter bottommargin" style="max-width: 800px;">Have you ever wondered how the church
						auditorium is kept generally so bright and clean? <strong>The Sanctuary Keepers</strong> - a team of
						dedicated men and women,
						devoted to making sure that the house of God is clean, tidy and well decorated.

						They know that cleanliness is next to Godliness so members of this Service Unit work together to add beauty
						and decorative style to the Church, including but not limited to the Church altar, Church Sanctuary and
						other areas of the Church.</p>

					<p class="bottommargin" style="font-size: 16px;"><a href="{{ route('join-sanctuary') }}"
							class="more-link">Join Sanctuary <i class="icon-angle-right"></i></a></p>

					<div class="clear"></div>

					<div class="row topmargin-lg divcenter" style="max-width: 1000px;">

						<div class="col-md-6 bottommargin">

							<div class="team">
								<div class="team-image">
									<img src="images/team/1.jpg" alt="Olotufore Joshua">
									<div class="team-overlay">
										{{-- <div class="team-social-icons">
											<a href="#" class="social-icon si-borderless si-small si-facebook" title="Facebook">
												<i class="icon-facebook"></i>
												<i class="icon-facebook"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-small si-twitter" title="Twitter">
												<i class="icon-twitter"></i>
												<i class="icon-twitter"></i>
											</a>
										</div> --}}
									</div>
								</div>
								<div class="team-desc team-desc-bg">
									<div class="team-title">
										<h4>Olotufore Joshua</h4><span>Head of Sanctuary</span>
									</div>
								</div>
							</div>

						</div>

						<div class="col-md-6 bottommargin">

							<div class="team">
								<div class="team-image">
									<img src="images/team/2.jpg" alt="Mary Chinonso">
									<div class="team-overlay">
										{{-- <div class="team-social-icons">
											<a href="#" class="social-icon si-borderless si-small si-twitter" title="Twitter">
												<i class="icon-twitter"></i>
												<i class="icon-twitter"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-small si-linkedin" title="LinkedIn">
												<i class="icon-linkedin"></i>
												<i class="icon-linkedin"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-small si-flickr" title="Flickr">
												<i class="icon-flickr"></i>
												<i class="icon-flickr"></i>
											</a>
										</div> --}}
									</div>
								</div>
								<div class="team-desc team-desc-bg">
									<div class="team-title">
										<h4>Nwaduku Chinonso</h4><span>Assistant Head of Sanctuary</span>
									</div>
								</div>
							</div>

						</div>

					</div>

				</div>

			</div>

			<div id="section-services" class="page-section notoppadding">

				<div class="section nomargin">
					<div class="container clearfix">
						<div class="divcenter center" style="max-width: 900px;">
							<h2 class="mb-3 t300 ls1">Our Service Days. </h2>
							<h4> Membership is by
								application. If
								you feel like you are called to keep God's Sanctuary clean and tidy. Please apply below.</h4>
							<p class="bottommargin" style="font-size: 16px;"><a href="{{ route('join-sanctuary') }}"
									class="more-link">Join Sanctuary <i class="icon-angle-right"></i></a></p>
						</div>
					</div>
				</div>

				<div class="row common-height">

					<div class="col-lg-4 d-none d-md-block"
						style="background: url('../images/services/main-bg.jpg') center center no-repeat; background-size: cover;">
					</div>
					<div class="col-lg-8">
						<div class="max-height">
							<div class="row common-height grid-border clearfix">
								<div class="col-lg-4 col-md-6 col-padding">
									<div class="feature-box fbox-center fbox-dark fbox-plain fbox-small nobottomborder">
										<div class="fbox-icon">
											<a href="#"><i class="icon-et-calendar"></i></a>
										</div>
										<h3>Mondays after prayer meetings</h3>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-padding">
									<div class="feature-box fbox-center fbox-dark fbox-plain fbox-small nobottomborder">
										<div class="fbox-icon">
											<a href="#"><i class="icon-et-calendar"></i></a>
										</div>
										<h3>Wednesdays after communion service </h3>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-padding">
									<div class="feature-box fbox-center fbox-dark fbox-plain fbox-small nobottomborder">
										<div class="fbox-icon">
											<a href="#"><i class="icon-et-calendar"></i></a>
										</div>
										<h3>Saturdays (7:00pm)</h3>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
				{{--
				<div class="section dark nomargin">
					<div class="divcenter center" style="max-width: 900px;">
						<h2 class="nobottommargin t300 ls1">Like Our Services? Get an <a href="#"
								data-scrollto="#template-contactform" data-offset="140" data-easing="easeInOutExpo" data-speed="1250"
								class="button button-border button-circle button-light button-large notopmargin nobottommargin"
								style="position: relative; top: -3px;">Instant Quote</a></h2>
					</div>
				</div>

				<div class="section parallax nomargin dark"
					style="background-image: url('images/page/testimonials.jpg'); padding: 150px 0;"
					data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">

					<div class="container clearfix">

						<div class="col_two_fifth nobottommargin">&nbsp;</div>

						<div class="col_three_fifth nobottommargin col_last">

							<div class="fslider testimonial testimonial-full nobgcolor noborder noshadow nopadding"
								data-arrows="false">
								<div class="flexslider">
									<div class="slider-wrap">
										<div class="slide">
											<div class="testi-content">
												<p>Similique fugit repellendus expedita excepturi iure perferendis provident quia eaque vero
													numquam?</p>
												<div class="testi-meta">
													Steve Jobs
													<span>Apple Inc.</span>
												</div>
											</div>
										</div>
										<div class="slide">
											<div class="testi-content">
												<p>Natus voluptatum enim quod necessitatibus quis expedita harum provident eos obcaecati id
													culpa corporis molestias.</p>
												<div class="testi-meta">
													Collis Ta'eed
													<span>Envato Inc.</span>
												</div>
											</div>
										</div>
										<div class="slide">
											<div class="testi-content">
												<p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam quibusdam cum libero
													illo rerum!</p>
												<div class="testi-meta">
													John Doe
													<span>XYZ Inc.</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>

					</div>

				</div> --}}

			</div>

		</div>

	</section><!-- #content end -->

	<!-- Footer
		============================================= -->
	<footer id="footer" class="dark noborder">

		<div class="container center">
			<div class="footer-widgets-wrap">

				<div class="row divcenter clearfix">

					<div class="col-lg-4">

						<div class="widget clearfix">
							<h4>Site Links</h4>

							<ul class="list-unstyled footer-site-links nobottommargin">
								<li><a href="#" data-scrollto="#wrapper" data-easing="easeInOutExpo" data-speed="1250"
										data-offset="70">Top</a></li>
								<li><a href="#" data-scrollto="#section-about" data-easing="easeInOutExpo" data-speed="1250"
										data-offset="70">About</a></li>
								<li><a href="#" data-scrollto="#section-services" data-easing="easeInOutExpo" data-speed="1250"
										data-offset="70">Services</a></li>
								<li><a href="https://webmail2.lmu.edu.ng/">Webmail</a></li>
								<li><a href="https://lmu.edu.ng/">Landmark University</a></li>
							</ul>
						</div>

					</div>

					<div class="col-lg-4">

						<img src="{{ asset('images/Sanctuary.png') }}" alt="" style="width:100px; height:100px">

					</div>

					<div class="col-lg-4">

						<div class="widget clearfix">
							<h4>Contact</h4>

							<p class="lead">Landmark University Chapel<br>third office after DSA's office.</p>
							<p class="lead">Contact Us At:<br>chaplaincy.sanctuary@lmu.edu.ng</p>
							{{-- <div class="center topmargin-sm">
								<a href="#" class="social-icon inline-block noborder si-small si-facebook" title="Facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>
								<a href="#" class="social-icon inline-block noborder si-small si-twitter" title="Twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>
								<a href="#" class="social-icon inline-block noborder si-small si-github" title="Github">
									<i class="icon-github"></i>
									<i class="icon-github"></i>
								</a>
								<a href="#" class="social-icon inline-block noborder si-small si-pinterest" title="Pinterest">
									<i class="icon-pinterest"></i>
									<i class="icon-pinterest"></i>
								</a>
							</div> --}}
						</div>

					</div>

				</div>

			</div>
		</div>

		<div id="copyrights">
			<div class="container center clearfix">
				<h6> Made With &#128147 by <a href="http://www.surgecode.com.ng/" target="_blank"
						style="color:tomato;">Surgecode Web.</a></h6>
			</div>
		</div>

	</footer><!-- #footer end -->

</div><!-- #wrapper end -->

@endsection