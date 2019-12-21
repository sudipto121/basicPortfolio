@extends('layouts.main')
@section('content')
    <div class="divPrimary">
        <article class="grid-container">
            <div class="">
                <a href="/">Back to Portfolio</a>
                <h2>{{$gallery->name}}</h2>
                <p class="lead">{{$gallery->description}}</p>
                @if(Auth::check())
                <a class="button" href="/portfolio/create/{{$gallery->id}}">Upload Portfolio</a>
                @endif
            </div>
        </article>
    </div>
    <article class="grid-container">
        <div class="grid-x grid-margin-x small-up-2 medium-up-3 large-up-4">
            @foreach($photos as $photo)
                <div class="cell">
                    <a href="/portfolio/details/{{$photo->id}}">
                    <img class="thumbnail" src="/images/{{$photo->image}}">
                    </a>
                    <h5>{{$photo->title}}</h5>
                    <p>{{$photo->description}}</p>
                </div>
            @endforeach
        </div>
        <hr>
    </article>
@endsection
