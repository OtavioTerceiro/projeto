@extends('layouts.app')

@section('conteudo')

    <form class="form-control" action="{{route('dar_baixa')}}" method="get">
        <label for="cod_prod" class="form-label">
            Código do produto<input class="form-control" type="text" name="cod_prod" id="cod_prod">
        </label>

        <button class="btn btn-success my-3 text-white fw-bold mx-4" type="submit">Verificar</button>
    </form>
@endsection

