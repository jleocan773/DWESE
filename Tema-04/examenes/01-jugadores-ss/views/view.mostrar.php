<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("layouts/layout.head.php"); ?>
    <title>Nuevo - Gestión Jugadores </title>
</head>

<body>
    <!-- Capa Principal -->
    <div class="container">

        <?php include("partials/partial.header.php"); ?>

        <legend>Formulario Nuevo Jugador</legend>

        <form action="create.php" method="POST">
            <!-- id -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Id</label>
                <input type="text" class="form-control" name="id" readonly value=<?= $jugador->getId(); ?>>
            </div>
            <!-- nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" readonly value=<?= $jugador->getNombre(); ?>>
            </div>
            <!-- número -->
            <div class="mb-3">
                <label for="" class="form-label">Número</label>
                <input type="number" class="form-control" name="numero" readonly value=<?= $jugador->getNumero(); ?>>
            </div>
            <!-- contrato -->
            <div class="mb-3">
                <label for="" class="form-label">Contrato</label>
                <input type="number" class="form-control" name="contrato" steep="0.01" placeholder="0.00 €" readonly value=<?= $jugador->getContrato(); ?>>
            </div>

            <!-- Pais -->
            <div class="mb-3">
                <label for="pais" class="form-label">País</label>
                <select class="form-select" name="pais" id="pais" disabled>
                    <option selected disabled>Seleccione País</option>
                    <?php foreach (arrayJugadores::getPaises() as $indice => $pais) : ?>
                        <option value="<?= $indice ?>" <?= ($indice == $jugador->getPais()) ? 'selected' : '' ?>>
                            <?= $pais ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Equipos -->
            <div class="mb-3">
                <label for="equipo" class="form-label">Equipo</label>
                <select class="form-select" name="equipo" id="equipo" disabled>
                    <option selected disabled>Seleccione</option>
                    <?php foreach (arrayJugadores::getEquipos() as $indice => $equipo) : ?>
                        <option value="<?= $indice ?>" <?= ($indice == $jugador->getEquipo()) ? 'selected' : '' ?>>
                            <?= $equipo ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Perfiles List Checkbox -->
            <div class="mb-3">
                <label for="posiciones" class="form-label">Posiciones</label>
                <div class="form-control">
                    <?php foreach (arrayJugadores::getPosiciones() as $indice => $posicion) : ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="posiciones[]" value="<?= $indice ?>" readonly <?= in_array($indice, $jugador->getPosiciones()) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="flexCheckDefault"><?= $posicion ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>





            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button type="reset" class="btn btn-danger">Borrar</button>
            <button type="submit" class="btn btn-primary">Enviar</button>

        </form>

        <br><br><br> <br>

        <!-- Pie del documento -->
        <?php include("partials/partial.footer.php"); ?>

        <!-- Bootstrap Javascript y popper -->
        <?php include("layouts/layout.javascript.php"); ?>

</body>

</html>