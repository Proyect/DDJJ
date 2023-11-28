@extends('adminlte::page')

@section('title', 'Ver')

@section('content_header')
    
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Datos del Tipo de Declaración Jurada"{{ $djtipo->nombre }}"</h1>
            <a href="{{ route('djtipo.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver al Listado
            </a>
            <a href="{{ route('djtipo.edit', $djtipo) }}" class="btn btn-sm btn-secondary text-uppercase">                
                Editar Estado Civil
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">    
                        <h2># {{ $djtipo->id }}</h2>
                    </div>

                    <div class="mb-3">    
                        <h2>Nombre: {{ $djtipo->nombre }}</h2>
                    </div>
                    
                    <div class="mb-3">
                        <p>Creado por {{ $djtipo->admin->name }}.</p>
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