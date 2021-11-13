

@section('title', 'SIPSUTERMCFE')


<h1>{{ $modo }} curso </h1>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
    <ul>
         @foreach($errors->all() as $error)
        <li> {{ $error }} </li>
        @endforeach
    </ul>
    </div>

   

@endif

<div class="form-group">
<label for="NombreCurso"> Curso </label>
<input type="text" class="form-control" name="NombreCurso" id="NombreCurso" value="{{ isset($curso->NombreCurso)?$curso->NombreCurso:old('NombreCurso') }}">
</div>

<div class="form-group">
<label for="Descripcion"> Descripcion </label>
<input type="text" class="form-control" name="Descripcion" id="Descripcion" value="{{ isset($curso->Descripcion)?$curso->Descripcion:old('Descripcion') }}">

</div>

<div class="form-group">
<label for="Lugar"> Lugar </label>
<input type="text" class="form-control" name="Lugar" id="Lugar" value="{{ isset($curso->Lugar)?$curso->Lugar:old('Lugar') }}">

</div>

<div class="form-group">
<label for="Fecha"> Fecha </label>
<input type="date" class="form-control" name="Fecha" id="Fecha" value="{{ isset($curso->Fecha)?$curso->Fecha:old('Fecha') }}">

</div>

<div class="form-group">
<label for="Participantes"> Participantes </label>
<input type="number" class="form-control" name="Participantes" id="Participantes" value="{{ isset($curso->Participantes)?$curso->Participantes:old('Participantes') }}">

</div>

<div class="form-group">
<label for="Constancias"> Constancias </label>
<input type="number" class="form-control" name="Constancias" id="Constancias" value="{{ isset($curso->Constancias)?$curso->Constancias:old('Constancias') }}">

</div>



<input class="btn btn-success" type="submit" value="{{ $modo }} curso" >
<a class="btn btn-primary" href="{{ url('capacitacion/') }}">Regresar</a>
