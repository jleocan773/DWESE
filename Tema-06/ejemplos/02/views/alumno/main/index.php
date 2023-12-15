<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>
</head>
<body>
    <h3>Vista Index Alumno</h3>
    <p>AQUÍ VAN A IR LOS ALUMNOS</p>
    <?php 
        foreach($this->alumnos as $alumno){
            var_dump($alumno);
        }
    ?>
</body>
</html>