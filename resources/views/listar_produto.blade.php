@extends('layouts.app')

@section('conteudo')

<h2 class="my-4">Listar Produtos</h2>

<form class="d-flex flex-wrap justify-content-center align-items-center gap-1 mb-3" action="{{ route('listar') }}" method="get">
    {{-- <label class="m-0 fs-3" for="busca">Faça uma Busca:</label> --}}
    <input class="form-control w-auto" type="text" name="busca" placeholder="Pesquisar">

    <button class="btn btn-outline-success" type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg>
    </button>
</form>

<table class="table table-light">

    <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>NOME</th>
          <th>UNIDADE MEDIDA</th>
          <th>FORNECEDOR</th>
          <th>PREÇO</th>
          <th>QUANTIDADE EMBALAGEM</th>
          <th>QUANTIDADE</th>

        </tr>
    </thead>

    <tbody>
        @forelse($produtos as $produto)
            <tr>
                <td>{{ $produto->id }}</td>
                <td>{{ $produto->nome_produto}}</td>
                <td>{{ $produto->unidade_medida}}</td>
                <td>{{ $produto->id_fornecedor ?? '-' }}</td>
                <td>{{ $produto->preco}}</td>
                <td>{{ $produto->quantidade_embalagem }}</td>
                <td>{{ $produto->quantidade ?? '-' }}</td>

            </tr>
        @empty
            <tr>
                @if(request()->get('busca'))
                    <td collspan="7">Nenhum produto encontrado!</td>
                @else
                    <td collspan="7">Não há produtos!</td>
                @endif
            </tr>
        @endforelse

    </tbody>
</table>

{{ $produtos->appends(['busca' => request()->get('busca', '')])->links('vendor.pagination.bootstrap-4') }}

@endsection
