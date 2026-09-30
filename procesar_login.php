<?php
session_start();
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['usuario']);
    $password_plana = $_POST['password'];

    if (empty($email) || empty($password_plana)) {
        echo "<script>alert('Por favor ingresa tus datos.'); window.location.href='login.php';</script>";
        exit();
    }

    try {
        // Buscar el usuario por su email
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch();

        // Verificar si existe el usuario y si la contraseña coincide
        if ($usuario && password_verify($password_plana, $usuario['password'])) {
            // Guardar datos en la sesión
            $_SESSION['usuario'] = $usuario['email'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['rol'] = $usuario['rol'];

            // Redirigir a la pantalla de bienvenida
            header("Location: inicio.php");
            exit();
        } else {
            echo "<script>alert('Correo o contraseña incorrectos.'); window.location.href='login.php';</script>";
            exit();
        }

    } catch (PDOException $e) {
        echo "Error en el inicio de sesión: " . $e->getMessage();
    }
}
?>