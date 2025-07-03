@extends('layouts.default')

@section('content')
    <h1>{{ $product->name }}</h1>
    <h4>{{ $product->category->name }}</h4>
    <br>
    <p>{{ $product->description ?? '' }}</p>
    <p>Preço R$ {{ number_format($product->price, 2) }}</p>
    <p>{{ $product->quantity }} item(s) em estoque</p>
    <p>Quantidade mínima permitida: {{ $product->min_quantity }}</p>
    <p>Criado em {{ $product->created_at->format('d M y') }}</p>
    <br>

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
                        <td>{{ $transaction->created_at->format('d M y') }}</td>
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
