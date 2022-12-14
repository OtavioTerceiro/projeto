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
          <th>QUANTIDADE TOTAL</th>
          <th>AÇÕES</th>


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
                <td class="d-flex flex-wrap gap-2">
                            <form action="{{ route('excluir_produto', ['id' => $produto->id]) }}" method="post">
                                @csrf
                                <button class="btn btn-outline-danger" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                        class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd"
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                                </button>
                            </form>

                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" data-bs-produto="{{ json_encode($produto) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                            </button>
                </td>
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
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Produto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('editar_produto')}}" method="post">
                                @csrf
                                <div class="modal-body d-flex flex-wrap gap-2">
                                    <input name="id" type="hidden" id="id">
                                    <label for="nome_produto">PRODUTO</label>
                                    <input class="form-control" name="nome_produto" type="text" id="nome_produto">
                                    <label for="preco">PREÇO</label>
                                    <input class="form-control" name="preco" type="number" id="preco">
                                    <label for="quantidade_embalagem">QUANTIDADE EMBALAGEM</label>
                                    <input class="form-control" name="quantidade_embalagem" type="number" id="quantidade_embalagem">
                                    <label for="id_link">ID_LINK</label>
                                    <input class="form-control" name="id_link" type="number" id="id_link">
                                    <label for="unidade_medida">Unidade de medida</label>
                                    <input class="form-control" name="unidade_medida" type="text" id="unidade_medida">
                                    <label for="departamento_produto">Departamento</label>
                                    <input class="form-control" name="departamento_produto" type="text" id="departamento_produto">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-outline-success">Editar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                    const exampleModal = document.getElementById('staticBackdrop')
                    exampleModal.addEventListener('show.bs.modal', event => {
                        // Button that triggered the modal
                        const button = event.relatedTarget;
                        // Extract info from data-bs-* attributes
                        const recipient = button.getAttribute('data-bs-produto');
                        let produto = JSON.parse(recipient);

                        document.querySelector('#id').value = produto.id;
                        document.querySelector('#nome_produto').value = produto.nome_produto;
                        document.querySelector('#preco').value = produto.preco;
                        document.querySelector('#quantidade_embalagem').value = produto.quantidade_embalagem;
                        document.querySelector('#id_link').value = produto.id_link;
                        document.querySelector('#unidade_medida').value = produto.unidade_medida;
                        document.querySelector('#departamento_produto').value = produto.departamento_produto;
                    })
                </script>
    </tbody>
</table>

{{ $produtos->appends(['busca' => request()->get('busca', '')])->links('vendor.pagination.bootstrap-4') }}

@endsection
