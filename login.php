<?php
session_start();
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = trim($_POST['correo']);
    $password = $_POST['password'];

    // Tus credenciales reales de Render
    $host = 'dpg-daulsnu0tbcc73bq1e40-a';
    $db   = 'bsd_lusi_shop_bd';
    $user = 'bsd_lusi_shop_bd_user';
    $pass = 'zZDjtVq4KL9wKMiLDeA4oX0b5nxVbJSb';
    $port = '5432';

    try {
        $dsn = "pgsql:host=$host;port=$port;dbname=$db;sslmode=require";
        $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$correo]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && (password_verify($password, $usuario['password']) || $password === $usuario['password'])) {
            $_SESSION['usuario'] = $usuario['email'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['usuario_id'] = $usuario['id'];
            
            if (isset($usuario['rol']) && $usuario['rol'] === 'admin') {
                $_SESSION['admin_logged'] = true;
                header("Location: admin.php");
            } else {
                header("Location: dashboard.php");
            }
            exit();
        } else {
            $error = "Correo o contraseña incorrectos.";
        }
    } catch (PDOException $e) {
        $error = "Error de conexión: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lusi shop - Iniciar Sesión</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Montserrat', sans-serif; background-color: #ffffff; color: #000000; min-height: 100vh; display: flex; flex-direction: column; justify-content: space-between; position: relative; }
        
        /* Logotipo circular superior izquierdo idéntico */
        .header-logo {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            border: 2px solid #e50000;
            background-color: #0d1b2a;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            text-decoration: none;
        }

        .header-logo .cart-icon {
            font-size: 14px;
            color: #e50000;
            margin-bottom: 2px;
        }

        .header-logo .brand-name {
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            font-size: 13px;
            line-height: 1;
        }

        .header-logo .brand-sub {
            color: #e50000;
            font-size: 10px;
            font-weight: bold;
        }

        .main-content { flex: 1; display: flex; align-items: center; justify-content: center; padding: 40px 20px; }
        .login-card { background: #f9f9f9; padding: 40px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); width: 100%; max-width: 400px; text-align: center; }
        
        .login-card h2 { font-size: 1.8rem; font-weight: 700; margin-bottom: 25px; color: #0d1b2a; }
        .form-group { margin-bottom: 20px; text-align: left; }
        .form-group label { display: block; font-size: 0.95rem; font-weight: 600; margin-bottom: 8px; }
        .form-group input { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 6px; font-family: 'Montserrat', sans-serif; font-size: 1rem; background: #fff; }
        
        .btn-submit { background-color: #e50000; color: white; border: none; width: 100%; padding: 12px; border-radius: 6px; font-family: 'Montserrat', sans-serif; font-size: 1.1rem; font-weight: 700; cursor: pointer; transition: background 0.2s; }
        .btn-submit:hover { background-color: #c40000; }
        
        .error-msg { background-color: #ffe6e6; color: #d32f2f; padding: 10px; border-radius: 6px; margin-bottom: 20px; font-size: 0.85rem; font-weight: 600; text-align: left; word-break: break-word; }
        
        .admin-section { margin-top: 25px; border-top: 1px solid #ddd; padding-top: 15px; }
        .admin-link { font-size: 0.9rem; color: #0d1b2a; font-weight: 600; text-decoration: none; }
        .admin-link:hover { color: #e50000; text-decoration: underline; }
    </style>
</head>
<body>

    <!-- Logo circular de la esquina idéntico -->
    <a href="index.php" class="header-logo">
        <div class="cart-icon">🛒</div>
        <div class="brand-name">lusi</div>
        <div class="brand-sub">shop</div>
    </a>

    <main class="main-content">
        <div class="login-card">
            <h2>Iniciar Sesión</h2>
            
            <?php if (!empty($error)): ?>
                <div class="error-msg"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="email" id="correo" name="correo" required placeholder="tucorreo@colegio.edu.co">
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required placeholder="••••••••">
                </div>
                <button type="submit" class="btn-submit">Entrar</button>
            </form>

            <div class="admin-section">
                <a href="admin_login.php" class="admin-link">🔒 ¿Eres administrador? Inicia sesión aquí</a>
            </div>
        </div>
    </main>

</body>
</html>