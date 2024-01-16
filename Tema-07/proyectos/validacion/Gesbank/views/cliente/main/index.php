<!doctype html>
<html lang="es">

<!-- Head -->

<head>
	<?php require_once("template/partials/head.php") ?>
	<title><?= $this->title ?></title>
</head>

<body>
	<!-- Menú Proyecto -->
	<?php require_once("template/partials/menu.php") ?>
	<br><br><br>
	<!-- Page Content -->
	<div class="container">

		<!-- Cabecera -->
		<?php require_once("views/cliente/partials/header.php") ?>

		<!-- Mensajes -->
		<?php require_once("template/partials/notify.php") ?>

		<!-- Erorres -->
		<?php require_once("template/partials/error.php") ?>

		<!-- Estilo card de bootstrap -->
		<div class="card">
			<div class="card-header">
				Tabla de Clientes
			</div>
			<div class="card-header">
				<!-- Menú -->
				<?php require_once("views/cliente/partials/menu.php") ?>
			</div>
			<div class="card-body">

				<!-- Muestra datos de la tabla -->
				<table class="table">
					<!-- Encabezado tabla -->
					<thead>
						<tr>
							<th>Id</th>
							<th>Nombre</th>
							<th>Email</th>
							<th>Telefono</th>
							<th>Ciudad</th>
							<th>DNI</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<!-- Mostramos cuerpo de la tabla -->
					<tbody>
						<?php while ($cliente = $this->clientes->fetch()) : ?>
							<tr>
								<!-- Mostrar datos de clientes -->
								<td><?= $cliente->id ?></td>
								<td><?= $cliente->cliente ?></td>
								<td><?= $cliente->email ?></td>
								<td><?= $cliente->telefono ?></td>
								<td><?= $cliente->ciudad ?></td>
                                <td><?= $cliente->dni ?></td>

								<!-- botones de acción -->
								<td>
									<!-- botón  eliminar -->
									<a href="<?= URL ?>cliente/delete/<?= $cliente->id ?>" title="Eliminar">
										<i class="bi bi-trash-fill"></i></a>

									<!-- botón  editar -->
									<a href="<?= URL ?>cliente/edit/<?= $cliente->id ?>" title="Editar">
										<i class="bi bi-pencil-square"></i></a>

									<!-- botón  mostrar -->
									<a href="<?= URL ?>cliente/show/<?= $cliente->id ?>" title="Mostrar">
										<i class="bi bi-card-text"></i></a>
								</td>

							</tr>
						<?php endwhile; ?>

					</tbody>
				</table>
			</div>
			<div class="card-footer">
				<small class="text-muted">
					<td colspan="9">Nº Clientes: <?= $this->clientes->rowCount() ?></td>
				</small>
			</div>
		</div>
	</div>

	<!-- /.container -->

	<?php require_once("template/partials/footer.php") ?>
	<?php require_once("template/partials/javascript.php") ?>

</body>

</html>