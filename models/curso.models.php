<?php
//TODO: archivos requeridos
require_once('../config/config.php');
class CursoModel{
    
    public function todos(){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `curso`";
        $datos = mysqli_query($con, $cadena); 
        return $datos;
    }
    public function Insertar($id_curso, $idioma, $id_profesor){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `curso`(`id_curso`,`idioma`,`id_profesor`) VALUES ('$id_curso','$idioma','$id_profesor')";
        if(mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        };     
    }
    public function uno ($id_curso){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `curso` WHERE `id_curso` = $id_curso";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    public function Actualizar ($id_curso, $idioma, $id_profesor){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `curso` SET `Nombre`='$idioma','$id_profesor' WHERE id_curso = $id_curso";
        if(mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        };     
    }
    public function Eliminar ($id_curso){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM `curso` WHERE `id_curso` = $id_curso";
        if(mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        };     
    }
}