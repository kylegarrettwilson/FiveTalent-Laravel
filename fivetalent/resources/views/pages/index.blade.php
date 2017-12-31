
@extends('layouts.app')
<!-- this is inputing this data into the generic html page of app.blade -->

<!-- this puts it in the content section of the generic html page - app.blade -->
@section('content')

    <div class="jumbotron text-center">
        <h1>Welcome To The Jungle</h1>
        <p>This is the laravel application for Five Talent.</p>
        <p>
            <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
            <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>

        </p>
    </div>


<!-- must end section -->
@endsection