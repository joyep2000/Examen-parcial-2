<?php
//TODO: clase para conectar la base de datos
class ClaseConexion{
    public $conexion;
    protected $db;
    private $host ="localhost";
    private $user = "root";
    private $password = "";
    private $base = 'centroidiomas';

    public function ProcedimientoConectar(){
        $this->conexion = mysqli_connect($this->host,$this->user,$this->password,$this->base);
        mysqli_query($this->conexion,"SET NAMES utf8");
        if($this->conexion === 0){
            die('error al conectarse al servidor'.mysqli_error($this->conexion));
        }
        $this->db = mysqli_select_db($this->conexion, $this->base);
        if($this->db ==0){
            die('error al conectarse a la base de datos'.mysqli_error($this->conexion));
        }
        return $this->conexion;
    }
}
