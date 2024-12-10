<?php
require_once BASE_PATH . '/modelo/Deudor.php';
require_once BASE_PATH . '/modelo/RegistroMovimiento.php';

class DeudasController {
    private $deudorModel;
    private $registroMovimiento;

    public function __construct() {
        $this->deudorModel = new Deudor();
        $this->registroMovimiento = new RegistroMovimiento();
    }

    // Método para mostrar la lista de deudores con sus saldos actuales
    public function index($search = null) {
        $deudores = $this->deudorModel->getDeudoresConSaldo($search);
        require_once BASE_PATH . '/vista/deudas/index.php';
    }
        

    // Método para cargar la vista de creación de una nueva deuda
    public function create($id) {
        // Obtener el deudor por ID
        $deudor = $this->deudorModel->getDeudorById($id);
        
        // Verificar si el deudor existe
        if (!$deudor) {
            echo "Deudor no encontrado.";
            return;
        }
    
        // Pasar el deudor a la vista de creación
        require_once BASE_PATH . '/vista/deudas/create.php';
    }
    
    

    public function store() {
        $id_deudor = $_POST['id_deudor'];
        $fecha_deuda = $_POST['fecha_deuda'];
        $numero_boleta = $_POST['numero_boleta'];
        $total_deuda = $_POST['total_deuda'];
        $adelanto = $_POST['adelanto'];
    
        // Crear el registro de la deuda en la base de datos usando RegistroMovimiento
        $this->registroMovimiento->registrarDeuda($id_deudor, $total_deuda, $adelanto, $numero_boleta);
    
        // Redirigir de vuelta a la lista de deudas
        header("Location: /berlin_php_sc/index.php?controller=deudas&action=index");
        exit();
    }
    
}
