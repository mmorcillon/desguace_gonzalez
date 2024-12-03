<?php
require_once '../../config/database.php';
require_once '../../models/Pieza.php';

$db = new Database();
$conn = $db->connect();
$piezaModel = new Pieza($conn);

// Obtener la lista de piezas
$piezas = $piezaModel->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Piezas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Gestión de Piezas</h1>

        <!-- Buscador -->
        <div class="mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Buscar por bastidor, nombre o marca">
        </div>

        <!-- Botón para agregar nueva pieza -->
        <div class="mb-3 text-end">
            <a href="create.php" class="btn btn-success">+ Agregar Nueva Pieza</a>
        </div>

        <!-- Tabla de piezas -->
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-striped table-bordered" id="piezasTable">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Bastidor</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Estado</th>
                            <th>Precio (€)</th>
                            <th>Marca</th>
                            <th>Estanteria</th>
                            <th>Balda</th>
                            <th>Seccion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($piezas)): ?>
                            <?php foreach ($piezas as $pieza): ?>
                                <tr>
                                    <td><?= htmlspecialchars($pieza['id_pieza']) ?></td>
                                    <td><?= htmlspecialchars($pieza['bastidor']) ?></td>
                                    <td><?= htmlspecialchars($pieza['nombre_pieza']) ?></td>
                                    <td><?= htmlspecialchars($pieza['categoria']) ?></td>
                                    <td><?= htmlspecialchars($pieza['estado_pieza']) ?></td>
                                    <td><?= htmlspecialchars($pieza['precio']) ?></td>
                                    <td><?= htmlspecialchars($pieza['marca']) ?></td>
                                    <td><?= htmlspecialchars($pieza['estanteria']) ?></td>
                                    <td><?= htmlspecialchars($pieza['balda']) ?></td>
                                    <td><?= htmlspecialchars($pieza['seccion']) ?></td>
                                    <td>
                                        <a href="show.php?id=<?= $pieza['id_pieza'] ?>" class="btn btn-info btn-sm">Mostrar</a>
                                        <a href="edit.php?id=<?= $pieza['id_pieza'] ?>" class="btn btn-warning btn-sm">Actualizar</a>
                                        <form action="delete.php" method="POST" style="display: inline-block;">
                                            <input type="hidden" name="id" value="<?= $pieza['id_pieza'] ?>">
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="9" class="text-center">No se encontraron piezas.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Función para filtrar filas de la tabla
        document.getElementById('searchInput').addEventListener('input', function() {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('#piezasTable tbody tr');

            rows.forEach(row => {
                const bastidor = row.cells[1].textContent.toLowerCase();
                const marca = row.cells[6].textContent.toLowerCase();
                const nombre = row.cells[2].textContent.toLowerCase();

                if (bastidor.includes(filter) || marca.includes(filter) || nombre.includes(filter)) {
                    row.style.display = ''; // Mostrar fila
                } else {
                    row.style.display = 'none'; // Ocultar fila
                }
            });
        });
    </script>
</body>
</html>
