@extends('layouts.main')
@section('content')
    <div class="divPrimary">
        <article class="grid-container">
            <div class="">
                <a href="/gallery/show/{{$photos->gallery_id}}">Back to portfolio</a>
                <h1>{{$photos->title}}</h1>
                <p class="lead">{{$photos->description}}</p>
                <p class="lead">Location: {{$photos->location}}</p>
            </div>
        </article>
    </div>
    <div class="maindiv">
        <img class="detailsImg" src="/images/{{$photos->image}}">
        <p style="text-align: center; margin-top: 10px" >
            @if(Auth::check())
            <a class="button" href="/portfolio/edit/{{$photos->id}}">
                Update Portfolio
            </a>
            <a class="alert button" href="/portfolio/destroy/{{$photos->id}}/{{$photos->gallery_id}}"
                onclick="return confirm('Are you sure you want to delete this item?');">
                Delete Portfolio
            </a>
            @endif
        </p>
    </div>
    <hr>
@endsection

