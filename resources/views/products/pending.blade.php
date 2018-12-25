@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">


		<div class="col-md-12">
			<hr>
			<h3 style="text-align: center; margin-top: 50px">Pending products</h3>
			@if(count($products) == 0)
			  <h1 style="text-align: center"> There is no pending products</h1>
			@endif
		<div class="col-md-6">
	            <div class="card mb-4 shadow">
		           <div class="card-header">
		                <h5 style="text-align: center"> 
		              Total profit amount of pending products:<p style="color:#85bb65">   {{$profit}},00$</p>
		             </h5>
		            </div>
	               
	 	         </div>
	         </div>
	   		</div>

			@foreach($products as $product)

				<div class="col-md-3">
	            <div class="card mb-4 shadow">
	                <a href="/item/{{$product->slug}}">
	                    <div class="card-header">
	                        <h5 style="text-align: center"> 
	                 
                        	<a href="/product/edit/{{$product->id}}">{{$product->name}}</a>

                        <small><p>product code: {{$product->code}}</p></small>
	                    </h5>


	                    <p> Buying price: {{$product->buying_price}} </p>
	                    <p> Wanted selling price: {{$product->wanted_selling_price}} </p>
	                      <p>Real selling price:	<b style="color:#85bb65">{{$product->real_selling_price}} $</p></b>
	                             	
	                    <b>Profit :  
	                   	
	                   	<b style="color:#85bb65">  {{((int)$product['real_selling_price'] - (int)$product['buying_price'])}} $
	                    </b>
	                	</b>
	           <!--      	<p>
	                    <b>
	                    	Wanted price: 
	                    	<b style="color:#85bb65"> {{ ((int)$product['wanted_selling_price'] - (int)$product['selling_price'])}} $
	                    </b>

	                </b> </p> -->
	                    </div>
	                </a>
	             
	            </div>

			</div>
			


	       
			@endforeach	
		
		</div>
	
	</div>
	</div>
@endsection