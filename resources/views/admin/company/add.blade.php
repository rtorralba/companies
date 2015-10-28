@extends('admin.layouts.master')

@section('title', 'Page Title')

@section('content')
    <h1>Add Company</h1>
    <p class="lead">Add a new company.</p>
    <hr>
    {!! Form::open(['route' => 'admin.companies.add']) !!}

    <div class="form-group">
        {!! Form::label('cif', 'CIF:', ['class' => 'control-label']) !!}
        {!! Form::text('cif', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('clients[]', 'Clients:', ['class' => 'control-label']) !!}
        {!! Form::select('clients[]', $companies, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('providers[]', 'Providers:', ['class' => 'control-label']) !!}
        {!! Form::select('providers[]', $companies, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
    </div>

    {!! Form::submit('Add company', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection
