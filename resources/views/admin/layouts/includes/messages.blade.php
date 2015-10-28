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
