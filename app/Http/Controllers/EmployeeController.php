<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;
use Validator;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_companies=Company::all();
        $all_employees=Employee::all();
        error_log("all");
        error_log($all_employees);
        //
        return view('employees',['employees'=>$all_employees,'companies'=>$all_companies]);

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $all_companies=Company::all();
        $all_employees=Employee::all();
        return view('add_employee',['employees'=>$all_employees,'companies'=>$all_companies]);
 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validators=Validator::make($request->all(),[
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'phone_number'=>'required',
            'company_id'=>'required',
                 
        ]);
        if($validators->fails()){
            return redirect()->route('employee.create')->withErrors($validators)->withInput();
        }else{
            $employee=new Employee();
            $employee->first_name=$request->first_name;
            $employee->last_name=$request->last_name;
            $employee->email=$request->email;
            $employee->phone_number=$request->phone_number;
            $employee->company_id=$request->company_id;

            $employee->save();
            return redirect()->route('employee.index')->with('message','employee created successfully !');
        }


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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
        $find_employee=Employee::find($id);
        $find_employee->delete();
        return redirect()->route('employee.index')->with('message','employee removed successfully !');

    
        //
    }
}
