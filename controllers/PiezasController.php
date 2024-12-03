<?php
require_once '../config/database.php';
require_once '../models/Pieza.php';

class PiezasController {
    public function search() {
        $db = new Database();
        $conn = $db->connect();
        $pieza = new Pieza($conn);

        if (isset($_GET['q'])) {
            $query = $_GET['q'];
            $results = $pieza->search($query);
            include '../views/piezas/index.php';
        }
    }
}

$controller = new PiezasController();
$controller->search();
