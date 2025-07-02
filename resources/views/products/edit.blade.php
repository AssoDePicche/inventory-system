@extends('layouts.default')

@section('content')
    <h1>Editar produto</h1>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        <x-input name="name" placeholder="Nome" type="text" value="{{ $product->name }}" />

        <label for="category_id">Categoria</label>
        <select id="category_id" name="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>

        <x-input name="price" placeholder="Preço" type="number" value="{{ $product->price }}" />

        <x-input name="quantity" placeholder="Quantidade atual em estoque" type="number" value="{{ $product->quantity }}" />

        <x-input name="min_quantity" placeholder="Quantidade mínima em estoque" type="number" value="{{ $product->min_quantity }}" />

        <x-textarea name="description" placeholder="Descrição" rows="6" cols="60" value="{{ $product->description }}" />

        <button type="submit">Atualizar</button>
    </form>

    <a href="{{ route('products.index') }}">Voltar</a>
@endsection
