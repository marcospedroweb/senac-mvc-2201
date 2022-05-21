@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Detalhes do Cliente</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('home') }}"> Voltar</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <span style="font-weight: bold">Nome:</span>

                <span>{{ $cliente->nome }}
                </span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <span style="font-weight: bold">E-mail:</span>

                <span>{{ $cliente->email }}</span>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <span style="font-weight: bold">Endereço:</span>

                <span>{{ $cliente->endereco }}</span>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <span style="font-weight: bold">Telefone:</span>

                <span>{{ $cliente->telefone }}</span>

            </div>
        </div>
    </div>
@endsection
