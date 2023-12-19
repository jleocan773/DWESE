<!doctype html>
<html lang="es">

<?php require_once("template/partials/head.php") ?>

<body>
	<!-- Menú Proyecto -->
	<?php require_once("template/partials/menu.php") ?>
	<br><br><br>
	<!-- Page Content -->
	<div class="container">

		<!-- Cabecera -->
		<?php require_once("views/alumno/partials/header.php") ?>

		<!-- Mensajes -->
		<?php require_once("template/partials/notify.php") ?>

		<!-- Erorres -->
		<?php require_once("template/partials/error.php") ?>

		<!-- Estilo card de bootstrap -->
		<div class="card">
			<div class="card-header">
				Tabla de Alumnos
			</div>
			<div class="card-header">
				<!-- Menú -->
				<?php require_once("views/alumno/partials/menu.php") ?>
			</div>
			<div class="card-body">

				<!-- Muestra datos de la tabla -->
				<table class="table">
					<!-- Encabezado tabla -->
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Email</th>
							<th>Teléfono</th>
							<th>Población</th>
							<th>DNI</th>
							<th>Edad</th>
							<th>Curso</th>
						</tr>
					</thead>
					<!-- Mostramos cuerpo de la tabla -->
					<tbody>
						<?php while ($alumno = $this->alumnos->fetch()) : ?>
							<tr>
								<!-- Mostrar datos de alumnos -->
								<td><?= $alumno->id ?></td>
								<td><?= $alumno->nombre ?></td>
								<td><?= $alumno->email ?></td>
								<td><?= $alumno->telefono ?></td>
								<td><?= $alumno->poblacion ?></td>
								<td><?= $alumno->dni ?></td>
								<td><?= $alumno->edad ?></td>
								<td><?= $alumno->curso ?></td>

								<!-- botones de acción -->
								<td>
									<!-- botón  eliminar -->
									<a href="<?= URL ?>alumno/delete/<?= $this->id?>" title="Eliminar">
										<i class="bi bi-trash-fill"></i></a>

									<!-- botón  editar -->
									<a href="<?= URL ?>alumno/edit/<?= $this->id?>" title="Editar">
										<i class="bi bi-pencil-square"></i></a>

									<!-- botón  mostrar -->
									<a href="<?= URL ?>alumno/show/<?= $this->id?>" title="Mostrar">
										<i class="bi bi-card-text"></i></a>
								</td>

							</tr>
						<?php endwhile; ?>

					</tbody>
				</table>
			</div>
			<div class="card-footer">
				<small class="text-muted">
					<td colspan="9">Nº Alumnos: <?= $this->alumnos->rowCount() ?></td>
				</small>
			</div>
		</div>
	</div>

	<!-- /.container -->

	<?php require_once("template/partials/footer.php") ?>
	<?php require_once("template/partials/javascript.php") ?>

</body>

</html>