@extends('base')

@section('titulo', 'Filmes')

@section('conteudo')

<div class="p-6">

    <p class="mt-6 text-xl font-semibold">Galeria de Filmes</p>

    <div class="bg-white overflow-auto mt-4">
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
