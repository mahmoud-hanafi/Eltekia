@extends('layouts.app')
@section('content')
    @if($posts->count()>0)
        @foreach($posts as $post)
            
            <div class="container">
                
                <div class="panel panel-default">
                      <div class="panel-heading">                       
                        <h3 class="panel-title">
                            <a href="posts/{{$post->id}}"> {{$post->title}} </a>
                        </h3>
                      </div>
                      <div class="panel-body">
                            {{str_limit($post->body,100)}}
                      </div>
                </div>
                <div class="panel-footer">
                    <span class="label label-info">
                        <i class="fas fa-calendar"></i>{{$post->created_at}}
                    </span>
                    &nbsp
                    &nbsp
                 </div>          
            </div>
            
        @endforeach
           
            {{$posts->links()}}
        
        @else
                
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Ops</strong> No Posts
                </div>
                
        @endif
    
@endsection