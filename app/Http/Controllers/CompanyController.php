<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Validator;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_companies=Company::all();
        error_log("all");
        error_log($all_companies);
        //
        return view('companies',['companies'=>$all_companies]);
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
        return view('add_company',['companies'=>$all_companies]);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validators=Validator::make($request->all(),[
            'name'=>'required',
            'website'=>'required',
            'email'=>'required',
                 
        ]);
        if($validators->fails()){
            return redirect()->route('company.create')->withErrors($validators)->withInput();
        }else{
            $company=new Company();
            $company->name=$request->name;
                    $company->website=$request->website;
            $company->email=$request->email;


            $company->logo=$request->file('logo')->getClientOriginalName();

            error_log($request->file('logo')->getClientOriginalName());
            $path = $request->file('logo')->storeAs('public',$request->file('logo')->getClientOriginalName());
            $company->save();
            return redirect()->route('company.index')->with('message','company created successfully !');
        }


        //
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
        //
        $find_company=Company::find($id);
        $find_company->delete();
        return redirect()->route('company.index')->with('message','company removed successfully !');



    }
}
