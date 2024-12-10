<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar deudas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include BASE_PATH . '/vista/header.php'; ?>

<div class="container mt-5">
    <h2 class="text-primary">Registrar Deudas</h2>
    
    <!-- Formulario de Búsqueda -->
    <div class="mb-3">
        <form action="/berlin_php_sc/index.php?controller=deudas&action=index" method="GET">
            <input type="hidden" name="controller" value="deudas">
            <input type="hidden" name="action" value="index">
            <input type="text" name="search" class="form-control" placeholder="Ingrese dato del deudor">
            <button type="submit" class="btn btn-primary mt-2">Buscar Deudores</button>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Provincia</th>
                <th>Saldo Actual</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($deudores)): ?>
                <tr>
                    <td colspan="8" class="text-center">No hay deudores disponibles.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($deudores as $deudor): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($deudor['nombres']); ?></td>
                        <td><?php echo htmlspecialchars($deudor['apellidos']); ?></td>
                        <td><?php echo htmlspecialchars($deudor['correo']); ?></td>
                        <td><?php echo htmlspecialchars($deudor['telefono']); ?></td>
                        <td><?php echo htmlspecialchars($deudor['direccion']); ?></td>
                        <td><?php echo htmlspecialchars($deudor['provincia']); ?></td>
                        <td><?php echo number_format($deudor['saldo_actual'], 2); ?></td>
                        <td>
                            <a href="/berlin_php_sc/index.php?controller=deudas&action=create&id=<?php echo $deudor['id']; ?>" class="btn btn-primary">Registrar Deuda</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <button class="btn btn-primary mt-3">Mostrar deudas totales</button>
</div>

</body>
</html>
