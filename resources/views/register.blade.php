@extends('layouts.default')

@section('content')
    <h1>Cadastro</h1>

    <form action="/register" method="POST">
        @csrf

        <x-input name="username" placeholder="Nome" type="text" />

        <x-input name="email" placeholder="Email" type="email" />

        <x-input name="password" placeholder="Senha" type="password" />

        <button type="submit">Cadastre-se</button>
    </form>

    <p>Já possui uma conta? <a href="/login">Faça login</a>.</p>
@endsection
