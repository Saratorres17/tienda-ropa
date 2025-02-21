<?php


$conexion = mysqli_connect("localhost", "root", "", "ropa");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}


function obtener_productos() {
    global $conexion;
    $sql = "SELECT * FROM productos";
    $resultado = mysqli_query($conexion, $sql);

    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }

    return $resultado;
}


function crear_producto($nombre, $descripcion, $precio, $imagen) {
    global $conexion;

    $sql = "INSERT INTO productos (nombre, descripcion, precio, imagen) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "ssds", $nombre, $descripcion, $precio, $imagen);

    if (!mysqli_stmt_execute($stmt)) {
        die("Error al insertar producto: " . mysqli_error($conexion));
    }

    mysqli_stmt_close($stmt);
}


function obtener_producto($id) {
    global $conexion;

    if (!is_numeric($id)) {
        die("Error: ID inválido.");
    }

    $sql = "SELECT * FROM productos WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }

    return mysqli_fetch_assoc($resultado);
}


function actualizar_producto($id, $nombre, $descripcion, $precio, $imagen) {
    global $conexion;

    if (!is_numeric($id)) {
        die("Error: ID inválido.");
    }

    $sql = "UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, imagen = ? WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "ssdsi", $nombre, $descripcion, $precio, $imagen, $id);

    if (!mysqli_stmt_execute($stmt)) {
        die("Error al actualizar producto: " . mysqli_error($conexion));
    }

    mysqli_stmt_close($stmt);
}

function eliminar_producto($id) {
    global $conexion;

    if (!is_numeric($id)) {
        die("Error: ID inválido.");
    }

    $sql = "DELETE FROM productos WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (!mysqli_stmt_execute($stmt)) {
        die("Error al eliminar producto: " . mysqli_error($conexion));
    }

    mysqli_stmt_close($stmt);
}

?>
