@extends('layouts.app')

@section('content')
<a href=" {{route("admin.posts.create") }}" class="btn btn-primary">Create</a>
<table class="table">
  <thead>
    <tr>
        <th scope="col">Autore</th>
         <th scope="col">Traduttori</th>
        <th scope="col">Categoria</th>
        <th scope="col">Data</th>
        <th scope="col">Titolo</th>
         <th scope="col">Slung</th>
        <th scope="col">Testo</th>
        <th scope="col">Immagine</th>
        <th scope="col">Azioni</th>

       
      
    </tr>
  </thead>
  <tbody>
    
    @foreach ($posts as $post)
    <tr>
    
    <td>{{$post->author}}</td>
    <td>
      @forelse ( $post->traduttores as $traduttore )
        <p>{{ $traduttore->nome }}, {{ $traduttore->lingua }}</p>
    @empty
        <span>Non ci sono traduttori <span>
    @endforelse
    </td>
    <td>
    @if ($post->Category)
        <span>{{$post->Category->tema}}</span>
        
            
        @else
          <span>-</span>  
       
    @endif</td>
    <td>{{$post->data}}</td>
    <td>{{$post->title}}</td>
    <td>{{$post->slung}}</td>
    <td>{{$post->text}}</td>
    <td><img src="{{ asset("storage/$post->image") }}" alt=""></td>
    <td>
        <a href=" {{route("admin.posts.show", $post->id) }}" class="btn btn-primary">Scheda</a>
         <a href=" {{route("admin.posts.edit", $post->id) }}" class="btn btn-primary">EDIT</a>
         <form action="{{ route( 'admin.posts.destroy', $post->id ) }}"
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

@if ($posts->hasPages())
{{$posts->links()}}
    
@endif
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

