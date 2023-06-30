<?php
//TODO: archivos requeridos
require_once('../config/config.php');
class InscripcionesModel{
    
    public function todos(){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `inscripciones`";
        $datos = mysqli_query($con, $cadena); 
        return $datos;
    }
    public function Insertar($id_inscripciones, $id_Estudiantes, $id_curso, $fecha){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `estudiantes`(`id_inscripciones`,`id_Estudiantes`,`id_curso`,`fecha`) VALUES ('$id_inscripciones','$id_Estudiantes','id_curso','$fecha')";
        if(mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        };     
    }
    public function uno ($id_inscripciones){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `inscripciones` WHERE `id_inscripciones` = $id_inscripciones";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    public function Actualizar ($id_inscripciones, $id_Estudiantes, $id_curso ,$fecha){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `inscripciones` SET `id_inscripciones`='$id_inscripciones',`id_Estudiantes`='$id_Estudiantes',`id_curso`='$id_curso',`fecha`='$fecha' WHERE id_inscripcines = $id_inscripciones";
        if(mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        };     
    }
    public function Eliminar ($id_inscripciones){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM `inscripciones` WHERE `id_inscripciones` = $id_inscripciones";
        if(mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        };     
    }
}