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
@php
    $hidden="hidden";
@endphp
<form action = "{{url('/porcentajeEmpleado/')}}" method="get">
    <div>
        <h1 class="text-center">Personal Disponible</h1><br/>
        <select name="porcentajeEmpleadoS" id="porcentajeEmpleadoS" class="form-control">
            <option>Selecciona la zona</option>
            @foreach ($porcentajes as $porcentaje)
            <option value="{{isset($porcentaje->Nombre)?$porcentaje->Nombre:''}}">{{isset($porcentaje->Nombre)?$porcentaje->Nombre:''}}</option>
            @endforeach
        </select>
    </div>
    <br/>
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                Fecha Inical
                <input type="date" class="form-control" name="FechaInicio" id="FechaInicio">
            </div>
            <br/>
            <div class="col-md-auto">
                Fecha Final
                <input type="date" class="form-control" name="FechaFinal" id="FechaFinal"> 
            </div>
        </div>
    </div>
    <br/>
    <div class="row justify-content-md-center">
        <input type="submit" class="btn btn-success" action = "{{url('/porcentajeEmpleado/'.'porcentajeEmpleado')}}"></button>     
    </div><br>
       <table class="table table-bordered table-hover table-sortable text-center" id="tab_logic">
        <thead class="table-dark" style="background-color:rgb(42, 122, 5)">
        <th class="text-center">ID</th>
        <th class="text-center">Nombre</th>
        <th class="text-center">Cantidad de empleados</th>
        <th class="text-center">Posiciones disponibles</th>
            @if ($cantidadEmpleados!=NULL)
            <th class="text-center">Posiciones ocupadas</th>
            </tr>
            <tbody>
            @foreach ($zona as $zona)
            <tr>
                <td>{{$zona->id_zona}}</td>
                <td>{{$zona->Nombre}}</td>
                <td>@php echo $cantidadEmpleados; @endphp</td>
                <td>@php echo $consultaPosiciones; @endphp</td>
                <td>@php echo $consultaOcupados3; @endphp</td>
            </tr>
            @endforeach
            @else
            </tr>
            <tbody>
            @foreach ($porcentajes as $zona)
            <tr>
                <td>{{$zona->id_zona}}</td>
                <td>{{$zona->Nombre}}</td>
                <td>@php 
                $consultaEmpleados = DB::table('zonas')->join('lugar_de_trabajos','lugar_de_trabajos.Id_zona_F','=','zonas.id_zona')
                ->join('empleados','empleados.IdLugarDeTrabajo','=','lugar_de_trabajos.id')
                ->where("zonas.Nombre","LIKE","%$zona->Nombre%")
                ->count('empleados.RPE');
                echo $consultaEmpleados;
                @endphp</td>
                <td>@php 
                $consultaPosiciones = DB::table('zonas')->join('lugar_de_trabajos','lugar_de_trabajos.Id_zona_F','=','zonas.id_zona')
                ->join('empleados','empleados.IdLugarDeTrabajo','=','lugar_de_trabajos.id')
                ->where("zonas.Nombre","LIKE","%$zona->Nombre%")
                ->count('empleados.RPE');
                $consultaPosiciones = (15/100)*$consultaPosiciones;
                $consultaPosiciones = round($consultaPosiciones);
                echo $consultaPosiciones; @endphp</td>
            </tr>
            @endforeach
            @endif
            </table> 
            


</form>

<br><br>
@endsection