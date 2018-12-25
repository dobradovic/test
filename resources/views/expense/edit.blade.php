@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">


                <div class="form-group row">      
		<div class="col-md-5">
	       {{ Form::model($expense, array('url'=>'/expense/update/'.$expense->id, 'method'=>'patch', 'files' => 'true','enctype'=>'multipart/form-data', ))}}
       
            {{ csrf_field() }}
            <div class="col-sm-3">
            {{Form::label('Name of expense:') }}
            {{Form::text('name') }}
           
                @if($errors->first('name'))
                     <small class="text-danger">{{ $errors->first('name') }} *</small>
                @endif
            </div>

               <div class="col-sm-3">
            {{Form::label('Price:') }}
            {{Form::text('price') }}
           
                @if($errors->first('price'))
                     <small class="text-danger">{{ $errors->first('price') }} *</small>
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
</div>

@endsection