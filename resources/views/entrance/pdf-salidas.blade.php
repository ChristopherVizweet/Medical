
<!DOCTYPE html>
<html>
<head>


    <title>Registro de salidas</title>

    {{--Aqui comienzan los estilos--}}
<style>
.info-basica {
    display: flex;       /* Pone todo en línea */
    flex-wrap: wrap;     /* Si no caben, bajan de línea */
    gap: 15px;           /* Espacio entre columnas */
}
.info-basica p {
    margin: 0;
}

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
#titulo{
    text-align: center;
    color: dodgerblue;
}
#header{
    color: dodgerblue;
}
#header.img{
    float: left;
    height: 250%;
    width: 250px;
}
#logo{
    height: auto;
    width: 300px;
}

</style>
    
</head>

    <body>
    {{--Aqui comienza el diseño del reporte de PDF--}}
<div class="contenedor-duplicado">
    <div class="vale">
    <div id="header">
        <img id="logo" src="{{ public_path('img/logo1.png') }}" alt="Logo Empresa" >
        <h1 id="titulo">VALES DE SALIDA</h1>
    </div>
    <div class="info-basica">
        <p id="fecha"><strong>FECHA: </strong>{{$movimientos->fecha_movimiento ?? 'Sin fecha'}}</p>
        <p id="empleado"><strong>SOLICITA: </strong>{{$movimientos->productos->first()->empleado->Nombre ?? 'Sin nombre'}}</p>
        <p id="obra"><strong>OBRA: </strong>{{$movimientos->productos->first()->obra_movimiento ?? 'Sin nombre de obra'}}</p>
        <p id="folio"><strong>FOLIO N°: </strong>{{$movimientos->productos->first()->folio_movimiento ?? 'Sin folio'}}</p>
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
    @foreach ($movimientos->productos as $detalle)
    <tr>
        <td>{{ $detalle->product->name_product ?? 'sin producto' }}</td>
        <td>{{ $detalle->cantidadR ?? 'sin cantidad requerida' }}</td>
        <td>{{ $detalle->cantidadA ?? 'sin cantidad aprobada' }}</td>
        <td>{{ $detalle->cantidad ?? 'sin cantidad' }}</td>
        <td>{{ $movimientos->observaciones_movimiento ?? 'sin observaciones' }}</td>
    </tr>
    @endforeach
</tbody>

    </table>
 
    </div>
    
    


    

<img id="marca-agua" src="{{ public_path('img/marca_agua.png') }}" alt="Marca de Agua">

    </body>
</html>
