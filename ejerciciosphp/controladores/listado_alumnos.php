<?php
// Ruta al archivo de datos en el directorio 
$filename = '../altas.txt';

// Crear el archivo si no existe
if (!file_exists($filename)) {
    file_put_contents($filename, ""); 
}

// Leer el contenido del archivo
$alumnos = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Mostrar los datos en una tabla
echo "<!DOCTYPE html>";
echo "<html lang='es'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Listado de Alumnos</title>";
echo "<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>";
echo "</head>";
echo "<body style='background-color: #8e2de2;' class='text-white'>";
echo "<div class='container mt-5'>";
echo "<div class='row justify-content-center'>";
echo "<div class='col-md-8'>";
echo "<div class='card'>";
echo "<div class='card-header bg-primary text-white text-center'>";
echo "<h1 class='mb-0'>Listado de Alumnos</h1>";
echo "</div>";
echo "<div class='card-body'>";
echo "<div class='table-responsive'>";
echo "<table class='table table-bordered table-striped'>";
echo "<thead><tr><th>Nombre del Alumno</th><th>Fecha de Alta</th></tr></thead>";
echo "<tbody>";
if (count($alumnos) > 0) {
    foreach ($alumnos as $alumno) {
        list($nombre, $fecha_alta) = explode(" - ", $alumno);
        echo "<tr><td>" . htmlspecialchars($nombre) . "</td><td>" . htmlspecialchars($fecha_alta) . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='2' class='text-center'>No hay alumnos registrados</td></tr>";
}
echo "</tbody>";
echo "</table>";
echo "<div class='text-center mt-4'>";
echo "<a href='../index.php' class='btn btn-primary'>Volver al inicio</a>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</body>";
echo "</html>";
?>

