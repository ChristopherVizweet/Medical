
<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Proyecto</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        #fechas { text-align: center; }
        #cuentass { border: 2px solid blue; display: flex; padding: 5px; width: 100%; height: 20%; }
        #general { border: 2px solid blue; display: flex; padding: 5px; width: 100%; height: 18%; justify-content: space-between;}
        h1 { text-align: center; font-size: 11px; }
        #folio { color: red; }
        #servi { border-collapse: collapse; border: none;}
        .columna1 { float: left;  width: 48%;}
        .columna2 { float: right; width: 48%;}

    </style>

</head>

<body>
    <h5>Reporte del Proyecto #{{ $project->id }}</h5>
    {{--Aqui comienza el diseño del reporte de PDF--}}
    <div id="general">
        <h1>MEDICAL GAS SYSTEMS INTERNATIONAL SA DE CV</h1>
    <div class="columna1">
        <p><strong>Nombre del proyecto:</strong> {{ $project->nameProject }}</p>
        <p id="folio"><strong>Folio del proyecto:</strong> {{ $project->folioProject }}</p>
        <p><strong>Cliente: </strong>{{$project->client->name_Client}}</p>
        <p><strong>Empresa encargada: </strong>{{$project->compani->nameCompany}}</p>
        <p><strong>Vendedor: </strong>{{$project->vendedor->name}}</p>
        </div>
        <div class="columna2">
        <p><strong>Encargado: </strong>{{$project->encargado->name}}</p>
        <p><strong>Prioridad: </strong>{{$project->priority->namePriority}}</p>
        <p><strong>Status: </strong>{{$project->status->nameStatus}}</p>
        <p><strong>Recursos obtenidos por: </strong>{{$project->recursos->recursosObtenidos}}</p>
        <p><strong>Presupuesto:</strong> ${{ number_format($project->budget, 2) }}</p>
        </div>
    </div>
    

    <h2>Empleados Asignados</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Jornadas</th>
                <th>Salario</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($project->empleados as $empleado)
            <tr>
                <td>{{ $empleado->empleado->Nombre }}</td>
                <td>{{ $empleado->jornadas }}</td>
                <td>${{ number_format($empleado->salario, 2) }}</td>
                <td>${{ number_format($empleado->total_salario, 2)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Productos Usados</h2>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Proveedor</th>
                <th>Costo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($project->productos as $producto)
            <tr>
                <td>{{ $producto->productoc->name_product }}</td>
                <td>{{ $producto->supplier->name_supplier }}</td>
                <td>${{ number_format($producto->costo, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

<div id="servi">
        <h1>Servicios de instalación seleccionados</h1>
        <div id="servi">
             <table id="servi">
                <thead id="servi">
                    <tr id="servi">
                    <th>Nombre del Servicio</th>
                    </tr>
                </thead>
        <tbody id="servi">
            @foreach ($project->services as $service)
                <tr id="servi">
                    <td>{{ $service->nameInstalation }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    <div id="fechas">
       <p><strong>Fecha de inicio: </strong>{{$project->dateBegin}}</p>
       <p><strong>Fecha de termino: </strong>{{$project->dateEnd}}</p>
 
    </div>

</div>
<div id="cuentass">
    <h1>TOTAL</h1>
        <p><strong>Presupuesto:</strong> ${{ number_format($project->budget, 2) }}</p>
        <p><strong>Total mano de obra:</strong> ${{ number_format($project->totalManoObra, 2) }}</p>
        <p><strong>Total de productos:</strong> ${{ number_format($project->totalProductos, 2) }}</p>
<p><strong>Cuenta bancaria: </strong>{{$project->cuenta->accountBank}}</p>
</div>
</body>
</html>
