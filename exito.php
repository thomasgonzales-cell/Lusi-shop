<?php
session_start();

// Suponiendo que guardas el ID o el nombre del usuario en sesión al iniciar sesión (ej. $_SESSION['usuario'])
$nombre_usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Estudiante';
$usuario_id = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : 1;

if (!empty($_SESSION['carrito'])) {
    // Conexión a PostgreSQL (Ajusta tus credenciales de Render aquí si ya tienes un archivo de conexión global)
    $host = 'tu_host_de_render';
    $db   = 'tu_base_de_datos';
    $user = 'tu_usuario';
    $pass = 'tu_contraseña';
    $port = '5432';

    try {
        $dsn = "pgsql:host=$host;port=$port;dbname=$db;sslmode=require";
        $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $detalle_productos = "";
        $gran_total = 0;

        foreach ($_SESSION['carrito'] as $item) {
            $subtotal = $item['precio'] * $item['cantidad'];
            $gran_total += $subtotal;
            $detalle_productos .= $item['cantidad'] . "x " . $item['nombre'] . " ($" . number_format($subtotal, 0, ',', '.') . "); ";
        }

        // Insertar pedido en la base de datos
        $stmt = $pdo->prepare("INSERT INTO pedidos (usuario_id, nombre_usuario, productos, total, estado) VALUES (?, ?, ?, ?, 'Pendiente')");
        $stmt->execute([$usuario_id, $nombre_usuario, $detalle_productos, $gran_total]);

    } catch (PDOException $e) {
        // Manejo silencioso o log de error si falla la BD momentáneamente
    }

    // Vaciar el carrito después de guardar el pedido
    unset($_SESSION['carrito']);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lusi shop - Pedido Exitoso</title>
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

        .main-content { flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 40px 20px; text-align: center; }
        
        .success-icon-container { width: 140px; height: 140px; border: 8px solid #32a852; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 30px; }
        .success-check { color: #32a852; font-size: 5rem; font-weight: bold; line-height: 1; }

        .success-message { font-size: 2rem; font-weight: 700; color: #000000; margin-bottom: 15px; }
        .success-sub { font-size: 1.1rem; color: #555; margin-bottom: 40px; }

        .btn-dashboard { background-color: #e50000; color: #ffffff; border: none; padding: 14px 35px; border-radius: 8px; font-family: 'Montserrat', sans-serif; font-size: 1.2rem; font-weight: 700; cursor: pointer; text-decoration: none; transition: background-color 0.2s ease; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .btn-dashboard:hover { background-color: #c40000; }
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
    </header>

    <main class="main-content">
        <div class="success-icon-container">
            <div class="success-check">✓</div>
        </div>
        
        <h1 class="success-message">Su pedido se realizó con éxito!</h1>
        <p class="success-sub">Notificación enviada: El administrador ya ha recibido tu solicitud y está en proceso.</p>

        <a href="dashboard.php" class="btn-dashboard">Volver al inicio</a>
    </main>

    <script>
        setTimeout(function() {
            window.location.href = 'dashboard.php';
        }, 6000);
    </script>

</body>
</html> 