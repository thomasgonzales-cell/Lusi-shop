<?php
// Parámetros de conexión de tu base de datos PostgreSQL en Render
$host     = "dpg-daulsnu0tbcc73bq1e40-a"; // Ej: dpg-xxxx-a.oregon-postgres.render.com
$port     = "5432";
$dbname   = "bsd_lusi_shop_bd";
$user     = "bsd_lusi_shop_bd_user";
$password = "zZDjtVq4KL9wKMiLDeA4oX0b5nxVbJSb";

// Cadena de conexión PDO para PostgreSQL en Render
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";

try {
    // Creación de la instancia PDO
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    // Descomenta la siguiente línea para probar que la conexión funciona:
    // echo "Conexión exitosa a la base de datos PostgreSQL de Render";
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>