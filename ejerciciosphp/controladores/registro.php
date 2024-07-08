<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Función para limpiar y validar los datos
    function limpiar_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Limpiar y validar los datos del formulario
    $nombre = limpiar_input($_POST["nombre"]);
    $login = limpiar_input($_POST["login"]);
    $password = limpiar_input($_POST["password"]);
    $rol = limpiar_input($_POST["rol"]);

    // Validación básica
    if (empty($nombre) || empty($login) || empty($password) || empty($rol)) {
        echo "Todos los campos son obligatorios.";
    } else {
        // Guardar los datos en el archivo usuarios.txt
        $filename = '../usuarios.txt';
        $linea = "$nombre|$login|$password|$rol\n";
        $file = fopen($filename, 'a');

        if ($file) {
            fwrite($file, $linea);
            fclose($file);
            echo "Usuario registrado con éxito.";
        } else {
            echo "Error al registrar el usuario.";
        }
    }
}
?>
