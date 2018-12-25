@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <form method="POST" action="/product">
                @csrf
                <div class="form-group row">
                    <h2>Create new product</h2>

                    @if(session('message'))
                    <div class="alert alert-success">
                    {{ session('message') }}
                    </div>
                    @endif

                    @if(session('warnings'))
                    {{session('warnings')}}
                    @endif

                      @if($errors->any())
                    <div class="alert alert-danger">
                    <h4>{{$errors->first()}}</h4>
                    @endif
                    </div>
                    <div style="margin-top:50px" class="col-md-6">
                        Product code: <input id="code" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ old('code') }}" required autofocus>

                        @if ($errors->has('code'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('code') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div style="margin-top:50px" class="col-md-6">
                        Product name: <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div style="margin-top:50px" class="col-md-6">
                        Product buying price: <input id="buying_price" type="text" class="form-control{{ $errors->has('buying_price') ? ' is-invalid' : '' }}" name="buying_price" value="{{ old('buying_price') }}" required autofocus>

                        @if ($errors->has('buying_price'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('buying_price') }}</strong>
                            </span>
                        @endif
                    </div>
                        <div style="margin-top:50px" class="col-md-6">
                        Product wanted selling price: <input id="wanted_selling_price" type="text" class="form-control{{ $errors->has('wanted_selling_price') ? ' is-invalid' : '' }}" name="wanted_selling_price" value="{{ old('wanted_selling_price') }}" required autofocus>

                        @if ($errors->has('wanted_selling_price'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('wanted_selling_price') }}</strong>
                            </span>
                        @endif
                    </div>
                        <div style="margin-top:50px" class="col-md-6">
                        Product selling price: <input id="real_selling_price" type="text" class="form-control{{ $errors->has('real_selling_price') ? ' is-invalid' : '' }}" name="real_selling_price" value="{{ old('real_selling_price') }}" required autofocus>

                        @if ($errors->has('real_selling_price'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('real_selling_price') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div style="margin-top:50px" class="col-md-6">
                        Product category: 
                        <select class="form-control input-lg dynamic" id="category" name="category" required>
                            <option value="">Select Category</option>
                                @foreach($category_list as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                        </select>
                   <!--      @if ($errors->has('category'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('category') }}</strong>
                            </span>
                        @endif -->
                         Product Subcategory:
                        <div id="ajaxProducts">

                             <select class="form-control input-lg" id="subcat" name="subcat">
                                        <option value="">Select subcategory</option>

                             </select>
                        </div>
                    </div>
                    
                    
                    <input style="margin-top:50px" id="submit" type="submit" class="form-control" name="submit" value="Create" required />
                </div>
            </form>
        </div>
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