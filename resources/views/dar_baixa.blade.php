@extends('layouts.app')

@section('conteudo')
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex flex-wrap justify-content-center ">
        <form style="max-width: 400px; width: 400px" class="d-flex flex-wrap gap-3 border border-2 shadow bg-light p-4"
            action="{{ route('baixa.transacao', ['cod_prod' => $produto->id]) }}" method="post">
            @csrf
            <div class="w-100">
                <span class="my-2 display-8 d-block">ID Produto: {{ $produto->id }}</span>
                <span class="my-2 display-8 d-block">Nome: {{ $produto->nome_produto }}</span>
                <span class="my-2 display-8 d-block">Quantidade Total: {{ $produto->quantidade }}</span>
            </div>

            <div class="w-100">
                <label>Quantidade de Saída </label>

                <input class="form-control w-auto @error('quantidade') is-invalid @enderror" type="number"
                    name="quantidade" value="{{ old('quantidade') }}" placeholder="Digite uma quantidade">
                @error('quantidade')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="w-100">
                <label for="motivo_saida">Motivo de Saída</label>
                <select name="motivo_saida" class="form-select @error('motivo_saida') is-invalid @enderror">
                    <option selected value="Venda">Venda</option>
                    <option value="Devolucao">Devolução</option>
                    <option value="Avaria">Avaria</option>
                    <option value="Garantia">Garantia</option>
                </select>
            </div>

            @error('motivo_saida')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <div class="w-100 text-end">
                <button class="text-white fw-bold btn btn-success" type="submit">Concluir</button>
            </div>
        </form>
    </div>
@endsection
