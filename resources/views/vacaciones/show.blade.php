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
<h1>Autorización de vacaciones</h1><br/>

@if (session('mensaje'))
    <div class="alert alert-success" role="alert">
        <strong>Aviso</strong> {{session('mensaje')}}
        <button type="button" class="close" data-dismiss="alert" alert-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<h2>Solicitudes autorizadas por el secretario </h2>
<table class="table table-bordered table-hover table-sortable text-center" id="tab_logic">

    <thead class="table-dark" style="background-color:rgb(42, 122, 5)">

    <th class="text-center" >
        RPE
    </th>

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
    <th class="text-center">Nombre de quién autoriza</th>
    </tr>
    <tbody>

         <tr>
             <td>{{$encontrar->RPE}}</td>
             <td>{{$encontrar->Nombre}}</td>
             <td>{{$encontrar->Descripcion}}</td>
             <td>{{\Carbon\Carbon::parse($encontrar->FechaInicio)->format('d/m/Y')}}</td>
             <td>{{\Carbon\Carbon::parse($encontrar->FechaFin)->format('d/m/Y')}}</td>
             <td><button type="button" class="btn btn-success">Secretario</button></td>
         </tr>


    </tbody>
</table>



@endsection

