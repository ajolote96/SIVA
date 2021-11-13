<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    static $rules=[
        'Nombre'=>'required',
        'ApellidoPaterno'=>'required',
        'ApellidoMaterno'=>'required',
         'Contrato'=>'required',
         'RPE'=>'required',
         'IMMS'=>'required',
         'FechaIngreso'=>'required',
         'RFC'=>'required',
         'TipoSangre'=>'required',
         'Alergias'=>'required',
         'Padecimientos'=>'required',
         'Rol'=>'required',
         'Domicilio'=>'required',
         'TelefonoCasa'=>'required',
         'TelefonoCelular'=>'required',
         'FechaNacimiento'=>'required',
         'CorreoElectronico'=>'required',
         'Sexo'=>'required',
         'EstadoCivil'=>'required',
         'Hijos'=>'required',
         'Papa'=>'required',
         'Mama'=>'required',
         'ContactoEmergencia'=>'required',
         'TelefonoEmergencia'=>'required',
         'CursosParticipaba'=>'required',
         
    ];

    protected $fillable=['Nombre','ApellidoPaterno','ApellidoMaterno','Contrato','RPE','IMMS','FechaIngreso','RFC','TipoSangre','Alergias','Padecimientos','Rol','Domicilio','TelefonoCasa','TelefonoCelular','FechaNacimiento','CorreoElectronico','Sexo','EstadoCivil','Hijos','Papa','Mama','ContactoEmergencia','TelefonoEmergencia','CusosParticipaba'];

    protected $dates = [
        'TelefonoCasa',
        'telefonoCelular',
        // your other new column
    ];
}
