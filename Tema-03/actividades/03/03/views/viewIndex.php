<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <!-- Incluir head -->
    <title>Formulario Días</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container" style="margin-bottom: 35px;">

        <header class="pb-3 mb-4 border-bottom">
            <h2>
                <i class="bi bi-123"></i> Formulario Días<span class="fs-6"></span>
            </h2>
        </header>

        <!-- Formulario Días-->
        <form>

            <?php
            $diaActual = date("N");

            $diasSemana = [
                1 => "Lunes",
                2 => "Martes",
                3 => "Miércoles",
                4 => "Jueves",
                5 => "Viernes",
                6 => "Sábado",
                7 => "Domingo",
            ];

            for ($i = 1; $i <= 7; $i++) {
                if ($i <= $diaActual) {
                    echo '<div class="mb-3">';
                    echo '<label class="form-label">' . $diasSemana[$i] . '</label>';
                    echo '<input type="text" class="form-control" aria-describedby="emailHelp" name="' . $diasSemana[$i] . '">';
                    echo '</div>';
                }
            }
            ?>

        </form>

        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>