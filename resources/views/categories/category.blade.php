@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" action="/category/store">
				@csrf
				<div class="form-group row">
					<h2>Create new category and sub category</h2>
                  
                    <div class="col-md-12">
                             @if(session('msg'))
                        <div class="alert alert-danger">
                             {{ session('msg') }}
                        </div>
                         @endif
                        @if($errors->any())
                        <div class="alert alert-danger">
                        <h4>{{$errors->first()}}</h4>
                
                        </div>
                         @endif
                    </div>
             
                    <div class="col-md-12">
                        
                          Enter new category: <input type="checkbox" name="checkbox1" id="checkboxOne" onclick="enableDisableAll();" />

                    </div> 


					<div style="margin-top:50px" class="col-md-6">

                       Category name: <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus class="child1" name="group1" disabled>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div style="margin-top:50px" class="col-md-6">
                       Code for category: <input id="code" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ old('code') }}" required autofocus disabled>

                        @if ($errors->has('code'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('code') }}</strong>
                            </span>
                        @endif
                    </div>
             
                    <div class="col-md-6">
                   <input style="margin-top:50px" id="submit" class="btn btn-primary btn-md" type="submit" class="form-control" name="submit" value="Create new categoy" required />
               </div>
            </div>
        </form>
                 <div class="col-md-12">
                    Enable to insert sub category: <input type="checkbox" name="checkbox2" id="checkboxTwo" onclick="enableDisableAll();" />
                </div>
            <form method="POST" action="/category/store_sub_category">
                @csrf
                    <div style="margin-top:50px" class="col-md-6">
                       Sub category: <input id="name_sub" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus disabled>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div style="margin-top:50px" class="col-md-6">
                       Code for sub category: <input id="code_sub" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ old('code') }}" required autofocus disabled>

                        @if ($errors->has('code'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('code') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div style="margin-top:50px" class="col-md-6">
                    Product category: 

                    <select class="form-control" id="parent_category_id" name="parent_category_id" required disabled>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}} - {{$category->code}}</option>
                            @endforeach
                    </select>
                    @if ($errors->has('parent_category_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('parent_category_id') }}</strong>
                        </span>
                    @endif
                    </div>

                   <!--  <div style="margin-top:50px" class="col-md-6">
                        Product code: <input id="code" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ old('code') }}" required autofocus>

                        @if ($errors->has('code'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('code') }}</strong>
                            </span>
                        @endif
                    </div> -->
                    <div class="col-md6">
                    <input style="margin-top:50px" id="submit" class="btn btn-primary btn-md" type="submit" class="form-control" name="submit" value="Create new sub category" required />
                </div>
        @if(session('message'))
            <div class="alert alert-success">
                 {{ session('message') }}
            </div>
         @endif
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