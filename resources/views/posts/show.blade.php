@extends('layouts.app')
@section('content')
<div class="container">
                
  <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          {{ $post->title }} 
         </h3>
      </div>
      <hr>
     <div class="panel-body">
       {{$post->body}}
       </div>
  </div> 
  <br> <br>
  @if( !Auth::guest() && (Auth::user()->id == $post->user_id))
  <div class="clearfix">
          <div class="text-right"> 
            <a href="{{$post->id}}/edit" class="btn btn-primary"> <i class="fas fa-edit"></i> Edit</a>
          </div>
          <br> 
          <div class='text-right'>
                  {!!Form::open(['action'=>['PostsController@destroy',$post->id] ,'method'=>'POST'] )!!}
                  {{form::hidden('_method','DElETE')}}
                  {{Form::submit('Delete',["class"=>"btn btn-danger "  ])}}
                  {!!Form::close()!!}
          </div>
  </div> 
   @endif
</div>        
@endsection
