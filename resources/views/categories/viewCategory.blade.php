@extends('layouts.master')

@section('content')

	<h2 class="title text-center">Products</h2>


	@foreach($category_products as $product)

		@include('products.product')

	@endforeach


@endsection