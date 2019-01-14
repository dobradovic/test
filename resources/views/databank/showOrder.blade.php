@extends('layouts.app')

@section('content')


          <div class="col-md-12">
            <hr>
          
    
        </div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
        <h2>Order Customer</h2>



		
				<div class="form-group row">
					<h2>Order</h2>
                  
                    <div class="col-md-12">
                        @if (session('message'))
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                   {{ session('message') }}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
                 <a href="/customer/create"> - Create new Customer</a>
               </div>
                     
                    @endif
                    </div>  
                    @foreach($proba as $prob)
                  
                    @for($i=0; $i < count($prob->product);$i++)
                    {{$prob->product[$i]->code}}
                    @endfor
                
                    @endforeach
        
         		</div>

	</div>

</div>

@endsection