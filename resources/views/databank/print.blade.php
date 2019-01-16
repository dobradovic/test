@extends('layouts.app')

@section('content')


          <div class="col-md-12">
            <hr>
          
    
        </div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
        <h2>Customer:  {{$order[0]->customer->first_name}}  {{$order[0]->customer->last_name}}</h2>


      
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
                    <th>PRINT invoice</th>
                    </tr>
                    </thead>
                    <tbody>
                      
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
                      <td>
                         {{$order[0]->product[0]->name}}
                    </td>
                      <td>
                         {{$order[0]->product[0]->code}}
                    </td>
                     <td>
                         {{$order[0]->id}}
                    </td>
                    <td>
                          {{$order[0]['status']}}
                    </td>
                     <td>
                                

                        <button onclick="myFunction()">Print this to pdf</button>

                        <script>
                        function myFunction() {
                        window.print();
                        }
                        </script>
                    </td>

                    </tr>
                      
            
          
       
                    </td>
                   
                    </tr>
           
                     </tbody>
                    </table>
            </div>
       
         		</div>

	</div>

</div>



@endsection