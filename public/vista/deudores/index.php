<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Deudores</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header {
            background-color: #003366;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        .header h1 {
            font-size: 1.8rem;
            margin: 0;
        }
        .header img {
            height: 53px; /* Tamaño ajustado para agrandar el logo en 3px */
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
        }
        .btn-custom-dark {
            background-color: #001f4d;
            color: white;
        }
        .btn-custom-dark:hover {
            background-color: #002966;
        }
        .btn-search {
            background-color: #c82333;
            color: white;
        }
        h2 {
            color: #007bff;
        }
    </style>
</head>
<body>

<?php include BASE_PATH . '/vista/header.php'; ?>

<div class="container mt-5">
    <h2 class="text-primary">Lista de Deudores</h2>
    
    <!-- Formulario de Búsqueda -->
    <div class="mb-3">
        <form action="/berlin_php_sc/index.php?controller=deudores&action=index" method="GET">
            <input type="hidden" name="controller" value="deudores">
            <input type="hidden" name="action" value="index">
            <input type="text" name="search" class="form-control" placeholder="Buscar deudores">
            <button type="submit" class="btn btn-primary mt-3">Buscar Deudores</button>
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
                            <a href="/berlin_php_sc/index.php?controller=deudores&action=edit&id=<?php echo $deudor['id']; ?>" class="btn btn-primary">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Botón de Agregar Deudor con color azul oscuro -->
    <a href="/berlin_php_sc/index.php?controller=deudores&action=create" class="btn btn-primary mt-3">Agregar Deudor</a>
</div>

</body>
</html>
