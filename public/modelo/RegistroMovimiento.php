<?php
require_once BASE_PATH . '/modelo/Database.php';

class RegistroMovimiento {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // Método para registrar un movimiento de deuda
    public function registrarDeuda($deudorId, $montoDeuda, $adelanto, $resumen) {
        $saldo = $montoDeuda - $adelanto;
    
        $query = "INSERT INTO registro_movimiento (id_deudor, adelanto, fecha_registro, pago, resumen, saldo, saldo_total, tipo_movimiento)
                  VALUES (:deudorId, :adelanto, NOW(), 0, :resumen, :saldo, :saldo, 'Deuda')";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':deudorId', $deudorId);
        $stmt->bindParam(':adelanto', $adelanto);
        $stmt->bindParam(':resumen', $resumen);
        $stmt->bindParam(':saldo', $saldo);
        $stmt->execute();
    }
    

    // Método para registrar un movimiento de pago
    public function registrarPago($deudorId, $montoPago, $resumen) {
        $query = "INSERT INTO registro_movimiento (id_deudor, adelanto, fecha_registro, pago, resumen, saldo, saldo_total, tipo_movimiento)
                  VALUES (:deudorId, 0, NOW(), :monto_pago, :resumen, 0, -:monto_pago, 'Pago')";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':deudorId', $deudorId);
        $stmt->bindParam(':monto_pago', $montoPago);
        $stmt->bindParam(':resumen', $resumen);
        $stmt->execute();
    }
    
    

    // Método para obtener el saldo total actual de un deudor
    public function obtenerSaldoTotal($deudorId) {
        $query = "SELECT saldo_total FROM registro_movimiento WHERE id_deudor = :id_deudor ORDER BY id_registro_movimientos DESC LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_deudor', $deudorId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? $result['saldo_total'] : 0;
    }
}
