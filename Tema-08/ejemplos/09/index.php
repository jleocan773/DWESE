        <?php

        /*
                Ejemplo 09

                Directorios
        */


        //Mostrar carpeta actual con ruta absoluta
        echo "Directorio actual: " . getcwd();

        //Cambiar el directorio actual
        chdir("files");

        //Obtener contenido del directorio actual
        echo "<br>";
        echo "\n Directorio actual: " . getcwd();
