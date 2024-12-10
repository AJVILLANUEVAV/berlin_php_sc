<?php
require_once BASE_PATH . '/modelo/Database.php';

class Pago {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function buscarDeudores($search) {
        $query = "SELECT * FROM deudores 
                  WHERE nombres LIKE :search 
                     OR apellidos LIKE :search 
                     OR correo LIKE :search 
                     OR telefono LIKE :search 
                     OR direccion LIKE :search 
                     OR provincia LIKE :search";
        $stmt = $this->conn->prepare($query);
        $searchParam = '%' . $search . '%';
        $stmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllDeudores() {
        $query = "SELECT * FROM deudores";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDeudorById($id) {
        $query = "SELECT * FROM deudores WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addPago($data) {
        $query = "INSERT INTO registro_pago (boleta, documento_transferencia, fecha_pago, monto_pago, serie, tipo_pago) 
                  VALUES (:boleta, :documento_transferencia, :fecha_pago, :monto_pago, :serie, :tipo_pago)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':boleta', $data['numero_boleta']);
        $stmt->bindParam(':documento_transferencia', $data['documento_transferencia']);
        $stmt->bindParam(':fecha_pago', $data['fecha_pago']);
        $stmt->bindParam(':monto_pago', $data['total_pago']);
        $stmt->bindParam(':serie', $data['numero_serie']);
        $stmt->bindParam(':tipo_pago', $data['tipo_pago']);
        $stmt->execute();
    }
}
