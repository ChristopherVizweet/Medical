<!DOCTYPE html>
<html>

<head>
  <title>BITÁCORA DE SERVICIOS</title>
  <style>
    body {
      margin: 0;
      margin-bottom: 40px;
      font-family: DejaVu Sans, sans-serif;
      font-size: 10px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    td {

      padding: 5px;
      text-align: left;
      font-size: 15px;
    }

    th {
      border: 1px solid #000;
      padding: 5px;
      text-align: center;
    }

    #datos_vehiculo {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    #datos_vehiculo td {
      padding: 5px;
      vertical-align: top;
      text-align: center;
    }

    h1 {
      text-align: center;
      font-size: 20px;
    }

    thead {
      background-color: #86c1e9;
      border: 1px solid #000;
      text-align: center;
    }

    tbody td {
      border: 1px solid #000;
    }

    h2 {
      text-align: center;
      font-size: 25px;
    }

    h3 {
      text-align: center;
      font-size: 9px;
    }

    #folio {
      color: red;
      justify-content: right;
    }

    #TemaDescripcion h1 {
      font-size: 15px;

    }

    #logo1 {
      width: 300px;
      align-items: center;
      margin-left: 28%;
      margin-bottom: 5%;
    }
  </style>

</head>

<body>

  <div id="general">
    <div id="header">
      <img id="logo1" src="{{ public_path('img/logo1.png') }}" alt="Logo Empresa">
      <h2 style="text-align: center; margin-top: 20px;">Registro de mantenimiento/servicio</h2>
      <h1>DATOS DEL VEHÍCULO</h1>
    </div>
    <table id="datos_vehiculo">
      <tr>
        <td>
          <p id="folio"><strong>FOLIO DEL VEHÍCULO:</strong> v{{ $mantenimientos->first()->vehiculo->id ?? 'Sin especificar'}}</p>
          <p><strong>Nombre del vehículo:</strong> {{ $mantenimientos->first()->vehiculo->nombre_vehiculo ?? 'Sin especificar'}}</p>
          <p><strong>Número de serie: </strong>{{$mantenimientos->first()->vehiculo->numeroSerie_vehiculo ?? 'Sin especificar'}}</p>
        </td>
        <td>
          <p><strong>Marca: </strong>{{$mantenimientos->first()->vehiculo->marca_vehiculo ?? 'No especificado' }}</p>
          <p><strong>Modelo(Año): </strong>{{$mantenimientos->first()->vehiculo->modeloAño_vehiculo ?? 'No especificado'}}</p>
          <p><strong>Placas: </strong>{{$mantenimientos->first()->vehiculo->placas_vehiculo ?? 'No especificado'}}</p>
        </td>
        <td>
          <p><strong>Área perteneciente: </strong>{{$mantenimientos->first()->vehiculo->area_vehiculo ?? 'No especificado'}}</p>
          <p><strong>Encargado del vehículo: </strong>{{$mantenimientos->first()->vehiculo->encargado->Nombre ?? 'No especificado'}}</p>
        </td>
        @if ($mantenimientos->first()->vehiculo->photo_vehiculo ?? 'Sin imagen')
        <td>
          <p><strong>Foto del Vehículo</strong></p>
          <img src="{{ public_path('storage/' . $mantenimientos->first()->vehiculo->photo_vehiculo) }}" alt="Foto del Vehículo" width="100px">
        </td>
        @else
        <div class="mt-2 justify-center justify-items-center text-center">
          <p class="text-sm text-gray-600 dark:text-gray-300 text-center">No hay imagen disponible</p>
        </div>
        @endif
      </tr>
    </table>
  </div>
  <div id="registro_mantenimiento">

    <h1>DESCRIPCIÓN DE MANTENIMIENTOS REALIZADOS</h1>
    <table>
      <thead>

        <tr>
          <th>FECHA DE SERVICIO</th>
          <th>CONCEPTO</th>
          <th>CANTIDAD</th>
          <th>COSTO UNITARIO</th>
          <th>TOTAL</th>
          <th>KM</th>
          <th>ENCARGADO DE MANTENIMIENTO</th>
        </tr>
      </thead>
      <tbody>
        @php $totalGeneral = 0; @endphp
        @foreach ($mantenimientos as $mantenimiento)
        @php $total = $mantenimiento->costoUnitario_vehiculo; $totalGeneral += $total; @endphp
        <tr>
          <td>{{ $mantenimiento->fecha_servicio_vehiculo }}</td>
          <td>{{ $mantenimiento->concepto_vehiculo }}</td>
          <td>{{ $mantenimiento->cantidad_vehiculo }}</td>
          <td>${{ $mantenimiento->costoUnitario_vehiculo }}</td>
          <td>${{ $total }}</td>
          <td>{{ $mantenimiento->km_vehiculo }}km</td>
          <td>{{ $mantenimiento->responsables->Nombre ?? 'No especificado' }}</td>
        </tr>
        @endforeach
        <tr>
          <td colspan="4" style="text-align: right; font-weight: bold;">TOTAL GENERAL:</td>
          <td style="font-weight: bold;">${{ $totalGeneral }}</td>
          <td colspan="2"></td>
        </tr>
      </tbody>
    </table>

  </div>
</body>

</html>