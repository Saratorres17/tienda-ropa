<?php
include 'funciones.php';


$id = $_GET['id'];


if (!isset($id) || empty($id)) {
    header("Location: index.php");
    exit();
}

$producto = obtener_producto($id);


if (!$producto) {
    header("Location: index.php");
    exit();
}


function mostrar_mensaje($tipo, $mensaje) {
    echo "<div class='bg-{$tipo}-100 border border-{$tipo}-400 text-{$tipo}-700 px-4 py-3 rounded relative' role='alert'>
            <strong class='font-bold'>{$tipo}!</strong>
            <span class='block sm:inline'>{$mensaje}</span>
          </div>";
}

if (isset($_GET['confirmar']) && $_GET['confirmar'] == true) {
    eliminar_producto($id);
    mostrar_mensaje("green", "Producto eliminado con éxito.");
    header("refresh:3;url=index.php"); 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
    background-image: url('https://image.slidesdocs.com/responsive-images/background/autumn-promotion-leaves-women-clothing-powerpoint-background_d1b53c474e__960_540.jpg');
    background-size: cover;
    background-position: center;
}

.formulario-centrado {
    display: flex;
    justify-content: center; 
    align-items: center; 
    min-height: 100vh;
}

.contenido-centrado {
    display: flex;
    flex-direction: column; 
    align-items: center; 
    max-width: 600px; 
    margin: 0 auto; 
   
}

.botones-juntos {
    display: flex;
    gap: 1rem;
}
    </style>
</head>
<body class="bg-gray-100">
    <div class="formulario-centrado">
        <div class="container mx-auto p-4">
        <div class="max-w-md bg-white p-6 rounded-lg shadow-md contenido-centrado">
    <p class="text-lg mb-4">¿Estás seguro de que quieres eliminar el producto <strong><?php echo $producto['nombre']; ?></strong>?</p>
    <div class="botones-juntos">
        <a href="eliminar.php?id=<?php echo $id; ?>&confirmar=true" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</a>
        <a href="index.php" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancelar</a>
        <a href="index.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Regresar</a>
    </div>
</div>
            </div>

            <?php
            if (isset($_GET['confirmar']) && $_GET['confirmar'] == true) {
                
            }
            ?>
        </div>
    </div>
</body>
</html>