<?php
// Incluimos la conexión a la base de datos
require_once 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lusi shop - Iniciar Sesión</title>
    <!-- Fuente decorativa cursiva para 'Lusi shop' -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #ffffff;
            color: #000000;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            padding: 20px;
        }

        /* Logotipo circular superior izquierdo con enlace para volver */
        .header-logo {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            border: 2px solid #e50000;
            background-color: #0d1b2a;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            text-decoration: none;
        }

        .header-logo .cart-icon {
            font-size: 14px;
            color: #e50000;
            margin-bottom: 2px;
        }

        .header-logo .brand-name {
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            font-size: 13px;
            line-height: 1;
        }

        .header-logo .brand-sub {
            color: #e50000;
            font-size: 10px;
            font-weight: bold;
        }

        /* Contenedor principal */
        .container {
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        /* Título Lusi shop */
        .main-title {
            font-family: 'Great Vibes', cursive;
            font-size: 4.5rem;
            font-weight: normal;
            margin-bottom: 25px;
            color: #000000;
        }

        /* Formulario */
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .input-group {
            width: 100%;
            margin-bottom: 20px;
            text-align: center;
        }

        .input-group label {
            display: block;
            font-weight: 700;
            font-size: 1.05rem;
            margin-bottom: 8px;
            color: #000000;
        }

        .input-group input {
            width: 100%;
            padding: 12px 15px;
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            border: 1px solid #cccccc;
            border-radius: 8px;
            outline: none;
            text-align: center;
            background-color: #ffffff;
            color: #333333;
        }

        .input-group input::placeholder {
            color: #888888;
        }

        /* Botón de Iniciar Sesión rojo */
        .btn-submit {
            display: block;
            width: 100%;
            padding: 14px 20px;
            background-color: #ff3b30;
            color: #ffffff;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.1rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.2s ease;
            text-transform: none; /* Mantiene tal cual el texto del botón */
        }

        .btn-submit:hover {
            background-color: #e02e24;
        }

        /* Responsive para pantallas pequeñas */
        @media (max-width: 600px) {
            .header-logo {
                position: static;
                margin-bottom: 20px;
            }
            .main-title {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body>

    <!-- Logo circular de la esquina con enlace para volver al inicio -->
    <a href="index.php" class="header-logo">
        <div class="cart-icon">🛒</div>
        <div class="brand-name">lusi</div>
        <div class="brand-sub">shop</div>
    </a>

    <!-- Contenedor principal -->
    <main class="container">
        <!-- Logo/Texto Cursivo -->
        <h1 class="main-title">Lusi shop</h1>

        <!-- Formulario de Inicio de Sesión -->
        <form action="procesar_login.php" method="POST">
            <div class="input-group">
                <label for="usuario">Correo electronico/numero</label>
                <input type="text" id="usuario" name="usuario" placeholder="Ej:@saloo.com" required>
            </div>

            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Ej:1234" required>
            </div>

            <button type="submit" class="btn-submit">Iniciar Sesion</button>
        </form>
    </main>

</body>
</html>