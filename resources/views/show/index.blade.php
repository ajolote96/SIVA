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


@if (session('mensaje'))
    <div class="alert alert-success" role="alert">
        <strong>Aviso</strong> {{session('mensaje')}}
        <button type="button" class="close" data-dismiss="alert" alert-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<!--Autorizadas----------------------------------------------------------------------->

<h2>Solicitudes autorizadas por el secretario </h2>
<table class="table table-bordered table-hover table-sortable text-center" id="datatable1">

    <thead class="table-dark" style="background-color:rgb(42, 122, 5)">

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
    <th class="text-center">Nombre de quién autoriza</th>
    </tr>
    <tbody>

   @foreach ($validaciones as $validacion)
       @if($validacion->autoriza_sec == 1)
           <tr>
               <td>{{$validacion->RPE}}</td>
               <?php $content = DB::table("empleados")
        ->select("empleados.nombre", "empleados.apellidopaterno", "empleados.apellidomaterno")
        ->where("empleados.rpe", "=", $validacion->RPE)
        ->get();
       ?>
        @foreach ($content as $key)
        <td>{{$key->nombre}} {{$key->apellidopaterno}} {{$key->apellidomaterno}}</td>
        @endforeach
               <td>{{$validacion->Nombre}}</td>
               <td>{{$validacion->Descripcion}}</td>
               <td>{{\Carbon\Carbon::parse($validacion->FechaInicio)->format('d/m/Y')}}</td>
               <td>{{\Carbon\Carbon::parse($validacion->FechaFin)->format('d/m/Y')}}</td>
               @foreach ($relacion_sec as $object)
                   @if($validacion->autoriza_email == $object->correoelectronico )
                       <td>{{$object->nombre}} {{$object->apellidopaterno}} {{$object->apellidomaterno}}</td>
                       @break
                   @endif
               @endforeach


           </tr>
       @endif
    @endforeach
    
    </tbody>
    <div class="d-flex justify-content-end">
        
    </div>
</table>


<h2>Solicitudes autorizadas por el jefe de lugar de trabajo </h2>
<table class="table table-bordered table-hover table-sortable text-center" id="datatable2">

    <thead class="table-dark" style="background-color:rgb(42, 122, 5)">

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
    <th class="text-center">Nombre de quién autoriza</th>
    </tr>
    <tbody>
    @foreach ($validaciones as $validacion)
        @if($validacion->autoriza_jefe == 1)
            <tr>
                <td>{{$validacion->RPE}}</td>
                <?php $content = DB::table("empleados")
        ->select("empleados.nombre", "empleados.apellidopaterno", "empleados.apellidomaterno")
        ->where("empleados.rpe", "=", $validacion->RPE)
        ->get();
       ?>
        @foreach ($content as $key)
        <td>{{$key->nombre}} {{$key->apellidopaterno}} {{$key->apellidomaterno}}</td>
        @endforeach
                <td>{{$validacion->Nombre}}</td>
                <td>{{$validacion->Descripcion}}</td>
                <td>{{\Carbon\Carbon::parse($validacion->FechaInicio)->format('d/m/Y')}}</td>
                <td>{{\Carbon\Carbon::parse($validacion->FechaFin)->format('d/m/Y')}}</td>
                @foreach ($relacion_jefe as $object2)
                    @if($validacion->autoriza_email == $object2->correoelectronico )
                        <td>{{$object2->nombre}} {{$object2->apellidopaterno}} {{$object2->apellidomaterno}}</td>
                        @break
                    @endif
                @endforeach
            </tr>
        @endif
    @endforeach

    
    </tbody>
    <div class="d-flex justify-content-end">
        
    </div>
</table>



<!--RECHAZOS ---------------------------------------------->


<h2>Solicitudes rechazadas por el secretario </h2>
<table class="table table-bordered table-hover table-sortable text-center" id="datatable3">

    <thead class="table-dark" style="background-color:rgb(207, 59, 59)">

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
    <th class="text-center">Nombre de quién rechaza</th>
    </tr>
    <tbody>

   @foreach ($validaciones as $validacion)
       @if($validacion->rechaza_sec == 1)
           <tr>
               <td>{{$validacion->RPE}}</td>
               <?php $content = DB::table("empleados")
        ->select("empleados.nombre", "empleados.apellidopaterno", "empleados.apellidomaterno")
        ->where("empleados.rpe", "=", $validacion->RPE)
        ->get();
       ?>
        @foreach ($content as $key)
        <td>{{$key->nombre}} {{$key->apellidopaterno}} {{$key->apellidomaterno}}</td>
        @endforeach
               <td>{{$validacion->Nombre}}</td>
               <td>{{$validacion->Descripcion}}</td>
               <td>{{\Carbon\Carbon::parse($validacion->FechaInicio)->format('d/m/Y')}}</td>
               <td>{{\Carbon\Carbon::parse($validacion->FechaFin)->format('d/m/Y')}}</td>
               @foreach ($relacion_sec_rech as $object)
                   @if($validacion->rechaza_email == $object->correoelectronico )
                       <td>{{$object->nombre}} {{$object->apellidopaterno}} {{$object->apellidomaterno}}</td>
                       @break
                   @endif
               @endforeach


           </tr>
       @endif
    @endforeach

    </tbody>
    <div class="d-flex justify-content-end">
       
    </div>
</table>


<h2>Solicitudes rechazadas por el jefe de lugar de trabajo </h2>
<table class="table table-bordered table-hover table-sortable text-center" id="datatable4">

    <thead class="table-dark" style="background-color:rgb(207, 59, 59)">

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
    <th class="text-center">Nombre de quién rechaza</th>
    </tr>
    <tbody>
    @foreach ($validaciones as $validacion)
        @if($validacion->rechaza_jefe == 1)
            <tr>
                <td>{{$validacion->RPE}}</td>
                <?php $content = DB::table("empleados")
        ->select("empleados.nombre", "empleados.apellidopaterno", "empleados.apellidomaterno")
        ->where("empleados.rpe", "=", $validacion->RPE)
        ->get();
       ?>
        @foreach ($content as $key)
        <td>{{$key->nombre}} {{$key->apellidopaterno}} {{$key->apellidomaterno}}</td>
        @endforeach
                <td>{{$validacion->Nombre}}</td>
                <td>{{$validacion->Descripcion}}</td>
                <td>{{\Carbon\Carbon::parse($validacion->FechaInicio)->format('d/m/Y')}}</td>
                <td>{{\Carbon\Carbon::parse($validacion->FechaFin)->format('d/m/Y')}}</td>
                @foreach ($relacion_jefe_rech as $object2)
                    @if($validacion->rechaza_email == $object2->correoelectronico )
                        <td>{{$object2->nombre}} {{$object2->apellidopaterno}} {{$object2->apellidomaterno}}</td>
                        @break
                    @endif
                @endforeach
            </tr>
        @endif
    @endforeach


    </tbody>
    <div class="d-flex justify-content-end">
         
    </div>
</table>

@endsection


@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#datatable1').DataTable();
        $('#datatable2').DataTable();
        $('#datatable3').DataTable();
        $('#datatable4').DataTable();
    </script>
@endsection
