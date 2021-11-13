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
<h1>Administracion de dias feriados</h1><br/>

@if (session('mensaje'))
<div class="alert alert-success" role="alert">
    <strong>Aviso</strong> {{session('mensaje')}}
    <button type="button" class="close" data-dismiss="alert" alert-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<br>
<p><strong>Ingresa los dias feriados que deseas otorgar</strong></p>
<form action="{{route('diaferiado.store')}}" method="post">
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
                                        Fecha
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <label for="">Nombre:</label>
                                        <input type="text" name="Nombre" id="Nombre">
                                    </td>
                                    <td>
                                        <label for="">Fecha:</label>
                                        <input type="date" name="Fecha" id="Fecha">
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

<br><br>
<!--Tabla de dias feriados -->
<p><strong>Estos son los dias feriados que tienes activos</strong></p>

<div class="card">
    <div class="card-body">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                        <thead class="table-dark" style="background-color:rgb(42, 122, 5)">
                            <tr >
                                <th class="text-center">
                                    Id
                                </th>
                                <th class="text-center">
                                    Nombre
                                </th>
                                <th class="text-center">
                                    Fecha
                                </th>
                                <th class="text-center">
                                    Accion
                                </th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($diaferiado as $feriado)
                                
                            <tr>
                                <td>
                                    {{$feriado->id}}
                                </td>
                                <td>
                                    {{$feriado->Nombre}}
                                </td>
                                <td>
                                    {{$feriado->Fecha}}
                                </td>
                                <td>
                                    <form action="{{route('diaferiado.destroy', $feriado->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger row justify-content-between">Eliminar</button>
                                    </form>
                                    <a href="{{ route('diaferiado.edit', $feriado->id)}}" class="btn btn-sm btn-primary row justify-content-between">Editar</a>
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