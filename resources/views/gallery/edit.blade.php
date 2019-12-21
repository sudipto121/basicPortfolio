@extends('layouts.main')
@section('content')
    <div class="divPrimary">
        <article class="grid-container">
            <div class="">
                <h1>Update Portfolio Gallery</h1>
                <p class="lead">Update Portfolio Gallery and Update Image</p>
            </div>
        </article>
    </div>
    <div class="container">
        <div class="row">
            <div class="maindiv">
                {!! Form::open(array('action' => 'GalleryController@updateData', 'enctype' => 'multipart/form-data')) !!}

                {!! Form::label('name','Name') !!}
                {!! Form::text('name', $value = $gallery->name, $attributes = ['placeholder' => 'Gallery Name', 'name' => 'name', 'required'=> 'required']) !!}

                {!! Form::label('description','Description') !!}
                {!! Form::text('description', $value = $gallery->description, $attributes = ['placeholder' => 'Gallery Description', 'name' => 'description', 'required'=> 'required']) !!}

                <div class="upnew">
                    {!! Form::label('cover_image', 'Cover Image') !!}
                    {!! Form::file('cover_image') !!}
                </div>

                <div class="prevImg">
                    <img src="/images/{{$gallery->cover_image}}">
                </div>

                <input type="hidden" name="id" value="{{$gallery->id}}">

                {!! Form::submit('Update', $attributes = ['class' => 'button']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

