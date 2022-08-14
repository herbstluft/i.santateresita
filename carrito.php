<?php
use MyApp\data\Database;
use MyApp\query\ejecuta;
use MyApp\query\Select;

require("vendor/autoload.php");

$data = new Database();
$query = new Select();
$ejecuta = new ejecuta();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Eliminar</th>
        </tr>
        <?php
            $sql="SELECT * from detalle_orden 
            inner join orden on orden.id_orden = detalle_orden.id_orden inner join clientes on clientes.id_client = orden.id_cliente INNER join productos on productos.id_producto=detalle_orden.id_producto where detalle_orden.id_producto = 1 and clientes.user_clien ='".$_SESSION['cliente']."'";
            
            $resultados=$query->seleccionar($sql);
            while($filas=mysqli_fetch_array($resultados)){
                echo '
                <form action="carrito.php" method="post">
                    <tr>
                        <td>'.$filas['nom_prod'].'</td>
                        <td>'.$filas['precio'].'</td>
                        
                        <td><input value="'.$filas['cantidad'].'" type="number" name="cantidad">
                            <input type="hidden" value="'.$filas['id'].'" name="id">
                        </td>
                        <td>$'.$totalproductos.'</td>
                        <td><input type="submit" value="Actualizar cantidad"></td>
                        
                        <td><a href="#" onclick="eliminar('.$filas['id'].')">Eliminar</a></td>
                    </tr>
                    </form>
                ';
            }
        ?>
    </table>
    
</body>
</html>