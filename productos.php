<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lusi shop - Productos</title>
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

        /* Contenedor de productos */
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            position: relative;
        }

        .products-container {
            display: flex;
            gap: 50px;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            max-width: 1100px;
            width: 100%;
        }

        /* Tarjeta de producto */
        .product-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            width: 250px;
        }

        .product-image {
            width: 220px;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            background-color: #f7f7f7;
        }

        .product-name {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .product-price {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        /* Botón Comprar */
        .btn-buy {
            background-color: #ff3b30;
            color: #ffffff;
            border: none;
            padding: 10px 0;
            width: 100%;
            border-radius: 8px;
            font-family: 'Montserrat', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.2s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-buy:hover {
            background-color: #d32f2f;
        }

        /* Flecha siguiente */
        .next-arrow {
            font-size: 2.5rem;
            color: #000000;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
            transition: transform 0.2s ease;
        }

        .next-arrow:hover {
            transform: translateX(5px);
        }

        /* Botón de volver abajo */
        .footer-back {
            padding: 20px 40px;
            max-width: 1100px;
            margin: 0 auto;
            width: 100%;
        }

        .btn-back {
            display: inline-block;
            font-size: 1.1rem;
            font-weight: 600;
            color: #000000;
            text-decoration: none;
        }

        .btn-back:hover {
            text-decoration: underline;
            color: #e50000;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .products-container {
                gap: 30px;
            }
            .next-arrow {
                display: none;
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

    <!-- Contenido de Productos -->
    <main class="main-content">
        <div class="products-container">
            
            <!-- Producto 1: Panzerotti -->
            <div class="product-card">
                <img src="panzerotti.png" alt="Panzerotti" class="product-image">
                <div class="product-name">Panzerotti</div>
                <div class="product-price">3,500$</div>
                <a href="checkout.php?nombre=Panzerotti&precio=3500&imagen=panzerotti.png" class="btn-buy">Comprar</a>
            </div>

            <!-- Producto 2: Gaseosa -->
            <div class="product-card">
                <img src="pool.png" alt="Gaseosa" class="product-image">
                <div class="product-name">Gaseosa</div>
                <div class="product-price">2,000$</div>
                <a href="checkout.php?nombre=Gaseosa&precio=2000&imagen=pool.png" class="btn-buy">Comprar</a>
            </div>

            <!-- Producto 3: Empanada -->
            <div class="product-card">
                <img src="empanada.png" alt="Empanada" class="product-image">
                <div class="product-name">Empanada</div>
                <div class="product-price">2,500$</div>
                <a href="checkout.php?nombre=Empanada&precio=2500&imagen=empanada.png" class="btn-buy">Comprar</a>
            </div>

            <!-- Flecha siguiente -->
            <a href="productos_siguiente.php" class="next-arrow">→</a>

        </div>
    </main>

    <!-- Enlace de retroceso -->
    <div class="footer-back">
        <a href="dashboard.php" class="btn-back">← Volver al inicio</a>
    </div>

</body>
</html>