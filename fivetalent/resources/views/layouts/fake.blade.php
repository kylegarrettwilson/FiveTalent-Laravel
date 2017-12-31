<!doctype html>

<!-- this will be the main html page so code doesn't repeat -->
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name', 'FiveTalent')}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{asset('css/app.css')}}"  rel="stylesheet" >




</head>
<body>


<!-- include the navbar from navbar.blade.php-->
<!-- Blade Syntax -->
@include('inc/navbar')

        <!-- this is where the code will go from the other blade.php files using --section & end section tags -->

<div class="container">

    @include('inc/messages')
    @yield('content')

</div>


<!-- this is the form editor -->
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>

</body>
</html>
