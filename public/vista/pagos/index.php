<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Pagos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include BASE_PATH . '/vista/header.php'; ?>

<div class="container mt-5">
    <h2 class="text-primary">Registrar Pagos</h2>
    
    <div class="mb-3">
        <form action="/berlin_php_sc/index.php" method="GET">
            <input type="hidden" name="controller" value="pagos">
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
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($deudores)): ?>
                <tr>
                    <td colspan="7" class="text-center">No hay deudores disponibles.</td>
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
                        <td>
                            <a href="/berlin_php_sc/index.php?controller=pagos&action=create&id=<?php echo $deudor['id']; ?>" class="btn btn-primary">Crear Pago</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <button class="btn btn-primary mt-3">Mostrar pagos totales</button>
</div>

</body>
</html>
