@extends('layouts.app')
@section('content')
    @if($accounts->count()>0)
        @foreach($accounts as $account)
            
            <div class="container">
                
                <div class="panel panel-default">
                      <div class="panel-heading">

                            <h3 class="panel-title">
                                <a href="accounts/{{$account->id}}"> {{$account->AccountName}} </a>
                            </h3>
                      </div>
                </div>
                <div class="panel-footer">
                    
                    <span class="label label-info">
                        <i class="fas fa-calendar"></i>{{$account->created_at}}
                    </span>
                    
                 </div>          
            </div>
            
        @endforeach
           
            {{$accounts->links()}}
        
        @else
                
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Ops</strong> No Posts
                </div>
                
        @endif
    
@endsection