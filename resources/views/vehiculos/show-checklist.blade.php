<!DOCTYPE html>
<html>

<head>


    <title>Registro de checklist</title>


    <style>
        #encabezado {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border: black 1px solid;
            padding: 10px;
        }

        #titulo {
            font-size: small;
            text-align: right;
        }
        #encargado{
            font-size: small;
            text-align: left;
        }

   #cuerpo{
    margin-top: 10px;
    width: 100%;
    font-size: 0;
}

.columna{
    display: inline-block;
    vertical-align: top;
    width: 23%;
    font-size: 16px;
    border: 1px solid black;
    box-sizing: border-box;
    padding: 10px;
}
#kilometraje{
    text-align: center;
    font-size: 16px;
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
                <h1 id="encargado">REVISADO POR: {{ $encargados->name }}</h1>
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
<table width="100%" border="1" cellspacing="0" cellpadding="10">
   
    <tr>
        <td>
            KILOMETRAJE INICIAL: {{ $checks->kilometraje_inicial ?? 'Sin kilometraje'}}
        </td>
        <td>
            KILOMETRAJE FINAL: {{ $checks->kilometraje_final ?? 'Sin kilometraje'}}
        </td>
        <td>
        DIFERENCIA DE KILOMETRAJE: {{ $checks->kilometraje_final - $checks->kilometraje_inicial ?? 'Sin kilometraje'}}
        </td>
    </tr>
</table>

</body>

</html>