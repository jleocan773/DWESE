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
		<?php require_once("views/cuenta/partials/header.php") ?>

		<!-- Mensajes -->
		<?php require_once("template/partials/notify.php") ?>

		<!-- Erorres -->
		<?php require_once("template/partials/error.php") ?>

		<!-- Estilo card de bootstrap -->
		<div class="card">
			<div class="card-header">
				Tabla de Cuentas
			</div>
			<div class="card-header">
				<!-- Menú -->
				<?php require_once("views/cuenta/partials/menu.php") ?>
			</div>
			<div class="card-body">

				<!-- Muestra datos de la tabla -->
				<table class="table">
					<!-- Encabezado tabla -->
					<thead>
						<tr>
							<th>Id</th>
							<th>Número Cuenta</th>
							<th>Cliente</th>
							<th>Apellidos</th>
							<th>Fecha Alta</th>
							<th>Fecha Últ Movimiento</th>
							<th>Número Movimientos</th>
							<th>Saldo</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<!-- Mostramos cuerpo de la tabla -->
					<tbody>
						<?php while ($cuenta = $this->cuentas->fetch()) : ?>
							<tr>
								<!-- Mostrar datos de cuentas -->
								<td><?= $cuenta->id ?></td>
								<td><?= $cuenta->num_cuenta ?></td>
								<td><?= $cuenta->cliente ?></td>
								<td><?= $cuenta->fecha_alta ?></td>
								<td><?= $cuenta->fecha_ul_mov ?></td>
								<td class="text-end"><?= number_format($cuenta->num_movtos, 0, ',', '.') ?></td>
								<td class="text-end"><?= number_format($cuenta->saldo, 2, ',', '.') ?> €</td>

								<!-- botones de acción -->
								<td>
									<!-- botón  eliminar -->
									<a href="<?= URL ?>cuenta/delete/<?= $cuenta->id ?>" title="Eliminar">
										<i class="bi bi-trash-fill"></i></a>

									<!-- botón  editar -->
									<a href="<?= URL ?>cuenta/edit/<?= $cuenta->id ?>" title="Editar">
										<i class="bi bi-pencil-square"></i></a>

									<!-- botón  mostrar -->
									<a href="<?= URL ?>cuenta/show/<?= $cuenta->id ?>" title="Mostrar">
										<i class="bi bi-card-text"></i></a>
								</td>

							</tr>
						<?php endwhile; ?>

					</tbody>
				</table>
			</div>
			<div class="card-footer">
				<small class="text-muted">
					<td colspan="10">Nº Cuentas: <?= $this->cuentas->rowCount() ?></td>
				</small>
			</div>
		</div>
	</div>

	<!-- /.container -->

	<?php require_once("template/partials/footer.php") ?>
	<?php require_once("template/partials/javascript.php") ?>

</body>

</html>