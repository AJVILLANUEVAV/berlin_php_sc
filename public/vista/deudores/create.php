<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Deudor</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/berlin_php_sc/public/css/styles.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-primary">Crear nuevo deudor</h1>

    <form action="/berlin_php_sc/index.php?controller=deudores&action=store" method="POST" class="p-4 bg-white shadow-sm rounded border">
        <div class="form-group">
            <label for="nombres">Nombres:</label>
            <input type="text" class="form-control" id="nombres" name="nombres" required>
        </div>
        
        <div class="form-group">
            <label for="apellidos">Apellidos:</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
        </div>
        
        <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="email" class="form-control" id="correo" name="correo" required>
        </div>
        
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" class="form-control" id="telefono" name="telefono" required>
        </div>
        
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" class="form-control" id="direccion" name="direccion" required>
        </div>
        
        <div class="form-group">
            <label for="provincia">Provincia:</label>
            <input type="text" class="form-control" id="provincia" name="provincia" required>
        </div>
        
        <div class="form-group d-flex justify-content-start" style="gap: 10px;">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="/berlin_php_sc/index.php?controller=deudores&action=index" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>
</div>

<!-- jQuery y Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
