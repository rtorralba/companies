<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>App Name - @yield('title')</title>
        {!! HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'); !!}
        {!! HTML::style('https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css'); !!}
        {!! HTML::style('//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css'); !!}
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
                    <a class="navbar-brand" href="/">Companies Site</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="/">Home</a></li>
                        <li><a href="/admin">Administrator</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
          </div>
        </nav>

        <div class="container">
            @include('admin.layouts.includes.modals.delete')
            @include('admin.layouts.includes.messages')
            @yield('content')
        </div>
        {!! HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') !!}
        {!! HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js') !!}
        {!! HTML::script('https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js') !!}
        {!! HTML::script('//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js') !!}
        {!! HTML::script('/assets/js/ie10-viewport-bug-workaround.js') !!}
        {!! HTML::script('/assets/js/site/companies.js') !!}
    </body>
</html>
