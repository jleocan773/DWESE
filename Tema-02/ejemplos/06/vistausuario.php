    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejemplo 06 - Tabla - Tema 02</title>
    </head>

    <bod    y>
        <center>
                <h2> Ejemplo 06 - Tabla - Tema 02</h2>
            </center>

        <table border=1; width=25%> 
            <tr> 
                <th>Usuario</th>
                <th>Animal</th>
                 <th>Color</th>
            </tr>
            <tr>
                <!-- Esta es la manera larga de hacerlo
                <td><?php echo $usuario?></td>
                <td><?php echo $animal?></td>
                <td><?php echo $color?></td> 
                -->

                <td align="center"><?=$usuario;?></td>
                <td align="center"><?=$animal;?></td>
                <td align="center"><?=$color;?></td>

            </tr>
        </table>

    </body>

    </html>