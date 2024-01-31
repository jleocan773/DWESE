<?php

//Iniciamos sesión
session_start();

//Iniciamos los valores del formulario
$nombreCompleto = null;
$observaciones = null;
$fichero = null;

//Compruebo si existe algún error
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    $errores = $_SESSION['errores'];

    //Autocompletar el formulario
    $nombreCompleto = $_SESSION['nombreCompleto'];
    $observaciones = $_SESSION['observaciones'];
    $fichero = $_SESSION['fichero'];

    unset($_SESSION['error']);
    unset($_SESSION['errores']);
    unset($_SESSION['nombreCompleto']);
    unset($_SESSION['observaciones']);
    unset($_SESSION['fichero']);
}

//Compruebo si existe algún mensaje
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    unset($_SESSION['mensaje']);
}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1> Formulario de Subida de Archivos </h1>
        <br><br>

        <!-- Error -->
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>ERROR: </strong> <?= $error; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        <?php endif; ?>

        <!-- Mensaje -->
        <?php if (isset($mensaje)) : ?>
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <div class="me-auto">
                    <strong>MENSAJE:&nbsp;</strong>
                    <?= $mensaje; ?>.
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>


        <!-- Formulario -->
        <form action="validar.php" method="POST" enctype="multipart/form-data">
            <!-- Campo Oculto para validar el tamaño del archivo -->
            <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />

            <!--- Nombre Completo -->
            <div class="mb-3">
                <label for="exampleFormControlInput" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Nombre completo" value="<?= $nombreCompleto ?>" aria-describedby="nombreCompleto">

                <!-- Mostrar posible error -->
                <span class="form-text text-danger" role="alert">
                    <?= $errores['nombreCompleto'] ?? null; ?>
                </span>
            </div>

            <!--- Observaciones -->
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Observaciones</label>
                <textarea name="observaciones" class="form-control" id="exampleFormControlTextarea1" <?= $observaciones ?> rows="3"></textarea>

                <!-- Mostrar posible error -->
                <span class="form-text text-danger" role="alert">
                    <?= $errores['observaciones'] ?? null; ?>
                </span>
            </div>

            <!--- Fichero -->
            <div class="mb-3">
                <label for="formFile" class="form-label">Seleccionar Archivo</label>
                <input class="form-control" type="file" name="fichero" id="formFile" accept="image/*" value="<?= $fichero ?>">
                
                <!-- Mostrar posible error -->
                <span class="form-text text-danger" role="alert">
                    <?= $errores['fichero'] ?? null; ?>
                </span>
            </div>

            <!-- Botones de Acción -->
            <button class="btn btn-primary" type="submit>">Enviar</button>
        </form>

    </div>

    <footer class="footer mt-auto py-3 fixed-bottom bg-light">
        <div class="container">
            <span class="text-muted">© 2024
                Jonathan León Canto - DWESE - 2º DAW - Curso 23/24</span>
        </div>
    </footer>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>