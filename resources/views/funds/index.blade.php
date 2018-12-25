@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">


		<div class="col-md-12">
			<h3 style="text-align: center; margin-top: 50px">Funds Available</h3>
			
			 	<div class="col-md-4">
	            <div class="card mb-4 shadow">
	                   <div class="card-header">
	                        <h5 style="text-align: center"> 
	                      Total amount of available funds:<p style="color:#85bb65"> {{$total}},00 $</p>
	                     </h5>
	                    </div>
	               
	               
	         </div>
	         </div>     	
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
			@if(count($funds) == 0)
			  <h1 style="text-align: center"> There is no funds</h1>
			@endif

			 @foreach($funds as $fund)
				<div class="col-md-6">
			
	            <div class="card mb-4 shadow">

		           <div class="card-header">

		                <h5 style="text-align: center"> 
		              
		            Name of fund: <h3>{{$fund->name}} </h3>Amount: <p style="color:#85bb65">   {{$fund->amount}},00$ </p>
		               
		             </h5>


	                      <p> Insert Date: {{$fund->created_at->format('Y-m-d')}} </p>
	                      <p> Updated Date: {{$fund->updated_at->format('Y-m-d')}} </p>
	                         	
                        	<a href="/fund/edit/{{$fund->id}}">Edit / </a>
                        	<a href="/fund/delete/{{$fund->id}}"> Delete</a>    	
		            </div>

	 	         </div>
    
	 	   		        
	         </div>
	         		@endforeach 
	          
			</div>
			</div>



	
@endsection

