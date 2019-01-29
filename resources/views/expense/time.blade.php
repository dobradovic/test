@extends('layouts.app')

@section('content')
	<div class="container">
			<hr>
			<h3 style="text-align: center; margin-top: 50px">Expenses for selected period</h3>
			      
		<div class="row">

			<div class="col-sm-4">
	<form action="/expensesFromTo" method="POST">
    		@csrf
		
			<p>
				Expenses from date : 
			</p>
	
		{{ Form::date('date_from','',array('required' => 'required', 'class' => 'form-control')) }}
			<p>
				Expenses to : 
			</p>
					{{ Form::date('date_to','',array('required' => 'required', 'class' => 'form-control')) }}
		<p>

		</p>
		
                   <input id="submit" class="btn btn-primary btn-md" type="submit" class="form-control" name="submit" value="Check" required />
            
		
		</form>
			</div>
				</div>

		<div class="row">

@if(session('proba'))
<div class="col-md-12">

	</div>
<div class="col-md-6">
	<div class="shadow p-3 mb-5 bg-white rounded">
	<p>
	<b>Expense for period from {{session('from')}} to {{session('to')}} </b>
	</p>
	@foreach(session('proba') as $p)
	
		<?php
			$total += $p->price;
		?>

		
		<div class="shadow p-3 mb-5 bg-white rounded">
			<p>Expense: {{$p->name}}</p>
			<p>Amount: {{$p->price}}</p>
		</div>
		
	
	@endforeach
		<b>Expenses for selected period: {{$total}}</b>
	@endif
</div>
</div>
	@if(session('proba1'))
	<div class="col-md-6">
	<div class="shadow p-3 mb-5 bg-white rounded">	
	<p>
	<b>Expense for period from {{session('from')}} to {{session('to')}} </b>
	</p>
	@foreach(session('proba1') as $p1)
		<?php
			$salary += $p1->salary;
			$m = $p1->created_at->format('n');
		?>
		
		<div class="shadow p-3 mb-5 bg-white rounded">
			<p>Name: {{$p1->first_name}}</p>
			<p>Amount: {{$p1->salary}} / monthly</p>


		

		</div>	

		

	
	@endforeach

	
		
		@foreach(session('salaryForPeriod') as $sfp)
			
			<?php
				
				$total_salary += $sfp;
			?>
		
			
		@endforeach

			<h2>Total salary for selected period: {{$total_salary}}</h2>
				<h1>Total:{{$total + $total_salary}},00$</h1>	
	@endif
		</div>
</div>
	</div>
		</div>
		</div>
@endsection