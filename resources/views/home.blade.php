@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                        &nbsp;
                        <a href="/clientes/listar" class="me-2">Listar Clientes</a>
                        <a href="/users" class="me-2">Listar usuarios</a>
                        <a href="/roles" class="me-2">Listar perfils</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
