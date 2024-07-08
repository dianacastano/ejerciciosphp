<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = limpiar_input($_POST["login"]);
    $password = limpiar_input($_POST["password"]);

    $filename = '../usuarios.txt';
    $file = fopen($filename, 'r');

    if ($file) {
        $login_successful = false;
        while (($line = fgets($file)) !== false) {
            list($nombre_completo, $stored_login, $stored_password, $rol) = explode('|', trim($line));
            if ($login === $stored_login && $password === $stored_password) {
                $login_successful = true;
                $_SESSION['login'] = $login;
                $_SESSION['rol'] = $rol;
                break;
            }
        }
        fclose($file);

        if ($login_successful) {
            header("Location: ../vistas/bienvenida.php");
            exit();
        } else {
            echo "Credenciales incorrectas.";
        }
    } else {
        echo "No se pudo abrir el archivo de usuarios.";
    }
}

function limpiar_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


