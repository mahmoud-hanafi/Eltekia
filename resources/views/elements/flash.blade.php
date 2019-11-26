@if($errors->any())
    
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li> <strong>{{$error}}</strong> </li>  
            @endforeach
        </div>
        
   
@endif

@if(session('success'))
    
    <div class="alert alert-success">
        <strong>{{session('success')}}</strong> 
    </div>
    
@endif

@if(session('error'))
    
    <div class="alert alert-danger">
        <strong>{{session('error')}}</strong>
    </div>
    
@endif