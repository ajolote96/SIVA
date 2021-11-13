<?php

namespace App\Http\Controllers;

use App\Models\calendarioPermiso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CalendarioPermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('calendarioPermiso.index');
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
          request()->validate(calendarioPermiso::$rules);
        $calendarioPermiso=calendarioPermiso::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\calendarioPermiso  $calendarioPermiso
     * @return \Illuminate\Http\Response
     */
    public function show(calendarioPermiso $calendarioPermiso)
    {
        //
        $calendarioPermiso = calendarioPermiso::all();
        return response()->json($calendarioPermiso);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\calendarioPermiso  $calendarioPermiso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $calendarioPermiso = calendarioPermiso::find($id);
        $calendarioPermiso->start = Carbon::createFromFormat('Y-m-d H:i:s',$calendarioPermiso->start)->format('Y-m-d');
        $calendarioPermiso->end = Carbon::createFromFormat('Y-m-d H:i:s',$calendarioPermiso->end)->format('Y-m-d');
        return response()->json($calendarioPermiso);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\calendarioPermiso  $calendarioPermiso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, calendarioPermiso $calendarioPermiso)
    {
        //
        request()->validate(calendarioPermiso::$rules);
        $calendarioPermiso->update($request->all());

        return response()->json($calendarioPermiso);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\calendarioPermiso  $calendarioPermiso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $calendarioPermiso = calendarioPermiso::find($id)->delete();
        return response()->json($calendarioPermiso);
        
    }
}
