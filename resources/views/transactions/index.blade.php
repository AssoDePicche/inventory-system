@extends('layouts.default')

@section('content')
    @if(auth()->user()->transactions()->count() !== 0)
    <a href="{{ route('transactions.create') }}">Adicione uma nova transação</a>

    <table border="1">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Valor unitário de transação</th>
                <th>Valor total de transação</th>
                <th>Realizada em</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->product->name }}</td>
                    <td>{{ $transaction->quantity }}</td>
                    <td>R$ {{ number_format($transaction->price, 2) }}</td>
                    <td>R$ {{ number_format($transaction->price * $transaction->quantity, 2) }}</td>
                    <td>{{ $transaction->created_at->format('d M y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>Você ainda não adicionou uma transação ao sistema!</p>

        <a href="{{ route('transactions.create') }}">
            Adicione uma transação
        </a>
    @endif
@endsection
