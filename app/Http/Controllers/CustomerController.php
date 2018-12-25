<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Category;
use App\Employee;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


      $this->validate($request,[
           'first_name' => 'required',
           'last_name' => 'required',
           'address' => 'required',
            ]);

        $customer = new Customer($request->all());

        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->address = $request->input('address');
        $customer->phone =  str_replace(' ', '',$request->input('phone'));

       
        $customer->save();

        return redirect('/customer/create')->with(['message' => 'New customer created']);
    }


    public function search(Request $request){
    $q = Input::get ( 'q' );
    $user = Customer::where('first_name','LIKE','%'.$q.'%')->orWhere('address','LIKE','%'.$q.'%')->get();

    if(count($user) > 0)
        return view('databank.create')->withDetails($user)->withQuery ( $q );
    else
    {   

        return redirect('order/create')->with(['message'=> 'No results']);
    }
    
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
         $customer = Customer::find($id);

        return view('databank.order',compact('customer',$customer));    

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
