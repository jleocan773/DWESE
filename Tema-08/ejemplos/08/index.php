<?php

/*
        Ejemplo 08
        Copiar, mover, cambiar nombre y eliminar
*/


//Copiar archivo
//Una nueva versión
// copy("datos.txt", "datos2.txt");
// echo "Archivo copiado correctamente";

//Copiar archivo en otra carpeta
// copy("datos2.txt", "files/datosOtraCarpeta.txt");
// echo "Archivo copiado correctamente";

//Sobreescribir un archivo al copiar
// copy("datos.txt", "files/datos.txt");
// echo "Archivo copiado y sobreescrito correctamente";

//Cambiar nombre de un archivo
// rename("datos.txt", "detalles.txt");
// echo "Nombre cambiado con éxito";

//Mover un archivo
// rename ("detalles.txt", "files/detalles.txt");
// echo "Archivo movido correctamente";

//Eliminar un archivo
unlink("datos2.txt");
echo "Archivo eliminado correctamente";