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
<h1>Vacaciones pendientes por validar</h1><br/>


@if (session('mensaje'))
    <div class="alert alert-success" role="alert">
        <strong>Aviso</strong> {{session('mensaje')}}
        <button type="button" class="close" data-dismiss="alert" alert-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('success'))
<div class="alert alert-success">
{{session ('success') }}
</div>
@endif

@if(session('delete'))
<div class="alert alert-danger">
{{session ('delete') }}
</div>
@endif

<table class="table table-bordered table-hover table-sortable text-center" id="">

    <thead class="table-dark" style="background-color:rgb(20, 115, 192)">

    <th class="text-center" >
        RPE
    </th>
    <th class="text-center" >
        Nombre
    </th>
    <th class="text-center">
        Periodo
    </th>
    <th class="text-center">
        Descripcion
    </th>
    <th class="text-center">
        Fecha Inicio
    </th>
    <th class="text-center">
        Fecha Fin
    </th>
    <th class="text-center">Calendario</th>
    <th class="text-center">Autorizar</th>
    <th class="text-center">Rechazar</th>
    </tr>
    <tbody>
    @foreach ($validaciones as $validacion)
        @if($validacion->autoriza_jefe == 0 AND $validacion->autoriza_sec == 0 AND $validacion->rechaza_sec == 0 AND $validacion->rechaza_jefe == 0  )
        <form action="{{route('show.update', $validacion->id)}}" method="post">
            @csrf
            @method('put')
        <tr>
            <td id="RPE">{{$validacion->RPE}}</td>
            <input type="text" name="RPE" id="RPE" value="{{$validacion->RPE}}" hidden="true">
        <?php $content = DB::table("empleados")
        ->select("empleados.nombre", "empleados.apellidopaterno", "empleados.apellidomaterno")
        ->where("empleados.rpe", "=", $validacion->RPE)
        ->get();
       ?>

        <?php

$fuera = 0;
        foreach ($content as $key){
            $fuera = $key->apellidopaterno;

        }

        ?>

        <input type="text" name="nombreUsuario" id="nombreUsuario" value="{{$fuera}}" hidden="true">
        <td id="nombreUsuario">{{$fuera}}</td>

        <td id="Nombre">{{$validacion->Nombre}}</td>
        <input type="text" name="Nombre" id="Nombre" value="{{$validacion->Nombre}}" hidden="true">    

        <td id="Descripcion">{{$validacion->Descripcion}}</td>
        <input type="text" name="Descripcion" id="Descripcion" value="{{$validacion->Descripcion}}" hidden="true">

        <td id="FechaInicio">{{\Carbon\Carbon::parse($validacion->FechaInicio)->format('d/m/Y')}}</td>
            <input type="text" name="FechaInicio" id="FechaInicio" value="{{$validacion->FechaInicio}}" hidden="true">
      
        <td id="FechaFin">{{\Carbon\Carbon::parse($validacion->FechaFin)->format('d/m/Y')}}</td>
            <input type="text" name="FechaFin" id="FechaFin" value="{{$validacion->FechaFin}}" hidden="true">

            <td id="periodo">{{$validacion->periodo}}</td>
            <input type="text" name="periodo" id="periodo" value="{{$validacion->periodo}}" hidden="true">

            <td id="autoriza_email" hidden="true">{{$user->email}}</td>
            <input type="text" name="autoriza_email" id="autoriza_email" value="{{$user->email}}" hidden="true">
            {{-- <input type="text" name="rechaza_email" id="rechaza_email" value="{{$user->email}}" hidden="true"> --}}




            <td><button class="btn btn-sm btn-success justify-content-between">Autorizar</button></td>
        {{--<td><a href="{{ route('vacaciones.update', $validacion->id)}}" class="btn btn-success justify-content-between">Autorizar</a></td>
            <td><a href="{{ route('vacaciones.update', $validacion->id)}}" class="btn btn-danger justify-content-between">No autorizar</a></td>
            --}}

            </form>

        <form action="{{route('show.destroy', $validacion->id)}}" method="post">
            @csrf
            <input type="text" name="RPE" id="RPE" value="{{$validacion->RPE}}" hidden="true">
            <?php $content = DB::table("empleados")
            ->select("empleados.nombre", "empleados.apellidopaterno", "empleados.apellidomaterno")
            ->where("empleados.rpe", "=", $validacion->RPE)
            ->get();
           ?>
            @foreach ($content as $key)
            <input type="text" name="nombreUsuario" id="nombreUsuario" value="{{$key->nombre}} {{$key->apellidopaterno}} {{$key->apellidomaterno}}" hidden="true">
            
            @endforeach
            <input type="text" name="Nombre" id="Nombre" value="{{$validacion->Nombre}}" hidden="true">
            <input type="text" name="Descripcion" id="Descripcion" value="{{$validacion->Descripcion}}" hidden="true">
            <input type="text" name="FechaInicio" id="FechaInicio" value="{{$validacion->FechaInicio}}" hidden="true">
            <input type="text" name="FechaFin" id="FechaFin" value="{{$validacion->FechaFin}}" hidden="true">
            {{-- <input type="text" name="autoriza_email" id="autoriza_email" value="{{$user->email}}" hidden="true"> --}}
            <input type="text" name="rechaza_email" id="rechaza_email" value="{{$user->email}}" hidden="true">
            <input type="text" name="periodo" id="periodo" value="{{$validacion->periodo}}" hidden="true">
            <td><button class="btn btn-sm btn-danger row justify-content-between">Rechazar</button></td>
        </form>
    </tr>
        @endif
    @endforeach
    
    </tbody>
    <div class="d-flex justify-content-end">
        {{-- {{$validaciones->links()}} --}}
    </div>
    
</table>


@endsection

