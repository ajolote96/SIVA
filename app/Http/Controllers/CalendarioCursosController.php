<?php

namespace App\Http\Controllers;

use App\Models\calendarioCursos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CalendarioCursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('calendarioCursos.index');
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
        request()->validate(calendarioCursos::$rules);
        $evento=calendarioCursos::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\calendarioCursos  $calendarioCursos
     * @return \Illuminate\Http\Response
     */
    public function show(calendarioCursos $calendarioCursos)
    {
        //
        $calendarioCursos = calendarioCursos::all();
        return response()->json($calendarioCursos);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\calendarioCursos  $calendarioCursos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $evento = calendarioCursos::find($id);
        $evento->start = Carbon::createFromFormat('Y-m-d H:i:s',$evento->start)->format('Y-m-d');
        $evento->end = Carbon::createFromFormat('Y-m-d H:i:s',$evento->end)->format('Y-m-d');

        return response()->json($evento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\calendarioCursos  $calendarioCursos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, calendarioCursos $calendarioCursos)
    {
        //
        request()->validate(calendarioCursos::$rules);
        $calendarioCursos->update($request->all());
        return response()->json($calendarioCursos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\calendarioCursos  $calendarioCursos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $evento = calendarioCursos::find($id)->delete();
        return response()->json($evento);
    }
}
