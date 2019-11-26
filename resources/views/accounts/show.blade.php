@extends('layouts.app')
@section('content')
<div class="container">
                
  <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          {{ $account->AccountName }} 
         </h3>
      </div>
  </div> 
  <br> <br>
  <div class="clearfix">
          <div class="text-right"> 
            <a href="{{$account->id}}/edit" class="btn btn-primary"> <i class="fas fa-edit"></i> Edit</a>
          </div>
          <br> 
          <div class='text-right'>
                  {!!Form::open(['action'=>['accounts@destroy',$account->id] ,'method'=>'POST'] )!!}
                  {{form::hidden('_method','DElETE')}}
                  {{Form::submit('Delete',["class"=>"btn btn-danger "  ])}}
                  {!!Form::close()!!}
          </div>
         </div> 
</div>        
@endsection
