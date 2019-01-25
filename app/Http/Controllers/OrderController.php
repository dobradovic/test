<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Category;
use App\Employee;
use App\Product;
use App\Order;
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
        
       

        $order = new Order();
        $order->customer_id = $request->customer_id[0];
        
        $order->save();
       
        $order = Order::find($order->id);
        $products_id = [];
        foreach($request->product_id as $product){
            array_push($products_id, $product);
        } 
      
        $order->product()->attach($products_id);

        $proba = Order::with('product')->with('customer')->get();
        
       return view('databank.showOrder',compact('proba'));
      
      
        // for($i=0;$i < count($orders['customer_id']);$i++){  
        //  echo $orders['customer_id'][$i].'<br/>';
        //  echo $orders['product_id'][$i].'<br/>';
           
    }

    public function customersInvoices()
    {
        $proba = Order::with('product')->get();

        return view('databank.customersInvoices',compact('proba'));
    }

    public function pending(){

        $pending = Order::with('product')->get();

        return view('databank.pending', compact('pending'));

    }

      public function resolved(){

        $resolved = Order::with('product')->get();

        return view('databank.resolved', compact('resolved'));

    }

    public function updateToResolved(Request $request,$order_id){
            
            $status = $request->input('update_invoice');    

            if($status[0] == 2){      
                         
            Order::where('id','=',$order_id)->update(['status' => $status[0]]);

            return redirect()->back()->with(['message' => 'Invoice  successfuly updated to Resolved']);
            }
            else
                return redirect()->back()->with('alert', 'You must populate chechbox!');
    }



    public function show($id)
    {
      
    
    $order = Order::with('customer')->with('product')->where('id','=', $id)->get();
     
        $total = 0;
       
        


        return view('databank.print', compact('order','total'));
            
    }


    public function edit(Request $request, $id)
    {   
        if($request->session()->has('cart'))
        {
             
             if($request->session()->has('customer'))
            {
                if(session('customer')->id != $id){

                    $request->session()->forget('customer');
                    $request->session()->forget('cart');
                }
            }
            
        }
     
      
        $customer = Customer::find($id);
        $products = Product::latest()->with('category')->paginate(10);
        $categoriesMain= Category::all()->where('parent_category_id','=',null);

        return view('databank.order',compact('customer','products','categoriesMain'));    
    }




    
    public function destroy($id)
    {
        //
    }

    public function addToCart(Request $request, $id, $customer_id){


        if($request->session()->has('customer'))
        {
             
            if(session('customer')->id != $customer_id){

                $request->session()->forget('customer');
            }
        }
     

        $customer = Customer::where('id','=',$customer_id)->first();
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id);

        $request->session()->put('cart', $cart);
        $request->session()->put('customer', $customer);
        
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

         $customer_id = $request->customer;
         $code = null;
         $product_name = null;

          $code=$request->code;
          $name=$request->name;


          $codeAjax = Product::where('name', 'like', '%' . $name . '%')
          ->where('code', 'like', '%' . $code . '%')->get();

         // return view('databank.order', compact('products'));
        return view('databank.ajaxCode',compact('codeAjax','customer_id'));
    }

    public function searchOrderCategory(Request $request)
    {
        $customer_id = $request->customer;
        $id=$request->id;

        $categoriesAjax=Product::where('category_id','=',$id)->get();
      
        return view('databank.ajaxCategory',compact('categoriesAjax','customer_id'));
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