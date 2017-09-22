@extends('layouts.master')

@section('content')

<section id="slider">

		<div class="container">

			<div class="row">

				<div class="col-sm-12">

					<div>

						<div class="col-sm-6">
							<h1><span>E</span>-SHOPPING</h1>
							<h2>Free E-Commerce Template</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
						</div>

						<div class="col-sm-6">
							<img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
						</div>

					</div>

					
				</div>

			</div>

			<div class="row">

				<div class="col-sm-12">

					<img src="images/shop/advertisement.jpg" class="advertisement" alt="" />

				</div>

			</div>



		</div>
		
	</section>
	
	<section>

		<div class="container">

			<div class="row">

				<div class="col-sm-3">

					<div class="left-sidebar">		
						@include('categories.category')		
					</div>

				</div>

				<div class="col-sm-9 padding-right">

					<div class="products"><!--products-->	
						@include('products.product')	
					</div><!--products-->

				</div>

			</div>

		</div>

</section>

@endsection