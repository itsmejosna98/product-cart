<header>
	<!-- TOP HEADER -->
	<div id="top-header">
		<div class="container">
			<ul class="header-links pull-left">
				<li><a href="#"><i class="fa fa-phone"></i> +91 9847581547</a></li>
				<li><a href="#"><i class="fa fa-envelope-o"></i> rahmath@email.com</a></li>
				<li><a href="#"><i class="fa fa-map-marker"></i>Kozhikode, MG-Road</a></li>
			</ul>
			<ul class="header-links pull-right">
				@if(Auth::check())
				<li><a href="{{url('cart')}}"><i class="fa fa-user-o"></i>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</a></li>
				@else
				<li><a href="{{url('guest-cart')}}"><i class="fa fa-user-o"></i> User</a></li>
				@endif
				@if(Auth::check())
				<li><a href="{{url('logout')}}"><i class="fa fa-user-o"></i>logout</a></li>
				@else
				<li><a href="{{url('login')}}"><i class="fa fa-user-o"></i> Login</a></li>
				@endif
			</ul>
		</div>
	</div>
	<!-- /TOP HEADER -->
	<!-- MAIN HEADER -->
	<div id="header">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- LOGO -->
				<div class="col-md-3">
					<div class="header-logo">
						<a href="#" class="logo">
							<img src="./img/logo.png" alt="">
						</a>
					</div>
				</div>
				<!-- /LOGO -->
				<!-- SEARCH BAR -->
				<div class="col-md-6">
					<div class="header-search">
						<h2>Rahmath Restaurent</h2>
					</div>
				</div>
				<!-- /SEARCH BAR -->

				<!-- ACCOUNT -->
				<div class="col-md-3 clearfix">
					<div class="header-ctn">
						<!-- Wishlist -->
						<div>
							<a href="{{url('home')}}">
								<i class="fa fa-home"></i>
								<span>Home</span>
							</a>
						</div>
						<!-- /Wishlist -->

						<!-- Cart -->
						@php $cart = App\Models\Cart::where('user_id' , Auth::id())->get() @endphp
						<div class="dropdown">
							@if(Auth::check())
							<a href="{{url('cart-create')}}">
								<i class="fa fa-shopping-cart"></i>
								<span>My Cart</span>
								<div class="qty">{{$cart = $cart->count()}}</div>
							</a>
							@else
							<a href="{{url('/')}}">
								<i class="fa fa-shopping-cart"></i>
								<span>My Cart</span>
								<div class="qty">{{$cart = $cart->count()}}</div>
							</a>
							@endif
						</div>
						<!-- /Cart -->

						<!-- Menu Toogle -->
						<div class="menu-toggle">
							<a href="#">
								<i class="fa fa-bars"></i>
								<span>Menu</span>
							</a>
						</div>
						<!-- /Menu Toogle -->
					</div>
				</div>
				<!-- /ACCOUNT -->
			</div>
			<!-- row -->
		</div>
		<!-- container -->
	</div>
	<!-- /MAIN HEADER -->
</header>