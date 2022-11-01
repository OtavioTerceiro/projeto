@extends('layouts.app')

@section('conteudo')

@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('status')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<form action="{{route('listar_transacoes')}}" method="GET">
    <h2>BUSCAR BAIXA</h2>

    <label class="form-label" for="userName">CÓDIGO DO PRODUTO:</label>
    <input class="form-control w-auto @error('codigo_produto') is-invalid @enderror" type="number" name="codigo_produto" min="1"  value="{{ old('codigo_produto') }}">
    @error('codigo_produto')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror


    <label class="form-label" for="userName">SELECIONE INTERVALO:</label>
    <input class="form-control w-auto @error('date1') is-invalid @enderror" type="date" name="date1" min="2000-01" max="{{date('Y-m-d')}}">
    @error('date1')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    Até <input class="form-control w-auto  @error('date2') is-invalid @enderror" type="date" name="date2" min="2000-01" max="{{date('Y-m-d')}}">
    @error('date2')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror


    <button class="btn btn-success my-3 text-white fw-bold mx-4" type="submit">Verificar</button>

</form>

@endsection
