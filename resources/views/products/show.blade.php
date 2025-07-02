@extends('layouts.default')

@section('content')
    <h1>Detalhes do produto</h1>

    <p><strong>Nome:</strong> {{ $product->name }}</p>
    <p><strong>Descrição</strong> {{ $product->description ?? 'N/A' }}</p>
    <p><strong>Preço</strong> R$ {{ number_format($product->price, 2) }}</p>
    <p><strong>Quantidade em estoque</strong> {{ $product->quantity }}</p>
    <p><strong>Quantidade mínima em estoque</strong> {{ $product->min_quantity }}</p>
    <p><strong>Categoria</strong> {{ $product->category->name ?? 'N/A' }}</p>
    <p><strong>Criado em</strong> {{ $product->created_at->format('Y-m-d H:i:s') }}</p>

    <h2>Transações</h2>
    @if ($product->transactions->count() > 0)
        <table border="1">
            <thead>
                <tr>
                    <th>ID de Transação</th>
                    <th>Quantidade</th>
                    <th>Preço unitário durante Transação</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product->transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->quantity }}</td>
                        <td>${{ number_format($transaction->price, 2) }}</td>
                        <td>{{ $transaction->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Não há registros de transações deste produto.</p>
    @endif

    <a href="{{ route('products.edit', $product->id) }}">Editar</a>

    <a href="{{ route('products.index') }}">Voltar</a>
@endsection
