<?php
require_once __DIR__ . '/../config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $pdo = conectarBD();
    $stmt = $pdo->prepare("SELECT id, nombre, apellidos, direccion, cp, provincia, telefono, email FROM usuarios WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Actualizar Usuario</title>
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            <style>
                body {
                    background: url('https://articles-img.sftcdn.net/t_article_cover_xl/auto-mapping-folder/sites/2/2020/02/fondos-pantalla-espacio-header-1.jpg') no-repeat center center fixed;
                    background-size: cover;
                    background-position: center;
                    height: 100vh;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    margin: 0;
                }

                .card {
                    background-color: rgba(255, 255, 255, 0.8);
                    border: 1px solid #ccc;
                    padding: 20px;
                }
            </style>
        </head>

        <body>
            <div class="container d-flex justify-content-center align-items-center vh-100">
                <div class="card p-4">
                    <h1>Actualizar Usuario</h1>
                    <form action="../controlador/procesar_actualizacion.php" method="post">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id']); ?>">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos:</label>
                            <input type="text" id="apellidos" name="apellidos" class="form-control" value="<?php echo htmlspecialchars($usuario['apellidos']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección:</label>
                            <input type="text" id="direccion" name="direccion" class="form-control" value="<?php echo htmlspecialchars($usuario['direccion']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="cp">CP:</label>
                            <input type="number" id="cp" name="cp" class="form-control" value="<?php echo htmlspecialchars($usuario['cp']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="provincia">Provincia:</label>
                            <input type="text" id="provincia" name="provincia" class="form-control" value="<?php echo htmlspecialchars($usuario['provincia']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono:</label>
                            <input type="tel" id="telefono" name="telefono" class="form-control" value="<?php echo htmlspecialchars($usuario['telefono']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Actualizar</button>
                        <br>
                        <div class="col text-right">
                            <a href="../index.html" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
                                <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z" />
                                <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" />
                                </svg> Inicio
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </body>

        </html>
<?php
    } else {
        echo "Usuario no encontrado.";
    }
} else {
    echo "ID no proporcionado.";
}
?>

