<?php
include "usuario.php";
include "vistausuario.php";


/* 

    Archivo: index.php
    Descripción: Ejemplo 05 del  Tema 2
    Autor: Jonathan León Canto
    Fecha 09/26/2023
*/

// Comentario de una línea
// El atajo para convertir líneas en comentario es control+ç

echo "Esta es frase extra que ha sido añadida con echo";
print "<br>";
print "Esta es una línea añadida con print";
print "<br>";
//Se puede imprimir un valor númerico sin comillas
echo 123.45;
print "<br>";
print 67.89;
print "<br>";
//Tanto echo como print son funciones, PHP permite el no uso de ()
//La diferencia entre echo y print es que echo permite varios argumentos mientras que print no
echo "Hola buenas tardes, voy a maullar, ", "miau miau miau miau miau";
print "<br>";
//Puedes concatenar en el printn, pero estarías realmente mandando dos funciones
print "Hola " . "Adios";
//Podemos mostrar una variable de la siguiente manera



?>