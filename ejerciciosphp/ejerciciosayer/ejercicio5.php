<?php

/* Declara una función en PHP llamada saludar que acepte un parámetro nombre y devuelva un saludo personalizado. 
Llama a la función con un nombre específico y muestra el resultado en el navegador.*/

function saludar($nombre) {
    return "Hola, $nombre. ¡Bienvenido!";
}

$nombre = "Darwin";
$saludo = saludar($nombre);

echo "<p>$saludo</p>";

?>