@extends('layouts.master')


@section('content')
	
	<div class="col-sm-12 padding-right">

		<div class="product-details"><!--product-details-->

			<div class="col-sm-5">

				<div class="view-product">

					<img src="/images/product-details/1.jpg" alt="" /><!--  Product Image -->

				</div>

			</div>

			<div class="col-sm-7">

				<div class="product-information"><!--/product-information-->

					<h2>{{$product->name}}</h2>
					
					<p>Product Code : {{$product->code}}</p>
					
					<span>
					
						<span>
						@if(!$product->hasDiscount())

							$ {{$product->price}} US

						@else

							${{$product->priceAfterDiscount()}}

						@endif

						</span>
					
						<label>Quantity:</label>
					
						<input type="number" value="1" min="1" max="{{$product->quantity}}" />
					
						<button type="button" class="btn btn-fefault cart">
					
							<i class="fa fa-shopping-cart"></i>
					
							Add to cart
					
						</button>
					
					</span>
					
					<p><b>Available Quantity:</b> {{$product->quantity}}</p>
					
					<p><b>Discount:</b>

					@if(!$product->hasDiscount())

							None 

						</p>

					@else

							{{$product->discount_pct}} %

						</p>
					
						<p><b>Actual Price: </b> % {{$product->price}}</p>
					
					@endif

					<a href=""><img src="/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
				
				</div><!--/product-information-->
			
			</div>
		
		</div><!--/product-details-->
		
		
		
		<div class="recommended_items"><!--recommended_items-->
			
			<h2 class="title text-center">recommended items</h2>	
			
				<div class="col-sm-4">
			
					<div class="product-image-wrapper">
			
						<div class="single-products">
			
							<div class="productinfo text-center">
			
								<img src="/images/home/recommend1.jpg" alt="" />
			
								<h2>$56</h2>
			
								<p>Easy Polo Black Edition</p>
			
								<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
							
							</div>
						
						</div>

					</div>

				</div>

				<div class="col-sm-4">

					<div class="product-image-wrapper">

						<div class="single-products">

							<div class="productinfo text-center">

								<img src="/images/home/recommend2.jpg" alt="" />

								<h2>$56</h2>

								<p>Easy Polo Black Edition</p>

								<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>

							</div>

						</div>

					</div>

				</div>

				<div class="col-sm-4">

					<div class="product-image-wrapper">

						<div class="single-products">

							<div class="productinfo text-center">

								<img src="/images/home/recommend3.jpg" alt="" />

								<h2>$56</h2>

								<p>Easy Polo Black Edition</p>

								<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>

							</div>

						</div>

					</div>

				</div>			

		</div>

	</div>

@endsection