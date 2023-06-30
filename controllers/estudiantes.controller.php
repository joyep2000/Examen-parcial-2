<?php
require_once('../config/sesiones.php');
require_once('../models/estudiantes.model.php');
error_reporting(0);
//TODO: requerimientos
$Estudiantes = new EstudiantesModel;

switch ($_GET['op']) {

    case 'todos':
        $datos = array();
        $datos = $Estudiantes->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }        
        echo json_encode($todos);
        break;

    case 'insertar':
        $id_Estudiantes = $_POST['id_Estudiantes'];
        $Nombre = $_POST['Nombre'];
        $datos = array();
        $datos = $Estudiantes->Insertar($id_Estudiantes, $Nombre);        
        echo json_encode($datos);
        break;

    case 'uno':
        $id_Estudiantes = $_POST['id_Estudiantes'];
        $datos = array();
        $datos = $Estudiantes->uno($id_Estudiantes);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'actualizar':
        $id_Estudiantes = $_POST['id_Estudiantes'];
        $Nombre = $_POST['Nombre'];
        $datos = array();
        $datos = $Estudiantes->Actualizar($id_Estudiantes, $Nombre);        
        echo json_encode($datos);
        break;

    case 'eliminar':
        $id_Estudiantes = $_POST['id_Estudiantes'];
        $datos = array();
        $datos = $Estudiantes->eliminar($id_Estudiantes);
        echo json_encode($datos);
        break;
}
