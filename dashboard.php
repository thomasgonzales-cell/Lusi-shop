<?php
// Iniciamos sesión para validar que el usuario esté autenticado
session_start();

// Opcional: si quieres proteger la página para que solo entren si iniciaron sesión, descomenta esto:
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lusi shop - Inicio</title>
    <!-- Fuente Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    
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
            justify-content: space-between;
        }

        /* Franja superior roja */
        .top-banner {
            width: 100%;
            background-color: #e50000;
            height: 75px;
            display: flex;
            align-items: center;
            padding: 0 20px;
            gap: 15px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        /* Logotipo circular dentro de la franja */
        .banner-logo {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            border: 2px solid #ffffff;
            background-color: #0d1b2a;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            text-decoration: none;
        }

        .banner-logo .cart-icon {
            font-size: 11px;
            color: #e50000;
            margin-bottom: 1px;
        }

        .banner-logo .brand-name {
            font-weight: bold;
            font-size: 11px;
            line-height: 1;
        }

        .banner-logo .brand-sub {
            color: #e50000;
            font-size: 8px;
            font-weight: bold;
        }

        /* Texto al lado del logo en la franja */
        .banner-title {
            color: #ffffff;
            font-size: 1.5rem;
            font-weight: 600;
        }

        /* Contenido principal centrado */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        .welcome-heading {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #000000;
        }

        .welcome-phrase {
            font-size: 1.25rem;
            font-weight: 600;
            line-height: 1.5;
            margin-bottom: 30px;
            color: #000000;
        }

        /* Enlace a productos */
        .products-link {
            font-size: 1.2rem;
            font-weight: 600;
            color: #007aff;
            text-decoration: underline;
            transition: color 0.2s ease;
        }

        .products-link:hover {
            color: #0056b3;
        }

        /* Pie de página (Acerca de nosotros) */
        .footer {
            padding: 20px;
            font-size: 1rem;
            font-weight: 600;
        }

        .footer a {
            color: #000000;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .welcome-heading {
                font-size: 1.8rem;
            }
            .welcome-phrase {
                font-size: 1.1rem;
            }
            .banner-title {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>

    <!-- Franja superior -->
    <header class="top-banner">
        <a href="inicio.php" class="banner-logo">
            <div class="cart-icon">🛒</div>
            <div class="brand-name">lusi</div>
            <div class="brand-sub">shop</div>
        </a>
        <span class="banner-title">Lusi shop</span>
    </header>

    <!-- Contenido Central -->
    <main class="main-content">
        <h1 class="welcome-heading">¡Bienvenido a Lusi shop!</h1>
        
        <p class="welcome-phrase">
            Un descanso, un antojo,<br>
            un momento.
        </p>

        <a href="productos.php" class="products-link">Ver productos</a>
    </main>

    <!-- Pie de página -->
    <footer class="footer">
        <a href="acerca.php">Acerca de nostros</a>
    </footer>

</body>
</html>