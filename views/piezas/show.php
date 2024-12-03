<?php
require_once '../../config/database.php';
require_once '../../models/Pieza.php';

// Verificar si se ha pasado un ID de pieza válido
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID de pieza no proporcionado.");
}

$id = $_GET['id'];
$db = new Database();
$conn = $db->connect();
$piezaModel = new Pieza($conn);

// Obtener la información de la pieza
$pieza = $piezaModel->findById($id);

if (!$pieza) {
    die("Pieza no encontrada.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Pieza</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h3 class="text-center mb-4">Detalles de la Pieza</h3>
            <ul class="list-group">
                <li class="list-group-item"><strong>Bastidor:</strong> <?= htmlspecialchars($pieza['bastidor']) ?></li>
                <li class="list-group-item"><strong>Nombre:</strong> <?= htmlspecialchars($pieza['nombre_pieza']) ?></li>
                <li class="list-group-item"><strong>Categoría:</strong> <?= htmlspecialchars($pieza['categoria']) ?></li>
                <li class="list-group-item"><strong>Estado:</strong> <?= htmlspecialchars($pieza['estado_pieza']) ?></li>
                <li class="list-group-item"><strong>Precio (€):</strong> <?= htmlspecialchars($pieza['precio']) ?></li>
                <li class="list-group-item"><strong>Estantería:</strong> <?= htmlspecialchars($pieza['estanteria']) ?></li>
                <li class="list-group-item"><strong>Balda:</strong> <?= htmlspecialchars($pieza['balda']) ?></li>
                <li class="list-group-item"><strong>Sección:</strong> <?= htmlspecialchars($pieza['seccion']) ?></li>
                <li class="list-group-item"><strong>Fecha de Entrada:</strong> <?= htmlspecialchars($pieza['fecha_entrada']) ?></li>
                <li class="list-group-item"><strong>Última Actualización:</strong> <?= htmlspecialchars($pieza['fecha_actualizacion']) ?></li>
            </ul>
            <div class="mt-4 d-flex justify-content-between">
                <a href="index.php" class="btn btn-secondary">Volver</a>
                <a href="edit.php?id=<?= $pieza['id_pieza'] ?>" class="btn btn-warning">Editar</a>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
