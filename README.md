#Proyecto de evaluacion de la materia DSS

#Pagina para agregar/crear productos

![image](https://github.com/user-attachments/assets/24fffa84-240b-4c21-a432-d00298b8e42a)
Métodos principales utilizadas:

1.$_SERVER["REQUEST_METHOD"]: Accede al método de la solicitud HTTP (GET, POST, etc.).

2.trim(): Elimina espacios en blanco al principio y al final de una cadena.

3.floatval(): Convierte una cadena a un número decimal (float).

4.empty(): Verifica si una variable está vacía.

5.isset(): Verifica si una variable está definida.

6.$_FILES: Variable superglobal que contiene información sobre los archivos subidos.

7.pathinfo(): Devuelve información sobre una ruta de archivo.

8.in_array(): Verifica si un valor existe dentro de un array.

9.uniqid(): Genera un identificador único.

10.is_dir(): Verifica si un directorio existe.

11.mkdir(): Crea un directorio.

move_uploaded_file(): Mueve un archivo subido a una nueva ubicación.

12.header(): Envía encabezados HTTP (se utiliza para la redirección).

13.exit(): Detiene la ejecución del script.

#Pagina principal (Index)
![tienda](https://github.com/user-attachments/assets/1f35470b-a4a5-47db-9e93-9173edd28773)
Código PHP:

1.<?php echo $producto['nombre']; ?>: Esta línea de código PHP se utiliza para mostrar el nombre del producto que se va a eliminar en el mensaje de confirmación. Asume que la variable $producto contiene un array con los datos del producto, incluyendo su nombre.

2.eliminar.php?id=<?php echo $id; ?>&confirmar=true: Esta línea genera la URL para la página que realmente elimina el producto. Incluye el ID del producto ($id) y un parámetro confirmar con valor true para indicar que se ha confirmado la eliminación.

3.index.php: Esta es la URL a la que redirigen los botones "Cancelar" y "Regresar".

Funcionalidad:

1.El usuario accede a esta página desde la página de listado de productos después de hacer clic en el botón "Eliminar" de un producto específico.

2.Se muestra un mensaje de confirmación con el nombre del producto.

3.Si el usuario hace clic en "Eliminar", se le redirige a la página eliminar.php con los parámetros id y confirmar. Esta página se encargará de eliminar el producto de la base de datos.

4.Si el usuario hace clic en "Cancelar" o "Regresar", se le redirige a la página principal index.php sin eliminar el producto.

#Pagina de editar productos

![image](https://github.com/user-attachments/assets/4a4ee6ba-57c3-4b58-97dd-50d8a2876098)

1.Este código crea un formulario para editar la información de un producto. Recupera los datos del producto, los muestra en el formulario, permite al usuario modificarlos (incluyendo la imagen), y luego guarda los cambios en la base de datos.  La seguridad (especialmente contra inyección SQL en funciones.php) y la validación de datos son aspectos cruciales a considerar para mejorar este código.

![image](https://github.com/user-attachments/assets/b35e41c7-9b4e-4be9-b642-8d79fe3517bd)
Flujo del código:

--Inclusión de funciones.php: Se incluye el archivo funciones.php, que contiene funciones para interactuar con la base de datos.

1.Obtención del ID del producto: Se obtiene el ID del producto de la URL. Si el ID no está presente o está vacío, se redirige al usuario a index.php.

2.Obtención de los datos del producto: Se obtienen los datos del producto usando el ID. Si el producto no existe, se redirige al usuario a index.php.

3.Función mostrar_mensaje(): Esta función crea un mensaje de alerta (usando clases de Tailwind CSS) para mostrar al usuario (ya sea un mensaje de éxito o de error).

4.Lógica de eliminación: Si se confirma la eliminación (mediante el parámetro confirmar en la URL), se llama a la función eliminar_producto() para eliminar el producto de la base de datos.

5.Se muestra un mensaje de éxito y se redirige al usuario a index.php.

6.Estructura HTML: Se muestra un mensaje de confirmación con el nombre del producto. Se incluyen botones para "Eliminar", "Cancelar" y "Regresar".

--Puntos clave:

1.Validación: Se verifica si el ID del producto existe y si el producto existe en la base de datos.

2.Función mostrar_mensaje(): Facilita la reutilización de código para mostrar mensajes.

3.Confirmación: Se requiere confirmación antes de eliminar el producto.

4.Redirección: Redirige al usuario después de la eliminación.

![image](https://github.com/user-attachments/assets/5bdf0ba6-9417-45b9-a884-82628705a757)

 -interfaz de administración-
 Tabla de productos:
Columnas:

1.id: Identificador único de cada producto.

2.nombre: Nombre del producto.

3.descripcion: Descripción del producto.

4.precio: Precio del producto.

5.imagen: Imagen del producto (se muestra una miniatura).

6.Filas: Cada fila representa un producto individual.

Acciones:

1.Editar: Permite modificar los datos de un producto.

2.Copiar: Duplica un producto (útil para crear rápidamente productos similares).

3.Borrar: Elimina un producto.

--Selección múltiple:

1.Casillas de verificación para seleccionar uno o varios productos.

2.Botones para realizar acciones en lote (editar, copiar, borrar) en los productos seleccionados.

3.Opciones de visualización:

4.Mostrar todo: Muestra todos los productos.

5.Número de filas: Permite elegir cuántos productos se muestran por página.

--Filtro y búsqueda:

1.Filtrar filas: Permite buscar productos por diferentes criterios (nombre, descripción, precio, etc.).

2.Buscar en esta tabla: Caja de búsqueda para encontrar productos por palabras clave.

--Ordenación:

1.Ordenar según la clave: Menú desplegable para ordenar los productos por diferentes campos (id, nombre, precio, etc.).

2.Visualización y navegación: La tabla muestra los productos de forma paginada, con opciones para ver más o menos filas por página.

3.Búsqueda y filtrado: Permite encontrar productos específicos mediante filtros y búsquedas.
Gestión individual de productos: Se pueden editar, copiar o borrar productos de forma individual.

4.Gestión en lote: Se pueden seleccionar varios productos y realizar acciones en lote (editar, copiar, borrar).

5.Ordenación: Permite ordenar los productos por diferentes criterios.

6.Exportación: Facilita la exportación de los datos a otros formatos.



