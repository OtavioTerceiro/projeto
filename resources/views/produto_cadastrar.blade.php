@extends('layouts.app')

@section('conteudo')

<form action="{{route('produtos.salvar')}}" method="POST" enctype="multipart/form-data">
    @csrf <!-- Token de segurança ñ funciona sem ele     -->
    <h2>Cadastrar</h2>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('status')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
{{-- o backend no controller pra retornar o status --}}
    @endif
    <label for="produto">Nome do Produto</label>
        <input class="form-control" type="text" name="nome_produto" placeholder="Digite o nome do produto"> 


    <label for="unidade_medida">Unidade de Medida</label>
        <input class="form-control" type="text" name="unidade_medida" placeholder="Digite a unidade de medida">
    
    <label for="userName">Preço do Produto</label>
        <input class="form-control" type="double" name="preco" placeholder="Digite o preço do produto"> 

    <label for="userName">Fornecedor</label>
        <select class="form-select" name="fornecedor">
            <Option>Selecione uma opção</Option>
            @foreach ($fornecedores as $fornecedor)
                <Option value="{{$fornecedor->id}}">{{$fornecedor->nome_fornecedor}}</Option>
            @endforeach
        </select>

    <label for="userName">Departamento do Produto</label>
        <input class="form-control" type="text" name="departamento_produto" 
        placeholder="Digite o departamento que o produto irá">

    <label for="userName">Quantidade da Embalagem</label>
        <input class="form-control" type="number" name="quantidade_embalagem" 
        placeholder="Digite a quantidade da sua embalagem">

    

        <button class="btn btn-success my-3 text-white fw-bold" type="submit">Enviar</button>
    </form>
    
@endsection