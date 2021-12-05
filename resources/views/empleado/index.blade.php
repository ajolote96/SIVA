@extends('adminlte::page')
@section('title', 'SIPSUTERMCFE')
@section('content_header')


@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}"/>
<link rel="preconnect" href="{{asset('https://fonts.googleapis.com')}}" />
<link rel="preconnect" href="{{asset('https://fonts.gstatic.com')}}" crossorigin />

@endsection


@section('title', 'SIPSUTERMCFE')
<h1>Empleados</h1><br/>


<div class="card">
    <div class="card-body">
        <a href="{{ url('empleado/create') }}" class="btn btn-success">Registrar nuevo empleado</a><br><br>
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered table-hover table-sortable" id="users">
                        <thead class="table-dark" style="background-color:rgb(42, 122, 5)">
                                <tr>
                                    <th>RPE</th>
                                    <th>Nombre</th>
                                    <th>Correo electrónico</th>
                                    <th>Id Lugar de Trabajo</th>
                                    <th>Id Zona</th>
                                    <th>Acciones</th>
                        
                                </tr>
                        </thead>
                        <tbody>
                            @foreach($empleados as $empleado)
                            <tr>
                                <td>{{ $empleado->RPE }}</td>
                                <td>{{ $empleado->Nombre }}{{ $empleado->ApellidoPaterno}}{{ $empleado->ApellidoMaterno}}</td>
                                <td>{{ $empleado->CorreoElectronico }}</td>
                                <td>{{ $empleado->IdLugarDeTrabajo }}</td>
                                <td>{{ $empleado->FechaNacimiento}}</td>
                                
                    
                                 <td>
                                <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-warning">
                                Editar
                                </a>
                                <form action="{{ url('/empleado/'.$empleado->id) }}"  method="post" class="d-inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger" onclick="return confirm('¿Deseas borrar?')" value="Borrar"> 
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        
        </div>
    </div>
</div>

@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="<?php echo asset('js/validaciones.js') ?>"></script>
    <script type="text/javascript" src=<?php echo asset('https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js') ?>></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>    
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#users').DataTable();
    </script>
@endsection




