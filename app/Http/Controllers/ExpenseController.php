<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Expense;
use App\Employee;
use App\Assets;
use DB;


class ExpenseController extends Controller
{

  

    public function index()
    {
       $expenses = Expense::all();
        
        //Expenses calculation

         $total = 0;
         $monthly = 0;
         $yearly = 0;
         $sum = 0;

      
        foreach($expenses as $expense){

        
        if($expense->monthly == 1){

        $monthly +=  $expense->price;
        $yearly = $monthly * 12 ;
        $sum = $yearly;
        }

        else
         $sum += $expense->price;
      }

      //Salaries calculation

       $employee = Employee::latest()->paginate(20);

       $t = 0;
       $y = 0;

      

       foreach ($employee as $emp) {
           $t += $emp->salary;
           $y += $emp->salary * 12;
       }

       // $assets = Assets::latest()->paginate(20);


       // $q = 0;
       // $summary = 0;

       // foreach($assets as $asset)

       //  if($asset->quantity == true){

       //  $q += $asset->price * $asset->quantity;

       //  }
       //  else
            
       //  $summary += $asset->price;

       //  $total_summary = $q + $summary;




    
    	return view('expense.index', compact('expenses', 'monthly', 'yearly', 'sum', 'total','y'));
    
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
        return view('expense.create');
    }


    public function store(Request $request)
    {
	    $this->validate($request,[
       'name' => 'required',
       'price' => 'required',
        ]);


        $expense = new Expense($request->all());

        $expense->name = $request->input('name');
        $expense->price = $request->input('price');
        $expense->monthly = $request->input('monthly');

        $expense->save();

        return redirect('/expense/create')->with(['message' => 'New expense created']);
  	}

   	public function destroy($id)
    {
        $expense = Expense::find($id);

        $expense->delete();

        return redirect('/expense/index')->with(['message' => 'Expense deleted']);

    }


      public function edit($id)
    {
        $expense = Expense::find($id);

        return view('expense.edit', compact('expense', $expense));
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
        $expense = Expense::findOrFail($id);

        $expense->fill($request->all());

        $expense->name = $request->input('name');
        $expense->price = $request->input('price');
     
        $expense->save();

        return redirect()->back()->with(['expense' => $expense, 'message' => 'Expense updated']);
    }

 
  }
