@extends('site.layouts.master')

@section('title', 'Page Title')

@section('content')
    <div class="jumbotron">
      <div class="container">
          <h1>{{ $company->name }}</h1>
        <p>CIF: {!! $company->cif !!}</p>
      </div>
    </div>
    <hr>
    <ul class="nav nav-tabs nav-justified">
        <li class="active"><a href="#related" data-toggle="tab">Related companies</a></li>
        <li><a href="#agreements" data-toggle="tab">Agreements</a></li>
    </ul>
    <div class="tab-content">
        <div id="related" class="tab-pane fade in active">
            <h3>Related companies</h3>
            <table class="datatable">
                <thead>
                    <th>Name</th>
                    <th>CIF</th>
                    <th>Type</th>
                </thead>
                <tbody>
                    @foreach ($company->clients as $client)
                        <tr>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->cif }}</td>
                            <td>Client</td>
                        </tr>
                    @endforeach
                    @foreach ($company->providers as $provider)
                        <tr>
                            <td>{{ $provider->name }}</td>
                            <td>{{ $provider->cif }}</td>
                            <td>Provider</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="agreements" class="tab-pane fade">
            <h3>Agreements</h3>
            <table class="datatable">
                <thead>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Companies</th>
                </thead>
                <tbody>
                    @foreach ($company->agreements as $agreement)
                        <tr>
                            <td>{{ $agreement->name }}</td>
                            <td>{{ $agreement->description }}</td>
                            <td>
                                @foreach ($agreement->companies as $company)
                                    [{{ $company->name }}]
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
