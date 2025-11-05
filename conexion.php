<?php
$servidor = "localhost";
$usuario = "usuario";
$password = "secret";
$bd_nombre = "inventario";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$bd_nombre", $usuario, $password);
    // ...
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

?>