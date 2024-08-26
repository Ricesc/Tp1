# Registro de Autos con Laravel

Este es un programa básico desarrollado con Laravel para registrar y gestionar autos. El programa permite realizar las siguientes operaciones a través de rutas definidas con solicitudes GET:

-   **Crear Auto**: Crea un nuevo registro de auto con datos predefinidos.
-   **Buscar Auto por ID**: Busca un auto en la base de datos utilizando su ID.
-   **Modificar Auto por ID**: Modifica un registro de auto existente utilizando su ID con datos predefinidos.
-   **Mostrar Todos los Autos**: Muestra todos los autos registrados en la base de datos.
-   **Eliminar Auto por ID**: Elimina un registro de auto utilizando su ID.

## Requisitos

-   PHP 8.0 o superior
-   Composer
-   Laravel 8 o superior
-   Servidor de base de datos compatible con Laravel (ej. MySQL, MariaDB)

## Uso

Las siguientes rutas GET están disponibles para interactuar con el programa:

-   **Crear un Auto**: `/CrearAuto`
-   **Buscar un Auto por ID**: `/BuscarAuto/{id}`
-   **Modificar un Auto por ID**: `/ModificarAuto/{id}`
-   **Mostrar Todos los Autos**: `/MostrarAutos`
-   **Eliminar un Auto por ID**: `/EliminarAuto/{id}`

Ejemplo de uso:

-   Para crear un auto, accede a: `http://localhost:8000/CrearAuto`
-   Para buscar un auto con ID 1, accede a: `http://localhost:8000/BuscarAuto/1`
