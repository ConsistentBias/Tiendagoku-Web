<?php
$servidor = "db.tiendagoku.com";
$usuario = "ariel";
$password = "1234";
$bd_nombre = "tienda_db";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$bd_nombre", $usuario, $password);
    // ...
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

?>