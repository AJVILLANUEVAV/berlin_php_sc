<?php
require_once BASE_PATH . '/modelo/Deudor.php';

class DeudoresController {
    private $deudorModel;

    public function __construct() {
        $this->deudorModel = new Deudor();
    }

    // Método para mostrar la lista de deudores o busqueda de deudores
    public function index($search = null) {
        if ($search) {
            $deudores = $this->deudorModel->buscarDeudores($search);
        } else {
            $deudores = $this->deudorModel->getDeudores();
        }
    
        require_once BASE_PATH . '/vista/deudores/index.php';
    }
    

    // Método para mostrar el formulario de creación de deudor
    public function create() {
        require_once BASE_PATH . '/vista/deudores/create.php';
    }

    // Método para almacenar un nuevo deudor
    public function store($data) {
        $this->deudorModel->addDeudor($data);
        header("Location: /berlin_php_sc/index.php?controller=deudores&action=index");
    }

    // Método para mostrar el formulario de edición de deudor
    public function edit($id) {
        $deudor = $this->deudorModel->getDeudorById($id);
        require_once BASE_PATH . '/vista/deudores/edit.php';
    }

    // Método para actualizar un deudor existente
    public function update($id, $data) {
        $this->deudorModel->updateDeudor($id, $data);
        header("Location: /berlin_php_sc/index.php?controller=deudores&action=index");
    }
    
}
?>
