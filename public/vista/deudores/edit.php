<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Deudor</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-danger">Editar Deudor</h2>
    <form action="/berlin_php_sc/index.php?controller=deudores&action=update&id=<?php echo $deudor['id']; ?>" method="POST" class="p-4 bg-white shadow-sm rounded border">
        <div class="form-group">
            <label for="nombres">Nombres:</label>
            <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo htmlspecialchars($deudor['nombres']); ?>" required>
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos:</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo htmlspecialchars($deudor['apellidos']); ?>" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="email" class="form-control" id="correo" name="correo" value="<?php echo htmlspecialchars($deudor['correo']); ?>" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo htmlspecialchars($deudor['telefono']); ?>" required>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo htmlspecialchars($deudor['direccion']); ?>" required>
        </div>
        <div class="form-group">
            <label for="provincia">Provincia:</label>
            <input type="text" class="form-control" id="provincia" name="provincia" value="<?php echo htmlspecialchars($deudor['provincia']); ?>" required>
        </div>
        <div class="form-group d-flex justify-content-start" style="gap: 10px;">
        <button type="submit" class="btn btn-danger">Actualizar</button>
        <a href="/berlin_php_sc/index.php?controller=deudores&action=index" class="btn btn-secondary">Cancelar</a>
        </div>


    </form>
</div>

</body>
</html>
