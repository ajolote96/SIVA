
@section('title', 'SIPSUTERMCFE')


<h1>{{ $modo }} empleado </h1>



@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
    <ul>
         @foreach($errors->all() as $error)
        <li> {{ $error }} </li>
        @endforeach
    </ul>
    </div>



@endif

<?php

use App\Models\User;


//foreach ($users as $user)


$users2 = \Illuminate\Support\Facades\Auth::user();


?>



<div class="form-group">
<label for="Nombre"> Nombre </label>
<input type="text" class="form-control" name="Nombre" id="Nombre" value="{{ isset($empleado->Nombre)?$empleado->Nombre:old('Nombre')}}">
</div>

<div class="form-group">
<label for="ApellidoPaterno"> Apellido Paterno </label>
<input type="text" class="form-control" name="ApellidoPaterno" id="ApellidoPaterno" value="{{ isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:old('ApellidoPaterno') }}">

</div>

<div class="form-group">
<label for="ApellidoMaterno"> Apellido Materno </label>
<input type="text" class="form-control" name="ApellidoMaterno" id="ApellidoMaterno" value="{{ isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno:old('ApellidoMaterno') }}">

</div>

<div class="form-group">
  <label for="IdLugarDeTrabajo"> ID Lugar de trabajo </label>
  <input type="text" class="form-control" name="IdLugarDeTrabajo" id="IdLugarDeTrabajo" value="{{ isset($empleado->IdLugarDeTrabajo)?$empleado->IdLugarDeTrabajo:old('IdLugarDeTrabajo') }}">
  
  </div>

<div class="form-group">
<label for="Contrato"> Contrato </label>

<select name="Contrato" class="form-control "id="Contrato">
  <option selected value="{{ isset($empleado->Contrato)?$empleado->Contrato:old('Contrato') }}">{{ isset($empleado->Contrato)?$empleado->Contrato:old('Contrato') }}</option>
  <option value="Prestador de Servicio">Prestador de Servicio</option>
  <option value="Temporal de Sindicalizado">Temporal de Sindicalizado</option>
  <option value="Base Sindicalizado">Base Sindicalizado</option>
  <option value="Temporal de Confianza">Temporal de Confianza</option>
  <option value="Base de Confianza">Base de Confianza</option>
</select>


</div>

<div class="form-group">
<label for="Contrato"> RPE </label>
<input type="text" class="form-control"  maxlength="5" name="RPE" id="RPE" value="{{ isset($empleado->RPE)?$empleado->RPE:old('RPE') }}">

</div>


<div class="form-group">
<label for="IMMS"> Número de seguro social (IMMS) </label>
<input type="text" maxlength="11" class="form-control" name="IMMS" id="IMMS" value="{{ isset($empleado->IMMS)?$empleado->IMMS:old('IMMS') }}">

</div>

<div class="form-group">
<label for="FechaIngreso"> Fecha de ingreso </label>
<input type="date" class="form-control" name="FechaIngreso" id="FechaIngreso" value="{{ isset($empleado->FechaIngreso)?$empleado->FechaIngreso:old('FechaIngreso') }}">

</div>

<div class="form-group">
<label for="RFC"> RFC </label>
<input type="text" maxlength="13" class="form-control" name="RFC" id="RFC" value="{{ isset($empleado->RFC)?$empleado->RFC:old('RFC') }}">

</div>

<div class="form-group">
<label for="TipoSangre"> Tipo de Sangre </label>

<select name="TipoSangre" class="form-control "id="TipoSangre">
  <option selected value="{{ isset($empleado->TipoSangre)?$empleado->TipoSangre:old('TipoSangre') }}">{{ isset($empleado->TipoSangre)?$empleado->TipoSangre:old('TipoSangre') }}</option>
  <option value="A+">A+</option>
  <option value="A-">A-</option>
  <option value="B+">B+</option>
  <option value="B-">B-</option>
  <option value="AB+">AB+</option>
  <option value="AB-">AB-</option>
  <option value="O+">O+</option>
  <option value="O-">O-</option>
</select>

</div>

<div class="form-group">
<label for="Alergias"> Alergias </label>
<input type="text" class="form-control" name="Alergias" id="Alergias" value="{{ isset($empleado->Alergias)?$empleado->Alergias:old('Alergias') }}">

</div>

<div class="form-group">
<label for="Padecimientos"> Padecimientos </label>
<input type="text" class="form-control" name="Padecimientos" id="Padecimientos" value="{{ isset($empleado->Padecimientos)?$empleado->Padecimientos:old('Padecimientos') }}">

