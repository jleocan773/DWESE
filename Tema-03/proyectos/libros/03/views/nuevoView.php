<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <!-- Incluir head -->
    <title>Gestión Libros</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container" style="margin-bottom: 35px;">

        <!-- Cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <h2>
                Gestión Libros<span class="fs-6"></span>
            </h2>
        </header>

        <legend>Formulario Nuevo</legend>

        <!-- Formulario -->
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">ID</label>
                <input type="text" name="titulo" class="form-control"/>
            </div>
            <div class="mb-3">
                <label class="form-label">id</label>
                <input type="text" name="titulo" class="form-control"/>
            </div>
            <div class="mb-3">
                <label class="form-label">Autor</label>
                <input type="text" name="autor" class="form-control"/>
            </div>
            <div class="mb-3">
                <label class="form-label">Género</label>
                <input type="text" name="genero" class="form-control"/>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input type="number" name="precio" class="form-control"/>
            </div>
            <!-- Botones de Acción -->
            <!--- Para asignarles acciones a loss botones usamos el formaction-->
            <div class="btn-group" role="group" aria-label="Basic example">
                
                <!-- Este boton tiene que ir al Index -->
                <button type="" class="btn btn-primary" formaction="sumar.php">Cancelar</button>
                <!-- Este botón borra todo lo escrito -->
                <button type="reset" class="btn btn-danger">Borrar</button>
                <!-- Este botón envía los datos -->
                <button type="submit" class="btn btn-danger">Enviar</button>
>
            </div>

        </form>

        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>