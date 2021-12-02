@extends('adminlte::page')
@section('title', 'SIPSUTERMCFE')
@section('content_header')


@section('css')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}"/>
<link rel="preconnect" href="{{asset('https://fonts.googleapis.com')}}" />
<link rel="preconnect" href="{{asset('https://fonts.gstatic.com')}}" crossorigin />

@endsection

<?php


?>

@section('title', 'SIPSUTERMCFE')
<h1>Administracion de Peridos Vacacionales</h1><br/>
<p><strong>Ingresa el periodo que deseas activar para el registro de vacaciones</strong></p>

@if (session('mensaje'))
<div class="alert alert-success" role="alert">
    <strong>Aviso</strong> {{session('mensaje')}}
    <button type="button" class="close" data-dismiss="alert" alert-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<form action="{{route('periodo.store')}}" method="post">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                            <thead class="table-dark" style="background-color:rgb(42, 122, 5)">
                                <tr >
                                    <th class="text-center">
                                        Nombre
                                    </th>
                                    <th class="text-center">
                                        Inicio
                                    </th>
                                    <th class="text-center">
                                        Fin
                                    </th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                                    </td>
                                    <td>
                                        <input type="date" name="inicio" id="inicio">
                                    </td>
                                    <td>
                                        <input type="date" name="fin" id="fin">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-success">Guardar</button>
            </div>
        </div>
    </div>

</form>





@endsection