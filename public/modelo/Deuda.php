<?php
require_once BASE_PATH . '/modelo/Database.php';

class Deuda {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAllDeudores() {
        $query = "SELECT * FROM deudores";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllDeudas() {
        $query = "SELECT * FROM registro_deuda";
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
    

    public function addDeuda($data) {
        $query = "INSERT INTO registro_deuda (nombre_deudor, numero_boleta, numero_serie, fecha_deuda, tipo_pago, total_deuda, saldo_deuda, adelanto) 
                  VALUES (:nombre_deudor, :numero_boleta, :numero_serie, :fecha_deuda, :tipo_pago, :total_deuda, :saldo_deuda, :adelanto)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nombre_deudor', $data['nombre_deudor']);
        $stmt->bindParam(':numero_boleta', $data['numero_boleta']);
        $stmt->bindParam(':numero_serie', $data['numero_serie']);
        $stmt->bindParam(':fecha_deuda', $data['fecha_deuda']);
        $stmt->bindParam(':tipo_pago', $data['tipo_pago']);
        $stmt->bindParam(':total_deuda', $data['total_deuda']);
        $stmt->bindParam(':saldo_deuda', $data['saldo_deuda']);
        $stmt->bindParam(':adelanto', $data['adelanto']);

        return $stmt->execute();
    }
    
}
