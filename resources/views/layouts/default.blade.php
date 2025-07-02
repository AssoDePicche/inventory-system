<!DOCTYPE html>
<html lang='{{ str_replace('_', '-', app()->getLocale()) }}'>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width,initial-scale=1'>
        <title>{{ config('app.name') }}</title>
    </head>

    <body>
        @auth
            <navbar>
                <div>{{ config('app.name') }}</div>

                <ul>
                    <li>
                        <a href="{{ route('categories.create') }}">
                            Categorias
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}">
                            Produtos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('transactions.index') }}">
                            Transações
                        </a>
                    </li>
                </ul>
            </navbar>
        @endauth

        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        <main>
            @yield('content')
        </main>

        <footer>
            {{ config('app.name') }} &copy; {{ date('Y') }}
        </footer>
    </body>
</html>
