<?php
session_start();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
$precio = isset($_GET['precio']) ? intval($_GET['precio']) : 0;
$imagen = isset($_GET['imagen']) ? $_GET['imagen'] : '';
$cantidad = isset($_GET['cantidad']) ? intval($_GET['cantidad']) : 1;

if ($id && $cantidad > 0) {
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Si ya existe el producto, le suma la cantidad exacta seleccionada
    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]['cantidad'] += $cantidad;
    } else {
        // Si no existe, lo añade con esa cantidad
        $_SESSION['carrito'][$id] = [
            'nombre' => $nombre,
            'precio' => $precio,
            'imagen' => $imagen,
            'cantidad' => $cantidad
        ];
    }
}

// Redirigir al carrito
header("Location: carrito.php");
exit();
?>