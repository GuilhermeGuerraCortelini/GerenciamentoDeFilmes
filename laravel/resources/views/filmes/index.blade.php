@extends('base')

@section('titulo', 'Filmes')

@section('conteudo')

<div class="p-6">
    <a href="{{ route('filmes.cadastrar') }}" class="inline-block px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Cadastrar Filme</a>

    <p class="mt-6 text-xl font-semibold">Nossos Filmes</p>

    <div class="bg-white overflow-auto mt-4">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Nome</th>
                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Sinopse</th>
                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Ano</th>
                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Categoria</th>
                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Capa</th>
                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Link do Trailer</th>
                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Ações</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($filmes as $filme)
                <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-gray-100' : 'bg-white' }}">
                    <td class="w-1/6 text-left py-3 px-4">{{ $filme->nome }}</td>
                    <td class="w-1/6 text-left py-3 px-4">{{ $filme->sinopse }}</td>
                    <td class="w-1/6 text-left py-3 px-4">{{ $filme->ano }}</td>
                    <td class="w-1/6 text-left py-3 px-4">{{ $filme->categoria }}</td>
                    <td class="w-1/6 text-left py-3 px-4">
                        <img src="{{ asset('storage/' . $filme->capa) }}" alt="Capa do Filme" class="w-24 h-auto rounded">
                    </td>
                    <td class="w-1/6 text-left py-3 px-4">
                        <a href="{{ $filme->link_trailer }}" class="text-blue-600 hover:text-blue-800" target="_blank">Assistir Trailer</a>
                    </td>
                    <td class="w-1/6 text-left py-3 px-4">
                        <a href="{{ route('filmes.editar', $filme->id) }}" class="text-blue-600 hover:text-blue-800">Editar</a>
                        <a href="{{ route('filmes.apagar', $filme->id) }}" class="text-red-600 hover:text-red-800">Apagar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
