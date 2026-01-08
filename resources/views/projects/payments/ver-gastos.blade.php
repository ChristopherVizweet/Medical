
<!DOCTYPE html>
<html>
<head>
    <title>REPORTE DE GASTOS</title>
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
    margin-top: 20px;
    text-align: center;
    font-size: 10px;
    border-top: 1px solid #000;
   
}
.footer img{
     width: 200px;
}
.cuentas-gastos {
    margin-top: 20px;
    border: 2px solid blue;
    padding: 10px;
    text-align: center;
}
.texto_footer {color: blue}
#marca-agua {
    position: fixed;
    top: 35%;
    left: 20%;
    width: 400px;
    opacity: 0.3;
    z-index: -1;
}
    </style>
    
</head>

<body>
    
    <h5>Reporte de gastos por proyecto #{{ $projects->id }}</h5>
    {{--Aqui comienza el diseño del reporte de PDF--}}
    <div id="general">
        <div id="header">
    <img src="{{ public_path('img/logo1.png') }}" alt="Logo Empresa" width="50">
    <img id="logo2" src="{{ public_path('img/logo2.jpg') }}" alt="Logo Empresa2" width="30px">
    <h1>MEDICAL GAS SYSTEMS INTERNATIONAL SA DE CV</h1>
</div>
    <div class="columna1">
         <p><strong>Nombre del proyecto:</strong> {{ $projects->nameProject }}</p>
        <p id="folio"><strong>Folio del proyecto:</strong> MED-{{ $projects->folioProject }}-2025</p>
        <p><strong>Cliente: </strong>{{$projects->client->name_Client}}</p>
        <p><strong>Empresa encargada: </strong>{{$projects->compani->nameCompany}}</p>
        <p><strong>Vendedor: </strong>{{$projects->vendedor->name}}</p>
        </div>
        <div class="columna2">
        <p><strong>Encargado: </strong>{{$projects->encargado->name}}</p>
        <p><strong>Prioridad: </strong>{{$projects->priority->namePriority}}</p>
        <p><strong>Status: </strong>{{$projects->status->nameStatus}}</p>
        <p><strong>Recursos obtenidos por: </strong>{{$projects->recursos->recursosObtenidos}}</p>
        <p><strong>Presupuesto:</strong> ${{ number_format($projects->budget, 2) }}</p>
        </div>
    </div>
    
{{--Aqui esta es la tabla de los gastos deducibles--}}
    <h2>Gastos deducibles</h2>
    <table>
        <thead>
            <tr>
                <th>Concepto</th>
                <th>Fecha de recepción</th>
                <th>Fecha de registro</th>
                <th>Folio</th>
                <th>Método de pago</th>
                <th>Empleado</th>
                <th>Subtotal</th>
                <th>IVA</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach  ($payments as $payment)
            <tr>
                <td>{{ $payment->concepto }}</td>
                <td>{{ $payment->fecha_recepcion }}</td>
                <td>{{ $payment->created_at }}</td>
                <td>{{ $payment->folio }}</td>
                <td>{{ $payment->metodo_pago }}</td>
                <td>{{ optional($payment->empleado)->full_name ?? 'ID: '.$payment->empleados_id }}</td>
                <td>${{ number_format($payment->subtotal, 2) }}</td>
                <td>${{ number_format($payment->iva, 2) }}</td>
                <td>${{ number_format($payment->total, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
<img id="marca-agua" src="{{ public_path('img/marca_agua.png') }}" alt="Marca de Agua">
{{--Aqui esta es la tabla de los gastos nodeducibles--}}
    <h2>Gastos no deducibles</h2>
    <table>
        <thead>
            <tr>
                <th>Concepto</th>
                <th>Fecha de recepción</th>
                <th>Fecha de registro</th>
               
                <th>Método de pago</th>
                <th>Empleado</th>
                <th>Subtotal</th>
                <th>IVA</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nopayment as $nopaymen)
            <tr>
                <td>{{ $nopaymen->concepto }}</td>
                <td>{{ $nopaymen->fecha_recepcion }}</td>
                <td>{{ $nopaymen->created_at }}</td>
               
                <td>{{ $nopaymen->metodo_pago }}</td>
                <td>{{ optional($nopaymen->empleado)->full_name ?? 'ID: '.$nopaymen->empleados_id }}</td>
                <td>${{ number_format($nopaymen->subtotal, 2) }}</td>
                <td>${{ number_format($nopaymen->iva, 2) }}</td>
                <td>${{ number_format($nopaymen->total, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="cuentas-gastos">
        <h3>Resumen de gastos</h3>
        <p><strong>Total de gastos deducibles:</strong> ${{ number_format($payments->sum('total'), 2) }}</p>
        <p><strong>Total de gastos no deducibles:</strong> ${{ number_format($nopayment->sum('total'), 2) }}</p>
        <p><strong>Total general de gastos:</strong> ${{ number_format($payments->sum('total') + $nopayment->sum('total'), 2) }}</p>
    </div>
    <div class="footer">
    <p>Medical Gas Systems International © {{ date('Y') }}</p>
    </div>
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

</html>
