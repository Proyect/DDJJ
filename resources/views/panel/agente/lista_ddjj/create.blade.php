@extends('adminlte::page')

@section('title', 'Nueva Declaración Jurada')

@section('content_header')
    
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Creación de una nueva Declaración Jurada</h1>
            <a href="{{ route('ddjj.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver al Listado
            </a>
        </div>

        <div class="col-12">
            @include('panel.agente.lista_ddjj.forms.new')
        </div>

    </div>
</div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop

