<?php
session_start();

// Manejar vaciar o eliminar si es necesario
if (isset($_GET['accion']) && $_GET['accion'] == 'vaciar') {
    unset($_SESSION['carrito']);
    header("Location: carrito.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lusi shop - Carrito de Compras</title>
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
        .cart-icon-top { font-size: 2.2rem; color: #ffffff; }

        .main-content { flex: 1; max-width: 900px; margin: 0 auto; width: 100%; padding: 40px 20px; }
        .cart-title { font-size: 1.8rem; font-weight: 700; margin-bottom: 25px; border-bottom: 2px solid #e50000; padding-bottom: 10px; }
        
        .cart-item { display: flex; align-items: center; justify-content: space-between; background: #f9f9f9; padding: 15px 20px; border-radius: 8px; margin-bottom: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        .item-info { display: flex; align-items: center; gap: 20px; }
        .item-img { width: 70px; height: 70px; object-fit: cover; border-radius: 6px; }
        .item-details h3 { font-size: 1.2rem; font-weight: 700; }
        .item-details p { font-size: 1rem; color: #555; }
        
        .item-total { font-size: 1.2rem; font-weight: 700; }

        .cart-summary { margin-top: 30px; display: flex; flex-direction: column; align-items: flex-end; gap: 15px; }
        .total-amount { font-size: 2rem; font-weight: 700; }

        .action-buttons { display: flex; gap: 15px; }
        .btn-action { background-color: #ff3b30; color: #ffffff; border: none; padding: 12px 25px; border-radius: 8px; font-family: 'Montserrat', sans-serif; font-size: 1.1rem; font-weight: 700; cursor: pointer; text-decoration: none; transition: background-color 0.2s ease; }
        .btn-action:hover { background-color: #d32f2f; }
        .btn-secondary { background-color: #6c757d; }
        .btn-secondary:hover { background-color: #5a6268; }

        .empty-cart { text-align: center; font-size: 1.3rem; color: #666; margin-top: 50px; }
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
        <div class="cart-icon-top">🛒</div>
    </header>

    <main class="main-content">
        <h2 class="cart-title">Tu Carrito de Compras</h2>

        <?php if (empty($_SESSION['carrito'])): ?>
            <div class="empty-cart">
                <p>Tu carrito está vacío.</p><br>
                <a href="productos.php" class="btn-action">Ver productos</a>
            </div>
        <?php else: ?>
            <?php 
                $gran_total = 0;
                foreach ($_SESSION['carrito'] as $id => $item): 
                    $subtotal = $item['precio'] * $item['cantidad'];
                    $gran_total += $subtotal;
            ?>
                <div class="cart-item">
                    <div class="item-info">
                        <img src="<?php echo htmlspecialchars($item['imagen']); ?>" alt="" class="item-img">
                        <div class="item-details">
                            <h3><?php echo htmlspecialchars($item['nombre']); ?></h3>
                            <p>Precio: $<?php echo number_format($item['precio'], 0, ',', '.'); ?> x <?php echo $item['cantidad']; ?></p>
                        </div>
                    </div>
                    <div class="item-total">
                        $<?php echo number_format($subtotal, 0, ',', '.'); ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="cart-summary">
                <div class="total-amount">
                    Total a pagar: $<?php echo number_format($gran_total, 0, ',', '.'); ?>
                </div>
                <div class="action-buttons">
                    <a href="productos.php" class="btn-action btn-secondary">Seguir comprando</a>
                    <a href="carrito.php?accion=vaciar" class="btn-action btn-secondary" onclick="return confirm('¿Vaciar carrito?');">Vaciar</a>
                    <a href="#" class="btn-action" onclick="alert('¡Compra realizada con éxito!'); window.location.href='dashboard.php';">Realizar compra</a>
                </div>
            </div>
        <?php endif; ?>
    </main>

</body>
</html>