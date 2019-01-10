@if($categoriesAjax->isEmpty())
	There is no records
@endif
@foreach($categoriesAjax as $category)
       
        <div class="col-md-6">
                <div class="card mb-6 shadow">
                    <a href="#">
                        <div class="card-header">
                            <h5 style="text-align: center"> {{$category->name}} </h5>
                                                
                        </div>
                    </a>
                    <div class="card-body">
                        Code: {{$category->code}} 
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <small><h6>Price: {{$category->real_selling_price}},00 $</h6></small>
                        </div>
                             <button type="button"><a href="/add-to-cart/{{$category->id}}">Add to cart</a></button>
                    </div>

                </div>
                
            </div>
           
@endforeach