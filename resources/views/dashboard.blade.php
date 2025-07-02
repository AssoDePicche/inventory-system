@extends('layouts.default')

@section('content')
    <h1>Olá, {{ auth()->user()->username }}</h1>

    @if(auth()->user()->categories()->count() === 0)
        <p>
            Comece registrando uma categoria de produto!
        </p>

        <a href="{{ route('categories.create') }}">
            Cadastre uma categoria
        </a>
    @else
        <ul>
            <li><a href="{{ route('categories.index') }}">Listar {{auth()->user()->categories()->count()}} categoria(s)</a></li>
            @if(auth()->user()->products()->count() !== 0)
            <li><a href="{{ route('products.index') }}">Listar {{auth()->user()->products()->count()}} produtos(s)</a></li>
            @endif
        </ul>
    @endif
@endsection
