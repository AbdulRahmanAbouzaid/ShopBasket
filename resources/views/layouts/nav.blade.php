<div class="header-middle"><!--header-middle-->

	<div class="container">

		<div class="row">

			<div class="col-sm-4">

				<div class="logo pull-left">

					<a href="/"><img src="/images/home/logo.png" alt="" /></a>

				</div>

				<div class="btn-group pull-right">

					

				</div>

			</div>

			<div class="col-sm-8">

				<div class="shop-menu pull-right">

					<ul class="nav navbar-nav">

						@if(auth()->check())

							<li><a href="#" class="{{$account_active or ''}}"><i class="fa fa-user"></i>
								{{auth()->user()->name}}	
							</a></li>

						@endif

						<li><a href="#" class="{{$products_active or ''}}"><i class="fa fa-barcode"></i> Products</a></li>

						<li><a href="/categories" class="{{$categories_active or ''}}"><i class="fa fa-th-large"></i> Categories</a></li>

						<li><a href="/basket" class="{{$basket_active or ''}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>

						<li><a href="/login" class="{{$login_active or ''}}"><i class="fa fa-lock"></i> Login</a></li>

					</ul>

				</div>

			</div>

		</div>

	</div>

</div>

<br/>