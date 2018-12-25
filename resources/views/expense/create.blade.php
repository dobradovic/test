@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" action="/expense/store">
				@csrf
				<div class="form-group row">
					<h2>Add new Expense</h2>
                  
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

                      Name of expense: <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div style="margin-top:50px" class="col-md-6">
                       Price / amount $: <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" autofocus>

                        @if ($errors->has('price'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                        @endif
                    </div>   

                     <div class="col-md-2">
                      Monthly price:<input id="monthly" type="checkbox" value="1" class="form-control{{ $errors->has('monthly') ? ' is-invalid' : '' }}" name="monthly" value="{{ old('monthly') }}" autofocus>           
                       </div>



                    <div class="col-md-12">
                   <input style="margin-top:50px" id="submit" class="btn btn-primary btn-md" type="submit" class="form-control" name="submit" value="Create new Expense" required />
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