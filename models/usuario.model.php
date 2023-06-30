<?php
//TODO: archivos requeridos
require_once('../config/config.php');
class UsuarioModel{

    public function login($correo, $contrasenia)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM usuario WHERE correo = '$correo' and contrasenia = '$contrasenia'";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    public function todos(){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT `Nombres`, `Apellidos`, `correo` FROM `usuario` by Apellido";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    public function Insertar($Nombres, $Apellidos, $contrasenia, $correo,){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `usuario`(`Nombres`, `Apellidos`, `contrasenia`, `correo`) VALUES ('$Nombres','$Apellidos','$contrasenia','$correo')";
        $datos = mysqli_query($con, $cadena);
        return 'ok';        
    }
}