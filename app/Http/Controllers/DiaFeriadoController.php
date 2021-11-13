<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiaFeriado;

class DiaFeriadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diaferiado = DiaFeriado::all(); //Obtenemos todos los dias
        return view('diaferiado.index', compact('diaferiado')); //Que nos retorne la vista con el parametro de diasferiado
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
        $feriado = new DiaFeriado();

        $feriado->Nombre = $request->input('Nombre');
        $feriado->Fecha = $request->input('Fecha');

        $feriado->save();

        return back()->with('mensaje', 'El dia feriado se almaceno correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $diaferiado = DiaFeriado::find($id);

        return view('diaferiado.edit', compact('diaferiado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $diaferiado = DiaFeriado::find($id);
        $diaferiado->update($request->all());



        return redirect()->route('diaferiado.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diaferiado = DiaFeriado::find($id);

        $diaferiado->delete();

        return back();
    }
}
