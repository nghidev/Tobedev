<!DOCTYPE HTML>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Bootstrap-ecommerce by Vosidiy">

	<title>Bootstrap ecommerce UI KIT - Alibaba example html template </title>

	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

	<!-- jQuery -->
	<script src="{{asset('/js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>

	<!-- Bootstrap4 files-->
	<script src="{{asset('/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
	<link href="{{asset('/css/bootstrap-custom.css')}}" rel="stylesheet" type="text/css" />

	<!-- Font awesome 5 -->
	<link href="{{asset('/fonts/fontawesome/css/fontawesome-all.min.css')}}" type="text/css" rel="stylesheet">

	<!-- plugin: fancybox  -->
	<script src="{{asset('/plugins/fancybox/fancybox.min.js')}}" type="text/javascript"></script>
	<link href="{{asset('/plugins/fancybox/fancybox.min.css')}}" type="text/css" rel="stylesheet">

	<!-- plugin: owl carousel  -->
	<link href="{{asset('/plugins/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
	<link href="{{asset('/plugins/owlcarousel/assets/owl.theme.default.css')}}" rel="stylesheet">
	<script src="{{asset('/plugins/owlcarousel/owl.carousel.min.js')}}"></script>

	<!-- custom style -->
	<link href="{{asset('/css/uikit.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('/css/responsive.css')}}" rel="stylesheet" media="only screen and (max-width: 1200px)" />

	<!-- custom javascript -->
	<script src="{{asset('/js/script.js')}}" type="text/javascript"></script>

	<script type="text/javascript">
		/// some script

		// jquery ready start
		$(document).ready(function() {
			// jQuery code

		});
		// jquery end
	</script>

</head>

