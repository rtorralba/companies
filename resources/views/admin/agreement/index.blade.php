@extends('admin.layouts.master')

@section('title', 'Agreements List')

@section('content')
    <div class="row">
        <a href="{!! URL::route('admin.companies.index') !!}" class="btn btn-default">
            <span class="glyphicon glyphicon-arrow-left"></span> Return to companies list
        </a>
    </div>
    <h1>Agreements List</h1>
    <div class="row">
        <table id="agreements-datatable">
            <thead>
                <th style="width:20px"></th>
                <th style="width:20px"></th>
                <th>Name</th>
            </thead>
            <tbody>
                @foreach ($agreements as $agreement)
                    <tr>
                        <td>
                            <a href="{!! URL::route('admin.agreements.edit.get', $agreement->id) !!}" class="btn btn-success btn-action">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                        </td>
                        <td>
                            <button type="button" data-id="{!! $agreement->id !!}" data-url="/admin/agreements/delete" data-token="{{ csrf_token() }}" class="btn btn-danger btn-action delete">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                        </td>
                        <td>{{ $agreement->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row">
        <a href="{!! URL::route('admin.agreements.add.get', $company_id) !!}" class="btn btn-primary">
            <span class="glyphicon glyphicon-plus"></span> Add
        </a>
    </div>

    {!! $agreements->render() !!}
@endsection
