@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Perfis</h2>
            </div>
            <div class="pull-right mb-4">

                @can('role-create')
                    <a class="btn btn-success" href="{{ route('roles.create') }}">Criar novo cliente</a>
                @endcan

            </div>
        </div>
    </div>

    <div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Mostrar</a>

                        @can('role-edit')
                            <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Editar</a>
                        @endcan

                        @can('role-delete')
                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}

                            {!! Form::submit('Apagar', ['class' => 'btn btn-danger']) !!}

                            {!! Form::close() !!}
                        @endcan

                    </td>

                </tr>
            @endforeach
        </tbody>

    </table>

    {!! $roles->render() !!}
@endsection
