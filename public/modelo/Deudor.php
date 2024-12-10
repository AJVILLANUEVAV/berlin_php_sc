<?php
require_once 'Database.php';

class Deudor {
    private $conn;
    private $table = 'deudores';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Cambia el nombre a getDeudores
    public function getDeudores($search = null) {
        if ($search) {
            $query = "SELECT * FROM deudores WHERE nombres LIKE ? OR apellidos LIKE ? ORDER BY id ASC";
            $stmt = $this->conn->prepare($query);
            $search = "%$search%";
            $stmt->bindValue(1, $search);
            $stmt->bindValue(2, $search);
        } else {
            $query = "SELECT * FROM deudores ORDER BY id ASC";
            $stmt = $this->conn->prepare($query);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Hace el listo de los deudores
    public function getDeudoresConSaldo($search = null) {
        $query = "
            SELECT d.id, d.nombres, d.apellidos, d.correo, d.telefono, d.direccion, d.provincia,
                   COALESCE(SUM(CASE 
                       WHEN rm.tipo_movimiento = 'Deuda' THEN rm.saldo 
                       WHEN rm.tipo_movimiento = 'Pago' THEN -rm.pago 
                       ELSE 0 END), 0) AS saldo_actual,
                   MAX(rm.fecha_registro) AS ultima_transaccion
            FROM deudores d
            LEFT JOIN registro_movimiento rm ON d.id = rm.id_deudor";
        
        if ($search) {
            $query .= " WHERE d.nombres LIKE :search 
                         OR d.apellidos LIKE :search
                         OR d.correo LIKE :search
                         OR d.telefono LIKE :search
                         OR d.direccion LIKE :search
                         OR d.provincia LIKE :search";
        }
    
        $query .= " GROUP BY d.id
                    ORDER BY d.id ASC";
    
        $stmt = $this->conn->prepare($query);
    
        if ($search) {
            $searchTerm = "%" . $search . "%";
            $stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
        }
    
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    
    
    
    
    //Método que ayuda en la bísqueda de los deudores
    public function buscarDeudores($search) {
        $query = "SELECT * FROM deudores 
                  WHERE nombres LIKE :search OR 
                        apellidos LIKE :search OR 
                        correo LIKE :search OR 
                        telefono LIKE :search OR 
                        direccion LIKE :search OR 
                        provincia LIKE :search";
    
        $stmt = $this->conn->prepare($query);
        $searchTerm = "%" . $search . "%";
        $stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    

    // Método para agregar un deudor
    public function addDeudor($data) {
        $query = "INSERT INTO " . $this->table . " (nombres, apellidos, correo, telefono, direccion, provincia) 
                  VALUES (:nombres, :apellidos, :correo, :telefono, :direccion, :provincia)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nombres', $data['nombres']);
        $stmt->bindParam(':apellidos', $data['apellidos']);
        $stmt->bindParam(':correo', $data['correo']);
        $stmt->bindParam(':telefono', $data['telefono']);
        $stmt->bindParam(':direccion', $data['direccion']);
        $stmt->bindParam(':provincia', $data['provincia']);

        return $stmt->execute();
    }

    // Método para actualizar un deudor
    public function updateDeudor($id, $data) {
        $query = "UPDATE deudores SET nombres = :nombres, apellidos = :apellidos, correo = :correo, 
                  telefono = :telefono, direccion = :direccion, provincia = :provincia
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':nombres', $data['nombres']);
        $stmt->bindParam(':apellidos', $data['apellidos']);
        $stmt->bindParam(':correo', $data['correo']);
        $stmt->bindParam(':telefono', $data['telefono']);
        $stmt->bindParam(':direccion', $data['direccion']);
        $stmt->bindParam(':provincia', $data['provincia']);
        $stmt->bindParam(':id', $id);
    
        return $stmt->execute();
    }
    

    // Método para obtener un deudor por ID
    public function getDeudorById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
