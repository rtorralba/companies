@extends('admin.layouts.master')

@section('title', 'Companies List')

@section('content')
    <h1>Companies List</h1>
    <table id="companies-datatable">
        <thead>
            <th></th>
            <th></th>
            <th></th>
            <th class="hidden-sm">CIF</th>
            <th>Name</th>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>
                        <a href="{!! URL::route('admin.companies.edit.get', $company->id) !!}" class="btn btn-success btn-action">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                    </td>
                    <td>
                        <button type="button" data-id="{!! $company->id !!}" data-url="/admin/companies/delete" data-token="{{ csrf_token() }}" class="btn btn-danger btn-action delete">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                    </td>
                    <td>
                        <a href="{!! URL::route('admin.agreements.index', $company->id) !!}" class="btn btn-primary">
                            <span class="glyphicon glyphicon-thumbs-up"></span>
                        </a>
                    </td>
                    <td class="hidden-sm">{{ $company->cif }}</td>
                    <td>{{ $company->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $companies->render() !!}
@endsection
