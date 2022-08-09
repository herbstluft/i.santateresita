<?php
include '../conexion.php';
if(isset($_GET['agregar'])){
    $sql="select * from carrito where cliente='".$_SESSION['cliente']."' and id_producto='".$_GET['agregar']."'";
    $resultados=mysqli_query($conexion,$sql);
    $num=mysqli_num_rows($resultados);
    if($num==0){
        $sql="INSERT INTO carrito(id_producto,cantidad,cliente) values('".$_GET['agregar']."','".$_POST['cantidad']."','".$_SESSION['cliente']."')";
        mysqli_query($conexion,$sql);
    }else{
        $fila=mysqli_fetch_array($resultados);
        $cantidad=$fila['cantidad']+1;
        $sql="update carrito set cantidad='".$cantidad."' where cliente='".$_SESSION['cliente']."' and id_producto='".$_GET['agregar']."'";
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
            $sql="select productos.nom_producto,productos.precio,carrito.cantidad,carrito.id_carrito from carrito,productos where carrito.id_producto=productos.id_producto and cliente='".$_SESSION['cliente']."'";
            
            $resultados=mysqli_query($conexion,$sql);
            $total=0;
            while($filas=mysqli_fetch_array($resultados)){
                $totalproductos=$filas['cantidad']*$filas['precio'];
                $total=$total+$totalproductos;
                echo '
                <form action="carrito.php" method="post">
                    <tr>
                        <td>'.$filas['nom_producto'].'</td>
                        <td>'.$filas['precio'].'</td>
                        

                        <td><input value="'.$filas['cantidad'].'" type="number" name="cantidad">
                        <input type="hidden" value="'.$filas['id_carrito'].'" name="id"></td>
                        
                        <td>$'.$totalproductos.'</td>
                        <td><input type="submit" value="Actualizar cantidad"></td>
                        
                        <td><a href="#" onclick="eliminar('.$filas['id_carrito'].')">Eliminar</a></td>
                    </tr>
                    </form>
                ';
            }
        ?>
</body>
</html>