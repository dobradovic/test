@extends('layouts.app')

@section('content')


                <div class="col-md-12">
            <hr>
          

       
              
        
        </div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
        <h2>Search customers</h2>
      <form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Search users"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>





			<form method="POST" action="/order/store">
				@csrf
				<div class="form-group row">
					<h2>Add new order and invoice</h2>
                  
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
             

					<div style="margin-top:50px" class="col-md-6">
            
            {{ Form::model($customer, array('url'=>'/order/update/'.$customer->id, 'method'=>'patch', 'files' => 'true','enctype'=>'multipart/form-data'))}}
            
            {{ csrf_field() }}
            <div class="col-sm-3">
            {{Form::label('First name:') }}
            {{Form::text('first_name') }}
           
                @if($errors->first('first_name'))
                     <small class="text-danger">{{ $errors->first('first_name') }} *</small>
                @endif
            </div>

               <div class="col-sm-3">
            {{Form::label('Last name:') }}
            {{Form::text('last_name') }}
           
                @if($errors->first('last_name'))
                     <small class="text-danger">{{ $errors->first('last_name') }} *</small>
                @endif
            </div>

            <div class="col-sm-3">
            {{Form::label('Address:') }}
            {{Form::text('address') }}
            
                @if($errors->first('address'))
                     <small class="text-danger">{{ $errors->first('address') }} *</small>
                @endif
            </div>


            <div class="col-sm-3">
            {{Form::label('Phone:') }}
            {{Form::text('phone') }}
            
                @if($errors->first('phone'))
                     <small class="text-danger">{{ $errors->first('phone') }} *</small>
                @endif
            </div>
<!-- 
             <div class="col-sm-3">
            {{Form::label('Phone:') }}
            {{Form::text('phone') }}
          
                @if($errors->first('phone'))
                     <small class="text-danger">{{ $errors->first('phone') }} *</small>
                @endif
            </div> -->


                 
                    <div class="col-md-12">
                   <input style="margin-top:50px" id="submit" class="btn btn-primary btn-md" type="submit" class="form-control" name="submit" value="Create new order and invoice" required />
               </div>
            </div>
        </form>
            

        <a href="/shopping-cart">
         <span class="badge">  Number of products in cart: {{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
         <i class="fa fa-shopping-cart" aria-hidden="true"></i>
         </a>
         
			</div>
			</form>
                         <!--    <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span> -->
                               @foreach($products as $product)
            <div class="col-md-6">
                <div class="card mb-6 shadow">
                    <a href="/item/{{$product->slug}}">
                        <div class="card-header">
                            <h5 style="text-align: center"> <a href="/product/edit/{{$product->id}}">{{$product->name}}</a></h5>
                         <button type="button"><a href="/add-to-cart/{{$product->id}}">Add to cart</a></button>
                         
                        </div>
                    </a>
                    <div class="card-body">
                         <small><b>category: {{$product->category->name}}</b></small>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <small><h6>Price: {{$product->real_selling_price}},00 $</h6></small>
                        </div>
                    </div>
                </div>
                
            </div>
    @endforeach
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