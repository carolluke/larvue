<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Validator;

class CompanyController extends Controller
{
    public function addCompany(Request $request){
    	$validator=validator::make($request->all(),[
    		'name'		=>'required|string',
    		'email'		=>'required|email',
    		'website'	=>'required|string',
    		'logo'		=>'required|dimensions:max_width:300,max_height:200|mimes:jpeg,png,jpg',
    	]);
    	if ($validator->fails()) {
    		return response()->json(['errors' => $validator->errors()]);
    	}
    	$input = $request->all();
    	Company::create($input);
        return response()->json(['success' => 'Company added Succeessfully!']);
    }
    public function index()
    {
        return response()->json(Company::all()->toArray());
    }
    public function edit($id)
    {
        $company= Company::find($id);
        return response()->json($company);
    }
    public function update(Request $request, $id)
    {
        $company= Company::find($id);
        $status= $company->update($request->all());

        return response()->json([
            'status'   => $status,
            'message'  => $status ? 'Company Updated!' : 'Update Failed!' 

        ]);

    }
    public function delete($id)
    {
        $company= Company::find($id);
        $status = $company->delete();
        return response()->json([
            'status'    => $status,
            'message'   => $status ? 'Delete Succesfull' : 'Delete Failed!'
        ]);
    }

}
