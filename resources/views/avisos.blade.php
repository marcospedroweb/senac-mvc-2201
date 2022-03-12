<!-- Semelhante ao include do php -->
@extends('layouts.externoClientes')
@section('title', 'Minha primera view')
@section('sidebar')
    @parent
    <hr>
@endsection
@section('content')
    @if ($mostrar)
        <div class="alert alert-danger" role="alert">
            <span>ATENÇÃO: lembre dos avisos</span>
        </div>
    @else
        <div></div>
    @endif
    <table class="table" border=1>
        <tr>
            <td>Quadro de Avisos de {{ $nome }}</td>
        </tr>
        @foreach ($avisos as $aviso)
            <tr>
                <td>Aviso #{{ $aviso['id'] }}
                    <br>{{ $aviso['aviso'] }}
                </td>
            </tr>
        @endforeach
        <!-- O blade permite a utilização de php -->
        <?php

        ?>
    </table>
@endsection
