@extends('admin.layouts.master')

@section('title', 'Page Title')

@section('content')
    <div class="jumbotron">
      <div class="container">
        <h1>Companies Administrator</h1>
        <p>This is a companies web administrator where you can manage all companies, clients, providers and agreements.</p>
        <p><a class="btn btn-primary btn-lg" href="{!! URL::route('admin.companies.index') !!}" role="button">Companies »</a></p>
      </div>
    </div>
@endsection
