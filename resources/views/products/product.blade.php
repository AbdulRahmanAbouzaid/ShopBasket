<div class="col-sm-3">

	<div class="product-image-wrapper">

		<div class="single-products">

			<div class="productinfo text-center">

				<img src="/images/home/product1.jpg" alt="" />
				<h2>${{$product->price}}</h2>
				<p>{{$product->name}}</p>
				<a href="/products/{{$product->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>

			</div>

			<div class="product-overlay">

				<div class="overlay-content">

					<h2>${{$product->price}}</h2>
					<p>{{$product->name}}</p>
					<a href="/products/{{$product->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
					
				</div>

			</div>
		</div>
		
	</div>

</div>
	
