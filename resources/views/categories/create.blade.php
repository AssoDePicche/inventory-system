@extends('layouts.default')

@section('content')
    <h1>Criar categoria</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <x-input name="name" placeholder="Nome" type="text" />

        <label for="parent_id">Subcategoria de</label>
        <select id="parent_id" name="parent_id">
            <option value="" selected>Nenhuma</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Criar</button>
    </form>

    <a href="/dashboard">Voltar</a>
@endsection
