<?php
include 'funciones.php';


$id = $_GET['id'];
$producto = obtener_producto($id);


if (!$producto) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('https://img.freepik.com/fotos-premium/ropa-accesorios-moda-mujer-escritorio-rosa-claro-compras-concepto-venta_119015-273.jpg');
            background-size: cover;
            background-position: center;
        }

        .formulario-centrado {
            display: flex;
            justify-content: center; 
            align-items: center; 
            min-height: 100vh;
        }

        .formulario-contenido {
            width: 50%; 
            max-width: 800px; 
            background-color: white;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .botones-container {
            display: flex;
            gap: 1rem;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="formulario-centrado">
        <div class="formulario-contenido">
            <h1 class="text-3xl font-bold mb-4">Editar Producto</h1>
            <form action="editar.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $producto['nombre']; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="descripcion" class="block text-gray-700 font-bold mb-2">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?php echo $producto['descripcion']; ?></textarea>
                </div>
                <div class="mb-4">
                    <label for="precio" class="block text-gray-700 font-bold mb-2">Precio:</label>
                    <input type="number" name="precio" id="precio" value="<?php echo $producto['precio']; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="imagen" class="block text-gray-700 font-bold mb-2">Imagen:</label>
                    <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>" class="w-32 h-32 object-cover mb-2">
                    <input type="file" name="imagen" id="imagen" accept="image/*" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar Cambios</button>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];

                if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
                    $imagen_tmp = $_FILES['imagen']['tmp_name'];
                    $imagen_name = $_FILES['imagen']['name'];
                    $imagen_path = 'images/' . $imagen_name;

                    move_uploaded_file($imagen_tmp, $imagen_path);

                    $imagen = $imagen_path;
                } else {
                    $imagen = $producto['imagen'];
                }

                actualizar_producto($id, $nombre, $descripcion, $precio, $imagen);
                header("Location: index.php");
            }
            ?>
        </div>
    </div>
</body>
</html>