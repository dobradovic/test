@extends('layouts.app')

@section('content')
                <div class="col-md-12">
            <hr>
          

       
              
        
        </div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
        <h1 align="center">Add new order and invoice</h1>
        <h2>Search customers</h2>
      <form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Search users"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
              Search
            </button>
        </span>
    </div>
</form>


<div class="container">
    @if(isset($details))
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <h2>Customers</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Last name</th>
                <th>Address</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $customer)
            <tr>
                <td>{{$customer->first_name}}</td>
                <td>{{$customer->last_name}}</td>
                <td>{{$customer->address}}</td>
                 <td>{{$customer->phone}}</td>
                <td><a href="order/edit/{{$customer->id}}">Create an order for {{$customer->first_name}}</a></td>

            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
                

                <div class="container">
                <div class="row">
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
               </div>
           </div>
           <h3>Create new customer if customer does not exist in our database</h3>


					
             
                    <div class="col-md-12">
                   <a href="/customer/create">
                   <input style="margin-top:50px" id="submit" class="btn btn-primary btn-lg" type="submit" class="form-control" name="submit" value="Create new Customer" required />
                </a>
               </div> </div>
            </div>
   
  
          
			</div>
			</form>
		</div>
	</div>
    

<!-- <form id="myForm">
    <h3>Section 1</h3>
    Checkbox 1: <input type="checkbox" name="checkbox1" id="checkboxOne" onclick="enableDisableAll();" />
    <p><input type="text" id="emailAddr" name="myEmailAddr" placeholder="Email" disabled /></p>
    <p><input type="text" id="emailConfirm" name="myEmailConfirm" placeholder="Confirm Email" disabled /></p>
    <p><input type="text" id="fullName" name="myFullName" placeholder="Full Name" disabled /></p>
    
    <h3>Section 2</h3>
    Checkbox 2: <input type="checkbox" name="checkbox2" id="checkboxTwo" onclick="enableDisableAll();" />
    <p><input type="text" id="color" name="myColor" placeholder="Color" disabled /></p>
    <p><input type="text" id="size" name="mySize" placeholder="Size" disabled /></p>
    <p><input type="text" id="model" name="myModel" placeholder="Model" disabled /></p>
</form> -->
</div>
<script>

</script>
@endsection