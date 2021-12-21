@extends('adminlte::page')
@section('title', 'SIPSUTERMCFE')
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
@section('content')
<div class="container">

<form action="{{ url('/capacitacion/'.$curso->id) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}
@include('Capacitacion.form',['modo'=>'Editar'])




</form>
</div>
@stop

