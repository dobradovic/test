@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">


		<div class="col-md-12">
			<h3 style="text-align: center; margin-top: 50px">Investments / Bank / Cash / Others </h3>
			
			 	<div class="col-md-4">
	            <div class="card mb-4 shadow">
	                   <div class="card-header">
	                        <h5 style="text-align: center"> 
	                      Total amount of Invesments:<p style="color:#85bb65"> {{$total}},00$</p>
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
			@if(count($investment) == 0)
			  <h1 style="text-align: center"> There is no Investments</h1>
			@endif

			 @foreach($investment as $invest)
				<div class="col-md-6">
			
	            <div class="card mb-4 shadow">

		           <div class="card-header">

		                <h5 style="text-align: center"> 
		              
		            Name of investment: <h3>{{$invest->name}} </h3><p style="color:#85bb65">   {{$invest->amount}},00$ </p>
		               
		             </h5>


	                      <p> Insert Date: {{$invest->created_at->format('Y-m-d')}} </p>
	                      <p> Updated Date: {{$invest->updated_at->format('Y-m-d')}} </p>
	                         	
                        	<a href="/investment/edit/{{$invest->id}}">Edit / </a>
                        	<a href="/investment/delete/{{$invest->id}}"> Delete</a>    	
		            </div>

	 	         </div>
    
	 	   		        
	         </div>
	         		@endforeach 
	          
			</div>
			</div>



	
@endsection

