

{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Funcionarios')

@section('plugins.Datatables', true)

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
    <h1>Lista de Funcionarios</h1>
@stop

{{-- Contenido de la Pagina --}}
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3">
            
            <a href="{{ route('funcionario.create') }}" class="btn btn-success text-uppercase">
                Nuevo Funcionario
            </a>

            <a href="{{ route('funcionario.pdf') }}" class="btn btn-info text-uppercase">
                Descargar Listado
            </a>
        </div>
        
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
                <table id="tabla-funcionarios" class="table table-striped table-hover w-100" style="text-align: center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="text-uppercase">Nombre</th>
                            <th scope="col" class="text-uppercase">Apellido</th>
                            <th scope="col" class="text-uppercase">Tipo de Documento</th>
                            <th scope="col" class="text-uppercase">Número de Documento</th>                            
                            <th scope="col" class="text-uppercase">Fecha de Registro</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach ($funcionarios as $funcionario)
                        <tr>
                            <td>{{ $funcionario->id }}</td>                            
                            <td>{{ $funcionario->nombre }}</td>
                            <td>{{ $funcionario->apellido }}</td>
                           
                            <td>{{ $funcionario->tipoDoc->nombre}}</td>  {{-- tipoDoc, es el nombre de la funcion que vincula las tablas en el modelo --}}
                           
                           
                            <td>{{ $funcionario->numDoc }}</td>
                            <td>{{ $funcionario->created_at }}</td>
                            
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('funcionario.show', $funcionario) }}" class="btn btn-sm btn-info text-white text-uppercase me-1">
                                        Ver
                                    </a>
                                    <a href="{{ route('funcionario.edit', $funcionario) }}" class="btn btn-sm btn-warning text-white text-uppercase me-1">
                                        Editar
                                    </a>

                                    <form action="{{ route('funcionario.destroy', $funcionario) }}" method="POST">
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
    /*new DataTable('tabla-funcionarios', {
        responsive: true
    });*/
</script>

<script>
    $(function(){
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
        };
        
        let table = $('#tabla-funcionarios').DataTable(configurationDataTable);
    });

    Swal
    .fire({
        title: "Venta #123465",
        text: "¿Eliminar?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar",
    })
    .then(resultado => {
        if (resultado.value) {
            // Hicieron click en "Sí"
            console.log("*se elimina la venta*");
        } else {
            // Dijeron que no
            console.log("*NO se elimina la venta*");
        }
    });

  
</script>

@stop