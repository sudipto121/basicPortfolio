@extends('layouts.main')
@section('content')
    <div class="divPrimary">
        <article class="grid-container">
            <div class="">
                <h1>Upload Portfolio Gallery</h1>
                <p class="lead">Create Portfolio Gallery and Start Upload Image</p>
            </div>
        </article>
    </div>
    <div class="container">
        <div class="row">
            <div class="maindiv">
                {!! Form::open(array('action' => 'GalleryController@store', 'enctype' => 'multipart/form-data')) !!}

                {!! Form::label('name','Name') !!}
                {!! Form::text('name', $value = null, $attributes = ['placeholder' => 'Gallery Name', 'name' => 'name', 'required'=> 'required']) !!}

                {!! Form::label('description','Description') !!}
                {!! Form::text('description', $value = null, $attributes = ['placeholder' => 'Gallery Description', 'name' => 'description', 'required'=> 'required']) !!}

                {!! Form::label('cover_image', 'Cover Image') !!}
                {!! Form::file('cover_image') !!}

                {!! Form::submit('Submit', $attributes = ['class' => 'button']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
