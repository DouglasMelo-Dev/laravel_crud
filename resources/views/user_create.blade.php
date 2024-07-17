@extends('master')

@section('content')

<h2>Criar Novo Usuário</h2>

@if (session()->has('message'))
    {{ session()->get('message') }}
@endif

<form action="{{ route('users.store') }}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Nome...">
    <input type="text" name="email" placeholder="E-mail...">
    <input type="password" name="password" placeholder="Senha...">
    <button type="submit">Salvar novo cadastro</button>
</form>

@endsection
