<!DOCTYPE html>
<html lang="en" style="background-color: black; color: white;">


<!-- 
     
Crear un programa PHP en el que se declaren las siguientes variables: Nombre, Apellidos, Población, Edad, Ciclo, Curso y Módulo. Asignar valor a dichas variables. 
Insertar un título en la cabecera de la página y mostrar los valores de dichas variables en una tabla a dos columnas (Campo y Valor).

-->

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Ejercicio 6</title>
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
     <h1>Ejercicio 6</h1>
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
     ?>
</body>

</html>

