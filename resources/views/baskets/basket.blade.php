@extends('layouts.master')

@section('content')

	<section id="cart_items">

		<div class="container">

			<div class="breadcrumbs">

				<ol class="breadcrumb">

				  <li><a href="#">Home</a></li>

				  <li class="active">Shopping Basket</li>

				</ol>

			</div>

			<div class="table-responsive cart_info">

				<table class="table table-condensed">

					<thead>

						<tr class="cart_menu">

							<td class="image">Product</td>

							<td class="description"></td>

							<td class="price">Product Price</td>

							<td class="quantity">Quantity</td>

							<td class="total">Total Price</td>

							<td>Delete</td>

						</tr>

					</thead>

					<tbody>

						@foreach($basket->products as $product)

							<tr>

								<td class="cart_product">

									<a href=""><img src="/images/cart/one.png" alt=""></a>

								</td>

								<td class="cart_description">

									<h4><a href="">{{$product->name}}</a></h4>

									<p>Product Code: {{$product->code}}</p>

								</td>

								<td class="cart_price">

									<p>${{$product->netPrice()}}</p>

								</td>

								<td class="cart_quantity">

									<div class="cart_quantity_button">

										<input class="cart_quantity_input" type="number" name="quantity[]" value="{{$product->pivot->quantity}}" readonly>

									</div>

								</td>

								<td class="cart_total">

									<p class="cart_total_price">${{$product->quantitiesPrice()}}</p>

								</td>

								<td class="cart_delete">

									<a class="cart_quantity_delete" href="/basket/delete-products/{{$product->id}}"><i class="fa fa-times"></i></a>

								</td>

							</tr>

						@endforeach
		
					</tbody>
		
				</table>

			</div>

		</div>

	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="total_area">
						<ul>
							<li>Basket Net Total <span>${{$basket->totalNetPrice()}}</span></li>
						</ul>

						<div class="row">
							<center>
								<a class="btn btn-default update" href="/basket/confirm-purchase">Confirm Purchasing</a>
								<a class="btn btn-default update" href="">Cancel</a>
								<a class="btn btn-default update" href="">Delete Basket</a>

							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection