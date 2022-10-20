<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-light">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="d-flex py-3 bg-white shadow-sm border-bottom">
            <div class="container">
            </div>
        </header>

        <div class="row m-4">
            <div class="d-flex flex-column gap-3 justify-content-center col-3">
                <a class="btn btn-primary fs-3" href='#'>Ir para lista de arquivos.</a>
                <a class="btn btn-primary fs-3" href='{{route('produtos')}}'>Ir para o cadastro manual de produtos.</a>
                <a class="btn btn-primary fs-3" href="{{route('dar_baixa')}}">Dar baixa de produtos</a>
                <a class="btn btn-primary fs-3" href="#">Cancelar baixa em produto</a>
                <a class="btn btn-primary fs-3" href="#">Listar Transações</a>
                <a class="btn btn-primary fs-3" href="{{route('listar')}}">Listar produtos</a>
            </div>
            
            <div class="col-9 bg-light">
                @yield('conteudo')
            </div>
        </div>
    </body>
</html>
