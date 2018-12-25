<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Employee;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $employees = Employee::latest()->paginate(10);

        $salary = DB::table('employees')->sum('salary');

        $time = Carbon::now();
        
        return view('employees.index', compact('employees','salary',$salary,'time'));
    }
       
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      
        return view('employees.create', compact('employees'));
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
           'job' => 'required',
           'salary' => 'required|integer'

          ]);


        $employee = new Employee($request->all());
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $job = $request->input('job');
        $salary = $request->input('salary');

        $employee->save();

        return redirect('/employee/create')->with(['message' => 'New employee added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);

        return view('employees.edit', compact('employee', $employee));
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
        $employee = Employee::findOrFail($id);

        $employee->fill($request->all());

        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->job = $request->input('job');
        $employee->salary = $request->input('salary');

        $employee->save();

        return redirect()->back()->with(['employee' => $employee, 'message' => 'Employee updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);

        $employee->delete();

        return redirect('employee/index')->with(['message' => 'Employee deleted']);

    }
}
