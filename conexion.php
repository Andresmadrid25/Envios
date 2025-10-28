<?php
$host = "mysql-dragonfull.alwaysdata.net";
$dbname = "dragonfull_envios";
$user = "dragonfull";
$pass = "Misifu123+";

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
