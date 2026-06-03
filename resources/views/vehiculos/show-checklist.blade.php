<!DOCTYPE html>
<html>

<head>


    <title>Registro de checklist</title>


    <style>
        :root {
            color-scheme: light;
            color: #0f172a;
            background: #f8fafc;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #f8fafc;
        }

        #page {
            max-width: 1080px;
            margin: 0 auto;
            padding: 24px;
        }

        #encabezado {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            padding: 20px;
            border: 1px solid #cbd5e1;
            border-radius: 24px;
            background: #ffffff;
            box-shadow: 0 14px 32px rgba(15, 23, 42, 0.08);
        }

        #encabezado img {
            max-width: 160px;
            height: auto;
        }

        #titulo {
            font-size: 14px;
            text-align: right;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #0f172a;
            font-weight: 700;
        }

        #encargado {
            font-size: 13px;
            text-align: left;
            color: #334155;
            font-weight: 600;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            color: #0f172a;
            margin-top: 14px;
        }

        table th,
        table td {
            padding: 14px 16px;
            vertical-align: top;
            border: 1px solid #cbd5e1;
        }

        table th {
            background: #f8fafc;
            color: #475569;
            text-align: left;
            font-size: 13px;
            letter-spacing: 0.01em;
        }

        table tbody tr {
            background: #ffffff;
        }

        table tbody tr:nth-child(even) {
            background: #f8fafc;
        }

        .section-title td {
            background: #e2e8f0;
            color: #0f172a;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            font-size: 13px;
        }

        h4 {
            margin: 28px 0 12px;
            font-size: 18px;
            letter-spacing: 0.03em;
            color: #0f172a;
        }

        h3 {
            margin: 18px 0 8px;
            font-size: 16px;
            color: #0f172a;
        }

        #verificaciones {
            margin-top: 12px;
        }

        .section-grid {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            margin-top: 12px;
        }

        .section-grid td {
            width: 33%;
            vertical-align: top;
            padding: 0 10px 10px 0;
        }

        .section-card {
            border: 1px solid #cbd5e1;
            border-radius: 18px;
            background: #ffffff;
            overflow: hidden;
        }

        .section-card-header {
            padding: 14px 16px;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            color: #0f172a;
            background: #f8fafc;
        }

        .section-card-table {
            width: 100%;
            border-collapse: collapse;
        }

        .section-card-table td {
            padding: 10px 12px;
            border-top: 1px solid #e2e8f0;
            font-size: 12px;
            color: #334155;
        }

        .section-card-table tr:nth-child(even) td {
            background: #f8fafc;
        }

        .section-card-item {
            font-weight: 600;
        }

        .section-card-result {
            text-align: right;
            color: #475569;
        }
    </style>

</head>

<body>
    <div id="encabezado">
    <img id="logo" src="{{ public_path('img/logo1.png') }}" alt="Logo Empresa">

        <table width="100%" cellspacing="0" cellpadding="10">
            <tr>
            <td>
            </td>
            <td>
                <h1 id="encargado">REVISADO POR: {{ $encargados->name ?? 'Sin encargado' }}</h1>
            </td>
            <td>
                <h1 id="titulo">CHECK LIST PRE USO DE VEHÍCULOS</h1>
            </td>
            </tr>
        </table>
    </div>

    <!-- Aqui comienza el cuerpo del documento-->
    <table width="100%" border="1" cellspacing="0" cellpadding="10">
    <tr>
        <td>
            TIPO DE VEHÍCULO: {{ $vehiculos->nombre_vehiculo }}
        </td>

        <td>
            SALIDA A: {{ $checks->destino_check }}
        </td>

        <td>
            PLACAS: {{ $vehiculos->placas_vehiculo ?? 'Sin registro'}}
        </td>
    </tr>
</table>

<table width="100%" border="1" cellspacing="0" cellpadding="10">
    <tr>
        <td>
            CONDUCTOR: {{ $conductores->Nombre }}
        </td>

        <td>
            FECHA DE SALIDA: {{ $checks->fecha_salida_checklist }}
        </td>

        <td>
            HORA DE INSPECCIÓN: {{ $checks->hora_inspeccion }}
        </td>
    </tr>
</table>

<table width="100%" border="1" cellspacing="0" cellpadding="10">
    <tr>
        <td>
            MOTIVO DE SALIDA: {{ $checks->motivo_checklist }}
        </td>
    </tr>
</table>

<table width="100%" border="1" cellspacing="0" cellpadding="10">
    <tr>
        <td>
            FECHA DE ENTREGA: {{ $checks->fecha_entrega_checklist ?? 'Sin fecha de entrega'}}
        </td>
    </tr>
</table>
 <h4 id="kilometraje">KILOMETRAJE</h4>
<table width="100%" cellspacing="0" cellpadding="10">
    <tr>
        <td>KILOMETRAJE INICIAL: {{ $checks->kilometraje_inicial ?? 'Sin kilometraje' }}</td>
        <td>KILOMETRAJE FINAL: {{ $checks->kilometraje_final ?? 'Sin kilometraje' }}</td>
        <td>DIFERENCIA DE KILOMETRAJE: {{ $checks->kilometraje_final && $checks->kilometraje_inicial ? $checks->kilometraje_final - $checks->kilometraje_inicial : 'Sin kilometraje' }}</td>
    </tr>
</table>

<h4 id="kilometraje">REGISTRO DE SECCIONES</h4>
@php $columnCount = 0; @endphp
<table class="section-grid" id="verificaciones" cellspacing="0" cellpadding="0">
    <tr>
        @foreach ($seccions as $seccion)
            <td>
                <div class="section-card">
                    <div class="section-card-header">{{ $seccion->nombre_seccion_ch }}</div>
                    <div class="section-card-body">
                        <table class="section-card-table" cellspacing="0" cellpadding="0">
                            <tbody>
                                @foreach ($seccion->items as $item)
                                    @php
                                        $respuesta = $items->firstWhere('id_item', $item->id);
                                        $estado = $respuesta
                                            ? ($respuesta->estado_item === 'bueno'
                                                ? 'Bueno'
                                                : ($respuesta->estado_item === 'malo'
                                                    ? 'Malo'
                                                    : ($respuesta->estado_item === 'no_aplica'
                                                        ? 'No aplica'
                                                        : ucfirst($respuesta->estado_item))))
                                            : 'Sin respuesta';
                                    @endphp
                                    <tr>
                                        <td class="section-card-item">{{ $item->nombre_items_ch }}</td>
                                        <td class="section-card-result">{{ $estado }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </td>
            @php $columnCount++; @endphp
            @if($columnCount % 3 == 0 && !$loop->last)
                </tr><tr>
            @endif
        @endforeach
        @if($columnCount % 3 != 0)
            @for($i = 0; $i < 3 - ($columnCount % 3); $i++)
                <td></td>
            @endfor
        @endif
    </tr>
</table>
</body>

</html>