<body>


	<header class="section-header">
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container">
				<a class="navbar-brand" href="/"><img class="logo" src="{{url('/images/logos/logo-alibaba.png')}}" alt="alibaba style e-commerce html template file" title="alibaba e-commerce html css theme"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop" aria-controls="navbarTop" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarTop">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> Sourcing </a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">Top Suppliers</a></li>
								<li><a class="dropdown-item" href="#">Suppliers by Regions </a></li>
								<li><a class="dropdown-item" href="#">Online Retailer </a></li>
							</ul>
						</li>
						<li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> Services </a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">Trade Assurance </a></li>
								<li><a class="dropdown-item" href="#">Arabic</a></li>
								<li><a class="dropdown-item" href="#">Logistics Service </a></li>
								<li><a class="dropdown-item" href="#">Membership Services</a></li>
							</ul>
						</li>
						<li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> Community </a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">Help Center</a></li>
								<li><a class="dropdown-item" href="#">Submit a Dispute </a></li>
								<li><a class="dropdown-item" href="#">For Suppliers </a></li>
							</ul>
						</li>
					</ul>
					@guest
					<ul class="navbar-nav">
						<li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
						<li class="nav-item"><a href="{{ route('register') }}" class="nav-link">{{ __('Register') }}</a></li>

					</ul> <!-- navbar-nav.// -->
					@endguest

				</div> <!-- collapse.// -->
			</div>
		</nav>

		<section class="header-main shadow-sm">
			<div class="container">
				<div class="row-sm align-items-center">
					<div class="col-lg-4-24 col-sm-3">
						<div class="category-wrap dropdown py-1">
							<button type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Categories</button>
							<div class="dropdown-menu">
								 
									<?php $cats =  App\Models\Category::orderBy('sort_order', 'DESC')->get(); ?>
									
								@foreach ($cats as $cat)
								<a class="dropdown-item" href="{{ url('cat') }}/{{ $cat->id }}">{{ $cat->name }}</a>
								@endforeach
							
							</div>
						</div>
					</div>
					<div class="col-lg-11-24 col-sm-8">
						<form action="#" class="py-1">
							<div class="input-group w-100">
								<select class="custom-select" name="category_name">
									<option value="">All type</option>
									<option value="">Special</option>
									<option value="">Only best</option>
									<option value="">Latest</option>
								</select>
								<input type="text" class="form-control" style="width:50%;" placeholder="Search">
								<div class="input-group-append">
									<button class="btn btn-warning" type="submit">
										<i class="fa fa-search"></i> Search
									</button>
								</div>
							</div>
						</form> <!-- search-wrap .end// -->
					</div> <!-- col.// -->
					<div class="col-lg-9-24 col-sm-12">
						<div class="widgets-wrap float-right row no-gutters py-1">
							<div class="col-auto">
								<div class="widget-header dropdown">

									@guest
									<a href="#" data-toggle="dropdown" data-offset="20,10">
										<div class="icontext">
											<div class="icon-wrap"><i class="text-warning icon-sm fa fa-user"></i></div>
											<div class="text-wrap text-dark">
												<i class="fa fa-caret-down"></i>
											</div>
										</div>
									</a>
									@endguest


									@auth

									<a href="#" data-toggle="dropdown" data-offset="20,10">
										<div class="icontext">
											<div class="icon-wrap"><i class="text-warning icon-sm fa fa-user"></i></div>
											<div class="text-wrap text-dark">
												{{Auth::user()->name}} <i class="fa fa-caret-down"></i>
											</div>
										</div>
									</a>
									<div class="dropdown-menu">
										<!-- <form class="px-4 py-3">
											<div class="form-group">
												<label>Email address</label>
												<input type="email" class="form-control" placeholder="email@example.com">
											</div>
											<div class="form-group">
												<label>Password</label>
												<input type="password" class="form-control" placeholder="Password">
											</div>
											<button type="submit" class="btn btn-primary">Sign in</button>
										</form>
										<hr class="dropdown-divider">
										<a class="dropdown-item" href="#">Have account? Sign up</a>
										<a class="dropdown-item" href="#">Forgot password?</a> -->
											<a class="dropdown-item" href="{{url('/order_detail')}}/{{Auth::user()->id}}">Đơn hàng của tôi</a>
										<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
														document.getElementById('logout-form').submit();">
											{{ __('Logout') }}
										</a>

										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
									</div>
									<!--  dropdown-menu .// -->
									@endauth
								</div> <!-- widget-header .// -->
							</div> <!-- col.// -->
							<div class="col-auto">
								<a href="{{url('/order')}}" class="widget-header">
									<div class="icontext">
										<div class="icon-wrap"><i class="text-warning icon-sm fa fa-shopping-cart"></i></div>
										<div class="text-wrap text-dark">
											<span class="small round badge badge-secondary">{{ count(Cart::content()) }}</span>
											<div>Order</div>
										</div>
									</div>
								</a>
							</div> <!-- col.// -->

							<div class="col-auto">
								<a href="#" class="widget-header">
									<div class="icontext">
										<div class="icon-wrap"><i class="text-warning icon-sm  fa fa-heart"></i></div>
										<div class="text-wrap text-dark">
											<span class="small round badge badge-secondary">0</span>
											<div>Favorites</div>
										</div>
									</div>
								</a>
							</div> <!-- col.// -->
						</div> <!-- widgets-wrap.// row.// -->
					</div> <!-- col.// -->
				</div> <!-- row.// -->
			</div> <!-- container.// -->
		</section> <!-- header-main .// -->
	</header> <!-- section-header.// -->

	<div>
		@yield('content')
	</div>
	<!-- ========================= SECTION SUBSCRIBE END.//========================= -->

	<!-- ========================= FOOTER ========================= -->
	<footer class="section-footer bg-secondary">
		<div class="container">
			<section class="footer-top padding-top">
				<div class="row">
					<aside class="col-sm-3 col-md-3 white">
						<h5 class="title">Customer Services</h5>
						<ul class="list-unstyled">
							<li> <a href="#">Help center</a></li>
							<li> <a href="#">Money refund</a></li>
							<li> <a href="#">Terms and Policy</a></li>
							<li> <a href="#">Open dispute</a></li>
						</ul>
					</aside>
					<aside class="col-sm-3  col-md-3 white">
						<h5 class="title">My Account</h5>
						<ul class="list-unstyled">
							<li> <a href="#"> User Login </a></li>
							<li> <a href="#"> User register </a></li>
							<li> <a href="#"> Account Setting </a></li>
							<li> <a href="#"> My Orders </a></li>
							<li> <a href="#"> My Wishlist </a></li>
						</ul>
					</aside>
					<aside class="col-sm-3  col-md-3 white">
						<h5 class="title">About</h5>
						<ul class="list-unstyled">
							<li> <a href="#"> Our history </a></li>
							<li> <a href="#"> How to buy </a></li>
							<li> <a href="#"> Delivery and payment </a></li>
							<li> <a href="#"> Advertice </a></li>
							<li> <a href="#"> Partnership </a></li>
						</ul>
					</aside>
					<aside class="col-sm-3">
						<article class="white">
							<h5 class="title">Contacts</h5>
							<p>
								<strong>Phone: </strong> +123456789 <br>
								<strong>Fax:</strong> +123456789
							</p>

							<div class="btn-group white">
								<a class="btn btn-facebook" title="Facebook" target="_blank" href="#"><i class="fab fa-facebook-f  fa-fw"></i></a>
								<a class="btn btn-instagram" title="Instagram" target="_blank" href="#"><i class="fab fa-instagram  fa-fw"></i></a>
								<a class="btn btn-youtube" title="Youtube" target="_blank" href="#"><i class="fab fa-youtube  fa-fw"></i></a>
								<a class="btn btn-twitter" title="Twitter" target="_blank" href="#"><i class="fab fa-twitter  fa-fw"></i></a>
							</div>
						</article>
					</aside>
				</div> <!-- row.// -->
				<br>
			</section>
			<section class="footer-bottom row border-top-white">
				<div class="col-sm-6">
					<p class="text-white-50"> Made with <3 <br> by Vosidiy M.</p>
				</div>
				<div class="col-sm-6">
					<p class="text-md-right text-white-50">
						Copyright &copy <br>
						<a href="http://bootstrap-ecommerce.com" class="text-white-50">Bootstrap-ecommerce UI kit</a>
					</p>
				</div>
			</section> <!-- //footer-top -->
		</div><!-- //container -->
	</footer>
	<!-- ========================= FOOTER END // ========================= -->


</body>
</html>