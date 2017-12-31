

<!-- this brings in the design and html of the app view file located in the layouts folder using blade  -->
@extends('layouts/app')


        <!-- this brings in the content section previously created -->
@section('content')

    <!-- Back button -->

    <a href="/posts" class="btn btn-default">Go Back</a>



    <!-- because there is only one array coming to the page, there is no need to loop it out, just simply grab the
    info that you want like title -->
    <h1>{{$post->title}}</h1>

    <img style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}">

    <br><br>

    <div>

        <!-- double curly brace wont parse the form code created using the editor, it has to be two exclimation points
            Dont ask me why, I have no idea -->




        <ul style="list-style-type:none">
            <li>MLS#:  {{$post->mls}}</li>
            <li>Street Address: {{$post->street_1}}</li>
            <li>Street Address 2: {{$post->street_2}}</li>
            <li>Neighbourhood: {{$post->neighbourhood}}</li>
            <li>City: {{$post->city}}</li>
            <li>State: {{$post->state}}</li>
            <li>Zipcode: {{$post->zipcode}}</li>
            <li>Sale Price: {{$post->sales_price}}</li>
            <li>Bedrooms: {{$post->bedroom_number}}</li>
            <li>Bathrooms: {{$post->bath_number}}</li>
            <li>Squarefeet: {{$post->squarefeet}}</li>
            <br>
            <br>
            <li>{!!$post->body!!}</li>
        </ul>





    </div>



    <!-- showing the creation date -->
    <hr>
    <p>Created at {{$post->created_at}}</p>



    <!-- redirecting to editing page/controller -->
    <hr>

    <!-- guest will not see these buttons -->
    @if(!Auth::guest())

        <!-- if you are not the author of the post you cannot edit it or delete it -->
        @if(Auth::user()->id == $post->user_id)

                <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Update Listing</a>



                <!-- this is what handles the delete function, submitting to the destroy function in the PostsController -->

                {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}

                    {{Form::hidden('_method', 'DELETE')}}

                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}

                {!! Form::close() !!}



        @endif

    @endif


@endsection

