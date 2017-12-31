
<!-- these are messages that will display if validation of session and form validation is true of false -->
<!-- this file must be included in the main app.blade.php view file -->


@if(count($errors) > 0)

    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
     @endforeach

@endif



@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif




@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif