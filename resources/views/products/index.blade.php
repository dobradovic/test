@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">

			<form  class="col-md-12 row" action="/products/search" method="GET">

		                     <div class="form-group col-md-3">
		                         <div class="">
		                             <input type="text" class="form-control" name="product_code"  placeholder="Search by PRODUCT CODE">
		                             <input type="text" class="form-control" name="product_name"  placeholder="Search by PRODUCT NAME">
		                         </div>
		                     </div>
		                     <div class="form-group col-md-3">
		                         <div class="">
		                         	 Category:
		                             <select  id="category_parent_search" class="form-control" name="category" required>
		                                 <option value="everywhere">Everywhere</option
>		                                 @foreach($categories as $category)
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
		</form>

		<div class="col-md-12">
			<hr>
			<h3 style="text-align: center; margin-top: 50px">Products</h3>

			
				@if(session('message'))
				<div class="alert alert-success">
				{{ session('message') }}
				</div>
				@endif

				@if(session('warnings'))
				{{session('warnings')}}
				@endif
		
		</div>
	@foreach($products as $product)
			<div class="col-md-2">
	            <div class="card mb-2 shadow">
	                <a href="/item/{{$product->slug}}">
	                    <div class="card-header">
	                        <h5 style="text-align: center"> <a href="/product/edit/{{$product->id}}">{{$product->name}}</a></h5>
	                        <a href="/product/edit/{{$product->id}}">Edit</a>
	                        <a href="/product/delete/{{$product->id}}">Delete</a>
	                    </div>
	                </a>
	                <div class="card-body">
	                     <small><b>category: {{$product->category->name}}</b></small>
	                    <hr>
	                    <div class="d-flex justify-content-between align-items-center">
	                 
	                    </div>
	            	</div>
	            </div>

			</div>
	@endforeach
	</div>
	</div>
@endsection