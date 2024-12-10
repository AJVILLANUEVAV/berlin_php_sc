<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Nueva Deuda</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include BASE_PATH . '/vista/header.php'; ?>

<div class="container mt-5">
    <h2 class="text-primary">Registro de Nueva Deuda</h2>
    <form action="/berlin_php_sc/index.php?controller=deudas&action=store" method="POST" class="p-4 bg-white shadow-sm rounded border">
        <input type="hidden" name="id_deudor" value="<?php echo htmlspecialchars($deudor['id']); ?>">


        <input type="hidden" name="nombre_deudor" value="<?php echo htmlspecialchars($deudor['nombres']); ?>">

        <div class="form-group">
            <label for="nombre_deudor">Nombre del Deudor:</label>
            <input type="text" class="form-control" id="nombre_deudor" name="nombre_deudor" value="<?php echo htmlspecialchars($deudor['nombres']); ?>" readonly>
        </div>

        <div class="form-group">
            <label for="fecha_deuda">Fecha de la Deuda:</label>
            <input type="date" class="form-control" id="fecha_deuda" name="fecha_deuda" required>
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
            <label for="total_deuda">Total de Deuda:</label>
            <input type="number" step="0.01" class="form-control" id="total_deuda" name="total_deuda" required>
        </div>

        <div class="form-group">
            <label for="adelanto">Adelanto:</label>
            <input type="number" step="0.01" class="form-control" id="adelanto" name="adelanto" required>
        </div>

        <div class="form-group">
            <label for="saldo_deuda">Saldo de la Deuda:</label>
            <input type="number" step="0.01" class="form-control" id="saldo_deuda" name="saldo_deuda" readonly>
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
            <input type="text" class="form-control" id="documento_transferencia" name="documento_transferencia">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Deuda</button>
        <a href="/berlin_php_sc/index.php?controller=deudas&action=index" class="btn btn-secondary">Cancelar</a>

    </form>
</div>

<!-- Scripts para el cálculo automático y desactivación del campo de documento de transferencia -->
<script>
// Calcula el saldo de la deuda automáticamente
document.getElementById('adelanto').addEventListener('input', function() {
    const totalDeuda = parseFloat(document.getElementById('total_deuda').value) || 0;
    const adelanto = parseFloat(this.value) || 0;
    const saldoDeuda = totalDeuda - adelanto;
    document.getElementById('saldo_deuda').value = saldoDeuda.toFixed(2);
});

document.getElementById('total_deuda').addEventListener('input', function() {
    const totalDeuda = parseFloat(this.value) || 0;
    const adelanto = parseFloat(document.getElementById('adelanto').value) || 0;
    const saldoDeuda = totalDeuda - adelanto;
    document.getElementById('saldo_deuda').value = saldoDeuda.toFixed(2);
});

// Desactiva el campo Documento de Transferencia para pagos en Efectivo o Yape
document.getElementById('tipo_pago').addEventListener('change', function() {
    const documentoTransferencia = document.getElementById('documento_transferencia');
    if (this.value === 'Efectivo' || this.value === 'Yape') {
        documentoTransferencia.disabled = true;
        documentoTransferencia.value = ''; // Limpia el campo si está deshabilitado
    } else {
        documentoTransferencia.disabled = false;
    }
});
</script>

</body>
</html>
