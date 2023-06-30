<?php
include_once('../../config/sesiones.php');
if (isset($_SESSION["idUsuario"])) {
    $_SESSION["ruta"] = "Estudiantes";
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
                <h1 class="mt-4">Estudiantes</h1>


                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Lista de estudiantes
                    </div>
                    <button onclick class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#modalEstudiantes"> Nuevo Estudiante</button>
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
                            <tbody id='TablaEstudiantes'></tbody>
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
                                </tbody id='TablaEstudiantes'>
                                <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <!--modales-->
        <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="modalEstudiantes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titulModalEstudiantes">Ingresar Estudiantes</h5>
                        <button type="button" onclick="limpiar()" class="close" data-bs-dismiss="modal" aria-bs-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="estudiantes_form">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="id_Estudiantes" class="control-label">Cedula</label>
                                <input type="text" name="id_Estudiantes" id="id_Estudiantes" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="Nombre" class="control-label">Nombres</label>
                                <input type="text" name="Nombre" id="Nombre" class="form-control" required>
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
        <script src="./estudiantes.js"></script>
        <!--scripts-->
    </body>

    </html>

<?php
} else {
    header('Location:../../index.php');
}
?>