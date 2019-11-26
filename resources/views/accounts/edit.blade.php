@extends('layouts.app')
@section('content')
<h1>Edit {{$account->AccountName}}</h1>
<hr />
{!!Form::open(['action'=>['accounts@update',$account->id] , 'method'=>'POST']) !!}
    {{Form::hidden('_method','PUT')}}
    <div class="form-group">
        {{Form::label('Name')}}
        {{Form::text('AccountName',$account->AccountName,['placeholder'=>'Enter Account Name' , 'class'=>'form-control'])}}
    </div>
    <div class="form-group  text-right">
        {{Form::submit('Update',['class'=>'btn btn-primary'])}}
    </div>
{!!Form::close()!!}

@endsection
