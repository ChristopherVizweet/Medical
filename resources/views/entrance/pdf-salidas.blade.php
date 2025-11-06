
<!DOCTYPE html>
<html>
<head>


    <title>Registro de salidas</title>

    {{--Aqui comienzan los estilos--}}
<style>

.info-basica {
    text-align: center;    /* centra horizontalmente todo el bloque */
    margin-top: 50px;     /* lo baja un poco desde arriba */
}

.info-basica p {
    display: inline-block; /* hace que se alineen en línea */
    margin: 0 5px;        /* espacio entre ellos */
    margin-left: -90px;
    margin-left: 8px;       /* quitamos padding extra */
}

#folio{color: red;
float: right;}
.texto_footer {color: blue}

#titulo{
    text-align: center;
    color: #2F9DD6;
    margin-top: -50px;
    font-size: 25px;
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
    width: 150px;
}
.cantidad{
    text-align: center;
}
.vale {
    border-bottom: 2px dashed #000; /* línea divisoria */
    margin-bottom: 20px;
    padding-bottom: 20px;
}
table{
    font-size: 12px;
}
th, td {
  border: 1px solid grey; /* Borde gris para todas las celdas */
}
#titlemenu{
    font-size: 13px;
}

.caja{
  display: inline-block; /* Muestra el elemento como un bloque pero fluye como inline */
  width: 100px;
  height: 0px;
  margin: 60px;
  margin-top: 70px;
}
.linea{
    border-top: 1px solid #000;
    width: 90%;  /* línea más larga */
}


</style>
    
</head>

    <body>
<div class="contenedor-duplicado">
    <div class="vale">
    {{--Aqui comienza el diseño del reporte de PDF--}}
   
    <div id="header">
        <img id="logo" src="{{ public_path('img/logo1.png') }}" alt="Logo Empresa" >
        <h1 id="titulo">VALE DE SALIDA</h1>
        <p id="folio"><strong>FOLIO N°: </strong>{{$movimientos->productos->first()->folio_movimiento ?? 'Sin folio'}}</p>
    </div>
    <div class="info-basica">
        <p ><strong>FECHA: </strong>{{$movimientos->fecha_movimiento ?? 'Sin fecha'}}</p>
        <p ><strong>SOLICITA: </strong>{{$movimientos->productos->first()->empleado->Nombre ?? 'Sin nombre'}}</p>
        <p ><strong>OBRA: </strong>{{$movimientos->productos->first()->obra_movimiento ?? 'Sin nombre de obra'}}</p>
        <p><strong>HORA: </strong>{{$movimientos->created_at ? $movimientos->created_at->format('H:i:s') : 'Sin hora'}}</p>
    </div>
        

    <div>
       <h2 id="titlemenu">Productos de salida</h2>
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
        <td>{{ $detalle->product->name_product ?? 'sin producto' }} Diametro {{ $detalle->product->diameterMM_product ?? 'sin diámetro' }} mm</td>
        <td class="cantidad">{{ $detalle->cantidadR ?? 'sin cantidad requerida' }}</td>
        <td class="cantidad">{{ $detalle->cantidadA ?? 'sin cantidad aprobada' }}</td>
        <td class="cantidad">{{ $detalle->cantidad ?? 'sin cantidad' }}</td>
        <td class="cantidad">{{ $movimientos->observaciones_movimiento ?? 'sin observaciones' }}</td>
    </tr>
    @endforeach
        </tbody>

    </table>
    </div>
    <!--Aqui estan la parte de las firmas-->
        <div class="contenedor-firmas">
            <div class="caja">
                <div class="linea"></div>
                <h5>Firma de autorización</h5>
            </div>
            <div class="caja">
                <div class="linea"></div>
                <h5>Firma encargado</h5>
            </div>
            <div class="caja">
                <div class="linea"></div>
                <h5>Firma quien recibe</h5>
            </div>
        </div>
</div>
<!--Aqui esta el duplicado-->
<div class="vale">
    {{--Aqui comienza el diseño del reporte de PDF--}}
   
    <div id="header">
        <img id="logo" src="{{ public_path('img/logo1.png') }}" alt="Logo Empresa" >
        <h1 id="titulo">VALE DE SALIDA</h1>
        <p id="folio"><strong>FOLIO N°: </strong>{{$movimientos->productos->first()->folio_movimiento ?? 'Sin folio'}}</p>
    </div>
    <div class="info-basica">
        <p ><strong>FECHA: </strong>{{$movimientos->fecha_movimiento ?? 'Sin fecha'}}</p>
        <p ><strong>SOLICITA: </strong>{{$movimientos->productos->first()->empleado->Nombre ?? 'Sin nombre'}}</p>
        <p ><strong>OBRA: </strong>{{$movimientos->productos->first()->obra_movimiento ?? 'Sin nombre de obra'}}</p>
        <p><strong>HORA: </strong>{{$movimientos->created_at ? $movimientos->created_at->format('H:i:s') : 'Sin hora'}}</p>
    </div>
    <div>
       <h2 id="titlemenu">Productos de salida</h2>
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
        <td>{{ $detalle->product->name_product ?? 'sin producto' }} Diametro {{ $detalle->product->diameterMM_product ?? 'sin diámetro' }} mm</td>
        <td class="cantidad">{{ $detalle->cantidadR ?? 'sin cantidad requerida' }}</td>
        <td class="cantidad">{{ $detalle->cantidadA ?? 'sin cantidad aprobada' }}</td>
        <td class="cantidad">{{ $detalle->cantidad ?? 'sin cantidad' }}</td>
        <td class="cantidad">{{ $movimientos->observaciones_movimiento ?? 'sin observaciones' }}</td>
    </tr>
    @endforeach
</tbody>

</table>
    </div>
     <!--Aqui estan la parte de las firmas-->
        <div class="contenedor-firmas">
            <div class="caja">
                <div class="linea"></div>
                <h5>Firma de autorización</h5>
            </div>
            <div class="caja">
                <div class="linea"></div>
                <h5>Firma encargado</h5>
            </div>
            <div class="caja">
                <div class="linea"></div>
                <h5>Firma quien recibe</h5>
            </div>
        </div>
</div> 
</div>    
    </body>
</html>
