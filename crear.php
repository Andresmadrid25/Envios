<?php
include("config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destinatario = $_POST['destinatario'];
    $direccion = $_POST['direccion'];
    $descripcion = $_POST['descripcion'];

    $sql = "INSERT INTO envios (destinatario, direccion, descripcion) VALUES (:destinatario, :direccion, :descripcion)";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([
        ':destinatario' => $destinatario,
        ':direccion' => $direccion,
        ':descripcion' => $descripcion
    ]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Envío</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-center mb-4">➕ Registrar Envío</h2>
    <form method="POST" class="card p-4 shadow-sm">
        <div class="mb-3">
            <label>Destinatario</label>
            <input type="text" name="destinatario" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="direccion" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
