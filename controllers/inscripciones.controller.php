<?php
require_once('../config/sesiones.php');
require_once('../models/inscripciones.model.php');
error_reporting(0);
//TODO: requerimientos
$Estudiantes = new InscripcionesModel;

switch ($_GET['op']) {

    case 'todos':
        $datos = array();
        $datos = $Inscripciones->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }        
        echo json_encode($todos);
        break;

    case 'insertar':
        $id_inscripciones = $_POST['id_inscripciones'];
        $id_EStudiantes = $_POST['id_Estudiantes'];
        $id_curso = $_POST['id_curso'];
        $fecha = $_POST['fecha'];
        $datos = array();
        $datos = $Inscripciones->Insertar($id_inscripciones,$id_Estudiantes, $id_curso, $fecha);        
        echo json_encode($datos);
        break;

    case 'uno':
        $id_inscripciones = $_POST['id_inscripciones'];
        $datos = array();
        $datos = $Inscripciones->uno($id_inscripciones);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'actualizar':
        $id_inscripciones = $_POST['id_inscripciones'];
        $id_EStudiantes = $_POST['id_Estudiantes'];
        $id_curso = $_POST['id_curso'];
        $fecha = $_POST['fecha'];
        $datos = array();
        $datos = $Inscripciones->Actualizar($id_inscripciones,$id_Estudiantes, $id_curso, $fecha);        
        echo json_encode($datos);
        break;

    case 'eliminar':
        $id_inscripciones = $_POST['in_inscripciones'];
        $datos = array();
        $datos = $Inscripciones->eliminar($id_inscripciones);
        echo json_encode($datos);
        break;
}
