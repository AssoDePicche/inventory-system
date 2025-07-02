@extends('layouts.default')

@section('content')
    <a href="{{ route('categories.create') }}">Crie uma nova categoria</a>

    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Criada em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at->format('d M y H\hi') }}</td>
                    <td>
                        <a href="{{ route('categories.show', $category->id) }}">
                            Ver
                        </a>
                        <a href="{{ route('categories.edit', $category->id) }}">
                            Editar
                        </a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
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
@endsection
