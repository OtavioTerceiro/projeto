@extends('layouts.app')

@section('title', 'System Byte')

@section('conteudo')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2 class="my-4">Envio de arquivo XML</h2>
    <div class="d-flex flex-wrap justify-content-center ">
        <form style="max-width: 400px" class="d-flex flex-wrap gap-3 border border-2 shadow bg-light p-4" action="{{ route('enviar.xml') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            Adicione um arquivo<input required type="file" name="xml" id="xml" class="form-control w-auto">

            <button class="btn btn-success text-white fw-bold" type="submit">Enviar</button>
        </form>

    </div>
@endsection
