<?php

namespace MyApp\query;
use PDO;
use PDOException;
use MyApp\data\Database;

class Select
{
    public function seleccionar($qry)
    {
        try
        {
            $cc = new Database("proyecto","root","1234");
            $objetoPDO = $cc->getPDO();

            $resultado = $objetoPDO -> query($qry);
            $fila = $resultado->fetchAll(PDO::FETCH_OBJ);
            $cc->desconectarDB();
            return $fila;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}
?>

