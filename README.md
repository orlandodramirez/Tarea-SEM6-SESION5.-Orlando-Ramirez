# Proyecto de Gestión de Artículos
Este proyecto es una aplicación web que permite la gestión de artículos en un sistema de inventario. Incluye funcionalidades para agregar, editar, eliminar y listar artículos, así como buscar artículos específicos y gestionar ventas relacionadas.

## **Estructura del Proyecto:**

El proyecto incluye varios archivos PHP que implementan diferentes funcionalidades:

### Archivos Principales
- **buscarfactura.php:**
  Permite buscar y mostrar facturas. Incluye funcionalidades para anular facturas y paginación para una mejor experiencia de usuario al navegar por las facturas.

- **buscarfacturaitem.php:**
Muestra un modal que permite buscar y agregar artículos a una factura mediante una interfaz amigable.

- **buscaritem.php:**
Proporciona una interfaz para buscar artículos disponibles. Implementa una tabla con opciones para seleccionar cantidades, precios y agregar artículos.

- **agregararticulo.php:**
Permite agregar nuevos artículos al sistema, incluyendo la descripción, precio de compra, precio de venta y rubro al que pertenecen.

- **eliminararticulo.php:**
Proporciona la funcionalidad para eliminar artículos del sistema por su ID.

- **editararticulo.php:**
Permite actualizar los detalles de un artículo existente, como descripción, precio de compra, precio de venta y rubro.

### Clases

- class.articulos.php

  Contiene los métodos necesarios para interactuar con la base de datos y gestionar los artículos. Por ejemplo:
  
- **add:** Agrega un nuevo artículo.
- **edit:** Edita un artículo existente.
- **del:** Elimina un artículo.
- **class.ventas.php:** Proporciona métodos para la gestión de ventas y facturas, como obtener ventas y actualizar su estado.

### Otras Dependencias
- **pagination.php:** Maneja la lógica de paginación para mostrar datos divididos en páginas.
### Instalación
- **Requisitos previos**

- Servidor web (Apache).
- PHP 7.4 o superior.
- Base de datos MySQL.

### Configuración

- Clonar el repositorio en el directorio raíz del servidor web.
- Configurar la conexión a la base de datos en las clases correspondientes (class.articulos.php y class.ventas.php).
- Importar el esquema de la base de datos (proporcionado en el archivo schema.sql).

### Ejecución

- Acceder a la aplicación a través de un navegador web en el dominio o IP configurada.
## Funcionalidades Principales
 **Gestión de Artículos**:
- Agregar, editar, eliminar y listar artículos.

 **Búsqueda:**
- Búsqueda de artículos y facturas con filtros.

 **Gestión de Ventas:**
- Visualización de facturas, actualización de su estado (anulación).

 **Paginación:**
- Navegación optimizada mediante la división de listas largas en páginas.



*Codigo analizado, transcrito y ejecutado en prueba por @Orlando Ramirez*
