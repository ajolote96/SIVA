@extends('adminlte::page')
@section('title', 'SIPSUTERMCFE')
@section('content_header')


@section('css')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}"/>
<link rel="preconnect" href="{{asset('https://fonts.googleapis.com')}}" />
<link rel="preconnect" href="{{asset('https://fonts.gstatic.com')}}" crossorigin />


@section('javascripts')
    <script src="<?php echo asset('js/validaciones.js') ?>"></script>
    <script type="text/javascript" src=<?php echo asset('https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js') ?>></script>

@show

<style>
    .table-sortable tbody tr {
    cursor: move;
}
</style>
@endsection



@section('title', 'SIPSUTERMCFE')


    <h1>Registro de Vacaciones Empleados</h1><br/>




<?php


use Carbon\Carbon;
$dbDate = \Carbon\Carbon::parse($solicitud->FechaIngreso);
$diffYears = \Carbon\Carbon::now()->diffInYears($dbDate);

//$diferencia_dias = 0;
$days = 0;
$dbDateRPE = $solicitud->RPE;

$content = DB::table("solicitudes")
            ->select("solicitudes.FechaInicio", "solicitudes.FechaFin")
            ->where("solicitudes.RPE", "=", $solicitud->RPE)
            ->get();

foreach ($content as $key) {

    $fecha_inicial = \Carbon\Carbon::parse($key->FechaInicio);
    $fecha_final = \Carbon\Carbon::parse($key->FechaFin);


    $start = new DateTime($fecha_inicial);
            $end = new DateTime($fecha_final);

            //de lo contrario, se excluye la fecha de finalización (¿error?)
            $end->modify('+1 day');
    
            $interval = $end->diff($start);
    
            // total dias
            $days = $days + $interval->days;
    
            // crea un período de fecha iterable (P1D equivale a 1 día)
            $period = new DatePeriod($start, new DateInterval('P1D'), $end);
    
            // almacenado como matriz, por lo que puede agregar más de una fecha feriada
            //FECHAS FERIADAS, AGREGAR MÁS SI ES NECESARIO
            $holidays = array('2012-09-07');
    
            foreach($period as $dt) {
                $curr = $dt->format('D');

                // obtiene si es Sábado o Domingo
                if($curr == 'Sat' || $curr == 'Sun') {
                    $days--;
                }elseif (in_array($dt->format('Y-m-d'), $holidays)) {
                    $days--;
                }
            }


    //$diferencia_dias += $fecha_inicial->diffInDays($fecha_final)-1;
}

    if($days == 0){
        $diasHabiles = 0;
    }


    $diasHabiles = 0;
if($diffYears == 0){
    echo "No tienes dias disponibles";
}
elseif ($diffYears == 1) {
    $diasHabiles = 12 - $days;
   if($diasHabiles <= 0){
       $diasHabiles = 0;
   }
}
elseif ($diffYears == 2) {
    $diasHabiles = 17 - $days;
    if($diasHabiles <= 0){
       $diasHabiles = 0;
   }
   
}
elseif ($diffYears >= 3 AND $diffYears <= 5) {
    $diasHabiles = 20 - $days;
    if($diasHabiles <= 0){
       $diasHabiles = 0;
   }
    //echo "5 días habiles";
    //Se hace de 3 a 5 y no comtemplando 6 a 9 por si se necesita calcular el pago adicional
}
elseif ($diffYears >= 6 && $diffYears <= 9) {
    $diasHabiles = 20 - $days;
    if($diasHabiles <= 0){
       $diasHabiles = 0;
   }    
  //Se hace de 3 a 5 y no comtemplando 6 a 9 por si se necesita calcular el pago adicional
}
elseif ($diffYears >= 10 && $diffYears <= 20) {
    $diasHabiles = 24 - $days;
    if($diasHabiles <= 0){
       $diasHabiles = 0;
   }      
    //Se hace de 3 a 5 y no comtemplando 6 a 9 por si se necesita calcular el pago adicional
}
elseif ($diffYears >= 21 && $diffYears <= 24) {
    $diasHabiles = 24 - $days;  
    if($diasHabiles <= 0){
       $diasHabiles = 0;
   }
     //Se hace de 3 a 5 y no comtemplando 6 a 9 por si se necesita calcular el pago adicional
}
elseif ($diffYears >= 25) {
    $diasHabiles = 24 - $days;
    if($diasHabiles <= 0){
       $diasHabiles = 0;
   }        
      //Se hace de 3 a 5 y no comtemplando 6 a 9 por si se necesita calcular el pago adicional
}else{
    echo "Error";
}   
 


