@extends('layouts.app')

@section('content')

    
    
    
    <p>Categoria: {{$post->Category->tema}}</p>
    <p>Autore: {{$post->author}}</p>
    <p>Data: {{$post->data}}</p>
    <p>Titolo: {{$post->title}}</p>
    <p>Slung: {{$post->slung}}</p>
    <p>Testo: {{$post->text}}</p>
    

  
@endsection