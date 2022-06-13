@extends('layouts.app')

@section('content')

    
    
    
    <form action="{{ route("admin.categories.update", $category->id)}}" method="POST" >
        @method("PUT")
 @csrf
        
 <input type="text" name="tema" class="form-control" id="tema" placeholder="tema" value="{{$category->tema}}">
    
    <input type="text" name="hashtag" class="form-control" id="hashtag" placeholder="hashtag" value="{{$category->hashtag}}">

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
    

  
@endsection