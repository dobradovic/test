@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">


		<div class="col-md-12">
			<hr>
			<h3 style="text-align: center; margin-top: 50px">Balacne sheet</h3>
		
			 		A
				<div class="col-md-4">
	            <div class="card mb-4 shadow">
		           <div class="card-header">
		                <h5 style="text-align: center"> 
		             Products available / pedning:<p style="color:#85bb65">{{$profit_product}},00$</p>
		             </h5>
		            </div>
	               
	 	         </div>
	         </div>

	         <div class="col-md-4">
	            <div class="card mb-4 shadow">
		           <div class="card-header">
		                <h5 style="text-align: center"> 
		            Assets:<p style="color:#85bb65">{{$total}},00$</p>
		             </h5>
		            </div>
	               
	 	         </div>
	         </div>


	         <div class="col-md-4">
	            <div class="card mb-4 shadow">
		           <div class="card-header">
		                <h5 style="text-align: center"> 
		            Funds available:<p style="color:#85bb65">{{$funds_total}},00$</p>
		             </h5>
		            </div>
	               
	 	         </div>
	         </div>


	         	P
				<div class="col-md-4">
	            <div class="card mb-4 shadow">
		           <div class="card-header">
		                <h5 style="text-align: center"> 
		            Total investments:<p style="color:#85bb65">{{$investments_total}},00$</p>
		             </h5>
		            </div>
	               
	 	         </div>
	         </div>

	         <div class="col-md-4">
	            <div class="card mb-4 shadow">
		           <div class="card-header">
		                <h5 style="text-align: center"> 
		            Profit:<p style="color:#85bb65">{{$profit}},00$</p>
		             </h5>
		            </div>
	               
	 	         </div>
	         </div>        		
	      	</div>

	      	     <div class="col-md-4">
	            <div class="card mb-4 shadow">
		           <div class="card-header">
		                <h5 style="text-align: center"> 
		            a:<p style="color:#85bb65">{{$a}},00$</p>
		             </h5>
		            </div>
	               
	 	         </div>
	         </div>        		
	      	</div>

	      	     <div class="col-md-4">
	            <div class="card mb-4 shadow">
		           <div class="card-header">
		                <h5 style="text-align: center"> 
		            p:<p style="color:#85bb65">{{$p}},00$</p>
		             </h5>
		            </div>
	               
	 	         </div>
	         </div>        		
	      	</div>
		
		
	
	</div>
	</div>
@endsection