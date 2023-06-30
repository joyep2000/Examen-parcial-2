<?php
include_once('../../config/sesiones.php');
if (isset($_SESSION["idUsuario"])) {
    $_SESSION["ruta"] = "Inscripciones";
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
                <h1 class="mt-4">Inscripciones</h1>


                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Lista de Inscripciones
                    </div>
                    <button onclick class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#modalInscripciones"> Nuevo Inscripcion</button>
                    <div class="card-body">
                        <table width="100%" cellspacing="0" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Inscripcion</th>
                                    <th>Estudiante</th>
                                    <th>Curso</th>
                                    <th>Fecha</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody id='TablaInscripciones'></tbody>
                        </table>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                <th>#</th>
                                    <th>Inscripcion</th>
                                    <th>Estudiante</th>
                                    <th>Curso</th>
                                    <th>Fecha</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                </tbody id='TablaInscripciones'><tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <!--modales-->
        <div class="modal fade" data-backdrop= "static" data-keyboard="false" id="modalInscripciones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titulModalInscripciones">Ingresar Inscripcion</h5>
                        <button type="button" onclick="limpiar()" class="close" data-bs-dismiss="modal" aria-bs-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="Inscripciones_form">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="id_inscripciones" class="control-label">Inscripcion</label>
                                <input type="text" name="id_inscripciones" id="id_inscripciones" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="id_Estudiantes" class="control-label">Estudiante</label>
                                <input type="text" name="id_Estudiantes" id="id_Estudiantes" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="id_curso" class="control-label">Curso</label>
                                <input type="text" name="id_curso" id="id_curso" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="fecha" class="control-label">Fecha</label>
                                <input type="text" name="fecha" id="fecha" class="form-control" required>
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
        <script src="./inscripciones.js"></script>
        <!--scripts-->
    </body>
    </html>

<?php
} else {
    header('Location:../../index.php');
}
?>