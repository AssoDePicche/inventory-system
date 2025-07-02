@extends('layouts.default')

@section('content')
    <h1>Bem-vindo ao {{ config('app.name') }}</h1>

    <p>
        Organize e acompanhe seu estoque de forma simples em nossa plataforma.
    </p>

    <h3>Comece agora mesmo!</h3>

    <ul>
        <li><a href="/register">Crie sua conta</a> e comece a gerenciar seu estoque em poucos cliques</li>
        <li>Já tem uma conta? <a href="/login">Faça login aqui</a>.</li>
    </ul>
@endsection
