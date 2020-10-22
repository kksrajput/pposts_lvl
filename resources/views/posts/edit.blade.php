@extends('layouts.app')

@section('content')
    <h1>Edit Posts</h1>
    {!! Form::open(['action'=>['PostsController@update',$post->id],'method'=>'POST']) !!}
   <div class="form-group">
    {{Form::label('event_location','event_locationTitle')}}
    {{Form::text('event_location',$post->event_location,['class'=>'form-control','placeholder'=>'Title'])}}

</div>
<div class="form-group">
    {{Form::label('rqst_desc', 'rqst_desc')}}
    {{Form::textarea('rqst_desc',$post->rqst_desc,['class'=>'form-control','placeholder'=>'description'])}}

</div>
<div class="form-group">
    {{Form::label('rqst_expectation', 'rqst_expectation')}}
    {{Form::textarea('rqst_expectation',$post->rqst_expectation,['class'=>'form-control','placeholder'=>'rqst_expectation'])}}

</div>
{{Form::text('budget','',['class'=>'form-control','placeholder'=>'event_location'])}}
        {{Form::text('event_date','',['class'=>'form-control','placeholder'=>'event_location'])}}
        {{Form::text('event_date_timeline','',['class'=>'form-control','placeholder'=>'event_location'])}}
    
{{Form::hidden('_method','PUT')}}
{{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection