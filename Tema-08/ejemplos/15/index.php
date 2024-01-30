<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1> Formulario de Subida de Archivos </h1>
        <br><br>
        <!-- Formulario -->
        <form action="validar.php" method="POST" enctype="multipart/form-data">
            <!-- Campo Oculto para validar el tamaño del archivo -->
            <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />

            <!--- Nombre Completo -->
            <div class="mb-3">
                <label for="exampleFormControlInput" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Nombre completo"
                    aria-describedby="nombreCompleto">
            </div>

            <!--- Observaciones -->
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Observaciones</label>
                <textarea name="observaciones" class="form-control" id="exampleFormControlTextarea1"
                    rows="3"></textarea>
            </div>

            <!--- Fichero -->
            <div class="mb-3">
                <label for="formFile" class="form-label">Seleccionar Archivo</label>
                <input class="form-control" type="file" name="fichero" id="formFile" accept="image/*">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

</html>