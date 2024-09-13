@extends('base')

@section('titulo', $filme->nome)

@section('conteudo')

<div class="flex">
    <img src="{{ asset('storage/'.$filme->capa) }}" alt="{{ $filme->nome }}" class="w-1/3 h-64 object-cover rounded">
    
    <div class="ml-6">
        <h1 class="text-3xl font-bold">{{ $filme->nome }}</h1>
        <p class="mt-4 text-gray-700">{{ $filme->sinopse }}</p>
        <p class="mt-4 text-gray-500">Ano: {{ $filme->ano }}</p>
        <p class="mt-2 text-gray-500">Categoria: {{ $filme->categoria }}</p>
        <a href="{{ $filme->link_trailer }}" target="_blank" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Ver Trailer</a>
    </div>
</div>

@endsection
