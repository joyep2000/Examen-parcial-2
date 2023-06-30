<?php
require_once('../config/sesiones.php');
require_once('../models/profesores.model.php');
error_reporting(0);
//TODO: requerimientos
$Profesores = new ProfesoresModel;

switch ($_GET['op']) {

    case 'todos':
        $datos = array();
        $datos = $Profesores->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }        
        echo json_encode($todos);
        break;

    case 'insertar':
        $id_profesor = $_POST['id_profesor'];
        $Nombres = $_POST['Nombres'];
        $datos = array();
        $datos = $Profesores->Insertar($id_profesor, $Nombres);        
        echo json_encode($datos);
        break;

    case 'uno':
        $id_profesor = $_POST['id_profesor'];
        $datos = array();
        $datos = $Profesores->uno($id_profesor);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'actualizar':
        $id_profesor = $_POST['id_profesor'];
        $Nombre = $_POST['Nombres'];
        $datos = array();
        $datos = $Profesores->Actualizar($id_profesor, $Nombres);        
        echo json_encode($datos);
        break;

    case 'eliminar':
        $id_profesor = $_POST['id_profesor'];
        $datos = array();
        $datos = $Profesores->eliminar($id_profesor);
        echo json_encode($datos);
        break;
}
