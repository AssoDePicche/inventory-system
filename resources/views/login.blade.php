@extends('layouts.default')

@section('content')
    <h1>Login</h1>

    <form action="/login" method="POST">
        @csrf

        <x-input name="email" placeholder="Email" type="email" />

        <x-input name="password" placeholder="Senha" type="password" />

        <button type="submit">Entrar</button>
    </form>

    <p>Ainda não possui uma conta? <a href="/register">Cadastre-se</a>.</p>
@endsection
