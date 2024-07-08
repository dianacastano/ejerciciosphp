<?php
// modelo/usuario_modelo.php


require_once __DIR__ . '/../config.php';


// Función para obtener todos los usuarios
function obtener_usuarios() {
    try {
        $pdo = conectarBD();
        $stmt = $pdo->query("SELECT id, nombre, apellidos, direccion, cp, provincia, telefono, email FROM usuarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error al obtener usuarios: " . $e->getMessage();
        return false;
    }
}

// Función para insertar un nuevo usuario
function insertar_usuario($nombre, $apellidos, $direccion, $cp, $provincia, $telefono, $email) {
    try {
        $pdo = conectarBD();
        $sql = "INSERT INTO usuarios (nombre, apellidos, direccion, cp, provincia, telefono, email) VALUES (:nombre, :apellidos, :direccion, :cp, :provincia, :telefono, :email)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nombre' => $nombre,
            ':apellidos' => $apellidos,
            ':direccion' => $direccion,
            ':cp' => $cp,
            ':provincia' => $provincia,
            ':telefono' => $telefono,
            ':email' => $email,
        ]);
        return true;
    } catch (PDOException $e) {
        echo "Error al insertar usuario: " . $e->getMessage();
        return false;
    }
}

?>





