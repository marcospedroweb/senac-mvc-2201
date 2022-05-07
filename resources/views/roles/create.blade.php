@extends('layouts.app')


@section('content')
    <div class="pull-right mb-5">
        <a class="btn btn-primary" href="{{ route('roles.index') }}">Voltar</a>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div class="pull-left">
            <h2>Criando novo perfil</h2>
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

    {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}

    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="form-group">
                <span class="fw-bold">Nome:</span>
                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-12 col-sm-6">
            <div class="form-group">
                <span class="fw-bold">Permissão:</span>
                @foreach ($permission as $value)
                    <div class="my-1">
                        <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                            {{ $value->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-xs-12 mt-4 text-center">
            <button type="submit" class="btn btn-primary">Gravar</button>
        </div>
    </div>

    {!! Form::close() !!}

@endsection
