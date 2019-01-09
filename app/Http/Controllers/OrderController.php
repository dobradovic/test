<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Category;
use App\Employee;
use App\Product;
use Carbon\Carbon;
use Session;
use App\Cart;


class OrderController extends Controller
{
  public function index()
    {
        //
    }

    public function create()
    {
        return view('databank.create');
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $customer = Customer::find($id);
        $products = Product::latest()->with('category')->paginate(10);


        return view('databank.order',compact('customer',$customer,'products',$products));    
    }




    
    public function destroy($id)
    {
        //
    }

    public function addToCart(Request $request, $id){

        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id);

        $request->session()->put('cart', $cart);
        return redirect()->back();

    }

    public function getReduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);


        Session::put('cart',$cart);
        return redirect('/shopping-cart');
       
    }

    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart',$cart);
        return redirect('/shopping-cart');  
    }






    public function getCart()
    {
        if(!Session::has('cart')){
            return view('databank.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('databank.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

     public function searchOrder(Request $request)
    {


         $code = null;
         $product_name = null;

          $code=$request->code;
          $name=$request->name;


          $codeAjax = Product::where('name', 'like', '%' . $name . '%')
          ->where('code', 'like', '%' . $code . '%')->get();

          
         
          

         // return view('databank.order', compact('products'));
        return view('databank.ajaxCode',compact('codeAjax'));
    }


    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
 
            $cart[$request->id]["quantity"] = $request->quantity;
 
            session()->put('cart', $cart);
 
            session()->flash('success', 'Cart updated successfully');
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) {
 
            $cart = session()->get('cart');
 
            if(isset($cart[$request->id])) {
 
                unset($cart[$request->id]);
 
                session()->put('cart', $cart);
            }
 
            session()->flash('success', 'Product removed successfully');
        }
    }
}