@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">


		<div class="col-md-12">
			<hr>
			<h3 style="text-align: center; margin-top: 50px">Revenue</h3>
			@if(count($products) == 0)
			  <h1 style="text-align: center"> There is no Revenue</h1>
			@endif

				<div class="col-md-4">
	            <div class="card mb-4 shadow">
		           <div class="card-header">
		                <h5 style="text-align: center"> 
		             Revenue:<p style="color:#85bb65">   {{$revenue}},00$</p>
		             </h5>
		            </div>
	               
	 	         </div>
	         </div>
	         			</div>
		
		
	
	</div>
	</div>
@endsection