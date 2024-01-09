<?php

/*
    Contador de visitas
*/

//Comprobar si existe la cookie contador
if(isset($_COOKIE['contador'])){
    //Actualizamos el número de visitas
    $num_visitas = $_COOKIE['contador'];
    $num_visitas ++;
    setcookie('contador', $num_visitas, time() + 365*24*60*60);
} else {
    $num_visitas = '1';
    setcookie('contador', $num_visitas, time() + 365*24*60*60);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Cookies</title>
</head>
<body>
    <h1>Número de visitas: <?=$num_visitas?></h1>
</body>
</html>