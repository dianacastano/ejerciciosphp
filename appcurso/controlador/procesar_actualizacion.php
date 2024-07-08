<?php
require_once __DIR__ . '/../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'], $_POST['nombre'], $_POST['apellidos'], $_POST['direccion'], $_POST['cp'], $_POST['provincia'], $_POST['telefono'], $_POST['email'])) {
        $id = intval($_POST['id']);
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $direccion = $_POST['direccion'];
        $cp = $_POST['cp'];
        $provincia = $_POST['provincia'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];

        $pdo = conectarBD();
        $sql = "UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, direccion = :direccion, cp = :cp, provincia = :provincia, telefono = :telefono, email = :email WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        try {
            $stmt->execute([
                ':nombre' => $nombre,
                ':apellidos' => $apellidos,
                ':direccion' => $direccion,
                ':cp' => $cp,
                ':provincia' => $provincia,
                ':telefono' => $telefono,
                ':email' => $email,
                ':id' => $id
            ]);
            header("Location: localhost:8080/EJERCICIOSPHP/appcurso/controlador/usuario_controlador.php");
            exit();
        } catch (PDOException $e) {
            echo "Error al actualizar usuario: " . $e->getMessage();
        }
    } else {
        echo "Datos incompletos.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>

