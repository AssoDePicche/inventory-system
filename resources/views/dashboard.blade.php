@extends('layouts.default')

@section('content')
    <h1>Olá, {{ auth()->user()->username }}</h1>

    @if(auth()->user()->categories()->count() == 0)
        <p>
            Comece registrando uma categoria de produto!
        </p>

        <a href="{{ route('categories.create') }}">
            Cadastre uma categoria
        </a>
    @else
        <a href="{{ route('categories.index') }}">Listar {{auth()->user()->categories()->count()}} categorias</a>
    @endif
@endsection
