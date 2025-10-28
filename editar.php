<?php
include("config/conexion.php");

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destinatario = $_POST['destinatario'];
    $direccion = $_POST['direccion'];
    $descripcion = $_POST['descripcion'];

    $sql = "UPDATE envios SET destinatario = :destinatario, direccion = :direccion, descripcion = :descripcion WHERE id = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([
        ':destinatario' => $destinatario,
        ':direccion' => $direccion,
        ':descripcion' => $descripcion,
        ':id' => $id
    ]);

    header("Location: index.php");
    exit;
}

$stmt = $conexion->prepare("SELECT * FROM envios WHERE id = :id");
$stmt->execute([':id' => $id]);
$envio = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Envío</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-center mb-4">✏️ Editar Envío</h2>
    <form method="POST" class="card p-4 shadow-sm">
        <div class="mb-3">
            <label>Destinatario</label>
            <input type="text" name="destinatario" class="form-control" value="<?= htmlspecialchars($envio['destinatario']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="direccion" class="form-control" value="<?= htmlspecialchars($envio['direccion']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control"><?= htmlspecialchars($envio['descripcion']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
