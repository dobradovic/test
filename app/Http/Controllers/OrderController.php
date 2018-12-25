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


    public function update(Request $request, $id)
    {
        //
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
}