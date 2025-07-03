@extends('layouts.default')

@section('content')
    @if(auth()->user()->products()->count() !== 0)
    <a href="{{ route('products.create') }}">Adicione um novo produto</a>

    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Quantidade em estoque</th>
                <th>Quantidade mínima</th>
                <th>Cadastrado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>R$ {{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->min_quantity }}</td>
                    <td>{{ $product->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}">
                            Ver
                        </a>
                        <a href="{{ route('products.edit', $product->id) }}">
                            Editar
                        </a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>Você ainda não adicionou um produto ao sistema!</p>

        <a href="{{ route('products.create') }}">
            Cadastre um produto
        </a>
    @endif
@endsection
