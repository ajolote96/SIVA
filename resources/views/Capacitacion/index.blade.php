
@extends('adminlte::page')
@section('title', 'SIPSUTERMCFE')
@section('content_header')
    <h1>Capacitacion</h1>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
@stop


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








<a href="{{ url('capacitacion/create') }}" class="btn btn-success">Registrar nuevo curso</a><br><br>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Curso</th>
            <th>Descripcion</th>
            <th>Lugar</th>
            <th>Fecha</th>
            <th>Participantes</th>
            <th>Constancias</th>

        </tr>
    </thead>

    <tbody>
        @foreach($capacitacions as $capacitacion)
        <tr>
            <td>{{ $capacitacion->id }}</td>
            <td>{{ $capacitacion->NombreCurso }}</td>
            <td>{{ $capacitacion->Descripcion }}</td>
            <td>{{ $capacitacion->Lugar }}</td>
            <td>{{ $capacitacion->Fecha }}</td>
            <td>{{ $capacitacion->Participantes }}</td>
            <td>{{ $capacitacion->Constancias }}</td>
            
            <td>
            <a href="{{ url('/capacitacion/'.$capacitacion->id.'/edit') }}" class="btn btn-warning">
            Editar
            </a>
            <form action="{{ url('/capacitacion/'.$capacitacion->id) }}"  method="post" class="d-inline">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" class="btn btn-danger" onclick="return confirm('¿Deseas borrar?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $capacitacions->links() !!}
</div>
@endsection

