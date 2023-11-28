@extends('adminlte::page')

@section('title', 'Inicio')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Sistema de Declaraciones Juradas</h1>
@stop

@section('content')
    <p></p>
    
    {{-- <a href="panel/funcionarios">Administrar Funcionarios</a><br><br>
    <a href="panel/dtipos">Administrar Tipos de Documento</a><br><br>
    <a href="panel/cestados">Administrar Estados Civiles</a><br><br> --}}

    @role('admin')
        Interface del Administrador
        
    @endrole

    @role('agente')
    Interface del Agente
    @endrole

    @role('funcionario')
        Interface del funcionario
    @endrole
  
@stop
@section('footer')
    <p>Escribanía de Gobierno de Salta</p>
@stop
@section('css')
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop