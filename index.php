<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="./public/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form class="user" action="controllers/usuario.controller.php?op=login" method="post">
                                        <?php
                                        if (isset($_GET['op'])) {
                                            switch ($_GET['op']) {
                                                case '1':
                                        ?>
                                                    <div class="form-group">
                                                        <div class="alert alert-danger">
                                                            El usuario o la contraseña son incorrectos
                                                        </div>
                                                    </div>
                                                <?php
                                                    break;
                                                case '2':
                                                ?>
                                                    <div class="form-group">
                                                        <div class="alert alert-danger">
                                                            Llene las casillas
                                                        </div>
                                                    </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="correo" name = "correo" type="text" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="contrasenia" name = "contrasenia" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <button type = "submit" class = "btn btn-primary btn_user btn-block">
                                                login
                                            </button>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Aplicaciones Distribuidas</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="./public/js/scripts.js"></script>
    </body>
</html>