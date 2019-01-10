@if($codeAjax->isEmpty())
	There is no records
@endif
@foreach($codeAjax as $code)



        <div class="col-md-6">
                <div class="card mb-6 shadow">
                    <a href="#">
                        <div class="card-header">
                            <h5 style="text-align: center"> {{$code->name}} </h5>
                                                
                        </div>
                    </a>
                    <div class="card-body">
                        Code: {{$code->code}} 
                        
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <small><h6>Price: {{$code->real_selling_price}},00 $</h6></small>
                        </div>
                             <button type="button"><a href="/add-to-cart/{{$code->id}}/{{$customer_id}}">Add to cart</a></button>
                    </div>

                </div>
                
            </div>
@endforeach