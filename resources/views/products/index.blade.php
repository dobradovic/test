@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">

			<form  class="col-md-12 row" action="/products/search" method="GET">

		                     <div class="form-group col-md-4">

		                         <div class="">
		                         	Search by PRODUCT CODE
		                             <input type="text" class="form-control" name="product_code"  placeholder="Product code">
		                        
		                         </div>
		                     </div>

		                        <div class="form-group col-md-4">

		                         <div class="">
		                          	Search by PRODUCT NAME
		                             <input type="text" class="form-control" name="product_name"  placeholder="Product name">
		                         </div>
		                     </div>
		                     <div class="form-group col-md-4">
		                         <div class="">
		                         	 Category:
		                             <select  id="category_parent_search" class="form-control" name="category" required>
		                                 <option value="everywhere">Everywhere</option>		                               @foreach($categories as $category)
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


		@for($i=0;$i < count ($products);$i++)
			

			<div class="col-md-2">
	            <div class="card mb-2 shadow">
	                <a href="/product/{{$products[$i]['slug']}}">
	                    <div class="card-header">
	                        <h5 style="text-align: center"> <a href="/product/edit/{{$products[$i]['id']}}">{{$products[$i]['name']}}</a></h5>
	                       
	                    </div>
	                </a>
	                <div class="card-body">
	                	  <p><small><b>code: {{$products[$i]['code'] }}</b></small></p>

	                     <small><b>category: {{$products[$i]['category']['name'] }}</b></small>
	                    
	                    <hr>
	                     <a href="/product/edit/{{$products[$i]['id']}}">Edit</a>
	                        <a href="/product/delete/{{$products[$i]['id']}}">Delete</a>
	                    <div class="d-flex justify-content-between align-items-center">
	                 
	                    </div>
	            	</div>
	            </div>

			</div>
	@endfor
	</div>
	</div>
@endsection