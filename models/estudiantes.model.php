<?php
//TODO: archivos requeridos
require_once('../config/config.php');
class EstudiantesModel{
    
    public function todos(){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `estudiantes`";
        $datos = mysqli_query($con, $cadena); 
        return $datos;
    }
    public function Insertar($id_Estudiantes, $Nombre){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `estudiantes`(`id_Estudiantes`,`Nombre`) VALUES ('$id_Estudiantes','$Nombre')";
        if(mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        };     
    }
    public function uno ($id_Estudiantes){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `estudiantes` WHERE `id_Estudiantes` = $id_Estudiantes";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    public function Actualizar ($id_Estudiantes, $Nombre){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `estudiantes` SET `Nombre`='$Nombre' WHERE id_Estudiantes = $id_Estudiantes";
        if(mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        };     
    }
    public function Eliminar ($id_Estudiantes){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM `estudiantes` WHERE `id_Estudiantes` = $id_Estudiantes";
        if(mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        };     
    }
}