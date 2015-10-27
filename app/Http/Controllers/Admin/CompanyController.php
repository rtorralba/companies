<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    public function index()
    {
        return view('admin.company.index');
    }

    public function getAdd()
    {
        return view('admin.company.add');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request, [
            'cif' => 'required',
            'name' => 'required'
        ]);

        $input = $request->all();

        Company::create($input);

        Session::flash('flash_message', 'Company successfully added!');

        return redirect()->back();
    }
}
