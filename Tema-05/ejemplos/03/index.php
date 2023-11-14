<?php

    /*
        Conexión mysqli_connect()
        127.0.0.1:3306
        Conexión localhost con usuario root
        a la base de datos fp
    */

$server = 'localhost';
$user = 'root';
$pass = '';
$bd = 'fp';

$conexion = new mysqli($server, $user, $pass, $bd);
if(mysqli_connect_errno()){
    echo 'ERROR DE CONEXIÓN Nº' . $conexion->connect_errno;
    echo "<br>";
    echo 'DESCRIPCION DEL ERROR' . $conexion->connect_error;
    exit();
}

echo 'Conexión establecida con éxito';

//Creo una variable con el comando a ejecutar
$sql = 'select * from alumnos order by id';

//Creo un objeto de la clase result
$result = $conexion->query($sql);

echo "<br>";
echo 'Número de registros: ' . $result->num_rows;
echo "<br>";
echo 'Número de columnas: ' . $result->field_count;
echo "<br>";

//Con esto le indico la forma en la que le voy a extrar los datos
//Acabaré obteniendo un array asociativo
$alumnos = $result->fetch_all(MYSQLI_ASSOC);

foreach ($alumnos as $alumno){
    print_r($alumno);
}


?>