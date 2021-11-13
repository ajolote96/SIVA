<?php

namespace App\Http\Controllers;

use App\Models\CalendarioEmpleado;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;


class CalendarioEmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('calendarioEmpleado.index');
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
        request()->validate(calendarioEmpleado::$rules);
        $evento=calendarioEmpleado::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\calendarioEmpleado  $calendarioEmpleado
     * @return \Illuminate\Http\Response
     */
    public function show(calendarioEmpleado $calendarioEmpleado)
    {
        //
        $calendarioEmpleado = calendarioEmpleado::all();
        return response()->json($calendarioEmpleado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\calendarioEmpleado  $calendarioEmpleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $evento = calendarioEmpleado::find($id);
        $evento->start = Carbon::createFromFormat('Y-m-d H:i:s',$evento->start)->format('Y-m-d');
        $evento->end = Carbon::createFromFormat('Y-m-d H:i:s',$evento->end)->format('Y-m-d');
        
        return response()->json($evento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CalendarioEmpleado  $calendarioEmpleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CalendarioEmpleado $calendarioEmpleado)
    {
        //
        request()->validate(CalendarioEmpleado::$rules);
        $calendarioEmpleado->update($request->all());

        return response()->json($calendarioEmpleado);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\calendarioEmpleado  $calendarioEmpleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $calendarioEmpleado = calendarioEmpleado::find($id)->delete();
        return response()->json($calendarioEmpleado);
    }
}