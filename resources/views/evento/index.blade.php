

@extends('layouts.app')
@section('content')

@extends('adminlte::page')
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
@section('title', 'SIPSUTERMCFE')
{{--
<?php echo Carbon\Carbon::parse(DB::table('eventos')->find(1)->created_at)->toCookieString(); ?>  --}}

@section('content_header')


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
  @foreach($almacenados as $almacenado)
  <table class="table table-bordered table-hover table-sortable text-center" id="tab_logic">
    <thead class="table-dark" style="background-color:rgb(42, 122, 5)">
    <th class="text-center">Periodo</th>
    <th class="text-center">Descripcion</th>
    <th class="text-center">Fecha Inicio</th>
    <th class="text-center">Fecha Fin</th>
    </tr>
    <tbody>
        @foreach ($almacenados as $almacenado)
        <tr>
            <td>{{$almacenado->Nombre}}</td>
            <td>{{$almacenado->Descripcion}}</td>
            <td>{{\Carbon\Carbon::parse($almacenado->FechaInicio)->format('d/m/Y')}}</td>
            <td>{{\Carbon\Carbon::parse($almacenado->FechaFin)->format('d/m/Y')}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
  @endforeach

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
