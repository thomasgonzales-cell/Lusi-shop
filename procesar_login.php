<?php
session_start();
require_once 'conexion.php';

// Habilitar la visualización de errores temporalmente
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['usuario']);
    $password_plana = $_POST['password'];

    if (empty($email) || empty($password_plana)) {
        die("Error: Por favor ingresa tus datos.");
    }

    try {
        // Buscar el usuario por su email
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch();

        if (!$usuario) {
            die("Error: El correo o usuario '$email' no existe en la base de datos.");
        }

        // Verificar la contraseña
        if (password_verify($password_plana, $usuario['password'])) {
            // Guardar datos en la sesión
            $_SESSION['usuario'] = $usuario['email'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['rol'] = $usuario['rol'];

            // Redirigir a la pantalla de bienvenida
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Error: La contraseña ingresada no coincide con la registrada.<br>";
            echo "Contraseña ingresada: " . htmlspecialchars($password_plana) . "<br>";
            echo "Hash en la base de datos: " . $usuario['password'];
        }

    } catch (PDOException $e) {
        echo "Error en la consulta de la base de datos: " . $e->getMessage();
    }
}
?>