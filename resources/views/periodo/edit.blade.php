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
<h1>Administracion de periodos</h1><br/>

<form action="{{route('periodo.update', $periodos->id)}}" method="post">
    @csrf
    @method('put')
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
                                        <label for="">Nombre:</label>
                                        <input type="text" name="Nombre" id="Nombre" value="{{$periodos->Nombre}}">
                                    </td>
                                    <td>
                                        <label for="">Fecha Inicio:</label>
                                        <input type="date" name="Fecha" id="Fecha" value="{{$periodos->FechaInicio}}"">
                                    </td>
                                    <td>
                                        <label for="">Fecha Fin:</label>
                                        <input type="text" name="Nombre" id="Nombre" value="{{$periodos->FechaFin}}">
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