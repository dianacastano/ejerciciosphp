<?php
// Recibir datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Limpiar y validar los datos
    $nombre = limpiar_input($_POST["nombre"]);
    $fecha_nacimiento = limpiar_input($_POST["fecha_nacimiento"]);
    $email = limpiar_input($_POST["email"]);
    $telefono = limpiar_input($_POST["telefono"]);
    $domicilio = limpiar_input($_POST["domicilio"]);
    $poblacion = limpiar_input($_POST["poblacion"]);
    $comunidad_autonoma = limpiar_input($_POST["comunidad_autonoma"]);

    // Validación básica
    if (empty($nombre) || empty($fecha_nacimiento) || empty($email) || empty($telefono)
        || empty($domicilio) || empty($poblacion) || empty($comunidad_autonoma)) {
        echo "Todos los campos son obligatorios.";
    } else {
        // Mostrar los datos en una tabla
        echo "<!DOCTYPE html>";
        echo "<html lang='es'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<title>Datos del Alumno</title>";
        echo "<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>";
        echo "</head>";
        echo "<body style='background-color: #8e2de2;' class='text-white'>";
        echo "<div class='container mt-5'>";
        echo "<div class='row justify-content-center'>";
        echo "<div class='col-md-8'>";
        echo "<div class='card'>";
        echo "<div class='card-header bg-primary text-white text-center'>";
        echo "<h1 class='mb-0'>Datos Recibidos del Alumno</h1>";
        echo "</div>";
        echo "<div class='card-body'>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered table-striped'>";
        echo "<tbody>";
        echo "<tr><th>Nombre del Alumno</th><td>" . htmlspecialchars($nombre) . "</td></tr>";
        echo "<tr><th>Fecha de Nacimiento</th><td>" . htmlspecialchars($fecha_nacimiento) . "</td></tr>";
        echo "<tr><th>Email</th><td>" . htmlspecialchars($email) . "</td></tr>";
        echo "<tr><th>Teléfono</th><td>" . htmlspecialchars($telefono) . "</td></tr>";
        echo "<tr><th>Domicilio</th><td>" . htmlspecialchars($domicilio) . "</td></tr>";
        echo "<tr><th>Población</th><td>" . htmlspecialchars($poblacion) . "</td></tr>";
        echo "<tr><th>Comunidad Autónoma</th><td>" . htmlspecialchars($comunidad_autonoma) . "</td></tr>";
        echo "</tbody>";
        echo "</table>";
        // Botón de volver
        echo "<div class='text-center mt-4'>";
        echo "<a href='../vistas/alta_alumnos.html' class='btn btn-primary'>Volver al formulario de alta</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</body>";
        echo "</html>";

        // Persistencia de los datos en data.txt
        $linea = "$nombre - " . date("Y-m-d H:i:s") . PHP_EOL; // PHP_EOL para salto de línea en cualquier sistema operativo
        $filename = '../altas.txt'; // Ruta relativa al archivo de datos
        $file = fopen($filename, 'a');
        if ($file) {
            fwrite($file, $linea); // Añade los datos al final del archivo
            fclose($file); // Cierra el archivo
            echo "<p>Datos guardados correctamente</p>";
        } else {
            echo "<p>Error al guardar los datos</p>";
        }
    }
}

function limpiar_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>






