
@extends('adminlte::page')
@section('title', 'SIPSUTERMCFE')
@section('content_header')
    <h1>Empleados</h1>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
@stop

<script src="{{ URL::asset('css/estilos.css') }}"></script>

@section('content')
<div class="container">


@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
{{ Session::get('mensaje') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif






<meta charset="UTF-8"/>

<a href="{{ url('empleado/create') }}" class="btn btn-success">Registrar nuevo empleado</a><br><br>

<h1>Datos de la empresa </h1>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
             <th>RPE</th>
            <th>Contrato</th>
            <th>Seguro social(IMMS)</th>
            <th>Fecha de ingreso</th>
            <th>RFC</th>
            <th>Contacto de emergencia</th>
            <th>Telefono de emergencia</th>
            <th>Cursos que Participa</th>
        </tr>
    </thead>

    <tbody>
        @foreach($empleados as $empleado)
        <tr>
            <td>{{ $empleado->RPE }}</td>
            <td>{{ $empleado->Contrato }}</td>
            <td>{{ $empleado->IMMS }}</td>
            <td>{{ $empleado->FechaIngreso }}</td>
            <td>{{ $empleado->RFC }}</td>
            <td>{{ $empleado->ContactoEmergencia }}</td>
            <td>{{ $empleado->TelefonoEmergencia }}</td>
            <td>{{ $empleado->CursosParticipaba }}</td>
            
            <td>
            <!-- <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-warning">
            Editar
            </a>
            <form action="{{ url('/empleado/'.$empleado->id) }}"  method="post" class="d-inline">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" class="btn btn-danger" onclick="return confirm('¿Deseas borrar?')" value="Borrar"> -->
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>

<h1>Datos personales </h1>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
        <th>RPE</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Tipo Sangre</th>
            <th>Alergias</th>
            <th>Padecimientos</th>
            <th>Fecha de nacimiento</th>
            <th>Sexo</th>
            <th>Estado Civil</th>
            <th>Hijos</th>
            <th>Papa</th>
            <th>Mama</th>
        </tr>
    </thead>

    <tbody>
        @foreach($empleados as $empleado)
        <tr>
        <td>{{ $empleado->RPE }}</td>
            <td>{{ $empleado->Nombre }}</td>
            <td>{{ $empleado->ApellidoPaterno }}</td>
            <td>{{ $empleado->ApellidoMaterno }}</td>
            <td>{{ $empleado->TipoSangre }}</td>
            <td>{{ $empleado->Alergias }}</td>
            <td>{{ $empleado->Padecimientos }}</td>
            <td>{{ $empleado->FechaNacimiento}}</td>
            <td>{{ $empleado->Sexo }}</td>
            <td>{{ $empleado->EstadoCivil}}</td>
            <td>{{ $empleado->Hijos }}</td>
            <td>{{ $empleado->Papa }}</td>
            <td>{{ $empleado->Mama }}</td>

            <td>
            <!-- <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-warning">
            Editar
            </a>
            <form action="{{ url('/empleado/'.$empleado->id) }}"  method="post" class="d-inline">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" class="btn btn-danger" onclick="return confirm('¿Deseas borrar?')" value="Borrar"> -->
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>

</table>

<h1> Medios de contacto y ubicación </h1>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
        <th>RPE</th>
            <th>Domicilio</th>
            <th>Telefono de Casa</th>
            <th>Telefono celular</th>
            <th>Fecha de nacimiento</th>
            <th>Correo electrónico</th>
        </tr>
    </thead>

    <tbody>
        @foreach($empleados as $empleado)
        <tr>
        <td>{{ $empleado->RPE }}</td>
            <td>{{ $empleado->Domicilio }}</td>
            <td>{{ $empleado->TelefonoCasa }}</td>
            <td>{{ $empleado->TelefonoCelular }}</td>
            <td>{{ $empleado->FechaNacimiento}}</td>
            <td>{{ $empleado->CorreoElectronico }}</td>

            <!-- <td>
            <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-warning">
            Editar
            </a>
            <form action="{{ url('/empleado/'.$empleado->id) }}"  method="post" class="d-inline">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" class="btn btn-danger" onclick="return confirm('¿Deseas borrar?')" value="Borrar"> -->
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $empleados->links() !!}
</div>
@endsection

