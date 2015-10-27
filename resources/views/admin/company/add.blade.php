@extends('admin.layouts.master')

@section('title', 'Page Title')

@section('content')
    <h1>Add Company</h1>
    <p class="lead">Add a new company.</p>
    <hr>
    <form action="/admin/companies/add" method="post">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
        </div>
        <div class="form-group">
            <label for="cif">CIF</label>
            <input type="text" class="form-control" id="cif" name="cif" placeholder="L12345678" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    {!! Form::open([
        'route' => 'companies.add'
    ]) !!}

    <div class="form-group">
        {!! Form::label('cif', 'CIF:', ['class' => 'control-label']) !!}
        {!! Form::text('cif', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection
