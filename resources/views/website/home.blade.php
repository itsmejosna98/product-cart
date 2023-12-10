@extends('../layouts-site.app')
@section('content')
<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- Products tab & slick -->
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab1" class="tab-pane active">
							<div class="products-slick" data-nav="#slick-nav-1">
								<!-- product -->
								@foreach ($products as $product)
								<div class="product">
									<div class="product-img">
									<img width="80px" height="150px" src="http://127.0.0.1:8000{{$product->image}}">
									</div>
									<div class="product-body">
										<h4 class="product-price">{{$product->product_name}} </h4>
										<h3 class="product-name"><a href="#">{{$product->price}}</a></h3>
									</div>
									<div class="product-btns text-center">
											<a href="{{url('product-view/'.$product->id.'/view')}}"><i class="fa fa-eye"></i></a>
										</div>
										<!-- <div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
									</div> -->
								</div>
								@endforeach
								
							</div>
							<div id="slick-nav-1" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- Products tab & slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- HOT DEAL SECTION -->

<!-- /HOT DEAL SECTION -->
@endsection