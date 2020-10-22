@extends('layouts.app')

@section('content')
<a class="btn btn-primary" href="posts/create">Createposts</a> 
<h3>Your Blog Posts</h3>
    <h1>Posts</h1>
    @if(count($posts)>0)
        @foreach($posts as $post)
        <div class="well">
            <h3><a href="posts/{{$post->id}}">{{$post->event_location}}</a></h3>
            <small>written on {{$post->created_at}}</small>
        </div>
        @endforeach
        {{$posts->links()}}
    @else
            <p>asd</p>
    @endif
@endsection