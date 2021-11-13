<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacaciones extends Model
{
    use HasFactory;

    protected $table='solicitudes';

    static $rules=[
        'RPE'=>'required',
        'Nombre'=>'required',
        'Descripcion'=>'required',
        'FechaInicio'=>'required',
        'FechaFin'=>'required',
    ];

    protected $fillable=['RPE','Nombre','Descripcion','FechaInicio','FechaFin','autoriza_sec','autoriza_jefe','autoriza_email'];

    protected $dates = [
        'FechaInicio',
        'FechaFin',
        // your other new column
    ];
}
