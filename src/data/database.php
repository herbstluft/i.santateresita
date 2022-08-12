<?php

namespace MyApp\Data;
use PDO;
use PDOException;

class Database
{
    private $PDOLocal;
    private $server = 'mysql:host=127.0.0.1:3306; dbname=proyecto; charset=utf8';
    public $user = "root";
    public $password = "1234";
    
    public $objetoPDO = null;
    public $dbname = "proyecto";

    function ConectarDB(){
                  $this->PDOLocal = new PDO($this->server, $this->user, $this->password);
  try {
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function Selects($consulta){
        try {
            $resultado = $this->PDOLocal->query($consulta);
            $fila = $resultado->fetchAll(PDO::FETCH_OBJ);
            return $fila;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    // public function __construct(string $dbname, string $user, string $password)
    // {
    //     $this->dbname = $dbname;
    //     $this->user = $user;
    //     $this->passoword = $password;
    // }

    public function getPDO()
    {
        try
        {   
            $host = "mysql:host=localhost;dbname=$this->dbname";
            $objetoPDO = new PDO($host,$this->user,$this->password);
            return $objetoPDO;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function desconectarDB()
    {
        $objetoPDO = null;
    }

}

?>