<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companies::all();
        $data=[
            'companies' => $companies,
        ];
        return view('companies.companies',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.add');
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
            'company_name' => 'required',
            'company_email' => 'required|email',
            'company_address' => 'required',
            'company_phone' => 'required',
        ]);
        $data=$request->all();
        $data['company_address']=nl2br($request->company_address);
        Companies::create($data);
        return redirect()->route('companies.index')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(Companies $companies)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(Companies $companies,$id)
    {
        $company=$companies->find($id);
        $data=array(
            'company'=>$company,
        );
        return view('companies.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Companies $companies,$id)
    {
        $request->validate([
            'company_name' => 'required',
            'company_email' => 'required|email',
            'company_address' => 'required',
            'company_phone' => 'required',
        ]);
        $company=$companies->find($id);
        $data=$request->all();
        $data['company_address']=nl2br($request->company_address);
        $company->update($data);
        return redirect()->route('companies.index')->with('success','Data Berhasil Di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Companies $companies,$id)
    {
        $company=$companies->find($id);
        $company->delete();
        return redirect()->route('companies.index')->with('success','Data Berhasil Di hapus');
    }
}
