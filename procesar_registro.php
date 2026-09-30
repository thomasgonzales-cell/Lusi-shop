<?php
session_start();
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['usuario']); // En tu formulario el input se llama 'usuario' pero pide correo/número
    $password_plana = $_POST['password'];

    // Validar que no estén vacíos
    if (empty($nombre) || empty($email) || empty($password_plana)) {
        echo "<script>alert('Por favor completa todos los campos.'); window.location.href='registro.php';</script>";
        exit();
    }

    try {
        // Verificar si el correo ya existe
        $stmt_check = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt_check->execute([$email]);
        if ($stmt_check->rowCount() > 0) {
            echo "<script>alert('Este correo o número ya está registrado.'); window.location.href='registro.php';</script>";
            exit();
        }

        // Encriptar la contraseña de forma segura
        $password_hash = password_hash($password_plana, PASSWORD_BCRYPT);

        // Insertar el nuevo usuario en la tabla
        $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, password, rol) VALUES (?, ?, ?, 'cliente')");
        $stmt->execute([$nombre, $email, $password_hash]);

        // Iniciar sesión automáticamente tras el registro
        $_SESSION['usuario'] = $email;
        $_SESSION['nombre'] = $nombre;

        // Redirigir a la pantalla de bienvenida que me pediste antes
        header("Location: dashboard.php");
        exit();

    } catch (PDOException $e) {
        echo "Error al registrar el usuario: " . $e->getMessage();
    }
}
?>