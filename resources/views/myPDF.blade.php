<!doctype html>
<html lang="en">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <style>
           
           h1{
                color:black;
                font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
                font-size: medium;
                text-align: center;

           }
            table {
                font-size: small;
                text-align: center;
            }
            
        </style> 

        <title>Descargar Listado de Funcionarios</title>
       
    </head>
    <body>
        <h1>{{ $title }}</h1>       
        
        <table class="table table-striped">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Apellido</th>
                <th>Tipo de Documento</th>
                <th>Número de Documento</th>
            </tr>
            @foreach($funcionarios as $funcionario)
                <tr>
                    <td>{{ $funcionario->id }}</td>
                    <td>{{ $funcionario->nombre }}</td>
                    <td>{{ $funcionario->apellido }}</td>
                    <td>{{ $funcionario->tipoDoc->nombre }}</td>
                    <td>{{ $funcionario->numDoc }}</td>
                </tr>
            @endforeach
        </table>
    
    </body>
    
</html>