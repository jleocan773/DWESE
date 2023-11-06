<!doctype html>
<html lang="es">

<head>
  <!-- Incluimos layout.head.php -->
  <?php include 'views/layouts/layout.head.php' ?>

  <title>Home - CRUD Tabla Películas</title>
</head>

<body>
  <div class="container">

    <!-- Cabecera -->
    <!-- Incluimos partial.cabecera.php -->
    <?php include 'views/partials/partial.cabecera.php' ?>


    <legend>
      Tabla Películas
    </legend>

    <!-- Incluimos Partials menu -->
    <!-- Incluimos partial.menu.php -->
    <?php include 'views/partials/partial.menu.php' ?>


    <!-- Generamos la tabla de libros -->
    <table class="table">
      <!-- Generamos el encabezado de la tabla películas -->
      <thead>
        <tr>
          <?php
          $claves = array_keys($peliculas[0]);
          foreach ($claves as $clave) : ?>
            <th><?= ucfirst($clave) ?></th>
          <?php endforeach; ?>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <!-- Mostramos los detalles de las películas -->
        <!-- Muestro los datos de la película -->
        <tr>
          <?php foreach ($peliculas as $indice => $pelicula) : ?>
        <tr>
          <td><?= $pelicula['id'] ?></td>
          <td><?= $pelicula['titulo'] ?></td>
          <td><?= $paises[$pelicula['pais']] ?></td>
          <td><?= $pelicula['director'] ?></td>
          <td>
            <?php
            $generosAsociados = mostrarGeneros($generos, $pelicula['generos']);
            echo implode(', ', $generosAsociados);
            ?>
          </td>
          <td><?= $pelicula['año'] ?></td>


          <!-- Muestro los botones de acción -->
          <td>
            <a href="eliminar.php?indice=<?= $indice ?>" Title="Eliminar"><i class="bi bi-trash-fill"></i></a>
            <a href="editar.php?indice=<?= $indice ?>" Title="Modificar"><i class="bi bi-pencil-square"></i></a>
            <a href="mostrar.php?indice=<?= $indice ?>" Title="Mostrar"><i class="bi bi-eye"></i></a>
          </td>

        <?php endforeach; ?>
        <!-- Fin botones de acción -->

        </tr>
      <tfoot>
        <tr>
          <td colspan="7">Número Registros: <?= count($peliculas) ?></td>
        </tr>
      </tfoot>

      </tbody>
    </table>

    <!-- Incluimos Partials footer -->
    <!-- Incluimos partial.footer.php -->
    <?php include 'views/partials/partial.footer.php' ?>

  </div>

  <!-- Incluimos Partials javascript bootstrap -->
  <!-- Incluimos layout.javascript.php -->
  <?php include 'views/layouts/layout.javascript.php' ?>

</body>

</html>