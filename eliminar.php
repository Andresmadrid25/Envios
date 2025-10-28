<?php
include("config/conexion.php");

if (isset($_GET['id'])) {
    $stmt = $conexion->prepare("DELETE FROM envios WHERE id = :id");
    $stmt->execute([':id' => $_GET['id']]);
}

header("Location: index.php");
exit;
?>
