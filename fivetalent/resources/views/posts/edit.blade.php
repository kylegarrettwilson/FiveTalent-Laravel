

<!-- this brings in the design and html of the app view file located in the layouts folder using blade  -->
@extends('layouts/app')


        <!-- this brings in the content section previously created -->
@section('content')


    <h1>Edit Posts</h1>


    <!-- this is using a plugin from Laravel Collective to write the form for us, have to install using terminal -->
    <!-- this is using a POST command to store in the store function within the PostsController, it needs to be validated -->

    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}



    <div class="form-row">


        <div class="form-group col-md-6">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title', 'class' => 'form-control'])}}
        </div>

        <div class="form-group col-md-6">
            {{Form::label('mls', 'MLS#')}}
            {{Form::number('mls', $post->mls, ['class' => 'form-control', 'placeholder' => 'MLS#', 'class' => 'form-control'])}}
        </div>

        <div class="form-group col-md-6">
            {{Form::label('street_1', 'Street 1')}}
            {{Form::text('street_1', $post->street_1, ['class' => 'form-control', 'placeholder' => 'Street 1', 'class' => 'form-control'])}}
        </div>

        <div class="form-group col-md-6">
            {{Form::label('street_2', 'Street 2')}}
            {{Form::text('street_2', $post->street_2, ['class' => 'form-control', 'placeholder' => 'Street 2', 'class' => 'form-control'])}}
        </div>


        <div class="form-group col-md-6">
            {{Form::label('city', 'City')}}
            {{Form::text('city', $post->city, ['class' => 'form-control', 'placeholder' => 'City', 'class' => 'form-control'])}}
        </div>

        <div class="form-group col-md-6">
            {{Form::label('state', 'State')}}
            {{Form::text('state', $post->state, ['class' => 'form-control', 'placeholder' => 'State', 'class' => 'form-control'])}}
        </div>

        <div class="form-group col-md-6">
            {{Form::label('zipcode', 'Zipcode')}}
            {{Form::number('zipcode', $post->zipcode, ['class' => 'form-control', 'placeholder' => 'Zipcode', 'class' => 'form-control'])}}
        </div>


        <div class="form-group col-md-6">
            {{Form::label('neighbourhood', 'Neighbourhood')}}
            {{Form::text('neighbourhood', $post->neighbourhood, ['class' => 'form-control', 'placeholder' => 'Neighbourhood', 'class' => 'form-control'])}}
        </div>

        <div class="form-group col-md-6">
            {{Form::label('sales_price', 'Sales Price')}}
            {{Form::number('sales_price', $post->sales_price, ['class' => 'form-control', 'placeholder' => 'Sales Price', 'class' => 'form-control'])}}
        </div>

        <div class="form-group col-md-6">
            {{Form::label('date_listed', 'Date Listed')}}
            {{Form::number('date_listed', $post->date_listed, ['class' => 'form-control', 'placeholder' => 'Date Listed', 'class' => 'form-control'])}}
        </div>

        <div class="form-group col-md-6">
            {{Form::label('bedroom_number', 'Bedrooms')}}
            {{Form::number('bedroom_number', $post->bedroom_number, ['class' => 'form-control', 'placeholder' => 'Bedrooms', 'class' => 'form-control'])}}
        </div>

        <div class="form-group col-md-6">
            {{Form::label('bath_number', 'Bathrooms')}}
            {{Form::number('bath_number', $post->bath_number, ['class' => 'form-control', 'placeholder' => 'Bathrooms', 'class' => 'form-control'])}}
        </div>

        <div class="form-group col-md-6">
            {{Form::label('squarefeet', 'Squarefeet')}}
            {{Form::number('squarefeet', $post->squarefeet, ['class' => 'form-control', 'placeholder' => 'Squarefeet', 'class' => 'form-control'])}}
        </div>




        <!-- have to add the id -> article ckeditor to any field you want the editor to show up at -->
        <div class="form-group col-lg-10">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body'])}}
        </div>



        <!-- this will be so we can upload an image -->


        <div class="form-group col-lg-10">
            {{Form::file('cover_image')}}

            <br>

            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        </div>


    </div>








    {!! Form::close() !!}

@endsection