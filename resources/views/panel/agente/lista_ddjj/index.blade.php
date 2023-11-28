{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Lista de Declaraciones Juradas')

@section('plugins.Datatables', true)

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
    <h1>Lista de Declaraciones Juradas</h1>
@stop

{{-- Contenido de la Pagina --}}
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3">
            
            <a href="{{ route('ddjj.create') }}" class="btn btn-success text-uppercase">
                Nueva Declaración Jurada
            </a>
        </div>

        {{-- <div class="col-12 mb-3">           
            <a href="{{ route('funcionario.pdf') }}" class="btn btn-info text-uppercase"> 
                DDJJ Vencidas PDF
            </a>
        </div> --}}
        
        @if(session('alert'))
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('alert') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>                    
                </div>
            </div>
        @endif

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="tabla-ddjjs" class="table table-striped table-hover w-100"{{-- "table table-dark table-sm" --}} style="text-align: center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="text-uppercase">Nombre</th>
                            <th scope="col" class="text-uppercase">Apellido</th>
                            <th scope="col" class="text-uppercase">Cargo</th>
                            <th scope="col" class="text-uppercase">Organismo</th>
                            <th scope="col" class="text-uppercase">N° de Instrumento</th>                            
                            <th scope="col" class="text-uppercase">Fecha de Instrumento</th>
                            <th scope="col" class="text-uppercase">Tipo DDJJ</th>
                            <th scope="col" class="text-uppercase">Estado DDJJ</th>
                            <th scope="col" class="text-uppercase">Vencida</th>
                            {{-- <th scope="col" class="text-uppercase">Observaciones</th> --}}
                            
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach ($ddjjs as $ddjj)
                        
                        <tr>
                            <td>{{ $ddjj->id}}</td>  
                            <td>{{ $ddjj->funcionario->nombre }}</td>                            
                            <td>{{ $ddjj->funcionario->apellido }}</td> 
                            <td>{{ $ddjj->cargo}}</td>                           
                            <td>{{ $ddjj->organismo}}</td>
                            <td>{{ $ddjj->numInstr }}</td>
                            <td>{{ $ddjj->fchInstr }}</td>
                            <td> {{ $ddjj->tipoDDJJ->nombre }}</td>
                            <td>{{ $ddjj->estadoCarga }}</td>
                            <td>{{ $ddjj->vencida }}</td>
                           {{--  <td>{{ $ddjj->observacionesDJ }}</td> --}}
                            
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('ddjj.show', $ddjj) }}" class="btn btn-sm btn-info text-white text-uppercase me-1">
                                        Ver
                                    </a>
                                    <a href="{{ route('ddjj.edit', $ddjj) }}" class="btn btn-sm btn-warning text-white text-uppercase me-1">
                                        Editar
                                    </a>

                                    <form action="{{ route('ddjj.destroy', $ddjj) }}" method="POST">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger text-uppercase" onclick="javascript: return confirm('desea borrar?');">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

{{-- Importacion de Archivos CSS --}}
@section('css')
    
@stop


{{-- Importacion de Archivos JS --}}
@section('js')
<script>
    /*
    new DataTable('tabla-domPart', {
        responsive: true
    });
    */
</script>

<script>
    let configurationDataTable = {
        searching: true,
        pageLength: 5,
        lengthMenu: [[5,10,20,-1], [5,10,20,'Todos']],
        Languaje:{
            "sProcessing": "Procesando..",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "search": "_INPUT_",
            "searchPlaceholder": "¿Qué buscas?",
            "sLoadingRecords": "Cargando..",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            }
        },
    }

    $(function(){
        table = $('#tabla-ddjjs').DataTable(configurationDataTable);
    });
</script>

@stop