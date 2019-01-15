@extends('layouts.app')

@section('content')


          <div class="col-md-12">
            <hr>
          
    
        </div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
        <h2>All Customers and thier invoices</h2>


        <form method="POST" action="/order/updateInvoice">
		  @csrf
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
                    <th>Change status to resolved</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pending as $pInvoice)
                                       
                   @for($i=0; $i < count($pInvoice->product);$i++)
                   <input type="hidden" name="order_id[]" value="{{$pInvoice->id}}" />
                    <tr>
                    @if($pInvoice->status == 1)
                    <td>{{$pInvoice->customer->first_name}}</td>
                    <td>{{$pInvoice->customer->last_name}}</td>
                    <td>{{$pInvoice->customer->address}}</td>
                    <td>{{$pInvoice->product[$i]->name}}</td>
                    <td>{{$pInvoice->product[$i]->code}}</td>
                    <td>id ordera{{$pInvoice->id}}</td>
                    <td>Pending</td>
                    <td>Change to resolved <input type="checkbox" name="update_invoice" id="update_invoice" value="2" ><input type="submit"></td>
                  

                    @endif
                    </tr>
                                                         
                    @endfor
                
                    @endforeach
                     </tbody>
                    </table>
            </div>
        </form>
         		</div>

	</div>

</div>

@endsection