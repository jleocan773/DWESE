<!DOCTYPE html>
<html lang="es">

<head>
	<?php include 'views/plantilla/head.html' ?>
	<title>Proyecto 03 Lanzamiento Proyectil Optimizado</title>

</head>

<body>
	<!-- Capa Principal -->
	<div class="container">
		<header class="pb-3 mb-4 border-bottom">
			<i class="bi bi-rocket-takeoff-fill"></i>
			<span class="fs-3">Proyecto 2.2 - Lanzamiento de Proyectil</span>
			<i class="bi bi-rocket-takeoff-fill"></i>
		</header>

		<legend>Resultados</legend>
		<!-- Ángulo -->
		<table class="table">
			<tbody>
				<tr>
					<th>Valores Iniciales</th>
					<td></td>
				</tr>
				<tr>
					<td>Velocidad Inicial</td>
					<td><?= $velini ?> m/s</td>
				</tr>
				<tr>
					<td>Ángulo</td>
					<td><?= $angulo ?>º</td>
				</tr>
				<tr>
					<th>Resultados</th>
					<td></td>
				</tr>
				<tr>
					<td>Ángulos Radianes</td>
					<td><?= $anguloRadianes ?>º</td>
				</tr>
				<tr>
					<td>Velocidad Inicial X</td>
					<td><?= $velinix ?> m/s</td>
				</tr>
				<tr>
					<td>Velocidad Inicial Y</td>
					<td><?= $veliniy ?> m/s</td>
				</tr>
				<tr>
					<td>Alcance Máximo Proyectil</td>
					<td><?= $alcancemaximo ?> m/s</td>
				</tr>
				<tr>
					<td>Tiempo Vuelo Proyectil</td>
					<td><?= $tiempoproyectil ?> m/s</td>
				</tr>
				<tr>
					<td>Altura Máxima Proyectil</td>
					<td><?= $alturamaxima ?> m/s</td>
				</tr>
			</tbody>
		</table>


		<!-- Botón de volver a Index -->
		<div class="btn-group" role="group">
			<a class="btn btn-primary" href="index.php" role="button">Volver</a>
		</div>
	</div>

	</div>

	<!-- Pie del documento -->
	<?php include 'views/plantilla/footer.html'?>


	<!-- Bootstrap Javascript y popper -->
	<?php include 'views/plantilla/javascript.html'?>
</body>

</html>