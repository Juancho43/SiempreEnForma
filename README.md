# 🏋️‍♂️ Sistema de Gestión de Gimnasio "Siempre en Forma"

## 📋 Descripción del Proyecto

Sistema web de gestión integral para gimnasios desarrollado para las **🏆 Olimpiadas de Programación del INET 2021**. La aplicación permite administrar clases, clientes, profesores, salas y recursos de manera eficiente.

## ⭐ Características Principales

### 🎯 Gestión de Entidades
- **🔐 Administradores**: Control de acceso al sistema
- **👥 Clientes**: Registro y seguimiento de miembros del gimnasio
- **👨‍🏫 Profesores**: Gestión de instructores y sus datos personales
- **📅 Clases**: Programación de actividades con horarios y códigos únicos
- **🏢 Salas**: Administración de espacios físicos del gimnasio
- **🏋️ Recursos**: Control de equipamiento por sala
- **📝 Inscripciones**: Sistema de registro de clientes a clases
- **💳 Pagos**: Seguimiento de cuotas y pagos de inscripciones

### ⚡ Funcionalidades
- 🔒 Sistema de autenticación para administradores
- ✅ Inscripción de clientes a clases específicas
- ⏰ Gestión de horarios y disponibilidad de salas
- 🛠️ Control de recursos y equipamiento por sala
- 💰 Sistema de pagos y seguimiento de cuotas
- 🗑️ Eliminación lógica de registros (soft delete)

## 🗃️ Estructura de la Base de Datos

### 📊 Tablas Principales

#### `administradores` 🔐
- Gestión de usuarios administrativos
- Autenticación con contraseñas encriptadas

#### `clientes` 👥
- Información personal de los miembros
- Datos de contacto y profesión
- Sistema de eliminación lógica

#### `profesores` 👨‍🏫
- Datos personales de instructores
- Fechas de ingreso y nacimiento
- Control de DNI y contacto

#### `clases` 📅
- Programación de actividades
- Asignación de salas y profesores
- Horarios y códigos únicos
- Descripción de actividades

#### `salas` 🏢
- Espacios físicos del gimnasio
- Especificaciones de metros cuadrados
- Ubicación y tipo de sala
- Numeración identificativa

#### `recursos` 🏋️
- Equipamiento por sala
- Descripción de recursos disponibles
- Asociación con salas específicas

#### `inscripciones` 📝
- Relación entre clientes y clases
- Sistema de registro automático

#### `pagos` 💳
- Control de cuotas mensuales
- Fechas de pago
- Estado de pagos por inscripción

## 💻 Tecnologías Utilizadas

- **Backend**: PHP 🐘
- **Base de Datos**: MySQL 🐬
- **Frontend**: HTML, CSS 🎨
- **Servidor Web**: Apache/Nginx compatible 🌐
- **Gestión BD**: phpMyAdmin 🛠️

## 🚀 Instalación y Configuración

### 📋 Requisitos del Sistema
- PHP 5.6 o superior 🐘
- MySQL 5.7 o superior 🐬
- Servidor web (Apache/Nginx) 🌐
- phpMyAdmin (opcional, para gestión de BD) 🛠️

### 🔧 Pasos de Instalación

1. **📥 Clonar o descargar el proyecto**
   ```bash
   git clone https://github.com/Juancho43/SiempreEnForma.git
   ```

2. **🗃️ Configurar la base de datos**
   - Importar el archivo `bd.sql` en MySQL
   - Crear base de datos: `c2320290_grupo1`
   - Ejecutar el script SQL proporcionado

3. **⚙️ Configurar conexión**
   - Editar el archivo `conexion.php`
   - Ajustar credenciales de base de datos

4. **🌐 Desplegar en servidor web**
   - Copiar archivos a directorio web
   - Asegurar permisos correctos

## Características de Seguridad

- Contraseñas encriptadas con hash PHP
- Eliminación lógica de registros
- Validación de datos de entrada
- Restricciones de clave foránea para integridad

## Datos de Ejemplo

El sistema incluye datos de prueba para:
- Administradores configurados
- Clientes de ejemplo
- Profesores registrados
- Clases programadas
- Salas configuradas
- Recursos asignados

## Desarrollo

### Equipo de Desarrollo
Proyecto desarrollado para las Olimpiadas de Programación del INET 2021.
Bravo Juan Alé, Di'llelo Joaquin, Marchionni Lisandro.
### Fecha de Desarrollo
Septiembre 2021

## Notas Técnicas

- Sistema desarrollado con eliminación lógica (campo `eliminado`)
- Relaciones de clave foránea con CASCADE
- Auto-incremento configurado en todas las tablas
- Codificación UTF-8 para soporte de caracteres especiales
- Compatibilidad con phpMyAdmin 4.9.5

---

**Sistema de Gestión de Gimnasio "Siempre en Forma"**  
*Olimpiadas de Programación INET 2021*
