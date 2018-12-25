<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\View;


class ProductController extends Controller
{
    public function create()
    {   
        
         $category_list = DB::table('categories')
        // ->where('parent_category_id', '=', '')
        ->orWhereNull('parent_category_id')
        ->get();

    	return view('products.create')->with('category_list', $category_list);

    }


    public function fetch(Request $request)
    {
        //return response($request->all(),200);
        $id=$request->id;

        $categoriesAjax=Category::where('parent_category_id','=',$id)->get();

        $sub_categories = Category::where('parent_category_id','=','id')->get();

        return view('products.ajaxProducts',compact('categoriesAjax','sub_categories'));
      
        
    }

    public function show(Product $product)
    {
    	return view('products.show', compact('product'));
    }

    public function index()
    {
    	$products = Product::latest()->with('category')->paginate(10);
    	
    	return view('products.index', compact('products'));
    }

    public function indexByCategory($slug)
    {
    	$category = Category::where('slug', $slug)->first();
    	$products = Product::where('category_id', $category->id)->latest()->paginate(10);
    	
    	return view('products.index', compact('products'));
    }

    public function store(Request $request)
    {
        $product = Product::where('code', '=' , $request->code)->first();

        if($product){
            
             return redirect()->back()->withErrors(['Already have product with this code']);
        
        }


    	$product = Product::create([
    		'name' => $request->name,
    		'buying_price' => $request->buying_price,
            'real_selling_price' => $request->real_selling_price,
            'wanted_selling_price' => $request->wanted_selling_price,
    		'category_id' => $request->category,
    		'code' => $request->code,
            'status' => '1',
    		'slug' => str_slug($request->name, '-').'-'.substr(md5(Carbon::now()), 0, 8)
    	]);

    
    
       
        return redirect('/product/index')->with(['message' => 'New product added']);

      
    }

    public function edit($id){ 

        $product = Product::find($id);

        $category_list = DB::table('categories')
        // ->where('parent_category_id', '=', '')
        ->orWhereNull('parent_category_id')
        ->get();



        // $sub_categories = DB::table('categories')
        // ->where('id','=','parent_category_id')
        // ->get();

        // $sub_categories=Category::where('parent_category_id','=','id')->get();
        
         return view('products.edit',compact('product',$product,'category_list',$category_list));    

        

    }

    public function update(Request $request, $id){

        $product = Product::findOrFail($id);
        
        $product->fill($request->all());

        $product->name = $request->input('name');
        $product->buying_price = $request->input('buying_price');
        $product->wanted_selling_price = $request->input('wanted_selling_price');
        $product->real_selling_price = $request->input('real_selling_price');
        $product->code = $request->input('code');
        $product->category_id = $request->input('category');

        $product->save(); 

        return redirect()->back()->with(['product' => $product, 'message' => 'Product updated']);

    }

     public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect('product/index')->with(['message' => 'Product deleted']);
    }

    public function search(Request $request)
    {
    	 $product_code = null;
    	 $product_name = null;
    	 

    	 (isset($request->product_name)? $product_name = $request->product_name : $product_name = null);
    	 (isset($request->product_code)? $product_code = $request->product_code : $product_code = null);

    	 $products = Product::getProductsBySearch($product_code, $product_name, $request->category);
    	 
       	 return view('products.index', compact('products'));
    }


    //dispaly products with available status
    public function available() 
    {   
        
        $products = Product::latest()->paginate(10)->where('status', '=', 1);

        $profit = 0;
      
        foreach($products as $product)

        $profit += $product->real_selling_price;
  
        return view('products.available', compact('products','profit',$profit));

    }

    //dispaly products with sold status
    public function sold()  
    {   

     
        
        $products = Product::latest()->paginate(10)->where('status', '=', 2);
        //dd($products);
        $profit = 0;
      
        foreach($products as $product){

          $profit += $product->real_selling_price - $product->buying_price;
            
        }
          
        return view('products.sold', compact('products','profit',$profit));

    }

    //dispaly products with pending status
    public function pending() 
    {   
        
        $products = Product::latest()->paginate(10)->where('status', '=', 3);

        
        $profit = 0;
      
        foreach($products as $product){

           $profit += $product->real_selling_price - $product->buying_price;
            
        }

        return view('products.pending', compact('products','profit',$profit));

    }

   
   
}
