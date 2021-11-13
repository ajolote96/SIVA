<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;
Use App\Models\User;
use Carbon\Carbon;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     *
     *
     *
     */

    public function rellenar(){
        $user = Auth::user();

        //$solicitud2 = Empleado::query()->where('CorreoElectronico','=',$user->email)
            // ->select('*')->where('RPE','=','TF567')
          //  ->first();
        return view('form.index')->with('user',$user);
    }


    public function index()
    {

        $datos['empleados']=Empleado::paginate(10);
        return view ('empleado.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'Contrato'=>'required',
            'RPE'=>'required|string|max:5',
            'IMMS'=>'required|string|max:11',
            'FechaIngreso'=>'required|date',
            'RFC'=>'required|string|max:13',
            'IMMS'=>'required|string|max:100',
            'TipoSangre'=>'required',
            'Alergias'=>'required|string|max:100',
            'Padecimientos'=>'required|string|max:100',
            'Rol'=>'required',
            'Domicilio'=>'string|max:100',
            'TelefonoCasa'=>'required|integer',
            'TelefonoCelular'=>'required|integer',
            'FechaNacimiento'=>'required|date',
            'CorreoElectronico'=>'required|string|max:100',
            'Sexo'=>'required|string|max:15',
            'EstadoCivil'=>'required|string|max:15',
            'Hijos'=>'required|string|max:100',
            'Papa'=>'required|string|max:100',
            'Mama'=>'required|string|max:100',
            'ContactoEmergencia'=>'required|string|max:100',
            'TelefonoEmergencia'=>'required|integer',
            'CursosParticipaba'=>'required|string|max:100',

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'FechaIngreso.required'=>'La fecha de ingreso es requerida',
            'Alergias.required'=>'Las alergias son requeridas especificar'
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosempleado = request()->all();
        $datosempleado = request()->except('_token');

        Empleado::insert($datosempleado);

        //return response()->json($datosempleado);
        return redirect('empleado')->with('mensaje','empleado agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $empleado=Empleado::findOrFail($id);
        return view('empleado.edit',compact('empleado') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'Contrato'=>'required',
            'RPE'=>'required|string|max:5',
            'IMMS'=>'required|string|max:11',
            'FechaIngreso'=>'required|date',
            'RFC'=>'required|string|max:13',
            'IMMS'=>'required|string|max:100',
            'TipoSangre'=>'required',
            'Alergias'=>'required|string|max:100',
            'Padecimientos'=>'required|string|max:100',
            'Rol'=>'required',
            'Domicilio'=>'string|max:100',
            'TelefonoCasa'=>'required|integer',
            'TelefonoCelular'=>'required|integer',
            'FechaNacimiento'=>'required|date',
            'CorreoElectronico'=>'required|string|max:100',
            'Sexo'=>'required|string|max:15',
            'EstadoCivil'=>'required|string|max:15',
            'Hijos'=>'required|string|max:100',
            'Papa'=>'required|string|max:100',
            'Mama'=>'required|string|max:100',
            'ContactoEmergencia'=>'required|string|max:100',
            'TelefonoEmergencia'=>'required|integer',
            'CursosParticipaba'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'FechaIngreso.required'=>'La fecha de ingreso es requerida',
            'Alergias.required'=>'Las alergias son requeridas especificar'
        ];


        $this->validate($request, $campos, $mensaje);



        $datosempleado = request()->except(['_token','_method']);


        Empleado::where('id','=',$id)->update($datosempleado);

        $empleado=Empleado::findOrFail($id);
        //return view('empleado.edit',compact('empleado') );
        return redirect('empleado')->with('mensaje','empleado editado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $empleado=Empleado::findOrFail($id);

             Empleado::destroy($id);


        return redirect('empleado')->with('mensaje','empleado borrado con exito');
}

}
