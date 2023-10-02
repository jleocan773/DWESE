<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Plantilla Bootstrap 5.3.2</title>

		<!-- Bootstrap css -->
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
			crossorigin="anonymous"
		/>

		<!-- Bootstrap Icons 1.11.1 -->
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
		/>
	</head>
	<body>
		<!-- Capa Principal -->
		<div class="container">
			<header class="pb-3 mb-4 border-bottom">
				<i class="bi bi-calculator-fill"></i>
				<span class="fs-3">Proyecto 2.1 - Calculadora Básica</span>
				<i class="bi bi-calculator-fill"></i>
			</header>

			<legend>Resultado</legend>
				<!-- Valor 1 -->
				<div class="mb-3">
					<label class="form-label">Valor 1</label>
					<input
						type="number"
						class="form-control"
						value="$valor1"
                        readonly
					/>
				</div>
				<div class="mb-3">
					<label class="form-label">Valor 2</label>
					<input
						type="number"
						class="form-control"
						value="$valor2"
                        readonly
					/>
				</div>
                <div class="mb-3">
					<label class="form-label" <?= $operacion?>>Resultado</label>
					<input
						type="number"
						class="form-control"
						value="<?= $resultado?>"
                        readonly
					/>
				</div>
                <!-- Botón de volver a Index -->
                <div class="btn-group" role="group">
                    <button class="btn btn-primary" href="index.html" role="button">Volver</button>
                  </div>

		</div>

		<!-- Pie del documento -->
		<footer class="footer mt-auto py-3 fixed-bottom bg-light">
			<div class="container">
				<span class="text-muted">
					© 2022 Jonathan Leon Canto - DWES - 2º DAW - Curso 23/24
				</span>
			</div>
		</footer>

		<!-- Bootstrap Javascript y popper -->
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
			crossorigin="anonymous"
		></script>
	</body>
</html>
