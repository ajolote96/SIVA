<?php

namespace App\Http\Controllers;

use App\Models\PorcentajeEmpleado;
use App\Http\Controllers\Controller;
use App\Models\Zona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PorcentajeEmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $cual = "zonas.id_zona";
        $datosempleado = request()->except('_token');
       // $valor = $request->get("buscar");
        $valor = $request->get("porcentajeEmpleadoS");
        if($valor===null){ 
            $valor = "CHAPALA";
        }
        $porcentajes = PorcentajeEmpleado::all();
        $zona = PorcentajeEmpleado::where("zonas.Nombre","LIKE","%$valor%")->select()->get();
        $lugar_trabajo = DB::table('lugar_de_trabajos')->join('zonas','zonas.id_zona','=','lugar_de_trabajos.Id_zona_F')->get();
        $empleado = DB::table('empleados')->join('lugar_de_trabajos','lugar_de_trabajos.id','=','empleados.IdLugarDeTrabajo')->get();
        $solicitud = DB::table('solicitudes')->join('empleados','empleados.RPE','=','solicitudes.RPE')->select()->get();
       
        $consultaPosiciones = PorcentajeEmpleado::join('lugar_de_trabajos','lugar_de_trabajos.Id_zona_F','=','zonas.id_zona')
       ->join('empleados','empleados.IdLugarDeTrabajo','=','lugar_de_trabajos.id')->where("zonas.Nombre","LIKE","%$valor%")->count('empleados.RPE');
       
       $consultaOcupados = PorcentajeEmpleado::join('lugar_de_trabajos','lugar_de_trabajos.Id_zona_F','=','zonas.id_zona')
       ->join('empleados','empleados.IdLugarDeTrabajo','=','lugar_de_trabajos.id')
       ->join('solicitudes','solicitudes.RPE','=','empleados.RPE')
       ->where('solicitudes.autoriza_email','!=','NULL')
       ->where("zonas.Nombre","LIKE","%$valor%")
       ->count('empleados.RPE');
       $cantidadEmpleados = $consultaPosiciones;
        $consultaPosiciones = (15/100)*$consultaPosiciones;
        $consultaPosiciones = round($consultaPosiciones);
        return view('porcentajeEmpleado.index',compact('porcentajes','zona','consultaPosiciones','cantidadEmpleados','consultaOcupados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PorcentajeEmpleado  $porcentajeEmpleado
     * @return \Illuminate\Http\Response
     */
    public function show(PorcentajeEmpleado $porcentajeEmpleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PorcentajeEmpleado  $porcentajeEmpleado
     * @return \Illuminate\Http\Response
     */
    public function edit(PorcentajeEmpleado $porcentajeEmpleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PorcentajeEmpleado  $porcentajeEmpleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PorcentajeEmpleado $porcentajeEmpleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PorcentajeEmpleado  $porcentajeEmpleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(PorcentajeEmpleado $porcentajeEmpleado)
    {
        //
    }
}
