@extends('layouts.app')

@section('conteudo')

<form action="" method="POST" enctype="multipart/form-data">
    <h2>Cadastrar</h2>

    <label for="produto">Nome do Produto</label>
        <input class="form-control" type="text" name="nome_prod" placeholder="Digite o nome do produto"> 

    <label for="unidade_medida">Unidade de Medida</label>
        <input class="form-control" type="text" name="unmedida_prod" placeholder="Digite a unidade de medida">
    
    <label for="userName">Preço do Produto</label>
        <input class="form-control" type="double" name="preco_prod" placeholder="Digite o preço do produto"> 

    <label for="userName">Fornecedor</label>
        <select class="form-select" name="fornec_prod">
            <Option>Fornecedor X</Option>
            <option>Fornecedor Y</option>
        </select>

    <label for="userName">Departamento do Produto</label>
        <input class="form-control" type="text" name="depart_prod" 
        placeholder="Digite o departamento que o produto irá">

    <label for="userName">Quantidade da Embalagem</label>
        <input class="form-control" type="number" name="quant_embalagem" 
        placeholder="Digite a quantidade da sua embalagem">

        <button class="btn btn-success my-3 text-white fw-bold" type="submit">Enviar</button>
    </form>
    
@endsection