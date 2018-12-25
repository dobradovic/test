@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">


                <div class="form-group row">      
		<div class="col-md-5">
	       {{ Form::model($fund, array('url'=>'/fund/update/'.$fund->id, 'method'=>'patch', 'files' => 'true','enctype'=>'multipart/form-data', ))}}
       
            {{ csrf_field() }}
            <div class="col-sm-3">
            {{Form::label('Name of fund:') }}
            {{Form::text('name') }}
           
                @if($errors->first('name'))
                     <small class="text-danger">{{ $errors->first('name') }} *</small>
                @endif
            </div>

               <div class="col-sm-3">
            {{Form::label('Amount:') }}
            {{Form::text('amount') }}
           
                @if($errors->first('amount'))
                     <small class="text-danger">{{ $errors->first('amount') }} *</small>
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