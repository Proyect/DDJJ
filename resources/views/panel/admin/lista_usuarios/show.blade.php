@extends('adminlte::page')

@section('title', 'Ver')

@section('content_header')
    
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Datos del Usuario"{{ $dtipo->nombre }}"</h1>
            <a href="{{ route('usuario.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver al Listado
            </a>
            <a href="{{ route('usuario.edit', $user) }}" class="btn btn-sm btn-secondary text-uppercase">                
                Editar Usuario
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">    
                        <h2># {{ $user->id }}</h2>
                    </div>

                    <div class="mb-3">    
                        <h2>Nombre: {{ $user->name }}</h2>
                    </div>
                    
                    <div class="mb-3">    
                        <h2>Email: {{ $user->email }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    
@stop

@section('js')

@stop