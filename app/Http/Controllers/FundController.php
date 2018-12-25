<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fund;

class FundController extends Controller
{
     public function index()
    {
      
    	   $funds = Fund::all();

    	   $total = 0;

    	   foreach($funds as $fund)

    	   	$total += $fund->amount;

    	   return view('funds.index', compact('funds', 'total'));

    }


    public function salaries()
    {

       $employee = Employee::latest()->paginate(20);

       $total = 0;
       $yearly = 0;

       $count = $employee->count();

       foreach ($employee as $emp) {
           $total += $emp->salary;
           $yearly += $emp->salary * 12;
    }
      
      return view('expense.salaries', compact('employee', 'total', 'count','yearly'));
    }

    public function create()
    {
        return view('funds.create');
    }


    public function store(Request $request)
    {
	    $this->validate($request,[
       'name' => 'required',
       'amount' => 'required',
        ]);


        $fund = new Fund($request->all());

        $fund->name = $request->input('name');
        $fund->amount = $request->input('amount');
       

        $fund->save();

        return redirect('/fund/create')->with(['message' => 'New fund created']);
  	}

   	public function destroy($id)
    {
        $fund = Fund::find($id);

        $fund->delete();

        return redirect('/fund/index')->with(['message' => 'Fund deleted - '.$fund->name]);

    }


      public function edit($id)
    {
        $fund = Fund::find($id);

        return view('funds.edit', compact('fund'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fund = Fund::findOrFail($id);

        $fund->fill($request->all());

        $fund->name = $request->input('name');
        $fund->amount = $request->input('amount');
     
        $fund->save();

       return redirect('/fund/index')->with(['message' => 'Fund updated - '.$fund->name]);
    }

}
