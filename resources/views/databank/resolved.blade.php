@extends('layouts.app')

@section('content')


          <div class="col-md-12">
            <hr>
          
    
        </div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
        <h2>All Customers and thier invoices</h2>



		
				<div class="form-group row">
			
                  
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
                    <table class="table table-striped">
                    <thead>
                      <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Address</th>
                    <th>Product name</th>
                    <th>Product code</th>
                    <th>Status invoice</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($resolved as $rInvoice)
                                       
                   @for($i=0; $i < count($rInvoice->product);$i++)

                    <tr>
                    @if($rInvoice->status == 2)
                    <td>{{$rInvoice->customer->first_name}}</td>
                    <td>{{$rInvoice->customer->last_name}}</td>
                    <td>{{$rInvoice->customer->address}}</td>
                    <td>{{$rInvoice->product[$i]->name}}</td>
                    <td>{{$rInvoice->product[$i]->code}}</td>
                   
                    <td>Resolved</td>
              
                    @endif
                    </tr>
                                                         
                    @endfor
                
                    @endforeach
                     </tbody>
                    </table>
        
         		</div>

	</div>

</div>

@endsection