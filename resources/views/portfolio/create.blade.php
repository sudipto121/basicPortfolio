@extends('layouts.main')
@section('content')
    <div class="divPrimary">
        <article class="grid-container">
            <div class="">
                <h1>Upload Portfolio </h1>
                <p class="lead">Upload the Portfolio Photo to make gallery</p>
            </div>
        </article>
    </div>
    <div class="container">
        <div class="row">
            <div class="maindiv">
                {!! Form::open(array('action' => 'PhotoController@store', 'enctype' => 'multipart/form-data')) !!}

                {!! Form::label('title','Title') !!}
                {!! Form::text('title', $value = null, $attributes = ['placeholder' => 'Portfolio Title', 'name' => 'title', 'required'=> 'required']) !!}

                {!! Form::label('description','Description') !!}
                {!! Form::text('description', $value = null, $attributes = ['placeholder' => 'Portfolio Description', 'name' => 'description', 'required'=> 'required']) !!}

                {!! Form::label('location','Location') !!}
                {!! Form::text('location', $value = null, $attributes = ['placeholder' => 'Portfolio Location', 'name' => 'location', 'required'=> 'required']) !!}

                {!! Form::label('image', 'Portfolio Image') !!}
                {!! Form::file('image') !!}

                <input type="hidden" name="gallery_id" value="{{$gallery_id}}">

                {!! Form::submit('Submit', $attributes = ['class' => 'button']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

