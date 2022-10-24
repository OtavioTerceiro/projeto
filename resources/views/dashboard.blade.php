@extends('layouts.app')

@section('conteudo')
<form action="{{route('enviar.xml')}}" method="POST" enctype="multipart/form-data">
    @csrf

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('status')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    Adicione um arquivo<input type="file" name="xml" id="xml" class="form-control">

    <button class="my-3 btn btn-outline-success" type="submit">Enviar</button>
 
</form>
@endsection