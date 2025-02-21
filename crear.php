<?php include 'funciones.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('https://img.freepik.com/fotos-premium/gafas-sol-sombrero-estan-pared-rosa_1086760-107768.jpg');
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

        .error-message {
            color: red;
            margin-top: 1rem;
        }

        .success-message {
            color: green;
            margin-top: 1rem;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="formulario-centrado">
        <div class="formulario-contenido">
            <h1 class="text-3xl font-bold mb-4">Crear Producto</h1>
            <form action="crear.php" method="post" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="descripcion" class="block text-gray-700 font-bold mb-2">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>
                <div class="mb-4">
                    <label for="precio" class="block text-gray-700 font-bold mb-2">Precio:</label>
                    <input type="number" name="precio" id="precio" required step="0.01" min="0" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="imagen" class="block text-gray-700 font-bold mb-2">Imagen:</label>
                    <input type="file" name="imagen" id="imagen" accept="image/*" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="botones-container">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
                    <a href="index.php" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancelar</a>
                </div>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nombre = trim($_POST['nombre']);
                    $descripcion = trim($_POST['descripcion']);
                    $precio = floatval($_POST['precio']);

                    $errores = [];

              
                    if (empty($nombre)) {
                        $errores[] = "El nombre es requerido.";
                    }
                    if (empty($descripcion)) {
                        $errores[] = "La descripción es requerida.";
                    }
                    if ($precio <= 0) {
                        $errores[] = "El precio debe ser mayor que cero.";
                    }

                   
                    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
                        $imagen_tmp = $_FILES['imagen']['tmp_name'];
                        $imagen_name = $_FILES['imagen']['name'];
                        $imagen_ext = strtolower(pathinfo($imagen_name, PATHINFO_EXTENSION));

                     
                        $tipos_permitidos = ['jpg', 'jpeg', 'png', 'gif'];
                        $tamano_maximo = 2 * 1024 * 1024; // 2MB

                        if (!in_array($imagen_ext, $tipos_permitidos)) {
                            $errores[] = "El archivo debe ser una imagen (jpg, jpeg, png, gif).";
                        }
                        if ($_FILES['imagen']['size'] > $tamano_maximo) {
                            $errores[] = "El archivo es demasiado grande (máximo 2MB).";
                        }

                        if (empty($errores)) {
                            $nuevo_nombre = uniqid() . '.' . $imagen_ext;
                            $imagen_path = 'images/' . $nuevo_nombre;

                           
                            if (!is_dir('images')) {
                                mkdir('images', 0755);
                            }

                            if (move_uploaded_file($imagen_tmp, $imagen_path)) {
                                $imagen = $imagen_path;
                            } else {
                                $errores[] = "Error al subir la imagen.";
                            }
                        }
                    }

                
                    if (!empty($errores)) {
                        foreach ($errores as $error) {
                            echo "<p class='error-message'>$error</p>";
                        }
                    } else {
                        if (isset($imagen)) {
                            crear_producto($nombre, $descripcion, $precio, $imagen);
                            echo "<p class='success-message'>Producto creado con éxito.</p>";
                            header("refresh:3;url=index.php");
                            exit();
                        } else {
                            echo "<p class='error-message'>Error al subir la imagen. El producto no se pudo crear.</p>";
                        }
                    }
                }
                ?>
            </form>
        </div>
    </div>
</body>
</html>