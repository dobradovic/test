@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">


		<div class="col-md-12">
			<hr>
			<h3 style="text-align: center; margin-top: 50px">Expenses</h3>
			      
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
			@if(count($expenses) == 0)
			  <h1 style="text-align: center"> There is no Expenses</h1>
			@endif

				<div class="col-md-6">
	            <div class="card mb-4 shadow">
		           <div class="card-header">
		                <h5 style="text-align: center"> 
		              Total amount value Expenses:<p style="color:#85bb65">   {{$sum + $y}},00$</p>

		             </h5>
		            </div>
	               
	 	         </div>
	         </div>

	          	<div class="col-md-6">
	            <div class="card mb-4 shadow">
		           <div class="card-header">
		                <h5 style="text-align: center"> 
		              Total yearly amount value Expenses:<p style="color:#85bb65">   {{$yearly}},00$</p>

		             </h5>
		            </div>
	               
	 	         </div>
	         </div>

	         	<div class="col-md-6">
	            <div class="card mb-4 shadow">
		           <div class="card-header">
		                <h5 style="text-align: center"> 
		              Total monthly amount value Expenses:<p style="color:#85bb65">   {{$monthly}},00$</p>

		             </h5>
		            </div>
	               
	 	         </div>
	         </div>

	      
	   		</div>

			@foreach($expenses as $expense)

				<div class="col-md-3">
	            <div class="card mb-4 shadow">
	             
	                    <div class="card-header">
	                        <h5 style="text-align: center"> 
	                 
	                      
	                    </h5>
	                        @if($expense->monthly == 1 )
	                    	<h3> {{$expense->name}} </h3>
	                      <p>Price:	<b style="color:#85bb65">{{$expense->price}},00 $  </b>/ monthly</p>
	                      <p>Yearly: <b style="color:#85bb65">{{$expense->price * 12}},00 $ </b></p>
	                     
	              			
	              			@else
	                     	<h3> {{$expense->name}} </h3>
	                      <p>Price:	<b style="color:#85bb65">{{$expense->price}},00 $</p></b>

	                      @endif


	                      <p> Insert Date: {{$expense->created_at->format('Y-m-d')}} </p>
	                      <p> Updated Date: {{$expense->updated_at->format('Y-m-d')}} </p>
	                         	
                        	<a href="/expense/edit/{{$expense->id}}">Edit / </a>
                        	<a href="/expense/delete/{{$expense->id}}"> Delete</a>    	
	                      
	                    </div>
	               			

	             
	            </div>

			</div>
			


	       
			@endforeach	
		
		</div>
	
	</div>
	</div>
@endsection