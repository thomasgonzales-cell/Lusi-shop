<?php
session_start();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
$precio = isset($_GET['precio']) ? intval($_GET['precio']) : 0;
$imagen = isset($_GET['imagen']) ? $_GET['imagen'] : '';

if ($id) {
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Si ya existe el producto en el carrito, le sumamos 1 a la cantidad
    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]['cantidad'] += 1;
    } else {
        // Si no existe, lo agregamos por primera vez
        $_SESSION['carrito'][$id] = [
            'nombre' => $nombre,
            'precio' => $precio,
            'imagen' => $imagen,
            'cantidad' => 1
        ];
    }
}

// Redirigir al carrito para ver todo acumulado
header("Location: carrito.php");
exit();
?>