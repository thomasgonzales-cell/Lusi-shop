<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lusi shop - Acerca de nosotros</title>
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

        /* Contenido principal con el texto de la imagen */
        .main-content {
            flex: 1;
            max-width: 850px;
            margin: 0 auto;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .about-text {
            font-size: 1.15rem;
            font-weight: 500;
            line-height: 1.6;
            color: #000000;
            text-align: left;
        }

        .about-text p {
            margin-bottom: 20px;
        }

        /* Botón de retroceso */
        .footer-back {
            padding: 20px 40px;
            text-align: left;
            max-width: 850px;
            margin: 0 auto;
            width: 100%;
        }

        .btn-back {
            display: inline-block;
            font-size: 1.1rem;
            font-weight: 600;
            color: #000000;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .btn-back:hover {
            text-decoration: underline;
            color: #e50000;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .banner-title {
                font-size: 1.2rem;
            }
            .about-text {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

    <!-- Franja superior -->
    <header class="top-banner">
        <a href="dashboard.php" class="banner-logo">
            <div class="cart-icon">🛒</div>
            <div class="brand-name">lusi</div>
            <div class="brand-sub">shop</div>
        </a>
        <span class="banner-title">Lusi shop</span>
    </header>

    <!-- Contenido Central con el texto exacto -->
    <main class="main-content">
        <div class="about-text">
            <p>
                Lusi Shop es una tienda virtual creada para facilitar la compra de productos dentro de nuestra comunidad escolar. Nuestra aplicación busca ofrecer una forma rápida, sencilla y organizada de conocer los productos disponibles y realizar pedidos.
            </p>
            <p>
                En Lusi Shop podrás encontrar diferentes productos como alimentos, útiles escolares, accesorios y artículos relacionados con el colegio, todo reunido en un solo lugar.
            </p>
            <p>
                Nuestro objetivo es brindar una experiencia de compra fácil, práctica y agradable, utilizando la tecnología para hacer más cómoda la vida de los estudiantes y de toda la comunidad educativa.
            </p>
        </div>
    </main>

    <!-- Enlace de retroceso -->
    <div class="footer-back">
        <a href="dashboard.php" class="btn-back">← Volver</a>
    </div>

</body>
</html>