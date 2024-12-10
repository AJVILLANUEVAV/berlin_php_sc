<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Nuevo Pago</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include BASE_PATH . '/vista/header.php'; ?>

<div class="container mt-5">
    <h2 class="text-primary">Registro de Nuevo Pago</h2>
    <form action="/berlin_php_sc/index.php?controller=pagos&action=store" method="POST" class="p-4 bg-white shadow-sm rounded border">
        
        <!-- Campo oculto para pasar el ID del deudor -->
        <input type="hidden" name="id_deudor" value="<?php echo htmlspecialchars($deudor['id']); ?>">

        <div class="form-group">
            <label for="nombre_deudor">Nombre del Deudor:</label>
            <input type="text" class="form-control" id="nombre_deudor" value="<?php echo htmlspecialchars($deudor['nombres']); ?>" readonly>
        </div>

        <div class="form-group">
            <label for="fecha_pago">Fecha del Pago:</label>
            <input type="date" class="form-control" id="fecha_pago" name="fecha_pago" required>
        </div>

        <div class="form-group">
            <label for="numero_boleta">Número de Boleta:</label>
            <input type="text" class="form-control" id="numero_boleta" name="numero_boleta" required>
        </div>

        <div class="form-group">
            <label for="numero_serie">Número de Serie:</label>
            <input type="text" class="form-control" id="numero_serie" name="numero_serie" required>
        </div>

        <div class="form-group">
            <label for="total_pago">Total Pago:</label>
            <input type="number" step="0.01" class="form-control" id="total_pago" name="total_pago" required>
        </div>
        
        <div class="form-group">
            <label for="saldo_actual">Saldo Actual:</label>
            <input type="text" class="form-control" id="saldo_actual" value="<?php echo number_format($saldoTotal, 2); ?>" readonly>
        </div>

        <div class="form-group">
            <label for="tipo_pago">Tipo de Pago:</label>
            <select class="form-control" id="tipo_pago" name="tipo_pago">
                <option value="Efectivo">Efectivo</option>
                <option value="Yape">Yape</option>
                <option value="Transferencia">Transferencia</option>
            </select>
        </div>

        <div class="form-group">
            <label for="documento_transferencia">Documento de Transferencia:</label>
            <input type="text" class="form-control" id="documento_transferencia" name="documento_transferencia" disabled>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Pago</button>
        <a href="/berlin_php_sc/index.php?controller=pagos&action=index" class="btn btn-secondary">Cancelar</a>
        
    </form>
    
</div>

<script>
// Activa o desactiva el campo Documento de Transferencia según el tipo de pago
document.getElementById('tipo_pago').addEventListener('change', function() {
    const documentoTransferencia = document.getElementById('documento_transferencia');
    documentoTransferencia.disabled = this.value !== 'Transferencia';
    if (this.value !== 'Transferencia') documentoTransferencia.value = '';
});
</script>

</body>
</html>
