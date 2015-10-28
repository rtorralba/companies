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
        $companies = Company::lists('name', 'id');
        $data = [
            'companies' => $companies
        ];
        return view('admin.company.add', $data);
    }

    public function postAdd(Request $request)
    {
        try {
            $this->validate($request, [
                'cif' => 'required',
                'name' => 'required'
            ]);

            $input = $request->all();

            $company = Company::create($input);

            $company->save();

            if($request->clients){
                $company->clients()->sync($request->clients);
            }
            if($request->providers){
                $company->providers()->sync($request->providers);
            }

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
        $clients_selected = $company->clients()->getRelatedIds()->all();

        $providers_selected = $company->providers()->getRelatedIds()->all();

        $data = array(
            'company' => $company,
            'companies' => $companies,
            'clients_selected' => $clients_selected,
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
