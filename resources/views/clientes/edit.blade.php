@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cadastrar cliente</h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('clients.index') }}"> Voltar</a>
            </div>
        </div>
    </div>




    @if (count($errors) > 0)
        <div class="alert alert-danger mt-4">
            <span class="fw-bold"><span class="fw-bold">Ops!</span> Há algo errado com os dados.</span>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::model($cliente, ['method' => 'PATCH', 'route' => ['clients.update', $cliente->id]]) !!}

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <span class="fw-bold">Nome:</span>
                {!! Form::text('nome', null, ['placeholder' => 'Nome', 'class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <span class="fw-bold">Email:</span>
                {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <span class="fw-bold">Endereço:</span>
                {!! Form::text('endereco', null, ['placeholder' => 'Endereço', 'class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <span class="fw-bold">Telefone:</span>
                {!! Form::text('telefone', null, ['placeholder' => 'Telefone', 'class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Gravar</button>
        </div>

    </div>

    {!! Form::close() !!}

@endsection
