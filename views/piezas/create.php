<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Pieza</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h3 class="text-center mb-4">Crear Nueva Pieza</h3>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="bastidor" class="form-label">Bastidor</label>
                    <input type="text" name="bastidor" id="bastidor" class="form-control" placeholder="Ingrese el bastidor del vehículo" required>
                </div>
                <div class="mb-3">
                    <label for="nombre_pieza" class="form-label">Nombre de la Pieza</label>
                    <input type="text" name="nombre_pieza" id="nombre_pieza" class="form-control" placeholder="Ingrese el nombre de la pieza" required>
                </div>
                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoría</label>
                    <input type="text" name="categoria" id="categoria" class="form-control" placeholder="Ingrese la categoría de la pieza" required>
                </div>
                <div class="mb-3">
                    <label for="estado_pieza" class="form-label">Estado</label>
                    <select name="estado_pieza" id="estado_pieza" class="form-select" required>
                        <option value="Nuevo">Nuevo</option>
                        <option value="Usado">Usado</option>
                        <option value="Defectuoso">Defectuoso</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" name="precio" id="precio" class="form-control" placeholder="Ingrese el precio" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="estanteria" class="form-label">Estantería</label>
                    <input type="text" name="estanteria" id="estanteria" class="form-control" placeholder="Ingrese la estantería" required>
                </div>
                <div class="mb-3">
                    <label for="balda" class="form-label">Balda</label>
                    <input type="text" name="balda" id="balda" class="form-control" placeholder="Ingrese la balda" required>
                </div>
                <div class="mb-3">
                    <label for="seccion" class="form-label">Sección</label>
                    <input type="text" name="seccion" id="seccion" class="form-control" placeholder="Ingrese la sección" required>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Crear Pieza</button>
                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

