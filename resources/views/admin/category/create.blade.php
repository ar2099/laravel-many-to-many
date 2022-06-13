@extends('layouts.app')

@section('content')

    
    
    
    <form action="{{ route("admin.categories.store")}}" method="POST" >
 @csrf
 
    <input type="text" name="tema" class="form-control" id="tema" placeholder="tema" >
    
    <input type="text" name="hashtag" class="form-control" id="hashtag" placeholder="hashtag" >

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
    

  
@endsection
