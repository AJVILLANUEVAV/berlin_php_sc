<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administración de Deudores</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header {
            background-color: #003366;
            color: white;
            padding: 20px 0;
            text-align: center;
            position: relative;
        }
        .header img {
            height: 50px;
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
        }
        .header h1 {
            font-size: 1.8rem;
            margin: 0;
        }
        .navbar-custom {
            background-color: #333;
            padding: 10px;
            display: flex;
            justify-content: center;
        }
        .navbar-custom a {
            color: white;
            padding: 10px;
            text-decoration: none;
        }
        .navbar-custom a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="header">
    <img src="/berlin_php_sc/public/assets/images/logoberlin.jpg" alt="Logo Berlin Global Technology" onerror="console.error('Logo not found at specified path.')">
    <h1>Berlin Global Technology</h1>
</div>

<nav class="navbar-custom">
    <a href="/berlin_php_sc/index.php?controller=deudores&action=index">Registrar Deudores</a>
    <a href="/berlin_php_sc/index.php?controller=deudas&action=index">Registrar Deuda</a>
    <a href="/berlin_php_sc/index.php?controller=pagos&action=index">Registrar Pagos</a>
    <a href="/berlin_php_sc/index.php?controller=reporte&action=exportToPdf" class="btn btn-danger ml-2">Descargar PDF</a>    
</nav>

</body>
</html>
