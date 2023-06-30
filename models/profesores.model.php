<?php
//TODO: archivos requeridos
require_once('../config/config.php');
class ProfesoresModel{
    
    public function todos(){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `profesores`";
        $datos = mysqli_query($con, $cadena); 
        return $datos;
    }
    public function Insertar($id_profesor, $Nombres){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `profesores`(`id_profesor`,`Nombres`) VALUES ('$id_profesor','$Nombres')";
        if(mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        };     
    }
    public function uno ($id_profesor){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `profesores` WHERE `id_profesor` = $id_profesor";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    public function Actualizar ($id_profesor, $Nombres){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `profesores` SET `Nombres`='$Nombres' WHERE id_profesor = $id_profesor";
        if(mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        };     
    }
    public function Eliminar ($id_profesor){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM `profesores` WHERE `id_profesor` = $id_profesor";
        if(mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        };     
    }
}