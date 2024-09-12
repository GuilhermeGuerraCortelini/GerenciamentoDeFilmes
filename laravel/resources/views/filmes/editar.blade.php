@extends('base')

@section('titulo', 'Editar | Filmes')

@section('conteudo')

<div class="leading-loose">
    <h4 class="text-red-500">Erros</h4>
    @foreach($errors->all() as $erro)
        <p class="text-red-600">{{ $erro }}</p>
    @endforeach

    <p class="mb-4 text-gray-700">Edite as informações do filme</p>

    <form method="post" action="{{ route('filmes.atualizar', $filme->id) }}" enctype="multipart/form-data" class="p-10 bg-white rounded shadow-xl">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm text-gray-600" for="nome">Nome:</label>
            <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="nome" name="nome" type="text" placeholder="Nome do Filme" value="{{ old('nome', $filme->nome) }}">
        </div>

        <div class="mb-4">
            <label class="block text-sm text-gray-600" for="sinopse">Sinopse:</label>
            <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="sinopse" name="sinopse" type="text" placeholder="Sinopse do Filme" value="{{ old('sinopse', $filme->sinopse) }}">
        </div>

        <div class="mb-4">
            <label class="block text-sm text-gray-600" for="ano">Ano:</label>
            <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="ano" name="ano" type="date" placeholder="Ano de Lançamento" value="{{ old('ano', $filme->ano) }}">
        </div>

        <div class="mb-4">
            <label class="block text-sm text-gray-600" for="categoria">Categoria:</label>
            <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="categoria" name="categoria" type="text" placeholder="Categoria do Filme" value="{{ old('categoria', $filme->categoria) }}">
        </div>

        <div class="mb-4">
            <label class="block text-sm text-gray-600" for="capa">Capa:</label>
            @if($filme->capa)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $filme->capa) }}" alt="Capa do Filme" class="w-32 h-32 object-cover">
                </div>
            @endif
            <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="capa" name="capa" type="file">
        </div>

        <div class="mb-4">
            <label class="block text-sm text-gray-600" for="link_trailer">Link do Trailer:</label>
            <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="link_trailer" name="link_trailer" type="url" placeholder="URL do Trailer" value="{{ old('link_trailer', $filme->link_trailer) }}">
        </div>

        <div class="mt-6 flex gap-4">
            <a href="{{ route('filmes') }}" class="px-4 py-2 text-gray-700 font-light tracking-wider bg-gray-300 rounded text-center inline-block">Voltar</a>
            <button class="px-4 py-2 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Atualizar</button>
        </div>
    </form>
</div>

@endsection
