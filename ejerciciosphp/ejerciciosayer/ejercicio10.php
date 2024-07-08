<?php

/* Crea un array con los nombres de cinco colores. Comprueba si un color específico (por ejemplo, "rojo") 
está en el array y muestra un mensaje indicando si el color se encontró o no.*/

$colores = ["azul", "verde", "amarillo", "rojo", "morado"];

$colorBuscado = "rojo";

if (in_array($colorBuscado, $colores)) {
    echo "<p>El color $colorBuscado se encontró en el array.</p>";
} else {
    echo "<p>El color $colorBuscado no se encontró en el array.</p>";
}

?>