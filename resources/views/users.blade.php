@extends('master')

@section('content')

<a href="{{ route('users.create') }}">Create</a>

<hr>

<h2>Users</h2>

<ul>
    @foreach ($users as $user)
        <li>{{ $user->name}} | <a href="{{ route('users.edit',['user' => $user->id]) }}">Editar</a> | <a href="">Deletar</a> </li>

    @endforeach
</ul>


@endsection
