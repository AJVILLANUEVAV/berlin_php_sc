<?php
require_once BASE_PATH . '/modelo/Usuario.php';

class LoginController {
    public function index() {
        require_once BASE_PATH . '/vista/login/index.php';
    }

    public function authenticate($data) {
        $usuarioModel = new Usuario();
        $user = $usuarioModel->getUserByEmailAndPassword($data['email'], $data['password']);

        if ($user) {
            session_start();
            $_SESSION['user_id'] = $user['id_usuario'];
            $_SESSION['user_name'] = $user['nombre'];
            header("Location: /berlin_php_sc/index.php?controller=deudores&action=index");
        } else {
            $error = "Correo o contraseña incorrectos";
            require_once BASE_PATH . '/vista/login/index.php';
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /berlin_php_sc/index.php?controller=login&action=index");
    }
}
