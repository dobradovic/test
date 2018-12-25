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
			@if(count($assets) == 0)
			  <h1 style="text-align: center"> There is no Assets</h1>
			@endif
				<div class="col-md-6">
	            <div class="card mb-4 shadow">
		           <div class="card-header">
		                <h5 style="text-align: center"> 
		              Total amount value Assets:<p style="color:#85bb65">   {{$total}},00$</p>
		             </h5>
		            </div>
	               
	 	         </div>
	         </div>

	      
	   		</div>

			@foreach($assets as $asset)

				<div class="col-md-3">
	            <div class="card mb-4 shadow">
	             
	                    <div class="card-header">
	                        <h5 style="text-align: center"> 
	                 

	                    </h5>
	                   
	                     	<h3> {{$asset->name}} </h3>
	                      <p>Price:	<b style="color:#85bb65">{{$asset->price}},00 $</p></b>
	                       
	                      @if($asset->quantity==null)
	                         <p>Quantity: {{$asset->quantity}} 1</p>
	                         <p>Total price:	<b style="color:#85bb65">{{$asset->price}},00 $</p></b>
	                      @else
	                      <p>Quantity: {{$asset->quantity}}</p>
	                      <p>Total price:	<b style="color:#85bb65">{{$asset->price * $asset->quantity}},00 $</p></b>
	                   
	                      @endif

	                      <p> Insert Date: {{$asset->created_at->format('Y-m-d')}} </p>
	                      <p> Updated Date: {{$asset->updated_at->format('Y-m-d')}} </p>
	                         	
                        	<a href="/asset/edit/{{$asset->id}}">Edit / </a>
                        	<a href="/asset/delete/{{$asset->id}}"> Delete</a>    	
	                      
	                    </div>
	               			

	             
	            </div>

			</div>
			


	       
			@endforeach	
		
		</div>
	
	</div>
	</div>
@endsection