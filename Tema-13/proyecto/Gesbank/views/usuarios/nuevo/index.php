<!DOCTYPE html>
<html lang="es">

<head>
    <!-- bootstrap  -->
    <?php require_once("template/partials/head.php");  ?>
    <title>Nueva Cuenta - Gesbank</title>
</head>

<body>

    <!-- menu fijo superior -->
    <?php require_once "template/partials/menuAut.php"; ?>
    <br><br><br>

    <!-- capa principal -->
    <div class="container">

        <!-- cabecera -->
        <?php include "views/usuarios/partials/header.php" ?>

        <legend>Formulario Nuevo Usuario</legend>

        <!-- Mensaje de Error -->
        <?php include 'template/partials/error.php' ?>

        <!-- Formulario -->
        <form action="<?= URL ?>usuarios/create" method="POST">

            <!-- Nombre -->
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control <?= (isset($this->errores['nombre'])) ? 'is-invalid' : null ?>" name="nombre" value="<?= $this->usuario->name ?>">

                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['nombre'])) : ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['nombre'] ?>
                    </span>
                <?php endif; ?>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control <?= (isset($this->errores['email'])) ? 'is-invalid' : null ?>" name="email" value="<?= $this->usuario->email ?>">

                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['email'])) : ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['email'] ?>
                    </span>
                <?php endif; ?>
            </div>

            <!-- Roles -->
            <div class="mb-3">
                <label for="" class="form-label">Roles</label>
                <select class="form-select <?= (isset($this->errores['roles'])) ? 'is-invalid' : null ?>" name="roles">
                    <option selected disabled>Seleccione un cliente </option>
                    <?php foreach ($this->roles as $rol) : ?>
                        <div class="form-check">
                            <?php
                            $selected = isset($this->rolSeleccionado) && $rol->id == $this->rolSeleccionado ? 'selected' : '';
                            ?>
                            <option value="<?= $rol->id ?>" <?= $selected ?>>
                                <?= $rol->name ?>
                            </option>
                        </div>
                    <?php endforeach; ?>
                </select>

                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['roles'])) : ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['roles'] ?>
                    </span>
                <?php endif; ?>
            </div>

            <!-- Contraseña -->
            <div class="mb-3">
                <label for="" class="form-label">Contraseña</label>
                <input type="password" class="form-control <?= (isset($this->errores['contraseña'])) ? 'is-invalid' : null ?>" name="contraseña">

                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['contraseña'])) : ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['contraseña'] ?>
                    </span>
                <?php endif; ?>
            </div>

            <!-- Confirmar Contraseña -->
            <div class="mb-3">
                <label for="" class="form-label">Confirmar Contraseña</label>
                <input type="password" class="form-control <?= (isset($this->errores['confirmarContraseña'])) ? 'is-invalid' : null ?>" name="confirmarContraseña">

                <!-- Mostrar posible error -->
                <?php if (isset($this->errores['confirmarContraseña'])) : ?>
                    <span class="form-text text-danger" role="alert">
                        <?= $this->errores['confirmarContraseña'] ?>
                    </span>
                <?php endif; ?>
            </div>

            <!-- Botones de acción -->
            <div class="mb-3">
                <a name="" id="" class="btn btn-secondary" href="<?= URL ?>usuarios" role="button">Cancelar</a>
                <button type="button" class="btn btn-danger">Borrar</button>
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </form>
    </div>

    <!-- footer -->
    <?php require_once "template/partials/footer.php" ?>

    <!-- Bootstrap JS y popper -->
    <?php require_once "template/partials/javascript.php" ?>

</body>

</html>
