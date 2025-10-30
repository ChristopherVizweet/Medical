
<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Proyecto</title>
    <style>
        body { margin: 0; margin-bottom: 40px; font-family: DejaVu Sans, sans-serif; font-size: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        #fechas { text-align: center; }
        #cuentass { border: 2px solid blue; display: flex; padding: 5px; width: 100%; height: 20%; }
        #general { border: 2px solid blue; display: flex; padding: 5px; width: 100%; height: 18%; justify-content: space-between;}
        h1 { text-align: center; font-size: 11px; }
        h3 { text-align: center; font-size: 9px; }
        #folio { color: red; }
        #servi { border-collapse: collapse; border: none;}
        .columna1 { float: left;  width: 48%;}
        .columna2 { float: right; width: 48%;}
        .terminos { text-align: center; }
        #tema { text-align: center; font-size: 15px; }
        #header img {
        width: 100px;   /*Este es el diseño de la imagen del logo1*/
        }
        #header #logo2 {
        width: 40px; 
        float: right;  /*Este es el diseño de la imagen del logo1*/
    }
        #header h1 {
            font-size: 14px;
            margin: 0;
        }
        #footer_QR {
        text-align: center; /* Centra horizontalmente el contenido */
        margin-top: 10px;
}

#footer_QR img {
    width: 200px;
    display: inline-block;
}
.footer {
        margin-top: 50px;
    text-align: center;
    font-size: 10px;
    border-top: 1px solid #000;
    padding-top: 10px;
}
.footer img{
     width: 200px;
}
.texto_footer {color: blue}
#marca-agua {
    position: fixed;
    top: 35%;
    left: 20%;
    width: 400px;
    opacity: 0.5;
    z-index: -1;
}
    </style>
    
</head>

<body>
    
    <h5>Reporte del Proyecto #{{ $project->id }}</h5>
    {{--Aqui comienza el diseño del reporte de PDF--}}
    <div id="general">
        <div id="header">
    <img src="{{ public_path('img/logo1.png') }}" alt="Logo Empresa" width="50">
    <img id="logo2" src="{{ public_path('img/logo2.jpg') }}" alt="Logo Empresa2" width="30px">
    <h1>MEDICAL GAS SYSTEMS INTERNATIONAL SA DE CV</h1>
</div>
    <div class="columna1">
        <p><strong>Nombre del proyecto:</strong> {{ $project->nameProject }}</p>
        <p id="folio"><strong>Folio del proyecto:</strong> MED-{{ $project->folioProject }}-2025</p>
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
<img id="marca-agua" src="{{ public_path('img/marca_agua.png') }}" alt="Marca de Agua">

</body>
<!--<footer>
    <div id="terminos">
        <p id="tema">TERMINOS Y CONDICIONES</p>
        <h3>REQUERIMIENTOS DE PAGO</h3>
        <p class="terminos">Se requiere orden de compra.</p>
        <p class="terminos">Se requiere de anticipo del 70% y 30% aviso de embarque</p>
        <h3>TIMEPO DE ENTREGA</h3>
        <p class="terminos">El tiempo de entrega 4-6 semanas</p>
        <p class="terminos">Garantia 12 meses en defectos de fabricacion</p>
        <h3>ACEPTACIÓN DE TRABAJO</h3>
        <p class="terminos">Al ser aceptado nuestro presupuesto, mandar la cotizacion de regreso via email con nombre y firma de quien autoriza</p>
        </div>
        <div id="footer_QR">
    <img src="{ public_path('img/frame.png') }}" alt="QR terminos" width="100">
    </div>
</footer>-->
<div class="footer">
    <p>Medical Gas Systems International © {{ date('Y') }}</p>
    <p>TERMINOS Y CONDICIONES</p>
    <img src="{{ public_path('img/frame.png') }}" alt="QR terminos" width="80">
    <p class="texto_footer">Somos Fabricantes y Distribuidores</p>
    <p class="texto_footer"> www.medicalgas.com.mx , contactomedicalgas@gmail.com , ventas@medicalgas.com.mx , asesor2@medicalgas.com.mx, Tel Oficina: 55 2594 2008, 55 25942396, 55 72581417, Movil: </p>
</div>
</html>
