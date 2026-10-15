<?php
session_start();

// Conexión a PostgreSQL (Ajusta tus datos de conexión de Render)
$host = 'tu_host_de_render';
$db   = 'tu_base_de_datos';
$user = 'tu_usuario';
$pass = 'tu_contraseña';
$port = '5432';

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$db;sslmode=require";
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    // Cambiar estado de pedido si se solicita
    if (isset($_GET['accion']) && $_GET['accion'] == 'completar' && isset($_GET['id'])) {
        $stmtUpdate = $pdo->prepare("UPDATE pedidos SET estado = 'Completado' WHERE id = ?");
        $stmtUpdate->execute([$_GET['id']]);
        header("Location: admin.php");
        exit();
    }

    // Obtener todos los pedidos
    $stmt = $pdo->query("SELECT * FROM pedidos ORDER BY fecha DESC");
    $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    $error = "Error de conexión: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lusi shop - Panel Administrativo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Montserrat', sans-serif; background-color: #f4f6f9; color: #000000; min-height: 100vh; display: flex; flex-direction: column; }
        
        .top-banner { width: 100%; background-color: #e50000; height: 75px; display: flex; align-items: center; justify-content: space-between; padding: 0 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .banner-left { display: flex; align-items: center; gap: 15px; }
        .banner-logo { width: 55px; height: 55px; border-radius: 50%; border: 2px solid #ffffff; background-color: #0d1b2a; display: flex; flex-direction: column; justify-content: center; align-items: center; color: white; text-align: center; text-decoration: none; }
        .banner-logo .cart-icon-small { font-size: 11px; color: #e50000; margin-bottom: 1px; }
        .banner-logo .brand-name { font-weight: bold; font-size: 11px; line-height: 1; }
        .banner-logo .brand-sub { color: #e50000; font-size: 8px; font-weight: bold; }
        .banner-title { color: #ffffff; font-size: 1.5rem; font-weight: 600; }

        .main-content { flex: 1; max-width: 1200px; margin: 0 auto; width: 100%; padding: 40px 20px; }
        .admin-title { font-size: 2rem; font-weight: 700; margin-bottom: 25px; color: #0d1b2a; }

        table { width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        th, td { padding: 15px 20px; text-align: left; border-bottom: 1px solid #eee; }
        th { background-color: #0d1b2a; color: white; font-weight: 600; }
        tr:hover { background-color: #f9f9f9; }

        .badge-pending { background-color: #ffc107; color: #000; padding: 5px 10px; border-radius: 4px; font-weight: bold; font-size: 0.85rem; }
        .badge-completed { background-color: #28a745; color: white; padding: 5px 10px; border-radius: 4px; font-weight: bold; font-size: 0.85rem; }

        .btn-action { background-color: #007bff; color: white; padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 0.9rem; font-weight: 600; transition: background 0.2s; }
        .btn-action:hover { background-color: #0056b3; }
        
        .back-link { display: inline-block; margin-bottom: 20px; font-weight: 600; color: #000; text-decoration: none; }
        .back-link:hover { color: #e50000; text-decoration: underline; }
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
            <span class="banner-title">Lusi shop - Panel Admin</span>
        </div>
    </header>

    <main class="main-content">
        <a href="dashboard.php" class="back-link">← Volver al Dashboard</a>
        <h1 class="admin-title">Gestión de Pedidos de la Comunidad</h1>

        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php elseif (empty($pedidos)): ?>
            <p style="font-size: 1.2rem; color: #666;">No hay pedidos registrados todavía.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Estudiante</th>
                        <th>Productos</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pedidos as $pedido): ?>
                        <tr>
                            <td>#<?php echo $pedido['id']; ?></td>
                            <td><?php echo htmlspecialchars($pedido['nombre_usuario']); ?></td>
                            <td><?php echo htmlspecialchars($pedido['productos']); ?></td>
                            <td>$<?php echo number_format($pedido['total'], 0, ',', '.'); ?></td>
                            <td>
                                <?php if ($pedido['estado'] == 'Pendiente'): ?>
                                    <span class="badge-pending">Pendiente</span>
                                <?php else: ?>
                                    <span class="badge-completed">Completado</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $pedido['fecha']; ?></td>
                            <td>
                                <?php if ($pedido['estado'] == 'Pendiente'): ?>
                                    <a href="admin.php?accion=completar&id=<?php echo $pedido['id']; ?>" class="btn-action">Completar</a>
                                <?php else: ?>
                                    <span>Entregado</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>

</body>
</html>