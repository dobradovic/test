@extends('layouts.app')

@section('content')


@if(Session::has('cart'))
<div class="containter">

		<div class="row">

			<div class="col-md-6 col-md-offset-3 col-sm-offset-3">

				<ul class="list-group">
					<form id="OrderCustomer" action="/storeOrderCustomer" method="POST">
					@csrf
						

					<li class="list-group-item">
						<h4>Customer information</h4>
						<p> First name : {{ session('customer')->first_name }}</p>
						<p> Last name : {{ session('customer')->last_name }}</p>
						<p> Address : {{ session('customer')->address }}</p>
						<p> Phone : {{ session('customer')->phone }}</p>
					</li>
					

					@foreach($products as $product)

						<input type="hidden" name="product_name[]" value="{{$product['product']['name']}}" />
						<input type="hidden" name="product_code[]" value="{{$product['product']['code']}}" />
						<input type="hidden" name="product_price[]" value="{{$product['price']}}" />
						<input type="hidden" name="customer_id[]" value="{{ session('customer')->id }}" />
						<input type="hidden" name="product_id[]" value="{{$product['product']['id']}}" />
						<li class="list-group-item">
							<span class="badge"> <p>Quantity:{{
								$product['qty']}} - price for each product {{$product['product']['real_selling_price']}} </p></span>
								<p> Product name : {{$product['product']['name'] }}</p>
								<p>from category : {{$product['product']['category_id']}}</p>

								<span class="label label-success">
									<p>Price : {{ $product['price'] }} </p>
									<div class="btn-group">
										<button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a href="/reduce/{{$product['product']['id']}}">Reduce by 1</a></li>
											<li><a href="/remove/{{$product['product']['id']}}">reduce all</a></li>
										</ul>
										
                        
                        <a href="/remove/{{$product['product']['id']}}">Delete item</a>
                    <!-- 	<button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $product['product']['id']}}"><i class="fa fa-trash-o"></i></button> -->
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
		</form>


		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<button type="submit" class="btn btn-success" form="OrderCustomer">Store</button>
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

    <script type="text/javascript">
 
        $(".update-cart").click(function (e) {
           e.preventDefault();
 
           var ele = $(this);
 
            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });
 
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
 
            var ele = $(this);
 
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
 
    </script>
 
@endsection