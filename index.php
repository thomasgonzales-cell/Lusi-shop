<?php
// Incluimos la conexión a la base de datos
require_once 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lusi shop - Bienvenido</title>
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

        /* Logotipo circular superior izquierdo */
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

        /* Contenido Principal Centrado */
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

        /* Mensaje de Bienvenida */
        .welcome-text {
            font-size: 1.3rem;
            font-weight: 800;
            letter-spacing: 0.5px;
            margin-bottom: 30px;
        }

        /* Botones de Navegación */
        .btn-container {
            display: flex;
            flex-direction: column;
            gap: 18px;
            margin-bottom: 45px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 14px 20px;
            background-color: #d9d9d9;
            color: #000000;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.05rem;
            border: none;
            border-radius: 2px;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.1s ease;
            text-transform: uppercase;
        }

        .btn:hover {
            background-color: #cccccc;
        }

        .btn:active {
            transform: scale(0.99);
        }

        /* Descripción inferior */
        .description {
            font-size: 1.15rem;
            font-weight: 600;
            line-height: 1.4;
            color: #000000;
        }

        /* Punto rojo decorativo lateral */
        .red-dot {
            position: absolute;
            right: 20%;
            top: 48%;
            width: 8px;
            height: 8px;
            background-color: #ff0000;
            border-radius: 50%;
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
            .welcome-text {
                font-size: 1.1rem;
            }
            .red-dot {
                display: none;
            }
        }
    </style>
</head>
<body>

    <!-- Logo circular de la esquina -->
    <div class="header-logo">
        <div class="cart-icon">🛒</div>
        <div class="brand-name">lusi</div>
        <div class="brand-sub">shop</div>
    </div>

    <!-- Contenedor principal -->
    <main class="container">
        <!-- Logo/Texto Cursivo -->
        <h1 class="main-title">Lusi shop</h1>

        <!-- Mensaje de bienvenida -->
        <h2 class="welcome-text">¡BIENVENIDO A LUSI SHOP!</h2>

        <!-- Botones de Acción -->
        <div class="btn-container">
            <a href="login.php" class="btn">INICIAR SESIÓN</a>
            <a href="registro.php" class="btn">REGISTRARME</a>
        </div>

        <!-- Texto Descriptivo -->
        <p class="description">
            Compra de manera rápida,<br>
            sencilla y organizada.
        </p>
    </main>

    <!-- Punto rojo flotante de la referencia -->
    <div class="red-dot"></div>

</body>
</html>


/**hola */