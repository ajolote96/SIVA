<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaFeriado extends Model
{
    use HasFactory;

    protected $table='dia_feriados';

    protected $fillable = [

            'Nombre',
            'Fecha'
    ];
}
