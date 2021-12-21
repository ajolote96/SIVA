<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PorcentajeEmpleado extends Model
{
    use HasFactory;
    protected $table='zonas';

    public function scopenombreDepartamento($query,$identificador){
        if($identificador)
            return $query->where('zonas.Nombre', 'LIKE', "%$identificador%");
    }
}
