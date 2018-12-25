@extends('layouts.app')

@section('content')


@if(Session::has('cart'))
<div class="containter">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-offset-3">
				<ul class="list-group">
					@foreach($products as $product)
				
						<li class="list-group-item">
							<span class="badge"> <p>Quantity:{{
								$product['qty']}} - price for each product {{$product['product']['real_selling_price']}} </span></p>
								<p> Product name : {{$product['product']['name'] }}</p>
								<p>from category : {{$product['product']['category_id']}}</p>
								<span class=label label-success>
									<p>Price : {{ $product['price'] }} </p>
									<div class="btn-group">
										<button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a href="/reduce/{{$product['product']['id']}}">Reduce by 1</a></li>
											<li><a href="/remove/{{$product['product']['id']}}">reduce all</a></li>
										</ul>

									</div>
								</span>
													
						</li>
						
					@endforeach
				</ul>
			</div>
		</div>

			<a href="/removeItems">reduce all</a>

		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">

				<strong>Total: {{$totalPrice}}, 00$ </strong>
				
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<button type="button" class="btn btn-success">Checkout</button>
			</div>
		</div>
	@else
	<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
			<h2>No products in cart</h2>
			</div>
		</div>
	@endif
</div>
@endsection