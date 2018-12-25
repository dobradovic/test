@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">


                
		<div class="col-md-5">
	       {{ Form::model($employee, array('url'=>'/employee/update/'.$employee->id, 'method'=>'patch', 'files' => 'true','enctype'=>'multipart/form-data'))}}
       
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
            {{Form::label('Job:') }}
            {{Form::text('job') }}
            
                @if($errors->first('job'))
                     <small class="text-danger">{{ $errors->first('job') }} *</small>
                @endif
            </div>

                <div class="col-sm-3">
            {{Form::label('Salary:') }}
            {{Form::text('salary') }}
            
                @if($errors->first('salary'))
                     <small class="text-danger">{{ $errors->first('salary') }} *</small>
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

@endsection