<?php
// Iniciamos sesión para validar que el usuario esté autenticado
session_start();

// Proteger la página para que solo entren si iniciaron sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Consultar las notificaciones y estado de los pedidos del usuario actual
$notificaciones = [];
$usuario_id = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : 0;

if ($usuario_id > 0) {
    $host = 'dpg-daulsnu0tbcc73bq1e40-a';
    $db   = 'bsd_lusi_shop_bd';
    $user = 'bsd_lusi_shop_bd_user';
    $pass = 'zZDjtVq4KL9wKMiLDeA4oX0b5nxVbJSb';
    $port = '5432';

    try {
        $dsn = "pgsql:host=$host;port=$port;dbname=$db;sslmode=require";
        $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $stmt = $pdo->prepare("SELECT * FROM pedidos WHERE usuario_id = ? ORDER BY fecha DESC LIMIT 3");
        $stmt->execute([$usuario_id]);
        $notificaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Manejo silencioso si falla la conexión momentáneamente
    }
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
            justify-content: space-between;
            padding: 0 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .banner-left {
            display: flex;
            align-items: center;
            gap: 15px;
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

        /* Botón de cerrar sesión */
        .btn-logout {
            background-color: #ffffff;
            color: #e50000;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.95rem;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .btn-logout:hover {
            background-color: #0d1b2a;
            color: #ffffff;
        }

        /* Contenido principal centrado */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 30px 20px;
        }

        .welcome-heading {
            font-size: 2.2rem;
            font-weight: 400;
            margin-bottom: 15px;
            color: #000000;
        }

        .welcome-phrase {
            font-size: 1.15rem;
            font-weight: 400; /* Negrita removida */
            line-height: 1.5;
            margin-bottom: 25px;
            color: #000000;
        }

        /* Contenedor de notificaciones */
        .notifications-container {
            width: 100%;
            max-width: 600px;
            background: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            text-align: left;
        }

        .notifications-container h3 {
            font-size: 1.2rem;
            font-weight: 400;
            margin-bottom: 15px;
            color: #0d1b2a;
            border-bottom: 2px solid #e50000;
            padding-bottom: 5px;
        }

        .notification-item {
            padding: 12px 15px;
            margin-bottom: 10px;
            background: #ffffff;
            border-radius: 6px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .notification-item p {
            font-size: 0.9rem;
            margin-bottom: 4px;
        }

        .badge-pending {
            color: #d9822b;
            font-weight: bold;
        }

        .badge-completed {
            color: #28a745;
            font-weight: bold;
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
            font-weight: 400; /* Negrita removida */
            text-align: center;
        }

        .footer a {
            color: #000000;
            text-decoration: none;
            font-weight: 400; /* Negrita removida */
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
            .btn-logout {
                padding: 6px 10px;
                font-size: 0.85rem;
            }
        }
    </style>
</head>
<body>

    <!-- Franja superior -->
    <header class="top-banner">
        <div class="banner-left">
            <a href="dashboard.php" class="banner-logo">
                <div class="cart-icon">🛒</div>
                <div class="brand-name">lusi</div>
                <div class="brand-sub">shop</div>
            </a>
            <span class="banner-title">Lusi shop</span>
        </div>
        <!-- Botón de Cerrar Sesión -->
        <a href="logout.php" class="btn-logout">Cerrar sesión</a>
    </header>

    <!-- Contenido Central -->
    <main class="main-content">
        <h1 class="welcome-heading">Bienvenido a Lusi shop<?php echo isset($_SESSION['nombre']) ? ', ' . htmlspecialchars($_SESSION['nombre']) : ''; ?></h1>
        
        <p class="welcome-phrase">
            Un descanso, un antojo,<br>
            un momento.
        </p>

        <!-- Sección de notificaciones de pedidos -->
        <div class="notifications-container">
            <h3>Estado de tus pedidos</h3>
            <?php if (empty($notificaciones)): ?>
                <p style="color: #666; font-size: 0.95rem;">No tienes pedidos recientes.</p>
            <?php else: ?>
                <?php foreach ($notificaciones as $n): ?>
                    <div class="notification-item" style="border-left: 4px solid <?php echo ($n['estado'] == 'Completado') ? '#28a745' : '#ffc107'; ?>;">
                        <p><strong>Pedido #<?php echo $n['id']; ?></strong> Total: $<?php echo number_format($n['total'], 0, ',', '.'); ?></p>
                        <p style="color: #555;">Productos: <?php echo htmlspecialchars($n['productos']); ?></p>
                        <p style="margin-top: 6px;">
                            Estado: 
                            <?php if ($n['estado'] == 'Completado'): ?>
                                <span class="badge-completed">¡Pedido listo / entregado!</span>
                            <?php else: ?>
                                <span class="badge-pending">En proceso (Pendiente)</span>
                            <?php endif; ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <a href="productos.php" class="products-link">Ver productos</a>
    </main>

    <!-- Pie de página -->
    <footer class="footer">
        <a href="acerca.php">Acerca de nosotros</a>
    </footer>

</body>
</html>