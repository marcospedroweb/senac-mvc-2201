<!-- Semelhante ao include do php -->
@extends('layouts.externo');
@section('title', 'Minha primera view');
@section('sidebar')
    @parent
    <hr>
@endsection
@section('content')
    <table class="table">
        <tr>
            <td>Quadro de Avisos</td>
        </tr>
        @if ($mostrar)
            <tr>
                <td>Aviso #1</td><br>
                <td>bla bla bla</td>
            </tr>
        @endif
        <tr>
            <td>Aviso #2</td><br>
            <td>bla bla bla</td>
        </tr>
    </table>
@endsection
