@extends('adminlte::page')
@section('title', 'SIPSUTERMCFE')
@section('content_header')
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
@stop


@section('content')
<div class="container">
<h1>Bienvenido</h1>


    <button class="btn-sm">Vacaciones propuestas por el usuario</button>
    <button class="btn-sm">Control de vaciones</button>
    </div>

    <br/>
    <h3>Vacaciones de los usuarios</h3>
<table class="table table-white table-hover table-borderless table-striped"" id="miTablaPersonalizada">  
  <thead>
      <tr>
          <th>Nombre</th>
          <th>Nombre de usuario</th>
          <th>Correo</th>
          <th>Telefono</th>
      </tr>
  </thead>
  <tbody id='data'>
  </tbody>
</table>


 
    <script>
    let url = "https://jsonplaceholder.typicode.com/users";
fetch(url)
  .then((respuesta) => respuesta.json())
  .then((dato) => mostrarData(dato))
  .catch((error) => console.log(error));

const mostrarData = (dato) => {
  console.log(dato);
  let body = "";
  for (let i = 0; i < 10; i++) {
    body += `<tr><td>${dato[i].name}</td><td>${dato[i].username}</td><td>${dato[i].email}</td><td>${dato[i].phone}</td></tr>`;
  }
  document.getElementById("data").innerHTML = body;
};

    </script>
@endsection

