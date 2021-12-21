<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dias_periodos extends Model
{
    use HasFactory;

    
    protected $table='dias_periodos';

    static $rules=[
        'RPE'=>'required',
        'Fecha_ingreso'=>'required',
        'Dias_Disponibles_22'=>'required',
        'Dias_Estimados_22'=>'required'
    ];

    protected $fillable=['RPE','Fecha_ingreso','Dias_Disponibles_22','Dias_Estimados_22'];


}
