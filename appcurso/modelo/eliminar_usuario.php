<?php
require_once __DIR__ . '/../config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $pdo = conectarBD();
    $sql = "DELETE FROM usuarios WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([':id' => $id]);
        echo "Usuario eliminado exitosamente.";
    } catch (PDOException $e) {
        echo "Error al eliminar usuario: " . $e->getMessage();
    }
} else {
    echo "ID no proporcionado.";
}
?>
