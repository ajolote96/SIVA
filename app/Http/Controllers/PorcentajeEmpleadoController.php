<?php

namespace App\Http\Controllers;

use App\Models\PorcentajeEmpleado;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        /*
       $nombreBuscar = 'Sacoalco';
       $nombre = $request->get('porcentajeEmpleado');
       //$porcentajes2[$nombreBuscar] = PorcentajeEmpleado::query()->nombreDepartamento($nombreBuscar);
        //$totalEmpleado = PorcentajeEmpleado::query()->join('lugar__de__trabajos','zonas.id','=','lugar__de__trabajos.Id_zona_F')
        //->join('cat__lugar__de__trabajo__empleados','lugar__de__trabajos.id','=','cat__lugar__de__trabajo__empleados.Id_lugar_de_trabajo_F')->where('zonas.Nombre','LIKE','$nombreBuscar')->count();
        
        //$total = (15*$totalEmpleado)/100;

        //dd($totalEmpleado);
        $porcentajes= PorcentajeEmpleado::all();
        $porcentajes = PorcentajeEmpleado::query()->where('Nombre','LIKE','%Sacoalco%');       
        return view('porcentajeEmpleado.index',compact('porcentajes','porcentajes2'));
        */
        return view('porcentajeEmpleado.index');
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
