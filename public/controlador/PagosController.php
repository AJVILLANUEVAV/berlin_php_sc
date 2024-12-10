<?php
require_once BASE_PATH . '/modelo/Pago.php';

class PagosController {
    private $pagoModel;

    public function __construct() {
        $this->pagoModel = new Pago();
    }

    // Método para mostrar la lista de deudores para registrar pagos
    public function index($search = null) {
        if ($search) {
            $deudores = $this->pagoModel->buscarDeudores($search);
        } else {
            $deudores = $this->pagoModel->getAllDeudores();
        }
        require_once BASE_PATH . '/vista/pagos/index.php';
    }
    
    

    // Método para mostrar el formulario de creación de pago
    public function create($id) {
        $deudor = $this->pagoModel->getDeudorById($id);
        
        if (!$deudor) {
            echo "Deudor no encontrado.";
            return;
        }
    
        // Obtener el saldo total del deudor
        $registroMovimiento = new RegistroMovimiento();
        $saldoTotal = $registroMovimiento->obtenerSaldoTotal($id);
    
        // Pasar el saldo y el deudor a la vista de creación de pagos
        require_once BASE_PATH . '/vista/pagos/create.php';
    }
    

    // Método para almacenar un nuevo pago
    public function store($data) {
        // Añadir el pago en la tabla de pagos
        $this->pagoModel->addPago($data);
    
        // Registrar el movimiento en registro_movimiento
        $registroMovimiento = new RegistroMovimiento();
        $resumen = "Pago registrado para el deudor con ID " . $data['id_deudor'];
        $registroMovimiento->registrarPago($data['id_deudor'], $data['total_pago'], $resumen);
    
        header("Location: /berlin_php_sc/index.php?controller=pagos&action=index");
        exit();
    }
}
