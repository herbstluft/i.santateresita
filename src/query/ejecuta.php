<?php

namespace MyApp\data;
namespace MyApp\query;
use PDO;
use PDOException;
use MyApp\data\Database;

class ejecuta
{
    public function ejecutar($qry)
    {
        try
        {
            $con = new Database("proyecto","root","1234");
            $objetoPDO = $con->getPDO();
            $objetoPDO -> query($qry);
            $con->desconectarDB();
        }
        catch(PDOException $e)
        {
            echo $e->getMessege();
        }
    }
}

?>