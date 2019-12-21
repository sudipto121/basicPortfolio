@extends('layouts.main')
@section('content')
    <div class="divPrimary">
        <article class="grid-container">
            <div class="">
                <a href="/gallery/show/{{$photos->gallery_id}}">Back to portfolio</a>
                <h1>Update Portfolio </h1>
                <p class="lead">Update the Portfolio Photo to make gallery</p>
            </div>
        </article>
    </div>
    <div class="container">
        <div class="row">
            <div class="maindiv">
                {!! Form::open(array('action' => 'PhotoController@updateData', 'enctype' => 'multipart/form-data')) !!}

                <input type="hidden" name="id" value="{{$photos->id}}">


                {!! Form::label('title','Title') !!}
                {!! Form::text('title', $value = $photos->title, $attributes = ['name' => 'title', 'required'=> 'required']) !!}

                {!! Form::label('description','Description') !!}
                {!! Form::text('description', $value = $photos->description, $attributes = ['name' => 'description', 'required'=> 'required']) !!}

                {!! Form::label('location','Location') !!}
                {!! Form::text('location', $value = $photos->location, $attributes = ['name' => 'location', 'required'=> 'required']) !!}

                <div class="upnew">
                    {!! Form::label('image', 'Portfolio Image') !!}
                    {!! Form::file('image') !!}
                </div>

                <div class="prevImg">
                    <img src="/images/{{$photos->image}}">
                </div>

                <input type="hidden" name="gallery_id" value="{{$photos->gallery_id}}">

                {!! Form::submit('Update', $attributes = ['class' => 'button']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

