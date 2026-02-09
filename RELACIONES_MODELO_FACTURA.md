# Relaciones del Modelo Factura - Explicación Detallada

## 📋 Descripción General

El modelo `Factura` representa los comprobantes fiscales de compra de materiales en tu sistema ERP de gases medicinales. Esta factura es fundamental porque gestiona:

- **Información de proveedores** (quién vende)
- **Información de empresas receptoras** (quién compra)
- **Responsables** de diferentes áreas (almacén, transporte, obra)
- **Vinculación con proyectos** (dónde se usan los materiales)
- **Trazabilidad** mediante entradas de inventario

---

## 🔗 Relaciones Definidas

### 1. **BelongsTo: responsableAlmacen() → Empleados**

#### Tipo de Relación
- **Tipo**: `belongsTo` (Muchos a Uno - relación inversa)
- **Tabla foránea**: `empleados`
- **Clave foránea**: `responsable_almacen_id_factura`

#### ¿Por qué existe?
```php
public function responsableAlmacen()
{
    return $this->belongsTo(Empleados::class, 'responsable_almacen_id_factura');
}
```

**Propósito**: Identificar **quién recibe y almacena los materiales** que llegan en la factura.

**Contexto de Negocio**:
- Cuando llega una factura con materiales, debe haber una persona responsable de recibirla
- Este empleado será quien valide la cantidad y calidad de los materiales
- Sirve para **trazabilidad y auditoría**: saber quién recibió qué y cuándo
- Es importante para **reclamos**: si los materiales llegan dañados, se sabe quién los recibió

**Ejemplo de uso**:
```php
$factura = Factura::find(1);
$responsable = $factura->responsableAlmacen(); // Obtiene el empleado responsable del almacén
// Resultado: El empleado "Juan García" que recibió esta factura en almacén
```

**Consideraciones**:
- `nullable` → No es obligatorio (una factura podría no tener responsable asignado)
- `onDelete('set null')` → Si se elimina el empleado, la factura no se borra, solo se quita la referencia

---

### 2. **BelongsTo: responsableChofer() → Empleados**

#### Tipo de Relación
- **Tipo**: `belongsTo` (Muchos a Uno)
- **Tabla foránea**: `empleados`
- **Clave foránea**: `responsable_chofer_id_factura`

#### ¿Por qué existe?

```php
public function responsableChofer()
{
    return $this->belongsTo(Empleados::class, 'responsable_chofer_id_factura');
}
```

**Propósito**: Identificar **quién es responsable del transporte/envío** de los materiales.

**Contexto de Negocio**:
- Una vez que se aprueban los materiales en almacén, deben ser **transportados al sitio de obra**
- El chofer es el responsable de este movimiento y debe **firmar el comprobante de entrega**
- Sirve para saber **en qué momento y por quién** se mandaron los materiales
- Importante para seguimiento: ¿el material ya llegó al destino?

**Ejemplo de uso**:
```php
$factura = Factura::find(1);
$chofer = $factura->responsableChofer(); // Obtiene el empleado chofer
// Resultado: El empleado "Carlos López" que transportó los materiales
```

**Consideraciones**:
- Diferente del responsable de almacén
- El mismo empleado puede ser chofer en varias facturas
- Importante para gestión logística

---

### 3. **BelongsTo: responsableObra() → Empleados**

#### Tipo de Relación
- **Tipo**: `belongsTo` (Muchos a Uno)
- **Tabla foránea**: `empleados`
- **Clave foránea**: `responsable_obra_factura`

#### ¿Por qué existe?

```php
public function responsableObra()
{
    return $this->belongsTo(Empleados::class, 'responsable_obra_factura');
}
```

**Propósito**: Identificar **quién es responsable en la obra/proyecto** donde se reciben los materiales.

**Contexto de Negocio**:
- Los materiales llegaran a un sitio de obra específico
- Debe haber un responsable **en el sitio** que reciba y autorice la entrada de materiales
- Este es típicamente un **supervisor, capataz o encargado de obra**
- Sirve para:
  - Validar que los materiales llegaron al lugar correcto
  - Verificar que la cantidad y tipo coincide con lo pedido
  - Autorizar el uso de los materiales en la obra

**Ejemplo de uso**:
```php
$factura = Factura::find(1);
$responsableObra = $factura->responsableObra(); // Obtiene el empleado responsable de obra
// Resultado: El empleado "Miguel Rodríguez" (supervisor en la obra)
```

**Consideraciones**:
- Es diferente del responsable de almacén (ese está en la central)
- Es diferente del chofer (ese solo transporta)
- Un empleado puede ser responsable de múltiples obras

---

### 4. **BelongsTo: proyecto() → Project**

#### Tipo de Relación
- **Tipo**: `belongsTo` (Muchos a Uno)
- **Tabla foránea**: `projects`
- **Clave foránea**: `obra_factura`

#### ¿Por qué existe?

```php
public function proyecto()
{
    return $this->belongsTo(Project::class, 'obra_factura');
}
```

**Propósito**: Vincular **la factura al proyecto/obra específica** para la cual se compran los materiales.

**Contexto de Negocio**:
- Cada factura está ligada a una obra o proyecto específico
- Esto es crucial para:
  - **Costos por proyecto**: saber cuánto cuesta cada proyecto
  - **Rastreabilidad**: qué materiales se usaron en qué obra
  - **Presupuesto**: validar que no se exceda el presupuesto del proyecto
  - **Facturación**: incluir costos de materiales en la factura al cliente

**Ejemplo de uso**:
```php
$factura = Factura::find(1);
$proyecto = $factura->proyecto(); // Obtiene el proyecto
// Resultado: Proyecto "Instalación Hospital San José"

// Acceder a información del proyecto
echo $proyecto->nameProject; // Instalación Hospital San José
echo $proyecto->budget; // $50,000
```

**Consideraciones**:
- `nullable` → Una factura podría no estar ligada a un proyecto específico (compra general)
- Un proyecto puede tener muchas facturas (relación inversa: `hasMany`)
- Fundamental para análisis financiero por proyecto

---

### 5. **HasMany: entradas() → Entrance**

#### Tipo de Relación
- **Tipo**: `hasMany` (Uno a Muchos)
- **Tabla relacionada**: `entrances`
- **Clave foránea en entrances**: `factura_id`

#### ¿Por qué existe?

```php
public function entradas()
{
    return $this->hasMany(Entrance::class, 'factura_id');
}
```

**Propósito**: Gestionar **todos los registros de entrada de inventario** generados por esta factura.

**Contexto de Negocio**:
- Una factura puede contener **múltiples productos diferentes**
- Cada producto que entra en almacén crea un **registro de entrada**
- La relación permite:
  - **Trazabilidad completa**: ver qué productos vinieron en esta factura
  - **Control de inventario**: registrar entrada de cada item
  - **Auditoría**: saber cuándo entró cada producto y de qué factura

**Flujo Real**:
```
1. Se crea la Factura (comprobante fiscal)
   ↓
2. Se aprueban los materiales en almacén
   ↓
3. Se crean múltiples registros de Entrada
   - Entrada: 50 tubos de oxígeno
   - Entrada: 30 tubos de CO2
   - Entrada: 20 válvulas reguladoras
   ↓
4. Se actualiza el inventario
```

**Ejemplo de uso**:
```php
$factura = Factura::find(1);
$entradas = $factura->entradas(); // Obtiene todas las entradas

foreach($entradas as $entrada) {
    echo "Producto: " . $entrada->product_id . " - Cantidad: " . $entrada->existence_entrance;
}
// Resultado:
// Producto: 1 - Cantidad: 50
// Producto: 2 - Cantidad: 30
// Producto: 3 - Cantidad: 20
```

**Consideraciones**:
- Una factura puede tener 0 o muchas entradas
- Cada entrada está vinculada a UN producto específico
- La suma de todas las entradas de una factura = total de materiales recibidos

---

## 📊 Diagrama de Relaciones

```
┌─────────────────────────────────────────────────────────────┐
│                       FACTURA                                │
│  (Comprobante Fiscal de Compra)                              │
└─────────────────────────────────────────────────────────────┘
           │                  │                  │
    ┌──────┴──────┐   ┌──────┴──────┐   ┌──────┴──────┐
    │             │   │             │   │             │
    ▼             ▼   ▼             ▼   ▼             ▼
┌──────────┐ ┌──────────┐ ┌──────────┐ ┌──────────┐ ┌──────────┐
│EMPLEADOS │ │EMPLEADOS │ │EMPLEADOS │ │ PROJECT  │ │ENTRANCE  │
│          │ │          │ │          │ │          │ │          │
│Almacén   │ │ Chofer   │ │ Obra     │ │          │ │          │
│          │ │ (RH)     │ │(Supervisor)           │ │(Uno a     │
└──────────┘ └──────────┘ └──────────┘ └──────────┘ │Muchos)   │
    1:N         1:N         1:N           1:N        │          │
(BelongsTo) (BelongsTo) (BelongsTo)   (BelongsTo)   └──────────┘

          ┌─────────┬────────────┬──────────┬──────────┬────────┐
          │ Persona │ Documento  │ Fecha    │ Estado   │Archivos│
          │ RFC     │ Folio      │Emisión   │Status    │PDF/XML │
          │         │ Fiscal     │Vencmto   │          │        │
          │         │            │Pago      │          │        │
          └─────────┴────────────┴──────────┴──────────┴────────┘
```

---

## 🔄 Casos de Uso Prácticos

### Caso 1: Consultar Información Completa de una Factura

