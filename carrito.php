<?php
use MyApp\data\Database;
use MyApp\query\ejecuta;
use MyApp\query\Select;

require("vendor/autoload.php");

$data = new Database();
$query = new Select();
$ejecuta = new ejecuta();
echo $_GET['agregar'];
if(isset($_GET['agregar'])){
    $sql="SELECT * from detalle_orden 
    inner join orden on orden.id_orden = detalle_orden.id_orden inner join clientes on clientes.id_client = orden.id_cliente where detalle_orden.id_producto = 1 and clientes.user_clien = 'juanii'". $_GET['agregar'];
    $select = $query->seleccionar($sql);
    if($select)
    {
        $sql="INSERT INTO carrito(id_producto,cantidad,cliente) values('".$_GET['agregar']."','".$_POST['cantidad']."','".$_SESSION['cliente']."')";
        $insert = $ejecuta->ejecutar($sql);
        $carrito = $insert->fetch(PDO::FETCH_ASSOC);
    }
    else
    {
        $cantidad=$sql['cantidad']+1;
        $sql="update carrito set cantidad='".$cantidad."' where cliente='".$_SESSION['cliente']."' and id_producto='".$_GET['agregar']."'";
        
        $carrito = $select->fetch(PDO::FETCH_ASSOC);
        mysqli_query($conexion,$sql);
    }
    
}
if(isset($_POST['id_producto'])){
    
    $sql="update carrito set cantidad='".$_POST['cantidad']."' where id_producto='".$_POST['id_producto']."'";
        mysqli_query($conexion,$sql);
}
if(isset($_GET['eliminar'])){
    $sql="delete from carrito where id_producto=".$_GET['eliminar']."";
    mysqli_query($conexion,$sql);
}
if(isset($_GET['limpiar'])){
    $sql="delete from carrito where cliente=".$_SESSION['cliente']."";
    mysqli_query($conexion,$sql);
}
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
            <th>Total</th>
            <th>Actualizar cantidad</th>
            <th>Eliminar</th>
		</tr>

        <?php
           
            $total=0;
            while($carrito = $select->fetch(PDO::FETCH_ASSOC)){
                $totalproductos=$filas['cantidad']*$filas['precio'];
                $total=$total+$totalproductos;
                echo '
                <form action="carrito.php" method="post">
                    <tr>
                        <td>'.$carrito['nom_producto'].'</td>
                        <td>'.$carrito['precio'].'</td>
                        

                        <td><input value="'.$carrito['cantidad'].'" type="number" name="cantidad">
                        <input type="hidden" value="'.$carrito['id_carrito'].'" name="id"></td>
                        
                        <td>$'.$totalproductos.'</td>
                        <td><input type="submit" value="Actualizar cantidad"></td>
                        
                        <td><a href="#" onclick="eliminar('.$carrito['id_carrito'].')">Eliminar</a></td>
                    </tr>
                    </form>
                ';
            }
        ?>
</body>
</html>