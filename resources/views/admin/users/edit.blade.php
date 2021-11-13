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

@if (session('mensaje'))
<div class="alert alert-success" role="alert">
    <strong>Aviso</strong> {{session('mensaje')}}
    <button type="button" class="close" data-dismiss="alert" alert-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre</p>
            <p class="form-label">{{$user->name}}</p>

            <p class="h5">Email</p>
            <p class="form-label">{{$user->email}}</p>

            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
                @foreach ($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{$role->name}}
                        </label>
                    </div>
                        
                @endforeach
                <br>
                {!! Form::submit('Asignar rol', ['class' => 'btn btn-sm btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>


@endsection