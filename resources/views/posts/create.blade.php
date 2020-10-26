
@extends('layouts.app')

@section('content')
 
    {!! Form::open(['action'=>'PostsController@store','method'=>'POST']) !!}

<br /><h1>questions</h1>


    @foreach($p_faqs as $x)
        
        {{$x->faq_question}}<br>


            <input type="text" name="answer[]" value="kks"><br /> 
            <input type="hidden" name="faq_id[]" value="{{$x->id}}" ><br /> 
  
    @endforeach
   



{{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection