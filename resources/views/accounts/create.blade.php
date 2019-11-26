@extends('layouts.app')

@section('content')
<h1>Add New Account Name</h1>
<hr />
{!!Form::open(['action'=>'accounts@store' , 'method'=>'POST']) !!}
    <div class="form-group">
        {{Form::label('Name')}}
        {{Form::text('AccountName','',['placeholder'=>'Enter AccountName' , 'class'=>'form-control'])}}
    </div>
    <div class="form-group  text-right">
        {{Form::submit('Save',['class'=>'btn btn-primary'])}}
    </div>
{!!Form::close()!!}

@endsection
