@extends('layouts.app')

@section('conteudo')
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2 class="my-4">Buscar Baixa</h2>

    <div class="d-flex flex-wrap justify-content-center ">

        <form style="max-width: 400px"  class="d-flex flex-wrap gap-3 border border-2 shadow bg-light p-4" action="{{ route('listar_transacoes') }}"
            method="GET">
            <div class="w-100 ">
                <label class="form-label" for="userName">CÓDIGO DO PRODUTO</label>
                <input required class="form-control  @error('codigo_produto') is-invalid @enderror" type="number"
                    name="codigo_produto" min="1" value="{{ old('codigo_produto') }}">
                @error('codigo_produto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="w-100 ">
                <label class="form-label" for="userName">SELECIONE INTERVALO</label>
                <input required class="form-control @error('date1') is-invalid @enderror" type="date" name="date1"
                    min="2000-01" max="{{ date('Y-m-d') }}">
                @error('date1')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <span class="w-100 text-center">Até</span>


            <div class="w-100 ">
                <input required class="form-control  @error('date2') is-invalid @enderror" type="date" name="date2"
                    min="2000-01" max="{{ date('Y-m-d') }}">
                @error('date2')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="w-100 text-end">
                <button class="btn btn-success text-white fw-bold" type="submit">Verificar</button>
            </div>
        </form>
    </div>
@endsection
