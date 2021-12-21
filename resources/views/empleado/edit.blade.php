@extends('adminlte::page')
@section('title', 'SIPSUTERMCFE')
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
@section('content')
<div class="container">

<form action="{{ url('/empleado/'.$empleado->id) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}
@include('empleado.form',['modo'=>'Editar'])
</form>
</div>
@stop

