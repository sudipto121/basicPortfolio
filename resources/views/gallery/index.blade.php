@extends('layouts.main')
@section('content')
    <div class="divPrimary">
        <article class="grid-container">
            <div class="">
                <h1>Portfolio Gallery</h1>
                <p class="lead">Please click My Portfolio Cover Image to see all my Project</p>
            </div>
        </article>
    </div>
    <article class="grid-container">
        <div class="grid-x grid-margin-x small-up-2 medium-up-3 large-up-4">
            @foreach($galleries as $gallery)
            <div class="cell middleDiv">
                <a href="/gallery/show/{{$gallery->id}}">
                <img class="thumbnail" src="/images/{{$gallery->cover_image}}">
                </a>
                <h5>{{$gallery->name}}</h5>
                <p>{{$gallery->description}}</p>
                <div class="galleryDiv">
                    @if(Auth::check())
                    <a class="button" href="/gallery/edit/{{$gallery->id}}">
                        Update Gallery
                    </a>
                    <a class="alert button" href="/gallery/destroy/{{$gallery->id}}"
                       onclick="return confirm('Are you sure you want to delete this item?');">
                        Delete Gallery
                    </a>
                    @endif
                </div>
            </div>
            @endforeach

        </div>
<hr>
    </article>
@endsection