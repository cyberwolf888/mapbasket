<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title>GIS Basket</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{ url('assets/frontend') }}/css/style.css">
<link rel="stylesheet" href="{{ url('assets/frontend') }}/css/colors/blue.css" id="colors">

@stack('page_css')

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container">

	<!-- Header -->
	<div id="header" class="not-sticky">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a href="{{ route('home') }}"><img src="{{ url('assets/frontend') }}/images/logo.png" alt=""></a>
				</div>

				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>

				<!-- Main Navigation -->
				@include('layouts.menu_frontend')
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->

			<!-- Right Side Content / End -->
			<div class="right-side">
				<div class="header-widget">
					@if(Auth::check())
						<a href="{{ route('logout') }}" class="sign-in popup-with-zoom-anim" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="sl sl-icon-logout"></i> Sign out</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
                    @else
                        <a href="#sign-in-dialog" class="sign-in popup-with-zoom-anim"><i class="sl sl-icon-login"></i> Sign In</a>
                    @endif
				</div>
			</div>
			<!-- Right Side Content / End -->

			<!-- Sign In Popup -->
			<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">

				<div class="small-dialog-header">
					<h3>Sign In</h3>
				</div>

				<!--Tabs -->
				<div class="sign-in-form style-1">

					<ul class="tabs-nav">
						<li class=""><a href="#tab1">Log In</a></li>
					</ul>

					<div class="tabs-container alt">

						<!-- Login -->
						<div class="tab-content" id="tab1" style="display: none;">
							<form method="POST" action="{{ route('login') }}">
								@csrf

								@if($errors->has('password') || $errors->has('email'))
								<div class="notification error closeable">
									<p>{{ $errors->first('email') }}</p>
									<p>{{ $errors->first('password') }}</p>
									<a class="close"></a>
								</div>
								@endif

								<p class="form-row form-row-wide">
									<label for="username">Username:
										<i class="im im-icon-Male"></i>
										<input type="email" class="input-text" name="email" id="email" value="" />
									</label>
								</p>

								<p class="form-row form-row-wide">
									<label for="password">Password:
										<i class="im im-icon-Lock-2"></i>
										<input class="input-text" type="password" name="password" id="password"/>
									</label>
									<span class="lost_password">
										<a href="#" >Lost Your Password?</a>
									</span>
								</p>

								<div class="form-row">
									<input type="submit" class="button border margin-top-5" name="login" value="Login" />
								</div>
								
							</form>
						</div>


					</div>
				</div>
			</div>
			<!-- Sign In Popup / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->

@yield('content')

<!-- Footer
================================================== -->
<div id="footer" class="">
	<!-- Main -->
	<div class="container">
		<!-- Copyright -->
		<div class="row">
			<div class="col-md-12">
				<div class="copyrights">© {{ date('Y') }} STMIK STIKOM Bali. All Rights Reserved.</div>
			</div>
		</div>

	</div>

</div>
<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>


</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/mmenu.min.js"></script>
<script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/chosen.min.js"></script>
<script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/slick.min.js"></script>
<script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/rangeslider.min.js"></script>
<script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/waypoints.min.js"></script>
<script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/counterup.min.js"></script>
<script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/tooltips.min.js"></script>
<script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/custom.js"></script>

@stack('plugin_scripts')

@stack('page_scripts')


@if($errors->has('password') || $errors->has('email'))
<script>
	$(document).ready(function(){
		$.magnificPopup.open({
			items: {
				src: '#sign-in-dialog'
			},
			type: 'inline'
		});
	});
</script>
@endif

</body>

</html>