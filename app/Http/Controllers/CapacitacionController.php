<?php

namespace App\Http\Controllers;

use App\Models\Capacitacion;
use Illuminate\Http\Request;

class CapacitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['capacitacions']=Capacitacion::paginate(10);
        return view ('Capacitacion.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Capacitacion.create');
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
            'NombreCurso'=>'required|string|max:200',
            'Descripcion'=>'required|string|max:200',
            'Lugar'=>'required|string|max:200',
            'Fecha'=>'required|date',
            'Participantes'=>'required|integer|max:200',
            'Constancias'=>'required|integer|max:200',
            

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'NombreCurso.required'=>'El curso es requerido',
            'Descripcion.required'=>'La descripcion es requerida',
            'Lugar.required'=>'El lugar es requerido',
            'Fecha.required'=>'La fecha es requerida',
            'Constancias.required'=>'Las constancias son requeridas'
        ];

        $this->validate($request, $campos, $mensaje);

        $datoscurso = request()->except('_token');

        Capacitacion::insert($datoscurso);

       
        return redirect('capacitacion')->with('mensaje','curso agregado con exito');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Capacitacion  $capacitacion
     * @return \Illuminate\Http\Response
     */
    public function show(Capacitacion $capacitacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Capacitacion  $capacitacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso=Capacitacion::findOrFail($id);
        return view('Capacitacion.edit',compact('curso') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Capacitacion  $capacitacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'NombreCurso'=>'required|string|max:200',
            'Descripcion'=>'required|string|max:200',
            'Lugar'=>'required|string|max:200',
            'Fecha'=>'required|date',
            'Participantes'=>'required|integer|max:200',
            'Constancias'=>'required|integer|max:200',
            

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'NombreCurso.required'=>'El curso es requerido',
            'Descripcion.required'=>'La descripcion es requerida',
            'Lugar.required'=>'El lugar es requerido',
            'Fecha.required'=>'La fecha es requerida',
            'Constancias.required'=>'Las constancias son requeridas'
        ];

        $this->validate($request, $campos, $mensaje);



        $datoscurso = request()->except(['_token','_method']);


        Capacitacion::where('id','=',$id)->update($datoscurso);
        
        $curso=Capacitacion::findOrFail($id);
        //return view('empleado.edit',compact('empleado') );
        return redirect('capacitacion')->with('mensaje','curso editado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Capacitacion  $capacitacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso=Capacitacion::findOrFail($id);

             Capacitacion::destroy($id);
  
    
        return redirect('capacitacion')->with('mensaje','curso borrado con exito');

    }
}
