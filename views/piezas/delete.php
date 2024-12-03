<?php
require_once '../../config/database.php';
require_once '../../models/Pieza.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $db = new Database();
    $conn = $db->connect();
    $piezaModel = new Pieza($conn);

    $eliminado = $piezaModel->delete($id);

    if ($eliminado) {
        header("Location: index.php?message=Pieza eliminada correctamente");
    } else {
        echo "Error al eliminar la pieza.";
    }
    exit();
}


