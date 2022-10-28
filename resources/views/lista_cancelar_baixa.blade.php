@extends('layouts.app')

@section('conteudo')
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
                <th scope="col">AÇÃO</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transacoes as $transacao)
                <tr>
                    <td>{{ $transacao->id }}</td>
                    <td>{{ $transacao->data_trans }}</td>
                    <td>{{ $transacao->operacao == 0 ? 'Entrada' : 'Saída' }}</td>
                    <td>{{ $transacao->motivo_saida }}</td>
                    <td>{{ $transacao->id_produto }}</td>
                    <td>{{ $transacao->preco }}</td>
                    <td>{{ $transacao->qtd_transacao }}</td>
                    <td>{{ $transacao->observacao ?? '-' }}</td>
                    <td>
                        @if (!$transacao->observacao)
                            
                        <form class="text-center" action="{{ route('cancelar_transacao', ['id' => $transacao->id]) }}" method="get">
                            
                            {{-- <input name="id" type="hidden" value="{{ $transacao->id }}"> --}}
                            <button class="btn btn-danger" type="submit">Cancelar</button>
                        </form>
                        @else
                            <div class="text-center">
                                -
                            </div>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td collspan= "9">Não há movimentação!</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection