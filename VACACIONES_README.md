# Sistema de Gestión de Vacaciones de Empleados

## 📋 Descripción

Sistema completo para gestionar y visualizar las vacaciones de los empleados. Permite:
- Ver el historial de vacaciones de cada empleado
- Registrar nuevos períodos de vacaciones
- Calcular automáticamente días ocupados y disponibles
- Mostrar estados de vacaciones (aprobado, pendiente, rechazado)

## 🚀 Instalación

### 1. Ejecutar Migraciones
```bash
php artisan migrate
```

Este comando creará:
- Tabla `empleado_vacaciones`: Almacena los períodos de vacaciones
- Campo `derecho_vacaciones` en tabla `empleados`

### 2. Cargar Datos de Prueba (Opcional)
```bash
php artisan db:seed --class=EmpleadoVacacionesSeeder
```

## 📁 Archivos Creados/Modificados

### Nuevos Archivos:
1. **app/Models/EmpleadoVacaciones.php**
   - Modelo para gestionar períodos de vacaciones
   - Relación con modelo Empleados

2. **database/migrations/2026_08_17_000000_create_empleado_vacaciones_table.php**
   - Migración para crear tabla y campos necesarios

3. **database/seeders/EmpleadoVacacionesSeeder.php**
   - Datos de prueba para desarrollo

4. **resources/views/employees/show-vacaciones-employees.blade.php**
   - Vista principal del sistema
   - Información del empleado, vacaciones y formulario

### Archivos Modificados:
1. **app/Http/Controllers/EmpleadosController.php**
   - Métodos: `showVacaciones()`, `storeVacaciones()`

2. **app/Models/Empleados.php**
   - Relación `vacaciones()` agregada

3. **routes/web.php**
   - Rutas GET/POST para gestión de vacaciones

4. **resources/views/employees/index-employees.blade.php**
   - Link "Ver vacaciones" actualizado

## 🎯 Rutas Disponibles

| Método | Ruta | Descripción |
|--------|------|-------------|
| GET | `/vacaciones-employee/{id}` | Ver vacaciones del empleado |
| POST | `/vacaciones-employee/{id}` | Guardar nuevo período |

## 🖥️ Interfaz de Usuario

### Vista de Vacaciones (`show-vacaciones-employees.blade.php`)

**Sección 1: Información del Empleado**
- ID y número de checador
- Nombre completo
- Puesto
- Antigüedad calculada automáticamente

**Sección 2: Resumen de Vacaciones**
- Derecho a vacaciones (default 16 días)
- Días ocupados (suma de todos los períodos)
- Días disponibles (derecho - ocupados)
- Foto del empleado

**Sección 3: Historial de Vacaciones**
- Tabla con todos los períodos registrados
- Fechas de inicio y fin
- Cantidad de días tomados
- Estado (aprobado/pendiente/rechazado)

**Sección 4: Formulario de Nuevas Vacaciones**
- Fecha de inicio (requerida)
- Fecha de fin (requerida)
- Estado (aprobado/pendiente/rechazado)
- Observaciones (opcional)

## 💾 Estructura de Base de Datos

### Tabla: empleado_vacaciones
```
- id: int (primary key)
- empleado_id: int (foreign key)
- fecha_inicio: date
- fecha_fin: date
- dias_tomados: int (calculado automáticamente)
- estado: string ('aprobado', 'pendiente', 'rechazado')
- observaciones: text (nullable)
- created_at: timestamp
- updated_at: timestamp
```

### Campo en tabla: empleados
```
- derecho_vacaciones: int (default 16)
```

## 🔧 Validación

El formulario valida:
- ✅ Fecha de inicio es requerida
- ✅ Fecha de fin es requerida
- ✅ Fecha de fin no puede ser anterior a fecha de inicio
- ✅ Estado debe ser uno de: aprobado, pendiente, rechazado
- ✅ Observaciones máximo 255 caracteres

## 📊 Cálculos Automáticos

### Días Tomados
Calculado como: `fecha_fin - fecha_inicio + 1`

Ejemplo: Del 11/02 al 15/02 = 5 días

### Días Disponibles
Calculado como: `derecho_vacaciones - dias_ocupados`

Ejemplo: 16 - 14 = 2 días disponibles

### Antigüedad
Se calcula automáticamente a partir de `fecha_nacimiento`:
Formato: "X Años, Y Meses y Z Días"

## 🎨 Características de Diseño

- ✨ Responsive (móvil, tablet, desktop)
- 🌙 Compatible con modo oscuro
- 📱 Interfaz similar a la solicitada (con encabezado morado)
- 🎯 Colores informativos (verde=aprobado, amarillo=pendiente, rojo=rechazado)
- 📊 Tabla con alternancia de colores para mejor legibilidad

## ⚙️ Configuración

### Cambiar derecho de vacaciones por defecto

En `EmpleadosController.php`, método `showVacaciones()`:
```php
$derechoVacaciones = $empleados->derecho_vacaciones ?? 16; // Cambiar 16 por otro valor
```

O en la migración (por empleado):
```php
UPDATE empleados SET derecho_vacaciones = 20 WHERE id = 1;
```

## 🧪 Ejemplos de Uso

### 1. Ver vacaciones de un empleado
```
GET /vacaciones-employee/1
```

### 2. Registrar nuevas vacaciones
```
POST /vacaciones-employee/1

Body:
{
  "fecha_inicio": "2026-02-11",
  "fecha_fin": "2026-02-15",
  "estado": "aprobado",
  "observaciones": "Vacaciones de verano"
}
```

### 3. Datos de ejemplo SQL
```sql
INSERT INTO empleado_vacaciones (empleado_id, fecha_inicio, fecha_fin, dias_tomados, estado, observaciones) 
VALUES 
  (1, '2026-02-11', '2026-02-15', 5, 'aprobado', 'Vacaciones de verano'),
  (1, '2026-03-15', '2026-03-17', 3, 'aprobado', 'Fin de semana extendido');
```

## 📝 Notas

- Los cálculos de días se hacen automáticamente al guardar
- La antigüedad se calcula basada en `fecha_nacimiento`
- Si el empleado no tiene `foto`, se muestra un icono por defecto
- La tabla muestra los períodos ordenados por fecha más reciente

## 🆘 Troubleshooting

### La tabla no se ve
- Ejecutar: `php artisan migrate:refresh`
- Ejecutar: `php artisan db:seed --class=EmpleadoVacacionesSeeder`

### El formulario no funciona
- Verificar que `derecho_vacaciones` existe en tabla empleados
- Verificar que el modelo `EmpleadoVacaciones` esté correctamente importado

### Errores en migraciones
- Asegurar que no exista la tabla `empleado_vacaciones` previamente
- Usar: `php artisan migrate:rollback` si es necesario
