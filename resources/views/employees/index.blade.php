@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">

		<div class="col-md-12">
			<hr>
			<h3 style="text-align: center; margin-top: 50px">Employees</h3>
			
		<!-- 	<div class="col-md-4">
	            <div class="card mb-4 shadow">
	                   <div class="card-header">
	                        <h5 style="text-align: center"> 
	                      Total amount of salary:<p style="color:#85bb65"> {{$salary}},00$</p>
	                     </h5>
	                    </div>
	               
	               
	         </div>
	         </div> -->

			
				@if (session('message'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                   {{ session('message') }}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
           @endif

				@if(session('warnings'))
				{{session('warnings')}}
				@endif
		
		</div>
	
	@foreach($employees as $employee)
			<div class="col-md-4">
	            <div class="card mb-4 shadow">
	                <a href="/item/{{$employee->first_name}}">
	                    <div class="card-header">
	                        <h5 style="text-align: center"> 
	                        <a href="/employee/edit/{{$employee->id}}">Edit</a>
	                        <a href="/employee/delete/{{$employee->id}}">Delete</a>
	                    </div>
	                </a>
	                <div class="card-body">
	                     <p><b>First name: {{$employee->first_name}}</b></p>
	                      <p><b>Last Name: {{$employee->last_name}}</b></p>
	                      <p><b>Job: {{$employee->job}}</b></p>
	                      <p><b>Employee from: {{$employee->created_at->format('Y-m-d')}} /year / month / day</b></p>
	 	                       @if($time->day > $employee->created_at->format('d'))
	                       	 <p><b>Payday: {{$employee->created_at->addMonths(1)->format('Y-m-d')}} </b></p>
	                       	@elseif($time->day < $employee->created_at->format('d'))
	                       		 <p><b>Payday: {{ $time->format('Y-m') }}-{{ $employee->created_at->format('d') }} </b></p>
	                       	@elseif($time->day == $employee->created_at->format('d'))
	                       	<p><b>Payday: Today</b></p>

	                       @endif

	                    <hr>
	                    <div class="d-flex justify-content-between align-items-center">
	                        <small><h6>Monthly salary: {{$employee->salary}},00 $</h6></small>
	                    </div>
	                    <div class="d-flex justify-content-between align-items-center">
	                        <small><h6>Yearly salary: {{$employee->salary*12}},00 $</h6></small>
	                    </div>
	            	</div>
	            </div>

			</div>
	@endforeach
	</div>
	</div>
@endsection