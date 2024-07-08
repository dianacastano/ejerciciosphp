<?php
// controlador/usuario_controlador.php

require_once __DIR__ . '/../config.php';
require_once MODEL_PATH . 'usuario_modelo.php';

$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['nombre'], $_POST['apellidos'], $_POST['direccion'], $_POST['cp'], $_POST['provincia'], $_POST['telefono'], $_POST['email'])) {
            $nombre = limpiar_dato($_POST['nombre']);
            $apellidos = limpiar_dato($_POST['apellidos']);
            $direccion = limpiar_dato($_POST['direccion']);
            $cp = limpiar_dato($_POST['cp']);
            $provincia = limpiar_dato($_POST['provincia']);
            $telefono = limpiar_dato($_POST['telefono']);
            $email = limpiar_dato($_POST['email']);
            
            if (insertar_usuario($nombre, $apellidos, $direccion, $cp, $provincia, $telefono, $email)) {
                $mensaje = "Usuario insertado exitosamente.";
            } else {
                $mensaje = "Error al insertar usuario.";
            }
        } else {
            $mensaje = "Todos los campos son obligatorios.";
        }
    }
}

// Función para listar los usuarios
function listar_usuarios() {
    $usuarios = obtener_usuarios();
    require VIEW_PATH . 'usuario/listar.php';
}

function limpiar_dato($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>








