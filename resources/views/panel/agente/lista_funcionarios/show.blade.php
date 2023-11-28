@extends('adminlte::page')

@section('title', 'Ver')

@section('content_header')
    
@stop

@section('content')
<style>
    p{
        color:black;
    }
    .textArea{
        border-color:darkgray;
        text-align:justify;
        color: rgb(0, 0, 0);
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Datos del Funcionario</h1>
            <a href="{{ route('funcionario.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver al Listado
            </a>
            <a href="{{ route('funcionario.edit', $funcionario) }}" class="btn btn-sm btn-secondary text-uppercase">                
                Editar Funcionario
            </a>

              
        </div>
       
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                    <div class="mb-3">    
                        <h2>Nombre: {{ $funcionario->nombre }}</h2>
                    </div>
                    <div class="mb-3">    
                        <h2>Apellido: {{ $funcionario->apellido }}</h2>
                    </div>
                    <div class="mb-3">
                        <p> Género: {{ $funcionario->genero }}</p>
                    </div>
                    <div class="mb-3">
                        <p> Tipo de Documento: {{ $funcionario->tipoDoc->nombre }}</p>
                    </div>
                    <div class="mb-3">
                        <p> Numero de Documento: {{ $funcionario->numDoc }}</p>
                    </div>
                    {{-- <div class="mb-3">
                        <p>Estado Civil: {{ $funcionario->estadoCiv->nombre }}</p>
                    </div>
                    <div class="mb-3">
                        <p>Conyuge: {{ $funcionario->conyuge }}</p>
                    </div>
                    <div class="mb-3">
                        <p>Tel: {{ $funcionario->tel }}</p>
                    </div>
                    <div class="mb-3">
                        <p>Cel: {{ $funcionario->cel }}</p>
                    </div>
                    <div class="mb-3">
                        <p>Barrio: {{ $funcionario->domicilio->barrio }}</p>  
                    </div>
                    <div class="mb-3">
                        <p>Domicilio: {{ $funcionario->domicilio->calle }}</p>  
                    </div>
                    <div class="mb-3">
                        <p>Num: {{ $funcionario->domicilio->num }}</p>  
                    </div>
                    <div class="mb-3">
                        <p>Piso: {{ $funcionario->domicilio->piso }}</p>  
                    </div>
                    <div class="mb-3">
                        <p>Provincia: {{ $funcionario->domicilio->provincia }}</p>  
                    </div>
                    <div class="mb-3">
                        <p>Localidad: {{ $funcionario->domicilio->localidad }}</p>  
                    </div> --}}
                    <div class="mb-3" >                        
                            <p>Observaciones:</p>                       
                        
                        <div>
                            <textarea rows="10" cols="80" class="textArea" readonly>
                                {{ $funcionario->observacionesF }}
                            </textarea>
                        </div>                         
                    </div>
                    <div class="mb-3">
                        
                        <p>Creado por {{ $funcionario->agente->name }}.</p>
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