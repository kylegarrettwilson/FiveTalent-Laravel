

<!-- this brings in the design and html of the app view file located in the layouts folder using blade  -->
@extends('layouts/app')


<!-- this brings in the content section previously created -->
@section('content')


    <h1>Current Listings</h1>


    <!-- this is pull all of the files from the database table posts -->
    @if(count($posts) > 0)


        <!-- this is looping through the posts table pulling out title and created_at -->
        @foreach($posts as $post)
            <div class="well">

                <div class="row">

                        <div class="col-md-4 col-sm-4">

                            <img style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}">

                        </div>


                        <div class="col-md-8 col-sm-8">
                        <!-- this is an href that is finding the unique id of the title and directing it to its own page for display -->
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <p>Created at {{$post->created_at}} by {{$post->user->name}}</p>
                        </div>


                </div>
            </div>
        @endforeach


        <!-- this is adding the pagination from controller, limiting to 10 per page -->
        {{$posts->links()}}

    @else
        <p>No Posts Found</p>
    @endif


@endsection