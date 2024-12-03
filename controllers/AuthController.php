<?php
require_once '../config/database.php';
require_once '../models/Usuario.php';

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $db = new Database();
            $conn = $db->connect();
            $usuario = new Usuario($conn);

            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $usuario->login($username, $password);

            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                header("Location: ../views/piezas/index.php");
            } else {
                echo "Usuario o contraseña incorrectos.";
            }
        }
    }
}

$auth = new AuthController();
$auth->login();
