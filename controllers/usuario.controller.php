<?php
error_reporting(0);
//TODO: requerimientos
require_once('../config/sesiones.php');
require_once('../models/usuario.model.php');
$Usuario = new UsuarioModel;

switch ($_GET['op']) {
    case 'login':
        $correo = $_POST['correo'];
        $contrasenia = $_POST['contrasenia'];

        if (empty($correo) or empty($contrasenia)) {
            header("Location:../index.php?op=2");
            exit();
        }
        $datos = array();
        $datos = $Usuario->login($correo, $contrasenia);
        $res = mysqli_fetch_assoc($datos);
        try {
            if (is_array($res) and count($res)>0) {
                $_SESSION['idUsuario']=$res['idUsuario'];
                $_SESSION['Nombres']=$res['Nombres'];
                $_SESSION['Apellidos']=$res['Apellidos'];
                $_SESSION['correo']=$res['correo'];                
                header('Location:../views/Dashboard/');
                exit();
            }else {
                header("Location:../index.php?op=1");
                exit();
            }
        } catch (Throwable $th) {
            echo json_encode($th->getMessage());
        }
        break;    
    case 'todos':
        $datos = array();
        $datos = $Usuario->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

    case 'insertar':
        $Nombres = $_POST['Nombres'];
        $Apellidos = $_POST['Apellidos'];
        $contrasenia = $_POST['contrasenia'];
        $correo = $_POST['correo'];

        $datos = array();
        $datos = $Usuario->Insertar($Nombres, $Apellidos, $contrasenia, $correo);

        echo json_encode($datos);
       // $respuesta = mysqli_fetch_assoc($datos);

        break;

    case 'actualizar':
        break;
}