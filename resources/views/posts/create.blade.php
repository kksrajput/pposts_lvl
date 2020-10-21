@extends('layouts.app')

@section('content')
    <h1>Create Posts</h1>
    {!! Form::open(['action'=>'PostsController@store','method'=>'POST']) !!}
   <div class="form-group">
    Event Location
    {{Form::text('event_location','',['class'=>'form-control','placeholder'=>'event_location'])}}

</div>
<label>genres</label>

@if(count($p_genre)>0)
        @foreach($p_genre as $x)
        <div class="well">
   

            <input type="checkbox" name="toppings[]" value="{{$x->genre_name}}" >{{$x->genre_name}}<br />
        </div>
        @endforeach
   
    @else
            <p>asd</p>
    @endif

<div class="form-group">
    Event Description
    {{Form::textarea('rqst_desc','',['class'=>'form-control','placeholder'=>'rqst_desc'])}}
    <div class="form-group">
        Expectation from the photographer
        {{Form::textarea('rqst_expectation','',['class'=>'form-control','placeholder'=>'rqst_expectation'])}}


    
</div>
{{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection