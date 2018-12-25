@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">


		<div class="col-md-12">
			<h3 style="text-align: center; margin-top: 50px">Salaries
				<p>Number of employee: {{$count}}</p><a href="/employee/index">Employee page</a></h3>

			      
			<div class="row">
			<hr>
			
			<div class="col-md-12">
			@if (session('message'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			{{ session('message') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>

			@endif
			</div>
			@if(count($employee) == 0)
			  <h1 style="text-align: center"> There is no Salaries</h1>
			@endif
				<div class="col-md-6">
	            <div class="card mb-4 shadow">
		           <div class="card-header">
		                <h5 style="text-align: center"> 

		              Total amount for monthly salaries:<p style="color:#85bb65">   {{$total}},00$ </p>
		             </h5>
		            </div>
	               
	 	         </div>
	         </div>

			  	<div class="col-md-6">
	            <div class="card mb-4 shadow">
		           <div class="card-header">
		                <h5 style="text-align: center"> 

		               Total amount for yearly salaries:<p style="color:#85bb65">   {{$yearly}},00 $ </p>
		             </h5>
		            </div>
	               
	 	         </div>
	         </div>

	

			</div>
			</div>

		
		</div>
	
	</div>
	</div>
@endsection