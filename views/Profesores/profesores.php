<?php
include_once('../../config/sesiones.php');
if (isset($_SESSION["idUsuario"])) {
    $_SESSION["ruta"] = "Profesores";
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
                <h1 class="mt-4">Profesores</h1>


                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Lista de Profesores
                    </div>
                    <button onclick class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#modalProfesores"> Nuevo Profesor</button>
                    <div class="card-body">
                        <table width="100%" cellspacing="0" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cedula</th>
                                    <th>Nombres</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody id='TablaProfesores'></tbody>
                        </table>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cedula</th>
                                    <th>Nombres</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                </tbody id='TablaProfesores'><tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <!--modales-->
        <div class="modal fade" data-bs-backdrop= "static" data-bs-keyboard="false" id="modalProfesores" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titulModalProfesores">Ingresar Profesores</h5>
                        <button type="button" onclick="limpiar()" class="close" data-bs-dismiss="modal" aria-bs-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="profesores_form">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="Id_profesor" class="control-label">Cedula</label>
                                <input type="text" name="id_profesor" id="id_profesor" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="Nombres" class="control-label">Nombres</label>
                                <input type="text" name="Nombres" id="Nombres" class="form-control" required>
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
        <script src="./profesores.js"></script>
        <!--scripts-->
    </body>
    </html>

<?php
} else {
    header('Location:../../index.php');
}
?>