<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lusi shop - Productos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Montserrat', sans-serif; background-color: #ffffff; color: #000000; min-height: 100vh; display: flex; flex-direction: column; justify-content: space-between; }
        
        .top-banner { width: 100%; background-color: #e50000; height: 75px; display: flex; align-items: center; justify-content: space-between; padding: 0 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .banner-left { display: flex; align-items: center; gap: 15px; }
        .banner-logo { width: 55px; height: 55px; border-radius: 50%; border: 2px solid #ffffff; background-color: #0d1b2a; display: flex; flex-direction: column; justify-content: center; align-items: center; color: white; text-align: center; text-decoration: none; }
        .banner-logo .cart-icon-small { font-size: 11px; color: #e50000; margin-bottom: 1px; }
        .banner-logo .brand-name { font-weight: bold; font-size: 11px; line-height: 1; }
        .banner-logo .brand-sub { color: #e50000; font-size: 8px; font-weight: bold; }
        .banner-title { color: #ffffff; font-size: 1.5rem; font-weight: 600; }
        
        /* Enlace al carrito arriba a la derecha */
        .cart-link { font-size: 2rem; color: #ffffff; text-decoration: none; display: flex; align-items: center; position: relative; }
        .cart-badge { position: absolute; top: -5px; right: -10px; background-color: #0d1b2a; color: white; font-size: 0.8rem; padding: 2px 6px; border-radius: 50%; font-weight: bold; }

        .main-content { flex: 1; display: flex; align-items: center; justify-content: center; padding: 40px 20px; }
        .products-container { display: flex; gap: 50px; justify-content: center; align-items: center; flex-wrap: wrap; max-width: 1100px; width: 100%; }
        .product-card { display: flex; flex-direction: column; align-items: center; text-align: center; width: 250px; }
        .product-image { width: 220px; height: 200px; object-fit: cover; border-radius: 8px; margin-bottom: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); background-color: #f7f7f7; }
        .product-name { font-size: 1.3rem; font-weight: 700; margin-bottom: 5px; }
        .product-price { font-size: 1.2rem; font-weight: 700; margin-bottom: 15px; }
        
        .btn-buy { background-color: #ff3b30; color: #ffffff; border: none; padding: 10px 0; width: 100%; border-radius: 8px; font-family: 'Montserrat', sans-serif; font-size: 1.1rem; font-weight: 700; cursor: pointer; text-decoration: none; display: inline-block; text-align: center; transition: background-color 0.2s ease; }
        .btn-buy:hover { background-color: #d32f2f; }
        
        .footer-back { padding: 20px 40px; max-width: 1100px; margin: 0 auto; width: 100%; }
        .btn-back { font-size: 1.1rem; font-weight: 600; color: #000000; text-decoration: none; }
        .btn-back:hover { text-decoration: underline; color: #e50000; }
    </style>
</head>
<body>

    <header class="top-banner">
        <div class="banner-left">
            <a href="dashboard.php" class="banner-logo">
                <div class="cart-icon-small">🛒</div>
                <div class="brand-name">lusi</div>
                <div class="brand-sub">shop</div>
            </a>
            <span class="banner-title">Lusi shop</span>
        </div>
        <!-- Icono superior que lleva al carrito con contador -->
        <a href="carrito.php" class="cart-link">
            🛒 
            <?php 
                $total_items = 0;
                if(isset($_SESSION['carrito'])) {
                    foreach($_SESSION['carrito'] as $item) { $total_items += $item['cantidad']; }
                }
                if($total_items > 0) { echo "<span class='cart-badge'>$total_items</span>"; }
            ?>
        </a>
    </header>

    <main class="main-content">
        <div class="products-container">
            
            <!-- Panzerotti -->
            <div class="product-card">
                <img src="panzerotti.png" alt="Panzerotti" class="product-image">
                <div class="product-name">Panzerotti</div>
                <div class="product-price">3,500$</div>
                <a href="agregar.php?id=panzerotti&nombre=Panzerotti&precio=3500&imagen=panzerotti.png" class="btn-buy">Comprar</a>
            </div>

            <!-- Gaseosa -->
            <div class="product-card">
                <img src="pool.png" alt="Gaseosa" class="product-image">
                <div class="product-name">Gaseosa</div>
                <div class="product-price">2,000$</div>
                <a href="agregar.php?id=gaseosa&nombre=Gaseosa&precio=2000&imagen=pool.png" class="btn-buy">Comprar</a>
            </div>

            <!-- Empanada -->
            <div class="product-card">
                <img src="empanada.png" alt="Empanada" class="product-image">
                <div class="product-name">Empanada</div>
                <div class="product-price">2,500$</div>
                <a href="agregar.php?id=empanada&nombre=Empanada&precio=2500&imagen=empanada.png" class="btn-buy">Comprar</a>
            </div>

        </div>
    </main>

    <div class="footer-back">
        <a href="dashboard.php" class="btn-back">← Volver al inicio</a>
    </div>

</body>
</html>