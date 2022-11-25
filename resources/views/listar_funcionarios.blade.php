@extends('layouts.app')

@section('conteudo')
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2 class="my-4">Listar Funcionários</h2>

    <form class="d-flex flex-wrap justify-content-center align-items-center gap-1 mb-3"
        action="{{ route('listar_funcionarios') }}" method="get">
        {{-- <label class="m-0 fs-3" for="busca">Faça uma Busca:</label> --}}
        <input class="form-control w-auto" type="text" name="busca" placeholder="Pesquisar">

        <button class="btn btn-outline-success" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search"
                viewBox="0 0 16 16">
                <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
        </button>
    </form>

    <div class="overflow-auto">
        <table class="table table-light">

            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>EMAIL</th>
                    <th>CRIADO EM</th>
                    <th>EDITADO EM</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>

            <tbody>
                @forelse($funcionarios as $funcionario)
                    <tr>
                        <td>{{ $funcionario->id }}</td>
                        <td>{{ $funcionario->name }}</td>
                        <td>{{ $funcionario->email }}</td>
                        <td>{{ $funcionario->created_at }}</td>
                        <td>{{ $funcionario->updated_at }}</td>
                        <td class="d-flex flex-wrap gap-2">
                            <form action="{{ route('excluir_funcionario', ['id' => $funcionario->id]) }}" method="post">
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
                                data-bs-target="#staticBackdrop" data-bs-funcionario="{{ json_encode($funcionario) }}">
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
                        @if (request()->get('busca'))
                            <td collspan="5">Nenhum funcionário encontrado!</td>
                        @else
                            <td collspan="5">Não há funcionários cadastrados</td>
                        @endif
                    </tr>
                @endforelse

                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Funcionário</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('editar_funcionario')}}" method="post">
                                @csrf
                                <div class="modal-body d-flex flex-wrap gap-2">
                                    <input name="id" type="hidden" id="id">
                                    <label for="email">E-mail</label>
                                    <input class="form-control" name="email" type="email" id="email">
                                    <label for="nome">Nome</label>
                                    <input class="form-control" name="name" type="text" id="name">
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
                        const recipient = button.getAttribute('data-bs-funcionario');
                        let funcionario = JSON.parse(recipient);

                        document.querySelector('#id').value = funcionario.id;
                        document.querySelector('#name').value = funcionario.name;
                        document.querySelector('#email').value = funcionario.email;
                    })
                </script>
            </tbody>
        </table>
    </div>

    {{ $funcionarios->appends(['busca' => request()->get('busca', '')])->links('vendor.pagination.bootstrap-4') }}
@endsection
