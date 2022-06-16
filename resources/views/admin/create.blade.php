@extends('layouts.app')

@section('content')

    
    
    
    <form action="{{ route("admin.posts.store")}}" method="POST" >
 @csrf
 <select name="category_id" id="category" class="form-control">
  <option value="">nessuna categoria</option>
  @foreach ($categories as $category)
      <option value="{{$category->id}}">{{$category->tema}}</option>
  @endforeach
 </select>

 
    <input type="text" name="author" class="form-control" id="author" placeholder="author" >
    <input type="date" name="data" class="form-control" id="data" placeholder="data" value="2022-03-01" >
    <input type="text" name="title" class="form-control" id="title" placeholder="title" >
    <input type="text" name="text" class="form-control" id="text" placeholder="text" >
  


 @foreach ( $traduttores as $traduttore )
            <div class="form-check form-check-inline">
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="traduttore-{{ $traduttore->id }}"
                    value=" {{ $traduttore->id }} "
                    name="traduttores[]"
                    @if ( in_array($traduttore->id, old('traduttores', []) ) ) checked @endif
                >
                <label class="form-check-label" for="traduttore-{{ $traduttore->id }}">{{ $traduttore->nome }}</label>
            </div>
        @endforeach






  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
    

  
@endsection
