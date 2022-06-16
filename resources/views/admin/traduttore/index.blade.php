@extends('layouts.app')

@section('content')
<a href=" {{route("admin.traduttores.create") }}" class="btn btn-primary">Create</a>
<table class="table">
  <thead>
    <tr>
        <th scope="col">Nome</th>
        <th scope="col">lingua</th>
        <th scope="col">Azioni</th>
        
       
      
    </tr>
  </thead>
  <tbody>
    @foreach ($traduttores as $traduttore)
        <td>{{$traduttore->nome}}</td>
    <td>{{$traduttore->lingua}}</td>
    
    <td>
        <a href=" {{route("admin.traduttores.show", $traduttore->id) }}" class="btn btn-primary">Scheda</a>
         <a href=" {{route("admin.traduttores.edit", $traduttore->id) }}" class="btn btn-primary">EDIT</a>
         <form action="{{ route( 'admin.traduttores.destroy', $traduttore->id ) }}"
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