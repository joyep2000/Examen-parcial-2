<?php
require_once('../config/sesiones.php');
require_once('../models/curso.model.php');
error_reporting(0);
//TODO: requerimientos
$Curso = new CursoModel;

switch ($_GET['op']) {

    case 'todos':
        $datos = array();
        $datos = $Curso->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }        
        echo json_encode($todos);
        break;

    case 'insertar':
        $id_curso = $_POST['id_curso'];
        $idioma = $_POST['idioma'];
        $id_profesor = $_POST['id_profesor'];
        $datos = array();
        $datos = $Curso->Insertar($id_curso, $idioma, $id_profesor);        
        echo json_encode($datos);
        break;

    case 'uno':
        $id_curso = $_POST['id_curso'];
        $datos = array();
        $datos = $Curso->uno($id_curso);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'actualizar':
        $id_curso = $_POST['id_curso'];
        $idioma = $_POST['idioma'];
        $id_profesor = $_POST['id_profesor'];
        $datos = array();
        $datos = $Curso->Actualizar($id_curso, $idioma, $id_profesor);        
        echo json_encode($datos);
        break;

    case 'eliminar':
        $id_curso = $_POST['id_curso'];
        $datos = array();
        $datos = $Curso->eliminar($id_curso);
        echo json_encode($datos);
        break;
}
