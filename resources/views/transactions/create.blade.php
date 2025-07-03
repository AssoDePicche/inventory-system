@extends('layouts.default')

@section('content')
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf

        <label for="product_id">Produto</label>
        <select id="product_id" name="product_id" required>
            @foreach ($products as $product)
                <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
            @endforeach
        </select>

        <x-input name="quantity" placeholder="Quantidade retirada" type="number" />

        <button type="submit">Adicionar</button>
    </form>
@endsection
