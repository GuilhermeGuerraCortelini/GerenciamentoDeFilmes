@extends('base')

@section('titulo', 'Usuários')

@section('conteudo')

<div class="p-6">
    <a href="{{ route('usuarios.cadastrar') }}" class="inline-block px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Cadastrar Usuário</a>

    <p class="mt-6 text-xl font-semibold">Nossos Usuários</p>

    <div class="bg-white overflow-x-auto mt-4">
        <table class="min-w-full bg-white divide-y divide-gray-200">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nome</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Usuário</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Admin</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Ações</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($usuarios as $usuario)
                <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-gray-100' : 'bg-white' }}">
                    <td class="text-left py-3 px-4">{{ $usuario['name'] }}</td>
                    <td class="text-left py-3 px-4">{{ $usuario['email'] }}</td>
                    <td class="text-left py-3 px-4">{{ $usuario['username'] }}</td>
                    <td class="text-left py-3 px-4">
                        @if($usuario['admin'] == 0) Não @else Sim @endif
                    </td>
                    <td class="text-left py-3 px-4">
                        <a href="{{ route('usuarios.apagar', $usuario['id']) }}" class="text-red-600 hover:text-red-800">Apagar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
