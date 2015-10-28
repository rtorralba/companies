<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use Session;

class MainController extends Controller
{
    public function index()
    {
        $companies = Company::paginate($this->pageElements);
        return view('site.index', ['companies' => $companies]);
    }

    public function getDetails($id)
    {
        $company = Company::find($id);

        return view('site.company.details', ['company' => $company]);
    }

    public function postEdit(Request $request)
    {
        try {
            $this->validate($request, [
                'id' => 'required',
                'cif' => 'required',
                'name' => 'required'
            ]);

            $company = Company::find($request->id);

            $company->name = $request->name;
            $company->cif = $request->cif;

            if($request->clients){
                $company->clients()->sync($request->clients);
            }
            if($request->providers){
                $company->providers()->sync($request->providers);
            }

            Session::flash('ok_message', 'Company successfully added!');

            $company->save();

            Session::flash('ok_message', 'Company successfully updated!');
            return redirect()->route('admin.companies.index');
        } catch (\Exception $e) {
            Session::flash('error_message', 'Error updating company');
            return redirect()->back();
        }
    }

    public function delete(Request $request)
    {
        try {
            $this->validate($request, [
                'id' => 'required'
            ]);

            $company = Company::find($request->id);

            $company->forceDelete();

            return response(1, 200);
        } catch (\Exception $e) {
            return response(0, 400);
        }
    }
}
