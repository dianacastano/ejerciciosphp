<?php

/* Declara un array con cinco números en desorden. Ordena el array en orden ascendente y muestra los números ordenados.
*/

$numeros = [7, 2, 9, 1, 4];

sort($numeros);

echo "<p>Números ordenados en orden ascendente:</p>";
foreach ($numeros as $numero) {
    echo "<p>$numero</p>";
}

?>