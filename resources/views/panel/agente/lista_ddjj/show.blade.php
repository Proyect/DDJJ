@extends('adminlte::page')

@section('title', 'Ver')

@section('content_header')
    
@stop

@section('content')
<style>
    p{
        color:black;
    }
    p.campo {
        font-weight: bold;
        float: left;
        /* font-style: italic; */
    
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
            <h1>Datos de la Declaración Jurada</h1>
            <a href="{{ route('ddjj.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver al Listado
            </a>
            <a href="{{ route('ddjj.edit', $ddjj) }}" class="btn btn-sm btn-secondary text-uppercase">                
                Editar DDJJ
            </a> 

                
        </div>
       
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                    <div class="mb-3">    
                        <h2>Funcionario: {{ $ddjj->funcionario->nombre }} {{ $ddjj->funcionario->apellido }}</h2>
                    </div>
                    
                    <div class="mb-3">
                        <p class="campo"> Cargo: </p><p> {{ $ddjj->cargo }}</p>
                    </div>
                    <div class="mb-3">
                        <p class="campo"> Organismo: </p><p>{{ $ddjj->organismo}}</p>
                    </div>
                    <div class="mb-3">
                        <p class="campo"> N° Instrumento: </p><p> {{ $ddjj->numInstr }}</p>
                    </div>
                    <div class="mb-3">
                        <p class="campo"> Fecha Instrumento: </p><p> {{ $ddjj->fchInstr }}</p>
                    </div>
                    <div class="mb-3">
                        <p class="campo"> Tipo DDJJ: </p><p> {{ $ddjj->tipoDDJJ->nombre }}</p>
                    </div>
                                        
                    <div class="mb-3">
                        <p class="campo">Presentación Obligatoria:</p><p>  {{ $ddjj->obligado }}</p>
                    </div>
                     
                    <div class="mb-3">
                        <p class="campo">DDJJ vencida: </p><p>{{ $ddjj->vencida }}</p>
                    </div>
                    {{--
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
                        <p class="campo">Observaciones:</p> <br>                                        
                        <div>
                            <textarea rows="8" cols="90" class="textArea" readonly>
                                {{ $ddjj->observacionesDJ }}
                            </textarea>
                        </div>                         
                    </div>
                    <div class="mb-3">                        
                        <p class="campo">Creada por: </p><p>{{ $ddjj->agente->name }} ( {{ $ddjj->created_at }} )</p>
                    </div>

                    <div class="mb-3">                        
                        <p class="campo">Fecha de última modificación: </p><p>{{ $ddjj->created_at }} </p>
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