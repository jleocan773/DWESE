<?php

    /*  
        model.index.php

        Mostrar contenido de la tabla

        Mostrará la tabla como array de objetos
    */
// Conectamos a la base de datos 
$conexion = new Libros();

//Creamos una variable libros que pillará los libros de la tabla con el método getLibros
$libros = $conexion->getLibros();


?>