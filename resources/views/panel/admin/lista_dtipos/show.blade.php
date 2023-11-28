@extends('adminlte::page')

@section('title', 'Ver')

@section('content_header')
    
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Datos del Tipo de Documento "{{ $dtipo->nombre }}"</h1>
            <a href="{{ route('dtipo.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver al Listado
            </a>
            <a href="{{ route('dtipo.edit', $dtipo) }}" class="btn btn-sm btn-secondary text-uppercase">                
                Editar Tipo de Documento
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">    
                        <h2># {{ $dtipo->id }}</h2>
                    </div>

                    <div class="mb-3">    
                        <h2>Nombre: {{ $dtipo->nombre }}</h2>
                    </div>
                    
                    <div class="mb-3">
                        <p>Creado por {{ $dtipo->admin->name }}.</p>
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