@extends('base')

@section('titulo','Login | Usuarios')

@section('conteudo')
@if(session('erro'))
    <div style="background-color:red ; color:white">
        {{ session('erro') }}
    </div>
@endif

<div>
    @foreach($errors->all() as $erro)
    <p>{{ $erro }}</p>
    @endforeach 
</div>


<form action="{{ route('login') }}" method="post">
    @csrf
    <input type="text" name="username" placeholder="Usuário">
    <br>
    <input type="password" name="password" placeholder="Senha">
    <br>
    <input type="submit" value="Entrar">
</form>

@endsection