<html>
    <head>
        <title>App Name - @yield('title')</title>
        {!! HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'); !!}
        {!! HTML::style('https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css'); !!}
        {!! HTML::style('/assets/css/starter-template.css'); !!}
        {!! HTML::style('/assets/css/companies.css'); !!}
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Companies Admin</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/">Home</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Companies <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/admin/companies/">List</a>
                                </li>
                                <li>
                                    <a href="/admin/companies/add">Add</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
          </div>
        </nav>

        <div class="container">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            @if(Session::has('ok_message'))
                <div class="alert alert-success">
                    {{ Session::get('ok_message') }}
                </div>
            @endif
            @if(Session::has('error_message'))
                <div class="alert alert-danger">
                    {{ Session::get('error_message') }}
                </div>
            @endif
            @include('admin.layouts.includes.modals.delete')
            @yield('content')
        </div>
        {!! HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') !!}
        {!! HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js') !!}
        {!! HTML::script('https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js') !!}
        {!! HTML::script('/assets/js/ie10-viewport-bug-workaround.js') !!}
        {!! HTML::script('/assets/js/companies.js') !!}
    </body>
</html>
