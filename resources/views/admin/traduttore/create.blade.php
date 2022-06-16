@extends('layouts.app')

@section('content')

    
    
    
    <form action="{{ route("admin.traduttores.store")}}" method="POST" >
 @csrf
 
    <input type="text" name="nome" class="form-control" id="nome" placeholder="nome" >
    
    <input type="text" name="lingua" class="form-control" id="lingua" placeholder="lingua" >

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
    

  
@endsection
