<!doctype html>
<html lang="es">

<header>
    <?php require_once("template/partials/head.php") ?>
    <title> Perfil Usuario</title>
    </title>
</header>

<body>
    <?php require_once("template/partials/menuAut.php") ?>

    <!-- Page Content -->
    <div class="container">
        <br><br><br>

        <div class="row justify-content-center">

            <div class="col-md-8">
                <?php require_once("template/partials/notify.php") ?>
                <!-- Error -->
                <?php require_once("template/partials/error.php") ?>
                <div class="card">
                    <div class="card-header">Perfil de <?= $_SESSION['name_user']?></div>
                    <div class="card-header">
                    <?php  require_once("views/perfil/partials/menu.php"); ?>

                        <form method="POST" action="<?= URL ?>perfil/valperfil">

                            <!-- campo tipo perfil -->
                            <br>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label text-end">Tipo Usuario</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="name" value="<?= $_SESSION['name_rol']; ?>" disabled>
                                </div>
                            </div>

                            <!-- campo name -->
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label text-end">Nombre Usuario</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="name" value="<?= $this->user->name; ?>" disabled>
                                </div>
                            </div>

                            <!-- campo email -->
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label text-end">Email</label>
                                <div class="col-sm-7">
                                    <input type="email" class="form-control" name="email" value="<?= $this->user->email; ?>" disabled>
                                </div>
                            </div>

                            <!-- botones acción -->
                            <div class="row mb-3">
                                <div class="col-sm-9 offset-sm-3">
                                    <a class="btn btn-secondary" href="<?= URL ?>clientes" role="button">Salir</a>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- /.container -->

    <?php require_once("template/partials/footer.php") ?>
    <?php require_once("template/partials/javascript.php") ?>

</body>

</html>