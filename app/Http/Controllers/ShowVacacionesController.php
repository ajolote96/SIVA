<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DiaFeriado;
use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\Vacaciones;
use App\Models\Solicitud;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\Session;

class ShowVacacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        


        $solicitud = Empleado::query()->where('CorreoElectronico','=',$user->email)
            // ->select('*')->where('RPE','=','TF567')
            ->first();

        $validaciones = Vacaciones::all();

        $nombres = DB::table('empleados')->join('solicitudes','empleados.RPE', '=', 'solicitudes.RPE')->select('empleados.*')->get()->all();
        $relacion_sec = DB::table("empleados")
            ->join("solicitudes", function($join){
                $join->on("empleados.correoelectronico", "=", "solicitudes.autoriza_email");
            })
            ->select("empleados.nombre", "empleados.apellidopaterno", "empleados.apellidomaterno", "empleados.correoelectronico")
            ->get();

        $relacion_jefe = DB::table("empleados")
            ->join("solicitudes", function($join){
                $join->on("empleados.correoelectronico", "=", "solicitudes.autoriza_email");
            })
            ->select("empleados.nombre", "empleados.apellidopaterno", "empleados.apellidomaterno", "empleados.correoelectronico")
            ->get();


            $relacion_sec_rech = DB::table("empleados")
            ->join("solicitudes", function($join){
                $join->on("empleados.correoelectronico", "=", "solicitudes.rechaza_email");
            })
            ->select("empleados.nombre", "empleados.apellidopaterno", "empleados.apellidomaterno", "empleados.correoelectronico")
            ->get();

        $relacion_jefe_rech = DB::table("empleados")
            ->join("solicitudes", function($join){
                $join->on("empleados.correoelectronico", "=", "solicitudes.rechaza_email");
            })
            ->select("empleados.nombre", "empleados.apellidopaterno", "empleados.apellidomaterno", "empleados.correoelectronico")
            ->get();

            
           
        return view('show.index', compact('user','validaciones', 'nombres','solicitud', 'relacion_sec','relacion_jefe','relacion_sec_rech','relacion_jefe_rech'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        /////SI SECRETARIO

       // $encontrar = Vacaciones::find($id);

        //return view('vacaciones.show', compact('encontrar'));

         //SI JEFE DE LUGAR DE TRABAJO
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $vacacionesAux = Vacaciones::find($id);

        return view('vacaciones.index', compact('vacacionesAux'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $vacaciones = Vacaciones::find($id);
        //$vacaciones->update($request->all());
        $vacaciones->RPE = $request->RPE;
        $vacaciones->Nombre = $request->Nombre;
        $vacaciones->Descripcion = $request->Descripcion;
        $vacaciones->FechaInicio = $request->FechaInicio;
        $vacaciones->FechaFin = $request->FechaFin;
        $consulta_verificar = DB::table("model_has_roles")
        ->join("users", function($join){
            $join->on("users.id", "=", "model_has_roles.model_id")
            ->where("users.email", "=",  Auth::user()->email);
        })
        ->select("model_has_roles.role_id")
        ->get();

        foreach ($consulta_verificar as $role_id => $key) {
            if($key->role_id == 2 ){
                $vacaciones->autoriza_sec = '1';
            }
            else if($key->role_id == 3){
             $vacaciones->autoriza_jefe = '1';
         }else{
             //
         }
        }

        // if($consulta_verificar->role_id == 2)
        //     $vacaciones->autoriza_sec = '1';
        // else if($consulta_verificar->role_id == 3){
        //     $vacaciones->autoriza_jefe = '1';
        // }else{
        //     //
        // }

        //$vacaciones->autoriza_jefe = '1';
        $vacaciones->autoriza_email = $request->autoriza_email;

        $vacaciones->save();
        //return redirect()->route('vacaciones.index');
        //Session::flash('message', 'This is a message!');
        return redirect()->route('vacaciones.index')->with('success', 'Solicitud autorizada');
    }



    /**
     * Remove the specified resource from storage.
     *@param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $vacaciones = Vacaciones::find($id);

        $vacaciones->RPE = $request->RPE;
        $vacaciones->Nombre = $request->Nombre;
        $vacaciones->Descripcion = $request->Descripcion;
        $vacaciones->FechaInicio = $request->FechaInicio;
        $vacaciones->FechaFin = $request->FechaFin;
        $consulta_verificar = DB::table("model_has_roles")
        ->join("users", function($join){
            $join->on("users.id", "=", "model_has_roles.model_id")
            ->where("users.email", "=",  Auth::user()->email);
        })
        ->select("model_has_roles.role_id")
        ->get();

        foreach ($consulta_verificar as $role_id => $key) {
            if($key->role_id == 2 ){
                $vacaciones->rechaza_sec = '1';
            }
            else if($key->role_id == 3){
             $vacaciones->rechaza_jefe = '1';
         }else{
            
         }
        }

        // if($consulta_verificar->role_id == 2)
        //     $vacaciones->autoriza_sec = '1';
        // else if($consulta_verificar->role_id == 3){
        //     $vacaciones->autoriza_jefe = '1';
        // }else{
        //     //
        // }

        //$vacaciones->autoriza_jefe = '1';
        $vacaciones->rechaza_email = $request->rechaza_email;

        $vacaciones->save();
        //

        //$vacaciones->delete();
       // Session::flash('message', 'This is a message destoy!');
        return back()->with('delete', 'Solicitud rechazada');
    }

    /** 
    * @param  \Illuminate\Http\Request  $request
    * @param  int $id
    * @return \Illuminate\Http\Response
    */

    public function rechazar(Request $request, $id){
        $vacaciones = Vacaciones::find($id);

        $vacaciones->RPE = $request->RPE;
        $vacaciones->Nombre = $request->Nombre;
        $vacaciones->Descripcion = $request->Descripcion;
        $vacaciones->FechaInicio = $request->FechaInicio;
        $vacaciones->FechaFin = $request->FechaFin;
        $consulta_verificar = DB::table("model_has_roles")
        ->join("users", function($join){
            $join->on("users.id", "=", "model_has_roles.model_id")
            ->where("users.email", "=",  Auth::user()->email);
        })
        ->select("model_has_roles.role_id")
        ->get();

        foreach ($consulta_verificar as $role_id => $key) {
            if($key->role_id == 2 ){
                $vacaciones->rechaza_sec = '1';
            }
            else if($key->role_id == 3){
             $vacaciones->rechaza_jefe = '1';
         }else{
            
         }
        }

        // if($consulta_verificar->role_id == 2)
        //     $vacaciones->autoriza_sec = '1';
        // else if($consulta_verificar->role_id == 3){
        //     $vacaciones->autoriza_jefe = '1';
        // }else{
        //     //
        // }

        //$vacaciones->autoriza_jefe = '1';
        $vacaciones->rechaza_email = $request->rechaza_email;

        $vacaciones->save();
        //return redirect()->route('vacaciones.index');
        //Session::flash('message', 'This is a message!');
        return back()->with('delete', 'Solicitud rechazada');
        
    }

}
