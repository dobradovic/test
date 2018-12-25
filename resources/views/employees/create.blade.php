@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" action="/employee/store">
				@csrf
				<div class="form-group row">
					<h2>Add new Employee</h2>
                  
                    <div class="col-md-12">
                        @if (session('message'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                   {{ session('message') }}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
                     
                    @endif
                    </div>
             

					<div style="margin-top:50px" class="col-md-6">

                       First name: <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" autofocus>

                        @if ($errors->has('first_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div style="margin-top:50px" class="col-md-6">
                       Last name: <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" autofocus>

                        @if ($errors->has('last_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div style="margin-top:50px" class="col-md-6">
                     
                          Type of job: <input id="job" type="text" class="form-control{{ $errors->has('job') ? ' is-invalid' : '' }}" name="job" value="{{ old('job') }}" autofocus>

                        @if ($errors->has('job'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('job') }}</strong>
                            </span>
                        @endif
                    </div>



                    <div style="margin-top:50px" class="col-md-6">
                     
                          Monthly / Salary $ : <input id="salary" type="text" class="form-control{{ $errors->has('salary') ? ' is-invalid' : '' }}" name="salary" value="{{ old('salary') }}" autofocus>

                        @if ($errors->has('salary'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('salary') }}</strong>
                            </span>
                        @endif
                    </div>
             
                    <div class="col-md-12">
                   <input style="margin-top:50px" id="submit" class="btn btn-primary btn-md" type="submit" class="form-control" name="submit" value="Create new Employee" required />
               </div>
            </div>
        </form>
  
          
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