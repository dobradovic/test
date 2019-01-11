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
               Search
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
            {{ Form::hidden('customer', $customer->id, array('id' => 'customer')) }}
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
   
            

        <a href="/shopping-cart">
         <span class="badge">  Number of products in cart: {{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
         <i class="fa fa-shopping-cart" aria-hidden="true"></i>
         </a>
         
			</div>
		  {{ Form::close() }}


        <!--     <form  class="col-md-12 row" action="/products/search" method="GET"> -->
            <div class="col-md-12">
                             <div class="form-group col-md-4">

                                 <div class="">
                                    Search by PRODUCT CODE
                                     <input type="text" class="form-control" name="product_code_search"  id="product_code_search" placeholder="Product code">
                                    
                                 </div>
                             </div>

                                <div class="form-group col-md-4">

                                 <div class="">
                                    Search by PRODUCT NAME
                                     <input type="text" class="form-control" name="product_name_search" id="product_name_search" placeholder="Product name">
                                 </div>
                             </div>
                             <div class="form-group col-md-4">
                                 <div class="">
                                     Category:
                                     <select  id="category_search" class="form-control" name="category_search" required>
                                         <option value="everywhere">Choose category...</option>                                    @foreach($categoriesMain as $category)
                                     
                                             <option value="{{$category->id}}">{{$category->name}}</option>
                                       
                                         @endforeach
                                     </select>
                                 </div>
                             </div>
                             <div class="form-group col-md-2">
                                 <div class="">
                                     <input type="submit" class="btn-secondary btn form-control" value="Search">
                                 </div>
                             </div>

                             <div id="ajaxCode">

    
                             </div>                

                             </div>
         <!--    </form> -->
                         <!--    <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span> -->

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
<script type="text/javascript">

$(document).ready(function(){
$('#product_code_search, #product_name_search').on('keyup',function(){

var code=$('#product_code_search').val();
var name=$('#product_name_search').val();
var customer=$('#customer').val();
var token =  $('input[name="_token"]').attr('value');

$.ajax({

type : 'POST',

url : '/searchOrder',

data:{
    'customer':customer,
    'code':code,
    'name':name

},

headers:{
     'X-CSRF-Token' : token
 },

success:function(data){
    console.log(customer);
 $('#ajaxCode').html(data);


}
});
})

})



$(document).ready(function(){
    $('#category_search').change(function(){

       var id = $('#category_search').val();
       var customer=$('#customer').val();
       var token =  $('input[name="_token"]').attr('value');
    
       $.ajax({
            type:'POST',
            url:'/searchOrderCategory',
            data:{
                'id':id,
                'customer':customer
            },
            headers:{
               'X-CSRF-Token' : token
            },
            success:function(data){
                $('#ajaxCode').html(data);
            }
       });
    });
});

</script>






<!-- $(document).ready(function(){
    $('.dynamic').change(function(){

       var id = $('.dynamic').val();
       var token =  $('input[name="_token"]').attr('value');
    
       $.ajax({
            type:'POST',
            url:'/dynamic_dependent/fetch',
            data:{
                'id':id
            },
            headers:{
               'X-CSRF-Token' : token
            },
            success:function(data){
                $('#ajaxProducts').html(data);
            }
       });
    });
}); -->

@endsection