<?php

namespace App\Http\Controllers;

use App\Exports\SolicitudExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Auth;

use App\Models\Empleado;
use App\Models\Solicitud;
use App\Http\Controllers\Str;





use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */

    // public function build()
    // {
    //     return $this->view('solicitud.index')
    //         ->with('data', [
    //             'image' => $solicitudes = \DB::table('empleados')
    //             ->select('*')->where('RPE','=','TF567')
    //             ->get(),
    //         ]);
    // }


    public function index()
    {



            // Obtiene el ID del Usuario Autenticado
            $user = Auth::user();
            


        $solicitud = Empleado::query()->where('CorreoElectronico','=',$user->email)
        // ->select('*')->where('RPE','=','TF567')
        ->first();
        return view('solicitud.index')->with('solicitud', $solicitud);






		// $listaSolicitudes=SolicitudController::all();

		// return view('solicitud.index', array('listaSolicitudes', $listaSolicitudes));


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    return view('solicitud.index');
}

    public function export()
{

    return Excel::download(new SolicitudExport, 'solicitud.xlsx');
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 /*
        $solicitudVacaciones = Solicitud::whereBetween('FechaInicio', ['FechaInicio','FechaFin'])->where()->count();
       $solicitudVacaciones += Solicitud::whereBetween('FechaFin', ['FechaInicio','FechaFin'])->count() ;
        $totalEmpleado = Solicitud::query()->join('empleados','solicitudes.RPE','=','empleados.RPE')
        ->join('cat__lugar__de__trabajo__empleados','empleados.id','=','cat__lugar__de__trabajo__empleados.Id_empleado_F')
        ->count();
        $porcentaje = (25*$totalEmpleado)/100;
        return dd($solicitudVacaciones);
        */
        $comparativa = $request->input("FechaInicio");
        if($comparativa != ''){  
            $solicitud = new Solicitud();
            $solicitud->RPE = $request->input("RPE");
            $solicitud->Nombre = $request->input('Nombre');
            $solicitud->Descripcion = $request->input('Descripcion');
            $solicitud->FechaInicio = $request->input('FechaInicio');
            $solicitud->FechaFin = $request->input('FechaFin');
            $solicitud->periodo = $request->input('periodo1');
           //$solicitud->autoriza_sec = $request->input('AutorizaSec');
           //$solicitud->autoriza_jefe = $request->input('AutorizaJefe');
   
            $solicitud->save();
            return back()->with('mensaje', 'La solicitud se almaceno correctamente');
        }else{
            $solicitud2 = new Solicitud();
            $solicitud2->RPE = $request->input("RPE2");
            $solicitud2->Nombre = $request->input('Nombre2');
            $solicitud2->Descripcion = $request->input('Descripcion2');
            $solicitud2->FechaInicio = $request->input('FechaInicio2');
            $solicitud2->FechaFin = $request->input('FechaFin2');
            $solicitud2->periodo = $request->input('periodo2');
           //$solicitud->autoriza_sec = $request->input('AutorizaSec');
           //$solicitud->autoriza_jefe = $request->input('AutorizaJefe');
    
            $solicitud2->save();
            return back()->with('mensaje2', 'La solicitud se almaceno correctamente');
        }

  



        
         //return dd($solicitud);

        /* $solicitud2 = new Solicitud();
         $solicitud2->FechaInicio = $request->FechaInicio;
         $solicitud2->FechaFin = $request->FechaFin;
         $solicitudVacaciones = Solicitud::whereBetween('FechaInicio', [ $solicitud2->FechaInicio,  $solicitud2->FechaFin])->count();
         $solicitudVacaciones += Solicitud::whereBetween('FechaFin', [ $solicitud2->FechaInicio,  $solicitud2->FechaFin])->count();
         if($solicitudVacaciones!=0){
             return back()->with('mensaje', 'Los dias que solicitaste no estan disponibles');
         }
         else if($solicitudVacaciones==0){
            $solicitud->save();
            return back()->with('mensaje', 'La solicitud se almaceno correctamente');
         }
        else{
            return back()->with('mensaje', 'error inesperado');
        }*/

        /*$FechaInicio = Carbon::parse($req->input('FechaInicio'));
        $FechaFin = Carbon::parse($req->input('FechaFin'));

        $diasDiferencia = $FechaFin->diffInDays($FechaInicio);*/

    }

  
       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     * */
    public function show(Request $request)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
