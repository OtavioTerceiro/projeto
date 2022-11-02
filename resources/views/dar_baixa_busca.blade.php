@extends('layouts.app')

@section('conteudo')
    <h2 class="my-4">Pesquisa de Produto</h2>

    <div class="d-flex flex-wrap justify-content-center ">
        <form style="max-width: 400px; width: 400px" class="d-flex flex-wrap gap-3 border border-2 shadow bg-light p-4"
            action="{{ route('dar_baixa') }}" method="get">
            <div class="w-100">
                <label for="cod_prod" class="form-label mb-0">Código do produto</label>
                <input class="form-control @error('cod_prod') is-invalid @enderror" type="text" name="cod_prod"
                    id="cod_prod" value="{{ old('nome_produto') }}">
                @error('cod_prod')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="w-100 text-end">
                <button class="btn btn-success text-white fw-bold" type="submit">Verificar</button>
            </div>

        </form>
    <div>
@endsection
