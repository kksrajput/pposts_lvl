@extends('layouts.app')

@section('content')
<a href="/app2/public/posts" class="btn btn-default">Go Back</a>
    <h1>{{$post->event_location}}</h1>
    
    <div>
        {!!$post->rqst_desc!!}
    </div>
    <div>
        {!!$post->rqst_expectation!!}
    </div>
    <ul>
        @foreach($post->toppings as $topping)
        <li>{{$topping}}</li>
        @endforeach
    </ul>
    <hr>
    <small>Written on {{$post->created_at}}</small>
    <hr>
<a href="/posts/{{$post->id}}/edit" class="btn btn default">edit</a>
{!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right'])!!}
{!!Form::hidden('_method','DELETE')!!}
{!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
{!!Form::close()!!}
@endsection