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
    <script type="text/javascript" src=<?php echo asset('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js') ?>></script>
    <script type="text/javascript" src=<?php echo asset('https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js') ?>></script>

@show

<style>
    .table-sortable tbody tr {
    cursor: move;
}
</style>
@endsection



@section('title', 'SIPSUTERMCFE')


    <h1 id="titulo">Registro de Vacaciones Empleados</h1><br/>

<?php


use Carbon\Carbon;
$dbDate = \Carbon\Carbon::parse($solicitud->FechaIngreso);
//$diffYears = \Carbon\Carbon::now()->diffInYears($dbDate);
$d=0;
$days = 0;
$dbDateRPE = $solicitud->RPE;

$periodos = DB::table('periodos')
            ->select('periodos.FechaInicio', 'periodos.FechaFin')
            ->get();

foreach ($periodos as $key) {
            $ini = $key->FechaInicio;
            $fin = $key->FechaFin;
            $hoy = date("Y-m-d");


            //$array = array($ini, $fin, $hoy);

            //dd($array);

            //dd($periodo);
            
                if ($hoy >= $ini && $hoy <= $fin) {
                    $d = 1;
                    
                } else {
                    $d = 0;
                }

            

}


$feriado = DB::table('dia_feriados')
            ->select("dia_feriados.Fecha")
            ->get();
        

$content = DB::table("dias_periodos")
            ->select("dias_periodos.Dias_Disponibles_22", "dias_periodos.Dias_Estimados_22", "dias_periodos.Fecha_ingreso")
            ->where("dias_periodos.RPE", "=", $solicitud->RPE)
            ->get();

$solicita = DB::table("solicitudes")
            ->select("*")
            ->where("solicitudes.RPE", "=", $solicitud->RPE)
            ->get();

        $days = 0;

        $fecha_ing;
        foreach ($content as $key) {
            $fecha_ing = $key->Fecha_ingreso;
        }

        //dd($fecha_ing);

        $diasHabiles22 = 0;
         $diasEstimados22 = 0;
         $fechaIngreso = 0;

         foreach ($content as $key) {
        $diasHabiles22 = $key->Dias_Disponibles_22;
        $diasEstimados22 = $key->Dias_Estimados_22;
        $fechaIngreso = $key->Fecha_ingreso;
    }


        
    foreach ($solicita as $key) {

        if($key->periodo == 'actual'){
            $fecha_inicial = \Carbon\Carbon::parse($key->FechaInicio);
$fecha_final = \Carbon\Carbon::parse($key->FechaFin);

// $anho_actual = Carbon::now();
// $nueva = \Carbon\Carbon::createFromFormat('d/m/Y', $fecha_ing)->format('d-m-Y');
// $aux = Carbon::parse($nueva);
// $yearActual = $anho_actual->year;
// $yearStart = $aux->year;
// $diferencia = $yearActual - $yearStart;
// $nuevaFecha = $aux->addYears($diferencia + 1);


    foreach ($feriado as $key) {          
    $feri = ($key->Fecha);
}

$f = new DateTime($feri);
//dd($f);

        $start = new DateTime($fecha_inicial);
        $end = new DateTime($fecha_final);

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
        $diasHabiles22 = $diasHabiles22 - $days;
}
        else{
            $fecha_inicial = \Carbon\Carbon::parse($key->FechaInicio);
$fecha_final = \Carbon\Carbon::parse($key->FechaFin);

// $anho_actual = Carbon::now();
// $nueva = \Carbon\Carbon::createFromFormat('d/m/Y', $fecha_ing)->format('d-m-Y');
// $aux = Carbon::parse($nueva);
// $yearActual = $anho_actual->year;
// $yearStart = $aux->year;
// $diferencia = $yearActual - $yearStart;
// $nuevaFecha = $aux->addYears($diferencia + 1);


    foreach ($feriado as $key) {          
    $feri = ($key->Fecha);
}

$f = new DateTime($feri);
//dd($f);

        $start = new DateTime($fecha_inicial);
        $end = new DateTime($fecha_final);

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
        $diasEstimados22 = $diasEstimados22 - $days;
}

        }







 

//$diasHabiles22 -= $days;
//$diasEstimados22 -= $days2;

// if($diffYears == 0){
//     echo "No tienes dias disponibles";
// }
// elseif ($diffYears == 1) {
//     $diasHabiles = 12 - $days;
//    if($diasHabiles <= 0){
//        $diasHabiles = 0;
//    }
// }
// elseif ($diffYears == 2) {
//     $diasHabiles = 17 - $days;
//     if($diasHabiles <= 0){
//        $diasHabiles = 0;
//    }
   
