<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../vistas/login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://png.pngtree.com/background/20230317/original/pngtree-school-trees-campus-retro-background-picture-image_2149829.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .welcome-container {
            background: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            max-width: 400px; /* Ajustar el ancho máximo del contenedor */
            margin: auto; /* Centrar horizontalmente */
        }
        .btn-custom {
            margin-top: 10px;
            margin-right: 10px;
            padding: 15px 30px;
            font-size: 1.2em;
        }
        .welcome-container h1,
        .welcome-container p {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['login']); ?>!</h1>
        <p>Rol: <?php echo htmlspecialchars($_SESSION['rol']); ?></p>
        <div>
            <a href="../index.php" class="btn btn-primary btn-custom">Ir a Gestión de Alumnos</a>
            <a href="../controladores/logout.php" class="btn btn-secondary btn-custom">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html>





