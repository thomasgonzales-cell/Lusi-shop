<?php
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : 'Producto';
$precio = isset($_GET['precio']) ? intval($_GET['precio']) : 0;
$imagen = isset($_GET['imagen']) ? $_GET['imagen'] : 'panzerotti.png';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lusi shop - Comprar <?php echo htmlspecialchars($nombre); ?></title>
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

        /* Franja superior roja con carrito a la derecha */
        .top-banner {
            width: 100%;
            background-color: #e50000;
            height: 75px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .banner-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

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

        .banner-logo .cart-icon-small {
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

        .banner-title {
            color: #ffffff;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .cart-icon-top {
            font-size: 2.2rem;
            color: #ffffff;
        }

        /* Contenido principal */
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .checkout-container {
            display: flex;
            align-items: center;
            gap: 60px;
            max-width: 900px;
            width: 100%;
            flex-wrap: wrap;
            justify-content: center;
        }

        .product-section {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .product-image {
            width: 280px;
            height: 240px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            background-color: #f7f7f7;
            margin-bottom: 20px;
        }

        .quantity-box {
            background-color: #e0e0e0;
            padding: 8px 30px;
            border-radius: 8px;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-align: center;
            width: 180px;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 20px;
            font-size: 1.3rem;
            font-weight: 600;
        }

        .qty-btn {
            background: none;
            border: none;
            font-size: 2rem;
            font-weight: bold;
            cursor: pointer;
            color: #000;
            transition: color 0.2s;
        }

        .qty-btn:hover {
            color: #e50000;
        }

        .details-section {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .total-title {
            font-size: 2rem;
            font-weight: 700;
            line-height: 1.3;
        }

        .total-amount {
            font-size: 2.5rem;
            font-weight: 700;
            color: #000000;
        }

        .action-buttons {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .btn-action {
            background-color: #ff3b30;
            color: #ffffff;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-family: 'Montserrat', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.2s ease;
            text-align: center;
        }

        .btn-action:hover {
            background-color: #d32f2f;
        }

        @media (max-width: 768px) {
            .checkout-container {
                gap: 30px;
            }
        }
    </style>
</head>
<body>

    <!-- Franja superior con logo y carrito -->
    <header class="top-banner">
        <div class="banner-left">
            <a href="dashboard.php" class="banner-logo">
                <div class="cart-icon-small">🛒</div>
                <div class="brand-name">lusi</div>
                <div class="brand-sub">shop</div>
            </a>
            <span class="banner-title">Lusi shop</span>
        </div>
        <div class="cart-icon-top">🛒</div>
    </header>

    <!-- Contenido de pago -->
    <main class="main-content">
        <div class="checkout-container">
            
            <!-- Columna Izquierda: Imagen y Cantidad -->
            <div class="product-section">
                <img src="<?php echo htmlspecialchars($imagen); ?>" alt="<?php echo htmlspecialchars($nombre); ?>" class="product-image">
                <div class="quantity-box" id="qtyDisplay">1</div>
                <div class="quantity-controls">
                    <button class="qty-btn" onclick="changeQty(-1)">-</button>
                    <span>Cantidad</span>
                    <button class="qty-btn" onclick="changeQty(1)">+</button>
                </div>
            </div>

            <!-- Columna Derecha: Total y Botones -->
            <div class="details-section">
                <div class="total-title">
                    Total a pagar:<br>
                    <span class="total-amount" id="totalDisplay"><?php echo number_format($precio, 0, ',', '.'); ?>$</span>
                </div>
                <div class="action-buttons">
                    <a href="#" class="btn-action" onclick="alert('¡Compra realizada con éxito!'); window.location.href='dashboard.php'; return false;">Realizar compra</a>
                    <a href="productos.php" class="btn-action">Cancelar compra</a>
                </div>
            </div>

        </div>
    </main>

    <script>
        let unitPrice = <?php echo $precio; ?>;
        let quantity = 1;

        function changeQty(amount) {
            quantity += amount;
            if (quantity < 1) {
                quantity = 1;
            }
            
            // Actualizar número en pantalla
            document.getElementById('qtyDisplay').innerText = quantity;
            
            // Calcular nuevo total con formato de miles
            let total = unitPrice * quantity;
            document.getElementById('totalDisplay').innerText = total.toLocaleString('es-CO') + '$';
        }
    </script>

</body>
</html>