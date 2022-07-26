<?php


class conexion{
public $servidor="localhost";
private $usuario="root";
private $contrasena="1234";
private $conexion;

public function __construct(){
try {
    $this->conexion=new PDO("mysql:host=$this->servidor;dbname=proyecto",$this->usuario,$this->contrasena);
    $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        return "falla de conexion".$e;
    }
}

public function ejecutar($sql){ //delete, update, insert
  $this->conexion->exec($sql);
  return $this->conexion->lastInsertId();
}

public function consultar($sql){
  $sentencia=$this->conexion->prepare($sql);
  $sentencia->execute();
  return $sentencia->fetchAll();
}

}

?>