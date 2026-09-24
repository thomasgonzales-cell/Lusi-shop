<?php
// Parámetros de conexión de tu base de datos PostgreSQL en Render
$host     = "tu_host.render.com"; // Ej: dpg-xxxx-a.oregon-postgres.render.com
$port     = "5432";
$dbname   = "tu_nombre_db";
$user     = "tu_usuario_db";
$password = "tu_contraseña_db";

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