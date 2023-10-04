<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include 'views/plantilla/head.html'?>
		<title>Proyecto 03 Lanzamiento Proyectil Optimizado</title>
	</head>
	<body>
		<!-- Capa Principal -->
		<div class="container">
			<header class="pb-3 mb-4 border-bottom">
					<i class="bi bi-rocket-takeoff-fill"></i>				
				<span class="fs-3">Proyecto 2.2 - Lanzamiento de Proyectiles
				</span>
				<i class="bi bi-rocket-takeoff-fill"></i>			
			</header>

			<legend>Lanzamiento de Proyectiles</legend>
			<form method="POST">
				<div class="mb-3">
					<label class="form-label">Velocidad Lanzamiento</label>
					<input
						type="number"
						name="velini"
						class="form-control"
						aria-describedby="helpId"
						step="0.01"
					/>
				</div>
				<div class="mb-3">
					<label class="form-label">Ángulo</label>
					<input
						type="number"
						name="angulo"
						class="form-control"
						aria-describedby="helpId"
						step="0.01"
					/>
				</div>
                <!-- Botones de Acción -->
                <!--- Para asignarles acciones a los botones usamos el formaction-->
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="reset" class="btn btn-danger">Borrar</button>
                    <button type="submit" class="btn btn-primary" formaction="calcular.php">Calcular</button>
                  </div>

			</form>
		</div>

		<!-- Pie del documento -->
		<?php include 'views/plantilla/footer.html'?>


		<!-- Bootstrap Javascript y popper -->
		<?php include 'views/plantilla/javascript.html'?>

	</body>
</html>
