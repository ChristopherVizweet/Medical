
<!DOCTYPE html>
<html>
<head>


    <title>Registro de salidas</title>

    {{--Aqui comienzan los estilos--}}
<style>
#folio{color: red}
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
    {{--Aqui comienza el diseño del reporte de PDF--}}
    <div id="header">
        <img src="{{ public_path('img/logo1.png') }}" alt="Logo Empresa" width="50">
        <h1>VALES DE SALIDA</h1>
    </div>
    <div class="info-basica">
        <p><strong>FECHA: </strong>{{$movimientos->movimiento->fecha_movimiento ?? 'Sin fecha'}}</p>
        <p><strong>SOLICITA: </strong>{{$movimientos->empleado->Nombre ?? 'Sin nombre'}}</p>
        <p><strong>OBRA: </strong>{{$movimientos->obra_movimiento ?? 'Sin nombre de obra'}}</p>
        <p id="folio"><strong>FOLIO N°: </strong>{{$movimientos->folio_movimiento ?? 'Sin folio'}}</p>
    </div>
    <div>
       <h2>Productos de salida</h2>
    <table>
        <thead>
            <tr>
            
                <th>Descripción</th>
                <th>Cantidad Requerida</th>
                <th>Cantidad Aprobada</th>
                <th>T.P.E</th>
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movimientos->movimiento as $movi)
            <tr>
                <td>{{ $movimientos->product->name_product ?? 'sin productos' }}</td>
                <td>{{ $movimientos->cantidadR ?? 'sin cantidad requerida' }}</td>
                <td>{{ $movimientos->cantidadA ?? 'sin cantidad aprobada' }}</td>
                <td>{{ $movimientos->cantidad ?? 'sin cantidad total'}}</td>
                <td>{{ $movimientos->movimiento->observaciones_movimiento ?? 'sin observaciones'}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
 
    </div>
    
    


    

<img id="marca-agua" src="{{ public_path('img/marca_agua.png') }}" alt="Marca de Agua">

    </body>
</html>
