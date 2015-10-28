@extends('site.layouts.master')

@section('title', 'Companies Site')

@section('content')
    <div class="jumbotron">
      <div class="container">
        <h1>Companies Site</h1>
        <p>This is a companies web reporting tool with all info about companies, clients, providers and agreements.</p>
      </div>
    </div>
    <div class="row">
        @foreach ($companies as $company)
            <h1>{!! $company->name !!}</h1>
            <h4>CIF: {!! $company->cif !!}</h4>
            <a href="{!! URL::route('site.company.details', $company->id) !!}">Details</a>
        @endforeach
    </div>

    {!! $companies->render() !!}
@endsection