```php
// Controller
public function show($id)
{
    $factura = Factura::with([
        'responsableAlmacen',      // Cargar responsable del almacén
        'responsableChofer',        // Cargar responsable del transporte
        'responsableObra',          // Cargar responsable de la obra
        'proyecto',                 // Cargar proyecto
        'entradas'                  // Cargar todas las entradas
    ])->find($id);
    
    return view('facturas.show', compact('factura'));
}

// En la Vista
<div class="factura-details">
    <p><strong>Proyecto:</strong> {{ $factura->proyecto->nameProject }}</p>
    <p><strong>Recibido por (Almacén):</strong> {{ $factura->responsableAlmacen->Nombre }}</p>
    <p><strong>Transportado por:</strong> {{ $factura->responsableChofer->Nombre }}</p>
    <p><strong>Autorizado en Obra por:</strong> {{ $factura->responsableObra->Nombre }}</p>
    
    <h3>Materiales Recibidos:</h3>
    <ul>
    @foreach($factura->entradas as $entrada)
        <li>Cantidad: {{ $entrada->existence_entrance }}</li>
    @endforeach
    </ul>
</div>
```

### Caso 2: Reportes por Responsable

```php
// Reporte: ¿Cuántas facturas ha recibido un empleado en almacén?
$empleado = Empleados::find($id);
$facturasRecibidas = Factura::where('responsable_almacen_id_factura', $id)->get();

// Reporte: ¿Cuántos materiales ha transportado un chofer?
$chofer = Empleados::find($id);
$facturasTransportadas = Factura::where('responsable_chofer_id_factura', $id)->get();
```

### Caso 3: Análisis de Costos por Proyecto

```php
// ¿Cuánto dinero se ha gastado en materiales para un proyecto?
$proyecto = Project::find($id);
$totalGastado = $proyecto->facturas()->sum('total_factura');

// ¿Está el proyecto dentro del presupuesto?
$porcentajeUsado = ($totalGastado / $proyecto->budget) * 100;
```

### Caso 4: Auditoría de Entrada

```php
// ¿Qué pasó con los materiales de la factura #123?
$factura = Factura::find(123);

// Ver todos los productos que entraron
$productosProcesados = $factura->entradas()
    ->with('product')
    ->get();

// Ver responsables en toda la cadena
echo "Recibido en almacén por: " . $factura->responsableAlmacen->Nombre;
echo "Transportado por: " . $factura->responsableChofer->Nombre;
echo "Recibido en obra por: " . $factura->responsableObra->Nombre;
```

---

## 🎯 Mejores Prácticas

### 1. **Usar Eager Loading**
```php
// ❌ Malo - Genera múltiples queries
$factura = Factura::find(1);
$almacen = $factura->responsableAlmacen; // Query 1
$chofer = $factura->responsableChofer;   // Query 2
$obra = $factura->responsableObra;       // Query 3

// ✅ Bueno - Una sola query con JOIN
$factura = Factura::with('responsableAlmacen', 'responsableChofer', 'responsableObra')->find(1);
```

### 2. **Validar que Relacionados Existan**
```php
// Antes de mostrar datos
if($factura->responsableAlmacen) {
    echo $factura->responsableAlmacen->Nombre;
} else {
    echo "Sin responsable asignado";
}
```

### 3. **Usar Scopes para Consultas Comunes**
```php
// En el modelo Factura
public function scopeConResponsables($query)
{
    return $query->with('responsableAlmacen', 'responsableChofer', 'responsableObra');
}

// Uso
$facturas = Factura::conResponsables()->get();
```

---

## 🚨 Notas Importantes

### Datos Duales: RFC/Nombre
Nota que en la tabla tienes campos duplicados:
- `rfc_emisor` y `nombre_emisor` (proveedor)
- `rfc_receptor` y `nombre_receptor` (empresa)

**Recomendación**: Considera denormalizar menos datos y usar relaciones:

```php
// Alternativa mejor estructurada (futura mejora):
public function supplier()  // proveedor
{
    return $this->belongsTo(Supplier::class, 'supplier_id');
}

public function company()   // empresa receptora
{
    return $this->belongsTo(Company::class, 'company_id');
}
```

### Archivos Adjuntos
Los campos `comprobante_pdf` y `comprobante_xml` guardan rutas de archivos. Considera:
- Usar un modelo `FacturaArchivo` para gestionar múltiples versiones
- Implementar validación de integridad XML
- Mantener respaldos

---

## 📝 Resumen de Relaciones

| Relación | Tipo | Modelo | Propósito | Obligatorio |
|----------|------|--------|-----------|------------|
| **responsableAlmacen** | belongsTo | Empleados | Quién recibe en almacén | No |
| **responsableChofer** | belongsTo | Empleados | Quién transporta | No |
| **responsableObra** | belongsTo | Empleados | Quién autoriza en obra | No |
| **proyecto** | belongsTo | Project | Obra donde se usan materiales | No |
| **entradas** | hasMany | Entrance | Registros de entrada de inventario | Sí |

---

**Última actualización**: 26 de enero de 2026
**Versión del modelo**: 1.0 con relaciones definidas
