@extends('layouts.default')

@section('content')
    <h1>Olá, {{ auth()->user()->username }}</h1>

    @if(auth()->user()->categories()->count() == 0)
        <p>
            Comece registrando uma categoria de produto!
        </p>

        <a href="{{ route('categories.create') }}">
            Cadastrar uma categoria
        </a>
    @else
    @endif
@endsection
