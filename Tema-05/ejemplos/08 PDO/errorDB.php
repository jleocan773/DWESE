<?php

echo "Error Base de DATOS: ";
echo "<HR>";
echo  "Mensaje: " . $e->getMessage() . '<BR>';
echo "Código error: " . $e->getCode() . '<BR>';
echo "Archivo: " . $e->getFile() . '<BR>';
echo "Línea: " . $e->getLine() . '<BR>';

?>