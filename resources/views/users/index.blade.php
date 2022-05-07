@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Usuários</h2>
            </div>
            <div class="pull-right mb-4">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Criar novo usuário</a>
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
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Perfil</th>
                <th width="280px">Ação</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($data as $key => $user)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if (!empty($rolePermissions))
                            @foreach ($rolePermissions as $v)
                                <label class="label label-success">{{ $v->name }},</label>
                            @endforeach
                        @else
                            <span>Nenhum</span>
                        @endif


                    </td>

                    <td>
                        <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Mostrar</a>
                        <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Editar</a>

                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}

                        {!! Form::submit('Apagar', ['class' => 'btn btn-danger']) !!}

                        {!! Form::close() !!}

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $data->render() !!}
@endsection
