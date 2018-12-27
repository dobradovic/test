@extends('layouts.app')

@section('content')
	<div class="container">
	

		<div class="row">
		<div class="col-md-12">
			<hr>

			<h3 style="text-align: center; margin-top: 50px">Balacne sheet</h3>
		</div>
		</div>
		<div class="row">
			
			
				
			 <div class="col-md-6">
			 	Acitve
	            <div class="card mb-4 shadow">
		           <div class="card-header">
		                <h5 style="text-align: center"> 
		             Products available / pedning:<p style="color:#85bb65">{{$profit_product}},00$</p>
		             </h5>
		            </div>
	               
	 	         </div>
	       
	       

	        
	            <div class="card mb-4 shadow">
		           <div class="card-header">
		                <h5 style="text-align: center"> 
		            Assets:<p style="color:#85bb65">{{$assets_total}},00$</p>
		             </h5>
		            </div>
	               
	 	         </div>
	       


	         
	            <div class="card mb-4 shadow">
		           <div class="card-header">
		                <h5 style="text-align: center"> 
		            Funds available:<p style="color:#85bb65">{{$funds_total}},00$</p>
		             </h5>
		            </div>
	               
	 	         </div>
	     	</div>
	         	
	         	
	         
				<div class="col-md-6">
				Passive
	            <div class="card mb-4 shadow">
		           <div class="card-header">
		                <h5 style="text-align: center"> 
		            Total investments:<p style="color:#85bb65">{{$investments_total}},00$</p>
		             </h5>
		            </div>
	               
	 	         </div>
	       

	        
	            <div class="card mb-4 shadow">
		           <div class="card-header">
		                <h5 style="text-align: center"> 
		            Profit:<p style="color:#85bb65">{{$profit}},00$</p>
		             </h5>
		            </div>
	               
	 	         </div>
	         </div>        		
	        </div> 
	       
	        	
	    
	  


			<div class="row">
			<div class="col-md-6">
				<div class="card mb-6 shadow">
				<div class="card-header">
					<h5 style="text-align: center"> 
					Active:<p style="color:#85bb65">{{$a}},00$</p>
					</h5>
				</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card mb-6 shadow">
				<div class="card-header">
					<h5 style="text-align: center"> 
					Passive:<p style="color:#85bb65">{{$p}},00$</p>
					</h5>
				</div>
				</div>
			</div>

			@if( $a != $p )
			<div class="col-md-12">
					<br>
			<div class="alert alert-danger">

  			There is some problem with calculation

			</div>

			@endif
			</div> 
			</div>   		
	</div>

			
	
	</div>
	
@endsection