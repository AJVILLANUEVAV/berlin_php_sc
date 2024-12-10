<?php
// Configura los errores (solo para desarrollo)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Definir la ruta base como la raíz del proyecto
define('BASE_PATH', __DIR__ . '/public');

// Iniciar sesión para manejar la autenticación
session_start();

// Autocarga de clases de los directorios 'controlador' y 'modelo'
function autoload($class) {
    $paths = [
        BASE_PATH . '/controlador/',
        BASE_PATH . '/modelo/',
    ];
    
    foreach ($paths as $path) {
        if (file_exists($path . $class . '.php')) {
            require_once $path . $class . '.php';
            return;
        }
    }
}
spl_autoload_register('autoload');

// Controlador y acción predeterminados
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : 'DeudoresController';
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

// Verificación de autenticación
if (!isset($_SESSION['user_id']) && $controllerName !== 'LoginController') {
    header("Location: /berlin_php_sc/index.php?controller=login&action=index");
    exit();
}

// Instanciar el controlador
$controllerPath = BASE_PATH . '/controlador/' . $controllerName . '.php';
if (file_exists($controllerPath)) {
    require_once $controllerPath;
    $controller = new $controllerName();

    // Capturar el parámetro 'search' si está presente
    $search = isset($_GET['search']) ? $_GET['search'] : null;

    // Si la acción es 'store' o 'authenticate', pasar datos del formulario
    if ($actionName === 'store' || $actionName === 'authenticate') {
        $data = $_POST;
        call_user_func([$controller, $actionName], $data);
    }
    // Si la acción es 'update', pasar 'id' y datos del formulario
    elseif ($actionName === 'update') {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $data = $_POST;
        if ($id !== null) {
            call_user_func([$controller, $actionName], $id, $data);
        } else {
            echo "ID no proporcionado para la actualización.";
        }
    }
    // Si la acción es 'index', pasar el parámetro 'search' si existe
    elseif ($actionName === 'index') {
        call_user_func([$controller, $actionName], $search);
    } else {
        // Llamar a la acción sin datos adicionales
        if (method_exists($controller, $actionName)) {
            call_user_func_array([$controller, $actionName], array_slice($_GET, 2));
        } else {
            echo "La acción '$actionName' no existe en el controlador '$controllerName'.";
        }
    }

    // Instanciar el controlador
    if ($controllerName === 'ReporteController') {
        $controller = new ReporteController();
        if ($actionName === 'exportToPdf') {
            $controller->exportToPdf(isset($_GET['search']) ? $_GET['search'] : null);
            exit();
        }
    }

} else {
    echo "El controlador '$controllerName' no existe.";
}
