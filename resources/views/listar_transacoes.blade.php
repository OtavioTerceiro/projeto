@extends('layouts.app')

@section('conteudo')

    <form class="d-flex flex-wrap justify-content-center align-items-center gap-1 mb-3" action="{{ route('listar_transacoes') }}"
        method="get">

        <input class="form-control w-auto" type="date" name="busca" value="{{ old('busca') }}">

        <button class="btn btn-outline-success" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search"
                viewBox="0 0 16 16">
                <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
        </button>
    </form>

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">DATA</th>
                <th scope="col">OPERAÇÃO</th>
                <th scope="col">MOTIVO</th>
                <th scope="col">PRODUTO</th>
                <th scope="col">PREÇO</th>
                <th scope="col">QUANTIDADE</th>
                <th scope="col">OBSERVAÇÃO</th>
                @if (request()->get('codigo_produto'))
                    <th scope="col">AÇÃO</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($transacoes as $transacao)
                <tr>
                    <td>{{ $transacao->id }}</td>
                    <td>{{ date('d/m/Y', strtotime($transacao->data_trans)) }}</td>
                    <td>{{ $transacao->operacao == 0 ? 'Entrada' : 'Saída' }}</td>
                    <td>{{ $transacao->motivo_saida }}</td>
                    <td>{{ $transacao->id_produto }}</td>
                    <td>{{ $transacao->preco }}</td>
                    <td>{{ $transacao->qtd_transacao }}</td>
                    <td>{{ $transacao->observacao ?? '-' }}</td>

                    @if (request()->get('codigo_produto'))
                        <td>
                            @if (!$transacao->observacao)
                                <form class="text-center"
                                    action="{{ route('cancelar_transacao', ['id' => $transacao->id]) }}" method="get">

                                    {{-- <input name="id" type="hidden" value="{{ $transacao->id }}"> --}}
                                    <button class="btn btn-danger" type="submit">Cancelar</button>
                                </form>
                            @else
                                <div class="text-center">
                                    -
                                </div>
                            @endif
                        </td>
                    @endif

                </tr>
            @empty
                <tr>
                    <td collspan="9">Não há movimentação!</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $transacoes->appends(['busca' => request()->get('busca', '')])->links('vendor.pagination.bootstrap-4') }}
@endsection
