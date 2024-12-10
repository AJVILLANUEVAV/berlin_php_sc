<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Cobros</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include BASE_PATH . '/vista/header.php'; ?>

<div class="container mt-5">
    <h2 class="text-primary">Generar Reporte de Cobros</h2>

    <form action="/berlin_php_sc/index.php?controller=reporte&action=index" method="GET" class="form-inline mb-3">
        <input type="hidden" name="controller" value="reporte">
        <input type="hidden" name="action" value="index">
        <input type="text" name="search" class="form-control mr-2" placeholder="Buscar deudores">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Saldo Actual</th>
                <th>Última Transacción</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($deudores)): ?>
                <tr>
                    <td colspan="5" class="text-center">No hay datos disponibles.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($deudores as $deudor): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($deudor['nombres'] . " " . $deudor['apellidos']); ?></td>
                        <td><?php echo htmlspecialchars($deudor['telefono']); ?></td>
                        <td><?php echo htmlspecialchars($deudor['direccion']); ?></td>
                        <td><?php echo number_format($deudor['saldo_actual'], 2); ?></td>
                        <td><?php echo htmlspecialchars($deudor['ultima_transaccion']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="/berlin_php_sc/index.php?controller=reporte&action=exportToPdf" class="btn btn-success mt-3">Exportar Reporte a PDF</a>
</div>

</body>
</html>
