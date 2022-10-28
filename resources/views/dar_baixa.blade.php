@extends('layouts.app')

@section('conteudo')
{{-- esse aqui --}}
    <form action="{{route('baixa.transacao', ['cod_prod'=> $produto->id])}}" method="post">
        @csrf
        <div class="bg-light">
            <span class="my-2 display-8 d-block">ID Produto: {{$produto->id}}</span>
            <span class="my-2 display-8 d-block">Nome: {{$produto->nome_produto}}</span>
            <span class="my-2 display-8 d-block">Quantidade Total: {{$produto->quantidade}}</span> 
        </div>
       <label>
        Quantidade de Saída<input class="form-control" type="number" name="quantidade" id="" placeholder="Digite uma quantidade"></label>


        <div class="form-group col-md-2">
            <label for="motivo_saida">Motivo de Saída</label>
            <select name="motivo_saida" class="form-control">
                <option selected value="Venda">Venda</option>
                <option value="Devolucao">Devolução</option>
                <option value="Avaria">Avaria</option>
                <option value="Garantia">Garantia</option>
            </select>
        </div>

        <button class="btn btn-success my-3 text-white fw-bold mx-4" type="submit">Concluir</button>
    </form>
@endsection


