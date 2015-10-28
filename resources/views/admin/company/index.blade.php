@extends('admin.layouts.master')

@section('title', 'Companies List')

@section('content')
    <h1>Companies List</h1>
    <table class="datatable">
        <thead>
            <th style="width:20px"></th>
            <th style="width:20px"></th>
            <th>CIF</th>
            <th>Name</th>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td><a href="{!! URL::route('admin.companies.edit.get', $company->id) !!}" class="btn btn-primary btn-action">Edit</a></td>
                    <td>
                        <button type="button" data-id="{!! $company->id !!}" data-url="/admin/companies/delete" data-token="{{ csrf_token() }}" class="btn btn-danger btn-action delete">Delete</button>
                    </td>
                    <td>{{ $company->cif }}</td>
                    <td>{{ $company->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $companies->render() !!}
@endsection
