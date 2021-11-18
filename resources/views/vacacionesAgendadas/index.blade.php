@extends('adminlte::page')
@section('title', 'SIPSUTERMCFE')
@section('content_header')

@section('css')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}"/>
    <link rel="preconnect" href="{{asset('https://fonts.googleapis.com')}}" />
    <link rel="preconnect" href="{{asset('https://fonts.gstatic.com')}}" crossorigin />

@endsection



@section('title', 'SIPSUTERMCFE')
<div>
    <h1 class="text-center">Vacaciones Agendadas</h1><br/>
    @if (session('mensaje'))
    <div class="alert alert-success" role="alert">
        <strong>Aviso</strong> {{session('mensaje')}}
        <button type="button" class="close" data-dismiss="alert" alert-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

</div>
<br/>
<h5>Estas son las vacaciones solicitaste</h5><br/><br/>
<table class="table table-bordered table-hover table-sortable text-center" id="tab_logic">

    <thead class="table-dark" style="background-color:rgb(42, 122, 5)">
    <th class="text-center">
        Periodo
    </th>
    <th class="text-center">
        Descripcion
    </th>
    <th class="text-center">
        Fecha Inicio
    </th>
    <th class="text-center">
        Fecha Fin
    </th>
    </tr>
    <tbody>
        @foreach ($vacacionesAgendadas as $vacacionesAgendadas)
        <tr>
            <td>{{$vacacionesAgendadas->Nombre}}</td>
            <td>{{$vacacionesAgendadas->Descripcion}}</td>
            <td>{{\Carbon\Carbon::parse($vacacionesAgendadas->FechaInicio)->format('d/m/Y')}}</td>
            <td>{{\Carbon\Carbon::parse($vacacionesAgendadas->FechaFin)->format('d/m/Y')}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection