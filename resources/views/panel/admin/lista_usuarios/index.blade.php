{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Estados')

@section('plugins.Datatables', true)

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

{{-- Contenido de la Pagina --}}
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3">
            
            <a href="{{ route('usuario.create') }}" class="btn btn-success text-uppercase">
                Nuevo Usuario
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
                <table id="tabla-usuarios" class="table table-striped table-hover w-100" style="text-align: center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="text-uppercase">Nombre</th>
                            <th scope="col" class="text-uppercase">Email</th>                           
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>                            
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                                                        
                            <td>
                                <div class="d-flex">
                                    {{-- <a href="{{ route('usuario.show', $user) }}" class="btn btn-sm btn-info text-white text-uppercase me-1">
                                        Ver
                                    </a> --}}
                                    <a href="{{ route('usuario.edit', $user) }}" class="btn btn-sm btn-warning text-white text-uppercase me-1">
                                        Editar
                                    </a>

                                    <form action="{{ route('usuario.destroy', $user) }}" method="POST">
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
        table = $('#tabla-usuarios').DataTable(configurationDataTable);
    });
</script>

@stop