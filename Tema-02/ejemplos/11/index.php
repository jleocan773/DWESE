<?php
/*
    Funccion is_null()

    VERDADERO
        - variable no definida
        - variable asignada el valor null

    FALSO
        - asignar el valor 0

*/

//Casos
//La variable no está definida
// Devuelve true y lanza un aviso tipo Notice: undefined variable
var_dump(is_null($var));
echo "<br>";
//Se asigna la constante NULL
$var = NULL;
var_dump(is_null($var));
echo "<br>";
//Se declara la variable pero no se le asigna ningún valor
$var;
var_dump(is_null($var));
echo "<br>";
//La variable es destruida con unset()
$var = "Hola";
unset($var);

?>