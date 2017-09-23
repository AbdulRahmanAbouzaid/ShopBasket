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

							<td class="price">Price</td>

							<td class="quantity">Quantity</td>

<!-- 							<td class="total">Total</td>
 -->
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

									<p>${{$product->price}}</p>

								</td>

								<td class="cart_quantity">

									<div class="cart_quantity_button">

										<input class="cart_quantity_input" type="number" name="quantity" value="{{$product->pivot->quantity}}">

									</div>

								</td>

								<!-- <td class="cart_total">

									<p class="cart_total_price">$59</p>

								</td> -->

								<td class="cart_delete">

									<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>

								</td>

							</tr>

						@endforeach
		
					</tbody>
		
				</table>

			</div>

		</div>

	</section> <!--/#cart_items-->

@endsection