</div>

{{-- <div class="form-group">
<label for="Rol"> Rol </label>

<select name="Rol" class="form-control "id="Rol">
  <option selected value="{{ isset($empleado->Rol)?$empleado->Rol:old('Rol') }}">{{ isset($empleado->Rol)?$empleado->Rol:old('Rol') }}</option>
  <option value="Administrador">Administrador</option>
  <option value="Jefe">Jefe</option>
  <option value="Usuario del sistema">Usuario del sistema</option>
  <option value="Empleado">Empleado</option>
</select>
</div> --}}


<div class="form-group">
<label for="Domicilio"> Domicilio </label>
<input type="text" class="form-control" name="Domicilio" id="Domicilio" value="{{ isset($empleado->Domicilio)?$empleado->Domicilio:old('Domicilio') }}">
</div>


<div class="form-group">
<label for="TelefonoCasa"> Telefono de casa </label>
<input type="text" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="10" class="form-control" name="TelefonoCasa" id="TelefonoCasa" value="{{ isset($empleado->TelefonoCasa)?$empleado->TelefonoCasa:old('TelefonoCasa') }}">
</div>

<div class="form-group">
<label for="TelefonoCelular"> Telefono Celular </label>
<input type="text" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="10" class="form-control" name="TelefonoCelular" id="TelefonoCelular" value="{{ isset($empleado->TelefonoCelular)?$empleado->TelefonoCelular:old('
TelefonoCelular') }}">
</div>

<div class="form-group">
<label for="FechaNacimiento"> Fecha de Nacimiento </label>
<input type="date" class="form-control" name="FechaNacimiento" id="FechaNacimiento" value="{{ isset($empleado->FechaNacimiento)?$empleado->FechaNacimiento:old('FechaNacimiento') }}">
</div>

<div class="form-group">
<label for="CorreoElectronico"> Correo Electronico </label>
<input type="text" class="form-control" name="CorreoElectronico" id="CorreoElectronico" value="{{ isset($empleado->CorreoElectronico)?$empleado->CorreoElectronico:old('CorreoElectronico') }}">
</div>


<div class="form-group">
<label for="Sexo"> Sexo </label>
<select name="Sexo" class="form-control " id="Sexo">
  <option selected value="{{ isset($empleado->Sexo)?$empleado->Sexo:old('Sexo') }}">{{ isset($empleado->Sexo)?$empleado->Sexo:old('Sexo') }}</option>
  <option value="Mujer">Mujer</option>
  <option value="Hombre">Hombre</option>
  <option value="Nobinario">No binario</option>
</select>
</div>

<div class="form-group">
<label for="EstadoCivil"> Estado Civil </label>
<select name="EstadoCivil" class="form-control "id="EstadoCivil">
  <option selected value="{{ isset($empleado->EstadoCivil)?$empleado->EstadoCivil:old('EstadoCivil') }}">{{ isset($empleado->EstadoCivil)?$empleado->EstadoCivil:old('EstadoCivil') }}</option>
  <option value="Soltero">Soltero(a)</option>
  <option value="Casado">Casado(a)</option>
  <option value="Divorciado">Divorciado(a)</option>
  <option value="Viudo">Viudo(a)</option>
</select>
</div>

<div class="form-group">
<label for="ContactoEmergencia"> Nombre del Contacto de Emergencia </label>
<input type="text" class="form-control" name="ContactoEmergencia" id="ContactoEmergencia" value="{{ isset($empleado->ContactoEmergencia)?$empleado->ContactoEmergencia:old('ContactoEmergencia') }}">
</div>

<div class="form-group">
<label for="TelefonoEmergencia"> Telefono de contacto de emergencia </label>
<input type="text" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="10" class="form-control" name="TelefonoEmergencia" id="TelefonoEmergencia" value="{{ isset($empleado->TelefonoEmergencia)?$empleado->TelefonoEmergencia:old('TelefonoEmergencia') }}">
</div>

<div class="form-group">
<label for="CursosParticipaba"> Cursos que Participaba </label>
<input type="text" class="form-control" name="CursosParticipaba" id="CursosParticipaba" value="{{ isset($empleado->CursosParticipaba)?$empleado->CursosParticipaba:old('CursosParticipaba') }}">
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos" >
<a class="btn btn-primary" href="{{ url('empleado/') }}">Regresar</a>
