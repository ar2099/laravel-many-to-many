@extends('layouts.app')

@section('content')
<a href=" {{route("admin.categories.create") }}" class="btn btn-primary">Create</a>
<table class="table">
  <thead>
    <tr>
        <th scope="col">Tema</th>
        <th scope="col">Hashtag</th>
        <th scope="col">Azioni</th>
        
       
      
    </tr>
  </thead>
  <tbody>
    @foreach ($categories as $category)
        <td>{{$category->tema}}</td>
    <td>{{$category->hashtag}}</td>
    
    <td>
        <a href=" {{route("admin.categories.show", $category->id) }}" class="btn btn-primary">Scheda</a>
         <a href=" {{route("admin.categories.edit", $category->id) }}" class="btn btn-primary">EDIT</a>
         <form action="{{ route( 'admin.categories.destroy', $category->id ) }}"
                    method="POST"
                    class="delete-form"
                    >
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" type="submit">Elimina</button>
                </form>
    </td>
    
    </tr>
@endforeach
  </tbody>
</table>

<script>
  const deleteForms = document.querySelectorAll('.delete-form');
deleteForms.forEach(form => {
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const confirmation = confirm('Sei sicuro di eliminare il dato?');
        if (confirmation) e.target.submit();
    });
});
</script>
@endsection