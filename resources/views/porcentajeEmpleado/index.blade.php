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
    <h1 class="text-center">Personal Disponible</h1><br/>
    <select class="custom-select" id="inputGroupSelect01">
        <option value="">REVOLUCION</option>
        <option value="">CAMICHINES</option>
        <option value="">SANTA FE</option>
        <option value="">TLAQUEPAQUE</option>
        <option value="">PARADERO</option>
        <option value="">TONALA</option>
    </select>
</div>
<br/>
<table class="table table-bordered table-hover table-sortable text-center" id="tab_logic">

    <thead class="table-dark" style="background-color:rgb(42, 122, 5)">
    <th class="text-center">ID</th>
    <th class="text-center">Nombre</th>
    <th class="text-center">Empleados</th>
    <th class="text-center">Disponible</th>
    </tr>
    <tbody>
        <td>DX170</td>
        <td>REVOLUCION</td>
        <td>200</td>
        <td>30</td>
    </tbody>
        </table>
        <button  type="button" class="btn btn-success">Consultar</button>
@endsection