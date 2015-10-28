@extends('admin.layouts.master')

@section('title', 'Page Title')

@section('content')
    <h1>Add Agreement</h1>
    <hr>
    {!! Form::open(['route' => 'admin.agreements.add.post']) !!}

    {!! Form::hidden('company_id', $companyId, ['class' => 'form-control']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('companies[]', 'Companies adhering to the agreement:', ['class' => 'control-label']) !!}
        {!! Form::select('companies[]', $companies, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
    </div>

    {!! Form::submit('Add company', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection
