@extends('layouts.externo')
@section('title', 'Minha primeira view')
@section('sidebar')
    <div>
        @parent
    </div>
@endsection
@section('content')
    @if ($mostrar)
        <div class="alert alert-danger" role="alert">
            ATENÇÃO: lembre dos avisos
        </div>
    @else
        <div></div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <td>Quadro de Avisos de {{ $nome }}</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($avisos as $aviso)
                <tr>
                    <td>Aviso #{{ $aviso['id'] }} {{ $aviso['aviso'] }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