// }
// elseif ($diffYears >= 3 AND $diffYears <= 5) {
//     $diasHabiles = 20 - $days;
//     if($diasHabiles <= 0){
//        $diasHabiles = 0;
//    }
//     //echo "5 días habiles";
//     //Se hace de 3 a 5 y no comtemplando 6 a 9 por si se necesita calcular el pago adicional
// }
// elseif ($diffYears >= 6 && $diffYears <= 9) {
//     $diasHabiles = 20 - $days;
//     if($diasHabiles <= 0){
//        $diasHabiles = 0;
//    }    
//   //Se hace de 3 a 5 y no comtemplando 6 a 9 por si se necesita calcular el pago adicional
// }
// elseif ($diffYears >= 10 && $diffYears <= 20) {
//     $diasHabiles = 24 - $days;
//     if($diasHabiles <= 0){
//        $diasHabiles = 0;
//    }      
//     //Se hace de 3 a 5 y no comtemplando 6 a 9 por si se necesita calcular el pago adicional
// }
// elseif ($diffYears >= 21 && $diffYears <= 24) {
//     $diasHabiles = 24 - $days;  
//     if($diasHabiles <= 0){
//        $diasHabiles = 0;
//    }
//      //Se hace de 3 a 5 y no comtemplando 6 a 9 por si se necesita calcular el pago adicional
// }
// elseif ($diffYears >= 25) {
//     $diasHabiles = 24 - $days;
//     if($diasHabiles <= 0){
//        $diasHabiles = 0;
//    }        
//       //Se hace de 3 a 5 y no comtemplando 6 a 9 por si se necesita calcular el pago adicional
// }else{
//     echo "Error";
// }   
 


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

<div class="alert alert-success text-center" role="alert" id="p">
    <?php echo "Tienes ",  $diasHabiles22, " días que puedes disfrutar hasta en 4 periodos durante
    todo el 2022 en caso de que necesites tomar más días podrías agendar hasta ", $diasEstimados22, " días después de tu fecha de ingreso que es ", $fechaIngreso, " que corresponde del periodo 2022 al 2023"; ?>
</div>

<br>
    {{-- <p id="pDias">Recuerda que cuentas con <strong>4 periodos</strong> como maximo para agendar tus <strong><?php echo $diasHabiles ?> dias </strong>disponibles.</p> --}}


    <h2 id="peri">Periodo actual</h2>

 <div class="container">
    @if (session('mensaje'))
        <div class="alert alert-success" role="alert">
            <strong>Aviso</strong> {{session('mensaje')}}
            <button type="button" class="close" data-dismiss="alert" alert-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



<form action="{{route('solicitud.store')}}" method="post" id="formularioActual">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-md-12 table-responsive">
                        <input type="text" hidden="hidden" id="diasHabiles" value="{{$diasHabiles22}}">
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
                                        <input type="date" class="form-control" name="FechaFin" id="FechaFin" class="FechaFin" value=""  Onchange="var diasDif = myFunction({{$diasHabiles22}}); console.log(diasDif);
                                        if(diasDif <= {{$diasHabiles22}}){alert('!Los días que elegiste están disponibles!'); 
                                    }else{alert('No puedes elegir más días de los correspondientes')}"> 
                                    </td>
                                    <td>
                                        <textarea name="Descripcion" placeholder="Description" class="form-control" id="Descripcion" required></textarea>
                                    </td>
                                    <td>
                                        <input type="text" hidden="hidden" class="form-control" name="periodo1" id="periodo1" value="actual"> 
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





<h2 id="periodo22" hidden="hidden">Periodo 2022-2023</h2>

<div class="container">
    @if (session('mensaje2'))
        <div class="alert alert-success" role="alert">
            <strong>Aviso</strong> {{session('mensaje2')}}
            <button type="button" class="close" data-dismiss="alert" alert-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

<form action="{{route('solicitud.store')}}" method="post" id="formulario22" hidden="hidden">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-md-12 table-responsive">
                        <input type="text" hidden="hidden" id="diasHabiles2" value="{{$diasEstimados22}}">
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
                                        <input type="text" class="form-control" name="RPE2" id="RPE2" value="{{$solicitud->RPE}}">
                                    </td>
                                    <td>
                                        <select class="form-control" name="Nombre2" id="Nombre2" required>
                                            <option selected disabled>-- Selecciona --</option>
                                            <option value="Primer Periodo">Primer Periodo</option>
                                            <option value="Segundo Periodo">Segundo Periodo</option>
                                            <option value="Tercer Periodo">Tercer Periodo</option>
                                            <option value="Cuarto Periodo">Cuarto Periodo</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="date" class="form-control" name="FechaInicio2" id="FechaInicio2" onchange="diasPasados2('{{$fechaIngreso}}');"> 
                                    </td>
                                    <td>
                                        <input type="date" class="form-control" name="FechaFin2" id="FechaFin2" class="FechaFin2" value=""  Onchange="var diasDif2 = myFunction2({{$diasEstimados22}}); console.log(diasDif2);
                                        if(diasDif2 <= {{$diasEstimados22}}){alert('!Los días que elegiste están disponibles!'); 
                                    }else{alert('No puedes elegir más días de los correspondientes')}"> 
                                    </td>
                                    <td>
                                        <textarea name="Descripcion2" placeholder="Descripcion" class="form-control" id="Descripcion2"></textarea>
                                    </td>
                                    <input type="text" hidden="hidden" class="form-control" name="periodo2" id="periodo2" value="posterior"> 
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


if($d == 0){
    echo '<script type="text/javascript">',
     'esconderperiodos();',
     '</script>';
    echo '<h2 style="color:red;">Modulo de registrar vacaciones deshabilitado</h2>';
}

if($diasHabiles22 == 0){
    echo '<script type="text/javascript">',
     'esconderBoton();',
     '</script>';
}

if($diasEstimados22 == 0){
    echo '<script type="text/javascript">',
     'esconderBoton2();',
     '</script>';
}


?>




@endsection
