<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;

class ReportCompaniesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $companies=Companies::all();
        $data=array(
            'companies' => $companies,
        );
        return view('reportCompanies.index',$data);
    }
}
