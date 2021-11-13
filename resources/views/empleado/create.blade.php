@extends('adminlte::page')
@section('title', 'SIPSUTERMCFE')

<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
@section('content')
<div class="container">

<form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">
@csrf 
@include('empleado.form',['modo'=>'Crear'])
</form>
</div>
@stop