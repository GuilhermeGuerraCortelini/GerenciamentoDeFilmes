@extends('base')

@section('titulo', 'Cadastrar | Usuários')

@section('conteudo')

<div class="leading-loose">
    <h4 class="text-red-500">Deu ruim</h4>
    @foreach($errors->all() as $erro)
        <p class="text-red-600">{{ $erro }}</p>
    @endforeach

    <p class="mb-4 text-gray-700">Preencha o formulário para cadastrar um novo usuário</p>

    <form method="post" action="{{ route('usuarios.gravar') }}" class="p-10 bg-white rounded shadow-xl">
        @csrf

        <div class="mb-4">
            <label class="block text-sm text-gray-600" for="name">Nome:</label>
            <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" placeholder="Nome" value="{{ old('name') }}">
        </div>

        <div class="mb-4">
            <label class="block text-sm text-gray-600" for="email">Email:</label>
            <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="email" placeholder="Email" value="{{ old('email') }}">
        </div>

        <div class="mb-4">
            <label class="block text-sm text-gray-600" for="username">Usuário:</label>
            <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="username" name="username" type="text" placeholder="Usuário" value="{{ old('username') }}">
        </div>

        <div class="mb-4">
            <label class="block text-sm text-gray-600" for="password">Senha:</label>
            <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="password" name="password" type="password" placeholder="Senha" value="{{ old('password') }}">
        </div>

        <div class="mb-4">
            <label class="block text-sm text-gray-600" for="admin">Admin:</label>
            <select name="admin" id="admin" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                <option value="null">Selecione Admin</option>
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select>
        </div>

        <div class="mt-6 flex gap-4">
            <button class="px-4 py-2 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Gravar</button>
            <a href="{{ route('usuarios') }}" class="px-4 py-2 text-gray-700 font-light tracking-wider bg-gray-300 rounded text-center inline-block">Voltar</a>
        </div>
    </form>
</div>

@endsection
