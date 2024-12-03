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

// Manejar el formulario de edición
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_pieza = $_POST['nombre_pieza'];
    $categoria = $_POST['categoria'];
    $estado_pieza = $_POST['estado_pieza'];
    $precio = $_POST['precio'];
    $estanteria = $_POST['estanteria'];
    $balda = $_POST['balda'];
    $seccion = $_POST['seccion'];

    $actualizado = $piezaModel->update($id, $nombre_pieza, $categoria, $estado_pieza, $precio, $estanteria, $balda, $seccion);

    if ($actualizado) {
        header("Location: index.php?message=Pieza actualizada correctamente");
        exit();
    } else {
        echo "Error al actualizar la pieza.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pieza</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h3 class="text-center mb-4">Editar Pieza</h3>
            <form method="POST">
                <div class="mb-3">
                    <label for="nombre_pieza" class="form-label">Nombre de la Pieza</label>
                    <input type="text" name="nombre_pieza" id="nombre_pieza" class="form-control" value="<?= htmlspecialchars($pieza['nombre_pieza']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoría</label>
                    <input type="text" name="categoria" id="categoria" class="form-control" value="<?= htmlspecialchars($pieza['categoria']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="estado_pieza" class="form-label">Estado</label>
                    <select name="estado_pieza" id="estado_pieza" class="form-select" required>
                        <option value="Nuevo" <?= $pieza['estado_pieza'] === 'Nuevo' ? 'selected' : '' ?>>Nuevo</option>
                        <option value="Usado" <?= $pieza['estado_pieza'] === 'Usado' ? 'selected' : '' ?>>Usado</option>
                        <option value="Defectuoso" <?= $pieza['estado_pieza'] === 'Defectuoso' ? 'selected' : '' ?>>Defectuoso</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" name="precio" id="precio" class="form-control" value="<?= htmlspecialchars($pieza['precio']) ?>" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="estanteria" class="form-label">Estantería</label>
                    <input type="text" name="estanteria" id="estanteria" class="form-control" value="<?= htmlspecialchars($pieza['estanteria']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="balda" class="form-label">Balda</label>
                    <input type="text" name="balda" id="balda" class="form-control" value="<?= htmlspecialchars($pieza['balda']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="seccion" class="form-label">Sección</label>
                    <input type="text" name="seccion" id="seccion" class="form-control" value="<?= htmlspecialchars($pieza['seccion']) ?>" required>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

