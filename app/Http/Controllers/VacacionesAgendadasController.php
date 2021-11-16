<?php

namespace App\Http\Controllers;

use App\Models\VacacionesAgendadas;
use App\Http\Controllers\Controller;
use App\Models\Empleado;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class VacacionesAgendadasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $solicitud = Empleado::query()->where('CorreoElectronico','=',$user->email)
        ->first();
        $vacacionesAgendadas  = Solicitud::query()->where('RPE','=',$solicitud->RPE)->get()->all();
        return view('vacacionesAgendadas.index')->with(["vacacionesAgendadas" =>$vacacionesAgendadas ]);
        //->with(["solicitud" => $solicitud,"vacacionesAgendadas" =>$vacacionesAgendadas ]);
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
     * @param  \App\Models\VacacionesAgendadas  $vacacionesAgendadas
     * @return \Illuminate\Http\Response
     */
    public function show(VacacionesAgendadas $vacacionesAgendadas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VacacionesAgendadas  $vacacionesAgendadas
     * @return \Illuminate\Http\Response
     */
    public function edit(VacacionesAgendadas $vacacionesAgendadas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VacacionesAgendadas  $vacacionesAgendadas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VacacionesAgendadas $vacacionesAgendadas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VacacionesAgendadas  $vacacionesAgendadas
     * @return \Illuminate\Http\Response
     */
    public function destroy(VacacionesAgendadas $vacacionesAgendadas)
    {
        //
    }
}
