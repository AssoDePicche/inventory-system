@extends('layouts.default')

@section('content')
    <h1>{{ $category->name }}</h1>
    <p><strong>Criada em: </strong> {{ $category->created_at->format('Y-m-d H:i:s') }}</p>
    <p><strong>Subcategoria(s):</strong> {{ $category->children()->count() }}</p>

    <h2>Produtos desta categoria</h2>
    @if ($category->products()->count() > 0)
        <table border="1">
            <thead>
                <tr>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Não há registros de produtos desta categoria.</p>
    @endif

    <a href="{{ route('categories.edit', $category->id) }}">Editar</a>

    <a href="{{ route('categories.index') }}">Voltar</a>
@endsection
