@extends('layouts.app')

@section('conteudo')

    <form class="d-flex flex-wrap gap-4" action="{{route('dar_baixa')}}" method="get">
        <div>
            <label for="cod_prod" class="form-label mb-0">Código do produto</label>
            <input class="form-control @error('cod_prod') is-invalid @enderror" type="text" name="cod_prod" id="cod_prod" value="{{ old('nome_produto') }}">
            @error('cod_prod')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-success my-4 flex-self-end text-white fw-bold" type="submit">Verificar</button>
    </form>
@endsection

