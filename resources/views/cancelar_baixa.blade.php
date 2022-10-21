@extends('layouts.app')

@section('conteudo')

<form action="{{route('lista_cancelar_baixa')}}" method="GET" enctype="multipart/form-data">
    <h2>CANCELAR BAIXA</h2>

<label class="form-label" for="userName">CÓDIGO DO PRODUTO:</label>
    <input class="form-control" type="number" name="codigo_produto" placeholder="Digite o código do produto" min="1"> 
   
<label class="form-label" for="userName">SELECIONE INTERVALO:</label>
    <input class="form-control" type="date" name="date" min="2000-01" max="{{date('Y-m-d')}}"> Até <input class="form-control" type="date" name="date2" min="2000-01" max="{{date('Y-m-d')}}">
    
    <button class="btn btn-success my-3 text-white fw-bold mx-4" type="submit">Verificar</button>

</form>

@endsection