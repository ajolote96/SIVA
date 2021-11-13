<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarioEmpleado extends Model
{
    use HasFactory;
    static $rules=[
        'title'=>'required',
        'descripcion'=>'required',
        'start'=>'required',
         'end'=>'required'
    ];

    protected $fillable=['title','descripcion','start','end'];
}
