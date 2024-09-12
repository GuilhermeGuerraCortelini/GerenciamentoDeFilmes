@extends('base')

@section('titulo', 'Login | Usuários')

@section('conteudo')

@if(session('erro'))
    <div class="bg-red-600 text-white p-4 rounded mb-4">
        {{ session('erro') }}
    </div>
@endif

@if ($errors->any())
    <div class="bg-red-200 text-red-700 p-4 rounded mb-4">
        @foreach($errors->all() as $erro)
            <p>{{ $erro }}</p>
        @endforeach
    </div>
@endif

<div class="max-w-md mx-auto bg-white p-8 rounded shadow-lg">
    <h2 class="text-2xl font-semibold mb-6">Login</h2>

    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="mb-4">
            <label for="username" class="block text-sm font-medium text-gray-700">Usuário</label>
            <input type="text" id="username" name="username" placeholder="Usuário" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
            <input type="password" id="password" name="password" placeholder="Senha" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
        </div>
        <div>
            <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Entrar</button>
        </div>
    </form>
</div>

@endsection
