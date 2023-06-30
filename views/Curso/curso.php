<?php
include_once('../../config/sesiones.php');
if (isset($_SESSION["idUsuario"])) {
    $_SESSION["ruta"] = "Cursos";
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
                <h1 class="mt-4">Cursos</h1>


                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Lista de Cursos
                    </div>
                    <button onclick class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#modalCurso"> Nuevo Curso</button>
                    <div class="card-body">
                        <table width="100%" cellspacing="0" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Curso</th>
                                    <th>Idioma</th>
                                    <th>Profesor</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody id='TablaCursos'></tbody>
                        </table>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Curso</th>
                                    <th>Idioma</th>
                                    <th>Profesor</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                </tbody id='TablaCurso'><tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <!--modales-->
        <div class="modal fade" data-bs-backdrop= "static" data-bs-keyboard="false" id="modalCurso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titulModalCurso">Ingresar Curso</h5>
                        <button type="button" onclick="limpiar()" class="close" data-bs-dismiss="modal" aria-bs-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="curso_form">
                        <div class="modal-body">
                        <div class="form-group">
                                <label for="id_curso" class="control-label">Curso</label>
                                <input type="text" name="id_curso" id="if_curso" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="idioma" class="control-label">Idioma</label>
                                <input type="text" name="idioma" id="idioma" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="id_profesor" class="control-label">Profesor</label>
                                <input type="text" name="id_profesor" id="id_profesor" class="form-control" required>
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
        <script src="./curso.js"></script>
        <!--scripts-->
    </body>
    </html>

<?php
} else {
    header('Location:../../index.php');
}
?>