// if($diasHabiles <= 0){
//     Session::forget('pendientes');
// }

 

$agendarTiempoFin = \Carbon\Carbon::now()->format('d-m-Y');
$ano = \Carbon\Carbon::now()->format('Y');
$dia = "15-12-";
$disabled = 'enabled';
for($a=0; $a<=15; $a++){
    $diaR = $a."-12-".$ano;
    if($agendarTiempoFin.$ano != $diaR){
          $disabled = 'disabled';
          break;
}
}
?>

<div class="alert alert-success text-center" role="alert">
    <?php echo "¡Tienes ",  $diasHabiles, " días hábiles de vacaciones!"; ?>
</div>

<br>
    <p id="pDias">Recuerda que cuentas con <strong>4 periodos</strong> como maximo para agendar tus <strong><?php echo $diasHabiles ?> dias </strong>disponibles.</p>



 <div class="container">
    @if (session('mensaje'))
        <div class="alert alert-success" role="alert">
            <strong>Aviso</strong> {{session('mensaje')}}
            <button type="button" class="close" data-dismiss="alert" alert-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <h2 id="registroh2">Registro de Vacaciones</h2>
    <br>


<form action="{{route('solicitud.store')}}" method="post" id="formularioX">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-md-12 table-responsive">
                        <input type="text" hidden="hidden" id="diasHabiles" value="{{$diasHabiles}}">
                        <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                            <thead class="table-dark" style="background-color:rgb(42, 122, 5)">
                                <tr >
                                    <th class="text-center">
                                        RPE
                                    </th>
                                    <th class="text-center">
                                        Periodo
                                    </th>
                                    <th class="text-center">
                                        Fecha de Inicio
                                    </th>
                                    <th class="text-center">
                                        Fecha de Final
                                    </th>
                                    <th class="text-center">
                                        Descripcion
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" name="RPE" id="RPE" value="{{$solicitud->RPE}}">
                                    </td>
                                    <td>
                                        <select class="form-control" name="Nombre" id="Nombre" required>
                                            <option selected disabled>-- Selecciona --</option>
                                            <option value="Primer Periodo">Primer Periodo</option>
                                            <option value="Segundo Periodo">Segundo Periodo</option>
                                            <option value="Tercer Periodo">Tercer Periodo</option>
                                            <option value="Cuarto Periodo">Cuarto Periodo</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="date" class="form-control" name="FechaInicio" id="FechaInicio" onchange="var diasPas = diasPasados();"> 
                                    </td>
                                    <td>
                                        <input type="date" class="form-control" name="FechaFin" id="FechaFin" class="FechaFin" value=""  Onchange="var diasDif = myFunction({{$diasHabiles}}); console.log(diasDif);
                                        if(diasDif <= {{$diasHabiles}}){alert('!Los días que elegiste están disponibles!'); 
                                    }else{alert('No puedes elegir más días de los correspondientes')}"> 
                                    </td>
                                    <td>
                                        <textarea name="Descripcion" placeholder="Description" class="form-control" id="Descripcion"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--Poner en onChange funcion emailJs para los correos-->
                <button type="submit" class="btn btn-sm btn-success" id="save">Guardar</button>
            </div>
        </div>
    </div>

</form>

<?php

if($diasHabiles == 0){
    echo '<script type="text/javascript">',
     'esconderBoton();',
     '</script>';
}

?>




@endsection
