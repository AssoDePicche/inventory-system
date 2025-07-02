@extends('layouts.default')

@section('content')
    <h1>Editar categoria</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <x-input name="name" placeholder="Nome" type="text" value="{{ $category->name }}" />

        <label for="parent_id">Subcategoria de</label>
        <select id="parent_id" name="parent_id">
            <option value="">Nenhuma</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}" {{ $category->parent_id == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Atualizar</button>
    </form>

    <a href="/dashboard">Voltar</a>
@endsection
