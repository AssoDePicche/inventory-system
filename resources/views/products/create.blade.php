@extends('layouts.default')

@section('content')
    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <x-input name="name" placeholder="Nome" type="text" />

        <label for="category_id">Categoria</label>
        <select id="category_id" name="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>

        <x-input name="price" placeholder="Preço" type="number" />

        <x-input name="quantity" placeholder="Quantidade atual em estoque" type="number" />

        <x-input name="min_quantity" placeholder="Quantidade mínima em estoque" type="number" />

        <x-textarea name="description" placeholder="Descrição" rows="6" cols="60" />

        <button type="submit">Adicionar</button>
    </form>

    <a href="{{ route('products.index') }}">Voltar</a>
@endsection
