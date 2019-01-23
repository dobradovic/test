@extends('layouts.app')

@section('content')


          <div class="col-md-12">
            <hr>
          
    
        </div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
        <h1>Customer information:  </h1>
             <table class="table table-striped">
                    <thead>
                      <tr>
                    <th >Firstname</th>
                    <th>Lastname</th>
                    <th>Address</th>
                    <th>Phone</th>

                    </tr>
                    <tr>
                      <td>
                        {{$order[0]->customer->first_name}}
                      </td>
                       <td>
                        {{$order[0]->customer->last_name}}
                      </td>
                       <td>
                        {{$order[0]->customer->address}}
                      </td>
                       <td>
                        {{$order[0]->customer->phone}}
                      </td>
                    </tr>
                  </thead>
                </table>


      
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
                    
                    <th>Product name</th>
                    <th>Product code</th>
                    <th>Order ID</th>
                    <th>Status invoice</th>
                    <th>Product price</th>
                   
                    </tr>
                    </thead>
                    <tbody>
                          <?php
                          $total_price = 0; 
                          ?>
                    <tr>
                        @foreach($order[0]->product as $oneOrder)
            
                      <td>
                         {{$oneOrder->name}}
                    </td>
                      <td>
                         {{$oneOrder->code}}
                    </td>
                     <td>
                         {{$order[0]->id}}
                    </td>
                    <td>  

                         
                          @if($order[0]->status == 1)
                          Pending
                          @else
                          Resolved
                          @endif
                    </td>
                     <td> 
                      {{$oneOrder->real_selling_price}},00$
                                

                    </td> 

                    </tr> 
                        <?php
                          $total_price += $oneOrder->real_selling_price;
                        ?>
                        @endforeach 

                   
                      <tr>
                    <td>
                        Total price: {{$total_price}},00$
                    </td>
                  </tr>
                   
                   
                    </tr>
                    
                     </tbody>

                    </table>

                        <button onclick="myFunction()" id="printPageButton">Print this to pdf</button>

                        <script>
                        function myFunction() {
                        window.print();
                        }
                        </script>
            </div>
          
         		</div>

	</div>

</div>



@endsection