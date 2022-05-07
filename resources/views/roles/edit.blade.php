@extends('layouts.app')

@section('content')

    <div class="pull-right mb-5">
        <a class="btn btn-primary" href="{{ route('roles.index') }}">Voltar</a>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div class="pull-left">
            <h2>Editando perfil</h2>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger mt-4">
            <span><span class="fw-bold">Ops!</span> Há algo errado com os dados.</span>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <span class="fw-bold">Nome:</span>

                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <span class="fw-bold">Permissão:</span>
                <br />

                @foreach ($permission as $value)
                    <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}

                        {{ $value->name }}</label>

                    <br />
                @endforeach

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Gravar</button>
        </div>
    </div>

    {!! Form::close() !!}


@endsection
