<?php

/*
        Ejemplo 14

        Crear directorios
*/

//Mostrar directorio actual
echo "Carpeta actual: " . getcwd();
echo "<br>";

//Crear directorio
//mkdir("images");
echo "Directorio creado con éxito";
echo "<br>";

//Eliminamos el directorio, para ello, no podemos estár en el directorio que queremos  borrar
chdir("files/images");
rmdir("dev");
echo "Carpeta eliminada correctamente";
echo "<br>";

//Cambiar el nombre a un directorio
chdir("..");
rename("images", "imagenes");
echo "Carpeta renombrada correctamente";