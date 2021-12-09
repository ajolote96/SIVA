<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Evento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();


        $result = Empleado::query()->where('CorreoElectronico','=',$user->email)
            // ->select('*')->where('RPE','=','TF567')
            ->first();
        /*$eventos = \DB::table('eventos')
        ->select('title','descripcion','start','end')
        ->get();
        return view('evento.index')->with('eventos',$eventos);*/
        $almacenados = \DB::table('solicitudes')
           ->select()->where('RPE','=',$result->RPE)
           ->get();
       return view('evento.index')->with('almacenados',$almacenados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$almacenados = \DB::table('solicitudes')
            ->select('id','RPE','Nombre','Descripcion','FechaInicio','FechaFin')
            ->get();
        return view('evento.index')->with('solicitudes',$almacenados);*/
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
        request()->validate(Evento::$rules);
        $evento=Evento::create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        //

        $evento = Evento::all();
        return response()->json($evento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $evento = Evento::find($id);

        $evento->start = Carbon::createFromFormat('Y-m-d H:i:s',$evento->start)->format('Y-m-d');
        $evento->end = Carbon::createFromFormat('Y-m-d H:i:s',$evento->end)->format('Y-m-d');


        return response()->json($evento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        //
        request()->validate(Evento::$rules);
        $evento->update($request->all());
        return response()->json($evento);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $evento = Evento::find($id)->delete();
        return response()->json($evento);

    }
}
