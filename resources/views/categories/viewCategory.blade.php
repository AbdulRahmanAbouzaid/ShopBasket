@extends('layouts.master')

@section('content')

	<h2 class="title text-center">Products</h2>

	@if($category->isEmpty())

		<h2> There Is No Prouducts Added To this Category Yet </h2>

	@else

	@foreach($category_products as $product)

		@include('products.product')

	@endforeach

	@endif

@endsection