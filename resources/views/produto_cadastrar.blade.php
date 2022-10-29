@extends('layouts.app')

@section('conteudo')
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <form action="{{ route('produtos.salvar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Token de segurança ñ funciona sem ele     -->
        <h2>Cadastrar</h2>

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            {{-- o backend no controller pra retornar o status --}}
        @endif
        <label for="produto">Nome do Produto</label>
        <input class="form-control @error('nome_produto') is-invalid @enderror" type="text" name="nome_produto"
            placeholder="Digite o nome do produto" value="{{ old('nome_produto') }}">
        @error('nome_produto')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <label for="unidade_medida">Unidade de Medida</label>
        <input class="form-control @error('unidade_medida') is-invalid @enderror" type="text" name="unidade_medida"
            placeholder="Digite a unidade de medida" value="{{ old('unidade_medida') }}">
        @error('unidade_medida')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <label for="userName">Preço do Produto</label>
        <input class="form-control @error('preco') is-invalid @enderror" type="double" name="preco"
            placeholder="Digite o preço do produto" value="{{ old('preco') }}">
        @error('preco')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <label for="userName">Departamento do Produto</label>
        <input class="form-control @error('departamento_produto') is-invalid @enderror" type="text"
            name="departamento_produto" placeholder="Digite o departamento que o produto irá"
            value="{{ old('departamento_produto') }}">
        @error('departamento_produto')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror



        <label for="userName">Quantidade da Embalagem</label>
        <input class="form-control @error('quantidade_embalagem') is-invalid @enderror" type="number"
            name="quantidade_embalagem" placeholder="Digite a quantidade da sua embalagem"
            value="{{ old('quantidade_embalagem') }}">
        @error('quantidade_embalagem')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror



        <label for="userName">Código XML</label>
        <input class="form-control @error('id_link') is-invalid @enderror" type="number" placeholder="Digite o codigo XML"
            name="id_link" value="{{ old('id_link') }}">
        @error('id_link')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror



        <button class="btn btn-success my-3 text-white fw-bold" type="submit">Enviar</button>
    </form>
@endsection
