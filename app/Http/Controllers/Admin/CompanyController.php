<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use Session;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate($this->pageElements);
        return view('admin.company.index', ['companies' => $companies]);
    }

    public function getAdd()
    {
        return view('admin.company.add');
    }

    public function postAdd(Request $request)
    {
        try {
            $this->validate($request, [
                'cif' => 'required',
                'name' => 'required'
            ]);

            $input = $request->all();

            $company = new Company();

            $company->name = $request->name;
            $company->cif = $request->cif;
            
            $company->save();

            Session::flash('ok_message', 'Company successfully added!');
            return redirect()->route('admin.companies.index');
        } catch (\Exception $e) {
            Session::flash('error_message', 'Error adding company');
            return redirect()->back();
        }
    }

    public function getEdit($id)
    {
        $company = Company::find($id);

        $companies = Company::lists('name', 'id');
        $companies_selected = $company->clients()->getRelatedIds()->all();

        $providers = $companies;
        $providers_selected = $company->providers()->getRelatedIds()->all();

        $data = array(
            'company' => $company,
            'companies' => $companies,
            'providers' => $providers,
            'companies_selected' => $companies_selected,
            'providers_selected' => $providers_selected
        );
        return view('admin.company.edit', $data);
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

            $company->clients()->sync($request->clients);
            $company->providers()->sync($request->providers);
            
            $company->save();

            Session::flash('ok_message', 'Company successfully updated!');
            return redirect()->route('admin.companies.index');
        } catch (\Exception $e) {
            var_dump($e);
            die();
            Session::flash('error_message', 'Error updating company');
            return redirect()->back();
        }
    }

    public function delete(Request $request)
    {
        return response(1, 200);
        die();
        try {
            $this->validate($request, [
                'id' => 'required'
            ]);

            $company = Company::find($request->id);

            $company->forceDelete();

            return response(1, 200)->json(['result' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['id' => $request->id]);
        }
    }
}
