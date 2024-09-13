@extends('base')

@section('titulo', 'Galeria de Filmes')

@section('conteudo')

<form method="GET" action="{{ route('filmes.galeria') }}" class="mb-6">
    <div class="flex space-x-4">
<select name="ano" class="border p-2 rounded">
    <option value="">Selecione o Ano</option>
    @foreach(range(2024, 2020) as $ano)
        <option value="{{ $ano }}" 
            @if(request('ano') == $ano)
                selected
            @endif
        >
            {{ $ano }}
        </option>
    @endforeach
</select>


        <select name="categoria" class="border p-2 rounded">
            <option value="">Selecione a Categoria</option>
            <option value="Ação" {{ request('categoria') == 'Ação' ? 'selected' : '' }}>Ação</option>
            <option value="Comédia" {{ request('categoria') == 'Comédia' ? 'selected' : '' }}>Comédia</option>
            <option value="Drama" {{ request('categoria') == 'Drama' ? 'selected' : '' }}>Drama</option>
        </select>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filtrar</button>
    </div>
</form>

<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach ($filmes as $filme)
        <div class="bg-white p-4 rounded shadow-md">
            <a href="{{ route('filmes.detalhes', $filme->id) }}">
                <img src="{{ asset('storage/'.$filme->capa) }}" alt="{{ $filme->nome }}" class="w-full h-64 object-cover rounded">
                <h3 class="text-lg font-semibold mt-4">{{ $filme->nome }}</h3>
                <p class="text-gray-500">{{ $filme->ano }}</p>
                <p class="text-gray-700">{{ $filme->categoria }}</p>
            </a>
        </div>
    @endforeach
</div>

@endsection
