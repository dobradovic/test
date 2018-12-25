@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">


                
		<div class="col-md-5">
	       {{ Form::model($product, array('url'=>'/product/update/'.$product->id, 'method'=>'patch', 'files' => 'true','enctype'=>'multipart/form-data'))}}
       
            {{ csrf_field() }}
            <div class="col-sm-3">
            {{Form::label('Product name:') }}
            {{Form::text('name') }}
           
                @if($errors->first('name'))
                     <small class="text-danger">{{ $errors->first('name') }} *</small>
                @endif
            </div>

               <div class="col-sm-3">
            {{Form::label('Buying price:') }}
            {{Form::text('buying_price') }}
           
                @if($errors->first('buying_price'))
                     <small class="text-danger">{{ $errors->first('buying_price') }} *</small>
                @endif
            </div>

            <div class="col-sm-3">
            {{Form::label('Wanted selling price:') }}
            {{Form::text('wanted_selling_price') }}
            
                @if($errors->first('wanted_selling_price'))
                     <small class="text-danger">{{ $errors->first('wanted_selling_price') }} *</small>
                @endif
            </div>

             <div class="col-sm-3">
            {{Form::label('Selling price:') }}
            {{Form::text('real_selling_price') }}
          
                @if($errors->first('real_selling_price'))
                     <small class="text-danger">{{ $errors->first('real_selling_price') }} *</small>
                @endif
            </div>
           
           	 <div class="col-sm-3">
            {{Form::label('Code:') }}
            {{Form::text('code') }}
    
                @if($errors->first('code'))
                     <small class="text-danger">{{ $errors->first('code') }} *</small>
                @endif
            </div>


              <div class="col-sm-3">
            {{Form::label('Category:') }}

                        <select class="dynamic" data-dependent="subcat" id="category" name="category" required>

                                @foreach($category_list as $category)
                                    @if($product->category->id == $category->id)
                                    <option value="{{ $category->id }}" selected> {{ $category->name }}</option>
                                    @else

                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                @endforeach

                        </select>

  Product Subcategory:
                        <div id="ajaxProducts">

                             <select id="subcat" name="subcat">
                                  
                
                                    <option value="">Select subcategory</option>
              
                             </select>
                        </div>
            </div>  

                
                  <div class="col-sm-3">
            {{Form::label('Status:') }}
            {{Form::select('status', [$product->status => "status - ".$product->status, '1' => 'Available', '2' => 'Sold', '3' => 'Pending'])}}


            </div> 
        
      
                     
             <div class="col-sm-3">
             {{Form::submit('edit')}}
                  </div> 

            </div>    
           </div>


                 @if(session('error'))
                    <div class="alert alert-danger">
                         {{ session('error') }}
                    </div>
                 @endif

                <div class="col-sm-8">
                @if(session('message'))
                <div class="alert alert-success">
                {{ session('message') }}
                </div>
                @endif



                 @if(session('warnings'))
                    {{session('warnings')}}
                 @endif
                </div>
        {!! Form::close() !!}
          
	</div>
</div>
<script>
$(document).ready(function(){
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
});

</script>
@endsection