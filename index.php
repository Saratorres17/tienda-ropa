<?php include 'funciones.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Ropa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <header class="bg-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold">TrendyRopa</h1>
            </div>
            <nav class="flex space-x-4">
                <a href="../tienda-ropa/crear.php" class="text-gray-700 hover:text-blue-500">Agregar productos</a>
            </nav>
        </div>
    </header>
    <section class="relative bg-cover bg-center py-12" style="background-image: url('https://img.freepik.com/foto-gratis/retrato-chica-femenina-moda-posando-bolsas-compras-tienda-pago-tarjeta-credito-contactl_1258-127340.jpg');">
    <div class="absolute inset-0 bg-black opacity-50 backdrop-blur-sm"></div> 

    <div class="container mx-auto text-center relative z-10">
        <h2 class="text-5xl font-bold mb-4 text-white italic">Encuentra tu estilo único en nuestra tienda de ropa</h2> 

        <p class="text-lg text-black max-w-2xl mx-auto">Explora nuestra colección y descubre prendas diseñadas para resaltar tu personalidad. Desde lo más básico hasta lo más atrevido, tenemos algo para cada ocasión.</p>
    </div>
</section>

<section class="container mx-auto py-12">

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php $productos = obtener_productos(); ?>
        <?php while ($producto = mysqli_fetch_assoc($productos)) : ?>
            <div class="bg-white rounded-lg shadow-md p-4">
                <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>" class="w-full h-48 object-cover rounded-t-lg mb-4">
                <h2 class="text-xl font-bold mb-2"><?php echo $producto['nombre']; ?></h2>
                <p class="text-gray-700 mb-2"><?php echo $producto['descripcion']; ?></p>
                <p class="text-lg font-bold mb-4">$<?php echo $producto['precio']; ?></p> 

                
                <div class="flex space-x-4">
                  
                    <a href="editar.php?id=<?php echo $producto['id']; ?>" class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded w-full">Editar</a>

                    
                    <a href="eliminar.php?id=<?php echo $producto['id']; ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded w-full">Eliminar</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
   
</section>

    <footer class="bg-gray-800 py-4 text-center text-white">
        <p>&copy; DSS 2025 - UDB</p>
    </footer>
</body>
</html>
