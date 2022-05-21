@extends('layouts.app')
@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('home') }}"> Voltar</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Endereço</td>
                <td>Telefone</td>
                <td>E-mail</td>
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
