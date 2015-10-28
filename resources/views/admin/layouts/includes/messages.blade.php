@if($errors->any())
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
@if(Session::has('ok_message'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
        {{ Session::get('ok_message') }}
    </div>
@endif
@if(Session::has('error_message'))
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
        {{ Session::get('error_message') }}
    </div>
@endif

@if($errors->any() || Session::has('ok_message') || Session::has('error_message'))
    <script>
        window.setTimeout(function() { $(".alert").hide(2000); }, 4000);
    </script>
@endif
