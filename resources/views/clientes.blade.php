<!-- Semelhante ao include -->
@extends('layouts.externoClientes')
<!-- Preenchendo a sessão com atributo [title] com o conteudo que quero -->
@section('title', 'Pagina de clientes')
@section('teste.active', 'active')
<!-- Trazendo o bloco com atributo [sidebar] -->
@section('sidebar')
    <!-- [parent] traz o conteudo dentro desse bloco -->
    @parent
@endsection
@section('content')
    <!-- preenchendo esse bloco com o conteudo que eu quero-->
    <h1>Lista de clientes</h1>
    @if ($erro)
        <div class="alert alert-danger">
            <span><span class='fw-bold'>ATENÇÃO!</span> houve um erro ao carregar a lista de clientes, tente
                novamente</span>
        </div>
    @else
        <div></div>
    @endif
@endsection
