@extends('layouts.app')

@section('content')
<h1>Contact Us</h1>
<hr />
{!!Form::open(['action'=>'PagesController@dosend' , 'method'=>'POST']) !!}
    <div class="form-group">
        {{Form::label('Name')}}
        {{Form::text('name','',['placeholder'=>'Enter your Name' , 'class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('Email')}}
        {{Form::text('email','',['placeholder'=>'Email Address' , 'class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('Subject')}}
        {{Form::text('subject','',['placeholder'=>'Subject' , 'class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('Body')}}
        {{Form::textarea('body','',['placeholder'=>'body' , 'class'=>'form-control'])}}
    </div>

    <div class="form-group  text-right">
        {{Form::submit('send',['class'=>'btn btn-primary'])}}
    </div>
{!!Form::close()!!}

@endsection
