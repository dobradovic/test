@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">


                
		<div class="col-md-5">
	       {{ Form::model($category, array('url'=>'/category/update/'.$category->id, 'method'=>'patch', 'files' => 'true','enctype'=>'multipart/form-data'))}}
       
            {{ csrf_field() }}
            <div class="col-sm-3">
            {{Form::label('Category name:') }}
            {{Form::text('name') }}
           
                @if($errors->first('name'))
                     <small class="text-danger">{{ $errors->first('name') }} *</small>
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