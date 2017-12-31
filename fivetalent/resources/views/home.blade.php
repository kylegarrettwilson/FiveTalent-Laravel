@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="panel-body">
                        <a href="/posts/create" class="btn btn-success">Create Listing</a>
                        <h3>Your Listings</h3>



                        <table class="table">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>  <!-- Edit button -->
                                <th></th>   <!-- Delete button -->
                            </tr>

                            <!-- now we need to loop through all of the posts for that user -->

                            @foreach($posts as $post)


                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>Created at {{$post->created_at}}</td>
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                                    <td>

                                        <!-- this is what handles the delete function, submitting to the destroy function in the PostsController -->

                                        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}

                                        {{Form::hidden('_method', 'DELETE')}}

                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}

                                        {!! Form::close() !!}


                                    </td>
                                </tr>



                            @endforeach

                            
                        </table>




                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
