<?php
include_once('../../config/sesiones.php');
if (isset($_SESSION["idUsuario"])) {
    $_SESSION["ruta"] = "Usuarios";
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <?php require_once('../html/head.php') ?>
    </head>

    <body class="sb-nav-fixed">
        <!--header-->
        <?php include_once('../html/header.php') ?>
        <!--header-->
        <!--menu-->
        <?php require_once('../html/menu.php') ?>
        <!--menu-->
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Usuarios</h1>


                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Lista de Usuarios
                    </div>
                    <button onclick class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#modalUsuarios"> Nuevo Usuario</button>
                    <div class="card-body">
                        <table width="100%" cellspacing="0" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombres</th>
                                    <th>apellidos</th>
                                    <th>Correo</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody id='TablaUsuarios'></tbody>
                        </table>
                        <!--<table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Correo</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                </tbody id='TablaUsuarios'><tbody>
                        </table>-->
                    </div>
                </div>
            </div>
        </main>
        <!--modales-->
        <div class="modal fade" id="modalUsuarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titulModalUsuarios">Ingresar Usuarios</h5>
                        <button type="button" onclick="limpiar()" class="close" data-bs-dismiss="modal" aria-bs-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="usuarios_form">
                        <div class="modal-body">
                            <input type="hidden" name="idUsuario" id="idUsuario">
                            <div class="form-group">
                                <label for="Nombres" class="control-label">Nombres</label>
                                <input type="text" name="Nombres" id="Nombres" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="Apellidos" class="control-label">Apellidos</label>
                                <input type="text" name="Apellidos" id="Apellidos" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="correo" class="control-label">Correo</label>
                                <input type="mail" name="correo" id="correo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="contrasenia" class="control-label">contraseña</label>
                                <input type="password" name="contrasenia" id="contrasenia" class="form-control">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-secondary" onclick="limpiar()" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!--footers-->
        <?php include_once('../html/footer.php') ?>
        <!--footers-->
        </div>
        </div>
        <!--scripts-->
        <?php include_once('../html/scripts.php') ?>
        <script src="./usuarios.js"></script>
        <!--scripts-->
    </body>
    </html>

<?php
} else {
    header('Location:../../index.php');
}
?>