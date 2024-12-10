<?php
require_once __DIR__ . '/../../vendor/autoload.php';

require_once BASE_PATH . '/modelo/Deudor.php';

use Dompdf\Dompdf;

class ReporteController {
    private $deudorModel;

    public function __construct() {
        $this->deudorModel = new Deudor();
    }

    public function index($search = null) {
        if ($search) {
            $deudores = $this->deudorModel->getDeudoresConSaldo($search);
        } else {
            $deudores = $this->deudorModel->getDeudoresConSaldo();
        }
        require_once BASE_PATH . '/vista/reportes/index.php';
    }

    public function exportToPdf($search = null) {
        if ($search) {
            $deudores = $this->deudorModel->getDeudoresConSaldo($search);
        } else {
            $deudores = $this->deudorModel->getDeudoresConSaldo();
        }

        $this->generatePdf($deudores);
    }

    private function generatePdf($deudores) {
        try {
            // Asegúrate de incluir correctamente el autoload de Composer
            require_once __DIR__ . '/../../vendor/autoload.php';
    
            // Usar Dompdf
            $dompdf = new \Dompdf\Dompdf();
    
            // Generar contenido HTML
            $html = "<h1>Reporte de Cobros</h1><table border='1' style='width:100%;'>";
            $html .= "<thead><tr><th>Nombre</th><th>Teléfono</th><th>Dirección</th><th>Saldo Actual</th><th>Última Transacción</th></tr></thead><tbody>";
    
            foreach ($deudores as $deudor) {
                $html .= "<tr>
                            <td>{$deudor['nombres']} {$deudor['apellidos']}</td>
                            <td>{$deudor['telefono']}</td>
                            <td>{$deudor['direccion']}</td>
                            <td>{$deudor['saldo_actual']}</td>
                            <td>{$deudor['ultima_transaccion']}</td>
                          </tr>";
            }
    
            $html .= "</tbody></table>";
    
            // Cargar el HTML en Dompdf
            $dompdf->loadHtml($html);
    
            // Configurar tamaño de papel y orientación
            $dompdf->setPaper('A4', 'landscape');
    
            // Renderizar el PDF
            $dompdf->render();
    
            // Enviar el archivo al navegador
            $dompdf->stream("reporte_cobros.pdf", ["Attachment" => false]);
    
        } catch (\Exception $e) {
            // Mostrar errores detallados en el navegador
            echo "<h3>Error al generar el PDF:</h3>";
            echo "<pre>" . $e->getMessage() . "</pre>";
            exit();
        }
    }
    
}
