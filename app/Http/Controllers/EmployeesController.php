<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        $data=[
            'employees' => $employees,
        ];
        return view('employees.employees',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies=Companies::all();
        $data=array(
            'companies' => $companies,
        );
        return view('employees.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'department' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'company_id'=>'required',
        ]);
        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employe=Employee::find($id);
        $companies=Companies::all();
        $data=array(
            'employee'=>$employe,
            'companies'=>$companies
        );
        return view('employees.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'fullname' => 'required',
            'department' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'company_id'=>'required'
        ]);
        $employe=Employee::find($id);
        $employe->update($request->all());
        return redirect()->route('employees.index')->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employe=Employee::find($id);
        $employe->delete();
        return redirect()->route('employees.index')->with('success','Data Berhasil Dihapus');
    }
}
