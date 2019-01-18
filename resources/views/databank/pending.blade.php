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
                    <div class="alert alert-success alert-dismissible fade show" role="success">
                    {{ session('message') }}

                    </div>

                    @endif
                    </div>  

                    <div class="col-md-12">
                    @if (session('alert'))
                    <div class="alert alert-danger alert-dismissible fade show" role="danger">
                    {{ session('alert') }}

                    </div>

                    @endif
                    </div>  
                    <table class="table table-striped">
                    <thead>
                      <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product name</th>
                    <th>Product code</th>
                    <th>Order ID</th>
                    <th>Status invoice</th>
                    <th>Change status to resolved</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pending as $pInvoice)
                                       
                   @for($i=0; $i < count($pInvoice->product);$i++)
                  
                    <tr>
                    @if($pInvoice->status == 1)
                    <td>{{$pInvoice->customer->first_name}}</td>
                    <td>{{$pInvoice->customer->last_name}}</td>
                    <td>{{$pInvoice->customer->address}}</td>
                    <td>{{$pInvoice->customer->phone}}</td>
                    <td>{{$pInvoice->product[$i]->name}}</td>
                    <td>{{$pInvoice->product[$i]->code}}</td>
                    <td>{{$pInvoice->id}}</td>
                    <td>Pending</td>
                    <td>Change to resolved 
                       <form method="POST" action="/order/updateInvoice/{{$pInvoice->id}}">
                        @csrf
                         <input type="hidden" name="order_id[]" value="{{$pInvoice->id}}" />
                        <input type="checkbox" name="update_invoice[]" id="update_invoice" value="2" ><input type="submit"></td>
                        </form>
                    <td>
                        <a href="/order/print/{{$pInvoice->id}}">Create pdf for customer</a>
                  <!--       <p>Click the button to print the current page.</p>

                        <button onclick="myFunction()">Print this page</button>

                        <script>
                        function myFunction() {
                        window.print();
                        }
                        </script> -->
                    </td>
                    @endif
                    </tr>
                                                         
                    @endfor
                
                    @endforeach

                     </tbody>
                    </table>
            </div>
       
         		</div>

	</div>

</div>



@endsection