@extends('adminlte::page')
@section('title', 'SIPSUTERMCFE')
@section('content_header')


@section('css')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}"/>
<link rel="preconnect" href="{{asset('https://fonts.googleapis.com')}}" />
<link rel="preconnect" href="{{asset('https://fonts.gstatic.com')}}" crossorigin />

@endsection



@section('title', 'SIPSUTERMCFE')
<h1>Asignacion de roles</h1><br/>
<!--Tabla de dias feriados -->
<p><strong>Estos son los usuarios que se encuentran activos</strong></p>

<div class="card">
    <div class="card-body">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                        <thead class="table-dark" style="background-color:rgb(42, 122, 5)">
                            <tr >
                                <th class="text-center">
                                    Id
                                </th>
                                <th class="text-center">
                                    Nombre
                                </th>
                                <th class="text-center">
                                    Email
                                </th>
                                <th class="text-center">
                                    Accion
                                </th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $userr)
                                
                            <tr>
                                <td>
                                    {{$userr->id}}
                                </td>
                                <td>
                                    {{$userr->name}}
                                </td>
                                <td>
                                    {{$userr->email}}
                                </td>
                                <td>
                                    <a href="{{route('admin.users.edit', $userr->id)}}" method="post" class="btn btn-sm btn-primary row justify-content-between">Editar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        
        </div>
    </div>
</div>

@endsection