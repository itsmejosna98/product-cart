@extends('../layouts-site.app')
@section('content')
<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Our Products</h3>
					<div class="section-nav">
						<form>
							<select class="input-select" placeholder="Select category" name="category" onchange="this.form.submit()">
								<option disabled="" selected="">Select category</option>
								@foreach($categories as $category)
								<option value="{{$category->id}}" @if(app('request')->input('name') == $category->name) selected @endif>{{$category->name}}</option>
								@endforeach
							</select>
						</form>
						<a href="{{url('home')}}"><button type="submit" name="submit" class="btn btn-danger mr-2" style="margin-top: -65px;margin-left:190px;">All</button></a>
					</div>
				</div>
			</div>
			<!-- /section title -->
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
										<img width="80px" src="<?php echo $product['image']; ?>">
									</div>
									<div class="product-body">
										<p class="product-category">{{$product->view_products->name}}</p>
										<h3 class="product-name"><a href="#">{{$product->name}}</a></h3>
										<h4 class="product-price">{{$product->price}} ₹</h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="product-btns">
											<a href="{{url('product/'.$product->id.'/edit')}}"><i class="fa fa-eye"></i></a>
											<!-- <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button> -->
										</div>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
									</div>
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