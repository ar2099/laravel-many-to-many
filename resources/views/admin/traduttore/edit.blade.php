@extends('layouts.app')

@section('content')

    
    
    
    <form action="{{ route("admin.traduttores.update", $traduttore->id)}}" method="POST" >
        @method("PUT")
 @csrf
        
 <input type="text" name="nome" class="form-control" id="nome" placeholder="nome" value="{{$traduttore->nome}}">
    
    <input type="text" name="lingua" class="form-control" id="lingua" placeholder="lingua" value="{{$traduttore->lingua}}">

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
    

  
@endsection