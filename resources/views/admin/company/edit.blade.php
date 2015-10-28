@extends('admin.layouts.master')

@section('title', 'Page Title')

@section('content')
    <h1>{!! $company->name !!}</h1>
    <p class="lead">Edit company.</p>
    <hr>
    {!! Form::open([
        'route' => 'admin.companies.edit.post'
    ]) !!}

    {!! Form::hidden('id', $company->id) !!}
    <div class="form-group">
        {!! Form::label('cif', 'CIF:', ['class' => 'control-label']) !!}
        {!! Form::text('cif', $company->cif, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
        {!! Form::text('name', $company->name, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Update company', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection
