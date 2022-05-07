@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cadastrar usuário</h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Voltar</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger mt-4">
            <span><span class="fw-bold">Ops!</span> Há algo errado com os dados passados.</span>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <span class="fw-bold">Nome:</span>

                {!! Form::text('name', null, ['placeholder' => 'Nome', 'class' => 'form-control']) !!}

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
                <span class="fw-bold">Senha:</span>

                {!! Form::password('password', ['placeholder' => 'Senha', 'class' => 'form-control']) !!}

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <span class="fw-bold">Confirme a senha:</span>

                {!! Form::password('confirm-password', ['placeholder' => 'Confirme a senha', 'class' => 'form-control']) !!}

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <span class="fw-bold">Perfil:</span>

                {!! Form::select('roles[]', $roles, [], ['class' => 'form-control', 'multiple']) !!}

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>

    {!! Form::close() !!}

@endsection
