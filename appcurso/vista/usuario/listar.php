<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://articles-img.sftcdn.net/t_article_cover_xl/auto-mapping-folder/sites/2/2020/02/fondos-pantalla-espacio-header-1.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .btn-custom {
            margin: 10px;
            padding: 15px 30px;
            font-size: 1.2em;
        }

        .btn-primary-custom {
            background-color: blue;
            border: none;
        }

        .btn-secondary-custom {
            background-color: green;
            border: none;
        }

        .center-box {
            background: rgba(0, 0, 0, 0.6);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center" style="background-color: rgba(0, 0, 0, 0.5); color: white;">Listado de Usuarios</h2>
        <table class="table table-striped text-center" style="background-color: rgba(255, 255, 255, 0.8);">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>CP</th>
                    <th>Provincia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $usuarios = obtener_usuarios();
                foreach ($usuarios as $usuario) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($usuario['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($usuario['nombre']) . "</td>";
                    echo "<td>" . htmlspecialchars($usuario['apellidos']) . "</td>";
                    echo "<td>" . htmlspecialchars($usuario['cp']) . "</td>";
                    echo "<td>" . htmlspecialchars($usuario['provincia']) . "</td>";
                    echo "<td>";
                    echo "<a class='btn btn-success' href='modelo/actualizar_usuario.php?id=" . urlencode($usuario['id']) . "'><i class='bi bi-arrow-repeat'></i> Actualizar</a>";
                    echo "<a class='btn btn-danger ml-1' href='modelo/eliminar_usuario.php?id=" . urlencode($usuario['id']) . "'><i class='bi bi-trash'></i> Eliminar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="col text-right">
            <a href="index.html" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
                    <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z" />
                    <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" />
                </svg> Inicio
            </a>
        </div>
    </div>

</body>

</html>





