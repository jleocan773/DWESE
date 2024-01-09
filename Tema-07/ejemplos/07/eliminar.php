<?php

/*
    Ejemplo 7.7
    Eliminar Cookies
*/

//Eliminar cookie nombre
setcookie("nombre", time() -3600);

//Eliminar cookie apellido
setcookie("apellido", time() -3600);

echo "Cookies eliminadas correctamente";

?>