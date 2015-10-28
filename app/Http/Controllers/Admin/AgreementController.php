<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Agreement;
use App\Company;
use Session;

class AgreementController extends Controller
{
    public function index($companyId)
    {
        $agreements = Agreement::where('company_id', '=', $companyId)->paginate($this->pageElements);
        $data = [
            'company_id' => $companyId,
            'agreements' => $agreements
        ];
        return view('admin.agreement.index', $data);
    }

    public function getAdd($companyId)
    {
        $company = Company::find($companyId);
        $clients = $company->clients()->selectRaw('CONCAT(name, " (Cli)") name_type, id')->lists('name_type', 'id')->all();
        $providers = $company->providers()->selectRaw('CONCAT(name, " (Pro)") name_type, id')->lists('name_type', 'id')->all();
        $companies = $clients + $providers;
        $data = array(
            'companies' => $companies,
            'companyId' => $companyId
        );
        return view('admin.agreement.add', $data);
    }

    public function postAdd(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'company_id'
            ]);

            $input = $request->all();

            $agreement = Agreement::create($input);

            $agreement->save();

            if($request->companies) {
                $agreement->companies()->sync($request->companies);
            }

            Session::flash('ok_message', 'Agreement successfully added!');
            return redirect()->route('admin.agreements.index', $agreement->company_id);
        } catch (Exception $e) {
            Session::flash('error_message', 'Error adding agreement');
            return redirect()->back();
        }
    }

    public function getEdit($id)
    {
        $agreement = Agreement::find($id);
        $company = Company::find($agreement->company_id);

        $clients = $company->clients()->selectRaw('CONCAT(name, " (Cli)") name_type, id')->lists('name_type', 'id')->all();
        $providers = $company->providers()->selectRaw('CONCAT(name, " (Pro)") name_type, id')->lists('name_type', 'id')->all();
        $companies = $clients + $providers;

        $companies_selected = $agreement->companies()->getRelatedIds()->all();

        $data = array(
            'agreement' => $agreement,
            'companies' => $companies,
            'companies_selected' => $companies_selected,
        );
        return view('admin.agreement.edit', $data);
    }

    public function postEdit(Request $request)
    {
        try {
            $this->validate($request, [
                'id' => 'required',
                'name' => 'required'
            ]);

            $agreement = Agreement::find($request->id);

            $agreement->name = $request->name;
            $agreement->description = $request->description;

            if($request->companies) {
                $agreement->companies()->sync($request->companies);
            }

            $agreement->save();

            Session::flash('ok_message', 'Agreement successfully updated!');
            return redirect()->route('admin.agreements.index', $agreement->company_id);
        } catch (\Exception $e) {
            Session::flash('error_message', 'Error updating agreement');
            return redirect()->back();
        }
    }

    public function delete(Request $request)
    {
        try {
            $this->validate($request, [
                'id' => 'required'
            ]);

            $agreement = Agreement::find($request->id);

            $agreement->forceDelete();

            return response(1, 200);
        } catch (\Exception $e) {
            return response(0, 400);
        }
    }
}
