<?php
// Iniciar sesión para manejar usuarios autenticados
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user'])) {
    header("Location: ../views/auth/login.php");
    exit();
}

// Cargar la configuración y los controladores necesarios
require_once '../config/database.php';
require_once '../models/Pieza.php';

// Configuración de la base de datos
$db = new Database();
$conn = $db->connect();
$piezaModel = new Pieza($conn);

// Manejar las rutas simples (opcional)
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'home':
        include '../views/piezas/index.php';
        break;
    case 'create':
        include '../views/piezas/create.php';
        break;
    case 'edit':
        include '../views/piezas/edit.php';
        break;
    case 'delete':
        include '../views/piezas/delete.php';
        break;
    case 'show':
        include '../views/piezas/show.php';
        break;
    default:
        echo "Página no encontrada.";
        break;
}




