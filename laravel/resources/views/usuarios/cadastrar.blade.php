@extends('base')

@section('titulo', 'Cadastrar | Usuários')

@section('conteudo')

<div>
    <h4>Deu ruim</h4>
    @foreach($errors->all() as $erro)
    <p>{{ $erro }}</p>
    @endforeach
</div>

<p> Preencha o formulário </p>

<form method="post" action="{{ route('usuarios.gravar') }}">
    @csrf
    <p>
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" placeholder="Nome" value="{{ old('name') }}">
    </p>
    <p><label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
    </p>
    <p><label for="username">Usuário:</label>
        <input type="text" id="username" name="username" placeholder="Usuário" value="{{ old('username') }}">
    </p>
    <p><label for="password">Senha:</label>
        <input type="password" id="password" name="password" placeholder="Senha" value="{{ old('password') }}">
    </p>

    <p>
        <select name="admin">
            <option value="null">Selecione Admin</option>
            <option value="1">Sim</option>
            <option value="0">Não</option>
        </select>
    </p>
    <br>
    <input type="submit" value="Gravar">
</form>

@endsection
