@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">
            <div class="pull-right mb-5">
                <a class="btn btn-primary" href="{{ route('roles.index') }}">Voltar</a>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div class="pull-left">
                    <h2>Mostrando perfil</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <span class="fw-bold">Nome:</span>

                {{ $role->name }}

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div>
                    <span class="fw-bold">Permissões:</span>
                </div>
                @if (!empty($rolePermissions))
                    @foreach ($rolePermissions as $v)
                        <label class="label label-success">{{ $v->name }},</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

@endsection
