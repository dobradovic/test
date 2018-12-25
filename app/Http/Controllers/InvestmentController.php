<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Investment;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class InvestmentController extends Controller
{

    public function create()
    {
        return view('investment.create');
    }

    
    public function index()
    {
       $investment = Investment::latest()->paginate(20);

       $total = 0;

       foreach($investment as $invest)

        $total += $invest->amount;

    	
    	return view('investment.index', compact('investment', $investment, 'total' ,$total));
    }




    public function store(Request $request)
    {
	    $this->validate($request,[
       'name' => 'required',
       'amount' => 'required',
        ]);


        $investment = new Investment($request->all());

        $investment->name = $request->input('name');
        $investment->amount = $request->input('amount');
      
        $investment->save();

        return redirect('/investment/create')->with(['message' => 'New investment created']);
  	}

   	public function destroy($id)
    {
        $investment = Investment::find($id);

        $investment->delete();

        return redirect('/investment/index')->with(['message' => 'Investment deleted']);

    }


    public function edit($id)
    {
         $investment = Investment::find($id);

        return view('investment.edit', compact('investment', $investment));   
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
        $investment = Investment::findOrFail($id);

        $investment->fill($request->all());

        $investment->name = $request->input('name');
        $investment->amount = $request->input('amount');
     
        $investment->save();

        return redirect('investment/index')->with(['investment' => $investment, 'message' => 'Investment updated']);
    }

}
