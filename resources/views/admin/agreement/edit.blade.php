@extends('admin.layouts.master')

@section('title', 'Page Title')

@section('content')
    <h1>{!! $agreement->name !!}</h1>
    <p class="lead">Edit agreement.</p>
    <hr>
    {!! Form::open([
        'route' => 'admin.agreements.edit.post'
    ]) !!}

    {!! Form::hidden('id', $agreement->id) !!}
    {!! Form::hidden('agreement_id', $agreement->agreement_id) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
        {!! Form::text('name', $agreement->name, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Name:', ['class' => 'control-label']) !!}
        {!! Form::textarea('description', $agreement->description, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('companies[]', 'Companies adhering to the agreement:', ['class' => 'control-label']) !!}
        {!! Form::select('companies[]', $companies, $companies_selected, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
    </div>

    {!! Form::submit('Update agreement', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection
