                <?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lusi shop - Productos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Montserrat', sans-serif; background-color: #ffffff; color: #000000; min-height: 100vh; display: flex; flex-direction: column; justify-content: space-between; }
        
        .top-banner { width: 100%; background-color: #e50000; height: 75px; display: flex; align-items: center; justify-content: space-between; padding: 0 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .banner-left { display: flex; align-items: center; gap: 15px; }
        .banner-logo { width: 55px; height: 55px; border-radius: 50%; border: 2px solid #ffffff; background-color: #0d1b2a; display: flex; flex-direction: column; justify-content: center; align-items: center; color: white; text-align: center; text-decoration: none; }
        .banner-logo .cart-icon-small { font-size: 11px; color: #e50000; margin-bottom: 1px; }
        .banner-logo .brand-name { font-weight: 600; font-size: 11px; line-height: 1; }
        .banner-logo .brand-sub { color: #e50000; font-size: 8px; font-weight: 600; }
        .banner-title { color: #ffffff; font-size: 1.5rem; font-weight: 500; }
        
        /* Enlace humanizado para el carrito */
        .cart-link { 
            font-size: 0.95rem; 
            color: #ffffff; 
            background-color: rgba(255, 255, 255, 0.15);
            padding: 8px 14px;
            border-radius: 20px;
            text-decoration: none; 
            display: flex; 
            align-items: center; 
            gap: 6px;
            position: relative; 
            font-weight: 400;
            transition: background-color 0.2s ease;
        }
        .cart-link:hover {
            background-color: rgba(255, 255, 255, 0.25);
        }
        .cart-badge { 
            background-color: #0d1b2a; 
            color: white; 
            font-size: 0.75rem; 
            padding: 2px 7px; 
            border-radius: 10px; 
            font-weight: 500; 
            margin-left: 2px;
        }

        .main-content { flex: 1; display: flex; align-items: center; justify-content: center; padding: 40px 20px; }
        .products-container { display: flex; gap: 40px; justify-content: center; align-items: flex-start; flex-wrap: wrap; max-width: 1100px; width: 100%; }
        
        .product-card { display: flex; flex-direction: column; align-items: center; text-align: center; width: 250px; background: #fff; }
        .product-image { width: 220px; height: 200px; object-fit: cover; border-radius: 8px; margin-bottom: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); background-color: #f7f7f7; }
        
        .product-name { font-size: 1.3rem; font-weight: 400; margin-bottom: 5px; }
        .product-price { font-size: 1.2rem; font-weight: 400; margin-bottom: 15px; }

        .quantity-box { background-color: #e0e0e0; padding: 6px 0; border-radius: 8px; font-size: 1.3rem; font-weight: 400; margin-bottom: 5px; width: 100%; text-align: center; }
        .quantity-controls { display: flex; align-items: center; justify-content: center; gap: 15px; font-size: 1rem; font-weight: 400; margin-bottom: 12px; }
        .qty-btn { background: none; border: none; font-size: 1.6rem; font-weight: 400; cursor: pointer; color: #000; transition: color 0.2s; padding: 0 5px; user-select: none; }
        .qty-btn:hover { color: #e50000; }

        .btn-buy { background-color: #ff3b30; color: #ffffff; border: none; padding: 10px 0; width: 100%; border-radius: 8px; font-family: 'Montserrat', sans-serif; font-size: 1.1rem; font-weight: 500; cursor: pointer; text-decoration: none; display: inline-block; text-align: center; transition: background-color 0.2s ease; }
        .btn-buy:hover { background-color: #d32f2f; }
        
        .footer-back { padding: 20px 40px; max-width: 1100px; margin: 0 auto; width: 100%; }
        .btn-back { font-size: 1.1rem; font-weight: 400; color: #000000; text-decoration: none; }
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
        
        <a href="carrito.php" class="cart-link">
            <span>Ver mi carrito</span> 🛒 
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
                
                <div class="quantity-box" id="qty-panzerotti">1</div>
                <div class="quantity-controls">
                    <button type="button" class="qty-btn" onclick="cambiarCantidad('panzerotti', -1)">-</button>
                    <span>Cantidad</span>
                    <button type="button" class="qty-btn" onclick="cambiarCantidad('panzerotti', 1)">+</button>
                </div>

                <a href="agregar.php?id=panzerotti&nombre=Panzerotti&precio=3500&imagen=panzerotti.png&cantidad=1" id="btn-panzerotti" class="btn-buy">Comprar</a>
            </div>

            <!-- Gaseosa -->
            <div class="product-card">
                <img src="pool.png" alt="Gaseosa" class="product-image">
                <div class="product-name">Gaseosa</div>
                <div class="product-price">2,000$</div>
                
                <div class="quantity-box" id="qty-gaseosa">1</div>
                <div class="quantity-controls">
                    <button type="button" class="qty-btn" onclick="cambiarCantidad('gaseosa', -1)">-</button>
                    <span>Cantidad</span>
                    <button type="button" class="qty-btn" onclick="cambiarCantidad('gaseosa', 1)">+</button>
                </div>

                <a href="agregar.php?id=gaseosa&nombre=Gaseosa&precio=2000&imagen=pool.png&cantidad=1" id="btn-gaseosa" class="btn-buy">Comprar</a>
            </div>

            <!-- Empanada -->
            <div class="product-card">
                <img src="empanada.png" alt="Empanada" class="product-image">
                <div class="product-name">Empanada</div>
                <div class="product-price">2,500$</div>
                
                <div class="quantity-box" id="qty-empanada">1</div>
                <div class="quantity-controls">
                    <button type="button" class="qty-btn" onclick="cambiarCantidad('empanada', -1)">-</button>
                    <span>Cantidad</span>
                    <button type="button" class="qty-btn" onclick="cambiarCantidad('empanada', 1)">+</button>
                </div>

                <a href="agregar.php?id=empanada&nombre=Empanada&precio=2500&imagen=empanada.png&cantidad=1" id="btn-empanada" class="btn-buy">Comprar</a>
            </div>

        </div>
    </main>

    <div class="footer-back">
        <a href="dashboard.php" class="btn-back">← Volver al inicio</a>
    </div>

    <script>
        var cantidades = {
            'panzerotti': 1,
            'gaseosa': 1,
            'empanada': 1
        };

        function cambiarCantidad(producto, cambio) {
            cantidades[producto] = (cantidades[producto] || 1) + cambio;
            if (cantidades[producto] < 1) {
                cantidades[producto] = 1;
            }

            var qtyBox = document.getElementById('qty-' + producto);
            if (qtyBox) {
                qtyBox.innerText = cantidades[producto];
            }

            var btn = document.getElementById('btn-' + producto);
            if (btn) {
                var url = new URL(btn.href, window.location.origin);
                url.searchParams.set('cantidad', cantidades[producto]);
                btn.href = url.pathname + url.search;
            }
        }
    </script>
</body>
</html>