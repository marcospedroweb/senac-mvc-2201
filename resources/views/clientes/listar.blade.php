<!-- Semelhante ao include do php -->
@extends('layouts.externoClientes')
@section('title', 'Clientes')
@section('listar.active', 'active')
@section('sidebar')
    @parent
    <hr>
@endsection
@section('content')
    <table class="table table-striped" border=1>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th>E-mail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->endereco }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>{{ $cliente->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
