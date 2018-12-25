@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">


		<div class="col-md-12">
			<hr>
			<h3 style="text-align: center; margin-top: 50px">Expenses</h3>
			@if(count($expenses) == 0)
			  <h1 style="text-align: center"> There is no Expenses</h1>
			@endif

				<div class="col-md-4">
	            <div class="card mb-4 shadow">
		           <div class="card-header">
		                <h5 style="text-align: center"> 
		             Expenses:<p style="color:#85bb65">   {{$total_expenses}},00$</p>
		             </h5>
		            </div>
	               
	 	         </div>
	         </div>
	         			</div>
		
		
	
	</div>
	</div>
@endsection