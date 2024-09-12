@extends('base')

@section('titulo', 'Cadastrar | Filmes')

@section('conteudo')

<div class="leading-loose">
    <h4 class="text-red-500">Erros</h4>
    @foreach($errors->all() as $erro)
        <p class="text-red-600">{{ $erro }}</p>
    @endforeach

    <p class="mb-4 text-gray-700">Preencha o formulário para cadastrar um novo filme</p>

    <form method="post" action="{{ route('filmes.gravar') }}" enctype="multipart/form-data" class="p-10 bg-white rounded shadow-xl">
        @csrf

        <div class="mb-4">
            <label class="block text-sm text-gray-600" for="nome">Nome:</label>
            <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="nome" name="nome" type="text" placeholder="Nome do Filme" value="{{ old('nome') }}">
        </div>

        <div class="mb-4">
            <label class="block text-sm text-gray-600" for="sinopse">Sinopse:</label>
            <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="sinopse" name="sinopse" type="text" placeholder="Sinopse do Filme" value="{{ old('sinopse') }}">
        </div>

        <div class="mb-4">
            <label class="block text-sm text-gray-600" for="ano">Ano:</label>
            <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="ano" name="ano" type="date" placeholder="Ano de Lançamento" value="{{ old('ano') }}">
        </div>

        <div class="mb-4">
            <label class="block text-sm text-gray-600" for="categoria">Categoria:</label>
            <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="categoria" name="categoria" type="text" placeholder="Categoria do Filme" value="{{ old('categoria') }}">
        </div>

        <div class="mb-4">
            <label class="block text-sm text-gray-600" for="capa">Capa:</label>
            <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="capa" name="capa" type="file">
        </div>

        <div class="mb-4">
            <label class="block text-sm text-gray-600" for="link_trailer">Link do Trailer:</label>
            <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="link_trailer" name="link_trailer" type="url" placeholder="URL do Trailer" value="{{ old('link_trailer') }}">
        </div>

       <div class="mt-6 flex gap-4">
            <a href="{{ route('filmes') }}" class="px-4 py-2 text-gray-700 font-light tracking-wider bg-gray-300 rounded text-center inline-block">Voltar</a>
            <button class="px-4 py-2 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Gravar</button>
        </div>
    </form>
</div>

@endsection
