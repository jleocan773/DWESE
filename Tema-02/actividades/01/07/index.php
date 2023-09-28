<!DOCTYPE html>
<html lang="en" style="background-color: black; color: white;">


<!-- 
     
A partir del ejercicio anterior, crear un párrafo en el que se cuente una pequeña historia o descripción con los datos de dicha variables. Colocar un título.

-->

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Ejercicio 7</title>
     <style>
          table {
               border: 1px solid white;
               border-collapse: collapse;
          }

          th, td {
               border: 1px solid white;
               padding: 8px;
               text-align: center; /* Centrar el texto en las celdas */
          }

          th {
               background-color: grey;
               color: white;
          }
     </style>
</head>

<body>
     <h1>Ejercicio 7</h1>
     <?php
     $nombre = "Armando";
     $apellidos = "Gran Pelea";
     $poblacion = "Ciudad Increíble";
     $edad = 42;
     $ciclo = "Desarrollo de Aplicaciones Web";
     $curso = "2º";
     $modulo = "HLC";

     echo "<table>";
     echo "<tr>  <th>Campo</th>  <th>Valor</th>  </tr>";
     echo "<tr>  <td>Nombre</td>  <td>$nombre</td>  </tr>";
     echo "<tr>  <td>Apellidos</td>  <td>$apellidos</td>  </tr>";
     echo "<tr>  <td>Población</td>  <td>$poblacion</td>  </tr>";
     echo "<tr>  <td>Edad</td>  <td>$edad</td>  </tr>";
     echo "<tr>  <td>Ciclo</td>  <td>$ciclo</td>  </tr>";
     echo "<tr>  <td>Curso</td>  <td>$curso</td>  </tr>";
     echo "<tr>  <td>Módulo</td>  <td>$modulo</td>  </tr>";
     echo "</table>";

     echo "<br>";

     echo "<h2>Descripción de Armando:</h2>";
     echo "El nombre del estudiante es $nombre $apellidos, quien reside en la ciudad de $poblacion."; 
     echo "<br>";
     echo "Tiene $edad años y está cursando el ciclo formativo de $ciclo en el $curso curso. Actualmente, se encuentra estudiando el módulo de $modulo";


     ?>
</body>

</html>

