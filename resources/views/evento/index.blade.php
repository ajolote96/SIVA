
@extends('layouts.app')
@section('content')

@extends('adminlte::page')
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
@section('title', 'SIPSUTERMCFE')
{{--
<?php echo Carbon\Carbon::parse(DB::table('eventos')->find(1)->created_at)->toCookieString(); ?>  --}}

@section('content_header')

{{-- <?php

$content = DB::table("dias_periodos")
            ->select("dias_periodos.Dias_Disponibles_22", "dias_periodos.Dias_Estimados_22", "dias_periodos.Fecha_ingreso")
            ->where("dias_periodos.RPE", "=", $solicitud->RPE)
            ->get();

?> --}}



@foreach($almacenados as $almacenado)
  <table>
      <tr>
      <td><input type="text" hidden="hidden" id="idSolic" value="{{$almacenado->id}}"></td>
      <td><input type="text" hidden="hidden" id="RPESolic" value="{{$almacenado->RPE}}"></td>
      <td><input type="text" hidden="hidden" id="nombreSolic" value="{{$almacenado->Nombre}}"></td>
      <td><input type="text" hidden="hidden" id="descSolic" value="{{$almacenado->Descripcion}}"></td>
      <td><input type="text" hidden="hidden" id="oculto" value="{{$almacenado->FechaInicio}}"></td>
      <td><input type="text" hidden="hidden" id="oculto2" value="{{$almacenado->FechaFin}}"></td>
  </tr>
</table>

  @endforeach


  <table class="table table-bordered table-hover table-sortable text-center" id="tab_logic">
    <thead class="table-dark" style="background-color:rgb(42, 122, 5)">
    <th class="text-center">Periodo</th>
    <th class="text-center">Descripcion</th>
    <th class="text-center">Fecha Inicio</th>
    <th class="text-center">Fecha Fin</th>
    <th class="text-center">Dias agendados</th>
    <th class="text-center">Status</th>
    </tr>
    <tbody>
        @foreach ($almacenados as $almacenado)
        <tr>
            <td>{{$almacenado->Nombre}}</td>
            <td>{{$almacenado->Descripcion}}</td>

              <td>{{\Carbon\Carbon::parse($almacenado->FechaInicio)->format('d/m/Y')}}</td>
            <td>{{\Carbon\Carbon::parse($almacenado->FechaFin)->format('d/m/Y')}}</td>
            
            <?php
            //  $var1 = \Carbon\Carbon::createFromDate($almacenado->FechaInicio);
            //  $cDate = \Carbon\Carbon::parse($almacenado->FechaFin);

             $start = new DateTime($almacenado->FechaInicio);
            $end = new DateTime($almacenado->FechaFin);

        //de lo contrario, se excluye la fecha de finalización (¿error?)
        $end->modify('+1 day');

        $interval = $end->diff($start);

        // total dias
        $days = $interval->days;

        // crea un período de fecha iterable (P1D equivale a 1 día)
        $period = new DatePeriod($start, new DateInterval('P1D'), $end);

        // almacenado como matriz, por lo que puede agregar más de una fecha feriada
        //FECHAS FERIADAS, AGREGAR MÁS SI ES NECESARIO
        
            $holidays = ['2023-05-22'];
            //$holidays = array($feri);
            //dd($feri);
            //dd($holidays);


        foreach($period as $dt) {
            $curr = $dt->format('D');

            // obtiene si es Sábado o Domingo
            if($curr == 'Sat' || $curr == 'Sun') {
                $days--;
            }elseif (in_array($dt->format('Y-m-d'), $holidays)) {
                $days--;
            }
           
        }

        ?>
      
            <td>{{$days}}</td>
              @if ($almacenado->autoriza_sec == 1 && $almacenado->autoriza_jefe == 1)
              <td>Aceptado</td>
              @elseif ($almacenado->rechaza_sec == 1 || $almacenado->rechaza_jefe==1)
              <td>Rechazado</td>
              @else
              <td>Pendiente</td>
              @endif
          </tr>
        @endforeach
        {{-- 
         // <?php
          // $content = DB::table('solicitudes')
          //   ->select("solicitudes.autoriza_sec", "solicitudes.autoriza_jefe", "solicitudes.rechaza_sec", "solicitudes.rechaza_jefe")
          //   ->where("solicitudes.RPE", "=", $almacenado->RPE)
          //   ->get();

          // foreach($content as $key){
          //   echo '<tr>';
          //   $a_sec = $key->autoriza_sec;
          //   $a_jefe = $key->autoriza_jefe;
          //   $r_sec = $key->rechaza_sec;
          //   $r_jefe = $key->rechaza_jefe;
          //   if ($a_sec== 1 && $a_jefe == 1) {
          //     echo '<td> Autorizado </td>';
          //   } elseif ($r_sec==1 || $r_jefe == 1) {
          //     echo 'Rechazado';
          //   } else {
          //     echo '<td> else </td>';
          //   }
          //   echo '</tr>';
          // }
          
          //   //dd($content);

          // ?>
          
          --}}
         
    
    </tbody>
</table>


@endsection




<div class="container">
    <div id="agenda">
    </div>
</div>







<!-- Modal -->
<div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Datos del evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">


            <form action="" id="formularioEventos">

            {!! csrf_field() !!}

            <div class="form-group d-none">
              <label for="id">ID:</label>
              <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted"></small>
            </div>

            <div class="form-group">
              <label for="title">Titulo del evento</label>
              <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Escribe el titulo del evento">
              <small id="helpId" class="form-text text-muted"></small>
            </div>

            <div class="form-group">
              <label for="descripcion">Descripción del evento</label>
              <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
            </div>

            <div class="form-group">
              <label for="start">Fecha de inicio del evento</label>
              <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted"></small>
            </div>

            <div class="form-group">
              <label for="end">Fecha de fin del evento</label>
              <input type="date" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted"></small>
            </div>

            </form>


            </div>
            <div class="modal-footer">

            <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
            <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
            <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>



            </div>
        </div>
    </div>
</div>







@endsection
