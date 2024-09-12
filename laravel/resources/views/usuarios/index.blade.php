@extends('base')

@section('titulo', 'Usuarios')

@section('conteudo')

<p>
    <a href="{{ route('usuarios.cadastrar') }}">Cadastrar Usuario</a>
</p>

<p> Nossos Usuarios</p>

<table border=1>
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Usuário</th>
        <th>Admin</th>
        <th>Ações</th>
    </tr>
    @foreach ($usuarios as $usuario)
    <tr>
        <td>{{ $usuario['name'] }}</td>
        <td>{{ $usuario['email'] }}</td>
        <td>{{ $usuario['username'] }}</td>
        <td>@if($usuario['admin'] == 0) Não @else Sim @endif</td>
        <td>
            <a href="{{ route('usuarios.apagar', $usuario['id'])}}">Apagar</a> 
        </td>
    </tr>
    @endforeach
</table>

@endsection