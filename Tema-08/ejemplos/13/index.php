<?php

/*
        Ejemplo 13

        Info Ruta Directorios 

*/


//Mostrar directorio actual
echo "Directorio actual: " . getcwd();
echo "<br>";

//Mostrar nombre del directorio padre del actual
echo "Directorio padre: " . dirname(getcwd());
echo "<br>";

//Para recibir solamente el nombre del directorio actual
echo "Nombre directorio actual: " . basename(getcwd());
echo "<br>";

//Devolvemos información sobre la ruta del directorio
//Esto es una forma más enrevesada de hacer basename(getcwd()), no es recomendable
$detallesRuta =  pathinfo(getcwd());
echo "Directorio actual: " . $detallesRuta['basename'];
