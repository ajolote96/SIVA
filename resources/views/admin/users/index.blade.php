@extends('adminlte::page')
@section('title', 'SIPSUTERMCFE')
@section('content_header')


@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
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
                    <table class="table table-bordered table-hover table-sortable" id="users">
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
                                    Roles
                                </th>
                                <th class="text-center">
                                    Accion
                                </th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $userr)
                                
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
                                @if(!empty($userr->getRoleNames()))
                                    @foreach($userr->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                    @endforeach
                                    
                                @endif 
                                
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

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="<?php echo asset('js/validaciones.js') ?>"></script>
    <script type="text/javascript" src=<?php echo asset('https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js') ?>></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>    
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#users').DataTable();
    </script>
@endsection